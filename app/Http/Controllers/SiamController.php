<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Member;
use App\Models\Trainer;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert ;
use DB ;
use Illuminate\Http\Request;

class SiamController extends Controller
{
    public function test()
    {
        $trainer_users = Trainer::all();  
        return view('admin.edit_trainer')->with('trainer_users',$trainer_users);
    }

}
