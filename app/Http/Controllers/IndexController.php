<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
        return view('main.dashboard.index');
    }

    public function profile_user()
    {
        return view('main.resource.profile_user');
    }
}
