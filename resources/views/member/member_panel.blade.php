<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<title></title>
		<link rel="manifest" href="site.webmanifest">
		<link rel="apple-touch-icon" href="icon.png">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/responsive.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/all.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/sweetalert.css"/> 
    <link rel="stylesheet" href="css/toastr.css"/> 
    <link rel="stylesheet" href="css/toastr.min.css"/> 
	</head>
	<title></title>
	<body>
		<div class="jumbotron" style="background: url('img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat;"></div>
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
                        <a href="/package" class="list-group-item list-group-item-action">Package Details</a>
                        <a href="/payment" class="list-group-item list-group-item-action">Payments</a>
                    </div>
                    {{--Member List Item--}} 
                    <hr/> 
                    {{--Trainer List Item--}} 
                    <div class="list-group">
                      <a href="/addTrainer" class="list-group-item list-group-item-secondary">Trainer</a>
                      <a href="/addTrainer" class="list-group-item list-group-item-secondary">Trainer Details</a>
                      <a href="/addTrainer" class="list-group-item list-group-item-secondary">Add new Trainer</a>
                    </div>
                     {{--Trainer List Item--}}
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
                            <form method="post" enctype="multipart/form-data">
                             <input type="hidden" name="_token" value="{{csrf_token()}}">
                              {{-- @if (Session::get('success'))
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
                                <input type="number" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Phone">
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                  </div>
                                </div>
                                <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
                              </div>
                              <div class="input-group  mb-3">
                                <input type="number" name="trainer_id" value="{{old('trainer_id')}}" class="form-control" placeholder="Trainer Id">
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                    <span class="fas fa-calculator"></span>
                                  </div>
                                </div>
                                <span class="text-danger">@error('trainer_id'){{ $message }}@enderror</span>
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
                                <!-- /.col -->
                                <div class="col-5">
                                  <button style="color: white" type="submit" class="btn btn-primary btn-block">Add Member</button>
                                </div>
                              </div> --}}
                            </form>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---alertjs file-->

        {{-- <script>
        @if(Session::has('messege'))
            var type="{{Session::get('alert-type','info')}}"
            switch(type){
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
            @endif
         
    </script>

      <script>
              $(document).on("click", "#logout", function(e){
                  e.preventDefault();
                    var link = $(this).attr("href");
                    swal({
                    title: "Are you want to log out",
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
          </script> --}}
	<script src="js/vendor/modernizr-3.11.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<script src="js/plugins.js"></script>
	<script type="text/javascript" src="js/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <script type="text/javascript" src="js/sweetalert.js"></script> 
	<script type="text/javascript" src="js/toastr.min.js"></script>
    <script src="js/main.js"></script>
	</body>
</html>