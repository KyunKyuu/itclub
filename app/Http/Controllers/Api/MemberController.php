<?php

namespace App\Http\Controllers\Api;

use App\Models\{Activity, Member, Division, User, UserProfile};
use App\Http\Requests\MemberRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MemberController extends Controller
{

    public function index()
    {
        if (!empty($_GET['id'])) {
            $data = Member::find($_GET['id']);
            return response()->json(['message' => 'query berhasil', 'status' => 'success', 'data' => $data]);
        }

        $member = Member::all();

        return DataTables::of($member)
            ->addIndexColumn()
            ->addColumn('check', function ($member) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($member) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-primary" data-value="' . $member->id . '" id="edit"><i class="fas fa-edit"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $member->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->addColumn('imageMember', function ($member) {
                return '<img src="' . $member->image() . '" width="50">';
            })
            ->editColumn('class_majors', function ($member) {
                return $member->class . ' ' . $member->majors;
            })
            ->editColumn('division_id', function ($member) {
                return $member->division->name;
            })
            ->rawColumns(['check', 'btn', 'imageMember'])
            ->make(true);
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
        $user = User::where('id', $request->user_id)->exists();
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'User not found'
            ], 404);
        }

        $memberId = Member::where('user_id', $request->user_id)->exists();
        if ($memberId) {
            return response()->json([
                'status' => 'error',
                'message' => 'Member Already exists'
            ]);
        }

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
            'majors' => $request->majors,
            'status' => 1,
            'user_id' => $request->user_id,
            'entry_year' => $request->entry_year,
            'created_by' => auth()->user()->id
        ]);

        activity('menambah data member');

        return response()->json([
            'status' => 'success',
            'message' => 'data added successfuly'
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

    public function update(MemberRequest $request)
    {
        $member = Member::find($request->id);

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
            'majors' => $request->majors,
            'status' => 1,
            'user_id' => $request->user_id,
            'entry_year' => $request->entry_year,
            'created_by' => auth()->user()->id
        ]);

        activity('mengedit data member');

        return response()->json([
            'status' => 'success',
            'message' => 'member update successfuly'
        ], 200);
    }

    public function destroy(Request $request)
    {

        $member = Member::find($request->id);

        if (!$member) {
            return response()->json([
                'status' => 'error',
                'message' => 'member not found'
            ], 404);
        }

        // \Storage::delete($member->image);

        $member->alumni()->delete();
        $member->delete();

        activity('menghapus data member');

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

    public function get_activity()
    {
        return DataTables::of(Activity::where('user_id', auth()->user()->id))
            ->editColumn('user_id', function ($activity) {
                return $activity->user->name;
            })
            ->editColumn('status', function ($activity) {
                $data = '<div class="badge badge-secondary">Unknown</div>';
                if (strpos($activity->url_access, 'delete') == TRUE) {
                    $data = '<div class="badge badge-danger">Delete</div>';
                } else if (strpos($activity->url_access, 'insert') == TRUE) {
                    $data = '<div class="badge badge-success">Insert</div>';
                } else if (strpos($activity->url_access, 'update') == TRUE) {
                    $data = '<div class="badge badge-warning">Edit</div>';
                } else if (strpos($activity->url_access, 'recovery') == TRUE) {
                    $data = '<div class="badge badge-info">Recovery</div>';
                }
                return $data;
            })
            ->rawColumns(['status'])
            ->make(true);
    }

    public function upgrade(Request $request)
    {
        dd($request->all());
    }
}
