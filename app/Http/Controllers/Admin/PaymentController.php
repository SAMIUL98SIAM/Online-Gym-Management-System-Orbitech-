<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Member;
use App\Models\Package;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payment::all();
        $members = Member::all();
        $packages = Package::all();
        return view('admin.payment.index',compact('members','packages'))->with('payment',$payment);
    }

    // public function package(Request $req)
    // {
    //     $req->validate([
    //         'member_id'=> 'required',
    //         'package_id'=> 'required'
    //     ]);
    //     $member = new Member;
    //     $member->package_id = $req->package_id ;
    //     $member->package_counter = '1';
    //     $member_save = $member->save();
    //     $notifications = array('message'=>'Get these package successfully','alert-type'=>'success');
    //     if($member_save)
    //     {
    //         return back()->with($notifications);
    //     }
    //     else
    //     {
    //         return back()->with('fail','try again');
    //     }
    // }

    public function payment(Request $req)
    {
        $req->validate([
            'member_id'=> 'required',
            'payment_type'=> 'required'
        ]);
        $payment = new Payment ;
        $payment->member_id = $req->member_id ;
        $payment->payment_type = $req->payment_type  ;
        $payment_save = $payment->save();


        $notifications = array('message'=>'Payment successfully','alert-type'=>'success');
        if($payment_save)
        {
            return back()->with($notifications);
        }
        else
        {
            return back()->with('fail','try again');
        }
    }

    public function member(Request $req)
    {
        $member = new Member;
        $member->payment_counter = '1';
        $member_save = $member->save();
        $notifications = array('message'=>'Payment successfully','alert-type'=>'success');
        if($member_save)
        {
            return back()->with($notifications);
        }
        else
        {
            return back()->with('fail','try again');
        }
    }
}
