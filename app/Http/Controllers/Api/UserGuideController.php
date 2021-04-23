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
        if (!empty($_GET['id'])) {
            $data = UserGuides::find($_GET['id']);
            return response()->json(['status' => 'success', 'message' => 'query data berhasil', 'values' => $data], 200);
        }
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

    public function update_guide(Request $request)
    {
        dd($request->all());
    }

    public function list_guide()
    {
        if (!empty($_GET['parm'])) {
            $data = GuideDesc::find($_GET['id'])->first();
            return response()->json(['status' => 'success', 'message' => 'query data berhasil', 'values' => $data], 200);
        }
        $data = GuideDesc::where('guide_id', $_GET['id'])->get();
        $data2 = UserGuides::find($_GET['id'])->first();
        return response()->json(['status' => 'success', 'message' => 'query data berhasil', 'values' => compact('data', 'data2')], 200);
    }

    public function list_guide_insert(Request $request)
    {
        if ($request->image) {
            $name = auth()->user()->name . '-' . date('YmdHi') . '-' . round(0, 10) . '.' . $request->file('image')->getClientOriginalExtension();
            $image = \Storage::putFileAs('images/user_guides', $request->file('image'), $name);
            $request->request->add(['thumbnail' => $image]);
        }
        $request->request->add(['created_by' => auth()->user()->id]);
        GuideDesc::create($request->all());
        Activity('Menambah data list guide website');
        return response()->json(['status' => 'success', 'message' => 'Data berhasil ditambahkan', 'values' => $request->guide_id], 200);
    }

    public function list_guide_update(Request $request)
    {
        $data = GuideDesc::find($request->guide_id);
        if ($request->description != null && $request->description != ' ') {

            if ($request->image) {
                $name = auth()->user()->name . '-' . date('YmdHi') . '-' . round(0, 10) . '.' . $request->file('image')->getClientOriginalExtension();
                $image = \Storage::putFileAs('images/user_guides', $request->file('image'), $name);
                $request->request->add(['thumbnail' => $image]);
            }

            $data->update($request->all());
            Activity('Memperbaharui data list guide website');
            return response()->json(['status' => 'success', 'message' => 'Data berhasil diperbaharui'], 200);
        }
        return response()->json(['status' => 'info', 'message' => 'Tidak ada data yang diperbaharui'], 200);
    }

    public function list_guide_delete(Request $request)
    {
        $data = GuideDesc::find($request->id);
        $data->delete();
        Activity('menghapus data list guide website');
        return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus'], 200);
    }
}
