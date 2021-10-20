<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index()
    {
        $data = ['user'=>User::where('id','=',session('users'))->first()];
        return view('admin.expense.index',$data);
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
            'expense_name'=> 'required',
            'amount'=> 'required',
            'description'=>'required',
            'trainer_id'=>'required'
        ]);
        $expense = new Expense;
        $expense->expense_name = $request->expense_name ;
        $expense->description = $request->description ;
        $expense->amount = $request->amount  ;
        $expense->trainer_id = $request->trainer_id  ;
        $expense_save = $expense->save();
        $notifications = array('message'=>'You Added '.$request->expense_name.' expense','alert-type'=>'success');
        if($expense_save)
        {
            return redirect('/admin/expense')->with($notifications);
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
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'expense_name'=> 'required',
            'amount'=> 'required',
            'description'=>'required'
        ]);
        $expense = Expense::find($id);
        $expense->expense_name = $request->expense_name ;
        $expense->description = $request->description ;
        $expense->amount = $request->amount  ;
        $expense->trainer_id = $request->trainer_id  ;
        $expense_save = $expense->update();
        $notifications = array('message'=>'You Updated '.$request->expense_name.' expense','alert-type'=>'info');
        if($expense_save)
        {
            return back()->with($notifications);
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

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $req)
    {
        $destroy_member =  Expense::destroy($id);
        $notifications = array('message'=>'You Deleted Expense','alert-type'=>'error');
        if($destroy_member)
        {
            return redirect('/admin/expense')->with($notifications);

        }
    }
}
