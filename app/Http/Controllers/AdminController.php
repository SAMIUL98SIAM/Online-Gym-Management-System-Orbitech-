<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Member;
use App\Models\Trainer;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert ;
use Illuminate\Support\Facades\DB ;
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
        // $member_users = Member::all();  
        // return view('admin.member_details',$data)->with('member_users',$member_users);
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
                ->where('first_name', 'like', '%'.$query.'%')
                ->orWhere('last_name', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%')
                ->orWhere('member_id', 'like', '%'.$query.'%')
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
                <td>'.$row->first_name.'</td>
                <td>'.$row->last_name.'</td>
                <td>'.$row->email.'</td>
                <td>'.$row->member_id.'</td>
                <td><a href="/editmember/'.$row->id.'" style="color: #fff" class="btn btn-sm btn-success btn-app"><i class="fas fa-edit"></i>Edit</a></td>
                <td><a href="/deleteMember/'.$row->id.'" style="color: #fff" class="btn btn-sm btn-danger btn-app"><i class="fas fa-trash"></i>Remove</a></td>
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
            'member_id'=> 'required|unique:users'
            // 'trainer_id'=> 'required|unique:users'
        ]);
        $member_user = new Member ;
        $member_user->first_name = $req->first_name ;
        $member_user->last_name = $req->last_name ;
        $member_user->email = $req->email ; 
        $member_user->phone =  $req->phone;
        $member_user->password = Hash::make("orbitech") ;
        $member_user->member_id = $req->member_id ;
        //$member_user->trainer_id = $req->trainer_id ;
        $member_save = $member_user->save();
        if($member_save)
        {
            return back()->with('success','Memeber Added successfully');

        }
        else 
        {
            return back()->with('fail','try again');
        }    
    }
    
    
     public function editmember($id){  
        $data = ['user'=>User::where('id','=',session('users'))->first()];
        $member_user = Member::find($id);
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
            'phone'=> 'required|max:11'
        ]);
        $trainer_user = new Trainer ;
        $trainer_user->trainer_name = $req->trainer_name ;
        $trainer_user->phone =  $req->phone;
        $trainer_user->password = Hash::make("orbitech") ;
        $trainer_save = $trainer_user->save();
        // $trainer_save->type = 'trainer';
        if($trainer_save)
        {
            return back()->with('success','Trainer Added successfully');
            // redirect('/');
        }
        else 
        {
            return back()->with('fail','try again');
        }    
    }

     
    public function edit_trainer()
    {
        $trainer_user = Trainer::find($id);
        $trainer_users = Trainer::all();  
        return view('admin.edit_trainer')->with('trainer_users',$trainer_users);
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
        $trainer_user->phone =  $req->phone;
        $trainer_save = $trainer_user->save();
        if($trainer_save)
        {
            return back()->with('success','Trainer Updated successfully');
        }
        else 
        {
            return back()->with('fail','try again');
        }  
      }

    

    // public function delete_trainer($id){
    //     $trainer_user = Trainer::find($id);
    //     return view('admin.delete_trainer')->with('trainer_user', $trainer_user);
    // }

    public function destroy_trainer($id){
       
        Trainer::destroy($id);
        return redirect()->route('admin.destroy_trainer');
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
