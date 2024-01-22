<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @hasSection('title')
            @yield('title') | {{ str_replace('_', ' ', config('app.name', 'Machine Test')) }}
        @else
            {{ str_replace('_', ' ', config('app.name', 'Machine Test')) }}
        @endif</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">

    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.css') }}">


    <link rel="shortcut icon" href="{{ url('storage/favicon.ico') }}" type="image/x-icon">


</head>

<body class="hold-transition login-page">


                @yield('content')


            





    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>


    {{-- <script src="{{ asset('assets/admin/js/layout/helper.js') }}"></script> --}}
    <script src="{{ asset('assets/js/layout/script.js') }}"></script>
    <script src="{{ asset('assets/js/auth/login.js') }}"></script>

    @yield('js')


    <noscript>Your browser does not support JavaScript!</noscript>
</body>

</html>
