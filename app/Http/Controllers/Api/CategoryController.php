<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{Category};
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::with('blogs', 'galleries', 'created_by')->latest()->get();

        return response()->json([
            'status' => 'success',
            'data' => $category
        ]);
    }

    public function show($id)
    {
        $category = Category::with('blogs', 'galleries', 'created_by')->find($id);
        if(!$category)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'category not found'
            ],404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $category
        ]);
    }

    public function create()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'form untuk create'
        ]);
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create([
            'name' => $request->name,
            // 'created_by' => auth()->user()->id
        ]);

            return response()->json([
                'status' => 'success',
                'data' => $category
            ],);
        
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if(!$category)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'category not found'
            ],404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'form untuk edit',
            'data' => $category
        ]);
    }

    public function update(CategoryRequest $request,$id)
    {
        $category = Category::find($id);
        if(!$category)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'category not found'
            ],404);
        }

        $category->update([
            'name' => $request->name,
            // 'created_by' => auth()->user()->id
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $category
        ]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if(!$category)
        {
            return response()->json([
                'status' => 'success',
                'message' => 'category not found'
            ],404);
        }
        $category->blogs()->detach();
        $category->galleries()->delete();
        $category->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'category delete succesfuly'
        ]);
    }
}
