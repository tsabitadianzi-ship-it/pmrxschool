<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Password</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tabler-icons@1.39.1/iconfont/tabler-icons.min.css" rel="stylesheet">

  <style>
    body {
      background: url('{{ asset('/img/backgrounds/bg1.png') }}') no-repeat center center fixed;
      background-size: cover;
      font-family: "Public Sans", sans-serif;
      margin: 0;
      min-height: 100vh;
      overflow-x: hidden;
    }

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

    .main-area {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: calc(100vh - 80px);
      padding: 50px 20px;
    }

    .card-detail {
      width: 100%;
      max-width: 700px;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
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
      text-align: center;
      margin-bottom: 1.5rem;
    }

    label {
      font-weight: 600;
      color: #176b86;
    }

    .form-control {
      border-radius: 10px;
      border: 1px solid #bcd4da;
      padding: 10px 12px;
      transition: 0.2s ease;
    }

    .form-control:focus {
      border-color: #219EBC;
      box-shadow: 0 0 6px rgba(33, 158, 188, 0.3);
    }

    .btn-submit {
      background-color: #219EBC;
      color: white;
      border: none;
      border-radius: 10px;
      padding: 10px 18px;
      font-weight: 500;
      transition: 0.2s;
    }

    .btn-submit:hover {
      background-color: #468d9fff;
      transform: translateY(-1px);
    }

    .btn-cancel {
      background-color: #6b7770ff;
      color: white;
      border: none;
      border-radius: 10px;
      padding: 10px 18px;
      font-weight: 500;
      transition: 0.2s;
    }

    .btn-cancel:hover {
      background-color: #58615bff;
      transform: translateY(-1px);
    }

    .alert {
      border-radius: 10px;
      margin-top: 5px;
      padding: 8px 12px;
    }
  </style>
</head>

<body>
  <!-- ✅ NAVBAR -->
  <nav class="navbar navbar-expand-xl" id="layout-navbar">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <span class="fw-bold fs-5">Edit Password</span>

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
      <h2>Ubah Password</h2>

      {{-- ✅ Alert Sukses --}}
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif

      {{-- ⚠️ Error --}}
      @if($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('update_profil') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="current_password">Password Lama</label>
            <input type="password" name="current_password" id="current_password" class="form-control" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="new_password">Password Baru</label>
            <input type="password" name="new_password" id="new_password" class="form-control" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="new_password_confirmation">Konfirmasi Password Baru</label>
          <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
        </div>

        <div class="text-center mt-4">
          <button type="submit" class="btn btn-submit btn-sm me-2">
            <i class="ti ti-check me-1"></i> Simpan
          </button>
          <a href="{{ url()->previous() }}" class="btn btn-sm btn-cancel">
            <i class="ti ti-arrow-left me-1"></i> Batal
          </a>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  @if (Session::has('success'))
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Berhasil',
      text: '{{ Session::get('success') }}',
      showConfirmButton: false,
      timer: 3000
    });
  </script>
  @endif
</body>
</html>
