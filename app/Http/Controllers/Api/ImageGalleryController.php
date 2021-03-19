<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{Gallery,ImageGallery};
use App\Http\Requests\ImageGalleryRequest;

class ImageGalleryController extends Controller
{
    public function index()
    {
        $imageGallery = ImageGallery::orderBy('gallery_id', 'DESC')->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $imageGallery
        ]);
    }

    public function create()
    {
         return response()->json([
            'status' => 'success',
            'message' =>  'form create image gallery'
        ]);
    }

    public function store(ImageGalleryRequest $request)
    {
        $gallery = Gallery::where('id', $request->gallery_id)->exists();
        if(!$gallery)
        {
            return response()->json([
            'status' => 'error',
            'message' =>  'Gallery not found'
          ],404);
        }

        $imageGallery = ImageGallery::create([
            'gallery_id' => $request->gallery_id,
            'image' => request()->file('image')->store('images/ImageGalleries'),
             // 'created_by' => auth()->user()->id
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $imageGallery
        ]);

    }


    public function destroy($id)
    {
        $imageGallery = ImageGallery::find($id);

        if(!$imageGallery)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Image not found'
            ],404);
        }

        \Storage::delete($imageGallery->image);

        $imageGallery->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Gallery image deleted successfuly'
        ],200);
    }
}
