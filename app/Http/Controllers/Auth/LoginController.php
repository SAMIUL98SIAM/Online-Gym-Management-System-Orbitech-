<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Member;
use App\Models\Trainer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $req)
    {
        $req->validate([
            'email'=> 'required|email',
            'password'=> 'required|min:5',
        ]);

        //Admin Authentication
        $userInfo = User::where('email','=',$req->email)->first();
        $memberInfo = Member::where('email','=',$req->email)->first();
        $trainerInfo = Trainer::where('email','=',$req->email)->first();
        $notifications = array('message'=>'You are logged in','alert-type'=>'success');
        if(!$userInfo && !$memberInfo && !$trainerInfo)
        {
            return back()->with('fail','We do not recognize your email address');
        }
        else
        {
            if($userInfo)
            {
                if((Hash::check($req->password,$userInfo->password)))
                {
                    $req->session()->put('users',$userInfo->id);
                    return redirect('/admin/adminPanel')->with($notifications);;
                }
                else
                {
                    return back()->with('fail','Incorrect password');
                }
            }
            elseif($memberInfo){
                if((Hash::check($req->password,$memberInfo->password)))
                {
                    $req->session()->put('members',$memberInfo->id);
                    return redirect('/memberPanel')->with($notifications);;
                }
                else
                {
                    return back()->with('fail','Incorrect password');
                }
            }
            elseif($trainerInfo){
                if((Hash::check($req->password,$trainerInfo->password)))
                {

                 // return redirect()->route('auth.login')->with($notifications);
                    $req->session()->put('trainers',$trainerInfo->id);
                    return redirect('/Trainer')->with($notifications);;

                }
                else
                {
                    return back()->with('fail','Incorrect password');
                }
            }

            // elseif($memberInfo)
            // {
            //     if((Hash::check($req->password,$memberInfo->password)))
            //     {
            //         $req->session()->put('members',$memberInfo->id);
            //         return redirect('/memberPanel');
            //         // if($userInfo->type=='admin')
            //         // {
            //         //     $req->session()->put('users',$userInfo->id);
            //         //     return redirect('/adminPanel');
            //         // }
            //         // elseif($userInfo->type=='member')
            //         // {
            //         //     $req->session()->put('users',$userInfo->id);
            //         //     return redirect('/memberPanel');
            //         // }
            //     }
            //     else
            //     {
            //         return back()->with('fail','Incorrect password');
            //     }
            // }
        }
    }
}
