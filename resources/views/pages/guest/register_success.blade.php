<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Registrasi Berhasil</title>
  <link rel="stylesheet" href="{{ asset('/vendor/css/rtl/core.css') }}">
</head>
<body class="d-flex align-items-center justify-content-center vh-100 bg-light">

  <div class="card p-4 text-center shadow">
    <h3 class="fw-bold text-success mb-3">Registrasi Berhasil 🎉</h3>
    <p>Akun Anda telah dibuat dengan status <b>Pending</b>.</p>
    <p>Silakan tunggu persetujuan dari pembina sebelum bisa login.</p>

    <a href="{{ route('login') }}" class="btn btn-primary mt-3">Kembali ke Halaman Login</a>
  </div>

</body>
</html>
