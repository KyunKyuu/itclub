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
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" value="' . $imageGallery->id . '" name="id-checkbox" onchange="checkbox_this(this)" id="checkbox-' . $imageGallery->id . '" >
                    <label for="checkbox-' . $imageGallery->id . '" class="custom-control-label">&nbsp;</label>
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

        activity('menambah data image Gallery');

        return response()->json([
            'status' => 'success',
            'message' =>  'Data added successfuly'
        ]);


    }


    public function destroy(Request $request)
    {   

        if (is_array($request->value)) {
            foreach ($request->value as $value) {
                $imageGallery = ImageGallery::find($value);
                $imageGallery->delete();
            }
            activity('menghapus data image gallery');
            return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus!'], 200);
        }

        $imageGallery = ImageGallery::find($request->value);

        if(!$imageGallery)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Image not found'
            ],404);
        }

        // \Storage::delete($imageGallery->image);

        $imageGallery->delete();

        activity('menghapus data image Gallery');
        
        return response()->json([
            'status' => 'success',
            'message' => 'Gallery image deleted successfuly'
        ],200);
    }
}
