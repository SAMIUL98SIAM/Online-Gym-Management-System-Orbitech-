<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;


class RegistrationController extends Controller
{
    public function index()
    {
        return view('auth.registration');
    }
    public function save(Request $req)
    {
        $req->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> 'required|email|unique:users',
            'phone'=> 'required|max:11',
            'password'=> 'required|min:5|max:13',
            'member_id'=> 'required|unique:users'
            // 'trainer_id'=> 'required|unique:users',
            // 'type'=> 'required',
        ]);
        $user = new User ;
        $user->first_name = $req->first_name ;
        $user->last_name = $req->last_name ;
        $user->email = $req->email ; 
        $user->phone =  $req->phone;
        $user->password = Hash::make($req->password) ;
        $user->member_id = $req->member_id ;
        $user->trainer_id = 0 ;
        $user->type = "member" ;
        //$user->save();
        $save = $user->save();
        if($save)
        {
            return back()->with('success','Registration successfully');
            redirect('/');
        }
        else 
        {
            return back()->with('fail','try again');
        }    
    }    
}
