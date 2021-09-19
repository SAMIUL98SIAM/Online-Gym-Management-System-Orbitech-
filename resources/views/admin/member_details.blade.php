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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	</head>
	<title></title>
	<body>
		<div class="jumbotron" style=" background: url('img/gym2.jpg');background-size:cover;height:300px;backgorund-repeat:no-repeat;"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    {{--Member List Item--}}
                    <div class="list-group">
                        <a href="/adminPanel" class="list-group-item list-group-item-action">Members</a>
                        <a href="/member_search" class="list-group-item list-group-item-action  active">Members Details</a>
                        <a href="/package" class="list-group-item list-group-item-action">Package Details</a>
                        <a href="/payment" class="list-group-item list-group-item-action">Payments</a>
                    </div>
                    {{--Member List Item--}}
                    <hr/>
                </div>
                
                {{--New member registration form--}}
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="/adminPanel" type="button" style="color: #000;background:#fff;" class="btn btn-sm">GO BACK</a>
                                </div>           
                                <div class="col-md-2">
                                    <h5>Members Details</h5>
                                </div>
                                <div class="col-md-7">
                                    <form class="form-group" method="post">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data"/>
                                                <h3 align="center">Total Member : <span style="color: rgb(0, 255, 149)" id="total_records"></span></h3>
                                            </div>
                                            <div class="col-md-2">
                                                <button style="color: #fff" type="button" class="btn btn-success">Search</button>
                                            </div>
                                        </div>
                                    </form>   
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Member ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                {{-- <th>Member ID</th> --}}
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>   
                                        </thead>
                                        <tbody>   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--New member registration form--}}
            </div>
        </div>
    </div> 
	




    <script>
        $(document).ready(function(){
        
         fetch_customer_data();
        
         function fetch_customer_data(query = '')
         {
          $.ajax({
           url:"{{ route('admin.memberaction') }}",
           method:'GET',
           data:{query:query},
           dataType:'json',
           success:function(data)
           {
            $('tbody').html(data.table_data);
            $('#total_records').text(data.total_data);
           }
          })
         }
        
         $(document).on('keyup', '#search', function(){
          var query = $(this).val();
          fetch_customer_data(query);
         });
        });
    </script>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
	</body>
</html>