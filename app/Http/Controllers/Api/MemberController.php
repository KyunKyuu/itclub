<?php

namespace App\Http\Controllers\Api;

use App\Models\{Member, Division, UserProfile};
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

    public function profile(Request $request)
    {
        $user = UserProfile::where('user_id', auth()->user()->id);

        dd($request->all());

        if ($request->hasFile('image')) {
            $request->file('image')->move('private_file/user/image-thumbnail/', $request->file('image')->getClientOriginalName());
            $name = auth()->user()->name . '-' . date('YmdHi') . '-' . round(0, 10);
            $request->request->add(['thumbnail' => $name]);
        }

        if (!empty($user)) {
            $request->request->add(['user_id', auth()->user()->id]);
            UserProfile::create($request->all());
        }
        $request->request->add(['user_id', auth()->user()->id]);
        $user->update($request->all());


        return response()->json(['status' => 'success', 'message' => 'Profile berhasil diperbarui'], 200);
    }
}
