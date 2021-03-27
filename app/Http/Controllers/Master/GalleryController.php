<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class GalleryController extends Controller
{
    public function gallery()
    {   
        $category = Category::get();
        return view('main.master.galleries.gallery', compact('category'));
    }
}
