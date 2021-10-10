@extends('layouts.app')
    @section('content')
		<div class="jumbotron" style="background: url('/img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat;"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                  {{--Member List Item--}}
                  <div class="list-group">
                    <a class="list-group-item list-group-item-action">First Name: {{ $member['first_name'] }}</a>
                    <a class="list-group-item list-group-item-action">Last Name:{{ $member['last_name'] }}</a>
                  </div>
                  <hr/>
                {{--Member List Item--}}
                     {{--Member List Item--}}
                    <div class="list-group">
                        <a href="/member/memberPanel" class="list-group-item list-group-item-action">Dashboard</a>
                        <a href="/member/profile" class="list-group-item list-group-item-action">Profile</a>
                        <a href="/member/package" class="list-group-item list-group-item-action">Package Details</a>
                        <a href="/member/payment" class="list-group-item list-group-item-action">Payments</a>
                    </div>
                    {{--Member List Item--}}
                    <hr/>
                     <div class="list-group">
                      <a href="/memberLogout" id="logout" class="list-group-item list-group-item-secondary">Logout</a>
                      {{-- <a href="/trainer_details" class="list-group-item list-group-item-secondary">Trainer Details</a> --}}
                    </div>
                </div>
                {{--New member registration form--}}
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body" style="border: 1px solid rgba(191, 184, 199, 0.349)">
                            <h3 class="card-title card-title1">Member Dashboard</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
