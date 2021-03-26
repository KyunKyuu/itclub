<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ErrorController extends Controller
{
    //
    public function page()
    {
        $page = DB::table('exception_error')->get();
        return DataTables::of($page)
            ->addColumn('btn', function ($page) {
                return '<div class="btn-group mb-3 btn-group-sm" role="group" aria-label="Basic example">
                <button type="button" id="Preview" data-value="' . $page->id . '" class="btn btn-primary"><i class="fas fa-eye"></i></button>
                <button type="button" id="Edit" data-value="' . $page->id . '" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                <button type="button" id="Delete" data-value="' . $page->id . '" class="btn btn-danger"><i class="fas fa-trash"></i></button>
              </div>';
            })
            ->rawColumns(['btn'])
            ->make(true);
    }

    public function get_page($id)
    {
        $page = DB::table('exception_error')->where('id', $id)->get();
        return response()->json(['message' => 'Query data berhasil', 'status' => 'success', 'data' => $page[0]], 200);
    }
}
