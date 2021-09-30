<!doctype html>
<html class="no-js" lang="">
	<head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <title></title>
        <link rel="manifest" href="/site.webmanifest">
        <link rel="apple-touch-icon" href="{{asset('/icon.png')}}">
        <!-- Place favicon.ico in the root directory -->
        <link rel="stylesheet" href="{{asset('/css/normalize.css')}}">
        <link rel="stylesheet" href="{{asset('/css/responsive.css')}}">
        <link rel="stylesheet" href="/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('/css/all.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('/css/main.css')}}">
        <link rel="stylesheet" href="{{asset('/css/style.css')}}"/>
        <link rel="stylesheet" href="{{asset('/css/sweetalert.css')}}"/>
        <link rel="stylesheet" href="{{asset('/css/toastr.css')}}"/>
         <link rel="stylesheet" href="{{asset('/css/toastr.min.css')}}"/>
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{ asset('/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
        <!-- Toastr -->
        <link rel="stylesheet" href="{{ asset('/plugins/toastr/toastr.min.css') }} ">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }} ">
	</head>
	<title></title>
	<body>
		<div class="jumbotron" style="background: url('/img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat;"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                  {{--Member List Item--}}
                  <div class="list-group">
                    <a class="list-group-item list-group-item-action">Admin Name: {{ $user['first_name'] }}</a>
                  </div>
                  <hr/>
                {{--Member List Item--}}
                     {{--Member List Item--}}
                    <div class="list-group">

                        <a href="/admin/adminPanel" class="list-group-item list-group-item-action active">
                          Members
                        </a>
                        <a href="/admin/member_search" class="list-group-item list-group-item-action">Members Details</a>
                        <a href="/admin/package" class="list-group-item list-group-item-action">Package Details</a>
                        <a href="/admin/payment" class="list-group-item list-group-item-action">Payments</a>
                    </div>
                    {{--Member List Item--}}
                    <hr/>
                    {{--Trainer List Item--}}
                    <div class="list-group">
                      <a href="/admin/addTrainer" class="list-group-item list-group-item-secondary">Trainer</a>
                      <a href="/admin/addTrainer" class="list-group-item list-group-item-secondary">Trainer Details</a>
                      <a href="/admin/addTrainer" class="list-group-item list-group-item-secondary">Add new Trainer</a>
                    </div>
                     {{--Trainer List Item--}}
                     <hr/>
                     <div class="list-group">
                      <a href="/logout" id="logout" class="list-group-item list-group-item-secondary">Logout</a>
                      {{-- <a href="/trainer_details" class="list-group-item list-group-item-secondary">Trainer Details</a> --}}
                    </div>

                </div>


                <div class="col-md-10">
                    <div class="card card1">
                      <div class="card-header p-2">
                        <ul class="nav nav-pills">
                          <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Weekly</a></li>
                          <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Monthly</a></li>
                          <li class="nav-item"><a class="nav-link" href="#" data-toggle="tab">Yearly</a></li>
                          <li class="nav-item"><a class="nav-link" href="#" data-toggle="tab">Custom</a></li>
                        </ul>
                      </div><!-- /.card-header -->
                    </div>
                      <div class="card-body1">
                              <!-- Content Wrapper. Contains page content -->
                                  <div class="tab-content">
                                      <div class="active tab-pane" id="activity">
                                        <div class="row">
                                          <div class="col-md-5">
                                              <!-- AREA CHART -->
                                              <div class="card card-primary">
                                                <div class="card-header">
                                                  <h3 class="card-title">Area Chart</h3>
                                                   <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                      <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                      <i class="fas fa-times"></i>
                                                    </button>
                                                  </div>
                                                </div>
                                                <div class="card-body1">
                                                  <div class="chart">
                                                    <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                  </div>
                                                </div>

                                              </div>
                                              <!-- /.card -->
                                              <!-- DONUT CHART -->
                                              <div class="card card-danger">
                                                <div class="card-header">
                                                  <h3 class="card-title">Donut Chart</h3>

                                                  <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                      <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                      <i class="fas fa-times"></i>
                                                    </button>
                                                  </div>
                                                </div>
                                                <div class="card-body1">
                                                  <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                </div>

                                              </div>
                                              <!-- /.card -->

                                              <!-- PIE CHART -->
                                              <div class="card card-danger">
                                                <div class="card-header">
                                                  <h3 class="card-title">Pie Chart</h3>

                                                  <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                      <i class="fas fa-minus"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                      <i class="fas fa-times"></i>
                                                    </button>
                                                  </div>
                                                </div>
                                                <div class="card-body1">
                                                  <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                </div>

                                              </div>
                                              <!-- /.card -->
                                          </div>
                                          <!-- /.col (LEFT) -->
                                          <div class="col-md-5">
                                             <!-- LINE CHART -->
                                          <div class="card card-info">
                                            <div class="card-header">
                                              <h3 class="card-title">Line Chart</h3>

                                              <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                  <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                  <i class="fas fa-times"></i>
                                                </button>
                                              </div>
                                            </div>
                                            <div class="card-body1">
                                              <div class="chart">
                                                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                              </div>
                                            </div>
                                            <!-- /.card-body -->
                                          </div>
                                          <!-- /.card -->

                                          <!-- BAR CHART -->
                                          <div class="card card-success">
                                            <div class="card-header">
                                              <h3 class="card-title">Bar Chart</h3>

                                              <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                  <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                  <i class="fas fa-times"></i>
                                                </button>
                                              </div>
                                            </div>
                                            <div class="card-body1">
                                              <div class="chart">
                                                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                              </div>
                                            </div>
                                            <!-- /.card-body -->
                                          </div>
                                          <!-- /.card -->

                                          <!-- STACKED BAR CHART -->
                                          <div class="card card-success">
                                            <div class="card-header">
                                              <h3 class="card-title">Stacked Bar Chart</h3>

                                              <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                  <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                  <i class="fas fa-times"></i>
                                                </button>
                                              </div>
                                            </div>
                                            <div class="card-body1">
                                              <div class="chart">
                                                <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                              </div>
                                            </div>
                                            <!-- /.card-body -->
                                          </div>
                                          <!-- /.card -->
                              </div>


                          </div>
                          <!-- /.tab-pane -->

                          <!-- /.tab-pane -->
                        </div>
                         <div class="tab-pane" id="timeline">
                         </div>
                          <!-- /.tab-pane -->
                          <div class="tab-pane" id="settings">
                          </div>
                        <!-- /.tab-content -->
                      </div>

                  <!-- /.col -->
                </div>
              </div>

                {{-- <div class="col-md-9">
                    <div class="card">
                        <div class="card-body" style="border: 1px solid rgba(191, 184, 199, 0.349)">
                            <h3 class="card-title card-title1">Register new members</h3>
                            <form method="post" enctype="multipart/form-data">
                             <input type="hidden" name="_token" value="{{csrf_token()}}">
                              @if(Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        {{ Session::put('success',null) }}
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
                              <div class="row">
                                <div class="col-5">
                                  <button style="color: white" type="submit" class="btn btn-primary btn-block">Add Member</button>
                                </div>
                              </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
   <!-- Content Wrapper. Contains page content -->


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




	{{-- {{ asset('') }} --}}
    <script src="{{ asset('/js/vendor/modernizr-3.11.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/js/plugins.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/sweetalert.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/toastr.min.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
	</body>
</html>
