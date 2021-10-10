<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
class MemberProfileController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // echo "Welcome Member Dashboard";
        $data = ['member'=>Member::where('id','=',session('members'))->first()];
        return view('member.profile.index',$data);
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
    public function update(Request $request)
    {
        $request->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> 'required|email',
            'phone'=> 'required|max:11'
        ]);
        // $members = Member::find('id');
        $data = ['member'=>Member::where('id','=',session('members'))->first()];
        $data['member'] ->first_name = $request->first_name ;
        $data['member'] ->last_name = $request->last_name ;
        $data['member'] ->email = $request->email ;
        $data['member'] ->phone = $request->phone;
        $memberProfile = $data['member'] ->save();
        // $id = session('id');
        // $member = Member::find($id);
        // $member->first_name = $request->first_name ;
        // $member->last_name = $request->last_name ;
        // $member->email = $request->email ;
        // $member->phone = $request->phone;
        //$memberProfile = $member->save();
        $notifications = array('message'=>'Wow!!you updated your profile','alert-type'=>'success');
        if($memberProfile)
        {
            return back()->with($notifications);
        }
        else
        {
            return back()->with('fail','try again');
        }
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
}
