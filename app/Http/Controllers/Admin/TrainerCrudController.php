<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Trainer;

class TrainerCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainer_users = Trainer::all();
        return view('admin.trainer.index')->with('trainer_users',$trainer_users);
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
        $data = ['user'=>User::where('id','=',session('users'))->first()];
         $request->validate([
             'trainer_name'=> 'required',
             'email'=> 'required|email|unique:trainers|unique:users',
             'phone'=> 'required|max:11'
         ]);
         $notifications = array('message'=>'You added '.$request->trainer_name.'','alert-type'=>'success');
         $trainer_user = new Trainer ;
         $trainer_user->trainer_name = $request->trainer_name ;
         $trainer_user->email = $request->email ;
         $trainer_user->phone =  $request->phone;
         $trainer_user->password = Hash::make("orbitecht") ;
         $trainer_save = $trainer_user->save();
         // $trainer_save->type = 'trainer';
         if($trainer_save)
         {
            return back()->with($notifications);
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
        $data = ['user'=>User::where('id','=',session('users'))->first()];
         $req->validate([
             'trainer_name'=> 'required',
             'phone'=> 'required|max:11'
         ]);
         $notifications = array('message'=>'You Updated '.$req->trainer_name.' profile','alert-type'=>'info');
         $trainer_user = Trainer::find($id);
         $trainer_user->trainer_name = $req->trainer_name ;
         $trainer_user->email = $req->email ;
         $trainer_user->phone =  $req->phone;
         // $trainer_user->update();
         // Session::put('success', ''.$req->trainer_name.' has been updated sucessfully');
         // redirect('/adminPanel');
         $trainer_save = $trainer_user->save();
         if($trainer_save)
         {
            //  return back()->with('success',''.$req->trainer_name.' Updated successfully');
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
        // $trainer_user = DB::table('trainers')
         //                    ->where('id',$id)
         //                    ->first();
         // return view('admin.delete_trainer')->with('trainer_user',$trainer_user);
        //  $trainer_user = Trainer::find($id);
        //  return view('admin.trainer.delete')->with('trainer_user',$trainer_user);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // $trainer_user = Trainer::find($id);
         // $trainer_user->trainer_name = $req->trainer_name ;
         $notifications = array('message'=>'Trainer has been deleted','alert-type'=>'error');
         $destroy_trainer =  Trainer::destroy($id);
         //$trainer_user->trainer_name = $req->trainer_name ;
         if($destroy_trainer)
         {
             return back()->with($notifications);

         }
    }

}
