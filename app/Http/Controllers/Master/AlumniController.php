<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
class AlumniController extends Controller
{
    public function alumni()
    {
        $members = Member::get();

        return view('main.master.members.alumni', compact('members'));
    }
}
