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
                    <h4 class="mb-sm-0 font-size-18">Pengaduan</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Pengaduan</li>
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
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        {{-- Filter Tanggal --}}
                        <form method="GET" action="{{route('complaints.index')}}" class="mb-4">
                            <div class="row align-items-end g-2">
                                <div class="col-md-4">
                                    <label class="form-label mb-1">Dari Tanggal</label>
                                    <input type="date" name="dari" class="form-control" value="{{$dari ?? ''}}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label mb-1">Sampai Tanggal</label>
                                    <input type="date" name="sampai" class="form-control" value="{{$sampai ?? ''}}">
                                </div>
                                <div class="col-md-4 d-flex gap-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        <i class="bx bx-filter-alt"></i> Filter
                                    </button>
                                    <a href="{{route('complaints.index')}}" class="btn btn-secondary waves-effect">
                                        <i class="bx bx-reset"></i> Reset
                                    </a>
                                </div>
                            </div>
                        </form>

                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tipe</th>
                                <th>Nama</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>


                            <tbody>
                                @foreach ($complaints as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        @if($row->tipe_pengadu == 'satker')
                                            <span class="badge bg-info">Satker</span>
                                        @else
                                            <span class="badge bg-secondary">Non-Satker</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($row->tipe_pengadu == 'satker')
                                            <strong>{{$row->Satker->nama_satker ?? '-'}}</strong>
                                            <br><small class="text-muted">{{$row->Satker->nama_pelapor ?? ''}}</small>
                                        @else
                                            {{$row->Society->name ?? '-'}}
                                            <br><small class="text-muted">NIK: {{$row->nik}}</small>
                                        @endif
                                    </td>
                                    <td>{{$row->judul ?? '-'}}</td>
                                    <td>{{$row->kategori ?? '-'}}</td>
                                    <td>{{date('d M Y',strtotime($row->created_at))}}</td>
                                    @if ($row->status == "0")
                                        <td><span class="badge rounded-pill bg-danger">Belum Diproses</span></td>
                                    @elseif($row->status == 'process')
                                        <td><span class="badge rounded-pill bg-primary">Proses</span></td>
                                    @else 
                                        <td><span class="badge rounded-pill bg-success">Selesai</span></td>
                                    @endif
                                    <td>
                                        <a href="{{url('admin/complaints/'.$row->id)}}" class="btn btn-info btn-sm waves-effect waves-light" title="Detail">
                                            <i class="bx bx-show font-size-16 align-middle"></i>
                                        </a>
                                        <form action="{{url('admin/complaints/'.$row->id)}}" method="POST" style="display:inline" class="form-delete">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm waves-effect waves-light" title="Hapus">
                                                <i class="bx bx-trash-alt font-size-16 align-middle"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
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
<script>
    $(document).on('submit', '.form-delete', function(e) {
        e.preventDefault();
        var form = this;
        Swal.fire({
            title: 'Yakin hapus?',
            text: "Data tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            confirmButtonClass: 'btn btn-success mt-2',
            cancelButtonClass: 'btn btn-danger ms-2 mt-2',
            buttonsStyling: false
        }).then((result) => {
            if (result.isConfirmed) form.submit();
        });
    });
</script>
@endpush