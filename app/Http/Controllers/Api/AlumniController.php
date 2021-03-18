<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\{Member,Alumni};
use App\Http\Requests\AlumniRequest;

class AlumniController extends Controller
{
    public function index()
    {
        $alumni = Alumni::with('member')->latest()->get();

        return response()->json([
            'status' => 'success',
            'data' => $alumni
        ]);
    }

    public function show($id)
    {
        $alumni = Alumni::with('member')->find($id);
        if(!$alumni)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Alumni not found'
            ],404);
        }
    }

    public function create()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'form create'
        ]);
    }

    public function store(AlumniRequest $request)
    {
        
        $memberId = Member::where('id', $request->member_id)->exists();
        if(!$memberId)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Member not found'
            ],404);
        }

        $alumniId = Alumni::where('member_id', $request->member_id)->exists();
        if($alumniId)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Alumni already exists'
            ],400);
        }

        $alumni = Alumni::create([
            'member_id' => $request->member_id,
            'place' => $request->place
        ]);

        if($request->study)
        {
            $alumni['study'] = $request->study;
            $alumni['work'] = null;
        }elseif($request->work){
            $alumni['study'] = null;
            $alumni['work'] = $request->work;
        }
        $alumni->save();

        return response()->json([
            'status' => 'success',
            'data' => $alumni
        ]);

    }

    public function edit($id)
    {
        $alumni = Alumni::find($id);
        if(!$alumni)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'alumni not found'
            ],404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'halaman form edit',
            'data' => $alumni
        ]);
    }

    public function update(AlumniRequest $request,$id)
    {
        $alumni = Alumni::find($id);
        if(!$alumni)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'alumni not found'
            ],404);
        }

        $memberId = Member::where('id', $request->member_id)->exists();
        if(!$memberId)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'member not found'
            ],404);
        }

        $alumni->update([
            'member_id' => $request->member_id,
            'place' => $request->place
        ]);

        if($request->study)
        {
            $alumni['study'] = $request->study;
            $alumni['work'] = null;
        }elseif($request->work){
            $alumni['study'] = null;
            $alumni['work'] = $request->work;
        }
        $alumni->save();

        return response()->json([
            'status' => 'success',
            'data' => $alumni
        ]);

    }

    public function destroy($id)
    {
        $alumni = Alumni::find($id);
        if(!$alumni){
            return response()->json([
                'status' => 'error',
                'message' => 'alumni not found'
            ]);
        }

        $alumni->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'alumni deleted successfuly'
        ],200);
    }
}
