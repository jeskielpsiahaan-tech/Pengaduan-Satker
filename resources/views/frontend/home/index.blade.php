<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>HONAI 063 - Himpunan Opini Non-satker & Aduan Instansi</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link rel="shortcut icon" href="{{asset('assets/images/gkn.png')}}">

  <link href="{{asset('frontend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
    <style>
    .search-section {
      padding: 60px 0;
      background: #f8f9fa;
    }
    .status-badge {
      padding: 5px 10px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: bold;
    }
    .status-unprocess {
      background-color: #ffc107;
      color: #000;
    }
    .status-process {
      background-color: #17a2b8;
      color: #fff;
    }
    .status-finished {
      background-color: #28a745;
      color: #fff;
    }
    .complaint-card {
      transition: transform 0.3s;
    }
    .complaint-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .user-info {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }
    .user-avatar {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
      object-fit: cover;
    }
    .user-details {
      flex: 1;
    }
    .user-name {
      font-weight: bold;
      margin-bottom: 2px;
    }
    .user-nik {
      font-size: 12px;
      color: #6c757d;
    }
    /* Language Switcher Styles */
    .language-switcher {
      position: relative;
      display: inline-block;
      margin-left: 15px;
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

    /* Hero Section */
    #hero {
      text-align: center;
    }
    #hero .container {
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .hero-content {
      max-width: 750px;
      margin: 0 auto;
    }
    .hero-badge {
      display: inline-block;
      background: rgba(255,255,255,0.15);
      border: 1px solid rgba(0,0,0,0.3);
      color: #000;
      padding: 6px 20px;
      border-radius: 50px;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 0.5px;
      margin-bottom: 20px;
      backdrop-filter: blur(4px);
    }
    .hero-badge i {
      margin-right: 6px;
      color: #ffc107;
    }
    .hero-title-yellow {
      color: #ffc107 !important;
      text-shadow: 0 0 30px rgba(255,193,7,0.5);
      font-family: 'Times New Roman', Times, serif;
    }
    #hero h1 {
      font-size: 64px;
      font-weight: 800;
      line-height: 1.1;
      margin-bottom: 10px;
      letter-spacing: -1px;
    }
    #hero h2 {
      font-size: 20px;
      color: #fff;
      margin-bottom: 20px;
      font-weight: 400;
      letter-spacing: 0.3px;
    }
    .hero-desc {
      color: #fff;
      font-size: 15px;
      line-height: 1.8;
      margin-bottom: 35px;
    }
    .hero-buttons {
      display: flex;
      gap: 15px;
      justify-content: center;
      flex-wrap: wrap;
      margin-bottom: 50px;
    }
    .btn-hero-primary {
      background: #ffc107;
      color: #1a1a2e;
      padding: 14px 36px;
      border-radius: 50px;
      font-weight: 700;
      font-size: 15px;
      text-decoration: none;
      transition: all 0.3s;
      box-shadow: 0 4px 20px rgba(255,193,7,0.4);
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .btn-hero-primary:hover {
      background: #ffca2c;
      color: #1a1a2e;
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(255,193,7,0.5);
      text-decoration: none;
    }
    .btn-hero-secondary {
      background: #106eea;
      color: #fff;
      padding: 14px 36px;
      border-radius: 50px;
      font-weight: 600;
      font-size: 15px;
      text-decoration: none;
      border: 2px solid #106eea;
      transition: all 0.3s;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    .btn-hero-secondary:hover {
      background: #0d5cc7;
      border-color: #0d5cc7;
      color: #fff;
      transform: translateY(-2px);
      text-decoration: none;
      box-shadow: 0 8px 25px rgba(16,110,234,0.4);
    }
    .hero-stats {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 30px;
      flex-wrap: wrap;
    }
    .hero-stat-item {
      display: flex;
      align-items: center;
      gap: 8px;
      color: #000;
      font-size: 14px;
      font-weight: 600;
    }
    .hero-stat-item i {
      font-size: 20px;
      color: #ffc107;
    }
    .hero-stat-divider {
      width: 1px;
      height: 24px;
      background: rgba(0,0,0,0.2);
    }
    @media (max-width: 768px) {
      #hero h1 { font-size: 42px; }
      #hero h2 { font-size: 16px; }
      .hero-stat-divider { display: none; }
    }
  </style>
</head>

<body>

  <!-- ======= Top Bar ======= -->
   <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com"> kppn.jayapura@gmail.com</a>
        <i class="icofont-phone"></i>  082191586141
      </div>
      <div class="social-links">
        <a href="https://x.com/kppnjayapura" class="twitter" target="_blank" rel="noopener"><i class="icofont-twitter"></i></a>
        <a href="https://www.facebook.com/KppnJayapura063" class="facebook" target="_blank" rel="noopener"><i class="icofont-facebook"></i></a>
        <a href="https://www.instagram.com/kppnjayapura" class="instagram" target="_blank" rel="noopener"><i class="icofont-instagram"></i></a>
      </div>
      <!-- Language Switcher -->
      <div class="language-switcher ms-3">
        <button class="language-btn" id="currentLanguage">
          <i class="icofont-globe"></i> ID
        </button>
        <div class="language-options">
          <div class="language-option" data-lang="id">Indonesia (ID)</div>
          <div class="language-option" data-lang="en">English (EN)</div>
        </div>
      </div>
    </div>
  </div>


  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="{{url('/')}}" class="logo mr-auto"><img src="{{asset('assets/logo1.png')}}" alt="GKN" style="max-height: 90px;"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{url('/')}}" data-translate="nav.home">Home</a></li>
          <li><a href="#procedures" data-translate="nav.procedures">Procedures</a></li>
          <li ><a href="{{url('track-complaint')}}" data-translate="nav.track">Track Complaint</a></li>
          @if(Session::get('nik') == NULL)
          <li><a href="{{url('user/login')}}" data-translate="nav.login">Login</a></li>
          <li><a href="{{url('user/register')}}" data-translate="nav.register">Register</a></li>
          @endif
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <div class="hero-content text-center">
        <h1 data-aos="zoom-in" data-aos-delay="100"><span class="hero-title-yellow" data-translate="hero.title">HONAI 063</span></h1>
        <h2 data-aos="fade-up" data-aos-delay="200" data-translate="hero.subtitle">Himpunan Opini Non-satker &amp; Aduan Instansi</h2>
        <p class="hero-desc" data-aos="fade-up" data-aos-delay="300" data-translate="hero.desc">
          Sampaikan aspirasi dan pengaduan Anda secara mudah, cepat, dan transparan. Kami hadir untuk mendengar dan menindaklanjuti setiap laporan Anda.
        </p>
        <div class="hero-buttons" data-aos="fade-up" data-aos-delay="400">
          @if(Session::get('nik') != NULL)
            <a href="{{url('user/complaint/add')}}" class="btn-hero-primary">
              <i class="icofont-paper-plane"></i> <span data-translate="hero.report_button">Buat Pengaduan</span>
            </a>
          @else
            <a href="{{url('user/login')}}" class="btn-hero-primary">
              <i class="icofont-paper-plane"></i> <span data-translate="hero.report_button">Buat Pengaduan</span>
            </a>
            <a href="{{url('track-complaint')}}" class="btn-hero-secondary">
              <i class="icofont-search-1"></i> <span data-translate="hero.track_button">Lacak Pengaduan</span>
            </a>
          @endif
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="procedures" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="" data-translate="procedure.step1.title">1. Write a Report</a></h4>
              <p class="description" data-translate="procedure.step1.desc">Write your complaint report clearly.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="" data-translate="procedure.step2.title">2. Verification Process</a></h4>
              <p class="description" data-translate="procedure.step2.desc">Wait until your report is verified.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="" data-translate="procedure.step3.title">3. Follow up</a></h4>
              <p class="description" data-translate="procedure.step3.desc">Your report is being followed up.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="" data-translate="procedure.step4.title">4. Done</a></h4>
              <p class="description" data-translate="procedure.step4.desc">The complaint report has been prosecuted.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Featured Services Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container py-4">
      <div class="copyright">
        &copy; <span data-translate="footer.copyright">Copyright</span> <strong><span>Kantor Pelayanan Perbendaharaan Negara</span></strong>. <span data-translate="footer.rights">All Rights Reserved</span>
      </div>
      <div class="credits">
        <span data-translate="footer.designed">Designed by</span> <a href="#">Jeskhiel Siahaan</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('frontend/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('frontend/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('frontend/assets/js/main.js')}}"></script>
  
  <!-- Translation Script -->
  <script>
    // Data terjemahan
    const translations = {
      id: {
        "nav.home": "Beranda",
        "nav.procedures": "Prosedur",
        "nav.track": "Lacak Pengaduan",
        "nav.login": "Masuk",
        "nav.register": "Daftar",
        "hero.badge": "Platform Pengaduan Resmi KPPN Jayapura",
        "hero.title": "HONAI 063",
        "hero.subtitle": "Himpunan Opini Non-satker & Aduan Instansi",
        "hero.desc": "Sampaikan aspirasi dan pengaduan Anda secara mudah, cepat, dan transparan. Kami hadir untuk mendengar dan menindaklanjuti setiap laporan Anda.",
        "hero.report_button": "Buat Pengaduan",
        "hero.track_button": "Lacak Pengaduan",
        "procedure.step1.title": "1. Tulis Laporan",
        "procedure.step1.desc": "Tulis laporan pengaduan Anda dengan jelas.",
        "procedure.step2.title": "2. Proses Verifikasi",
        "procedure.step2.desc": "Tunggu hingga laporan Anda diverifikasi.",
        "procedure.step3.title": "3. Tindak Lanjut",
        "procedure.step3.desc": "Laporan Anda sedang ditindaklanjuti.",
        "procedure.step4.title": "4. Selesai",
        "procedure.step4.desc": "Laporan pengaduan telah ditindaklanjuti.",
        "footer.copyright": "Hak Cipta",
        "footer.rights": "Semua Hak Dilindungi",
        "footer.designed": "Dirancang oleh",
      },
      en: {
        "nav.home": "Home",
        "nav.procedures": "Procedures",
        "nav.track": "Track Complaint",
        "nav.login": "Login",
        "nav.register": "Register",
        "hero.badge": "Official Complaint Platform of KPPN Jayapura",
        "hero.title": "HONAI 063",
        "hero.subtitle": "Non-satker Opinion & Institution Complaint Hub",
        "hero.desc": "Submit your aspirations and complaints easily, quickly, and transparently. We are here to listen and follow up on every report.",
        "hero.report_button": "Submit Complaint",
        "hero.track_button": "Track Complaint",
        "procedure.step1.title": "1. Write a Report",
        "procedure.step1.desc": "Write your complaint report clearly.",
        "procedure.step2.title": "2. Verification Process",
        "procedure.step2.desc": "Wait until your report is verified.",
        "procedure.step3.title": "3. Follow up",
        "procedure.step3.desc": "Your report is being followed up.",
        "procedure.step4.title": "4. Done",
        "procedure.step4.desc": "The complaint report has been resolved.",
        "footer.copyright": "Copyright",
        "footer.rights": "All Rights Reserved",
        "footer.designed": "Designed by",
      }
    };

    // Fungsi untuk mengubah bahasa
    function changeLanguage(lang) {
      // Simpan preferensi bahasa di localStorage
      localStorage.setItem('preferredLanguage', lang);
      
      // Perbarui tombol bahasa
      document.getElementById('currentLanguage').innerHTML = `<i class="icofont-globe"></i> ${lang.toUpperCase()}`;
      
      // Terapkan terjemahan ke semua elemen dengan atribut data-translate
      document.querySelectorAll('[data-translate]').forEach(element => {
        const key = element.getAttribute('data-translate');
        if (translations[lang][key]) {
          element.textContent = translations[lang][key];
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
    });
  </script>
</body>
</html>