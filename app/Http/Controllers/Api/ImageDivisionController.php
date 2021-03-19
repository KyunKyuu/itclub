<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{Division,ImageDivision};
use App\Http\Requests\ImageDivisionRequest;

class ImageDivisionController extends Controller
{
    public function index()
    {
        $imageDivision = ImageDivision::orderBy('division_id', 'DESC')->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $imageDivision
        ]);
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
        if(!$divison)
        {
            return response()->json([
            'status' => 'error',
            'message' =>  'division not found'
          ],404);
        }

        $imageDivision = ImageDivision::create([
            'division_id' => $request->division_id,
            'image' => request()->file('image')->store('images/DivisionLearning'),
             // 'created_by' => auth()->user()->id
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $imageDivision
        ]);

    }


    public function destroy($id)
    {
        $imageDivision = ImageDivision::find($id);

        if(!$imageDivision)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Image not found'
            ],404);
        }

        \Storage::delete($imageDivision->image);

        $imageDivision->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'division image deleted successfuly'
        ],200);
    }
}
