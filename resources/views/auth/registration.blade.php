@extends('layouts.default.app')
    @section('content')
	<body style="background: url('/img/gym1.jpg');background-size:cover;">
	<div>
		<!-- menu-start -->
		<div class="container-fluid" style="">
        <div class="row">
          <div class="col-md-4">
            <div class="card login_card" style="border: 1px solid rgba(191, 184, 199, 0.349)">
              <img src="img/cardback.jpg" class="card-img-top" alt="cardback">
              <div class="card-body">
                <h2 class="card-title" style="text-align: center">Registration</h2>
                <p class="login-box-msg">Sign in to start your session</p>
                <form method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                  <div class="input-group mb-3">
                    <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control" placeholder="First Name">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                    <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control" placeholder="Last Name">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-user"></span>
                      </div>
                    </div>
                    <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
                  </div>
                  <div class="input-group mb-3">
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                      </div>
                    </div>
                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                  </div>
                  <div class="input-group mb-3">
                    <input type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
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
                  <div class="input-group  mb-3">
                    <input type="number" name="member_id" value="{{old('member_id')}}" class="form-control" placeholder="Memeber Id">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-calculator"></span>
                      </div>
                    </div>
                    <span class="text-danger">@error('member_id'){{ $message }}@enderror</span>
                  </div>
                  <div class="row">
                    <div class="col-7">
                      <div class="icheck-primary">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                         I agree to the <a href="#">terms</a>
                        </label>
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-5">
                      <button style="color: white" type="submit" class="btn btn-primary btn-block">Registration</button>
                    </div>
                  <br/>
                    <!-- /.col -->
                  </div>
                  <div class="col-5">
                    <a href="/" style="color: whitesmoke" class="btn btn-success">log on</a>
                  </div>
                  <!-- /.col -->
                </div>
                  {{-- @foreach ($errors->all() as $error)
                      <div class="text-danger">{{$error}}</div> <br>
                  @endforeach  --}}
                </form>
              </div>
            </div>
          </div>
        </div>
	</div>

