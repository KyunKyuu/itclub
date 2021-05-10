<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class GalleryController extends Controller
{
    public function gallery()
    {   
      
        return view('main.master.galleries.gallery');
    }
}
