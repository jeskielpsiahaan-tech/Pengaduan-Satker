
<!doctype html>
<html lang="en">
    @include('admin.partials.head')
    <body data-sidebar="colored">
        <div id="layout-wrapper">
            @include('admin.partials.header')
            <div class="vertical-menu">
                <div data-simplebar class="h-100">
                    <div id="sidebar-menu">
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" key="t-menu">Menu</li>
                            <li>
                                <a href="{{route('dashboard.index')}}" class="waves-effect">
                                    <i class="bx bx-home-circle"></i>
                                    <span key="t-dashboard">Dashboard</span>
                                </a>
                            </li>
                            {{-- <li>
                                <a href="{{route('dashboard.index')}}" class="waves-effect">
                                    <i class="bx bx-volume-low"></i>
                                    <span key="t-pengaduan">Pengaduan</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('dashboard.index')}}" class="waves-effect">
                                    <i class="bx bxs-user-badge"></i>
                                    <span key="t-masyarakat">Masyarakat</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bxs-user-detail"></i>
                                    <span key="t-user">Manajemen Users</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('users.create')}}" key="t-products">Add User</a></li>
                                    <li><a href="{{route('users.index')}}" key="t-product-detail">List Users</a></li>
                                </ul>
                            </li> --}}
                            <li>
                                <a href="{{url('admin/logactivity')}}" class="waves-effect">
                                    <i class="bx bx-volume-low"></i>
                                    <span key="t-transactions">Pengaduan</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('admin/logactivity')}}" class="waves-effect">
                                    <i class="bx bxs-user-badge"></i>
                                    <span key="t-transactions">Masyarakat</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bxs-user-detail"></i>
                                    <span key="t-crypto">Users Management</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('users.create')}}" key="t-wallet">Add New User</a></li>
                                    <li><a href="{{route('users.index')}}" key="t-buy">List User</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="bx bx-tone"></i>
                                    <span key="t-crypto">Report</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{url('admin/report/day')}}" key="t-wallet">Day</a></li>
                                    <li><a href="{{url('admin/report/month')}}" key="t-buy">Month</a></li>
                                    <li><a href="{{url('admin/report/year')}}" key="t-buy">Year</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main-content">
                @yield('content')
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Skote.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
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
