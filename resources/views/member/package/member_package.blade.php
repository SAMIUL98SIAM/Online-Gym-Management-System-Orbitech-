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
	</head>
	<title>Login Page</title>
	<body>
		<div class="jumbotron" style=" background: url('img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat; height:300px;"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8" style="display: block; margin-left:18%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <a style="color: #000;background:#fff;" href="/memberPanel" class="btn btn-sm">GO BACK</a>
                                </div>
                                <div class="col-md-3">
                                  <h4>Offer</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Cupon ID</th>
                                                    <th>Package Name</th>
                                                    <th>Amount</th>
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
                                                  </tr>
                                                  </tbody>
                                                  @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="card-body" >
                                            <h3>Packages</h3>
                                            <form method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                @if (Session::get('success'))
                                                      <div class="alert alert-success">
                                                          {{ Session::get('success') }}
                                                      </div>
                                                  @endif
                                                  @if($member->package_counter=="1")
                                                     <h4 style="color: crimson ; margin-bottom:12px;"> You have taken these <b style="color: blanchedalmond"> "{{ $member->package['package_name'] }}" </b> packages. You have only choose 1 package</h4>  
                                                  @endif
                                                  {{-- <h2> You have taken {{ $member['last_name'] }}< packages</h2> --}}
                                                  <div class="input-group  mb-3">
                                                    <label>Member ID:</label>
                                                    <input type="number" name="member_id" value="{{$member['id']}}" class="form-control" placeholder="Member Id" disabled>
                                                    <div class="input-group-append">
                                                      <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                      </div>
                                                    </div>
                                                    <span class="text-danger">@error('member_id'){{ $message }}@enderror</span>
                                                  </div>
                                                  <div class="input-group  mb-3">
                                                    <select name="package_id" id="package_id" class="form-control">
                                                      <option selected disabled>Package List</option>
                                                      @foreach ( $packages as $package)
                                                        <option value="{{$package->id }}">" '{{ $package->id }}' : {{$package->package_name}}"</option>
                                                      @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                      <div class="input-group-text">
                                                        <span class="fas fa-money"></span>
                                                      </div>
                                                    </div>
                                                    <span class="text-danger">@error('package_name'){{ $message }}@enderror</span>
                                                  </div>
                                                  {{-- <div class="input-group  mb-3">
                                                    <select name="package_id" id="package_id" class="form-control">
                                                      <option selected disabled>Select the Cupon ID</option>
                                                      @foreach ( $packages as $package)
                                                        <option value="{{$package->id }}">"{{ $package->id }}"</option>
                                                      @endforeach
                                                    </select>
                                                    <div class="input-group-append">
                                                      <div class="input-group-text">
                                                        <span class="fas fa-money"></span>
                                                      </div>
                                                    </div>
                                                    <span class="text-danger">@error('package_id'){{ $message }}@enderror</span>
                                                  </div>--}}
                                                 <div class="row">
                                                  <!-- /.col -->
                                                  <div class="col-4">
                                                    <button style="color: white" type="submit" class="btn btn-primary btn-block">Get these Package</button>
                                                  </div>
                                                  <div class="col-4">
                                                    <a style="color: white" href="/memberPayment" class="btn btn-primary btn-block">If you get package then go throw the Payment</a>
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
                {{--New member registration form--}}
            </div>
        </div>
    </div> 

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
		<script src="js/vendor/modernizr-3.11.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
		<script src="js/plugins.js"></script>
		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script> 
		<script src="js/main.js"></script>
	</body>
</html>