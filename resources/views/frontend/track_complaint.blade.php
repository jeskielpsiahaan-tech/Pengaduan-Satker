<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Lacak Pengaduan - HONAI 063</title>
  <link rel="shortcut icon" href="{{asset('assets/images/gkn.png')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
  <style>
    .tipe-btn { cursor: pointer; border: 2px solid #dee2e6; border-radius: 8px; padding: 15px; text-align: center; transition: all 0.2s; }
    .tipe-btn:hover, .tipe-btn.active { border-color: #106eea; background: #e8f0fe; }
    .tipe-btn i { font-size: 28px; display: block; margin-bottom: 6px; color: #106eea; }
    #search { padding: 60px 0; background: #f6f9fe; }
  </style>
</head>
<body>

  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:kppn.jayapura@gmail.com"> kppn.jayapura@gmail.com</a>
        <i class="icofont-phone"></i> 082191586141
      </div>
      <div class="social-links">
        <a href="https://x.com/kppnjayapura" class="twitter" target="_blank" rel="noopener"><i class="icofont-twitter"></i></a>
        <a href="https://www.facebook.com/KppnJayapura063" class="facebook" target="_blank" rel="noopener"><i class="icofont-facebook"></i></a>
        <a href="https://www.instagram.com/kppnjayapura" class="instagram" target="_blank" rel="noopener"><i class="icofont-instagram"></i></a>
      </div>
    </div>
  </div>

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a href="{{url('/')}}" class="logo mr-auto"><img src="{{asset('assets/logo1.png')}}" alt="GKN" style="max-height: 90px;"></a>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="{{url('/')}}">Beranda</a></li>
          <li><a href="{{url('/')}}#procedures">Prosedur</a></li>
          <li class="active"><a href="{{url('track-complaint')}}">Lacak Pengaduan</a></li>
          @if(Session::get('nik') == NULL)
          <li><a href="{{url('user/login')}}">Masuk</a></li>
          <li><a href="{{url('user/register')}}">Daftar</a></li>
          @endif
        </ul>
      </nav>
    </div>
  </header>

  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1 style="color: #fff;">Lacak Status Pengaduan</h1>
      <h2>Masukkan identitas Anda untuk melihat progres pengaduan</h2>
    </div>
  </section>

  <main id="main">
    <section id="search">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7">
            <div class="card shadow">
              <div class="card-body p-4 p-md-5">
                <h3 class="text-center mb-4">Cari Pengaduan</h3>

                @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="row mb-4">
                  <div class="col-6">
                    <div class="tipe-btn active" id="btn-nonsatker" onclick="setTipe('nonsatker')">
                      <i class="icofont-user"></i>
                      <strong>Non-Satker</strong>
                      <small class="d-block text-muted">Cari dengan NIK</small>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="tipe-btn" id="btn-satker" onclick="setTipe('satker')">
                      <i class="icofont-building"></i>
                      <strong>Satuan Kerja</strong>
                      <small class="d-block text-muted">Cari dengan Kode Satker</small>
                    </div>
                  </div>
                </div>

                <form action="{{url('search-complaint')}}" method="POST">
                  @csrf
                  <input type="hidden" name="tipe" id="input-tipe" value="nonsatker">

                  <div id="field-nonsatker">
                    <div class="form-group mb-3">
                      <label for="nik">Nomor Induk Kependudukan (NIK)</label>
                      <input type="text" class="form-control @error('nik') is-invalid @enderror"
                        id="nik" name="nik" placeholder="Masukkan NIK Anda" value="{{ old('nik') }}">
                      @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>

                  <div id="field-satker" style="display:none;">
                    <div class="form-group mb-3">
                      <label for="kode_satker">Kode Satuan Kerja</label>
                      <input type="text" class="form-control @error('kode_satker') is-invalid @enderror"
                        id="kode_satker" name="kode_satker" placeholder="Masukkan Kode Satker" value="{{ old('kode_satker') }}">
                      @error('kode_satker')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                  </div>

                  <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary btn-lg px-5">
                      <i class="icofont-search-1"></i> Cari Pengaduan
                    </button>
                  </div>
                </form>

                <div class="mt-4">
                  <div class="alert alert-info mb-0">
                    <i class="icofont-info-circle"></i>
                    <strong>Informasi:</strong>
                    Non-Satker menggunakan NIK, Satuan Kerja menggunakan Kode Satker yang didaftarkan.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer id="footer">
    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Kantor Pelayanan Perbendaharaan Negara</span></strong>. All Rights Reserved
      </div>
      <div class="credits">Designed by <a href="#">Jeskhiel Siahaan</a></div>
    </div>
  </footer>

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <script src="{{asset('frontend/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('frontend/assets/js/main.js')}}"></script>
  <script>
    function setTipe(tipe) {
      document.getElementById('input-tipe').value = tipe;
      document.getElementById('field-nonsatker').style.display = tipe === 'nonsatker' ? '' : 'none';
      document.getElementById('field-satker').style.display   = tipe === 'satker'    ? '' : 'none';
      document.getElementById('btn-nonsatker').classList.toggle('active', tipe === 'nonsatker');
      document.getElementById('btn-satker').classList.toggle('active', tipe === 'satker');
      if (tipe === 'nonsatker') document.getElementById('kode_satker').value = '';
      else document.getElementById('nik').value = '';
    }
    @if(old('tipe') === 'satker')
      setTipe('satker');
    @endif
  </script>
</body>
</html>
