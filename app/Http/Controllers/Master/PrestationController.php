<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrestationController extends Controller
{
    public function prestation()
    {
         return view('main.master.prestation');
    }
}
