<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Detail Absensi</title>

  <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon/logob.png') }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tabler-icons@1.39.1/iconfont/tabler-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
  <link rel="stylesheet" href="{{ asset('/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />

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
      border-bottom: 1px solid rgba(255,255,255,0.15);
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      padding: 0.75rem 2rem;
      position: sticky;
      top: 0;
      z-index: 1030;
    }
    #layout-navbar .nav-link, #layout-navbar .dropdown-toggle { color: white !important; font-weight: 500; }

    .main-area {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: calc(100vh - 80px);
      padding: 50px 20px;
    }

    .card-detail {
      width: 100%;
      max-width: 950px;
      background: rgba(255,255,255,0.95);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
      padding: 2.5rem;
      animation: fadeIn 0.6s ease;
      border: 1px solid #cde3df;
    }

    @keyframes fadeIn { from {opacity:0; transform:translateY(10px);} to {opacity:1; transform:translateY(0);} }

    h2 { color: #164b5c; font-weight: 700; text-align: center; margin-bottom: 1.5rem; }

    .table thead th {
      background-color: #4B8C96; color: #fff; font-weight: 600;
      text-transform: uppercase; letter-spacing: 0.5px; border: none;
    }
    .table tbody tr:hover { background-color: rgba(75,140,150,0.08); transition: 0.2s; }
    .badge { font-weight: 500; font-size: 0.9rem; }
    .bg-success { background-color: #4fd167ff !important; color: white; }
    .bg-warning { background-color: #d18c4fff !important; color: white; }
    .bg-danger { background-color: #d14f4fff !important; color: white; }

    .btn-back {
      background-color: #6b7770ff; color: white; border: none; border-radius: 10px;
      padding: 10px 18px; font-weight: 500; transition: 0.2s;
    }
    .btn-back:hover { background-color: #58615bff; transform: translateY(-1px); }

    .btn-edit {
      background-color: #d18c4fff; color: white; border-radius: 10px;
      padding: 8px 16px; font-weight: 500; font-size: 0.95rem; transition: 0.2s;
    }
    .btn-edit:hover { background-color: #3e7d85; transform: translateY(-1px); }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-xl" id="layout-navbar">
    <div class="container-fluid d-flex justify-content-between align-items-center">
      <span class="fw-bold fs-5">Detail Absensi</span>
      <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-bs-toggle="dropdown">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nama_lengkap) }}&background=7f8586ff&color=fff&size=40"
                 alt="{{ Auth::user()->nama_lengkap }}" class="rounded-circle me-2" width="36" height="36">
            <span>{{ Auth::user()->nama_lengkap }}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="{{ route('edit_profil') }}"><i class="ti ti-user me-2"></i> Ubah Password</a></li>
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

  <div class="main-area">
    <div class="card-detail">
      <h2>Detail Absensi - {{ $tanggal }}</h2>

      <table class="table table-striped table-hover dataTable align-middle">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Status</th>
            <th>Kegiatan</th>
          </tr>
        </thead>
        <tbody>
          @foreach($absensis as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->user->nama_lengkap ?? '-' }}</td>
              <td>
                <span class="badge 
                  @if($item->status == 'Hadir') bg-success
                  @elseif($item->status == 'Izin') bg-warning
                  @else bg-danger @endif">
                  {{ $item->status }}
                </span>
              </td>
              <td>{{ $item->kegiatan ?? '-' }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <div class="text-center mt-3">
        <a href="{{ route('siswa.absensi') }}" class="btn btn-back">← Kembali</a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(function () {
      $('.dataTable').DataTable({
        language: {
          emptyTable: "Belum ada data absensi",
          search: "Cari:",
          lengthMenu: "Tampilkan _MENU_ data",
          paginate: { previous: "Sebelumnya", next: "Berikutnya" }
        },
        order: [[1, 'asc']],
        pageLength: 10
      });
    });

    @if(Session::has('success'))
      Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ Session::get('success') }}',
        background: '#ffffff',
        confirmButtonColor: '#219EBC'
      });
    @endif
  </script>
</body>
</html>
