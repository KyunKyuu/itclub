<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Section;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TrashController extends Controller
{
    //
    public function section_get()
    {
        $section = Section::onlyTrashed();
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
            <a href="#" class="btn btn-icon btn-sm btn-info" data-value="' . $section->id . '" id="recycle"><i class="fas fa-recycle"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $section->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->editColumn('created_by', function ($section) {
                return $section->users()->name;
            })
            ->editColumn('created_at', function ($section) {
                return date('d-M-Y H:i', strtotime($section->created_at));
            })
            ->editColumn('deleted_at', function ($section) {
                return date('d-M-Y H:i', strtotime($section->deleted_at));
            })
            ->rawColumns(['check', 'btn', 'status'])
            ->make(true);
    }

    public function section_recovery(Request $request)
    {
        activity('merecovery data sampah section');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                Section::onlyTrashed()->where('id', $value)->restore();
            }
            return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
        }
        Section::onlyTrashed()->where('id', $request->value)->restore();
        return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
    }

    public function section_delete(Request $request)
    {
        activity('menghapus data sampah section');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                Section::onlyTrashed()->where('id', $value)->forceDelete();
            }
            return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
        }
        Section::onlyTrashed()->where('id', $request->value)->forceDelete();
        return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
    }

    public function menu_get()
    {
        $menu = Menu::onlyTrashed();
        return DataTables::of($menu)
            ->addIndexColumn()
            ->addColumn('check', function ($menu) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" value="' . $menu->id . '" name="id-checkbox" onchange="checkbox_this(this)" id="checkbox-' . $menu->id . '" >
                    <label for="checkbox-' . $menu->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($menu) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-info" data-value="' . $menu->id . '" id="recycle"><i class="fas fa-recycle"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $menu->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->editColumn('created_by', function ($menu) {
                return $menu->users()->name;
            })
            ->editColumn('created_at', function ($menu) {
                return date('d-M-Y H:i', strtotime($menu->created_at));
            })
            ->editColumn('deleted_at', function ($menu) {
                return date('d-M-Y H:i', strtotime($menu->deleted_at));
            })
            ->rawColumns(['check', 'btn', 'status'])
            ->make(true);
    }

    public function menu_recovery(Request $request)
    {
        activity('merecovery data sampah menu');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                Menu::onlyTrashed()->where('id', $value)->restore();
            }
            return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
        }
        Menu::onlyTrashed()->where('id', $request->value)->restore();
        return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
    }

    public function menu_delete(Request $request)
    {
        activity('menghapus data sampah menu');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                Menu::onlyTrashed()->where('id', $value)->forceDelete();
            }
            return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
        }
        Menu::onlyTrashed()->where('id', $request->value)->forceDelete();
        return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
    }

    public function submenu_get()
    {
        $submenu = Submenu::onlyTrashed();
        return DataTables::of($submenu)
            ->addIndexColumn()
            ->addColumn('check', function ($submenu) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" value="' . $submenu->id . '" name="id-checkbox" onchange="checkbox_this(this)" id="checkbox-' . $submenu->id . '" >
                    <label for="checkbox-' . $submenu->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($submenu) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-info" data-value="' . $submenu->id . '" id="recycle"><i class="fas fa-recycle"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $submenu->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->editColumn('created_by', function ($submenu) {
                return $submenu->users()->name;
            })
            ->editColumn('created_at', function ($submenu) {
                return date('d-M-Y H:i', strtotime($submenu->created_at));
            })
            ->editColumn('deleted_at', function ($submenu) {
                return date('d-M-Y H:i', strtotime($submenu->deleted_at));
            })
            ->rawColumns(['check', 'btn', 'status'])
            ->make(true);
    }

    public function submenu_recovery(Request $request)
    {
        activity('merecovery data sampah submenu');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                Submenu::onlyTrashed()->where('id', $value)->restore();
            }
            return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
        }
        Submenu::onlyTrashed()->where('id', $request->value)->restore();
        return response()->json(['message' => 'Data berhasil di restore', 'status' => 'success'], 200);
    }

    public function submenu_delete(Request $request)
    {
        activity('menghapus data sampah submenu');
        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                Submenu::onlyTrashed()->where('id', $value)->forceDelete();
            }
            return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
        }
        Submenu::onlyTrashed()->where('id', $request->value)->forceDelete();
        return response()->json(['message' => 'Data berhasil di hapus', 'status' => 'success'], 200);
    }
}
