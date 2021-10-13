@extends('layouts.admin.app')

@section('cover_image')
    <div class="jumbotron" style=" background: url('/img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat; height:300px;"></div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body" style="background-color:#3498DB;">
            <div class="row">
                <div class="col-md-4">
                    <a href="/admin/adminPanel" style="color: #000;background:#fff;" class="btn btn-sm">GO BACK</a>
                </div>
                <div class="col-md-4">
                    <h4>Add Trainer</h4>
                </div>
                <div class="col-md-4">
                    <button style="color: #000"; type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#basicCreateModal"><i class="fa fa-plus"></i> Create Trainer <i class="fa fa-user"></i></button>
                </div>
                <!--Create Modal-->
                <div class="modal fade" id="basicCreateModal">
                    <div style="color: #000" class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Create Package</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('admin.trainer.store') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="trainer_name">Trainer Name</label>
                                        <input type="text" name="trainer_name" class="form-control" required="" placeholder="Package Name">
                                    </div>
                                    <div class="form-group">
                                        <label class="email">Email</label>
                                        <input type="email" name="email" class="form-control" required="" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label class="phone">Phone </label>
                                        <input type="number" name="phone" class="form-control" required="" placeholder="Phone Number">
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
                <!--Create Modal-->
            </div>

            <div class="card-body" style="background-color:#3498DB;">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    {{-- <th>ID</th> --}}
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @foreach(App\Models\Trainer::latest()->get() as $flag=> $trainer_user)
                                    <tbody>
                                        <tr>
                                        {{-- <td>{{$trainer_user->id}}</td> --}}
                                        <td>{{$flag+1}}</td>
                                        <td>{{$trainer_user['trainer_name']}}</td>
                                        <td>{{$trainer_user['email']}}</td>
                                        <td>{{$trainer_user['phone']}}</td>
                                        <td><button type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#basicModal{{ $flag }}"><i class="fa fa-edit"></i> </button></td>
                                        {{--Edit Modal--}}
                                        <div style="color: #000" class="modal fade" id="basicModal{{ $flag }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Package</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{ route('admin.trainer.update',$trainer_user->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label class="trainer_name">Package Name</label>
                                                                <input type="text" name="trainer_name" class="form-control" required="" value="{{ $trainer_user->trainer_name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="Email">Email</label>
                                                                <input type="email" name="email" class="form-control" required="" value="{{ $trainer_user->email }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="phone">Phone</label>
                                                                <input type="text" name="phone" class="form-control" required="" value="{{ $trainer_user->phone }}">
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

                                    <td><button type="button" class="btn btn-danger text-white" data-toggle="modal" data-target="#basicDeleteModal{{ $flag }}"><i class="fa fa-trash"></i> </button></td>
                                    {{--Delete Modal--}}
                                    <div style="color: #000" class="modal fade" id="basicDeleteModal{{ $flag }}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete Package</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('admin.trainer.destroy',$trainer_user->id) }}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label class="trainer_name">Package Name</label>
                                                            <input type="text" name="trainer_name" class="form-control" required="" value="{{ $trainer_user->trainer_name }}" disabled>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Remove</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--Delete Modal--}}
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
