<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Section;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PreferencesController extends Controller
{
    // !NOTE QUery Section

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
        $request->request->add(['created_by' => auth()->user()->id]);
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

    // !NOTE Menu Query
    public function menu()
    {
        $menu = Menu::all();
        return DataTables::of($menu)
            ->addIndexColumn()
            ->addColumn('check', function ($menu) {
                return  '<div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-' . $menu->id . '">
                        <label for="checkbox-' . $menu->id . '" class="custom-control-label">&nbsp;</label>
                        </div>';
            })
            ->addColumn('btn', function ($menu) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-primary" data-value="' . $menu->id . '" id="edit"><i class="fas fa-edit"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $menu->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->editColumn('created_by', function ($menu) {
                return $menu->users()->name;
            })
            ->editColumn('section_id', function ($menu) {
                return $menu->section()->name;
            })
            ->editColumn('icon', function ($menu) {
                return '<i class="' . $menu->icon . '"></i>';
            })
            ->rawColumns(['check', 'btn', 'status', 'icon'])
            ->make(true);
    }

    public function get_menu($id)
    {
        $section = Menu::find($id);
        return response()->json(['status' => 200, 'message' => 'Get data berhasil', 'data' => $section]);
    }

    public function insert_menu(Request $request)
    {
        $request->request->add(['created_by' => auth()->user()->id]);
        Menu::create($request->all());
        return response()->json(['status' => 200, 'message' => 'Data berhasil ditambahkan!']);
    }

    public function delete_menu(Request $request)
    {
        $section = Menu::find($request->value);
        $section->delete();
        return response()->json(['status' => 200, 'message' => 'Data berhasil dihapus!']);
    }

    public function update_menu(Request $request)
    {
        $section = Menu::find($request->id);
        $section->update($request->all());
        return response()->json(['status' => 200, 'message' => 'Data berhasil diperbaharui!']);
    }


    // !NOTE Menu Query
    public function submenu()
    {
        $submenu = Submenu::all();
        return DataTables::of($submenu)
            ->addIndexColumn()
            ->addColumn('check', function ($submenu) {
                return  '<div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-' . $submenu->id . '">
                        <label for="checkbox-' . $submenu->id . '" class="custom-control-label">&nbsp;</label>
                        </div>';
            })
            ->addColumn('btn', function ($submenu) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-primary" data-value="' . $submenu->id . '" id="edit"><i class="fas fa-edit"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $submenu->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->editColumn('created_by', function ($submenu) {
                return $submenu->users()->name;
            })
            ->editColumn('section_id', function ($submenu) {
                return $submenu->section()->name;
            })
            ->editColumn('icon', function ($submenu) {
                return '<i class="' . $submenu->icon . '"></i>';
            })
            ->rawColumns(['check', 'btn', 'status', 'icon'])
            ->make(true);
    }

    public function get_submenu($id)
    {
        $section = Submenu::find($id);
        return response()->json(['status' => 200, 'message' => 'Get data berhasil', 'data' => $section]);
    }

    public function insert_submenu(Request $request)
    {
        $request->request->add(['created_by' => auth()->user()->id]);
        Submenu::create($request->all());
        return response()->json(['status' => 200, 'message' => 'Data berhasil ditambahkan!']);
    }

    public function delete_submenu(Request $request)
    {
        $section = Submenu::find($request->value);
        $section->delete();
        return response()->json(['status' => 200, 'message' => 'Data berhasil dihapus!']);
    }

    public function update_submenu(Request $request)
    {
        $section = Submenu::find($request->id);
        $section->update($request->all());
        return response()->json(['status' => 200, 'message' => 'Data berhasil diperbaharui!']);
    }
}
