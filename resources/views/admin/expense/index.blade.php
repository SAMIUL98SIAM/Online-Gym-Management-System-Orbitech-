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
                    <h4>Expense Details</h4>
                </div>

                <div class="col-md-4">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#basicModal">Create Package</button>
                    <!-- Modal -->
                        <div class="modal fade" id="basicModal">
                            <div style="color: #000" class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Create Expense</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('admin.expense.store') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="expense_name">Expense Name</label>
                                                <input type="text" name="expense_name" class="form-control" required="" placeholder="Expensee Name">
                                            </div>
                                            <div class="form-group">
                                                <label class="description">Description</label><br/>
                                                <textarea name="description" id="description"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="amount">Amount</label>
                                                <input type="number" name="amount" class="form-control" required="" placeholder="Amount">
                                            </div>
                                            <div class="input-group  mb-3">
                                                <select name="trainer_id" id="trainer_id" class="form-control">
                                                <option selected disabled>Trainer List</option>
                                                @foreach ( App\Models\Trainer::latest()->get() as $trainer)
                                                    <option value="{{$trainer->id }}">" '{{ $trainer->id }}' : {{$trainer->trainer_name}}"</option>
                                                @endforeach
                                                </select>
                                                <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-money"></span>
                                                </div>
                                                </div>
                                                <span class="text-danger">@error('trainer_id'){{ $message }}@enderror</span>
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
                                        {{-- <th>ID</th> --}}
                                        <th>Serial No</th>
                                        <th>Expense Name</th>
                                        <th>Amount</th>
                                        <th>Description</th>
                                        <th>Trainer Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach(App\Models\Expense::latest()->get() as $key=>$expense)

                                        <tbody>
                                        <tr>
                                        {{-- <td>{{$expense['id']}}</td> --}}
                                        <td>{{$key+1}}</td>
                                        <td>{{$expense['expense_name']}}</td>
                                        <td>{{$expense['amount']}}</td>
                                        <td>{{$expense['description']}}</td>
                                        <td>{{$expense->trainer['trainer_name']}}</td>
                                        <td>
                                            <button type="button" class="btn btn-success text-white" data-toggle="modal" data-target="#editModal{{ $key }}"><i class="fa fa-edit"></i> </button>
                                        </td>

                                        {{--Edit Modal--}}
                                        <div style="color: #000" class="modal fade" id="editModal{{ $key }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Expense</h5>
                                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post" action="{{route('admin.expense.update',$expense->id)}}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label class="expense_name">Expense Name</label>
                                                                <input type="text" name="expense_name" class="form-control" required="" value="{{ $expense->expense_name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="amount">Amount</label>
                                                                <input type="number" name="amount" class="form-control" required="" value="{{ $expense->amount }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="description">Description</label><br/>
                                                                <textarea name="description" value="{{$expense->description}}" required=""></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <lebel>{{$expense->trainer['trainer_name']}}</h4></lebel>
                                                            </div>
                                                            <div class="input-group  mb-3">
                                                                <select name="trainer_id" id="trainer_id" class="form-control">
                                                                <option selected disabled>You've already select {{$expense->trainer['trainer_name']}}, Can you change Trainer</option>
                                                                @foreach (App\Models\Trainer::latest()->get() as $trainer)
                                                                    <option value="{{$trainer->id }}">" '{{ $trainer->id }}' : {{$trainer->trainer_name}}"</option>
                                                                @endforeach
                                                                </select>
                                                                <div class="input-group-append">
                                                                <div class="input-group-text">
                                                                    <span class="fas fa-money"></span>
                                                                </div>
                                                                </div>
                                                                <span class="text-danger">@error('trainer_id'){{ $message }}@enderror</span>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--Edit Modal--}}
                                        <td>
                                            <a href="{{route('admin.expense.delete',$expense->id)}}" class="btn btn-danger" id="delete"><i class="fas fa-trash"></i></a>
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
