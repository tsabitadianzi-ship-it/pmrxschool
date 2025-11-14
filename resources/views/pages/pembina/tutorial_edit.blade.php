<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Edit Tutorial</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tabler-icons@1.39.1/iconfont/tabler-icons.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      background: url('{{ asset('/img/backgrounds/bg1.png') }}') no-repeat center center fixed;
      background-size: cover;
      font-family: "Public Sans", sans-serif;
      margin: 0;
      min-height: 100vh;
      overflow-x: hidden;
    }

    /* NAVBAR */
    #layout-navbar {
      background-color: #219EBC;
      color: white;
      border-bottom: 1px solid rgba(255,255,255,0.15);
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      padding: 0.75rem 2rem;
      position: sticky;
      top: 0;
      z-index: 1030;
    }

    #layout-navbar .nav-link, #layout-navbar .dropdown-toggle {
      color: white !important;
      font-weight: 500;
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
      background: rgba(255,255,255,0.95);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
      padding: 2.5rem;
      border: 1px solid #cde3df;
      animation: fadeIn 0.6s ease;
    }

    @keyframes fadeIn { from { opacity:0; transform:translateY(10px); } to { opacity:1; transform:translateY(0); } }

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

    .form-control, textarea {
      border-radius: 10px;
      border: 1px solid #bcd4da;
      padding: 10px 12px;
      transition: 0.2s ease;
    }

    .form-control:focus, textarea:focus {
      border-color: #219EBC;
      box-shadow: 0 0 6px rgba(33,158,188,0.3);
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

    .alert { border-radius: 10px; margin-top: 5px; padding: 8px 12px; }
  </style>
</head>

<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-xl" id="layout-navbar">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <span class="fw-bold fs-5">Edit Tutorial</span>

      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nama_lengkap) }}&background=7f8586ff&color=fff&size=40"
                 alt="{{ Auth::user()->nama_lengkap }}" class="rounded-circle me-2" width="36" height="36">
            <span>{{ Auth::user()->nama_lengkap }}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            @if(in_array(Auth::user()->role, ['sekertaris','pembina','bendahara']))
              <li><a class="dropdown-item" href="{{ route('edit_profil') }}"><i class="ti ti-user me-2"></i> Ubah Password</a></li>
            @endif
            <li><hr class="dropdown-divider"></li>
            <li>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="dropdown-item text-danger" type="submit"><i class="ti ti-logout me-2"></i> Logout</button>
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
      <h2>Edit Tutorial</h2>

      @if($tutorial)
      @php
        $tutorFields = [
            1 => 'tutor_pertama',
            2 => 'tutor_kedua',
            3 => 'tutor_ketiga',
            4 => 'tutor_keempat',
            5 => 'tutor_kelima',
            6 => 'tutor_keenam',
            7 => 'tutor_ketujuh',
            8 => 'tutor_kedelapan',
            9 => 'tutor_kesembilan',
            10 => 'tutor_kesepuluh',
        ];
      @endphp

      <form action="{{ route('pembina.tutorial_update', $tutorial->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Judul -->
        <div class="mb-3">
          <label for="judul">Judul</label>
          <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" maxlength="20" value="{{ old('judul', $tutorial->judul) }}" required>
          @error('judul')<div class="alert alert-danger">{{ $message }}</div>@enderror
        </div>

        <!-- Tutor 1-5 -->
        @for ($i = 1; $i <= 5; $i++)
          @php $field = $tutorFields[$i]; @endphp
          <div class="mb-3">
            <label for="{{ $field }}">Tutor {{ $i }}</label>
            <textarea name="{{ $field }}" id="{{ $field }}" rows="3" class="form-control @error($field) is-invalid @enderror" required>{{ old($field, $tutorial->$field) }}</textarea>
            @error($field)<div class="alert alert-danger">{{ $message }}</div>@enderror
          </div>
        @endfor

        <!-- Tutor 6-10 (Opsional) -->
        @for ($i = 6; $i <= 10; $i++)
          @php $field = $tutorFields[$i]; @endphp
          <div class="mb-3">
            <label for="{{ $field }}">Tutor {{ $i }} (Opsional)</label>
            <textarea name="{{ $field }}" id="{{ $field }}" rows="3" class="form-control @error($field) is-invalid @enderror">{{ old($field, $tutorial->$field) }}</textarea>
            @error($field)<div class="alert alert-danger">{{ $message }}</div>@enderror
          </div>
        @endfor

        <div class="text-center mt-4">
          <a href="{{ route('pembina.landingpage_edit') }}" class="btn btn-cancel me-2"><i class="ti ti-arrow-left me-1"></i> Kembali</a>
          <button type="submit" class="btn btn-submit"><i class="ti ti-save me-1"></i> Simpan Perubahan</button>
        </div>
      </form>

      @else
        <p class="text-center text-danger">Tutorial tidak ditemukan.</p>
      @endif
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    @if(session('success'))
      Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: "{{ session('success') }}",
        confirmButtonColor: '#219EBC'
      });
    @endif
  </script>
</body>
</html>
