<!doctype html>
<html lang="en"
  class="light-style"
  data-theme="theme-default"
  data-assets-path="{{ asset('/') }}"
  data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') | PMR X-SCHOOL</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon/logob.png') }}" />

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/demo.css') }}" />

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('/vendor/libs/node-waves/node-waves.css') }}" />

    <!-- Theme Config (WAJIB) -->
    <script src="{{ asset('/js/config.js') }}"></script>

    <style>
        /* Supaya navbar & content full-width tanpa sidebar */
        .layout-wrapper {
            display: block !important;
        }
        #layout-navbar {
            margin-left: 0 !important;
            width: 100% !important;
        }
        .container-xxl.flex-grow-1 {
            margin-left: 0 !important;
            width: 100% !important;
        }
    </style>

    @stack('styles')
</head>

<body>
<div class="layout-wrapper">

    {{-- Navbar Full Width --}}
    @include('layouts.inc.navbar')

    {{-- Main Content Full Width --}}
    <div class="container-xxl flex-grow-1 container-p-y">
        @yield('content')
    </div>

</div>

<!-- Core JS -->
<script src="{{ asset('/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('/vendor/js/menu.js') }}"></script>
<script src="{{ asset('/js/main.js') }}"></script>

@stack('scripts')
</body>
</html>
