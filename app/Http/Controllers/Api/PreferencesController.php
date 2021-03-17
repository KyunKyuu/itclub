<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PreferencesController extends Controller
{
    public function section()
    {

        $section = Section::all();
        return DataTables::of($section)
            ->addIndexColumn()
            ->addColumn('check', function ($section) {
                return  '<div class="custom-control custom-checkbox">
                <input type="checkbox" class="customCheck custom-control-input" id="customCheck' . $section->id . '" data-id="' . $section->id . '">
                <label class="custom-control-label" for="customCheck' . $section->id . '"></label>
            </div>';
            })
            ->rawColumns(['check', 'btn', 'access', 'status'])
            ->make(true);
    }
}
