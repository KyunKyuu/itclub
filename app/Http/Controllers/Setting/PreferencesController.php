<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PreferencesController extends Controller
{

    public function section()
    {
        return view('main.preferences.section');
    }
}
