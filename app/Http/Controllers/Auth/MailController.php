<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserActivation;
use Illuminate\Http\Request;

class MailController extends Controller
{
    //
    public function activation()
    {
        $user = UserActivation::where('email', $_GET['email'])->where('token', $_GET['token'])->get()[0];
        if ($user) {
            if ($user->status == null) {
                if (time() - strtotime($user->created_at) < 60 * 60) {
                    $user->update(['status' => 'activated']);
                    User::where('email', $_GET['email'])->update(['email_verified_at' => date('Y-m-d H:i:s')]);
                    return redirect('/error/exception/205');
                }
                return redirect('/error/exception/409');
            }
            return redirect('/error/exception/409');
        } else {
            return redirect('/error/exception/405');
        }
    }
    //
    public function forgotpassword()
    {
        $user = UserActivation::where('email', $_GET['email'])->where('token', $_GET['token'])->get()[0];
        if ($user) {
            if ($user->status == null) {
                if (time() - strtotime($user->created_at) < 60 * 60) {
                    $user->update(['status' => 'activated']);
                    return redirect('/auth/resetpassword/getdata?email=' . $_GET['email']);
                }
                return redirect('/error/exception/409');
            }
            return redirect('/error/exception/409');
        } else {
            return redirect('/error/exception/405');
        }
    }
}
