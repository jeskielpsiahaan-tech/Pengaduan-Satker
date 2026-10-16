@extends('frontend.layouts.main')
@section('title','Masukan & Kritik')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18" style="color:#fff;">Masukan & Kritik</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active" style="color:#fff;">Masukan & Kritik</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-8">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif
                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Sampaikan Masukan atau Kritik Anda</h5>
                        <form action="{{ route('feedback.store') }}" method="POST">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-md-3 col-form-label">Nama <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <input type="text" name="nama" class="form-control" value="{{ old('nama', Session::get('name')) }}" placeholder="Nama Anda">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-3 col-form-label">Email <small class="text-muted">(opsional)</small></label>
                                <div class="col-md-9">
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="email@contoh.com">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-3 col-form-label">Jenis <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <select name="jenis" class="form-control">
                                        <option value="">-- Pilih Jenis --</option>
                                        <option value="masukan" {{ old('jenis')=='masukan' ? 'selected' : '' }}>Masukan</option>
                                        <option value="kritik" {{ old('jenis')=='kritik' ? 'selected' : '' }}>Kritik</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-3 col-form-label">Isi <span class="text-danger">*</span></label>
                                <div class="col-md-9">
                                    <textarea name="isi" class="form-control" rows="6" placeholder="Tuliskan masukan atau kritik Anda...">{{ old('isi') }}</textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-9 offset-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="mdi mdi-send me-1"></i> Kirim
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
