@extends('layouts.admin.app')

@section('cover_image')
    <div class="jumbotron" style=" background: url('/img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat; height:300px;"></div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <a href="/admin/adminPanel" style="color: #000;background:#fff;" class="btn btn-sm">GO BACK</a>
                </div>
                <div class="col-md-4">
                    <h4>Packagess Details</h4>
                </div>

                <div class="col-md-4">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#basicModal">Create Package</button>
                    <!-- Modal -->
                        <div class="modal fade" id="basicModal">
                            <div style="color: #000" class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Create Package</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('admin.package.store') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="name">Package Name</label>
                                                <input type="text" name="package_name" class="form-control" required="" placeholder="Package Name">
                                            </div>
                                            <div class="form-group">
                                                <label class="percent">Amount</label>
                                                <input type="number" name="amount" class="form-control" required="" placeholder="Amount">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered zero-configuration text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Package Name</th>
                                        <th>Amount</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach(App\Models\Package::latest()->get() as $key=>$package)
                                        <tbody>
                                        <tr>
                                        <td>{{$package['id']}}</td>
                                        <td>{{$package['package_name']}}</td>
                                        <td>{{$package['amount']}}</td>
                                        <td>
                                            <button type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#basicModal{{ $key }}"><i class="fa fa-edit"></i> </button>
                                        </td>

                                        {{--Edit Modal--}}
                                        <div style="color: #000" class="modal fade" id="basicModal{{ $key }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Package</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{ route('admin.package.update',$package->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label class="package_name">Package Name</label>
                                                                <input type="text" name="package_name" class="form-control" required="" value="{{ $package->package_name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="amount">Percent</label>
                                                                <input type="number" name="amount" class="form-control" required="" value="{{ $package->amount }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--Edit Modal--}}
                                        <td>
                                            <a href="{{route('admin.package.delete',$package->id)}}" class="btn btn-danger" id="delete"><i class="fas fa-trash"></i></a>
                                        </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
