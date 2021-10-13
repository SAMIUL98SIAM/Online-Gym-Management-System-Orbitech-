@extends('layouts.admin.app')

@section('cover_image')
    <div class="jumbotron" style=" background: url('/img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat; height:300px;"></div>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div  class="col-md-12">
                    <h1 style="text-align: center">Members Details</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <a href="/admin/adminPanel" type="button" style="color: #000;background:#fff;border: 1px solid rgba(191, 184, 199, 0.349)" class="btn btn-sm" >GO BACK</a>
                </div>
                <div class="col-md-10">
                    <form class="form-group" method="post">
                        <div class="row">
                            <div class="col-md-10">
                                <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data"/>
                                <h3 align="center" style="margin-top: 5px;">Total Member : <span style="color: rgb(0, 255, 149)" id="total_records"></span></h3>
                            </div>
                            <div class="col-md-2">
                                <button style="color: #fff" type="button" class="btn btn-success" data-toggle="modal" data-target="#AddStudentModal">Add <i class="fas fa-user"></i></button>
                                <div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="AddStudentModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header" id="AddStudentModalLabel">
                                        <h3 class="" style="color: #000" >Register new members</h3>
                                    </div>
                                    <div class="modal-body">
                                        <form id="contact-frm" action="{{ route('admin.member.store') }}">
                                            <input type="hidden" id="token">
                                            {{-- @csrf --}}
                                            {{-- value="{{ @csrf_token() }} --}}
                                            {{-- {{ csrf_field() }} --}}
                                            <ul id="save_msgList"></ul>
                                            <div id="success_message"></div>
                                                <div class="input-group mb-3">
                                                <input type="text" id="first_name" name="first_name" value="{{old('first_name')}}" required class="first_name form-control" placeholder="First Name">
                                                <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="text" id="last_name" name="last_name" value="{{old('last_name')}}" required class="last_name form-control" placeholder="Last Name">
                                                <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-user"></span>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="email" id="email" name="email" value="{{old('email')}}" required class="email form-control" placeholder="Email">
                                                <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-envelope"></span>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <input type="number" id="phone" name="phone" value="{{old('phone')}}" required class="phone form-control" placeholder="Phone">
                                                <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-phone"></span>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-5">
                                                <button style="color: white" type="button" id="btn" class="btn btn-primary btn-block add_student">Add Member</button>
                                                </div>
                                            </div>
                                            </form>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    {{-- Delete Modal --}}
                    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Student Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h4>Confirm to Delete Data ?</h4>
                                    <input type="hidden" id="deleteing_id">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary delete_student">Yes Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered zero-configuration text-center">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                {{-- <th>Counter</th> --}}
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
        <script>
            $(document).on('click', '.add_student', function (e) {
            e.preventDefault();

            $(this).text('Sending...');

            var data = {
                'first_name': $('.first_name').val(),
                'last_name': $('.last_name').val(),
                'email': $('.email').val(),
                'phone': $('.phone').val(),
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "/admin/member/create",
                data: data,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                        $('.add_student').text('Add Member');
                    }
                    /*else
                    {
                        $('#save_msgList').html("");
                        redirect('/admin/member_search');
                    } */
                    else
                    {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-light');
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);
                        $('#AddStudentModal').find('input').val('');
                        $('.add_student').text('Member Saved');
                        // $('#AddStudentModal').modal('hide');
                        //edirect_member();
                        //fetchstudent();
                        // fetchstudent();
                    }
                }
            });

        });
        </script>

       {{--Search--}}
       <script>
               $(document).ready(function(){

                   fetch_customer_data();

                   function fetch_customer_data(query = '')
                   {
                       $.ajax({
                               url:"{{ route('admin.memberaction') }}",
                               method:'GET',
                               data:{query:query},
                               dataType:'json',
                           success:function(data)
                           {
                               $('tbody').html(data.table_data);
                               $('#total_records').text(data.total_data);
                           }
                       })
                   }

                   $(document).on('keyup', '#search', function(){
                   var query = $(this).val();
                   fetch_customer_data(query);
                   });
               });
       </script>
      {{--Search--}}
@endsection
