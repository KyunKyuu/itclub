<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Section;
use App\Models\Submenu;
use Hamcrest\Arrays\IsArray;
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
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" value="' . $section->id . '" name="id-checkbox" onchange="checkbox_this(this)" id="checkbox-' . $section->id . '" >
                    <label for="checkbox-' . $section->id . '" class="custom-control-label">&nbsp;</label>
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
            ->editColumn('status', function ($section) {
                $checked = $section->status > 0 ? 'checked' : '';
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-value="' . $section->id . '"> ';
            })
            ->rawColumns(['check', 'btn', 'status'])
            ->make(true);
    }

    public function get_section($id)
    {
        $section = Section::find($id);
        return response()->json(['status' => 'success', 'message' => 'Get data berhasil', 'data' => $section], 200);
    }

    public function insert_section(Request $request)
    {
        $request->request->add(['created_by' => auth()->user()->id]);
        Section::create($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data berhasil ditambahkan!'], 200);
    }

    public function delete_section(Request $request)
    {
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                $section = Section::find($value);
                $section->delete();
            }
            return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus!'], 200);
        }
        $section = Section::find($request->value);
        $section->delete();
        return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus!'], 200);
    }

    public function update_section(Request $request)
    {
        $section = Section::find($request->id);
        $section->update($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data berhasil diperbaharui!'], 200);
    }

    public function update_status_section(Request $request)
    {
        $section = Section::find($request->id);
        $section->update(['status' => $request->status]);
        return response()->json(['status' => 'success', 'message' => 'Data berhasil diperbaharui!'], 200);
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
            ->editColumn('status', function ($menu) {
                $checked = $menu->status > 0 ? 'checked' : '';
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-value="' . $menu->id . '"> ';
            })
            ->rawColumns(['check', 'btn', 'status', 'icon'])
            ->make(true);
    }

    public function get_menu($id)
    {
        $submenu = Menu::find($id);
        return response()->json(['status' => 'success', 'message' => 'Get data berhasil', 'data' => $submenu], 200);
    }

    public function insert_menu(Request $request)
    {
        $request->request->add(['created_by' => auth()->user()->id]);
        Menu::create($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data berhasil ditambahkan!'], 200);
    }

    public function delete_menu(Request $request)
    {
        $submenu = Menu::find($request->value);
        $submenu->delete();
        return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus!'], 200);
    }

    public function update_menu(Request $request)
    {
        $submenu = Menu::find($request->id);
        $submenu->update($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data berhasil diperbaharui!'], 200);
    }

    public function update_status_menu(Request $request)
    {
        $menu = Menu::find($request->id);
        $menu->update(['status' => $request->status]);
        return response()->json(['status' => 'success', 'message' => 'Data berhasil diperbaharui!'], 200);
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
            ->editColumn('menu_id', function ($submenu) {
                return $submenu->menu()->name;
            })
            ->editColumn('icon', function ($submenu) {
                return '<i class="' . $submenu->icon . '"></i>';
            })
            ->editColumn('status', function ($submenu) {
                $checked = $submenu->status > 0 ? 'checked' : '';
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-value="' . $submenu->id . '"> ';
            })
            ->rawColumns(['check', 'btn', 'status', 'icon'])
            ->make(true);
    }

    public function get_submenu($id)
    {
        $submenu = Submenu::find($id);
        return response()->json(['status' => 'success', 'message' => 'Get data berhasil', 'data' => $submenu], 200);
    }

    public function insert_submenu(Request $request)
    {
        $request->request->add(['created_by' => auth()->user()->id]);
        Submenu::create($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data berhasil ditambahkan!'], 200);
    }

    public function delete_submenu(Request $request)
    {
        $submenu = Submenu::find($request->value);
        $submenu->delete();
        return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus!'], 200);
    }

    public function update_submenu(Request $request)
    {
        $submenu = Submenu::find($request->id);
        $submenu->update($request->all());
        return response()->json(['status' => 'success', 'message' => 'Data berhasil diperbaharui!'], 200);
    }

    public function update_status_submenu(Request $request)
    {
        $submenu = Submenu::find($request->id);
        $submenu->update(['status' => $request->status]);
        return response()->json(['status' => 'success', 'message' => 'Data berhasil diperbaharui!'], 200);
    }
}
