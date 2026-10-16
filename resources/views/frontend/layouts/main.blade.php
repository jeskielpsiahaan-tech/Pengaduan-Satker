
<!doctype html>
<html lang="en">
<head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{asset('assets/images/gkn.png')}}">
        <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        <style>
            .mini-stats-wid .card-body .d-flex { display: flex !important; align-items: center !important; }
            .mini-stats-wid .card-body .d-flex .flex-grow-1 { flex: 1 !important; }
            .mini-stats-wid .mini-stat-icon { flex-shrink: 0; width: 48px !important; height: 48px !important; display: flex !important; align-items: center !important; justify-content: center !important; }
            .mini-stats-wid .mini-stat-icon .avatar-title { width: 100% !important; height: 100% !important; display: flex !important; align-items: center !important; justify-content: center !important; border-radius: 50% !important; color: #fff !important; font-size: 22px !important; }
        </style>
        @yield('css')
    </head>
    <body data-topbar="dark" data-layout="horizontal">
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/logo1.png')}}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('assets/logo1.png')}}" alt="" height="40">
                                </span>
                            </a>

                            <a href="{{url('user/home')}}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{asset('assets/logo1.png')}}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{asset('assets/logo1.png')}}" alt="" height="70">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block d-lg-none ml-2">
                            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="mdi mdi-magnify"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                                aria-labelledby="page-header-search-dropdown">
                    
                                <form class="p-3">
                                    <div class="form-group m-0">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Search input">
                                
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <div class="dropdown d-none d-lg-inline-block ml-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="bx bx-fullscreen"></i>
                            </button>
                        </div>



                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user"
                                    @if(Session::get('tipe_pengadu') == 'satker')
                                        src="{{asset('assets/images/profile-img.png')}}"
                                    @else
                                        src="{{url('avatar_society/',Session::get('photo') ?? 'default.png')}}"
                                    @endif
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{Session::get('name')}}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-item" style="pointer-events:none;">
                                    <div class="d-flex align-items-center">
                                        @if(Session::get('tipe_pengadu') == 'satker')
                                            <img src="{{asset('assets/images/profile-img.png')}}" class="rounded-circle me-2" style="width:36px;height:36px;object-fit:cover;">
                                        @else
                                            <img src="{{url('avatar_society/',Session::get('photo') ?? 'default.png')}}" class="rounded-circle me-2" style="width:36px;height:36px;object-fit:cover;">
                                        @endif
                                        <div>
                                            <div class="fw-bold">{{Session::get('name')}}</div>
                                            <small class="text-muted">@if(Session::get('tipe_pengadu') == 'satker') Satker @else Non-Satker @endif</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{route('user_logout')}}"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                            </div>
                        </div>

                       
            
                    </div>
                </div>
            </header>
    
            <div class="topnav">
                <div class="container-fluid">
                    <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                        <div class="collapse navbar-collapse" id="topnav-menu-content">
                            <ul class="navbar-nav">

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button"
                                    >
                                        <i class="bx bx-home-circle me-2"></i><span key="t-dashboards">Dashboards</span> <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-dashboard">

                                        <a href="{{url('user/home')}}" class="dropdown-item" key="t-default">Default</a>
                                        
                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                                    >
                                        <i class="bx bx-customize me-2"></i><span key="t-apps">Pengaduan</span> <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-pages">

                                        <a href="{{route('complaint')}}" class="dropdown-item" key="t-calendar">Daftar Pengaduan</a>

                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-pages" role="button"
                                    >
                                        <i class="bx bx-customize me-2"></i><span key="t-apps">Buat Pengaduan</span> <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-pages">

                                        <a href="{{route('add_complaint')}}" class="dropdown-item" key="t-calendar">Buat Pengaduan</a>

                                    </div>
                                </li>

                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle arrow-none" href="#" role="button">
                                        <i class="bx bx-message-edit me-2"></i><span>Masukan & Kritik</span> <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu">
                                        <a href="{{route('feedback.create')}}" class="dropdown-item">Kirim Masukan & Kritik</a>
                                    </div>
                                </li>



                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div style="background-image: url('{{asset('assets/images/bg5.JPG')}}'); background-size: cover; background-attachment: fixed; background-position: center; min-height: 100vh; position: relative; display: flex; flex-direction: column;">
                <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.55); z-index: 0; pointer-events: none;"></div>
                <div class="main-content" style="position: relative; z-index: 1; flex: 1;">
                    @yield('content')
                </div>
                <footer style="position: relative; z-index: 1; padding: 16px 0; text-align: center; color: #fff; border-top: 1px solid rgba(255,255,255,0.15);">
                    &copy; Copyright <strong>Kantor Pelayanan Perbendaharaan Negara</strong>. All Rights Reserved
                </footer>
            </div>
        </div>
        <div class="rightbar-overlay"></div>
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('assets/js/pages/dashboard.init.js')}}"></script>
        <script src="{{asset('assets/js/app.js')}}"></script>
    </body>
    @stack('script')
</html>
