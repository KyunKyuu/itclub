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
            ->addColumn('access', function ($section) {
                $access = DB::table('set_access_section')->where('section_id', $section->id)->where('role_id', $_GET['id'])->count();
                $checked = $access > 0 ? 'checked' : ' ';
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-value="' . $section->id . '" data-role="' . $_GET['id'] . '" data-id="section"> ';
            })
            ->rawColumns(['check', 'btn', 'access'])
            ->make(true);
    }

    public function menu_get()
    {
        $menu = Menu::all();
        return DataTables::of($menu)
            ->addIndexColumn()
            ->addColumn('access', function ($menu) {
                $access = DB::table('set_access_menu')->where('menu_id', $menu->id)->where('role_id', $_GET['id'])->count();
                $checked = $access > 0 ? 'checked' : ' ';
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-value="' . $menu->id . '" data-role="' . $_GET['id'] . '" data-id="menu"> ';
            })
            ->rawColumns(['check', 'btn', 'access'])
            ->make(true);
    }

    public function submenu_get()
    {
        $submenu = Submenu::all();
        return DataTables::of($submenu)
            ->addIndexColumn()
            ->addColumn('access', function ($submenu) {
                $access = DB::table('set_access_submenu')->where('submenu_id', $submenu->id)->where('role_id', $_GET['id'])->count();
                $checked = $access > 0 ? 'checked' : ' ';
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-value="' . $submenu->id . '" data-role="' . $_GET['id'] . '" data-id="submenu"> ';
            })
            ->rawColumns(['check', 'btn', 'access'])
            ->make(true);
    }

    public function section_change(Request $request)
    {
        $access = DB::table('set_access_section')->where('section_id', $request->value)->where('role_id', $request->roleid);
        if ($access->count() > 0) {
            $access->delete();
            return response()->json(['message' => 'Access berhasil dihapus!', 'status' => 'success']);
        } else {
            DB::insert('insert into set_access_section (role_id, created_by, section_id) values (?, ?, ?)', [$request->roleid, auth()->user()->id, $request->value]);
            return response()->json(['message' => 'Access berhasil ditambahkan!', 'status' => 'success']);
        }
    }

    public function menu_change(Request $request)
    {
        $access = DB::table('set_access_menu')->where('menu_id', $request->value)->where('role_id', $request->roleid);
        if ($access->count() > 0) {
            $access->delete();
            return response()->json(['message' => 'Access berhasil dihapus!', 'status' => 'success']);
        } else {
            DB::insert('insert into set_access_menu (role_id, created_by, menu_id) values (?, ?, ?)', [$request->roleid, auth()->user()->id, $request->value]);
            return response()->json(['message' => 'Access berhasil ditambahkan!', 'status' => 'success']);
        }
    }

    public function submenu_change(Request $request)
    {
        $access = DB::table('set_access_submenu')->where('submenu_id', $request->value)->where('role_id', $request->roleid);
        if ($access->count() > 0) {
            $access->delete();
            return response()->json(['message' => 'Access berhasil dihapus!', 'status' => 'success']);
        } else {
            DB::insert('insert into set_access_submenu (role_id, created_by, submenu_id) values (?, ?, ?)', [$request->roleid, auth()->user()->id, $request->value]);
            return response()->json(['message' => 'Access berhasil ditambahkan!', 'status' => 'success']);
        }
    }
}
