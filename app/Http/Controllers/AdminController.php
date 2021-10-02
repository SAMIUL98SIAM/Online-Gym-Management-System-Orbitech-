<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Validator ;
//use Illuminate\Validation\Validator;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Member;
use App\Models\Trainer;

use RealRashid\SweetAlert\Facades\Alert ;




class AdminController extends Controller
{
    public function index()
    {
        $data = ['user'=>User::where('id','=',session('users'))->first()];
        Alert::success('You Successfully logged in','Success Message');
        return view('admin.admin_panel',$data);
    }

    // public function save_member(Request $request)
    // {

    //     $validation = Validator::make($request->all(), [
    // 		'first_name'=> 'required',
    //         'last_name'=> 'required',
    //         'email'=> 'required|email|unique:users',
    //         'phone'=> 'required|max:11',
    // 	]);

    //     // $valid = Validator::make($request->all(),[
    //     //     'first_name'=> 'required',
    //     //     'last_name'=> 'required',
    //     //     'email'=> 'required|email|unique:users',
    //     //     'phone'=> 'required|max:11',
    //     // ]);

    //     // $validator = Validator::make($request->all(), [
    //     //     'email' => 'required|email|max:255|unique:users',
    //     //     'password' => 'required|min:6|confirmed',
    //     // ]);

    //     if(!$validation->passes()){
    //         return response()->json(['status'=>0, 'error'=>$validation->errors()->toArray()]);
    //     }else{
    //         $values = [
    //              'first_name'=>$request->first_name,
    //              'last_name'=>$request->last_name,
    //              'email'=>$request->email,
    //              'phone'=>$request->phone,
    //              'password'=>Hash::make('orbitech')
    //         ];

    //         $query = DB::table('members')->insert($values);
    //         if( $query ){
    //             return back()->with('success',''.$request->first_name.' Added successfully');
    //             // return response()->json(['status'=>1, 'msg'=>'New Student has been successfully registered']);
    //         }
    //     }
    //  }

    // Memeber Part
    public function member_details()
    {
        $data = ['user'=>User::where('id','=',session('users'))->first()];
        return view('admin.member_details',$data);
    }
    public function redirect_member()
    {
        $data = ['user'=>User::where('id','=',session('users'))->first()];
        return redirect('/admin/member_search');
    }

