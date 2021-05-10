<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\AuthMail;
use App\Models\User;
use App\Models\UserActivation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
                    'role_id' => 5,
                ];

                $email = $this->_sendMail($request, 'activation');
                if ($email) {
                    return response()->json($email, 403);
                }
                User::create($data);
                $users = User::where('name', $data['name'])->where('email', $data['email'])->get()[0];
                access_create($data['role_id'], $users->id);
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
        $user = User::where($fieldType, $request->username);
        if ($user->count() > 0) {
            $verified = $user->where('email_verified_at', '!=', null);
            if ($verified->count() > 0) {
                $active = $user->where('status', 1);
                if ($active->count() > 0) {
                    if (Auth::attempt([$fieldType => $request->username, 'password' => $request->password])) {
                        return response()->json(['message' => 'Login berhasil', 'status' => 'success', 'username' => $user->get()[0]->name], 200);
                    } else {
                        return response()->json(['message' => 'Login gagal, Username atau Password Salah!', 'status' => 'error'], 500);
                    }
                } else {
                    return response()->json(['message' => 'Login gagal, Username belum aktif, atau hubungi admin!', 'status' => 'error'], 500);
                }
            } else {
                return response()->json(['message' => 'Login gagal, Username belum melakukan aktivasi email, mohon lakukan aktivasi terlebih dahulu atau hubungi admin!', 'status' => 'error'], 500);
            }
        } else {
            return response()->json(['message' => 'Login gagal, Username/email belum terdaftar!', 'status' => 'error'], 404);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/auth/login');
    }

    public function forgotpassword(Request $request)
    {
        $user = User::where('email', $request->email);
        if ($user->count() < 1) {
            return response()->json(['message' => 'Request gagal, Email anda belum terdaftar di situs kami', 'status' => 'error'], 404);
        }

        $request->request->add(['name' => $user->get()[0]->name]);
        $data = $this->_sendMail($request, 'forgotpassword');
        if ($data) {
            return response()->json($data, 403);
        }
        return response()->json(['message' => 'Request berhasil, Link telah terkirim ke email anda!', 'status' => 'success'], 200);
    }

    public function resetpassword(Request $request)
    {
        $user = User::where('email', $request->email);
        if ($user->count() < 1) {
            return response()->json(['message' => 'Request gagal, Email anda belum terdaftar di situs kami', 'status' => 'error'], 404);
        }
        $user->update(['password' => bcrypt($request->password)]);
        return response()->json(['message' => 'Selamat!, Password anda berhasil dirubah <a href="/auth/login">Login Sekarang</a>', 'status' => 'success'], 200);
    }

    private function _sendMail($request, $type)
    {
        $token = base64_encode($request->email . 'itclubsmkn5bandung' . rand(10, 100));
        $data = [
            'email' => $request->email,
            'type' => $type,
            'token' => $token
        ];
        $mail = [
            'title' => 'Account Verify!',
            'email' => $request->email,
            'name' => $request->name,
            'created_at' => date('d M Y, H:i'),
            'type' => $type,
            'token' => $token
        ];
        $activate = UserActivation::where('email', $request->email)->count();
        if ($activate >= 3) {
            return ['message' => 'Gagal memuat request, Email telah melebihi batas request', 'status' => 'error'];
        }
        UserActivation::create($data);
        Mail::to($request->email)->send(new AuthMail($mail));
    }
}
