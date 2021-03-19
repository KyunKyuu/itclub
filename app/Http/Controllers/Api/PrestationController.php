<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{Prestation};
use App\Http\Requests\PrestationRequest;

class PrestationController extends Controller
{
    public function index()
    {
        $prestation = Prestation::with('created_by')->latest()->get();

        return response()->json([
            'status' => 'success',
            'data' => $prestation
        ]);
    }

    public function show($id)
    {
        $prestation = Prestation::find($id);
        if(!$prestation)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Prestation not found'
            ],404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $prestation
        ]);
    }

    public function create()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'form untuk creaete'
        ]);
    }

    public function store(PrestationRequest $request)
    {
        $prestation = Prestation::create([
            'name' => $request->name,
            'content' => $request->content,
            'image' => $request->file('image')->store('images/prestation'),
            // 'created_by' => auth()->user()->id
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $prestation
        ]);
    }

    public function edit($id)
    {
        $prestation = Prestation::find($id);
        if(!$prestation)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Prestation not found'
            ],404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'form untuk edit'
        ]);

    }

    public function update(PrestationRequest $request,$id)
    {
        $prestation = Prestation::find($id);
        if(!$prestation)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Prestation not found'
            ],404);
        }

      if($request->image){
            \Storage::delete($prestation->image);
            $image = request()->file('image')->store('images/prestation');
       }elseif($prestation->image){
            $image = $prestation->image;
       }else{
            $image = null;
       }

        $prestation->update([
            'name' => $request->name,
            'content' => $request->content,
            'image' => $image,
            // 'created_by' => auth()->user()->id
        ]);

        return response()->json([
            'status' => 'success',
            'message' => $prestation
        ]);
    }

    public function destroy($id)
    {
        $prestation = Prestation::find($id);

        if(!$prestation)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Prestation not found'
            ],404);
        }

        \Storage::delete($prestation->image);

        $prestation->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'prestation deleted successfuly'
        ],200);
    }
}
