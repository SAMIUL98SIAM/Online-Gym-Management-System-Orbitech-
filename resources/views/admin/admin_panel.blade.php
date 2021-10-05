@extends('layouts.app')
    @section('content')
        <div class="jumbotron" style=" background: url('/img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat; height:300px;"></div>
    <div class="container">
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

                        {{--<a href="/admin/adminPanel" class="list-group-item list-group-item-action active">
                            Members
                        </a>--}}
                        <a href="/admin/adminPanel" class="list-group-item list-group-item-action active">
                            Members
                          </a>
                        <a href="/admin/member" class="list-group-item list-group-item-action">Members Details</a>
                        <a href="/admin/package" class="list-group-item list-group-item-action">Package Details</a>
                        <a href="/admin/payment" class="list-group-item list-group-item-action">Payments</a>
                    </div>
                    {{--Member List Item--}}
                    <hr/>
                    {{--Trainer List Item--}}
                    <div class="list-group">
                      <a href="/admin/trainer" class="list-group-item list-group-item-secondary">Trainer</a>
                      <a href="/admin/trainer" class="list-group-item list-group-item-secondary">Trainer Details</a>
                      <a href="/admin/trainer" class="list-group-item list-group-item-secondary">Add new Trainer</a>
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
                                                <div class="card-body">
                                                  <div class="chart">
                                                    <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                  </div>
                                                </div>
                                                <!-- /.card-body -->
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
                                                <div class="card-body">
                                                  <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                </div>
                                                <!-- /.card-body -->
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
                                                <div class="card-body">
                                                  <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                </div>
                                                <!-- /.card-body -->
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
                                                <div class="card-body">
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
                                                <div class="card-body">
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
                                                <div class="card-body">
                                                  <div class="chart">
                                                    <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                  </div>
                                                </div>
                                                <!-- /.card-body -->
                                              </div>
                                              <!-- /.card -->

                                            </div>
                                            <!-- /.col (RIGHT) -->
                                          </div>
                                          <!-- /.row -->

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
    </div>
    @endsection

   @section('scripts')
   <script>
    $(function () {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */

      //--------------
      //- AREA CHART -
      //--------------

      // Get context with jQuery - using jQuery's .get() method.
      var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

      var areaChartData = {
        labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
          {
            label               : 'Digital Goods',
            backgroundColor     : 'rgba(60,141,188,0.9)',
            borderColor         : 'rgba(60,141,188,0.8)',
            pointRadius          : false,
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : [28, 48, 40, 19, 86, 27, 90]
          },
          {
            label               : 'Electronics',
            backgroundColor     : 'rgba(210, 214, 222, 1)',
            borderColor         : 'rgba(210, 214, 222, 1)',
            pointRadius         : false,
            pointColor          : 'rgba(210, 214, 222, 1)',
            pointStrokeColor    : '#c1c7d1',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data                : [65, 59, 80, 81, 56, 55, 40]
          },
        ]
      }

      var areaChartOptions = {
        maintainAspectRatio : false,
        responsive : true,
        legend: {
          display: false
        },
        scales: {
          xAxes: [{
            gridLines : {
              display : false,
            }
          }],
          yAxes: [{
            gridLines : {
              display : false,
            }
          }]
        }
      }

      // This will get the first returned node in the jQuery collection.
      new Chart(areaChartCanvas, {
        type: 'line',
        data: areaChartData,
        options: areaChartOptions
      })

      //-------------
      //- LINE CHART -
      //--------------
      var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
      var lineChartOptions = $.extend(true, {}, areaChartOptions)
      var lineChartData = $.extend(true, {}, areaChartData)
      lineChartData.datasets[0].fill = false;
      lineChartData.datasets[1].fill = false;
      lineChartOptions.datasetFill = false

      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: lineChartData,
        options: lineChartOptions
      })

      //-------------
      //- DONUT CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
      var donutData        = {
        labels: [
            'Chrome',
            'IE',
            'FireFox',
            'Safari',
            'Opera',
            'Navigator',
        ],
        datasets: [
          {
            data: [700,500,400,600,300,100],
            backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
          }
        ]
      }
      var donutOptions     = {
        maintainAspectRatio : false,
        responsive : true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      })

      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieData        = donutData;
      var pieOptions     = {
        maintainAspectRatio : false,
        responsive : true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
      })

      //-------------
      //- BAR CHART -
      //-------------
      var barChartCanvas = $('#barChart').get(0).getContext('2d')
      var barChartData = $.extend(true, {}, areaChartData)
      var temp0 = areaChartData.datasets[0]
      var temp1 = areaChartData.datasets[1]
      barChartData.datasets[0] = temp1
      barChartData.datasets[1] = temp0

      var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
      }

      new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
      })

      //---------------------
      //- STACKED BAR CHART -
      //---------------------
      var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
      var stackedBarChartData = $.extend(true, {}, barChartData)

      var stackedBarChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        scales: {
          xAxes: [{
            stacked: true,
          }],
          yAxes: [{
            stacked: true
          }]
        }
      }

      new Chart(stackedBarChartCanvas, {
        type: 'bar',
        data: stackedBarChartData,
        options: stackedBarChartOptions
      })
    })
  </script>
   @endsection
