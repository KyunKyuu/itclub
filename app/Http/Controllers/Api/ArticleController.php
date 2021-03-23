<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\CategoryBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    //
    public function get_article()
    {
        $article = Article::all();
        return DataTables::of($article)->make(true);
    }

    public function insert_article(Request $request)
    {
        if ($request->title == null) {
            return response()->json(['message' => 'Error, Lengkapi form kosong terlebih dahulu!', 'status' => 'error'], 500);
        }
        if ($request->hasFile('image')) {
            $name = auth()->user()->name . '-' . date('YmdHi') . '-' . round(0, 10) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('private_file/user/image-article/', $name);
            $request->request->add(['thumbnail' => $name]);
        }
        $request->request->add(['user_id' => auth()->user()->id, 'slug' => str_replace(" ", "-", $request->title)]);
        $blog = Article::create($request->except('image'));

        if ($request->category) {
            foreach ($request->category as $category) {
                DB::insert('insert into blog_category (blog_id, category_id) values (?, ?)', [$blog->id, $category]);
            }
        }

        return response()->json(['message' => 'Selamat, article berhasil ditambahkan!', 'status' => 'success'], 200);
    }
}
