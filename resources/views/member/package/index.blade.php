@extends('layouts.member.app')

@section('cover_image')
    <div class="jumbotron" style=" background: url('/img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat; height:300px;"></div>
@endsection

@section('content')
 <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <a style="color: #000;background:#fff;" href="/Member" class="btn btn-sm">GO BACK</a>
            </div>
            <div class="col-md-6">
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
                                 <h4 style="color: crimson ; margin-bottom:12px;"> You have taken these <b style="color: blanchedalmond"> "{{ $member->package['package_name'] }}"</b> packages. You have only choose 1 package</h4>
                              @else
                              <h4 style="color: crimson ; margin-bottom:12px;"> You have choose no packages. You have only choose 1 package</h4>
                              @endif

                              {{-- <h2> You have taken {{ $member['last_name'] }}< packages</h2> --}}
                              <div class="input-group  mb-3" hidden>
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
                                  @foreach ( App\Models\Package::latest()->get() as $package)
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
                             <div class="row">
                              <!-- /.col -->
                              <div class="col-4">
                                @if($member->payment_counter=="1")
                                    <button style="color: white" type="submit" class="btn btn-primary btn-block" disabled>Already got package</button>
                                @else
                                    <button style="color: white" type="submit" class="btn btn-primary btn-block">Get these Package</button>
                                @endif
                              </div>
                              <div class="col-4">
                                @if(($member->package_counter=="1") && ($member->payment_counter=="1"))
                                    <a style="color: white " href="/member/payment" type="button" class="btn btn-primary btn-block disabled">got throw payment</a>
                                @else
                                     <a style="color: white" href="/member/payment" type="button" class="btn btn-primary btn-block">got throw payment</a>
                                @endif

                              </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
