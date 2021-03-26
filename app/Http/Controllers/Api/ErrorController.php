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

    public function insert_page(Request $request)
    {
        if ($request->title == null || $request->error_code == null || $request->description == null) {
            return response()->json(['message' => 'Caution, Lengkapi form kosong terlebih dahulu!', 'status' => 'error'], 404);
        }
        if ($request->hasFile('image')) {
            $name = date('YmdHi') . '-' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('private_file/assets/img/error/', $name);
            $request->request->add(['thumbnail' => $name]);
        }

        if (DB::table('exception_error')->where('error_code', $request->error_code)->count() > 0) {
            return response()->json(['message' => 'Error, code error yang anda masukkan telah terdaftar!', 'status' => 'error'], 500);
        }

        DB::insert('insert into exception_error (error_code, title, description, thumbnail) values (?, ?, ?, ?)', [$request->error_code, $request->title, $request->description, $request->thumbnail]);
        return response()->json(['message' => 'Congrats, Page berhasil ditambahkan', 'status' => 'success'], 200);
    }

    public function update_page(Request $request)
    {
        if ($request->title == null || $request->error_code == null || $request->description == null) {
            return response()->json(['message' => 'Caution, Lengkapi form kosong terlebih dahulu!', 'status' => 'error'], 404);
        }
        if ($request->hasFile('image')) {
            $name = date('YmdHi') . '-' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('private_file/assets/img/error/', $name);
            $request->request->add(['thumbnail' => $name]);
        }

        if (DB::table('exception_error')->where('error_code', $request->error_code)->where('id', '!=', $request->id)->count() > 0) {
            return response()->json(['message' => 'Error, code error yang anda masukkan telah terdaftar!', 'status' => 'error'], 500);
        }

        $data = DB::table('exception_error')->where('id', $request->id);
        $data->update($request->except('image'));
        return response()->json(['message' => 'Congrats, Page berhasil diperbaharui', 'status' => 'success'], 200);
    }
}
