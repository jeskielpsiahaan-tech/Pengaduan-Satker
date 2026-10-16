@extends('admin.layouts.main')
@section('title','Pengaduan | HONAI 063')
@section('css')
<link href="{{asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="page-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Detail Pengaduan</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Pengaduan</li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <br>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i>
            {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="mb-3">
            <a href="{{url('admin/complaints')}}" class="btn btn-secondary btn-sm">
                <i class="mdi mdi-arrow-left me-1"></i> Kembali
            </a>
        </div>
        <div class="row">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Detail Pengaduan
                                        @if($complaint->tipe_pengadu == 'satker')
                                            <span class="badge bg-info ms-2">Satker</span>
                                        @else
                                            <span class="badge bg-secondary ms-2">Non-Satker</span>
                                        @endif
                                    </h4>
                                        
        
                                        <div class="table-responsive">
                                            <table class="table table-striped table-nowrap mb-0">
                                                <br>
                                                <tbody>
                                                <tr>
                                                    <td>Judul</td>
                                                    <td>{{$complaint->judul ?? '-'}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Kategori</td>
                                                    <td>{{$complaint->kategori ?? '-'}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Tipe Pengadu</td>
                                                    <td>
                                                        @if($complaint->tipe_pengadu == 'satker')
                                                            <span class="badge bg-info">Satker</span>
                                                        @else
                                                            <span class="badge bg-secondary">Non-Satker</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @if($complaint->tipe_pengadu == 'satker' && $complaint->Satker)
                                                <tr>
                                                    <td>Nama Satker</td>
                                                    <td>{{$complaint->Satker->nama_satker}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Kode Satker</td>
                                                    <td>{{$complaint->nik}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Pelapor</td>
                                                    <td>{{$complaint->Satker->nama_pelapor}}</td>
                                                </tr>
                                                @if($complaint->Satker->jabatan_pelapor)
                                                <tr>
                                                    <td>Jabatan Pelapor</td>
                                                    <td>{{$complaint->Satker->jabatan_pelapor}}</td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td>Nomor Telepon</td>
                                                    <td>{{$complaint->Satker->phone_number ?? '-'}}</td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <td>Nama</td>
                                                    <td>{{$complaint->Society->name ?? '-'}}</td>
                                                </tr>
                                                <tr>
                                                    <td>NIK</td>
                                                    <td>{{$complaint->nik}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor Telepon</td>
                                                    <td>{{$complaint->Society->phone_number ?? '-'}}</td>
                                                </tr>
                                                @endif
                                                <tr>
                                                    <td>Tanggal</td>
                                                    <td>
                                                        <a href="javascript::void(0)" id="inline-username" data-type="text" data-pk="1" data-title="Enter username">{{date('d F Y ',strtotime($complaint->created_at))}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td>
                                                        @if ($complaint->status == '0')
                                                            <span class="badge rounded-pill bg-danger">Belum DiProses</span>
                                                        @elseif($complaint->status == "process")
                                                            <span class="badge rounded-pill bg-primary">Proses</span>
                                                        @else
                                                            <span class="badge rounded-pill bg-success">Selesai</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Bukti/Lampiran</td>
                                                    <td>
                                                        @if($complaint->photo)
                                                            @php
                                                                $ext = strtolower(pathinfo($complaint->photo, PATHINFO_EXTENSION));
                                                                $isImage = in_array($ext, ['jpg','jpeg','png','gif','webp','bmp']);
                                                            @endphp
                                                            @if($isImage)
                                                                <img src="{{url('avatar_complaint/'.$complaint->photo)}}" style="max-width:500px; max-height:400px;" class="img-fluid rounded">
                                                                <br>
                                                            @endif
                                                            <a href="{{url('avatar_complaint/'.$complaint->photo)}}" target="_blank" class="btn btn-sm btn-outline-primary mt-2">
                                                                <i class="mdi mdi-download me-1"></i> Unduh / Lihat Lampiran
                                                            </a>
                                                        @else
                                                            <span class="text-muted">Tidak ada lampiran</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Isi Pengaduan</td>
                                                    <td>
                                                        <a href="javascript::void(0)" id="inline-username" data-type="text" data-pk="1" data-title="Enter username">{{$complaint->contents_of_the_report}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Respon</td>
                                                    <td>
                                                        @if(empty($response->response))
                                                            <span class="text-muted fst-italic">Belum ada respon</span>
                                                        @else
                                                            {{$response->response}}
                                                            @if(!empty($response->file_balasan))
                                                            <div class="mt-2">
                                                                @php $extB = strtolower(pathinfo($response->file_balasan, PATHINFO_EXTENSION)); @endphp
                                                                @if(in_array($extB, ['jpg','jpeg','png','gif','webp','bmp']))
                                                                    <img src="{{url('balasan/'.$response->file_balasan)}}" class="img-fluid rounded" style="max-height:200px;"><br>
                                                                @endif
                                                                <a href="{{url('balasan/'.$response->file_balasan)}}" target="_blank" class="btn btn-sm btn-outline-primary mt-1">
                                                                    <i class="mdi mdi-download me-1"></i> Unduh File Balasan
                                                                </a>
                                                            </div>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <a href="{{url('admin/complaints/show',$complaint->id)}}" class="btn btn-primary btn-sm">
                                                            <i class="mdi mdi-reply me-1"></i> Berikan Balasan
                                                        </a>
                                                    </td>
                                                </tr>
                                                
            
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                    
                                    
                                    
                                    
                                </div>
                                
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
        
    </div>
</div>
@endsection
@push('script')
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>  
<script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script> 
@endpush