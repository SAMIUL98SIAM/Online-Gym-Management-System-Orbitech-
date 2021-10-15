@extends('layouts.admin.app')

@section('cover_image')
    <div class="jumbotron" style=" background: url('/img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat; height:300px;"></div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <a href="/admin/adminPanel" style="color: #000;background:#fff;" class="btn btn-sm">GO BACK</a>
                </div>
                <div class="col-md-3">
                    <h4>Payment Details</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div  class="col-md-12">
                        <div class="card-body">
                            <form action="/search_date" method="post">

                                {{ csrf_field() }}
                                <input type="date" name="from" class="input" value="{{date('Y-m-d')}}">&nbsp;
                                <input type="date" name="to" class="input" value="{{date('Y-m-d')}}">&nbsp;
                                <button type="submit" class="btn btn-primary text-white"><i class="fa fa-search"></i>Search</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card1">
                            <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Paid Member</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Non Paid Memeber</a></li>
                                <li class="nav-item"><a class="nav-link" href="#Weekly" data-toggle="tab">Non Packaged</a></li>
                            </ul>
                            </div><!-- /.card-header -->
                        </div>
                        <div class="card-body1">
                            <!-- Content Wrapper. Contains page content -->
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1>Member who had already payment</h1>
                                                    {{-- <div class="table-responsive"> --}}
                                                        <table class="table table-striped table-bordered zero-configuration text-center">
                                                            <thead>
                                                                <tr>
                                                                    {{-- <th>Payment ID</th> --}}
                                                                    <th>Member ID</th>
                                                                    <th>Package ID</th>
                                                                    <th>Package Name</th>
                                                                    <th>Amount</th>
                                                                    <th>Member First Name</th>
                                                                    <th>Date</th>
                                                                    <th>Payment Type</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                {{-- @foreach(App\Models\Member::latest()->get() as $row) --}}
                                                                @foreach($members as $row)
                                                                @if($row->payment_counter == '1')
                                                                    <tbody>
                                                                        <tr>
                                                                        <td>{{$row['id']}}</td>
                                                                        <td>{{$row->package['id']}}</td>
                                                                        <td>{{$row->package['package_name']}}</td>
                                                                        <td>{{$row->package['amount']}}</td>
                                                                        <td>{{$row['first_name']}}</td>
                                                                        <td>{{$row['payment_date']}}</td>
                                                                        <td>{{$row['payment_type']}}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                @else

                                                                @endif
                                                                @endforeach
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                {{-- </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!--Paid/-->

                                    <div class="tab-pane" id="timeline">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h1>Member who get's package</h1>
                                                <table class="table table-striped table-bordered zero-configuration text-center">
                                                    <thead>
                                                        <tr>
                                                            {{-- <th>Payment ID</th> --}}
                                                            <th>Package ID</th>
                                                            <th>Package Name</th>
                                                            <th>Amount</th>
                                                            <th>Member ID</th>
                                                            <th>Member First Name</th>
                                                            <th>Make Payment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        @foreach($members as $key=>$member)
                                                        @if(
                                                        (($member->payment_counter== '0')  ||         ($member->payment_counter== Null)) && ($member->package_counter== '1'))
                                                            <tbody>
                                                                <tr>
                                                                {{-- <td>{{$row['id']}}</td> --}}
                                                                <td>{{$member->package['id']}}</td>
                                                                <td>{{$member->package['package_name']}}</td>
                                                                <td>{{$member->package['amount']}}</td>
                                                                <td>{{$member['id']}}</td>
                                                                <td>{{$member['first_name']}}</td>
                                                                {{-- <td>{{$row['payment_type']}}</td> --}}
                                                                <td><button type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#paymentModal{{ $key }}"><i class="fa fa-money"></i> </button></td>
                                                            {{--Make Payment Modal--}}
                                                                <div style="color: #000" class="modal fade" id="paymentModal{{ $key }}">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Make New Payment to {{$member->first_name}}</h5>
                                                                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post" action="{{ route('admin.member.payment.store',$member->id)}}">
                                                                                    @csrf
                                                                                    @method('PUT')
                                                                                    <label>Date: </label>                                <div class="input-group  mb-3">
                                                                                        <input type="datetime-local" id="payment_date"
                                                                                        name="payment_date"  value="{{$member->payment_date}}">
                                                                                        <span class="text-danger">@error('payment_date'){{ $message }}@enderror</span>
                                                                                    </div>
                                                                                    <div class="input-group  mb-3">
                                                                                        <select name="payment_type" id="payment_type"     class="form-control">
                                                                                            <option selected disabled>Select the payment option</option>
                                                                                            <option value="cash">Cash</option>
                                                                                            <option value="Bkash">Bkash</option>
                                                                                            <option value="Card">Card</option>
                                                                                        </select>
                                                                                        <div class="input-group-append">
                                                                                        <div class="input-group-text">
                                                                                            <span class="fas fa-money"></span>
                                                                                        </div>
                                                                                        </div>
                                                                                        <span class="text-danger">@error('payment_type'){{ $message }}@enderror</span>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="submit" class="btn btn-primary">Save Package</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                {{-- Make Payment Modal--}}
                                                                </tr>
                                                            </tbody>
                                                        @endif
                                                        @endforeach
                                                    </tr>
                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Paid/Non-Paid/-->
                                    <div class="tab-pane" id="Weekly">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h1>Member who doesn't package</h1>
                                                    <table class="table table-striped table-bordered zero-configuration text-center">
                                                        <thead>
                                                            <tr>
                                                                <th>Member ID</th>
                                                                <th>Member First Name</th>
                                                                <th>Make Package</th>
                                                                {{-- <th>Payment Type</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            @foreach(App\Models\Member::latest()->get() as $key=>$member)
                                                            @if(($member->package_counter == '0') || ($member->package_counter == Null))
                                                                <tbody>
                                                                    <tr>
                                                                        <td>{{$member['id']}}</td>
                                                                        <td>{{$member['first_name']}}</td>
                                                                        <td><button type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#basicModal{{ $key }}"><i class="fa fa-gift"></i> </button></td>
                                                                    {{--Make Package Modal--}}
                                                                    <div style="color: #000" class="modal fade" id="basicModal{{ $key }}">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title">Member Details</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form method="post" action="{{ route('admin.member.package.store',$member->id)}}">
                                                                                        @csrf
                                                                                        @method('PUT')
                                                                                        {{-- admin.member.package.store --}}
                                                                                        <div class="form-group">
                                                                                            <label class="first_name">First Name</label>
                                                                                            <input type="text" name="first_name" class="form-control" required="" value="{{ $member->first_name }}">
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
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                            <button type="submit" class="btn btn-primary">Save Package</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    {{--Make Package Modal--}}
                                                                    </tr>
                                                                </tbody>
                                                            @endif
                                                            @endforeach
                                                        </tr>
                                                    </tbody>
                                                  </table>
                                                </div>
                                            </div>
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
