<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Prestation,Division,ImageDivision,Article,Member,Alumni,Gallery,ImageGallery};


class IndexController extends Controller
{
    public function home()
    {
        $prestations = Prestation::latest()->take(3)->get();
        $divisions = Division::get();
        $articlies = Article::where('status','200')->latest()->take(3)->get();
        
        return view('main/home/index', compact('prestations','divisions','articlies'));
    }

    public function tentang()
    {
        $divisions = Division::get();
        return view('main/home/tentang', compact('divisions'));
    }

    public function division($slug)
    {
        $division = Division::where('slug',$slug)->first();
        $imageDivision = ImageDivision::where('division_id',$division->id)->get();
        return view('main/home/division', compact('division','imageDivision'));
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('main/home/gallery', compact('galleries'));
    }

    public function image_gallery($slug)
    {
        $gallery = Gallery::where('slug',$slug)->first();
        $imageGallery = ImageGallery::where('gallery_id', $gallery->id)->get();
        return view('main/home/gallery_image', compact('gallery','imageGallery'));
    }

    public function member($class)
    {   
        
        $members = Member::where('class',$class)->paginate(12);
        return view('main/home/member', compact('members','class'));
    }

    public function alumni()
    {
        $alumnies = Alumni::latest()->paginate(8);
        return view('main/home/alumni', compact('alumnies'));
    }

    public function article()
    {
        $articlies = Article::where('status','200')->paginate(5);
        return view('main/home/article', compact('articlies'));
    }

     public function article_detail($slug)
    {
        $article = Article::where('slug',$slug)->first();
        $articlies = Article::where('status','200')->latest()->take(3)->get();
        return view('main/home/article_detail', compact('article','articlies'));
    }

}
