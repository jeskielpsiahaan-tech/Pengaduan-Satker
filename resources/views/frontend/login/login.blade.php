<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login | HONAI 063</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" />
    <meta name="author" />
    <link rel="shortcut icon" href="{{asset('assets/images/gkn.png')}}">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    <style>
        .language-switcher {
            position: relative;
            display: inline-block;
        }
        .language-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .language-btn i {
            font-size: 16px;
        }
        .language-options {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 120px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 4px;
            overflow: hidden;
            right: 0;
        }
        .language-option {
            color: black;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .language-option:hover {
            background-color: #f1f1f1;
        }
        .language-switcher:hover .language-options {
            display: block;
        }
        .language-container {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
</head>
<body style="background-image: url('{{asset('assets/images/bg2.jpg')}}'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh;">

    <div style="position: fixed; top: 20px; right: 20px; z-index: 9999;">
        <a href="{{url('/')}}" class="btn btn-light btn-sm shadow">
            <i class="mdi mdi-arrow-left me-1"></i> Kembali ke Website
        </a>
    </div>
    <!-- Language Switcher -->
    <div class="language-container">
        <div class="language-switcher">
            <button class="language-btn" id="currentLanguage">
                <i class="mdi mdi-earth"></i> ID
            </button>
            <div class="language-options">
                <div class="language-option" data-lang="id">Indonesia (ID)</div>
                <div class="language-option" data-lang="en">English (EN)</div>
            </div>
        </div>
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
                                        <h5 class="text-primary" data-translate="login.title">Login !</h5>
                                        <p data-translate="login.subtitle">Login ke Aplikasi Pengaduan Satuan Kerja &amp; Non-Satker.</p>
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
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{$message}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <div class="p-2">
                                <form class="form-horizontal" action="{{url('user/login/cek')}}" method="POST">
                                    @csrf
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Tipe Akun</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tipe_pengadu" id="tipe_nonsatker" value="masyarakat" checked>
                                                <label class="form-check-label" for="tipe_nonsatker">Non-Satker</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="tipe_pengadu" id="tipe_satker" value="satker">
                                                <label class="form-check-label" for="tipe_satker">Satuan Kerja</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="username" id="username" data-translate-placeholder="login.username_placeholder" placeholder="Enter Username">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="password" data-translate="login.password">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" name="password" id="password" data-translate-placeholder="login.password_placeholder" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon" autocomplete="current-password">
                                            <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit" data-translate="login.button">Login</button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        <p>Belum punya akun? <a href="#" id="register-link" class="fw-medium text-primary">Register</a></p>
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
    <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    
    <!-- Translation Script -->
    <script>
        // Data terjemahan
        const translations = {
            id: {
                // Login page
                "login.title": "Masuk !",
                "login.subtitle": "Masuk untuk melanjutkan ke HONAI 063 - Himpunan Opini Non-satker & Aduan Instansi.",
                "login.username": "Username",
                "login.username_placeholder": "Masukkan Username",
                "login.password": "Password",
                "login.password_placeholder": "Masukkan password",
                "login.button": "Masuk",
                "login.no_account": "Tidak punya akun ?",
                "login.signup_link": "Daftar sekarang",
                
                // Footer
                "footer.crafted": "Dibuat dengan",
                "footer.by": "oleh Ahmad Efendi",
            },
            en: {
                // Login page (default)
                "login.title": "Login !",
                "login.subtitle": "Login to continue to HONAI 063 - Non-satker Opinion & Institution Complaint Hub.",
                "login.username": "Username",
                "login.username_placeholder": "Enter Username",
                "login.password": "Password",
                "login.password_placeholder": "Enter password",
                "login.button": "Login",
                "login.no_account": "Don't have an account ?",
                "login.signup_link": "Signup now",
                
                // Footer
                "footer.crafted": "Crafted with",
                "footer.by": "by Ahmad Efendi",
            }
        };

        // Fungsi untuk mengubah bahasa
        function changeLanguage(lang) {
            // Simpan preferensi bahasa di localStorage
            localStorage.setItem('preferredLanguage', lang);
            
            // Perbarui tombol bahasa
            document.getElementById('currentLanguage').innerHTML = `<i class="mdi mdi-earth"></i> ${lang.toUpperCase()}`;
            
            // Terapkan terjemahan ke semua elemen dengan atribut data-translate
            document.querySelectorAll('[data-translate]').forEach(element => {
                const key = element.getAttribute('data-translate');
                if (translations[lang][key]) {
                    element.innerHTML = translations[lang][key];
                }
            });
            
            // Terapkan terjemahan untuk placeholder
            document.querySelectorAll('[data-translate-placeholder]').forEach(element => {
                const key = element.getAttribute('data-translate-placeholder');
                if (translations[lang][key]) {
                    element.placeholder = translations[lang][key];
                }
            });
        }

        // Event listener untuk tombol bahasa
        document.addEventListener('DOMContentLoaded', function() {
            // Cek preferensi bahasa yang disimpan
            const savedLanguage = localStorage.getItem('preferredLanguage') || 'id';
            
            // Terapkan bahasa yang dipilih
            changeLanguage(savedLanguage);
            
            // Tambahkan event listener untuk opsi bahasa
            document.querySelectorAll('.language-option').forEach(option => {
                option.addEventListener('click', function() {
                    const lang = this.getAttribute('data-lang');
                    changeLanguage(lang);
                });
            });
            
            // Redirect register link based on selected account type
        document.getElementById('register-link').addEventListener('click', function(e) {
            e.preventDefault();
            const isSatker = document.getElementById('tipe_satker').checked;
            window.location.href = isSatker ? '{{url('user/register/satker')}}' : '{{url('user/register')}}';
        });

        // Auto-hide alerts
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove();
                });
            }, 2000);
        });    
    </script>
</body>
</html>