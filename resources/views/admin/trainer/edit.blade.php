@extends('layouts.app')
    @section('content')
		<div class="jumbotron" style=" background: url('/img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat; height:300px;"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    {{--Trainer List Item--}}
                    <div class="list-group">
                        <a href="/admin/trainer" class="list-group-item list-group-item-secondary">Trainer</a>
                        <a href="/admin/trainer" class="list-group-item list-group-item-secondary">Trainer Details</a>
                        <a href="/admin/trainer" class="list-group-item list-group-item-secondary active">Add new Trainer</a>
                    </div>
                     {{--Member List Item--}}
                </div>
                {{--New member registration form--}}
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body" style="background-color:#3498DB;">
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="/admin/adminPanel" style="color: #000;background:#fff;" class="btn btn-sm">GO BACK</a>
                                </div>
                                <div class="col-md-3">
                                    <h4>Add Trainer</h4>
                                </div>
                            </div>
                            <div class="card-body" style="background-color:#3498DB;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body" >
                                            <h3>Register New Trainer</h3>
                                        </div>
                                        <div class="card-body" style="border: 1px solid rgba(181, 207, 207, 0.952)">
                                            <form method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                @if (Session::get('success'))
                                                      <div class="alert alert-success">
                                                          {{ Session::get('success') }}
                                                          {{ Session::put('success',null) }}
                                                      </div>
                                                @endif
                                                <div class="input-group mb-3">
                                                  <input type="text" name="trainer_name" id="trainer_name" value="{{$trainer_user['trainer_name']}}" class="form-control" placeholder="Trainer Name">
                                                  <div class="input-group-append">
                                                    <div class="input-group-text">
                                                      <span class="fas fa-user"></span>
                                                    </div>
                                                  </div>
                                                  <span class="text-danger">@error('trainer_name'){{ $message }}@enderror</span>
                                                </div>
                                                <div class="input-group mb-3">
                                                  <input type="email" name="email" id="email" value="{{$trainer_user['email']}}" class="form-control" placeholder="Email">
                                                  <div class="input-group-append">
                                                    <div class="input-group-text">
                                                      <span class="fas fa-envelop"></span>
                                                    </div>
                                                  </div>
                                                  <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                                </div>
                                                <div class="input-group mb-3">
                                                  <input type="number" name="phone" id="phone" value="{{$trainer_user['phone']}}" class="form-control" placeholder="Phone">
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
                                                    <button style="color: white" type="submit" class="btn btn-primary btn-block">Add Trainer</button>
                                                  </div>
                                                </div>
                                              </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
