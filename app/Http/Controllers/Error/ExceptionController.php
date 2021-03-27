<?php

namespace App\Http\Controllers\Error;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExceptionController extends Controller
{
    //
    public function page()
    {
        $data = DB::table('exception_error')->where('error_code', request()->segment(3))->get()[0];
        return view('error.exception.page', ['data' => $data]);
    }
}
