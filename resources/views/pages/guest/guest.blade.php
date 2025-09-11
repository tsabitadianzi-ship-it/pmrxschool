<!doctype html>

<html
  lang="en"
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

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon/favicon.ico ') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->

    <link rel="stylesheet" href="{{ asset('/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />

    <link rel="stylesheet" href="{{ asset('/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('/vendor/libs/node-waves/node-waves.css') }}" />

    <link rel="stylesheet" href="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/libs/typeahead-js/typeahead.css') }}" />

    <!-- Page CSS -->

      <nav
  class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
  id="layout-navbar">

  <div class="d-flex align-items-center">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none">
      <img src="{{ asset('/img/logo.png') }}" alt="Logo" width="32" height="32" class="me-2" />
      <span class="fw-bold fs-5">PMR X-School</span>
    </a>
  </div>

  <div class="ms-auto d-flex align-items-center gap-2">
    <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Daftar</a>
    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Login</a>
  </div>
</nav>
    <body class="bg-gradient-to-r from-purple-100 via-pink-100 to-yellow-100 min-h-screen flex flex-col">

  <!-- Navbar sudah ada sebelumnya -->

  <div class="container mx-auto mt-8 px-4">
    <h1 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-6">Selamat Datang di PMR X-School</h1>
    <p class="text-center text-gray-600 mb-8">
      Belum memiliki akun? Daftar sekarang untuk menikmati semua fitur kami!
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      
      <!-- Card 1 -->
      <div class="bg-white rounded-2xl shadow-lg p-5 hover:shadow-xl transition duration-300">
        <div class="text-gray-600 font-bold text-md mb-2">Tentang PMR</div>
        <h5 class="text-gray-800 text-md mb-2">Pelayanan Kesehatan Sekolah</h5>
        <p class="text-gray-600 mb-3">
          PMR X-School adalah unit kegiatan yang fokus pada pelayanan kesehatan di lingkungan sekolah. 
          Kami menyediakan pertolongan pertama, edukasi kesehatan, dan kegiatan sosial untuk meningkatkan 
          kesadaran siswa tentang kesehatan dan keselamatan. Anggota PMR juga dilatih untuk tanggap dalam 
          keadaan darurat dan kegiatan sosial kemanusiaan.        </p>
      </div>
  </div>

</body>


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset('/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('/js/main.js') }}"></script>

    <!-- Page JS -->
  </body>
</html>

