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

    public function profile()
    {
        // echo "Welcome Member Dashboard";
         $data = ['member'=>Member::where('id','=',session('members'))->first()];
        // $id = session('id');
        // $members=Member::where('id',$id)->first();
        return view('member.profile',$data);
        // $id = session('id');
        // $memberInfo = Member::where('id',$id)->first();
        // return view('member.profile')->with('memberInfo',$memberInfo);
    }

    public function update_profile(Request $req)
    {
        $req->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> 'required|email',
            'phone'=> 'required|max:11'
        ]);
        // $members = Member::find('id');
        $data = ['member'=>Member::where('id','=',session('members'))->first()];
        $data['member'] ->first_name = $req->first_name ;
        $data['member'] ->last_name = $req->last_name ;
        $data['member'] ->email = $req->email ;
        $data['member'] ->phone = $req->phone;
        $memberProfile = $data['member'] ->save();
        // $id = session('id');
        // $member = Member::find($id);
        // $member->first_name = $req->first_name ;
        // $member->last_name = $req->last_name ;
        // $member->email = $req->email ;
        // $member->phone = $req->phone;
        //$memberProfile = $member->save();
        if($memberProfile)
        {
            return back()->with('success','Hey '.$req->first_name.', Your Profile is Updated successfully');
        }
        else
        {
            return back()->with('fail','try again');
        }
    }



    public function getPackage()
    {
        $data = ['member'=>Member::where('id','=',session('members'))->first()];
        $packages = Package::all();
        return view('member.member_package',$data)->with('packages',$packages);
    }

     public function setPackage(Request $req)
     {
        $req->validate([
            'package_id'=> 'required'
        ]);
        $data = ['member'=>Member::where('id','=',session('members'))->first()];
        // $data['member'] ->id = $req->id ;
        $package = new Package;
        //$package->id = $req->id ;
        //$data['member']->$package->id = $req->id ;
        //$package_save = $package->save();
        $data['member'] ->package_id = $req->package_id ;
        // $data['member'] ->package_name = $req->package_name ;
        $data['member'] ->package_counter = "1" ;
        $package = $data['member']->save();
        if($package)
        {
            return back()->with('success','Hey,  Your get these '.$req->package_name.' package');
        }
        else
        {
            return back()->with('fail','try again');
        }
     }

   public function getPayment()
   {
    $data = ['member'=>Member::where('id','=',session('members'))->first()];
    $members = Member::all();
    return view('member.member_payment',$data)->with('members',$members);
   }

    public function setPayment(Request $req)
    {

        $req->validate([
            // 'trainer_id'=> 'required',
            // 'package_id'=> 'required',
            // 'member_id'=> 'required',
            //'customer_name'=> 'required',
            'payment_type'=> 'required'
        ]);
        $data = ['member'=>Member::where('id','=',session('members'))->first()];
        $payment = new Payment;
        // $data['member'] ->package_name = $req->package_name ;
        // $data['member'] ->package_name = $req->package_name ;
        $payment->member_id = $req->member_id  ;
        $payment->payment_type = $req->payment_type  ;
        // $payment = new Payment ;
        // $payment = new Payment ;
        // $payment->trainer_id = $req->trainer_id ;
        // $payment->package_id = $req->package_id ;
        // $payment->member_id = $req->member_id ;
        // $payment->customer_name = $req->customer_name ;
        // $payment->payment_type = $req->payment_type  ;
        $payment_save = $payment->save();
        if($payment_save)
        {
            return back()->with('success','You have Payment successfully');
        }
        else
        {
            return back()->with('fail','try again');
        }
    }
}
