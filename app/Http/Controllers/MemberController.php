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

    public function getPackage()
    {
        $data = ['member'=>Member::where('id','=',session('members'))->first()];
        $packages = Package::all();     
        return view('member.member_package',$data)->with('packages',$packages); 
    }
    
   public function getPayment()
   {
    $data = ['member'=>Member::where('id','=',session('members'))->first()];    
    return view('member.member_payment',$data);
   }

    public function setPayment(Request $req)
    {
        $req->validate([
            'trainer_id'=> 'required',
            'package_id'=> 'required',
            'member_id'=> 'required',
            // 'customer_name'=> 'required',
            'payment_type'=> 'required'
        ]);
        $payment = new Payment ;
        $payment->trainer_id = $req->trainer_id ;
        $payment->package_id = $req->package_id ;
        $payment->member_id = $req->member_id ;
        //$payment->customer_name = $req->customer_name ;
        $payment->payment_type = $req->payment_type  ;
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