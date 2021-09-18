<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Member;
use App\Models\Trainer;
use App\Models\Package;
use App\Models\Payment;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert ;
use DB ;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        // echo "Welcome Member Dashboard";
        $data = ['trainer'=>Trainer::where('id','=',session('trainers'))->first()];
        Alert::success('You Successfully logged in','Success Message');
        return view('trainer.trainer_panel',$data) ;   
        // return view('member.member_panel',$data)->with('member',$member);
        // return view('member.member_panel');
    }

    public function profile()
    {
        // echo "Welcome Member Dashboard";
         $data = ['trainer'=>Trainer::where('id','=',session('trainers'))->first()];
        // $id = session('id');
        // $members=Member::where('id',$id)->first();
        return view('trainer.profile',$data);
        // $id = session('id');
        // $memberInfo = Member::where('id',$id)->first();
        // return view('member.profile')->with('memberInfo',$memberInfo);   
    }

    public function update_profile(Request $req)
    {
        $req->validate([
            'trainer_name'=> 'required',
            'email'=> 'required|email',
            'phone'=> 'required|max:11'
        ]);
        // $members = Member::find('id');
        $data = ['trainer'=>Trainer::where('id','=',session('trainers'))->first()];
        $data['trainer'] ->trainer_name = $req->trainer_name ;
        $data['trainer'] ->email = $req->email ; 
        $data['trainer'] ->phone = $req->phone;
        $trainerProfile = $data['trainer'] ->save();
        // $id = session('id');
        // $member = Member::find($id);
        // $member->first_name = $req->first_name ;
        // $member->last_name = $req->last_name ;
        // $member->email = $req->email ; 
        // $member->phone = $req->phone;
        //$memberProfile = $member->save();
        if($trainerProfile)
        {
            return back()->with('success','Hey '.$req->trainer_name.', Your Profile is Updated successfully');
        }
        else 
        {
            return back()->with('fail','try again');
        }
    }
}
