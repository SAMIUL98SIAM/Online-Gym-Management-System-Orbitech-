<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<title></title>
		<link rel="manifest" href="/site.webmanifest">
		<link rel="apple-touch-icon" href="/icon.png">
		<!-- Place favicon.ico in the root directory -->
		<link rel="stylesheet" href="/css/normalize.css">
		<link rel="stylesheet" href="/css/responsive.css">
		<link rel="stylesheet" href="/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="/css/all.min.css">
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
		<link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/style.css"/>
    <link rel="stylesheet" href="/css/sweetalert.css"/> 
    <link rel="stylesheet" href="/css/toastr.css"/> 
    <link rel="stylesheet" href="/css/toastr.min.css"/>
	</head>
	<title></title>
	<body>
		<div class="jumbotron" style=" background: url('/img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat; height:300px;"></div>
        <div class="container">
            <div class="row"> 
                <div class="col-md-3">
                    {{--Trainer List Item--}} 
                    <div class="list-group">
                        <a href="/addTrainer" class="list-group-item list-group-item-secondary">Trainer</a>
                        <a href="/addTrainer" class="list-group-item list-group-item-secondary">Trainer Details</a>
                        <a href="/addTrainer" class="list-group-item list-group-item-secondary active">Add new Trainer</a>
                    </div>
                     {{--Member List Item--}}
                </div>     
                {{--New member registration form--}}
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body" style="background-color:#3498DB;">
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="/adminPanel" style="color: #000;background:#fff;" class="btn btn-sm">GO BACK</a>
                                </div>
                                <div class="col-md-3">
                                    <h4>Add Trainer</h4>
                                </div>
                            </div>
                            <div class="card-body" style="background-color:#3498DB;">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <div class="card-body" >
                                            <h3>Delete Mr./Mrs.{{$trainer_user->trainer_name}} Profile</h3>
                                        </div> 
                                        <div class="card-body" style="border: 1px solid rgba(181, 207, 207, 0.952)">
                                            <form method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                @if (Session::get('success'))
                                                      <div class="alert alert-success">
                                                          {{ Session::get('success') }}
                                                      </div>
                                                @endif  
                                                {{-- <div class="input-group mb-3">
                                                  <input type="text" name="trainer_name" value="{{$trainer_user->trainer_name}}" class="form-control" placeholder="Trainer Name">
                                                  <div class="input-group-append">
                                                    <div class="input-group-text">
                                                      <span class="fas fa-user"></span>
                                                    </div>
                                                  </div>
                                                  <span class="text-danger">@error('trainer_name'){{ $message }}@enderror</span>
                                                </div> --}}
                                                <div class="input-group mb-3">
                                                  <input type="email" name="email" value="{{$trainer_user->email}}" class="form-control" placeholder="Email">
                                                  <div class="input-group-append">
                                                    <div class="input-group-text">
                                                      <span class="fas fa-envelop"></span>
                                                    </div>
                                                  </div>
                                                  <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                                </div>
                                                <div class="input-group mb-3">
                                                  <input type="number" name="phone" value="{{$trainer_user->phone}}" class="form-control" placeholder="Phone">
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
                                                    <button type="button" style="color: #fff" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                                                      Launch Danger Modal
                                                    </button>
                                                  </div>
                                                  <div class="modal fade" id="modal-danger">
                                                    <div class="modal-dialog">
                                                      <div class="modal-content bg-danger">
                                                        <div class="modal-header">
                                                          <h4 class="modal-title">Danger Modal</h4>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <form method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                            @if (Session::get('success'))
                                                                  <div class="alert alert-success">
                                                                      {{ Session::get('success') }}
                                                                      {{ Session::put('success',null) }}
                                                                  </div>
                                                            @endif  
                                                             <div class="input-group mb-3">
                                                              <input type="text" name="trainer_name" value="{{$trainer_user['trainer_name']}}" class="form-control" placeholder="Trainer Name">
                                                              <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                  <span class="fas fa-user"></span>
                                                                </div>
                                                              </div>
                                                              <span class="text-danger">@error('trainer_name'){{ $message }}@enderror</span>
                                                            </div>                                        
                                                            <div class="row">
                                                              <!-- /.col -->
                                                              <div class="col-5">
                                                                <button style="color: white" type="submit" class="btn btn-primary btn-block">Delete Trainer</button>
                                                              </div>
                                                            </div>
                                                          </form>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                          <button style="color: black;background:white" type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                        </div>
                                                      </div>
                                                      <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                  </div>
                                                  <!-- /.modal -->
                                                </div>
                                              </form>		
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>                       
                    </div>
                </div>
                {{--New member registration form--}}
            </div>
        </div>
    </div> 
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/> </svg>
		<script src="/js/vendor/modernizr-3.11.2.min.js"></script>
		<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
		<script src="/js/plugins.js"></script>
		<script type="text/javascript" src="/js/popper.min.js"></script>
		<script type="text/javascript" src="/js/bootstrap.min.js"></script> 
		<script src="js/main.js"></script>
    <script type="text/javascript" src="/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="/js/sweetalert.js"></script> 
		<script type="text/javascript" src="/js/toastr.min.js"></script>
	</body>
</html>