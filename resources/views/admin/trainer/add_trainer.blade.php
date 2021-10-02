@extends('layouts.app')
    @section('content')
        <div class="jumbotron" style=" background: url('/img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat; height:300px;"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        {{--Trainer List Item--}}
                        <div class="list-group">
                            <a href="/admin/addTrainer" class="list-group-item list-group-item-secondary">Trainer</a>
                            <a href="/admin/addTrainer" class="list-group-item list-group-item-secondary">Trainer Details</a>
                            <a href="/admin/addTrainer" class="list-group-item list-group-item-secondary active">Add new Trainer</a>
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
                                @if (Session::get('fail'))
                                <div class="alert alert-danger">
                                    {{ Session::get('fail') }}
                                </div>
                                @endif
                                <div class="card-body" style="background-color:#3498DB;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Edit</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        @foreach($trainer_users as $trainer_user)
                                                        <tbody>
                                                            <tr>
                                                            <td>{{$trainer_user['trainer_name']}}</td>
                                                            <td>{{$trainer_user['email']}}</td>
                                                            <td>{{$trainer_user['phone']}}</td>
                                                            <td><a style="color:#fff" class="btn btn-success btn-app" href="/admin/edittrainer/{{$trainer_user['id']}}"><i class="fas fa-edit"></i></a></td>
                                                            <td><a style="color:#fff" class="btn btn-danger  btn-app" href="/admin/deleteTrainer/{{$trainer_user->id}}"><i class="fas fa-trash"></i>
                                                            </a>
                                                            </td>
                                                            </tr>
                                                        </tbody>
                                                        @endforeach
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="card-body" >
                                                <h3>Register New Trainer</h3>
                                            </div>
                                            <div class="card-body" style="border: 1px solid rgba(181, 207, 207, 0.952)">
                                                <form method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    @if (Session::get('success'))
                                                        <div class="alert alert-success">
                                                            {{ Session::get('success') }}
                                                        </div>
                                                    @endif
                                                    <div class="input-group mb-3">
                                                    <input type="text" name="trainer_name" value="{{old('trainer_name')}}" class="form-control" placeholder="Trainer Name">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger">@error('trainer_name'){{ $message }}@enderror</span>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                                                    <div class="input-group-append">
                                                        <div class="input-group-text">
                                                        <span class="fas fa-envelop"></span>
                                                        </div>
                                                    </div>
                                                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                                    </div>
                                                    <div class="input-group mb-3">
                                                    <input type="number" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Phone">
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
        </div>
    @endsection

