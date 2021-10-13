@extends('layouts.member.app')

@section('cover_image')
    <div class="jumbotron" style=" background: url('/img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat; height:300px;"></div>
@endsection

@section('content')
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
                <input type="text" name="first_name" value="{{$member['first_name']}}" class="form-control" placeholder="First Name">
                <div class="input-group-append">
                <div class="input-group-text">
                <span class="fas fa-user"></span>
                </div>
                </div>
                <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
            </div>
            <div class="input-group mb-3">
                <input type="text" name="last_name" value="{{$member['last_name']}}" class="form-control" placeholder="Last Name">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
                </div>
                <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
            </div>
            <div class="input-group mb-3">
                <input type="email" name="email" value="{{$member['email']}}" class="form-control" placeholder="Email">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
                </div>
                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
            </div>
            <div class="input-group mb-3">
                <input type="number" name="phone" value="{{$member['phone']}}" class="form-control" placeholder="Phone">
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
                <button style="color: white" type="submit" class="btn btn-sm btn-primary btn-block">Update</button>
                </div>
            </div>
        </form>
        </div>
    </div>
@endsection
