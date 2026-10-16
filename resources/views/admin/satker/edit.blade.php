@extends('admin.layouts.main')
@section('title','Edit Satker')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Edit Satker</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('satker.index')}}">Satker</a></li>
                            <li class="breadcrumb-item active">Edit</li>
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
                        <form action="{{url('admin/satker/update/'.$satker->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Kode Satker</label>
                                <div class="col-md-10"><input type="text" class="form-control" name="kode_satker" value="{{$satker->kode_satker}}" required></div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Nama Satker</label>
                                <div class="col-md-10"><input type="text" class="form-control" name="nama_satker" value="{{$satker->nama_satker}}" required></div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Nama Pelapor</label>
                                <div class="col-md-10"><input type="text" class="form-control" name="nama_pelapor" value="{{$satker->nama_pelapor}}" required></div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Jabatan Pelapor</label>
                                <div class="col-md-10"><input type="text" class="form-control" name="jabatan_pelapor" value="{{$satker->jabatan_pelapor}}"></div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Username</label>
                                <div class="col-md-10"><input type="text" class="form-control" name="username" value="{{$satker->username}}" required></div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Email</label>
                                <div class="col-md-10"><input type="email" class="form-control" name="email" value="{{$satker->email}}" required></div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Nomor Telepon</label>
                                <div class="col-md-10"><input type="text" class="form-control" name="phone_number" value="{{$satker->phone_number}}"></div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label">Password Baru <small class="text-muted">(kosongkan jika tidak diubah)</small></label>
                                <div class="col-md-10"><input type="password" class="form-control" name="password"></div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-md-2 col-form-label"></label>
                                <div class="col-md-10">
                                    <button type="submit" class="btn btn-success">Update</button>
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
