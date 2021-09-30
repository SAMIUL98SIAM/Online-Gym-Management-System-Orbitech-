<?php

namespace App\Http\Controllers;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
       // return view('');
        $data = ['user'=>User::where('id','=',session('users'))->first()];
        $packages = Package::all();  
        return view('package.index',$data)->with('packages',$packages);
    }

    public function package(Request $req)
    {
        $req->validate([
            'package_name'=> 'required',
            'amount'=> 'required'
        ]);
        $package = new Package ;
        $package->package_name = $req->package_name ;
        $package->amount = $req->amount  ;
        $package_save = $package->save();
        if($package_save)
        {
            return back()->with('success','Package Added successfully');
        }
        else 
        {
            return back()->with('fail','try again');
        }    
    }

    public function edit_package($id)
    {
       // return view('');
        $data = ['user'=>User::where('id','=',session('users'))->first()];
        $package = Package::find($id);  
        return view('package.edit_package',$data)->with('package',$package);
    }
     
    public function update_package(Request $req,$id)
    {
        $req->validate([
            'package_name'=> 'required',
            'amount'=> 'required'
        ]);
        $package = Package::find($id);
        $package->package_name = $req->package_name ;
        $package->amount = $req->amount  ;
        $package_save = $package->save();
        if($package_save)
        {
            return back()->with('success','Package Modified');
        }
        else 
        {
            return back()->with('fail','try again');
        } 
        
        
    }

         
    public function delete_package($id){
        $package = Package::find($id);
        return view('package.index')->with('package',$package);
    }

    public function destroy_package(Request $req, $id){
        $destroy_package =  Package::destroy($id);
        if($destroy_package)
        {
            return redirect('/package')->with('fail',''.$req->package_name.' Package has been Deleted');

        }
    } 
    
}
