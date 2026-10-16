@extends('frontend.layouts.main')
@section('title','Buat Pengaduan')
@section('content')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18" style="color:#fff;">Buat Pengaduan</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active" style="color:#fff;">Buat Pengaduan</li>
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
                    {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
        </div>
        <br>
        <div class="row">
            <form action="{{url('user/complaint/save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label for="judul" class="col-md-2 col-form-label">Judul Pengaduan</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul pengaduan" value="{{old('judul')}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="kategori" class="col-md-2 col-form-label">Kategori</label>
                                        <div class="col-md-10">
                                            <select class="form-control" name="kategori" id="kategori" onchange="toggleKategoriLain(this)">
                                                <option value="">-- Pilih Kategori --</option>
                                                <option value="Asusila" {{old('kategori')=='Asusila'?'selected':''}}>Asusila</option>
                                                <option value="Pungli" {{old('kategori')=='Pungli'?'selected':''}}>Pungli</option>
                                                <option value="Judi Online (Judol)" {{old('kategori')=='Judi Online (Judol)'?'selected':''}}>Judi Online (Judol)</option>
                                                <option value="Penipuan" {{old('kategori')=='Penipuan'?'selected':''}}>Penipuan</option>
                                                <option value="Narkoba" {{old('kategori')=='Narkoba'?'selected':''}}>Narkoba</option>
                                                <option value="Kekerasan" {{old('kategori')=='Kekerasan'?'selected':''}}>Kekerasan</option>
                                                <option value="Korupsi" {{old('kategori')=='Korupsi'?'selected':''}}>Korupsi</option>
                                                <option value="Infrastruktur" {{old('kategori')=='Infrastruktur'?'selected':''}}>Infrastruktur</option>
                                                <option value="Pelayanan Publik" {{old('kategori')=='Pelayanan Publik'?'selected':''}}>Pelayanan Publik</option>
                                                <option value="Lainnya" {{old('kategori')=='Lainnya'?'selected':''}}>Lainnya (isi sendiri)</option>
                                            </select>
                                            <input type="text" class="form-control mt-2" name="kategori_lain" id="kategori_lain"
                                                placeholder="Tuliskan kategori pengaduan Anda..."
                                                style="display:{{old('kategori')=='Lainnya'?'block':'none'}}"
                                                value="{{old('kategori_lain')}}">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="contents_of_the_report" class="col-md-2 col-form-label">Isi Pengaduan</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" rows="8" name="contents_of_the_report" id="contents_of_the_report" placeholder="Jelaskan pengaduan Anda secara detail...">{{old('contents_of_the_report')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="photo" class="col-md-2 col-form-label">Bukti/Lampiran <small class="text-muted">(opsional)</small></label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="file" id="photo" name="photo">
                                            <small class="text-muted">Format: PDF, Word, Excel, gambar, dll. Maks. 10MB</small>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label"></label>
                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-success">Kirim Pengaduan</button>
                                        </div>
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
<script>
    function toggleKategoriLain(sel) {
        const input = document.getElementById('kategori_lain');
        input.style.display = sel.value === 'Lainnya' ? 'block' : 'none';
        if (sel.value !== 'Lainnya') input.value = '';
    }
</script>
@endpush
