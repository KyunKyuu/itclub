<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{Category,Gallery};
use App\Http\Requests\GalleryRequest;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::latest()->get();

        return response()->json([
            'status' => 'success',
            'data' => $gallery
        ]);
    }

    public function show($id)
    {
        $gallery = Gallery::with('images','category','created_by')->find($id);
        if(!$gallery)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'gallery not found'
            ],404);
        }

         return response()->json([
                'status' => 'success',
                'data' => $gallery
            ]);
    }

    public function create()
    {
         return response()->json([
                'status' => 'success',
                'message' => 'form untuk create'
            ]);
    }

    public function store(GalleryRequest $request)
    {
        $categoryId = Category::where('id', $request->category_id)->exists();
        if(!$categoryId)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'gallery not found'
            ],404);
        }

        $slug = Str::slug(request('name'));
        
        $gallery = Gallery::create([
            'name' => $request->name,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'image' =>  $request->file('image')->store('images/division'),
            'slug' => $slug,
            // 'created_by' => auth()->user()->id
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $gallery
        ]);
    }

    public function edit($id)
    {
        $gallery = Gallery::find($id);
        if(!$gallery)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'gallery not found'
            ],404);
        }

         return response()->json([
                'status' => 'success',
                'message' => 'form untuk edit'
            ]);
    }

    public function update(GalleryRequest $request,$id)
    {
        $gallery = Gallery::find($id);
        if(!$gallery)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'gallery not found'
            ],404);
        }

        $categoryId = Category::where('id',$request->category_id)->exists();
        if(!$categoryId)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'category not found'
            ],404);
        }

       $slug = Str::slug(request('name'));

       if($request->image){
            \Storage::delete($gallery->image);
            $image = request()->file('image')->store('images/gallery');
       }elseif($gallery->image){
            $image = $gallery->image;
       }else{
            $image = null;
       }

        $gallery->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'image' => $image,
            'slug' => $slug,
            // created_by = auth()->user()->id
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $gallery
        ]);
    }

    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        if(!$gallery)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'gallery not found'
            ],404);
        }

        \Storage::delete($gallery->image);

        $gallery->images()->delete();
        $gallery->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'gallery deleted successfuly'
        ],200);
    }
}
