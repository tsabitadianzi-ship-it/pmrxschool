<!doctype html>
<html
  lang="id"
  class="light-style layout-wide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('/') }}"
  data-template="horizontal-menu-template"
  data-style="light">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>PMR X-SCHOOL</title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/logoh.png') }}" />

  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('/vendor/fonts/fontawesome.css') }}" />
  <link rel="stylesheet" href="{{ asset('/vendor/fonts/tabler-icons.css') }}" />
  <link rel="stylesheet" href="{{ asset('/vendor/fonts/flag-icons.css') }}" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="{{ asset('/vendor/css/rtl/core.css') }}" />
  <link rel="stylesheet" href="{{ asset('/vendor/css/rtl/theme-default.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/demo.css') }}" />

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="{{ asset('/vendor/libs/node-waves/node-waves.css') }}" />
  <link rel="stylesheet" href="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
  <link rel="stylesheet" href="{{ asset('/vendor/libs/typeahead-js/typeahead.css') }}" />

  <style>
    body {
      background: linear-gradient(120deg, #8ecae6, #d9d9d9, #e0f2fe);
      background-size: 300% 300%;
      animation: gradientMove 10s ease infinite;
      font-family: 'Poppins', sans-serif;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    nav.navbar {
      backdrop-filter: blur(10px);
      background-color: rgba(33, 158, 188, 0.9) !important;
      border-radius: 1rem;
      margin-top: 1rem;
      padding: 0.75rem 1.5rem;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
      transition: 0.3s ease;
    }

    .navbar:hover {
      background-color: rgba(33, 158, 188, 1) !important;
    }

    .navbar .fw-bold {
      color: #ffffff;
    }

    .btn-custom {
      background-color: #219ebc;
      color: white;
      border-radius: 8px;
      transition: all 0.3s ease;
      font-weight: 500;
    }

    .btn-custom:hover {
      background-color: #197b9b;
      transform: scale(1.05);
    }

    /* 🩺 Card Style */
    .card {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(6px);
      border-radius: 1rem;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
      border: none;
      padding: 2rem;
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    h1 {
      font-weight: 700;
      letter-spacing: 0.5px;
      text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.15);
    }

    p {
      font-weight: 400;
      line-height: 1.6;
    }

    .card h4 {
      color: #219ebc;
      font-weight: 600;
    }

    /* 📋 Tutorial Step */
    .tutorial-list {
      display: flex;
      flex-direction: column;
      gap: 1rem;
      margin-top: 1rem;
    }

    .tutorial-step {
      display: flex;
      align-items: flex-start;
      background-color: #f1f5f9;
      border-radius: 10px;
      padding: 0.8rem 1rem;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
    }

    .tutorial-step:hover {
      background-color: #e0f2fe;
      transform: translateX(4px);
    }

    .tutorial-step span {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 32px;
      height: 32px;
      background-color: #219ebc;
      color: white;
      font-weight: 600;
      font-size: 16px;
      border-radius: 50%;
      margin-right: 12px;
      flex-shrink: 0;
    }

    .tutorial-text {
      flex: 1;
      color: #334155;
      line-height: 1.5;
    }

    footer {
      text-align: center;
      color: #475569;
      font-size: 0.9rem;
      margin-top: 4rem;
      opacity: 0.8;
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center" id="layout-navbar">
    <div class="d-flex align-items-center">
      <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none">
        <img src="{{ asset('/img/favicon/logoh.png') }}" alt="Logo" width="38" height="38" class="me-2" />
        <span class="fw-bold fs-5 text-white">PMR X-SCHOOL</span>
      </a>
    </div>

    <div class="ms-auto d-flex gap-2">
      <a href="{{ route('register') }}" class="btn btn-sm btn-custom">Daftar</a>
      <a href="{{ route('login') }}" class="btn btn-sm btn-custom">Login</a>
    </div>
  </nav>

  <!-- Content -->
  <div class="container mt-5">
    <div class="text-center text-white mb-5">
      <h1>Selamat Datang di PMR X-SCHOOL</h1>
      <p class="mt-2">Bergabunglah dengan kami untuk belajar, berkontribusi, dan menebar kebaikan bersama!</p>
    </div>

    <div class="row g-4 justify-content-center">
      <!-- Card Tentang PMR -->
<div class="col-lg-6 col-md-10">
  <div class="card">
    <div class="mb-3">
      <h4 class="fw-bold mb-2">Tentang PMR</h4>
      <h6 class="text-muted">Pelayanan Kesehatan Sekolah</h6>
    </div>
    <p>
      PMR X-School adalah unit kegiatan yang berfokus pada pelayanan kesehatan di lingkungan sekolah.
      Kami menyediakan pertolongan pertama, edukasi kesehatan, dan kegiatan sosial kemanusiaan untuk
      menumbuhkan rasa empati serta tanggung jawab sosial siswa.
    </p>

    <h6 class="mt-3 text-primary fw-bold">Kegiatan Rutin dan Pelatihan</h6>
    <p>
      Kami rutin mengadakan pelatihan <b>pertolongan pertama (P3K)</b>, donor darah, simulasi evakuasi bencana,
      dan penyuluhan kesehatan. Selain itu, anggota juga aktif dalam kegiatan sosial seperti bakti lingkungan
      dan kunjungan kemanusiaan.
    </p>

    <h6 class="mt-3 text-primary fw-bold">Nilai dan Prinsip Dasar</h6>
    <p>
      PMR berpegang pada <b>7 Prinsip Dasar Gerakan Palang Merah dan Bulan Sabit Merah</b>, yaitu:
      Kemanusiaan, Kesamaan, Kenetralan, Kemandirian, Kesukarelaan, Kesatuan, dan Kesemestaan.
      Nilai-nilai ini menjadi pedoman kami dalam bertindak dan melayani.
    </p>

    <h6 class="mt-3 text-primary fw-bold">Manfaat Bergabung</h6>
    <p>
      Bergabung dengan PMR tidak hanya mengajarkan keterampilan hidup, tetapi juga melatih empati,
      kepemimpinan, dan rasa tanggung jawab sosial. Setiap anggota diajarkan untuk menjadi pribadi yang
      peduli, disiplin, dan tangguh.
    </p>
  </div>
</div>

      <!-- Card Tutorial Mendaftar -->
      <div class="col-lg-6 col-md-10">
        <div class="card">
          <div class="mb-3">
            <h4 class="fw-bold mb-2">Tutorial Mendaftar</h4>
            <h6 class="text-muted">Panduan mudah untuk mulai bergabung</h6>
          </div>

          <div class="tutorial-list">
            <div class="tutorial-step">
              <span>1</span>
              <div class="tutorial-text">
                Klik tombol <b>Daftar</b> di kanan atas halaman.
              </div>
            </div>
            <div class="tutorial-step">
              <span>2</span>
              <div class="tutorial-text">
                Isi formulir pendaftaran dengan data diri yang lengkap dan benar.
              </div>
            </div>
            <div class="tutorial-step">
              <span>3</span>
              <div class="tutorial-text">
                Periksa kembali data kamu, lalu klik <b>Kirim</b>.
              </div>
            </div>
            <div class="tutorial-step">
              <span>4</span>
              <div class="tutorial-text">
                Setelah berhasil, tunggu pembina mengonfirmasi pendaftaranmu
              </div>
            </div>
            <div class="tutorial-step">
              <span>5</span>
              <div class="tutorial-text">
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ⚕️ Footer -->
  <footer>
    <p>© 2025 PMR X-SCHOOL. Dibuat dengan semangat kemanusiaan</p>
  </footer>

  <!-- JS -->
  <script src="{{ asset('/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('/vendor/libs/node-waves/node-waves.js') }}"></script>
  <script src="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('/vendor/js/menu.js') }}"></script>
  <script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>
