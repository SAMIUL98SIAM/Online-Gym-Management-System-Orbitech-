@extends('layout')

@section('sidenavbar')
  <div class="col-md-2">
    {{--Member List Item--}}
    <div class="list-group">
      <a class="list-group-item list-group-item-action">Admin Name: {{ $user['first_name'] }}</a>
    </div>
    <hr/>
     {{--Member List Item--}}
       {{--Member List Item--}}
    <div class="list-group">

          <a href="/admin/adminPanel" class="list-group-item list-group-item-action active">
            Members
          </a>
          <a href="/admin/add_member" class="list-group-item list-group-item-action">Add Members</a>
          <a href="/admin/package" class="list-group-item list-group-item-action">Package Details</a>
          <a href="/admin/payment" class="list-group-item list-group-item-action">Payments</a>
    </div>
      {{--Member List Item--}}
      <hr/>
      {{--Trainer List Item--}}
      <div class="list-group">
        <a href="/admin/addTrainer" class="list-group-item list-group-item-secondary">Trainer</a>
        <a href="/admin/addTrainer" class="list-group-item list-group-item-secondary">Trainer Details</a>
        <a href="/admin/addTrainer" class="list-group-item list-group-item-secondary">Add new Trainer</a>
      </div>
       {{--Trainer List Item--}}
       <hr/>
       <div class="list-group">
        <a href="/admin/logout" id="logout" class="list-group-item list-group-item-secondary">Logout</a>
      </div>
  </div>
@endsection
