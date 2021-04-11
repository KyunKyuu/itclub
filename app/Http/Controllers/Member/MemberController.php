<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    //
    public function registration()
    {
        return view('main.member.registration');
    }

    public function schedule()
    {
        return view('main.member.schedule');
    }
}