    // Search
    public function member_action(Request $request)
    {
            if($request->ajax())
            {
                $output = '';
                $query = $request->get('query');
            if($query != '')
            {
                $data = DB::table('members')
                    ->where('id', 'like', '%'.$query.'%')
                    ->orwhere('first_name', 'like', '%'.$query.'%')
                    ->orWhere('last_name', 'like', '%'.$query.'%')
                    ->orWhere('email', 'like', '%'.$query.'%')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            else
            {
                $data = DB::table('members')
                    ->orderBy('id', 'desc')
                    ->get();
            }
            $total_row = $data->count();
            if($total_row > 0)
            {
                foreach($data as $row)
                {
                    $output .= '
                    <tr>
                    <td>'.$row->id.'</td>
                    <td>'.$row->first_name.'</td>
                    <td>'.$row->last_name.'</td>
                    <td>'.$row->email.'</td>
                    <td><a href="/admin/editmember/'.$row->id.'" style="color: #fff" class="btn btn-sm btn-success btn-app"><i class="fas fa-edit"></i></a></td>
                    <td><a href="/admin/deleteMember/'.$row->id.'" style="color: #fff" class="btn btn-sm btn-danger btn-app"><i class="fas fa-trash"></i></a></td>
                    </tr>'
                    ;
                }
            }
            else
            {
            $output = '
            <tr>
                <td align="center" colspan="5">No Data Found</td>
            </tr>
            ';
            }
            $data = array(
            'table_data'  => $output,
            'total_data'  => $total_row
            );

            echo json_encode($data);
            }
    }

    /**
     * Store a new blog post.
     *
     * @param  Request  $request
     * @return Response
     */
    public function save_member(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> 'required|email|unique:members|unique:users',
            'phone'=> 'required|max:11',
            // 'first_name'=> ['required'],
            // 'last_name'=> ['required'],
            // 'email'=> ['required','email','unique:users'],
            // 'phone'=> ['required','max:11'],
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'email:filter', 'max:255'],
            // 'message' => ['required', 'string']
        ]);

        // if ($validation->fails()) {
        //     return response()->json(['first_name' => $validation->errors()->first()]);
        // }
        if($validation->fails()){
            // return response()->json(['status'=>400, 'errors'=>$validation->errors()->toArray()]);
            // return response()->json(['status'=>400, 'errors'=>$validation->errors()->toArray()]);
            return response()->json([
                'status'=>400,
                'errors'=>$validation->messages()
            ]);
        }
        else {
            $member_user = new Member;
            $member_user->first_name = $request->input('first_name');
            $member_user->last_name = $request->input('last_name');
            $member_user->email = $request->input('email');
            $member_user->phone = $request->input('phone');
            $member_user->password = Hash::make("orbitech") ;
            $member_user->save();
            return response()->json([
                'status'=>200,
                'message'=>'Member Added Successfully.'
            ]);
            // return redirect('/admin/member_search')->with('success',''.$request->first_name.' Added successfully');
            // $member_save = ;
            // if($member_save)
            // {
            //     return redirect('/admin/member_search')->with('success',''.$request->first_name.' Added successfully');
            // }
        }
    }


    // public function save_member(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'first_name'=> 'required',
    //         'last_name'=> 'required',
    //         'email'=> 'required|email|unique:users',
    //         'phone'=> 'required|max:11',
    //     ]);

    //     if($validator->fails())
    //     {
    //         // $message = Message::messages();
    //         return response()->json([
    //             'status'=>400,
    //             // 'errors'=>$validator->messages(),
    //         ]);
    //     }
    //     else
    //     {
    //         $member_user = new Member;
    //         $member_user->first_name = $request->input('first_name');
    //         $member_user->last_name = $request->input('last_name');
    //         $member_user->email = $request->input('email');
    //         $member_user->phone = $request->input('phone');
    //         $member_user->password = Hash::make("orbitech") ;
    //         $member_user->save();
    //         return response()->json([
    //             'status'=>200,
    //             'message'=>''.$request->input().' Added Successfully.'
    //         ]);
    //     }


    //     // $validator = Validator::make($request->all(),[
    //     //     'first_name'=> 'required',
    //     //     'last_name'=> 'required',
    //     //     'email'=> 'required|email|unique:users',
    //     //     'phone'=> 'required|max:11',
    //     // ]);
    //     // if($validator->fails())
    //     // {
    //     //     return response()->json([
    //     //         'status'=>400,
    //     //         'errors'=>$validator->messages(),
    //     //     ]);
    //     // }
    //     // $req->validate([
    //     //     'first_name'=> 'required',
    //     //     'last_name'=> 'required',
    //     //     'email'=> 'required|email|unique:users',
    //     //     'phone'=> 'required|max:11',
    //     //     // 'trainer_id'=> 'required|unique:users'
    //     // ]);

    //     // $member_user = new Member ;
    //     // $member_user->first_name = $req->first_name ;
    //     // $member_user->last_name = $req->last_name ;
    //     // $member_user->email = $req->email ;
    //     // $member_user->phone =  $req->phone;
    //     // $member_user->password = Hash::make("orbitech") ;
    //     // //$member_user->trainer_id = $req->trainer_id ;
    //     // $member_save = $member_user->save();
    //     // if($member_save)
    //     // {
    //     //     return back()->with('success',''.$req->first_name.' Added successfully');


    //     // }
    //     // else
    //     // {
    //     //     return back()->with('fail','try again');
    //     // }
    // }



    public function editmember($id){
        $data = ['user'=>User::where('id','=',session('users'))->first()];
        //var_dump($data['user']->id);
        //echo "<br/><br/>";
        $member_user = Member::find($id);
        // var_dump($member_user->id);
        return view('admin.editmember',$data)->with('member_user',$member_user);
      }



    public function member_update(Request $req, $id)
      {
        $req->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> 'required|email',
            'phone'=> 'required|max:11'
        ]);
        $member_user = Member::find($id);
        $member_user->first_name = $req->first_name ;
        $member_user->last_name = $req->last_name ;
        $member_user->email = $req->email ;
        $member_user->phone = $req->phone;
        $member_save = $member_user->save();
        if($member_save)
        {
            return redirect('/admin/member_search')->with('success',''.$req->first_name.' Updated successfully');
        }
        else
        {
            return back()->with('fail','try again');
        }
    }

    public function delete_member($id){
        $member_user = Member::find($id);
        return view('admin.delete_member')->with('member_user',$member_user);
    }

    // public function destroy_member(Request $req, $id){
    //     $destroy_member =  Member::destroy($id);
    //     if($destroy_member)
    //     {
    //         return redirect('/admin/member_search')->with('fail',''.$req->first_name.' has been Deleted');

    //     }
    // }
    public function destroy_member($id)
    {
        $destroy_member =  Member::destroy($id);
        // $member_user = new Member ;
        // $member_user->first_name = $req->first_name ;
        if($destroy_member)
        {
            return redirect('/admin/member_search')->with('fail','Member has been Deleted');

        }
        // $member_user = Member::find($id);
        // if($member_user)
        // {
        //     $member_user->delete();
        //     return response()->json([
        //         'status'=>200,
        //         'message'=>'Student Deleted Successfully.'
        //     ]);
        // }
        // else
        // {
        //     return response()->json([
        //         'status'=>404,
        //         'message'=>'No Student Found.'
        //     ]);
        // }
    }


    //Member Part

    // Trainer Part
    public function trainers_details()
    {
        $trainer_users = Trainer::all();
        return view('admin.add_trainer')->with('trainer_users',$trainer_users);
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
        return view('admin.edit_trainer')->with('trainer_user',$trainer_user);
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
        // $trainer_user->update();
        // Session::put('success', ''.$req->trainer_name.' has been updated sucessfully');
        // redirect('/adminPanel');
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
        return view('admin.delete_trainer')->with('trainer_user',$trainer_user);
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
