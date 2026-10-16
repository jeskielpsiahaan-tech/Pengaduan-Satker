<head>
        
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link rel="shortcut icon" href="{{asset('assets/images/gkn.png')}}">
    <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/libs/spectrum-colorpicker2/spectrum.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/libs/%40chenfengyuan/datepicker/datepicker.min.css')}}">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <style>
        .mini-stats-wid .card-body .d-flex { display: flex !important; align-items: center; }
        .mini-stats-wid .card-body .d-flex .flex-grow-1 { flex: 1; }
        .mini-stats-wid .card-body .d-flex .mini-stat-icon { flex-shrink: 0; display: flex; align-items: center; justify-content: center; width: 48px; height: 48px; }
        .mini-stats-wid .card-body .d-flex .mini-stat-icon .avatar-title { display: flex; align-items: center; justify-content: center; width: 100%; height: 100%; border-radius: 50%; color: #fff; font-size: 24px; }
    </style>
    <style>
        @media print { a[href]::after { content: none !important; } }
        .navbar-header a[href]::after, .dropdown-menu a[href]::after { content: none !important; display: none !important; }
        a[href]::after { content: none !important; }
    </style>
    @yield('css')
</head>