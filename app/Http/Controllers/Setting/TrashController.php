<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrashController extends Controller
{
    //
    public function section()
    {
        return view('main.setting.section_trash');
    }

    public function menu()
    {
        return view('main.setting.menu_trash');
    }

    public function submenu()
    {
        return view('main.setting.submenu_trash');
    }
}
