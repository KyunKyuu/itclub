<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // !NOTE Auth views not API or Query

    public function register()
    {
        return view('main.auth.register');
    }
}
