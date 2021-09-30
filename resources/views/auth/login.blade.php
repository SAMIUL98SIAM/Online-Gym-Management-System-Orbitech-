@extends('layouts.app')
    @section('content')
	<body style="background: url('/img/gym1.jpg');background-size:cover;">
		<div>
		<!-- menu-start -->
		<div class="container-fluid" style="margin-top: 46px;">
        <div class="row">
          <div class="col-md-4">
            <div class="card login_card" style="border: 1px solid rgba(191, 184, 199, 0.349)">
              <img src="img/cardback.jpg" class="card-img-top" alt="cardback">
              <div class="card-body">
                <h2 class="card-title" style="text-align: center">Login</h2>
                <p class="login-box-msg">Sign in to start your session</p>
                  <form method="post" action="">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @if (Session::get('fail'))
                      <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                      </div>
                    @endif
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
                    <div class="row">
                      <!-- /.col -->
                      <div class="col-4">
                        <button type="submit" class="btn btn-outline-success btn-block">Sign In</button>
                      </div>
                      <div class="col-4">
                        <a type="button" href="/register" class="btn btn-warning btn-block">SignUP</a>
                      </div>
                      <!-- /.col -->
                    </div>
                    {{session('msg')}}
                    <br>
                    {{-- @foreach ($errors->all() as $error)
                      {{$error}} <br>
                    @endforeach --}}
                  </form>
              </div>
            </div>
          </div>
        </div>
	  </div>
    </div>
    @endsection

    @section('scripts')
        @if(Session::has('messege'))
       <script>
          var type="{{Session::get('alert-type','info')}}"
          switch(type)
          {
              case 'info':
                    toastr.info("{{ Session::get('messege') }}");
                    break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                  toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        </script>
        @endif

         <script>
            $(document).on("click", "#delete", function(e){
                e.preventDefault();
                  var link = $(this).attr("href");
                  swal({
                  title: "Are you sure?",
                  text: "You will not be able to recover this imaginary file!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes, delete it!",
                  cancelButtonText: "No, cancel!",
                },
                function(isConfirm) {
                  if (isConfirm) {
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    window.location.href = link;
                  } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                  }
                });
                });
        </script>
    @endsection
