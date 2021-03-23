<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function list_article()
    {
        $category = Category::all();
        $data = ['category' => $category];
        return view('main.article.list_article', ['data' => $data]);
    }
}
