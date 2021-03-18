<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Section;
use Illuminate\Http\Request;

class PreferencesController extends Controller
{

    public function section()
    {
        return view('main.preferences.section');
    }

    public function menu()
    {
        $section = Section::all();
        $data = ['section' => $section];
        return view('main.preferences.menu', $data);
    }

    public function submenu()
    {
        $menu = Menu::all();
        $data = ['menu' => $menu];
        return view('main.preferences.submenu', $data);
    }
}
