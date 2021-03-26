<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
class ImageGalleryController extends Controller
{
    public function image_gallery()
    {
        $gallery = Gallery::get();
        return view('main.master.galleries.image_gallery',compact('gallery'));
    }
}
