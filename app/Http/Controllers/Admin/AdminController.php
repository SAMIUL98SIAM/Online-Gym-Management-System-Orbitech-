<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Validator ;
//use Illuminate\Validation\Validator;
use App\Models\User;
use App\Models\Member;
use RealRashid\SweetAlert\Facades\Alert ;




class AdminController extends Controller
{
    public function index()
    {
        $data = ['user'=>User::where('id','=',session('users'))->first()];
        Alert::success('You Successfully logged in','Success Message');
        return view('admin.admin_panel',$data);
    }


    public function search(Request $req)
    {
        if($req->ajax())
        {
            $data = Member::where('id','like','%',$req->search,'%')
            ->orwhere('first_name','like','%',$req->search,'%')->get();
            $output = '';
            if(count($data)>0){
                foreach($data as $row)
                {
                    $output .= 'scope="row'.$row->id.'<br/>'.
                    $row->first_name."<br/>"
                   ;
                }
            }
            else
            {
                $output .= 'No Result';
            }
            return $output;

            // var_dump($output);
        }

    }

}
