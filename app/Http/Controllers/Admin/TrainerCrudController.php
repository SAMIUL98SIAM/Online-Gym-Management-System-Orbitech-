<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Trainer;


class TrainerCrudController extends Controller
{
     // Trainer Part
     public function trainers_details()
     {
         $trainer_users = Trainer::all();
         return view('admin.trainer.add_trainer')->with('trainer_users',$trainer_users);
     }

     public function save_trainer(Request $req)
     {
         $data = ['user'=>User::where('id','=',session('users'))->first()];
         $req->validate([
             'trainer_name'=> 'required',
             'email'=> 'required|email',
             'phone'=> 'required|max:11'
         ]);
         $trainer_user = new Trainer ;
         $trainer_user->trainer_name = $req->trainer_name ;
         $trainer_user->email = $req->email ;
         $trainer_user->phone =  $req->phone;
         $trainer_user->password = Hash::make("orbitecht") ;
         $trainer_save = $trainer_user->save();
         // $trainer_save->type = 'trainer';
         if($trainer_save)
         {
             return back()->with('success','Trainer '.$req->trainer_name.' Added successfully');
             // redirect('/');
         }
         // else
         // {
         //     return back()->with('fail','try again');
         // }
     }

     public function edit_trainer($id)
     {
         $trainer_user = Trainer::find($id);
         return view('admin.trainer.edit_trainer')->with('trainer_user',$trainer_user);
     }

     public function trainer_update(Request $req, $id)
       {
         $data = ['user'=>User::where('id','=',session('users'))->first()];
         $req->validate([
             'trainer_name'=> 'required',
             'phone'=> 'required|max:11'
         ]);
         $trainer_user = Trainer::find($id);
         $trainer_user->trainer_name = $req->trainer_name ;
         $trainer_user->email = $req->email ;
         $trainer_user->phone =  $req->phone;
         $trainer_save = $trainer_user->save();
         if($trainer_save)
         {
             return back()->with('success',''.$req->trainer_name.' Updated successfully');
         }
         else
         {
             return back()->with('fail','try again');
         }
       }



     public function delete_trainer($id){

         // $trainer_user = DB::table('trainers')
         //                    ->where('id',$id)
         //                    ->first();
         // return view('admin.delete_trainer')->with('trainer_user',$trainer_user);
         $trainer_user = Trainer::find($id);
         return view('admin.trainer.delete_trainer')->with('trainer_user',$trainer_user);
     }

     public function destroy_trainer(Request $req, $id){

         // $trainer_user = Trainer::find($id);
         // $trainer_user->trainer_name = $req->trainer_name ;

         $destroy_trainer =  Trainer::destroy($id);
         //$trainer_user->trainer_name = $req->trainer_name ;
         if($destroy_trainer)
         {
             return redirect('/admin/addTrainer')->with('fail',''.$req->trainer_name.' has been Deleted');

         }
         // Session::put('success', ''.$req->trainer_name.' has been updated sucessfully');
         // redirect('/adminPanel');
         // return redirect()->route('admin.destroy_trainer');
     }

     // Trainer part
}
