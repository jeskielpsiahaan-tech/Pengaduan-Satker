<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Daftar Satker | Pengaduan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('assets/images/gkn.png')}}">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
</head>
<body style="background-image: url('{{asset('assets/images/bg2.jpg')}}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh;">
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Daftar Satker</h5>
                                        <p>Daftar akun Satuan Kerja</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{asset('assets/images/profile-img.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="#" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{asset('assets/images/gkn.png')}}" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
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
                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{$message}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <div class="p-2">
                                <form class="form-horizontal" action="{{route('save_satker')}}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Kode Satker</label>
                                        <input type="text" class="form-control" name="kode_satker" placeholder="Masukkan kode satker" value="{{old('kode_satker')}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Satuan Kerja</label>
                                        <input type="text" class="form-control" name="nama_satker" placeholder="Masukkan nama satuan kerja" value="{{old('nama_satker')}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Pelapor</label>
                                        <input type="text" class="form-control" name="nama_pelapor" placeholder="Masukkan nama pelapor" value="{{old('nama_pelapor')}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jabatan Pelapor <small class="text-muted">(opsional)</small></label>
                                        <input type="text" class="form-control" name="jabatan_pelapor" placeholder="Masukkan jabatan pelapor" value="{{old('jabatan_pelapor')}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Masukkan username" value="{{old('username')}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Masukkan email" value="{{old('email')}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nomor Telepon <small class="text-muted">(opsional)</small></label>
                                        <input type="text" class="form-control" name="phone_number" placeholder="Masukkan nomor telepon" value="{{old('phone_number')}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" name="password" placeholder="Masukkan password (min. 6 karakter)" aria-describedby="password-addon">
                                            <button class="btn btn-light" type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Daftar</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <p>Sudah punya akun?</p>
                                        <p><a href="{{url('user/login')}}" class="fw-medium text-primary">Masuk</a></p>
                                        <p>Daftar sebagai <a href="{{url('user/register')}}" class="fw-medium text-primary">Non-Satker</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script>
        document.getElementById('password-addon').addEventListener('click', function() {
            var pwd = document.querySelector('input[name="password"]');
            pwd.type = pwd.type === 'password' ? 'text' : 'password';
        });
    </script>
</body>
</html>
