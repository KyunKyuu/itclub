<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Division;
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
        $divisi  = Division::all();
        return view('main.member.schedule', compact('divisi'));
    }
}