<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Update Jabatan Anggota</title>

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

    /* === NAVBAR === */
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
      align-items: center;
      min-height: calc(100vh - 80px);
      padding: 20px;
    }

    .card-detail {
      width: 100%;
      max-width: 500px; /* lebih compact */
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(8px);
      border-radius: 18px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
      padding: 1.8rem; /* lebih pendek */
      animation: fadeIn 0.6s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h2 {
      color: #164b5c;
      font-weight: 700;
      text-align: center;
      margin-bottom: 1.2rem;
    }

    label {
      font-weight: 600;
      color: #176b86;
    }

    .form-control {
      border-radius: 8px;
      border: 1px solid #bcd4da;
      padding: 8px 10px; /* lebih ringkas */
      transition: 0.2s ease;
    }

    .form-control:focus {
      border-color: #219EBC;
      box-shadow: 0 0 6px rgba(33, 158, 188, 0.3);
    }

    .btn-submit, .btn-cancel {
      border: none;
      border-radius: 10px;
      font-weight: 500;
      font-size: 0.9rem;
      padding: 6px 12px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      transition: all 0.25s ease;
      color: white;
      min-width: 80px;
      height: 36px;
    }

    .btn-submit { background-color: #219EBC; } /* biru cerah */
    .btn-cancel { background-color: #6b7770; }

    .btn-submit:hover, .btn-cancel:hover {
      opacity: 0.9;
      transform: translateY(-1px);
    }

    .alert {
      border-radius: 10px;
      margin-top: 10px;
      padding: 8px 12px;
    }
  </style>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-xl" id="layout-navbar">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <span class="fw-bold fs-5">Update Jabatan Anggota</span>

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
              <form method="POST" action="{{ route('logout') }}">
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
      <h2>Update Jabatan Anggota</h2>

      <form action="{{ route('pembina.anggota_update', $anggota->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="role">Pilih Jabatan</label>
          <select name="role" id="role" class="form-control">
            <option value="siswa" {{ $anggota->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
            <option value="sekertaris" {{ $anggota->role == 'sekertaris' ? 'selected' : '' }}>Sekretaris</option>
            <option value="bendahara" {{ $anggota->role == 'bendahara' ? 'selected' : '' }}>Bendahara</option>
          </select>
        </div>

        <div class="d-flex gap-2 justify-content-center mt-3 flex-wrap">
          <button type="submit" class="btn btn-submit">
            <span class="ti ti-check me-1"></span> Update
          </button>
          <a href="{{ route('pembina.anggota') }}" class="btn btn-cancel">
            <span class="ti ti-arrow-left me-1"></span> Batal
          </a>
        </div>
      </form>

      @if(session('success'))
        <div class="alert alert-success text-center">
          {{ session('success') }}
        </div>
      @endif
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
