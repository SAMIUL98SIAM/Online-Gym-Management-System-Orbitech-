<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout()
    {
        if(session()->has('users'))
        {
            session()->pull('users');
            $notifications = array('message'=>'You are logged out','alert-type'=>'success');
            return redirect()->route('auth.login')->with($notifications);
        }

    }
    public function member_logout()
    {
        if(session()->has('members'))
        {
            session()->pull('members');
            $notifications = array('message'=>'You are logged out','alert-type'=>'success');
            return redirect()->route('auth.login')->with($notifications);
        }

    }
}
