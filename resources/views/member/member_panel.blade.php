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
                        <a href="/memberPackage" class="list-group-item list-group-item-action">Package Details</a>
                        <a href="/memberPayment" class="list-group-item list-group-item-action">Payments</a>
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