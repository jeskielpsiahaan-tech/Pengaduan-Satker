<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Hasil Pencarian - HONAI 063</title>
  <link rel="shortcut icon" href="{{asset('assets/images/gkn.png')}}">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
  <style>
    .search-section { padding: 60px 0; background: #f6f9fe; }
    .status-badge { padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: bold; }
    .status-unprocess { background-color: #ffc107; color: #000; }
    .status-process { background-color: #17a2b8; color: #fff; }
    .status-finished { background-color: #28a745; color: #fff; }
    .complaint-card { transition: transform 0.3s; }
    .complaint-card:hover { transform: translateY(-4px); box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
    .user-avatar { width: 44px; height: 44px; border-radius: 50%; object-fit: cover; margin-right: 12px; }
    .avatar-placeholder { width: 44px; height: 44px; border-radius: 50%; background: #6c757d; color: #fff; display: flex; align-items: center; justify-content: center; margin-right: 12px; flex-shrink: 0; }
    .flex-grow-1 { flex-grow: 1; }
    .badge-tipe { font-size: 11px; padding: 3px 8px; border-radius: 10px; }
    .badge-nonsatker { background: #e3f2fd; color: #1565c0; }
    .badge-satker { background: #e8f5e9; color: #2e7d32; }
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
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
      </div>
    </div>
  </div>

  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <a href="{{url('/')}}" class="logo mr-auto"><img src="{{asset('assets/logo1.png')}}" alt="GKN" style="max-height: 70px;"></a>
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
      <h1>Hasil Pencarian Pengaduan</h1>
      <h2>
        @if($tipe === 'satker')
          Satuan Kerja — Kode: <strong>{{ $search_key }}</strong>
        @else
          Non-Satker — NIK: <strong>{{ $search_key }}</strong>
        @endif
      </h2>
    </div>
  </section>

  <main id="main">
    <section class="search-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="card shadow">
              <div class="card-body p-4 p-md-5">

                <div class="d-flex justify-content-between align-items-center mb-4">
                  <h4 class="mb-0">
                    @if($tipe === 'satker')
                      <i class="icofont-building text-success"></i> Pengaduan Satuan Kerja
                    @else
                      <i class="icofont-user text-primary"></i> Pengaduan Non-Satker
                    @endif
                  </h4>
                  <a href="{{url('track-complaint')}}" class="btn btn-outline-primary btn-sm">
                    <i class="icofont-refresh"></i> Cari Lagi
                  </a>
                </div>

                @if(count($complaints) > 0)
                  <div class="alert alert-success">
                    Ditemukan <strong>{{ count($complaints) }}</strong> pengaduan.
                  </div>

                  @foreach($complaints as $complaint)
                  <div class="card complaint-card mb-4 border-0 shadow-sm">
                    <div class="card-body">

                      <div class="d-flex align-items-center mb-3">
                        @if($complaint->tipe_pengadu === 'satker' && $complaint->Satker)
                          <div class="avatar-placeholder"><i class="icofont-building"></i></div>
                          <div class="flex-grow-1">
                            <div class="font-weight-bold">{{ $complaint->Satker->nama_satker }}</div>
                            <small class="text-muted">
                              Kode: {{ $complaint->Satker->kode_satker }}
                              @if($complaint->Satker->nama_pelapor)
                                &nbsp;|&nbsp; Pelapor: {{ $complaint->Satker->nama_pelapor }}
                                @if($complaint->Satker->jabatan_pelapor)
                                  ({{ $complaint->Satker->jabatan_pelapor }})
                                @endif
                              @endif
                            </small>
                          </div>
                          <span class="badge-tipe badge-satker ml-2">Satuan Kerja</span>
                        @elseif($complaint->Society)
                          @if($complaint->Society->photo)
                            <img src="{{ url('avatar_society/'.$complaint->Society->photo) }}" class="user-avatar" alt="Foto">
                          @else
                            <div class="avatar-placeholder"><i class="icofont-user"></i></div>
                          @endif
                          <div class="flex-grow-1">
                            <div class="font-weight-bold">{{ $complaint->Society->name }}</div>
                            <small class="text-muted">NIK: {{ $complaint->nik }}</small>
                          </div>
                          <span class="badge-tipe badge-nonsatker ml-2">Non-Satker</span>
                        @else
                          <div class="avatar-placeholder"><i class="icofont-user"></i></div>
                          <div class="flex-grow-1">
                            <div class="font-weight-bold text-muted">Data pengadu tidak ditemukan</div>
                            <small class="text-muted">NIK/Kode: {{ $complaint->nik }}</small>
                          </div>
                        @endif

                        <span class="status-badge ml-3
                          @if($complaint->status == '0') status-unprocess
                          @elseif($complaint->status == 'process') status-process
                          @else status-finished @endif">
                          @if($complaint->status == '0') Menunggu
                          @elseif($complaint->status == 'process') Diproses
                          @else Selesai @endif
                        </span>
                      </div>

                      <div class="row">
                        @if($complaint->photo)
                        <div class="col-md-3 mb-3 mb-md-0">
                          @php $ext = strtolower(pathinfo($complaint->photo, PATHINFO_EXTENSION)); @endphp
                          @if(in_array($ext, ['jpg','jpeg','png','gif','webp','bmp']))
                            <img src="{{ url('avatar_complaint/'.$complaint->photo) }}" class="img-fluid rounded" alt="Bukti">
                          @endif
                        </div>
                        @endif
                        <div class="{{ $complaint->photo ? 'col-md-9' : 'col-12' }}">
                          @if($complaint->judul)
                          <p class="mb-1"><strong>Judul:</strong> {{ $complaint->judul }}</p>
                          @endif
                          @if($complaint->kategori)
                          <p class="mb-1"><strong>Kategori:</strong> {{ $complaint->kategori }}</p>
                          @endif
                          <p class="text-muted mb-2">
                            <i class="icofont-calendar"></i> Diajukan: {{ date('d F Y', strtotime($complaint->date_complaint)) }}
                          </p>
                          <p class="mb-2"><strong>Isi Pengaduan:</strong><br>{{ $complaint->contents_of_the_report }}</p>

                          <div class="mt-2">
                            <strong>Tanggapan:</strong>
                            <div class="mt-1 alert {{ ($complaint->Response && $complaint->Response->response) ? 'alert-info' : 'alert-warning' }} mb-0 py-2">
                              @if($complaint->Response && $complaint->Response->response)
                                {{ $complaint->Response->response }}
                                <br><small class="text-muted">Ditanggapi: {{ date('d F Y H:i', strtotime($complaint->Response->updated_at)) }}</small>
                                @if(!empty($complaint->Response->file_balasan))
                                <div class="mt-2">
                                  @php $extB = strtolower(pathinfo($complaint->Response->file_balasan, PATHINFO_EXTENSION)); @endphp
                                  @if(in_array($extB, ['jpg','jpeg','png','gif','webp','bmp']))
                                    <img src="{{ url('balasan/'.$complaint->Response->file_balasan) }}" class="img-fluid rounded mb-1" style="max-height:150px;"><br>
                                  @endif
                                  <a href="{{ url('balasan/'.$complaint->Response->file_balasan) }}" target="_blank" class="btn btn-sm btn-outline-primary mt-1">
                                    <i class="icofont-download"></i> Unduh File Balasan
                                  </a>
                                </div>
                                @endif
                              @else
                                <span class="text-muted">Belum ada tanggapan</span>
                              @endif
                            </div>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  @endforeach

                @else
                  <div class="alert alert-warning text-center py-5">
                    <i class="icofont-info-circle" style="font-size: 48px;"></i>
                    <h5 class="mt-3">Tidak Ditemukan Pengaduan</h5>
                    <p class="mb-3">
                      Tidak ada pengaduan untuk
                      @if($tipe === 'satker') Kode Satker @else NIK @endif:
                      <strong>{{ $search_key }}</strong>
                    </p>
                    <a href="{{url('track-complaint')}}" class="btn btn-primary">Coba Lagi</a>
                  </div>
                @endif

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
</body>
</html>
