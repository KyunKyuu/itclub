<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    //
    public function page()
    {
        return view('main.setting.errorpage');
    }
}
