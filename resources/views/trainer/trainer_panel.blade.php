@extends('layouts.app')
    @section('content')
		<div class="jumbotron" style="background: url('/img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat;"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                  {{--Member List Item--}}
                  <div class="list-group">
                    <a class="list-group-item list-group-item-action">Name: {{ $trainer['trainer_name'] }}</a>
                  </div>
                  <hr/>
                    {{--Member List Item--}}
                     {{--Member List Item--}}
                    <div class="list-group">
                        <a href="/trainer/trainerProfile" class="list-group-item list-group-item-action">Profile</a>
                        <a href="/trainer/trainerPanel" class="list-group-item list-group-item-action active">Dashboard</a>
                    </div>
                    {{--Member List Item--}}
                    <hr/>
                     <div class="list-group">
                      <a href="/trainerLogout" id="logout" class="list-group-item list-group-item-secondary">Logout</a>
                    </div>
                </div>

                {{--New member registration form--}}
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body" style="border: 1px solid rgba(191, 184, 199, 0.349)">
                            <h3 class="card-title card-title1">Trainer Dashboard</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
