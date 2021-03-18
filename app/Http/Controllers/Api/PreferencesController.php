<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PreferencesController extends Controller
{
    public function section()
    {

        $section = Section::all();
        return DataTables::of($section)
            ->addIndexColumn()
            ->addColumn('check', function ($section) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($section) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-primary" data-value="' . $section->id . '" id="edit"><i class="fas fa-edit"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $section->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->editColumn('created_by', function ($section) {
                return $section->users()->name;
            })
            ->rawColumns(['check', 'btn', 'status'])
            ->make(true);
    }

    public function get_section($id)
    {
        $section = Section::find($id);
        return response()->json(['status' => 200, 'message' => 'Get data berhasil', 'data' => $section]);
    }

    public function insert_section(Request $request)
    {
        $request->request->add(['created_by' => auth()->user()->id, 'status' => 200]);
        Section::create($request->all());
        return response()->json(['status' => 200, 'message' => 'Data berhasil ditambahkan!']);
    }

    public function delete_section(Request $request)
    {
        $section = Section::find($request->value);
        $section->delete();
        return response()->json(['status' => 200, 'message' => 'Data berhasil dihapus!']);
    }

    public function update_section(Request $request)
    {
        $section = Section::find($request->id);
        $section->update($request->all());
        return response()->json(['status' => 200, 'message' => 'Data berhasil diperbaharui!']);
    }
}
