<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $user = User::where('name', $request->name)->orWhere('email', $request->email)->count();
        if ($request->name != null && $request->email != null && $request->password != null) {
            if ($user < 1) {
                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'remember_token' => base64_encode($request->name . $request->email),
                    'token' => base64_encode($request->name . $request->email),
                    'role_id' => 1,
                ];

                User::create($data);
                $response = ['status' => 200, 'message' => 'User berhasil ditambahkan, <a href="/auth/login">Login Sekarang</a>'];
            } else {
                $response = ['status' => 500, 'message' => 'User gagal ditambahkan, Username atau email telah digunakan'];
            }
        } else {
            $response = ['status' => 500, 'message' => 'User gagal ditambahkan, mohon lengkapi dulu data diri anda'];
        }
        return response()->json($response);
    }
}
