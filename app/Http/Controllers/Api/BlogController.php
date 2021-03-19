<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{Blog,Category};
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::with('categories')->latest()->get();
        return response([
            'status' => 'success',
            'data' => $blog
        ]);
    }

    public function show($id)
    {
        $blog = Blog::with('categories')->find($id);
        if(!$blog)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'blog not found'
            ],404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $blog
        ]);
    }

    public function create()
    {
        $category = Category::get();
        return response()->json([
            'status' => 'success',
            'message' => 'form untuk create',
            'categories' => $category
        ]);
    }

    public function store(BlogRequest $request)
    {
       $blog = Blog::create([
        'name' => $request->name,
        'content' => $request->content,
        'slug' => Str::slug(request('name')),
        'image' => $request->image ? request()->file('image')->store('images/blog') : null,
        // 'created_by' => auth()->user()->id
       ]);

       $blog->categories()->sync($request->categories);

       return response()->json([
         'status' => 'success',
         'data' => $blog
       ]);
    }

    public function edit($id)
    {

        $blog = Blog::find($id);
        if(!$blog)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'blog not found'
            ],404);
        }

        $category = Category::get();
        return response()->json([
            'status' => 'success',
            'message' => 'form untuk edit',
            'categories' => $category
        ]);
    }

    public function update(BlogRequest $request,$id)
    {
        $blog = Blog::find($id);
        if(!$blog)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'blog not found'
            ],404);
        }

       if($request->image){
            \Storage::delete($blog->image);
            $image = request()->file('image')->store('images/blog');
       }elseif($blog->image){
            $image = $blog->image;
       }else{
            $image = null;
       }

       $blog->update([
        'name' => $request->name,
        'content' => $request->content,
        'slug' => Str::slug(request('name')),
        'image' => $image,
        // 'created_by' => auth()->user()->id
       ]);

        $blog->categories()->sync($request->categories);

        return response()->json([
            'status' => 'success',
            'data' => $blog
        ]);
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        if(!$blog)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'blog not found'
            ],404);
        }

        \Storage::delete($blog->image);
        $blog->categories()->detach();
        $blog->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'blog deleted successfuly '
        ]);

    }
}
