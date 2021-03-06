@extends('layouts.app')
    @section('content')
		<div class="jumbotron" style="background: url('/img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat;"></div>
        <div class="container-fluid">
            <div class="row">
                        <div class="col-md-3">
                            {{--Member List Item--}}
                            <div class="list-group">
                            <a href="/trainer/trainerProfile" class="list-group-item list-group-item-action active">Profile</a>
                            <a href="/trainer/trainerPanel" class="list-group-item list-group-item-action">Dashboard</a>
                            </div>
                            {{--Member List Item--}}
                            <hr/>
                             <div class="list-group">
                              <a href="/trainer/trainerLogout" id="logout" class="list-group-item list-group-item-secondary">Logout</a>
                            </div>

                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body" style="border: 1px solid rgba(191, 184, 199, 0.349)">
                                    <h3 class="card-title card-title1">Update Profile</h3>
                                    <form method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        @if (Session::get('success'))
                                            <div class="alert alert-success">
                                                {{ Session::get('success') }}
                                            </div>
                                        @endif
                                    <div class="input-group mb-3">
                                        <input type="text" name="trainer_name" value="{{$trainer['trainer_name']}}" class="form-control" placeholder="First Name">
                                        <div class="input-group-append">
                                        <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                        </div>
                                        </div>
                                        <span class="text-danger">@error('trainer_name'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="email" name="email" value="{{$trainer['email']}}" class="form-control" placeholder="Email">
                                        <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                        </div>
                                        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="number" name="phone" value="{{$trainer['phone']}}" class="form-control" placeholder="Phone">
                                        <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-phone"></span>
                                        </div>
                                        </div>
                                        <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="row">
                                        <!-- /.col -->
                                        <div class="col-5">
                                        <button style="color: white" type="submit" class="btn btn-sm btn-primary btn-block">Update Trainer</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                         </div>
                       </div>
                   </div>
        @endsection
