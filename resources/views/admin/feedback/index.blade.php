@extends('admin.layouts.main')
@section('title','Masukan & Kritik')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Masukan & Kritik</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Masukan & Kritik</li>
                    </ol>
                </div>
            </div>
        </div>

        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jenis</th>
                                        <th>Isi</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($feedbacks as $item)
                                    <tr class="{{ $item->status == 'belum_dibaca' ? 'table-warning' : '' }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->email ?? '-' }}</td>
                                        <td>
                                            @if($item->jenis == 'masukan')
                                                <span class="badge bg-info">Masukan</span>
                                            @else
                                                <span class="badge bg-danger">Kritik</span>
                                            @endif
                                        </td>
                                        <td style="max-width:300px;">{{ $item->isi }}</td>
                                        <td>{{ date('d M Y H:i', strtotime($item->created_at)) }}</td>
                                        <td>
                                            @if($item->status == 'belum_dibaca')
                                                <span class="badge bg-warning text-dark">Belum Dibaca</span>
                                            @else
                                                <span class="badge bg-success">Sudah Dibaca</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->status == 'belum_dibaca')
                                            <form action="{{ route('admin.feedback.read', $item->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button class="btn btn-sm btn-success" title="Tandai Dibaca">
                                                    <i class="mdi mdi-check"></i>
                                                </button>
                                            </form>
                                            @endif
                                            <form action="{{ route('admin.feedback.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus feedback ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted">Belum ada masukan atau kritik.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
