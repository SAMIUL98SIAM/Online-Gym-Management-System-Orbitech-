<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <link rel="apple-touch-icon" href="{{asset('/icon.png')}}">
    <link rel="stylesheet" href="{{asset('/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('/css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/sweetalert.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/toastr.css')}}"/>
    <link rel="stylesheet" href="{{asset('/css/toastr.min.css')}}"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
	<body>
        {{--Main Content--}}
         <div id="app">
             <main class="py-4">
                 @yield('content')
             </main>
        </div>
        {{--Main Content--}}

        {{--Js & Jquery--}}
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/> </svg>
         {{-- {{ asset('') }} --}}
        <script src="{{ asset('/js/vendor/modernizr-3.11.2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('/js/plugins.js') }}"></script>
        <script src="{{asset('//cdn.jsdelivr.net/npm/sweetalert2@11')}}"></script>
         <!-- jQuery -->
        <script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- SweetAlert2 -->
        <script src="{{asset('/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
        <script src="{{asset('/plugins/toastr/toastr.min.js')}}"></script>
        <script src="{{asset('/dist/js/adminlte.min.js')}}"></script>
         {{-- {{ asset('') }} --}}
         <script src="{{ asset('/js/vendor/modernizr-3.11.2.min.js') }}"></script>
         <script type="text/javascript" src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
         <script src="{{ asset('/js/plugins.js') }}"></script>
         <script type="text/javascript" src="{{ asset('/js/popper.min.js') }}"></script>
         <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
         <script type="text/javascript" src="{{ asset('/js/bootstrap.min.js') }}"></script>
         <script type="text/javascript" src="{{ asset('/js/sweetalert.min.js') }}"></script>
         <script type="text/javascript" src="{{ asset('/js/sweetalert.js') }}"></script>
         <script type="text/javascript" src="{{ asset('/js/toastr.min.js') }}"></script>
         <script src="{{ asset('/js/main.js') }}"></script>
         <script src="{{ asset('/jquery/jquery-3.5.0.min.js') }}"></script>
         <script src="{{ asset('/jquery/jquery-3.6.0.min.js') }}"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-XKa9Hemdy1Ui3KSGgJdgMyYlUg1gM+QhL6cnlyTe2qzMCYm4nAZ1PsVerQzTTXzonUR+dmswHqgJPuwCq1MaAg==" crossorigin="anonymous"></script>
         @yield('scripts')
        {{--Js & Jquery--}}
	</body>
</html>
