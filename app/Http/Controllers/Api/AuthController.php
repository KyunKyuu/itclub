<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
                $response = ['status' => 'success', 'message' => 'User berhasil ditambahkan, <a href="/auth/login">Login Sekarang</a>'];
            } else {
                $response = ['status' => 'error', 'message' => 'User gagal ditambahkan, Username atau email telah digunakan'];
            }
        } else {
            $response = ['status' => 'error', 'message' => 'User gagal ditambahkan, mohon lengkapi dulu data diri anda'];
        }
        return response()->json($response);
    }

    public function login(Request $request)
    {
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        $user = User::all()->where($fieldType, $request->username)->count();
        if ($user > 0) {
            $verified = User::all()->where($fieldType, $request->username)->where('email_verified_at', '!=', null);
            if ($verified->count() > 0) {
                $active = User::all()->where($fieldType, $request->username)->where('status', 1);
                if ($active->count() > 0) {
                    if (Auth::attempt([$fieldType => $request->username, 'password' => $request->password])) {
                        return response()->json(['message' => 'Login berhasil', 'status' => 'success']);
                    } else {
                        return response()->json(['message' => 'Login gagal, Username atau Password Salah!', 'status' => 'error']);
                    }
                } else {
                    return response()->json(['message' => 'Login gagal, Username belum aktif, atau hubungi admin!', 'status' => 'error']);
                }
            } else {
                return response()->json(['message' => 'Login gagal, Username belum melakukan aktivasi email, mohon lakukan aktivasi terlebih dahulu atau hubungi admin!', 'status' => 'error']);
            }
        } else {
            return response()->json(['message' => 'Login gagal, Username/email belum terdaftar!', 'status' => 'error']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/auth/login');
    }
}
