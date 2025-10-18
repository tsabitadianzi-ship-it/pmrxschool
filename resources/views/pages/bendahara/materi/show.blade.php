<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Detail Materi</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tabler-icons@1.39.1/iconfont/tabler-icons.min.css" rel="stylesheet">

  <style>
    body {
      background: url('{{ asset('/img/backgrounds/bg1.png') }}') no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      min-height: 100vh;
      font-family: "Public Sans", sans-serif;
      overflow-x: hidden;
    }

    /* === NAVBAR (asli FUEXY-style tapi fix) === */
    #layout-navbar {
      background-color: #219EBC;
      color: white;
      border-bottom: 1px solid rgba(255, 255, 255, 0.15);
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      padding: 0.75rem 2rem;
      position: sticky;
      top: 0;
      z-index: 1030;
    }

    #layout-navbar .nav-link,
    #layout-navbar .dropdown-toggle {
      color: white !important;
      font-weight: 500;
    }

    #layout-navbar .dropdown-menu {
      border-radius: 12px;
      border: none;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    }

    /* === MAIN AREA === */
    .main-area {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: calc(100vh - 80px);
      padding: 50px 20px;
    }

    .card-detail {
      width: 100%;
      max-width: 960px;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(8px);
      border-radius: 18px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
      padding: 2.5rem;
      animation: fadeIn 0.6s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h2 {
      color: #164b5c;
      font-weight: 700;
    }

    h3 {
      color: #219EBC;
      font-weight: 600;
    }

    p {
      color: #3b5358;
      line-height: 1.7;
    }

    .download-link {
      color: #219EBC;
      font-weight: 500;
      transition: 0.2s;
    }

    .download-link:hover {
      color: #176b86;
      text-decoration: underline;
    }

    .btn-back {
      background-color: #219EBC;
      color: white;
      border: none;
      border-radius: 8px;
      padding: 10px 20px;
      font-weight: 500;
      transition: all 0.25s ease;
    }

    .btn-back:hover {
      background-color: #197b9b;
      transform: translateY(-2px);
    }
  </style>
</head>

<body>
  <!-- ✅ NAVBAR -->
  <nav class="navbar navbar-expand-xl" id="layout-navbar">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <span class="fw-bold fs-5">Detail Materi</span>

      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
            <img 
              src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nama_lengkap) }}&background=7f8586ff&color=fff&size=40"
              alt="{{ Auth::user()->nama_lengkap }}" 
              class="rounded-circle me-2" width="36" height="36">
            <span>{{ Auth::user()->nama_lengkap }}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            @if(in_array(Auth::user()->role, ['sekertaris', 'pembina', 'bendahara']))
              <li>
                <a class="dropdown-item" href="{{ route('edit_profil') }}">
                  <i class="ti ti-user me-2"></i> Ubah Password
                </a>
              </li>
            @endif
            <li><hr class="dropdown-divider"></li>
            <li>
              <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="dropdown-item text-danger" type="submit">
                  <i class="ti ti-logout me-2"></i> Logout
                </button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

  <!-- ✅ CONTENT -->
  <div class="main-area">
    <div class="card-detail">
      <h3 class="text-center mb-3">{{ $materi->judul }}</h3>

      <p class="text-center mb-4">
        <i class="ti ti-calendar"></i>
        {{ \Carbon\Carbon::parse($materi->tanggal)->translatedFormat('l, d F Y') }}
      </p>

      <div>{!! nl2br(e($materi->isi)) !!}</div>

      @if($materi->file)
        <div class="text-center mt-4">
          <a href="{{ asset('uploads/materi/' . $materi->file) }}" target="_blank" class="download-link">
            <i class="ti ti-download"></i> Download File
          </a>
        </div>
      @else
        <p class="mt-4 text-center text-danger">
          <i class="ti ti-alert-circle"></i> Tidak ada file terlampir
        </p>
      @endif

      <div class="text-center mt-5">
        <a href="{{ route('bendahara.materi') }}" class="btn btn-sm btn-danger">
          <i class="ti ti-arrow-left"></i> Kembali
        </a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
