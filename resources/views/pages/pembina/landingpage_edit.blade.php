<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="icon" type="image/png" href="{{ asset('img/favicon/logob.png') }}">


  <title>Edit Landing Page</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/tabler-icons@1.39.1/iconfont/tabler-icons.min.css" rel="stylesheet">

  <style>
    body {
      background: url('{{ asset('/img/backgrounds/bg1.png') }}') no-repeat center center fixed;
      background-size: cover;
    
    }

    .main-container {
      display: flex;
      justify-content: center;
      padding: 50px 20px;
    }

    .card-main {
      width: 100%;
      max-width: 950px;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(8px);
      border-radius: 20px;
      padding: 30px 40px;
    }

    h2, h4 {
      color: #164b5c;
    }

    .section-title {
      border-left: 5px solid #219EBC;
      padding-left: 12px;
    }

    .btn-custom {
      border-radius: 10px;
      font-weight: 600;
      padding: 8px 18px;
    }

    .btn-theme {
      background-color: #219EBC;
      color: white;
    }
    .btn-theme:hover { background-color: #1a7e96; transform: translateY(-2px); box-shadow: 0 6px 15px rgba(0,0,0,0.2); }

    .btn-success { background: #4caf50; color:white; border:none;}
    .btn-success:hover { transform: translateY(-2px); box-shadow: 0 6px 15px rgba(0,0,0,0.2); }

    .btn-warning { background: #ffb74d; color:white; border:none;}
    .btn-warning:hover { transform: translateY(-2px); box-shadow: 0 6px 15px rgba(0,0,0,0.2); }

    .btn-danger { background: #e57373; color:white; border:none;}
    .btn-danger:hover { transform: translateY(-2px); box-shadow: 0 6px 15px rgba(0,0,0,0.2); }

    .card-inner {
      background: white;
      border-radius: 15px;
      padding: 20px;
      border: 1px solid #dce7e8;

    }

    table {
      border-radius: 10px;
      overflow: hidden;
    }

    table thead {
      background-color: #e7f4f6;
    }

    table tbody tr:hover {
      background-color: #f3fcff;
    }

    .btn-edit {
      background-color: #d18c4f;
      color: white;
      border-radius: 6px;
      padding: 6px 12px;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 4px;
    }
  
    .btn-delete {
        background-color: #d14f4f;
        color: white;
        border-radius: 6px;
        padding: 6px 12px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 4px;
    }
    .btn-delete:hover {
        background-color: #b84141;
        box-shadow: 0 3px 8px rgba(0,0,0,0.2);
    }

  </style>
</head>

<body>
<div class="main-container">
  <div class="card-main">
    <h2 class="text-center mb-4">Edit Landing Page</h2>

    <div class="card-inner">
      <h4 class="section-title">Tutorial</h4>

      <a href="{{ route('pembina.tutorial_edit', $tutorial->id) }}" 
         class="btn btn-theme btn-sm btn-custom mb-3">
         <i class="ti ti-edit me-1"></i> Edit Tutorial
      </a>

      <ol class="mt-2">
        @foreach([
          $tutorial->tutor_pertama,
          $tutorial->tutor_kedua,
          $tutorial->tutor_ketiga,
          $tutorial->tutor_keempat,
          $tutorial->tutor_kelima
        ] as $step)
          @if($step)
            <li style="margin-bottom: 5px;">{{ $step }}</li>
          @endif
        @endforeach
      </ol>
    </div>

    <div class="card-inner">
      <h4 class="section-title">Tentang PMR</h4>

      <a href="{{ route('pembina.crudtentangpmr.tentangpmr_create') }}" 
         class="btn btn-success btn-sm btn-custom mb-3">
         <i class="ti ti-plus me-1"></i> Tambah Baru
      </a>

      <table class="table table-striped align-middle">
        <thead>
          <tr>
            <th>Judul</th>
            <th>Isi</th>
            <th class="text-center" style="width: 180px;">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($tentangpmr as $item)
            <tr>
              <td>{{ $item->judul }}</td>
              <td>{{ Str::limit($item->isi, 80) }}</td>

              <td class="text-center">
                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ route('pembina.crudtentangpmr.tentangpmr_edit', $item->id) }}" 
                       class="btn btn-edit">
                       <i class="ti ti-pencil"></i> Edit
                    </a>
                    <a href="javascript:;" class="btn btn-delete"
                      onclick="deleteItem({{ $item->id }})">
                      <i class="ti ti-trash"></i> Hapus
                    </a>
                    <form id="delete-form-{{ $item->id }}" action="{{ route('pembina.crudtentangpmr.tentangpmr_delete', $item->id) }}" method="POST" class="d-none">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
              </td>

            </tr>
            
          @endforeach
          <script>
          function deleteItem(id) {
            Swal.fire({
              title: 'Apakah kamu yakin?',
              text: "Data yang dihapus tidak bisa dikembalikan!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#219EBC',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, hapus!',
              cancelButtonText: 'Batal'
            }).then((result) => {
              if(result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
              }
            });
          }
          </script>
          <script>
          @if(Session::has('success'))
          Swal.fire({
              icon: 'success',
              title: 'Berhasil',
              text: '{{ Session::get('success') }}',
              confirmButtonColor: '#219EBC',
              timer: 2000,
              timerProgressBar: true
          });
          @endif
          </script>
          
        </tbody>
      </table>
      <div class="mb-3">
    <a href="{{ route('pembina.dashboard') }}" class="btn btn-danger btn-custom">
        <i class="ti ti-arrow-left me-1"></i> Kembali 
    </a>
</div>

    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
