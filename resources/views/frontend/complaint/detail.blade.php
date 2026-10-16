@extends('frontend.layouts.main')
@section('title','Detail Pengaduan')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18" style="color:#fff;">Detail Pengaduan</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active" style="color:#fff;">Detail Pengaduan</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    Contoh
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
        <br>
        <div class="row">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Detail Pengaduan</h4>
                                        
        
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
                                                        <a href="javascript::void(0)" id="inline-username" data-type="text" data-pk="1" data-title="Enter username">{{date('d F Y H:i:s',strtotime($complaint->created_at))}}</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td>
                                                        @if ($complaint->status == '0')
                                                            <span class="badge rounded-pill bg-danger">Belum Diproses</span>
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
                                                        @if(empty($complaint->Response->response))
                                                            <span class="text-muted fst-italic">Belum ada respon</span>
                                                        @else
                                                            {{$complaint->Response->response}}
                                                            @if(!empty($complaint->Response->file_balasan))
                                                            <div class="mt-2">
                                                                @php $extB = strtolower(pathinfo($complaint->Response->file_balasan, PATHINFO_EXTENSION)); @endphp
                                                                @if(in_array($extB, ['jpg','jpeg','png','gif','webp','bmp']))
                                                                    <img src="{{url('balasan/'.$complaint->Response->file_balasan)}}" class="img-fluid rounded" style="max-height:200px;"><br>
                                                                @endif
                                                                <a href="{{url('balasan/'.$complaint->Response->file_balasan)}}" target="_blank" class="btn btn-sm btn-outline-primary mt-1">
                                                                    <i class="mdi mdi-download me-1"></i> Unduh File Balasan
                                                                </a>
                                                            </div>
                                                            @endif
                                                        @endif
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
    </div> <!-- container-fluid -->
</div>
@endsection