<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\GuideDesc;
use App\Models\UserGuides;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserGuideController extends Controller
{
    //
    public function insert_guide(Request $request)
    {
        $request->request->add(['created_by' => auth()->user()->id]);
        UserGuides::create($request->all());
        Activity('Menambah data user guide website');
        return response()->json(['status' => 'success', 'message' => 'User guide berhasil ditambahkan'], 200);
    }

    public function get_guide()
    {
        $data = UserGuides::all();
        return DataTables::of($data)
            ->addColumn('check', function ($data) {
                $check = ' ';
                if ($data->created_by == auth()->user()->id) {
                    $check = '<div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" value="' . $data->id . '" name="id-checkbox" onchange="checkbox_this(this)" id="checkbox-' . $data->id . '" >
                        <label for="checkbox-' . $data->id . '" class="custom-control-label">&nbsp;</label>
                        </div>';
                }
                return $check;
            })
            ->addColumn('action', function ($data) {
                $action = '<a href="#" class="btn btn-icon btn-sm btn-primary" data-value="' . $data->id . '" id="listGuide"><i class="fas fa-eye"></i></a>';
                if ($data->created_by == auth()->user()->id) {
                    $action .= '<a href="#" class="btn btn-icon btn-sm btn-warning" data-value="' . $data->id . '" id="edit"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $data->id . '" id="delete"><i class="fas fa-trash"></i></a>
                                ';
                }
                return $action;
            })
            ->editColumn('created_by', function ($data) {
                return $data->user->name;
            })
            ->rawColumns(['check', 'action'])
            ->make(true);
    }

    public function list_guide()
    {
        $data = GuideDesc::where('guide_id', $_GET['id'])->get();
        $data2 = UserGuides::find($_GET['id'])->first();
        return response()->json(['status' => 'success', 'message' => 'query data berhasil', 'values' => compact('data', 'data2')], 200);
    }
}
