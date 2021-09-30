<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<title></title>
    {{--  {{ asset('') }} --}}
    <link href="{{ asset('public/frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
		<link rel="manifest" href="{{ asset('/site.webmanifest') }}">
		<link rel="apple-touch-icon" href= "{{ asset('/icon.png') }}">
		<link rel="stylesheet" href="{{ asset('/css/normalize.css') }}" >
		<link rel="stylesheet" href="{{ asset('/css/responsive.css') }}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="{{ asset('/css/all.min.css"') }}">
		<link rel="stylesheet" type="text/css" href=" {{ asset('/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/sweetalert.css"') }}"/> 
    <link rel="stylesheet" href="{{ asset('/css/toastr.css') }}" /> 
    <link rel="stylesheet" href=" {{ asset('/css/toastr.min.css') }}"/> 
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('/plugins/toastr/toastr.min.css') }} ">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }} ">
  </head>
	<body>
		<div class="jumbotron" style="background: url('/img/gym2.jpg');background-size:cover;height:200px;backgorund-repeat:no-repeat;"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    {{--Member List Item--}}
                    <div class="list-group">
                      <a class="list-group-item list-group-item-action">Admin Name: {{ $user['first_name'] }}</a>
                    </div>
                    <hr/>
                    {{--Member List Item--}}
                    <div class="list-group">
                        <a href="/adminPanel" class="list-group-item list-group-item-action active">
                        Members</a>
                        <a href="/member_search" class="list-group-item list-group-item-action">Members Details</a>
                        <a href="/package" class="list-group-item list-group-item-action">Package Details</a>
                        <a href="/payment" class="list-group-item list-group-item-action">Payments</a>
                    </div>
                    {{--Member List Item--}} 
                    <hr/> 
                    {{--Trainer List Item--}} 
                    <div class="list-group">
                      <a href="/addTrainer" class="list-group-item list-group-item-secondary">Trainer</a>
                      <a href="/addTrainer" class="list-group-item list-group-item-secondary">Trainer Details</a>
                      <a href="/addTrainer" class="list-group-item list-group-item-secondary">Add new Trainer</a>
                    </div>
                     {{--Trainer List Item--}}
                     <hr/>
                     <div class="list-group">
                      <a href="/logout" id="logout" class="list-group-item list-group-item-secondary">Logout</a>
                    </div> 
                </div>
                
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body" style="border: 1px solid rgba(191, 184, 199, 0.349)">
                            <h3 class="card-title card-title1">Register new members</h3>
                            <form method="post" enctype="multipart/form-data">
                             <input type="hidden" name="_token" value="{{csrf_token()}}">
                              @if(Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        {{ Session::put('success',null) }}
                                    </div>
                              @endif
                              <div class="input-group mb-3">
                                <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control" placeholder="First Name">
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                  </div>
                                </div>
                                <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
                              </div>
                              <div class="input-group mb-3">
                                <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control" placeholder="Last Name">
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                  </div>
                                </div>
                                <span class="text-danger">@error('last_name'){{ $message }}@enderror</span>
                              </div>
                              <div class="input-group mb-3">
                                <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                  </div>
                                </div>
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                              </div>
                              <div class="input-group mb-3">
                                <input type="number" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Phone">
                                <div class="input-group-append">
                                  <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                  </div>
                                </div>
                                <span class="text-danger">@error('phone'){{ $message }}@enderror</span>
                              </div>             
                              <div class="row">
                                <!-- /.col -->
                                <div class="col-5">
                                  <button style="color: white" type="submit" class="btn btn-primary btn-block">Add Member</button>
                                </div>
                                {{-- <button type="button" class="btn btn-default toastsDefaultMaroon">
                                  Launch Full Toast (with icon)
                                </button> --}}
                              </div>
                            </form>	
                        </div>
                    </div>
                </div>
            </div>
        </div>     
   <!-- Content Wrapper. Contains page content -->

          
                  <!-- Main content -->
                  @if(Session::has('messege'))
                  <script>
                     var type="{{Session::get('alert-type','info')}}"
                     switch(type)
                     {
                         case 'info':
                               toastr.info("{{ Session::get('messege') }}");
                               break;
                         case 'success':
                             toastr.success("{{ Session::get('messege') }}");
                             break;
                         case 'warning':
                             toastr.warning("{{ Session::get('messege') }}");
                             break;
                         case 'error':
                             toastr.error("{{ Session::get('messege') }}");
                             break;
                     }
                   </script>
                   @endif          
      


        <!-- jQuery -->
        <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- SweetAlert2 -->
        <script src="{{asset('/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <!-- Toastr -->
        <script src="{{ asset('/plugins/toastr/toastr.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('/dist/js/demo.js') }}"></script>
        <!-- Page specific script -->
        <script>
          $(function() {
            var Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 3000
            });

            $('.swalDefaultSuccess').click(function() {
              Toast.fire({
                icon: 'success',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
              })
            });
            $('.swalDefaultInfo').click(function() {
              Toast.fire({
                icon: 'info',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
              })
            });
            $('.swalDefaultError').click(function() {
              Toast.fire({
                icon: 'error',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
              })
            });
            $('.swalDefaultWarning').click(function() {
              Toast.fire({
                icon: 'warning',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
              })
            });
            $('.swalDefaultQuestion').click(function() {
              Toast.fire({
                icon: 'question',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
              })
            });

            $('.toastrDefaultSuccess').click(function() {
              toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultInfo').click(function() {
              toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultError').click(function() {
              toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultWarning').click(function() {
              toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });

            $('.toastsDefaultDefault').click(function() {
              $(document).Toasts('create', {
                title: 'Toast Title',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
              })
            });
            $('.toastsDefaultTopLeft').click(function() {
              $(document).Toasts('create', {
                title: 'Toast Title',
                position: 'topLeft',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
              })
            });
            $('.toastsDefaultBottomRight').click(function() {
              $(document).Toasts('create', {
                title: 'Toast Title',
                position: 'bottomRight',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
              })
            });
            $('.toastsDefaultBottomLeft').click(function() {
              $(document).Toasts('create', {
                title: 'Toast Title',
                position: 'bottomLeft',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
              })
            });
            $('.toastsDefaultAutohide').click(function() {
              $(document).Toasts('create', {
                title: 'Toast Title',
                autohide: true,
                delay: 750,
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
              })
            });
            $('.toastsDefaultNotFixed').click(function() {
              $(document).Toasts('create', {
                title: 'Toast Title',
                fixed: false,
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
              })
            });
            $('.toastsDefaultFull').click(function() {
              $(document).Toasts('create', {
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                icon: 'fas fa-envelope fa-lg',
              })
            });
            $('.toastsDefaultFullImage').click(function() {
              $(document).Toasts('create', {
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                image: '../../dist/img/user3-128x128.jpg',
                imageAlt: 'User Picture',
              })
            });
            $('.toastsDefaultSuccess').click(function() {
              $(document).Toasts('create', {
                class: 'bg-success',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
              })
            });
            $('.toastsDefaultInfo').click(function() {
              $(document).Toasts('create', {
                class: 'bg-info',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
              })
            });
            $('.toastsDefaultWarning').click(function() {
              $(document).Toasts('create', {
                class: 'bg-warning',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
              })
            });
            $('.toastsDefaultDanger').click(function() {
              $(document).Toasts('create', {
                class: 'bg-danger',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
              })
            });
            $('.toastsDefaultMaroon').click(function() {
              $(document).Toasts('create', {
                class: 'bg-maroon',
                title: 'Toast Title',
                subtitle: 'Subtitle',
                body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
              })
            });
          });
    </script>
		<script src="{{ asset('/js/vendor/modernizr-3.11.2.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
		<script src="{{ asset('/js/plugins.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/js/popper.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/sweetalert.js') }}"></script> 
		<script type="text/javascript" src="{{ asset('/js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
	</body>
</html>