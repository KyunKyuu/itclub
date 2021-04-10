<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{Division, ImageDivision};
use App\Http\Requests\DivisionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class DivisionController extends Controller
{
    public function index()
    {
        if (!empty($_GET['id'])) {
            $data = Division::find($_GET['id']);
            return response()->json(['message' => 'query berhasil', 'status' => 'success', 'data' => $data]);
        }

        $division = Division::all();

        return DataTables::of($division)
            ->addIndexColumn()
            ->addColumn('check', function ($division) {
                return  '<div class="custom-checkbox custom-control">
                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                    </div>';
            })
            ->addColumn('btn', function ($division) {
                return '
            <a href="#" class="btn btn-icon btn-sm btn-primary" data-value="' . $division->id . '" id="edit"><i class="fas fa-edit"></i></a>
            <a href="#" class="btn btn-icon btn-sm btn-danger" data-value="' . $division->id . '" id="delete"><i class="fas fa-trash"></i></a>
            ';
            })
            ->addColumn('imageDivision', function ($division) {
                return '<img src="' . $division->image() . '" width="50">';
            })

            ->rawColumns(['check', 'btn', 'imageDivision'])
            ->make(true);
    }

    public function show($id)
    {
        $division = Division::with('created_by', 'images')->find($id);

        if (!$division) {
            return response()->json([
                'status' => 'error',
                'message' => 'member not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $division
        ], 200);
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
            'slug' => $slug,
            'created_by' => auth()->user()->id
        ]);

        activity('menambah data divisi');

        return response()->json([
            'status' => 'success',
            'message' => 'data created successfuly'
        ]);
    }

    public function edit()
    {
        $division = Division::find($_GET['id']);

        if (!$division) {
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

    public function update(DivisionRequest $request)
    {


        $division = Division::where('id', $request->id)->first();
        if (!$division) {
            return response()->json([
                'status' => 'error',
                'message' => 'division not found'
            ]);
        }

        $slug = Str::slug(request('name'));

        if ($request->image) {
            \Storage::delete($division->image);
            $image = request()->file('image')->store('images/division');
        } elseif ($division->image) {
            $image = $division->image;
        } else {
            $image = null;
        }

        $division->update([
            'name' => $request->name,
            'content' => $request->content,
            'image' =>  $image,
            'slug' => $slug,
            'created_by' => auth()->user()->id
        ]);
       
       activity('mengedit data divisi');
       return response()->json([

            'status' => 'success',
            'message' => 'data update successfuly'
        ], 200);
    }

    public function destroy(Request $request)
    {

        $division = Division::find($request->id);

        if (!$division) {
            return response()->json([
                'status' => 'error',
                'message' => 'division not found'
            ], 404);
        }

        // \Storage::delete($division->image);

        $division->images()->delete();
        $division->delete();
        activity('menghapus data divisi');
        return response()->json([
            'status' => 'success',
            'message' => 'division deleted successfuly'
        ]);
    }
}
