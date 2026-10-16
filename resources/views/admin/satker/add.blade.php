@extends('admin.layouts.main')
@section('title','Tambah Satker')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Tambah Satker</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('satker.index')}}">Satker</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('satker.store')}}" method="POST">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Kode Satker</label>
                                <div class="col-md-10"><input type="text" class="form-control" name="kode_satker" required></div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Nama Satker</label>
                                <div class="col-md-10"><input type="text" class="form-control" name="nama_satker" required></div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Nama Pelapor</label>
                                <div class="col-md-10"><input type="text" class="form-control" name="nama_pelapor" required></div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Jabatan Pelapor</label>
                                <div class="col-md-10"><input type="text" class="form-control" name="jabatan_pelapor"></div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Username</label>
                                <div class="col-md-10"><input type="text" class="form-control" name="username" required></div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Email</label>
                                <div class="col-md-10"><input type="email" class="form-control" name="email" required></div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Nomor Telepon</label>
                                <div class="col-md-10"><input type="text" class="form-control" name="phone_number"></div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Password</label>
                                <div class="col-md-10"><input type="password" class="form-control" name="password" required></div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label"></label>
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <a href="{{route('satker.index')}}" class="btn btn-secondary">Batal</a>
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
