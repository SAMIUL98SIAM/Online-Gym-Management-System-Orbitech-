@extends('layouts.app')
    @section('content')
        <div class="jumbotron" style=" background: url('/img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat; height:300px;"></div>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    {{-- <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                          <!-- Add icons to the links using the .nav-icon class
                               with font-awesome or any other icon font library -->
                          <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                              <i class="nav-icon fas fa-tachometer-alt"></i>
                              <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                              </p>
                            </a>
                            <ul class="nav nav-treeview">
                              <li class="nav-item">
                                <a href="./index.html" class="nav-link active">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Dashboard v1</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="./index2.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Dashboard v2</p>
                                </a>
                              </li>
                              <li class="nav-item">
                                <a href="./index3.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Dashboard v3</p>
                                </a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </nav> --}}
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
                                            <div class="col-lg-3 col-6">
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
                                            <div class="col-lg-3 col-6">
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
                                            <div class="col-lg-3 col-6">
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
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-lg-3 col-10">
                                                    <div class="card-header">
                                                        <h3 class="card-title">
                                                          <i class="fas fa-chart-pie mr-1"></i>
                                                          Sales
                                                        </h3>
                                                        <div class="card-tools">
                                                          <ul class="nav nav-pills ml-auto">
                                                            <li class="nav-item">
                                                              <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                                            </li>
                                                            <li class="nav-item">
                                                              <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                                            </li>
                                                          </ul>
                                                        </div>
                                                      </div><!-- /.card-header -->
                                                      <div class="card-body">
                                                        <div class="tab-content p-0">
                                                          <!-- Morris chart - Sales -->
                                                          <div class="chart tab-pane active" id="revenue-chart"
                                                               style="position: relative; height: 300px;">
                                                              <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                                                           </div>
                                                          <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                                            <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                                                          </div>
                                                        </div>
                                                      </div><!-- /.card-body -->
                                                    </div>
                                                    <!-- /.card -->
                                                </div>
                                            </div>
                                      </div>
                                      <div class="tab-pane" id="Weekly">
                                      </div>
                                      <!-- /.tab-content -->
                                </div>
                       </div>
                  </div>
            </div>
        </div>
    </div>
    @endsection
