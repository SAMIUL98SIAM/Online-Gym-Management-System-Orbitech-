<?php

namespace App\Http\Controllers\Member;

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

class MemberController extends Controller
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
        Alert::success('You Successfully logged in','Success Message');
        return view('member.member_panel',$data) ;
        // return view('member.member_panel',$data)->with('member',$member);
        // return view('member.member_panel');
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



    // public function profile()
    // {
    //     // echo "Welcome Member Dashboard";
    //      $data = ['member'=>Member::where('id','=',session('members'))->first()];
    //     return view('member.profile',$data);
    // }

    // public function update_profile(Request $req)
    // {
    //     $req->validate([
    //         'first_name'=> 'required',
    //         'last_name'=> 'required',
    //         'email'=> 'required|email',
    //         'phone'=> 'required|max:11'
    //     ]);
    //     // $members = Member::find('id');
    //     $data = ['member'=>Member::where('id','=',session('members'))->first()];
    //     $data['member'] ->first_name = $req->first_name ;
    //     $data['member'] ->last_name = $req->last_name ;
    //     $data['member'] ->email = $req->email ;
    //     $data['member'] ->phone = $req->phone;
    //     $memberProfile = $data['member'] ->save();
    //     // $id = session('id');
    //     // $member = Member::find($id);
    //     // $member->first_name = $req->first_name ;
    //     // $member->last_name = $req->last_name ;
    //     // $member->email = $req->email ;
    //     // $member->phone = $req->phone;
    //     //$memberProfile = $member->save();
    //     if($memberProfile)
    //     {
    //         return back()->with('success','Hey '.$req->first_name.', Your Profile is Updated successfully');
    //     }
    //     else
    //     {
    //         return back()->with('fail','try again');
    //     }
    //}



    // public function getPackage()
    // {
    //     $data = ['member'=>Member::where('id','=',session('members'))->first()];
    //     $packages = Package::all();
    //     return view('member.package.member_package',$data)->with('packages',$packages);
    // }

    //  public function setPackage(Request $req)
    //  {
    //     $req->validate([
    //         'package_id'=> 'required'
    //     ]);
    //     $data = ['member'=>Member::where('id','=',session('members'))->first()];
    //     // $data['member'] ->id = $req->id ;
    //     $package = new Package;
    //     //$package->id = $req->id ;
    //     //$data['member']->$package->id = $req->id ;
    //     //$package_save = $package->save();
    //     $data['member'] ->package_id = $req->package_id ;
    //     // $data['member'] ->package_name = $req->package_name ;
    //     $data['member'] ->package_counter = "1" ;
    //     $package = $data['member']->save();
    //     if($package)
    //     {
    //         return back()->with('success','Hey,  Your get these '.$req->package_name.' package');
    //     }
    //     else
    //     {
    //         return back()->with('fail','try again');
    //     }
    //  }

   public function getPayment()
   {

   }

    public function setPayment(Request $req)
    {


    }
}
