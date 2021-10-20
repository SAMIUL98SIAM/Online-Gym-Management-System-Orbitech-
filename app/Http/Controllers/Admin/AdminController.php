<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Validator ;
//use Illuminate\Validation\Validator;
use App\Models\User;
use App\Models\Member;
use App\Models\Package;
use RealRashid\SweetAlert\Facades\Alert ;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $sum_amount = DB::table('packages')
        //             //   ->join('members','members.package_id','packages.id')
        //               ->select('packages.amount')
        //               ->sum('amount');

        $total_expense = DB::table('expenses')->sum('amount');
        $data = ['user'=>User::where('id','=',session('users'))->first()];
        Alert::success('You Successfully logged in','Success Message');
        return view('admin.admin_panel',compact('total_expense'),$data);
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




}
