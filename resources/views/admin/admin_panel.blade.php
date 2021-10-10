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
                        <a href="/admin/package/create" class="list-group-item list-group-item-action">Package Details</a>
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
                          <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Dashboard</a></li>
                          <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Daily</a></li>
                          <li class="nav-item"><a class="nav-link" href="#Weekly" data-toggle="tab">Weekly</a></li>
                        </ul>
                      </div><!-- /.card-header -->
                    </div>
                    <div class="card-body1">
                              <!-- Content Wrapper. Contains page content -->
                                  <div class="tab-content">
                                      <div class="active tab-pane" id="activity">
                                        <div class="row">
                                            <div class="col-lg-3 col-10">
                                              <!-- small box -->
                                              <div class="small-box bg-info">
                                                <div class="inner">
                                                  <h3>{{App\Models\Member::count()}}</h3>
                                                  <p>Total Members</p>
                                                </div>
                                                <div class="icon">
                                                  <i class="ion ion-person-add"></i>
                                                </div>
                                                <a href="/admin/member" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                              </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-3 col-md-5">
                                              <!-- small box -->
                                              <div class="small-box bg-success">
                                                <div class="inner">
                                                    <h3>{{App\Models\Package::count()}}</h3>
                                                    <p>Total Package</p>
                                                </div>
                                                <div class="icon">
                                                  <i class="ion ion-stats-bars"></i>
                                                </div>
                                                <a href="/admin/package" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                              </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-3 col-md-5">
                                              <!-- small box -->
                                              <div class="small-box bg-warning">
                                                <div class="inner">
                                                    {{-- {{$trainer_counter = App\Models\Trainer::count()}} --}}
                                                  <h3>{{App\Models\Trainer::count()}}</h3>
                                                  <p>Total Trainer</p>
                                                </div>
                                                <div class="icon">
                                                  <i class="ion ion-person-add"></i>
                                                </div>
                                                <a href="/admin/trainer" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                              </div>
                                            </div>
                                            <!-- ./col -->
                                            <div class="col-lg-3 col-md-5">
                                              <!-- small box -->
                                              <div class="small-box bg-danger">
                                                <div class="inner">
                                                  <h3>65</h3>

                                                  <p>Total Amount</p>
                                                </div>
                                                <div class="icon">
                                                  <i class="ion ion-pie-graph"></i>
                                                </div>
                                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                              </div>
                                            </div>
                                            <!-- ./col -->
                                          </div>
                                      </div>
                                      <div class="tab-pane" id="timeline">
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
                                                <!-- /.card-body1 -->
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
                                                <!-- /.card-body1 -->
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
                                                <!-- /.card-body1 -->
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
                                                <!-- /.card-body1 -->
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
                                                <!-- /.card-body1 -->
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
                                                <!-- /.card-body1 -->
                                              </div>
                                              <!-- /.card -->

                                            </div>
                                            <!-- /.col (RIGHT) -->
                                          </div>
                                          <!-- /.row -->
                                      </div>
                                      <div class="tab-pane" id="Weekly">
                                        <div class="row">
                                            <div class="col-md-4">
                                              <div class="card card-chart">
                                                <div class="card-header card-header-success">
                                                  <div class="ct-chart" id="dailySalesChart"></div>
                                                </div>
                                                <div class="card-body1">
                                                  <h4 class="card-title">Daily Sales</h4>
                                                  <p class="card-category">
                                                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                                                </div>
                                                <div class="card-footer">
                                                  <div class="stats">
                                                    <i class="material-icons">access_time</i> updated 4 minutes ago
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="card card-chart">
                                                <div class="card-header card-header-warning">
                                                  <div class="ct-chart" id="websiteViewsChart"></div>
                                                </div>
                                                <div class="card-body1">
                                                  <h4 class="card-title">Email Subscriptions</h4>
                                                  <p class="card-category">Last Campaign Performance</p>
                                                </div>
                                                <div class="card-footer">
                                                  <div class="stats">
                                                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="card card-chart">
                                                <div class="card-header card-header-danger">
                                                  <div class="ct-chart" id="completedTasksChart"></div>
                                                </div>
                                                <div class="card-body1">
                                                  <h4 class="card-title">Completed Tasks</h4>
                                                  <p class="card-category">Last Campaign Performance</p>
                                                </div>
                                                <div class="card-footer">
                                                  <div class="stats">
                                                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                      <!-- /.tab-content -->
                                </div>
                       </div>
                  </div>
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
