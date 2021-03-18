<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
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
}
