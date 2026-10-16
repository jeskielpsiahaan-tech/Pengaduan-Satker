@extends('frontend.layouts.main')
@section('title','Complaint')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18" style="color:#fff;">Dashboards</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active" style="color:#fff;">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4">
                <div class="card overflow-hidden">
                    <div class="bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary">Selamat Datang !</h5>
                                    <p>Pelayanan Pengaduan Online</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{asset('assets/images/profile-img.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="avatar-md profile-user-wid mb-4">
                                    @if(Session::get('tipe_pengadu') == 'satker')
                                        <img src="{{asset('assets/images/profile-img.png')}}" alt="" class="img-thumbnail rounded-circle">
                                    @else
                                        <img src="{{url('avatar_society/',Session::get('photo') ?? 'default.png')}}" alt="" class="img-thumbnail rounded-circle">
                                    @endif
                                </div>
                                <h5 class="font-size-15 text-truncate">{{Session::get('name')}}</h5>
                                <p class="text-muted mb-0 text-truncate">
                                    @if(Session::get('tipe_pengadu') == 'satker') Satker @else Non-Satker @endif
                                </p>
                            </div>

                            <div class="col-sm-8">
                                <div class="pt-4">

                                    <div class="row">
                                        <div class="col-6">
                                            
                                        </div>
                                        <div class="col-6">
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-8">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mini-stats-wid">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <p class="text-muted fw-medium mb-1">Pengaduan</p>
                                        <h4 class="mb-0">{{$count_complaint}}</h4>
                                    </div>
                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary ms-3">
                                        <span class="avatar-title">
                                            <i class="bx bx-copy-alt font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a href="{{route('feedback.create')}}" style="text-decoration:none;">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <p class="text-muted fw-medium mb-1">Masukan & Kritik</p>
                                            <h4 class="mb-0">Kirim</h4>
                                        </div>
                                        <div class="mini-stat-icon avatar-sm rounded-circle bg-warning ms-3">
                                            <span class="avatar-title">
                                                <i class="bx bx-message-edit font-size-24"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- end row -->


            </div>
        </div>
        <!-- end row -->

        
    </div> <!-- container-fluid -->
</div>
@endsection