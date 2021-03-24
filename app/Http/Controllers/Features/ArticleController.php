<?php

namespace App\Http\Controllers\Features;

use App\Http\Controllers\Controller;
use App\Models\Blog;
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

    public function article($id, $slug)
    {
        $blog = Blog::find($id);
        $status = [
            ['id' => 100, 'value' => 'draft'],
            ['id' => 200, 'value' => 'published'],
        ];
        $data = ['blog' => $blog, 'status' => $status];
        return view('main.article.view_article', ['data' => $data]);
    }
}
