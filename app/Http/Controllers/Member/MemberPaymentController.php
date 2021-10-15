<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;

use App\Models\Member;
use App\Models\Payment;
use Illuminate\Http\Request;
class MemberPaymentController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ['member'=>Member::where('id','=',session('members'))->first()];
        $members = Member::all();
        return view('member.payment.index',$data)->with('members',$members);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'trainer_id'=> 'required',
            // 'package_id'=> 'required',
            // 'member_id'=> 'required',
            //'customer_name'=> 'required',
            'payment_type'=> 'required'
        ]);
        $data = ['member'=>Member::where('id','=',session('members'))->first()];
        // $payment = new Payment;
        // $payment->member_id = $request->member_id  ;
        // $payment->payment_type = $request->payment_type  ;
        // $payment->payment_counter = '1';
        $data = ['member'=>Member::where('id','=',session('members'))->first()];
        // $data['member'] ->id = $request->id ;
        $package = new Member;
        // $data['member'] ->package_id = $request->package_id ;
        // $data['member'] ->package_name = $request->package_name ;
        $data['member'] ->payment_counter = "1" ;
        $data['member'] ->payment_type = $request->payment_type ;
        $data['member'] ->payment_date = $request->payment_date ;
        //$package = $data['member']->save();
        $payment_save = $data['member']->save();
        $notifications = array('message'=>'You have payment successfully','alert-type'=>'success');
        if($payment_save)
        {
            return redirect('/Member')->with($notifications);
        }
        else
        {
            return back()->with('fail','try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {

    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $req)
    {

    }
}
