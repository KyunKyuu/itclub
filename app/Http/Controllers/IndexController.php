<?php

namespace App\Http\Controllers;

use App\Mail\AuthMail;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{

    public function dashboard_general()
    {
        return view('main.dashboard.index');
    }

    public function dashboard_user()
    {
        return view('main.dashboard.user');
    }

    public function mail()
    {
        $email =  'riezkanaprianda@gmail.com';
        $data = ['subject' => 'Verify Account!', 'hahaha' => 'hihi'];
        Mail::to($email)->queue(new AuthMail($data));
        return 'Terkirim';
    }

    public function profile_user()
    {
        $user = User::where('name', request()->segment(2))->get()[0];
        $profile = UserProfile::where('user_id', $user->id)->get()[0];
        $data = [
            'user' => $user,
            'profile' => $profile,
        ];
        return view('main.resource.profile_user', ['data' => $data]);
    }

    public function setting_user()
    {
        return view('main.resource.setting_user');
    }

    public function changepassword_setting()
    {
        return view('main.resource.setting_user.changepassword');
    }

    public function activities_user()
    {
        return view('main.resource.activities_user');
    }
}
