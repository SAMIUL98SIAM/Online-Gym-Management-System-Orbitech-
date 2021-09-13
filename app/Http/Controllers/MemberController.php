<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Member;
use App\Models\Trainer;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert ;
use DB ;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        // echo "Welcome Member Dashboard";
        $data = ['member'=>Member::where('id','=',session('members'))->first()];
        Alert::success('You Successfully logged in','Success Message');
        return view('member.member_panel',$data) ;   
        // return view('member.member_panel',$data)->with('member',$member);
        // return view('member.member_panel');
    }
}