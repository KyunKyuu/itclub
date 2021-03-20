<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    //
    public function role()
    {
        if (!empty($_GET['id'])) {
            $data = Role::find($_GET['id']);
            return response()->json(['message' => 'query berhasil', 'status' => 'success', 'data' => $data]);
        }

        $role = Role::all();
        return DataTables::of($role)
            ->addIndexColumn()
            ->addColumn('check', function ($role) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($role) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-primary" data-value="' . $role->id . '" id="edit"><i class="fas fa-edit"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $role->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->editColumn('created_by', function ($role) {
                return $role->user->name;
            })
            ->rawColumns(['check', 'btn', 'status', 'email_verified_at'])
            ->make(true);
    }

    public function insert_role(Request $request)
    {
        $request->request->add(['created_by' => auth()->user()->id]);
        Role::create($request->all());
        return response()->json(['message' => 'Data berhasil ditambahkan', 'status' => 'success']);
    }

    public function delete_role(Request $request)
    {
        $role = Role::find($request->id);
        $role->delete();
        return response()->json(['message' => 'Data berhasil dihapus', 'status' => 'success']);
    }

    public function get_role()
    {
        $data = Role::all();
        return response()->json(['message' => 'Query data berhasil', 'status' => 'success', 'data' => $data]);
    }
}
