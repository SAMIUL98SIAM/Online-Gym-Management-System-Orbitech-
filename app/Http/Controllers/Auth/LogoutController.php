<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

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
    public function trainer_logout()
    {
        if(session()->has('trainers'))
        {
            session()->pull('trainers');
            $notifications = array('message'=>'You are logged out','alert-type'=>'success');
            return redirect()->route('auth.login')->with($notifications);
        }

    }

}
