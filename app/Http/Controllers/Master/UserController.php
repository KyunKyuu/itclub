<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user()
    {
        $role = Role::all();
        return view('main.master.user', ['roles' => $role]);
    }
}
