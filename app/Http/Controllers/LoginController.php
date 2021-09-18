<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Member;
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
                   
        if(!$userInfo && !$memberInfo)
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
                    return redirect('/adminPanel');
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
                    return redirect('/memberPanel');
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
       
        //Admin Authentication

        //Member Authentication

        // $memberInfo = Member::where('email','=',$req->email)->first();

        // if(!$memberInfo)
        // {
        //     return back()->with('fail','We do not recognize your email address');
        // }
        // else 
        // {
        //     if(Hash::check($req->password,$memberInfo->password))
        //     {
        //         $req->session()->put('members',$memberInfo->id);
        //         return redirect('/memberPanel');
        //     }
        //     else 
        //     {
        //         return back()->with('fail','Incorrect password');
        //     }
        // }
    }
}
