<?php

namespace App\Http\Controllers\Admin\Member;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Member;
use App\Models\Trainer;
use App\Models\Package;
use App\Models\Payment;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert ;
use DB ;
use Illuminate\Http\Request;

class AdminMemberPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'package_id'=> 'required'
        ]);
        $data = ['member'=>Member::where('id','=',session('members'))->first()];
        // $data['member'] ->id = $request->id ;
        $member = Member::find($id);
        $member->package_id = $request->package_id ;
        // $data['member'] ->package_name = $request->package_name ;
        $member->package_counter = "1" ;
        $package = $member->save();
        $notifications = array('message'=>'You gave these package to the member','alert-type'=>'success');
        if($package)
        {
            return back()->with($notifications);
        }
        else
        {
            return back()->with('fail','try again');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
