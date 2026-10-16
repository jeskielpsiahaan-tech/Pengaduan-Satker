@extends('admin.layouts.main')
@section('title','Berikan Balasan | HONAI 063')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Berikan Balasan</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">Pengaduan</li>
                            <li class="breadcrumb-item active">Balasan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <br>

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="mdi mdi-check-all me-2"></i> {{$message}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="mb-3">
            <a href="{{url('admin/complaints/'.$item->id)}}" class="btn btn-secondary btn-sm">
                <i class="mdi mdi-arrow-left me-1"></i> Kembali ke Detail
            </a>
        </div>

        <div class="row">
            {{-- Info Pengaduan --}}
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Info Pengaduan</h5>
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td class="text-muted" width="40%">Judul</td>
                                <td>{{ $item->judul ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Kategori</td>
                                <td>{{ $item->kategori ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Pelapor</td>
                                <td>
                                    @if($item->tipe_pengadu == 'satker')
                                        {{ $item->Satker->nama_satker ?? '-' }}
                                        <span class="badge bg-info ms-1">Satker</span>
                                    @else
                                        {{ $item->Society->name ?? '-' }}
                                        <span class="badge bg-secondary ms-1">Non-Satker</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-muted">Tanggal</td>
                                <td>{{ date('d M Y', strtotime($item->date_complaint)) }}</td>
                            </tr>
                            <tr>
                                <td class="text-muted">Status</td>
                                <td>
                                    @if($item->status == '0')
                                        <span class="badge bg-danger">Belum Diproses</span>
                                    @elseif($item->status == 'process')
                                        <span class="badge bg-primary">Proses</span>
                                    @else
                                        <span class="badge bg-success">Selesai</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-muted">Isi Pengaduan</td>
                                <td>{{ $item->contents_of_the_report }}</td>
                            </tr>
                            @if($item->photo)
                            <tr>
                                <td class="text-muted">Lampiran</td>
                                <td>
                                    @php $ext = strtolower(pathinfo($item->photo, PATHINFO_EXTENSION)); @endphp
                                    @if(in_array($ext, ['jpg','jpeg','png','gif','webp','bmp']))
                                        <img src="{{ url('avatar_complaint/'.$item->photo) }}" class="img-fluid rounded mb-1" style="max-height:150px;">
                                        <br>
                                    @endif
                                    <a href="{{ url('avatar_complaint/'.$item->photo) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                        <i class="mdi mdi-download me-1"></i> Unduh Lampiran
                                    </a>
                                </td>
                            </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>

            {{-- Form Balasan --}}
            <div class="col-xl-7">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Balasan</h5>
                        <form action="{{url('admin/complaints/save',$item->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Balasan <span class="text-danger">*</span></label>
                                <textarea class="form-control" rows="6" name="response" placeholder="Tulis balasan Anda...">{{ old('response', $response->response ?? '') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">File Balasan <small class="text-muted">(opsional, maks. 10MB)</small></label>
                                <input type="file" class="form-control" name="file_balasan">
                                @if(!empty($response->file_balasan))
                                <div class="mt-2">
                                    <small class="text-muted">File saat ini: </small>
                                    @php $extB = strtolower(pathinfo($response->file_balasan, PATHINFO_EXTENSION)); @endphp
                                    @if(in_array($extB, ['jpg','jpeg','png','gif','webp','bmp']))
                                        <img src="{{ url('balasan/'.$response->file_balasan) }}" class="img-fluid rounded mt-1" style="max-height:120px;"><br>
                                    @endif
                                    <a href="{{ url('balasan/'.$response->file_balasan) }}" target="_blank" class="btn btn-sm btn-outline-info mt-1">
                                        <i class="mdi mdi-download me-1"></i> Lihat File Balasan
                                    </a>
                                </div>
                                @endif
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Update Status <span class="text-danger">*</span></label>
                                <select class="form-select" name="status">
                                    <option value="0" @if($item->status == '0') selected @endif>Belum Diproses</option>
                                    <option value="process" @if($item->status == 'process') selected @endif>Proses</option>
                                    <option value="finished" @if($item->status == 'finished') selected @endif>Selesai</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light">
                                <i class="mdi mdi-send me-1"></i> Kirim Balasan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
