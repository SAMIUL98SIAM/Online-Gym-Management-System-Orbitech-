<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('');
        $data = ['user'=>User::where('id','=',session('users'))->first()];
        $packages = Package::latest()->get();
        return view('admin.package.index',$data);
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
        $validatedData = $request->validate([
            'package_name'=> 'required',
            'amount'=> 'required'
        ]);

        $package = new Package ;
        $package->package_name = $request->package_name ;
        $package->amount = $request->amount  ;
        // $package_save = $package->save();
        $package->save();
        $notifications = array(
                               'message'=>'You Added '.$request->package_name.'package',
                               'alert-type'=>'success'
                            );
        return redirect()->back()->with($notifications);
        // if($package_save)
        // {
        //     return redirect()->back()->with($notifications);
        // }
        // else
        // {
        //     return back()->with('fail','try again');
        // }
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
         // return view('');
         $data = ['user'=>User::where('id','=',session('users'))->first()];
         $package = Package::find($id);
         return view('admin.package.edit',$data)->with('package',$package);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requestuest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'package_name'=> 'required',
            'amount'=> 'required'
        ]);
        $package = Package::find($id);
        $package->package_name = $request->package_name ;
        $package->amount = $request->amount  ;
        $package_save = $package->save();
        $notifications = array('message'=>'You Updated '.$request->package_name.' package','alert-type'=>'success');
        if($package_save)
        {
            return redirect('/admin/package/create')->with($notifications);
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
        $package = Package::find($id);
        return view('admin.package.delete')->with('package',$package);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy_package =  Package::destroy($id);
        $notifications = array('message'=>'You Deleted these package','alert-type'=>'error');
        if($destroy_package)
        {
            return redirect()->back()->with($notifications);

        }
    }











}
