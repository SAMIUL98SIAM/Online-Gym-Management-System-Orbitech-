<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Member;

class MemberCrudController extends Controller
{
    // Memeber Part
    public function member_details()
    {
        $data = ['user'=>User::where('id','=',session('users'))->first()];
        return view('admin.member.member_details',$data);
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


    public function editmember($id){
        $data = ['user'=>User::where('id','=',session('users'))->first()];
        //var_dump($data['user']->id);
        //echo "<br/><br/>";
        $member_user = Member::find($id);
        // var_dump($member_user->id);
        return view('admin.member.editmember',$data)->with('member_user',$member_user);
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
        return view('admin.member.delete_member')->with('member_user',$member_user);
    }


    public function destroy_member($id)
    {
        $destroy_member =  Member::destroy($id);
        // $member_user = new Member ;
        // $member_user->first_name = $req->first_name ;
        if($destroy_member)
        {
            return redirect('/admin/member_search')->with('fail','Member has been Deleted');

        }
    }


    //Member Part
}
