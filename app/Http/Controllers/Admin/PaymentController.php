<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
class PaymentController extends Controller
{
    public function index()
    {
        $payment = Payment::all();
        // $data = ['user'=>User::where('id','=',session('users'))->first()];
        // $payment = DB::table('payments')
        //           ->join('packages','payments.package_id','packages.id')
        //           ->select('payments.*')
        //           ->get();
    //    echo "<pre>";
    //    print_r($payment);
        $members = Member::all();
        return view('admin.payment.index',compact('members'))->with('payment',$payment);
    }

    public function payment(Request $req)
    {
        $req->validate([
            // 'trainer_id'=> 'required',
            // 'package_id'=> 'required',
            'member_id'=> 'required',
            // 'customer_name'=> 'required',
            'payment_type'=> 'required'
        ]);
        $payment = new Payment ;
        // $payment->trainer_id = $req->trainer_id ;
        // $payment->package_id = $req->package_id ;
        $payment->member_id = $req->member_id ;
        //$payment->customer_name = $req->customer_name ;
        $payment->payment_type = $req->payment_type  ;
        $payment_save = $payment->save();
        if($payment_save)
        {
            return back()->with('success','Payment successfully');
        }
        else
        {
            return back()->with('fail','try again');
        }
    }
}
