<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
class ImageDivisionController extends Controller
{
    public function image_division()
    {
        $division = Division::get();
        return view('main.master.divisions.image_division',compact('division'));
    }
}
