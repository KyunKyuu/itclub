<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Section;
use App\Models\Submenu;
use Illuminate\Http\Request;
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
            ->rawColumns(['check', 'btn', 'status', 'email_verified_at'])
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
            ->rawColumns(['check', 'btn', 'status', 'email_verified_at'])
            ->make(true);
    }

    public function submenu_get()
    {
        $submenu = Subsubmenu::all();
        return DataTables::of($submenu)
            ->addIndexColumn()
            ->addColumn('btn', function ($submenu) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-primary" data-value="' . $submenu->id . '" id="edit"><i class="fas fa-edit"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $submenu->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->rawColumns(['check', 'btn', 'status', 'email_verified_at'])
            ->make(true);
    }
}
