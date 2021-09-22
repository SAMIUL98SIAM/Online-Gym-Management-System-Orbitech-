<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
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
	<title></title>
	<body>
		<div class="jumbotron" style=" background: url('img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat; height:300px;"></div>
        <div class="container">
            <div class="row">      
                {{--New member registration form--}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" style="background-color:#3498DB;">
                            <div class="row">
                                <div class="col-md-2">
                                    <a href="/adminPanel" style="color: #000;background:#fff;" class="btn btn-sm">GO BACK</a>
                                </div>
                                <div class="col-md-3">
                                    <h4>Payment Details</h4>
                                </div>
                            </div>
                            <div class="card-body" style="background-color:#3498DB;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th> 
                                                    <th>Package Name</th>
                                                    <th>Amount</th>
                                                    <th>Customer ID</th>
                                                    <th>Customer First Name</th>
                                                    <th>Payment Type</th>                  
                                                </tr>   
                                            </thead>
                                            {{-- @php
                                            $package = App\Package::all();   
                                            @endphp --}}
                                            <tbody>
                                              <tr>
                                                @foreach($payment as $row)
                                                <tbody>
                                                <tr>
                                                <td>{{$row['id']}}</td> 
                                                <td>{{$row->member->package['package_name']}}</td>    
                                                <td>{{$row->member->package['amount']}}</td>
                                                <td>{{$row['member_id']}}</td>
                                                <td>{{$row->member['first_name']}}</td>
                                                <td>{{$row['payment_type']}}</td>
                                                </tr>
                                                </tbody>
                                                @endforeach
                                              </tr>
                                          </tbody>
                                        </table>
                                        <div class="card-body" >
                                            <h3>Make new Payment</h3>
                                        </div> 
                                        <div class="card-body" style="border: 1px solid rgba(216, 207, 86, 0.952)">
                                          <form method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            @if (Session::get('success'))
                                                  <div class="alert alert-success">
                                                      {{ Session::get('success') }}
                                                  </div>
                                              @endif
                                              <div class="input-group  mb-3">
                                                <select name="member_id" id="member_id" class="form-control">
                                                  <option selected disabled>Select Member ID</option>
                                                  @foreach ($members as $member)
                                                    @if($member->package_counter	== "1")
                                                    <option value="{{$member->id }}">"{{ $member->id }}"</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                  <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                  </div>
                                                </div>
                                                <span class="text-danger">@error('package_id'){{ $message }}@enderror</span>
                                              </div>
                                              <div class="input-group  mb-3">
                                                <select name="payment_type" id="payment_type" class="form-control">
                                                    <option selected disabled>Select the payment option</option>
                                                    <option value="cash">Cash</option>
                                                    <option value="Bkash">Bkash</option>
                                                    <option value="Card">Card</option>
                                                </select>
                                                {{-- <input type="text" name="payment_type" value="{{old('payment_type')}}" class="form-control" placeholder="Payment Type"> --}}
                                                <div class="input-group-append">
                                                  <div class="input-group-text">
                                                    <span class="fas fa-money"></span>
                                                  </div>
                                                </div>
                                                <span class="text-danger">@error('payment_type'){{ $message }}@enderror</span>
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