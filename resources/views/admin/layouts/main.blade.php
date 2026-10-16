
<!doctype html>
<html lang="en">
    @include('admin.partials.head')
    
    <body data-sidebar="dark">
        <div id="layout-wrapper">
            @include('admin.partials.header')
            <div class="vertical-menu" style="background-image: url('{{asset('assets/images/bg1.jpg')}}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                <div style="background: rgba(0,0,0,0.6); min-height: 100%; height: 100%;">
                    <div data-simplebar class="h-100">
                        <div id="sidebar-menu">
                            <ul class="metismenu list-unstyled" id="side-menu">
                                <li class="menu-title" key="t-menu">Main Menu</li>
                                <li>
                                    <a href="{{route('dashboard.index')}}" class="waves-effect">
                                        <i class="bx bx-home-circle"></i>
                                        <span key="t-dashboard">Dashboard</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('complaints.index')}}" class="waves-effect">
                                        <i class="bx bx-volume-low"></i>
                                        <span key="t-transactions">Pengaduan</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('admin.feedback.index')}}" class="waves-effect">
                                        <i class="bx bx-message-edit"></i>
                                        <span>Masukan & Kritik</span>
                                    </a>
                                </li>
                                @if(Auth::user()->level_id == '1')
                                <li>
                                    <a href="{{route('society.index')}}" class="waves-effect">
                                        <i class="bx bxs-user-badge"></i>
                                        <span key="t-transactions">Non-Satker</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('satker.index')}}" class="waves-effect">
                                        <i class="bx bxs-buildings"></i>
                                        <span key="t-satker">Satuan Kerja</span>
                                    </a>
                                </li>
                                <li class="menu-title" key="t-menu">Administrator</li>
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <i class="bx bxs-user-detail"></i>
                                        <span key="t-crypto">Manajemen User</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{route('users.create')}}" key="t-wallet">Tambah User</a></li>
                                        <li><a href="{{route('users.index')}}" key="t-buy">Daftar User</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{url('admin/report/day')}}" class="waves-effect">
                                        <i class="bx bx-tone"></i>
                                        <span key="t-transactions">Laporan</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-content">
                @yield('content')
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                &copy; Copyright <strong>Kantor Pelayanan Perbendaharaan Negara</strong>. All Rights Reserved
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <div class="rightbar-overlay"></div>
        @include('admin.partials.script')
    </body>
    @stack('script')
</html>
