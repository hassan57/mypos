<!DOCTYPE HTML>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Dashboard</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        {{--<!--bootstrap 3.7.0 -->--}}
        <link rel="stylesheet" href="{{ asset('dashboard/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('dashboard/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{ asset('dashboard/css/skin-blue.min.css')}}">
        <link rel="stylesheet" href="{{ asset('dashboard/css/_all-skins.min.css')}}">
    
        @if(app()->getLocale() == 'ar')
            <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
            <link rel="stylesheet" href="{{ asset('dashboard/css/font-awesome.min.css')}}">
            <link rel="stylesheet" href="{{ asset('dashboard/css/AdminLTE-rtl.min.css')}}">
            <link rel="stylesheet" href="{{ asset('dashboard/css/bootstrap-rtl.min.css')}}">
            <link rel="stylesheet" href="{{ asset('dashboard/css/rtl.css')}}">

            <style>
                body, h1, h2, h3, h4, h5, h6{
                    font-family: 'Cairo', sans-serif !important;
                }
            </style>

        @else
            <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i|Montserrat:400,700" rel="stylesheet'">
            <link rel="stylesheet" href="{{ asset('dashboard/css/AdminLTE.min.css')}}">
            <link rel="stylesheet" href="{{ asset('dashboard/css/font-awesome.min.css')}}">

            <style>
                body, h1, h2, h3, h4, h5, h6{
                    font-family: 'Raleway', sans-serif !important;
                }
            </style>
        @endif

        {{--<!-- JQuery 3 -->--}}
        <script src="{{ asset('dashboard/js/jquery.min.js') }}"></script>

        {{--<!-- noty -->--}}
        <link rel="stylesheet" href="{{ asset('dashboard/plugins/noty/noty.css')}}">
        <script src="{{ asset('dashboard/plugins/noty/noty.min.js') }}"></script>

        {{--<!-- iCheck -->--}}
        <link rel="stylesheet" href="{{ asset('dashboard/plugins/icheck/all.css')}}">

        <style type="text/css">

        </style>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            @include('layouts.dashboard._header')

            @include('layouts.dashboard._aside')

            @yield('content')
            
        </div>
        
        @include('partials._sessions')

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.5
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Hassan Elhawary</a>.</strong> All rights
            reserved.
        </footer>

        @include('layouts.dashboard._sidebar')
        
        {{--<!--bootstrap 3.7.0 -->--}}
        <script src="{{ asset('dashboard/js/bootstrap.min.js') }}"></script>

        {{--<!--iCheck-->--}}
        <script src="{{ asset('dashboard/plugins/iCheck/icheck.min.js') }}"></script>

        {{--<!--jquery UI->--}}
        <script src="{{ asset('dashboard/jquery-ui.min.js') }}"></script>

        {{--<!--Main Scripts->--}}
        <script src="{{ asset('dashboard/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('dashboard/js/dashboard.js') }}"></script>
        <script src="{{ asset('dashboard/js/demo.js') }}"></script>

        @stack('js')
    </body>
</html>
    