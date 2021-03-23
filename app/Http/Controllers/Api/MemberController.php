<?php

namespace App\Http\Controllers\Api;

use App\Models\{Member, Division, User, UserProfile};
use App\Http\Requests\MemberRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{


    public function index()
    {
        $members = Member::with('division', 'alumni', 'created_by')->latest()->get();

        return response()->json([
            'status' => 'success',
            'data' => $members
        ]);
    }

    public function show($id)
    {
        $member = Member::with('division', 'alumni', 'created_by')->find($id);

        if (!$member) {
            return response()->json([
                'status' => 'error',
                'message' => 'member not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $member
        ], 200);
    }

    public function create()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'form create'
        ]);
    }

    public function store(MemberRequest $request)
    {

        $division = Division::where('id', $request->division_id)->exists();
        if (!$division) {
            return response()->json([
                'status' => 'error',
                'message' => 'division not found'
            ], 404);
        }

        $member = Member::create([
            'name' => $request->name,
            'class' => $request->class,
            'division_id' => $request->division_id,
            'image' => $request->image ? request()->file('image')->store('images/member') : null,
            'position' => $request->position,
            // 'created_by' => auth()->user()->id
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $member
        ], 200);
    }

    public function edit($id)
    {
        $member = Member::find($id);

        if (!$member) {
            return response()->json([
                'status' => 'error',
                'message' => 'member not found'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'form edit',
            'data' => $member
        ]);
    }

    public function update(MemberRequest $request, $id)
    {
        $member = Member::find($id);

        if (!$member) {
            return response()->json([
                'status' => 'error',
                'message' => 'member not found'
            ], 404);
        }

        $division = Division::where('id', $request->division_id)->exists();
        if (!$division) {
            return response()->json([
                'status' => 'error',
                'message' => 'division not found'
            ], 404);
        }

        if ($request->image) {
            \Storage::delete($member->image);
            $image = request()->file('image')->store('images/member');
        } elseif ($member->image) {
            $image = $member->image;
        } else {
            $image = null;
        }

        $member->update([
            'name' => $request->name,
            'class' => $request->class,
            'division_id' => $request->division_id,
            'image' => $image,
            'position' => $request->position,
            // 'created_by' => auth()->user()->id
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $member
        ], 200);
    }

    public function destroy($id)
    {
        $member = Member::find($id);

        if (!$member) {
            return response()->json([
                'status' => 'error',
                'message' => 'member not found'
            ], 404);
        }

        \Storage::delete($member->image);

        $member->alumni()->delete();
        $member->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'member deleted successfuly'
        ], 200);
    }

    public function get_profile()
    {
        $user = User::where('name', $_GET['name']);
        $profile = UserProfile::where('user_id', $user->get()[0]->id);

        if ($profile->count() < 1) {
            return response()->json(['message' => 'query gagal, data tidak ditemukan', 'status' => 'error'], 404);
        }
        return response()->json(['message' => 'query berhasil', 'status' => 'success', 'data' => $profile->get()[0]], 200);
    }

    public function insert_profile(Request $request)
    {
        $user = UserProfile::where('user_id', auth()->user()->id);
        $request->request->add(['user_id' => auth()->user()->id]);

        if ($request->hasFile('image')) {
            $name = auth()->user()->name . '-' . date('YmdHi') . '-' . round(0, 10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('private_file/user/image-thumbnail/', $name);
            $request->request->add(['thumbnail' => $name]);
        }

        if ($user->count() < 1) {
            UserProfile::create($request->except('image'));
        }
        $user->update($request->except('image'));


        return response()->json(['status' => 'success', 'message' => 'Profile berhasil diperbarui'], 200);
    }

    public function delete_image_profile()
    {
        $user = UserProfile::where('user_id', auth()->user()->id);
        $user->update(['thumbnail' => NULL]);
        return response()->json(['status' => 'success', 'message' => 'Profile berhasil diperbarui'], 200);
    }

    public function setting_changepassword(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $password = password_verify($request->oldpassword, $user->password);
        if ($password == true) {
            $newpassword = password_verify($request->newpassword, $user->password);
            if ($newpassword == false) {
                $user->update(['password' => bcrypt($request->newpassword)]);
                return response()->json(['status' => 'success', 'message' => 'Password has been changes'], 200);
            }
            return response()->json(['status' => 'error', 'message' => 'the new password is the same as the old password'], 500);
        }
        return response()->json(['status' => 'error', 'message' => 'Old Password is wrong'], 404);
    }
}
