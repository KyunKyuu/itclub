<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{Category};
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
class CategoryController extends Controller
{
    public function index()
    {
        if (!empty($_GET['id'])) {
            $data = Category::find($_GET['id']);
            return response()->json(['message' => 'query berhasil', 'status' => 'success', 'data' => $data]);
        }

        $category = Category::all();

        return DataTables::of($category)
            ->addIndexColumn()
            ->addColumn('check', function ($category) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" value="' . $category->id . '" name="id-checkbox" onchange="checkbox_this(this)" id="checkbox-' . $category->id . '" >
                    <label for="checkbox-' . $category->id . '" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($category) {
                return '
             <a href="#" class="btn btn-icon btn-sm btn-primary" data-value="' . $category->id . '" id="edit"><i class="fas fa-edit"></i></a>    
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $category->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->rawColumns(['check', 'btn'])
            ->make(true);
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
            'created_by' => auth()->user()->id
        ]);

        activity('menambah data category');

            return response()->json([
                'status' => 'success',
                'message' => 'data added succesfuly'
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

    public function update(CategoryRequest $request)
    {
        $category = Category::find($request->id);
        if(!$category)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'category not found'
            ],404);
        }

        $category->update([
            'name' => $request->name,
            'created_by' => auth()->user()->id
        ]);

         activity('mengedit data category');

        return response()->json([
            'status' => 'success',
            'message' => 'data update succesfuly'
        ]);
    }

    public function destroy(Request $request)
    {
         if (is_array($request->value)) {
            foreach ($request->value as $value) {
                $category = Category::find($value);
                $category->blogs()->detach();
                $category->galleries()->delete();
                $category->delete();
            }
            activity('menghapus data category');
            return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus!'], 200);
        }

        $category = Category::find($request->value);
        if(!$category)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'category not found'
            ],404);
        }
        $category->blogs()->detach();
        $category->galleries()->delete();
        $category->delete();

        activity('menghapus data category');
        return response()->json([
            'status' => 'success',
            'message' => 'category delete succesfuly'
        ]);
    }
}
