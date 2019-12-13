<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,600&display=swap"
          rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">

    <title>FourSeasons - Dashboard</title>

    @stack('css_booking_page')
    @stack('css_calendar')
    @stack('css_custom')
    <style>
        body { background-color: #F9F9FC !important;font-family: 'Montserrat', sans-serif;}
        .fa, .fas, .far { color: #9899ac !important; }
        .fas.fa-angle-up { color: #fff !important; }
    </style>
</head>
<body id="page-top">
<div id="app">
    @if(Route::current()->getName() != 'login')
        @include('layouts._header')
    @endif
    @yield('content')
</div>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Page level plugin JavaScript-->
{{--<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>--}}

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin.min.js') }}"></script>

<!-- Scripts -->
@stack('scripts')
@stack('calendar')
</body>
</html>
