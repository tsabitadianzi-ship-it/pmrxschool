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
  <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/logob.png') }}" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Core Styles -->
  <link rel="stylesheet" href="{{ asset('/vendor/css/rtl/core.css') }}" />
  <link rel="stylesheet" href="{{ asset('/vendor/css/rtl/theme-default.css') }}" />
  <link rel="stylesheet" href="{{ asset('/css/demo.css') }}" />

  <style>
    /* 🌿 Background & Font */
    body {
      background-color: #c2cacd85; /* solid background */
      font-family: 'Poppins', sans-serif;
      color: #1e293b;
    }

    /* ✨ Navbar */
    nav.navbar {
      backdrop-filter: blur(10px);
      background-color: rgba(33, 158, 188, 0.9) !important;
      border-radius: 1rem;
      margin: 1.5rem auto;
      padding: 0.8rem 1.5rem;
      width: 95%;
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    }

    .navbar .fw-bold {
      color: #fff;
      font-weight: 600;
    }

    /* 💠 Tombol */
    .btn-custom {
      background-color: #219ebc;
      color: white;
      border-radius: 8px;
      padding: 0.4rem 1rem;
      font-weight: 500;
      transition: all 0.2s ease;
    }

    .btn-custom:hover {
      background-color: #197b9b;
    }

    /* 💎 Card */
    .card {
      background: #ffffff;
      border-radius: 1rem;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
      padding: 2rem;
      border: none;
      /* hapus transform hover */
    }

    h1 {
      font-weight: 700;
      letter-spacing: 0.5px;
      color: #0f172a;
      margin-bottom: 0.5rem;
    }

    h4 {
      color: #219ebc;
      font-weight: 600;
    }

    h6.text-muted {
      color: #64748b !important;
      font-weight: 500;
    }

    p {
      color: #334155;
      line-height: 1.7;
      margin-bottom: 0.8rem;
    }

    /* 📋 Tutorial Step */
    .tutorial-step {
      display: flex;
      align-items: flex-start;
      background: #f1f5f9;
      border-radius: 10px;
      padding: 0.8rem 1rem;
      margin-bottom: 0.8rem;
    }

    .tutorial-step span {
      width: 30px;
      height: 30px;
      background-color: #219ebc;
      color: #fff;
      font-weight: 600;
      font-size: 15px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 12px;
      flex-shrink: 0;
    }

    footer {
      text-align: center;
      color: #64748b;
      font-size: 0.9rem;
      margin-top: 4rem;
      padding-bottom: 2rem;
      opacity: 0.8;
    }

    .tentangpmr h4 {
        margin-bottom: 0.3rem; /* sebelumnya 0.5~0.8rem */
    }

    .tentangpmr h6 {
        margin-top: 0.4rem;    /* jarak dari judul utama */
        margin-bottom: 0.3rem; /* jarak ke paragraf */
    }

    .tentangpmr p {
        margin-bottom: 0.5rem; /* jarak antar paragraf */
        line-height: 1.5;      /* rapat tapi masih terbaca */
    }

  </style>
</head>

<body style="background: url('{{ asset('/img/backgrounds/bg2.png') }}') no-repeat center center fixed; background-size: cover;">
  <!-- Navbar -->
  <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center" id="layout-navbar">
    <div class="d-flex align-items-center">
      <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none">
        <img src="{{ asset('/img/favicon/logop.png') }}" alt="Logo" width="38" height="38" class="me-2" />
        <span class="fw-bold fs-5 text-white">PMR X-SCHOOL</span>
      </a>
    </div>

    <div class="ms-auto d-flex gap-2">
      <a href="{{ route('register') }}" class="btn btn-sm" style="background-color: #ffffffff;">Daftar</a>
      <a href="{{ route('login') }}" class="btn btn-sm" style="background-color: #ffffffff;">Login</a>
    </div>
  </nav>

  <!-- Content -->
  <div class="container mt-5">
    <div class="text-center mb-5">
        <h1>Selamat Datang di PMR X-SCHOOL</h1>
        <p class="mt-2 text-secondary">Hai selamat datang di PMR X-SCHOOL. Sebelum login klik tombol daftar untuk bergabung bersama kami!</p>
    </div>

    <div class="row g-4 justify-content-center">
        <!-- Tentang PMR -->
        <div class="col-lg-6 col-md-10">
            <div class="card tentangpmr">
                <div class="mb-3">
                    <h4 class="fw-bold ">Tentang PMR</h4>
                    <h6 class="text-muted">Pelayanan Kesehatan Sekolah</h6>
                </div>
                @foreach($tentangpmr as $item)
                    <h6 class="text-primary fw-bold">{{ $item->judul }}</h6>
                    <p>{{ $item->isi }}</p>
                @endforeach
            </div>
        </div>

        <!-- Tutorial Mendaftar -->
        <div class="col-lg-6 col-md-10">
            <div class="card">
                <div class="mb-3">
                    <h4 class="fw-bold mb-2">Tutorial Mendaftar</h4>
                    <h6 class="text-muted">Panduan mudah untuk mulai bergabung</h6>
                </div>

                <div class="tutorial-list">
                    @php 
                        $steps = [
                            $tutorial->tutor_pertama,
                            $tutorial->tutor_kedua,
                            $tutorial->tutor_ketiga,
                            $tutorial->tutor_keempat,
                            $tutorial->tutor_kelima,
                            $tutorial->tutor_keenam,
                            $tutorial->tutor_ketujuh,
                            $tutorial->tutor_kedelapan,
                            $tutorial->tutor_kesembilan,
                            $tutorial->tutor_kesepuluh
                        ];
                    @endphp

                    @foreach($steps as $index => $step)
                        @if($step != null)
                            <div class="tutorial-step">
                                <span>{{ $loop->iteration }}</span>
                                <div class="tutorial-text">{{ $step }}</div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

    </div> <!-- akhir row -->
</div>

  <!-- Footer -->
  <footer>
    <p>© 2025 PMR X-SCHOOL. Dibuat dengan semangat kemanusiaan</p>
  </footer>
</body>
</html>
