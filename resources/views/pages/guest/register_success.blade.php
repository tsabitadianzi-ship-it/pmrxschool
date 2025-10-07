<!doctype html>
<html
  lang="id"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('/') }}"
  data-template="vertical-menu-template"
  data-style="light">
<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Registrasi Berhasil - PMR X-SCHOOL</title>

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon/favicon.ico') }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
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
  <link rel="stylesheet" href="{{ asset('/vendor/css/pages/page-auth.css') }}" />
</head>

<body style="background: url('{{ asset('/img/favicon/wall3.png') }}') no-repeat center center fixed; background-size: cover;">  <!-- Content -->
  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-6">
        <!-- Register Success -->
        <div class="card">
          <div class="card-body text-center">

            <!-- Logo -->
            <div class="app-brand justify-content-center mb-6">
              <a href="#" class="app-brand-link">
                <span class="app-brand-logo demo">
                  <i class="ti ti-checks" style="font-size: 3rem; color: #4b9669ff"></i>
                </span>
              </a>
            </div>
            <!-- /Logo -->

            <h3 class="fw-bold text-success mb-3">Registrasi Berhasil 
            </h3>
            <p class="mb-1">Akun Anda berhasil dibuat dengan status <b>Pending</b>.</p>
            <p class="mb-4">Silakan tunggu persetujuan dari pembina sebelum bisa login.</p>

            <a href="{{ route('login') }}" class="btn d-grid w-100" style="background-color: #4b9669ff; color: white;">
              Kembali ke Halaman Login
            </a>

          </div>
        </div>
        <!-- /Register Success -->
      </div>
    </div>
  </div>
  <!-- / Content -->

  <!-- Core JS -->
  <script src="{{ asset('/vendor/libs/jquery/jquery.js') }}"></script>
  <script src="{{ asset('/vendor/libs/popper/popper.js') }}"></script>
  <script src="{{ asset('/vendor/js/bootstrap.js') }}"></script>
  <script src="{{ asset('/vendor/libs/node-waves/node-waves.js') }}"></script>
  <script src="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
  <script src="{{ asset('/vendor/libs/hammer/hammer.js') }}"></script>
  <script src="{{ asset('/vendor/libs/i18n/i18n.js') }}"></script>
  <script src="{{ asset('/vendor/libs/typeahead-js/typeahead.js') }}"></script>
  <script src="{{ asset('/vendor/js/menu.js') }}"></script>

  <!-- Main JS -->
  <script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>
