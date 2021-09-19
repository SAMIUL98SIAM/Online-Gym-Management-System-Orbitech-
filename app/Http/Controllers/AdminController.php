<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Member;
use App\Models\Trainer;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert ;
use Illuminate\Support\Facades\DB ;
use Session;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = ['user'=>User::where('id','=',session('users'))->first()];
        Alert::success('You Successfully logged in','Success Message');
        return view('admin.admin_panel',$data);
    }
     
    // Memeber Part
    public function member_details()
    {
        $data = ['user'=>User::where('id','=',session('users'))->first()];
        return view('admin.member_details',$data);
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
                    <td><a href="/editmember/'.$row->id.'" style="color: #fff" class="btn btn-sm btn-success btn-app"><i class="fas fa-edit"></i></a></td>
                    <td><a href="/deleteMember/'.$row->id.'" style="color: #fff" class="btn btn-sm btn-danger btn-app"><i class="fas fa-trash"></i></a></td>
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
    
    

    public function save_member(Request $req)
    {
        $req->validate([
            'first_name'=> 'required',
            'last_name'=> 'required',
            'email'=> 'required|email|unique:users',
            'phone'=> 'required|max:11',
            // 'trainer_id'=> 'required|unique:users'
        ]);
        $member_user = new Member ;
        $member_user->first_name = $req->first_name ;
        $member_user->last_name = $req->last_name ;
        $member_user->email = $req->email ; 
        $member_user->phone =  $req->phone;
        $member_user->password = Hash::make("orbitech") ;
        //$member_user->trainer_id = $req->trainer_id ;
        $member_save = $member_user->save();
        if($member_save)
        {
            return back()->with('success',''.$req->first_name.' Added successfully');


        }
        else 
        {
            return back()->with('fail','try again');
        }    
    }
     
    
    
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
            return back()->with('success','Updated successfully');
        }
        else 
        {
            return back()->with('fail','try again');
        }  
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
        
        $trainer_user = DB::table('trainers')
                           ->where('id',$id)
                           ->first();
        return view('admin.delete_trainer')->with('trainer_user',$trainer_user); 
        // $trainer_user = Trainer::find($id);
        // return redirect()->route('admin.delete_trainer')->with('trainer_user',$trainer_user);
    }

    public function destroy_trainer(Request $req, $id){
       
        $trainer_user = Trainer::find($id);
        $trainer_user->trainer_name = $req->trainer_name ; 
        
        $destroy_trainer =  Trainer::destroy($id);
        // $trainer_user->trainer_name = $req->trainer_name ;
        if($destroy_trainer)
        {
            return redirect('/addTrainer')->with('fail',''.$req->trainer_name.' Deleted');

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
