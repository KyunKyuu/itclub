<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{Division,ImageDivision};
use App\Http\Requests\DivisionRequest;
use Illuminate\Support\Str;

class DivisionController extends Controller
{
    public function index()
    {
       $divisions = Division::with('created_by','images')->latest()->get();
        return response()->json([
            'status' => 'success',
            'data' => $divisions
        ]);
    }

    public function show($id)
    {
        $division = Division::with('created_by','images')->find($id);

        if(!$division)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'member not found'
            ],404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $division
        ],200);
    }

    public function create()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'form create'
        ]);
    }

    public function store(DivisionRequest $request)
    {
        $slug = Str::slug(request('name'));
        $division = Division::create([
            'name' => $request->name,
            'content' => $request->content,
            'image' =>  $request->file('image')->store('images/division'),
            'slug' => $slug
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $division
        ]);
    }

    public function edit($id)
    {
        $division = Division::find($id);

        if(!$division)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'division not found'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'form edit',
            'data' => $division
        ]);
    }

    public function update(DivisionRequest $request, $id)
    {
        $division = Division::find($id);

        if(!$division)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'division not found'
            ]);
        }

       $slug = Str::slug(request('name'));

       if($request->image){
            \Storage::delete($division->image);
            $image = request()->file('image')->store('images/division');
       }elseif($division->image){
            $image = $division->image;
       }else{
            $image = null;
       }

        $division->update([
            'name' => $request->name,
            'content' => $request->content,
            'image' =>  $image,
            'slug' => $slug
        ]);
       
       return response()->json([
            'status' => 'success',
            'data' => $division
       ],200);

    }

    public function destroy($id)
    {
        $division = Division::find($id);

        if(!$division)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'division not found'
            ],404);
        }

        \Storage::delete($division->image);

        $division->images()->delete();
        $division->members()->delete();
        $division->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'division deleted successfuly'
        ],200);
    }
}
