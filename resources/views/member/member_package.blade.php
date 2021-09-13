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
                                    <button style="color: #000;background:#fff;" class="btn btn-sm">GO BACK</button>
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
                                                    <th>ID</th>
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