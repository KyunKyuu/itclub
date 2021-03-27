<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{Gallery,ImageGallery};
use App\Http\Requests\ImageGalleryRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ImageGalleryController extends Controller
{
    public function index()
    {
       if (!empty($_GET['id'])) {
            $data = ImageGallery::find($_GET['id']);
            return response()->json(['message' => 'query berhasil', 'status' => 'success', 'data' => $data]);
        }

        $imageGallery = ImageGallery::all();

        return DataTables::of($imageGallery)
            ->addIndexColumn()
            ->addColumn('check', function ($imageGallery) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($imageGallery) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $imageGallery->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->editColumn('gallery_id', function ($imageGallery) {   
                return $imageGallery->gallery->name;
            })
            ->addColumn('images', function ($imageGallery) {   
                return '<img src="'.$imageGallery->image().'" width="50">';
            })
            ->rawColumns(['check', 'btn','gallery_id','images'])
            ->make(true);
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
            'created_by' => auth()->user()->id
        ]);

        return response()->json([
            'status' => 'success',
            'message' =>  'Data added successfuly'
        ]);

    }


    public function destroy(Request $request)
    {
        $imageGallery = ImageGallery::find($request->id);

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
