<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function user($id = FALSE)
    {
        if ($id) {
        }

        $user = User::all();
        return DataTables::of($user)
            ->addIndexColumn()
            ->addColumn('check', function ($user) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($user) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-primary" data-value="' . $user->id . '" id="edit"><i class="fas fa-edit"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $user->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->editColumn('status', function ($user) {
                $checked = $user->status > 0 ? 'checked' : '';
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-value="' . $user->id . '"> ';
            })
            ->editColumn('role_id', function ($user) {
                return $user->roles->name;
            })
            ->editColumn('email_verified_at', function ($user) {
                if ($user->email_verified_at) {
                    $data = '<a class="text-success"><i class="fas fa-check"></i> Verified</a>';
                } else {
                    $data = '<a class="text-danger"><i class="fas fa-times"></i> Not Verified</a>';
                }

                return $data;
            })
            ->rawColumns(['check', 'btn', 'status', 'email_verified_at'])
            ->make(true);
    }

    public function insert_user(Request $request)
    {
        $request->request->add(['password' => bcrypt($request->passwd), 'created_by' => auth()->user()->id]);
        User::create($request->all());
    }
}
