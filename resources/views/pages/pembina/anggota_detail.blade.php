<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Detail Anggota</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tabler-icons@1.39.1/iconfont/tabler-icons.min.css" rel="stylesheet">

  <style>
    body {
      background: url('{{ asset('/img/backgrounds/bg1.png') }}') no-repeat center center fixed;
      background-size: cover;
      min-height: 100vh;
      font-family: "Public Sans", sans-serif;
      overflow-x: hidden;
      margin: 0;
    }

    /* NAVBAR */
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
    #layout-navbar .dropdown-toggle { color: white !important; font-weight: 500; }
    #layout-navbar .dropdown-menu {
      border-radius: 12px;
      border: none;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    }

    /* MAIN AREA */
    .main-area {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: calc(100vh - 80px);
      padding: 50px 20px;
    }

    .card-detail {
      width: 100%;
      max-width: 900px;
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

    h2 { color: #164b5c; font-weight: 700; }
    th { color: #164b5c; font-weight: 600; }
    td { color: #3b5358; }

    .btn-back, .btn-submit, .btn-decline {
        border: none;
        border-radius: 10px;
        font-weight: 500;
        font-size: 0.95rem;
        padding: 6px 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.25s ease;
        color: white;
        height: 38px; /* Tinggi sama seperti Materi */
        min-width: 90px; /* Lebar minimum proporsional */
        }


    .btn-back { background-color: #6b7770; }
    .btn-submit { background-color: #219EBC; }
    .btn-decline { background-color: #d14f4f; }

    .btn-back:hover, .btn-submit:hover, .btn-decline:hover {
      transform: translateY(-1px);
      opacity: 0.9;
    }

    /* Flex untuk tombol form */
    .btn-container form {
      display: inline-flex;
      margin: 0 0 0 0;
    }
  </style>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-xl" id="layout-navbar">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <span class="fw-bold fs-5">Detail Anggota</span>
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nama_lengkap) }}&background=7f8586ff&color=fff&size=40"
                 alt="{{ Auth::user()->nama_lengkap }}" class="rounded-circle me-2" width="36" height="36">
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

  <!-- MAIN CONTENT -->
  <div class="main-area">
    <div class="card-detail">
      <h2 class="fw-bold text-center mb-4">Detail Anggota</h2>

      <div class="card card-body p-0">
        <table class="table table-striped mb-0">
          <tbody>
            <tr><th>Nama</th><td>{{ $anggota->nama_lengkap }}</td></tr>
            <tr><th>NIS</th><td>{{ $anggota->nis_k }}</td></tr>
            <tr><th>Tanggal Lahir</th><td>{{ $anggota->tanggal_lahir }}</td></tr>
            <tr><th>Alamat</th><td>{{ $anggota->alamat }}</td></tr>
            <tr><th>No Telepon</th><td>{{ $anggota->no_telp }}</td></tr>
            <tr><th>Kelas</th><td>{{ $anggota->kelas }}</td></tr>
            <tr><th>Jenis Kelamin</th><td>{{ $anggota->jenis_kelamin }}</td></tr>
            <tr><th>Alasan Masuk Ekstrakurikuler</th><td>{{ $anggota->alasan }}</td></tr>
          </tbody>
        </table>
      </div>

      <!-- TOMBOL -->
      <div class="d-flex gap-2 mt-4 justify-content-center align-items-center flex-wrap btn-container">
        <a href="{{ route('pembina.anggota') }}" class="btn btn-back">
          <i class="ti ti-arrow-left me-1"></i> Kembali
        </a>

        <form action="{{ route('pembina.anggota.terima', $anggota->id) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-submit">
            <i class="ti ti-check me-1"></i> Terima
          </button>
        </form>

        <form action="{{ route('pembina.anggota.tolak', $anggota->id) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-decline">
            <i class="ti ti-x me-1"></i> Tolak
          </button>
        </form>
      </div>

      @if (session('success'))
        <div class="alert alert-success mt-4 text-center">
          {{ session('success') }}
        </div>
      @endif
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
