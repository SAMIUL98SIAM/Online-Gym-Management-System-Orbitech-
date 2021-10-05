@extends('layouts.app')
    @section('content')
		<div class="jumbotron" style=" background: url('/img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat; height:300px;"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8" style="display: block; margin-left:18%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <a style="color: #000;background:#fff;" href="/admin/adminPanel" class="btn btn-sm">GO BACK</a>
                                </div>
                                <div class="col-md-3">
                                    <h4>Packagess Details</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
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
                                              <div class="input-group  mb-3">
                                                <input type="text" name="package_name" value="{{$package['package_name']}}" class="form-control" placeholder="Package Name">
                                                <div class="input-group-append">
                                                  <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                  </div>
                                                </div>
                                                <span class="text-danger">@error('package_name'){{ $message }}@enderror</span>
                                              </div>
                                              <div class="input-group  mb-3">
                                                <input type="number" name="amount" value="{{$package['amount']}}" class="form-control" placeholder="Amount">
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
                                                    <button style="color: white" type="submit" class="btn btn-primary btn-block">Update Package</button>
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
	@endsection
