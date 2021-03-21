<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuAccess;
use App\Models\Section;
use App\Models\SectionAccess;
use App\Models\Submenu;
use App\Models\SubmenuAccess;
use App\Models\User;
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

    public function users_get()
    {
        $users = User::all();
        return DataTables::of($users)
            ->addIndexColumn()
            ->addColumn('access', function ($users) {
                return '<div class="btn-group mb-3 btn-group-sm" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-primary" data-id="section" data-value="' . $users->id . '">Section</button>
                            <button type="button" class="btn btn-outline-primary" data-id="menu" data-value="' . $users->id . '">Menu</button>
                            <button type="button" class="btn btn-outline-primary" data-id="submenu" data-value="' . $users->id . '">Submenu</button>
                        </div>';
            })
            ->rawColumns(['access'])
            ->make(true);
    }

    public function users_section()
    {
        $section = Section::all();
        return DataTables::of($section)
            ->addIndexColumn()
            ->addColumn('access', function ($section) {
                $access = SectionAccess::where('user_id', $_GET['id'])->where('section_id', $section->id)->count();
                $checked = $access > 0 ? 'checked' : ' ';
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-value="' . $section->id . '" data-user="' . $_GET['id'] . '" data-id="section"> ';
            })
            ->rawColumns(['access'])
            ->make(true);
    }

    public function users_menu()
    {
        $menu = Menu::all();
        return DataTables::of($menu)
            ->addIndexColumn()
            ->addColumn('access', function ($menu) {
                // cek apakah section nya granted
                $check = SectionAccess::where('user_id', $_GET['id'])->where('section_id', $menu->section_id)->count();
                // cek apakah granted/denied
                $access = MenuAccess::where('user_id', $_GET['id'])->where('menu_id', $menu->id)->count();
                $checked = $access > 0 ? 'checked' : ' ';
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-value="' . $menu->id . '" data-user="' . $_GET['id'] . '" data-id="menu"> ';
            })
            ->rawColumns(['access'])
            ->make(true);
    }

    public function users_submenu()
    {
        $submenu = Submenu::all();
        return DataTables::of($submenu)
            ->addIndexColumn()
            ->addColumn('access', function ($submenu) {
                $access = SubmenuAccess::where('user_id', $_GET['id'])->where('submenu_id', $submenu->id)->count();
                $checked = $access > 0 ? 'checked' : ' ';
                return '<input type="checkbox" class="input-toggle" ' . $checked . ' data-value="' . $submenu->id . '" data-user="' . $_GET['id'] . '" data-id="submenu"> ';
            })
            ->rawColumns(['access'])
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

    public function users_change_section(Request $request)
    {
        $access = SectionAccess::where('section_id', $request->value)->where('user_id', $request->id);
        if ($access->count() > 0) {
            $access->delete();
            return response()->json(['message' => 'Access berhasil dihapus!', 'status' => 'success']);
        } else {
            SectionAccess::create(['user_id' => $request->id, 'section_id' => $request->value, 'created_by' => auth()->user()->id]);
            return response()->json(['message' => 'Access berhasil ditambahkan!', 'status' => 'success']);
        }
    }

    public function users_change_menu(Request $request)
    {
        $access = MenuAccess::where('menu_id', $request->value)->where('user_id', $request->id);
        if ($access->count() > 0) {
            $access->delete();
            return response()->json(['message' => 'Access berhasil dihapus!', 'status' => 'success']);
        } else {
            MenuAccess::create(['user_id' => $request->id, 'menu_id' => $request->value, 'created_by' => auth()->user()->id]);
            return response()->json(['message' => 'Access berhasil ditambahkan!', 'status' => 'success']);
        }
    }

    public function users_change_submenu(Request $request)
    {
        $access = SubmenuAccess::where('submenu_id', $request->value)->where('user_id', $request->id);
        if ($access->count() > 0) {
            $access->delete();
            return response()->json(['message' => 'Access berhasil dihapus!', 'status' => 'success']);
        } else {
            SubmenuAccess::create(['user_id' => $request->id, 'submenu_id' => $request->value, 'created_by' => auth()->user()->id]);
            return response()->json(['message' => 'Access berhasil ditambahkan!', 'status' => 'success']);
        }
    }
}
