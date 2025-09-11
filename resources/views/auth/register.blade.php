<!doctype html>

<html
  lang="en"
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

    <title>Register PMR X-SCHOOL</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon/favicon.ico') }}" />

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
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('/vendor/libs/@form-validation/form-validation.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('/vendor/css/pages/page-auth.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('/vendor/js/template-customizer.js') }}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="row justify-content-center py-5">
        <div class="col-md-7">
            <div class="card card-body">
                <h5 class="mb-0 fw-bold text-center">
                    HALAMAN FORM REGISTER
                </h5>
                <H6 class="mb-0 fw-bold text-center"> 
                    PMR X-SCHOOL </H6>
                <hr />

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    {{-- Nama & NIS --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nama_lengkap" class="form-label">Nama :</label>
                                <input type="text" name="nama_lengkap" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nis_k" class="form-label">NIS :</label>
                                <input type="text" name="nis_k" class="form-control" required>
                            </div>
                        </div>

                        {{-- Tanggal Lahir & Nomor Telepon --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir :</label>
                                <input type="date" name="tanggal_lahir" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="no_telp" class="form-label">Nomor Telepon :</label>
                                <input type="text" name="no_telp" class="form-control" required>
                            </div>
                        </div>

                        {{-- Kelas & Jenis Kelamin --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="kelas" class="form-label">Kelas :</label>
                                <input type="text" name="kelas" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin :</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        {{-- Alamat (full lebar, agak panjang) --}}
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat :</label>
                            <textarea name="alamat" rows="3" class="form-control" required></textarea>
                        </div>

                        {{-- Alasan (full lebar) --}}
                        <div class="mb-3">
                            <label for="alasan" class="form-label">Alasan Bergabung Ekstrakulikuler PMR : </label>
                            <textarea name="alasan" rows="3" class="form-control" required></textarea>
                        </div>

                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">
                            <span class="ti ti-send me-2"></span>
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset('/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('/vendor/libs/popper/popper.') }}"></script>
    <script src="{{ asset('/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('/vendor/libs/@form-validation/auto-focus.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('/js/pages-auth.js') }}"></script>
  </body>
</html>
