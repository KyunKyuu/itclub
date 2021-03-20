<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuAccessControlller extends Controller
{
    //

    public function role()
    {
        return view('main.setting.roleaccess');
    }

    public function user()
    {
        return view('main.setting.useraccess');
    }
}
