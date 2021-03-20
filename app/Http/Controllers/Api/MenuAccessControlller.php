<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Section;
use App\Models\Submenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class MenuAccessControlller extends Controller
{
    //
    public function section_get()
    {
        $section = Section::all();
        return DataTables::of($section)
            ->addIndexColumn()
            ->addColumn('btn', function ($section) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-primary" data-value="' . $section->id . '" id="edit"><i class="fas fa-edit"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $section->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->addColumn('access', function ($section) {
                $access = DB::table('set_access_section')->where('section_id', $section->id)->where('role_id', $_GET['id'])->get()->count();
                $checked = $access > 0 ? 'checked' : ' ';
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-value="' . $section->id . '"> ';
            })
            ->rawColumns(['check', 'btn', 'access'])
            ->make(true);
    }

    public function menu_get()
    {
        $menu = Menu::all();
        return DataTables::of($menu)
            ->addIndexColumn()
            ->addColumn('btn', function ($menu) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-primary" data-value="' . $menu->id . '" id="edit"><i class="fas fa-edit"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $menu->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->addColumn('access', function ($menu) {
                $access = DB::table('set_access_menu')->where('menu_id', $menu->id)->where('role_id', $_GET['id'])->get()->count();
                $checked = $access > 0 ? 'checked' : ' ';
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-value="' . $menu->id . '"> ';
            })
            ->rawColumns(['check', 'btn', 'access'])
            ->make(true);
    }

    public function submenu_get()
    {
        $submenu = Submenu::all();
        return DataTables::of($submenu)
            ->addIndexColumn()
            ->addColumn('btn', function ($submenu) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-primary" data-value="' . $submenu->id . '" id="edit"><i class="fas fa-edit"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $submenu->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->addColumn('access', function ($submenu) {
                $access = DB::table('set_access_submenu')->where('submenu_id', $submenu->id)->where('role_id', $_GET['id'])->get()->count();
                $checked = $access > 0 ? 'checked' : ' ';
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-value="' . $submenu->id . '"> ';
            })
            ->rawColumns(['check', 'btn', 'access'])
            ->make(true);
    }
}
