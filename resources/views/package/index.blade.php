<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		{{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
		{{-- <meta property="og:title" content="">
		<meta property="og:type" content="">
		<meta property="og:url" content="">
		<meta property="og:image" content=""> --}}
		<title></title>
		<link rel="manifest" href="site.webmanifest">
		<link rel="apple-touch-icon" href="icon.png">
		<!-- Place favicon.ico in the root directory -->
		<link rel="stylesheet" href="css/normalize.css">
			<link rel="stylesheet" href="css/responsive.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/all.min.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css"/>
	</head>
	<title>Login Page</title>
	<body>
		<div class="jumbotron" style=" background: url('img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat; height:300px;"></div>
        <div class="container">
            <div class="row">
               
                <!--<div class="col-md-3">
                     {{--Member List Item--}}
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                          Members
                        </a>
                        <a href="#" class="list-group-item list-group-item-action active">Members Details</a>
                        <a href="#" class="list-group-item list-group-item-action">Package Details</a>
                        <a href="#" class="list-group-item list-group-item-action">Payments</a>
                    </div>
                    {{--Member List Item--}} 
                    <hr/>
                </div>-->
                
                {{--New member registration form--}}
                <div class="col-md-8" style="display: block; margin-left:18%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <button style="color: #000;background:#fff;" class="btn btn-sm">GO BACK</button>
                                </div>
                                <div class="col-md-3">
                                    <h4>Packagess Details</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Package Name</th>
                                                    <th>Amount</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>   
                                            </thead>
                                            <tbody>
                                                <tr>
                                                  @foreach($packages as $package)
                                                  <tbody>
                                                  <tr>     
                                                  <td>{{$package['id']}}</td>
                                                  <td>{{$package['package_name']}}</td>
                                                  <td>{{$package['amount']}}</td>
                                                  <td><a href="/editpackage/{{$package['id']}}" style="color: #fff" class="btn btn-success btn-app"><i class="fas fa-edit"></i>Edit</a></td>
                                                  <td><a href="" style="color: #fff" class="btn btn-danger btn-app"><i class="fas fa-trash"></i>Remove</a></td>
                                                  </tr>
                                                  </tbody>
                                                  @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="card-body" >
                                            <h3>Packages</h3>
                                        </div> 
                                        <div class="card-body" style="border: 1px solid rgba(216, 207, 86, 0.952)">
                                          <form method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            @if (Session::get('success'))
                                                  <div class="alert alert-success">
                                                      {{ Session::get('success') }}
                                                  </div>
                                              @endif   
                                              {{-- <div class="input-group  mb-3">
                                                <input type="number" name="package_id" value="{{old('package_id')}}" class="form-control" placeholder="Package Id">
                                                <div class="input-group-append">
                                                  <div class="input-group-text">
                                                    <span class="fas fa-calculator"></span>
                                                  </div>
                                                </div>
                                                <span class="text-danger">@error('package_id'){{ $message }}@enderror</span>
                                              </div> --}}
                                              <div class="input-group  mb-3">
                                                <input type="text" name="package_name" value="{{old('package_name')}}" class="form-control" placeholder="Package Name">
                                                <div class="input-group-append">
                                                  <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                  </div>
                                                </div>
                                                <span class="text-danger">@error('package_name'){{ $message }}@enderror</span>
                                              </div>
                                              <div class="input-group  mb-3">
                                                <input type="number" name="amount" value="{{old('amount')}}" class="form-control" placeholder="Amount">
                                                <div class="input-group-append">
                                                  <div class="input-group-text">
                                                    <span class="fas fa-price"></span>
                                                  </div>
                                                </div>
                                                <span class="text-danger">@error('amount'){{ $message }}@enderror</span>
                                              </div>
                                                   
                                            <div class="row">
                                              <!-- /.col -->
                                              <div class="col-5">
                                                <button style="color: white" type="submit" class="btn btn-primary btn-block">Payment</button>
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
                {{--New member registration form--}}
                
            </div>
        </div>
    </div> 
	  
		
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
		<script src="js/vendor/modernizr-3.11.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script> 
		<script src="js/main.js"></script>
	</body>
</html>