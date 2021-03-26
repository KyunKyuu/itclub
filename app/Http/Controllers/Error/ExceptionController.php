<?php

namespace App\Http\Controllers\Error;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExceptionController extends Controller
{
    //
    public function page_200()
    {
        return view('error.exception.page200');
    }

    public function page_300()
    {
        return view('error.exception.page300');
    }

    public function page_403()
    {
        return view('error.exception.page403');
    }

    public function page_404()
    {
        return view('error.exception.page404');
    }

    public function page_500()
    {
        return view('error.exception.page500');
    }
}
