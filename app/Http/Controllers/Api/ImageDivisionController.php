<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{Division, ImageDivision};
use App\Http\Requests\ImageDivisionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ImageDivisionController extends Controller
{
    public function index()
    {
        if (!empty($_GET['id'])) {
            $data = ImageDivision::find($_GET['id']);
            return response()->json(['message' => 'query berhasil', 'status' => 'success', 'data' => $data]);
        }

        $imageDivision = ImageDivision::all();

        return DataTables::of($imageDivision)
            ->addIndexColumn()
            ->addColumn('check', function ($imageDivision) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($imageDivision) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $imageDivision->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->editColumn('division', function ($imageDivision) {   
                return $imageDivision->division->name;
            })
            ->addColumn('imageLearning', function ($imageDivision) {   
                return '<img src="'.$imageDivision->image().'" width="50">';
            })
            ->rawColumns(['check', 'btn','division','imageLearning'])
            ->make(true);
    }

    public function create()
    {
        return response()->json([
            'status' => 'success',
            'message' =>  'form create image division'
        ]);
    }

    public function store(ImageDivisionRequest $request)
    {
        $divison = Division::where('id', $request->division_id)->exists();
        if (!$divison) {
            return response()->json([
                'status' => 'error',
                'message' =>  'division not found'
            ], 404);
        }

        $imageDivision = ImageDivision::create([
            'division_id' => $request->division_id,
            'image' => request()->file('image')->store('images/ImageDivision'),
             'created_by' => auth()->user()->id
        ]);

        activity('menambah data image Division');

        return response()->json([
            'status' => 'success',
            'data' => $imageDivision
        ]);
    }


    public function destroy(Request $request)
    {
        $imageDivision = ImageDivision::find($request->id);

        if (!$imageDivision) {
            return response()->json([
                'status' => 'error',
                'message' => 'Image not found'
            ], 404);
        }

        // Storage::delete($imageDivision->image);

        $imageDivision->delete();

        activity('menghapus data image Division');
        
        return response()->json([
            'status' => 'success',
            'message' => 'division image deleted successfuly'
        ],200);
    }
}
