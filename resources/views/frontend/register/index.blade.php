<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Register | HONAI 063</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('assets/images/gkn.png')}}">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <style>
        .register-tab-btn {
            flex: 1;
            padding: 12px;
            border: none;
            background: #e9ecef;
            color: #6c757d;
            font-weight: 600;
            font-size: 15px;
            cursor: pointer;
            transition: all 0.2s;
        }
        .register-tab-btn:first-child { border-radius: 8px 0 0 8px; }
        .register-tab-btn:last-child  { border-radius: 0 8px 8px 0; }
        .register-tab-btn.active {
            background: #556ee6;
            color: #fff;
        }
        .register-tab-btn:hover:not(.active) {
            background: #d0d4da;
        }
    </style>
</head>
<body style="background-image: url('{{asset('assets/images/bg2.jpg')}}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh;">

    <div style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
        <a href="{{url('/')}}" class="btn btn-light btn-sm shadow">
            <i class="mdi mdi-arrow-left me-1"></i> Kembali ke Website
        </a>
    </div>

    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary" id="card-title">Daftar Non-Satker</h5>
                                        <p id="card-subtitle">Buat akun untuk mengakses HONAI 063</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="{{asset('assets/images/profile-img.png')}}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo profile-user-wid mb-2 text-center">
                                <img src="{{asset('assets/images/gkn.png')}}" alt="GKN" height="50">
                            </div>

                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                            @endif
                            @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{$message}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                            @endif
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{$message}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                            @endif

                            <div class="p-2">
                                {{-- Tab Toggle --}}
                                <div class="d-flex mb-4">
                                    <button type="button" class="register-tab-btn active" id="btn-nonsatker" onclick="switchTab('nonsatker')">
                                        <i class="mdi mdi-account me-1"></i> Non-Satker
                                    </button>
                                    <button type="button" class="register-tab-btn" id="btn-satker" onclick="switchTab('satker')">
                                        <i class="mdi mdi-office-building me-1"></i> Satker
                                    </button>
                                </div>

                                {{-- Form Non-Satker --}}
                                <form id="form-nonsatker" action="{{url('user/register/save')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">NIK</label>
                                        <input type="number" class="form-control" name="nik" placeholder="Masukkan NIK" value="{{old('nik')}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" name="name" placeholder="Masukkan nama lengkap" value="{{old('name')}}">
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
                                        <label class="form-label">Nomor Telepon</label>
                                        <input type="number" class="form-control" name="phone_number" placeholder="Masukkan nomor telepon" value="{{old('phone_number')}}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea class="form-control" name="address" rows="2" placeholder="Masukkan alamat">{{old('address')}}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Foto</label>
                                        <input type="file" class="form-control" name="photo">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" name="password" placeholder="Masukkan password" aria-describedby="pwd-addon-1">
                                            <button class="btn btn-light" type="button" id="pwd-addon-1"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Daftar</button>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <p class="mb-0">Sudah punya akun? <a href="{{url('user/login')}}" class="fw-medium text-primary">Masuk</a></p>
                                    </div>
                                </form>

                                {{-- Form Satker --}}
                                <form id="form-satker" action="{{route('save_satker')}}" method="POST" style="display:none;">
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
                                            <input type="password" class="form-control" name="password" placeholder="Masukkan password (min. 6 karakter)" aria-describedby="pwd-addon-2">
                                            <button class="btn btn-light" type="button" id="pwd-addon-2"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-success waves-effect waves-light" type="submit">Daftar</button>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <p class="mb-0">Sudah punya akun? <a href="{{url('user/login')}}" class="fw-medium text-primary">Masuk</a></p>
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
        function switchTab(type) {
            const isNonSatker = type === 'nonsatker';

            document.getElementById('btn-nonsatker').classList.toggle('active', isNonSatker);
            document.getElementById('btn-satker').classList.toggle('active', !isNonSatker);

            document.getElementById('form-nonsatker').style.display = isNonSatker ? 'block' : 'none';
            document.getElementById('form-satker').style.display   = isNonSatker ? 'none'  : 'block';

            document.getElementById('card-title').textContent    = isNonSatker ? 'Daftar Non-Satker' : 'Daftar Satker';
            document.getElementById('card-subtitle').textContent = isNonSatker ? 'Buat akun untuk mengakses HONAI 063' : 'Daftar sebagai Satuan Kerja di HONAI 063';
        }

        // Toggle show/hide password
        document.getElementById('pwd-addon-1').addEventListener('click', function() {
            const pwd = this.previousElementSibling;
            pwd.type = pwd.type === 'password' ? 'text' : 'password';
        });
        document.getElementById('pwd-addon-2').addEventListener('click', function() {
            const pwd = this.previousElementSibling;
            pwd.type = pwd.type === 'password' ? 'text' : 'password';
        });

        // Auto-hide alerts
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); });
        }, 3000);

        // Jika ada error dari satker, tampilkan tab satker
        @if(old('kode_satker') || old('nama_satker') || request('tab') === 'satker')
            switchTab('satker');
        @endif
    </script>
</body>
</html>
