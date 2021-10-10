@extends('layouts.app')
    @section('content')
		<div class="jumbotron" style=" background: url('/img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat; height:300px;"></div>
        <div class="container">
            <div class="row">
                {{--New member registration form--}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" style="background-color:#3498DB;">
                            <div class="row">
                                <div class="col-md-2">
                                    <a style="color: #000;background:#fff;" href="/Member" class="btn btn-success btn-sm">GO BACK</a>
                                </div>
                            </div>
                            <div class="card-body" style="background-color:#3498DB;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body" >
                                            <h3>{{ $member->first_name }} Payment</h3>
                                        </div>
                                        <div class="card-body" style="border: 1px solid rgba(216, 207, 86, 0.952)">
                                          <form method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            @if(Session::get('success'))
                                                  <div class="alert alert-success">
                                                      {{ Session::get('success') }}
                                                  </div>
                                            @endif

                                              <div class="input-group  mb-3">
                                                <input type="text" name="package_name" value="{{$member->package['package_name']}}" class="form-control" placeholder="You have choose no package thats why you cant payment" disabled>
                                                <div class="input-group-append">
                                                  <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                  </div>
                                                </div>
                                                <span class="text-danger">@error('package_name'){{ $message }}@enderror</span>
                                              </div>
                                              <div style="display: hidden;" class="input-group  mb-3" hidden>
                                                <select name="member_id" id="member_id" class="form-control">
                                                  {{-- <option  disabled>Please select Your ID</option> --}}
                                                  @foreach ( $members as $members)
                                                     @if ($members->id == $member['id'])
                                                     <option selected value="{{$member->id}}">"{{ $member->id }}"</option>
                                                     @endif
                                                  @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                  <div class="input-group-text">
                                                    <span class="fas fa-money"></span>
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
            </div>
        </div>
    @endsection
