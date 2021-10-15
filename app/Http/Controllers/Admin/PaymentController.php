<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\User;
use App\Models\Member;
use App\Models\Package;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $data = ['user'=>User::where('id','=',session('users'))->first()];
        $payments = Payment::all();
        $members = Member::all();
        $packages = Package::all();
        return view('admin.payment.index',compact('members','packages'),$data)->with('payments',$payments);
    }

    public function search_date(Request $request)
    {
        $data = ['user'=>User::where('id','=',session('users'))->first()];
        $members = Member::where('payment_date','>=',$request->from)->where('payment_date','<=',$request->to)->get();
        return view('admin.payment.index',compact('members'),$data);
        // return redirect('/admin/payment')->with('members',$members);
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
}
