<!doctype html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ ('/') }}"
  data-template="vertical-menu-template"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>PMR X-SCHOOL</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href=" {{ asset('/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href=" {{ asset('/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href=" {{ asset('/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href=" {{ asset('/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->

    <link rel="stylesheet" href=" {{ asset('/vendor/css/rtl/core.css" class="template-customizer-core-') }}" />
    <link rel="stylesheet" href=" {{ asset('/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css') }}" />

    <link rel="stylesheet" href=" {{ asset('/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href=" {{ asset('/vendor/libs/node-waves/node-waves.css') }}" />

    <link rel="stylesheet" href=" {{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href=" {{ asset('/vendor/libs/typeahead-js/typeahead.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src=" {{ asset('/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src=" {{ asset('/vendor/js/template-customizer.js') }}"></script>

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src=" {{ asset('/js/config.js') }}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-fluid navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="navbar-wrapper d-flex align-items-center justify-content-between w-100" style="max-width:1320px;margin:0 auto;">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="ti ti-menu-2 ti-md"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
             
              <ul class="navbar-nav flex-row align-items-center ms-auto">
              </ul>
            </div>

            <!-- Search Small Screens -->
            <div class="navbar-search-wrapper search-input-wrapper d-none">
              <input
                type="text"
                class="form-control search-input border-0"
                placeholder="Search..."
                aria-label="Search..." />
              <i class="ti ti-x search-toggler cursor-pointer"></i>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <!-- Collapse -->
              <h5>Collapse</h5>
              <div class="row">
                <div class="col-12">
                  <div class="card mb-6">
                    <h5 class="card-header">Basic</h5>
                    <div class="card-body">
                      <p class="card-text">
                        Toggle the visibility of content across your project with a few classes and our JavaScript
                        plugins.
                      </p>
                      <p class="demo-inline-spacing">
                        <a
                          class="btn btn-primary me-1"
                          data-bs-toggle="collapse"
                          href="#collapseExample"
                          role="button"
                          aria-expanded="false"
                          aria-controls="collapseExample">
                          Link with href
                        </a>
                        <button
                          class="btn btn-primary me-1"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#collapseExample"
                          aria-expanded="false"
                          aria-controls="collapseExample">
                          Button with data-bs-target
                        </button>
                      </p>
                      <div class="collapse" id="collapseExample">
                        <div class="d-grid d-sm-flex p-4 border">
                          <img
                            src=" {{ asset('/img/elements/1.jpg') }}"
                            alt="collapse-image"
                            height="125"
                            class="me-6 mb-sm-0 mb-2" />
                          <span>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.It is a long established fact that a reader will be distracted by
                            the readable content of a page when looking at its layout. The point of using Lorem Ipsum is
                            that it has a more-or-less normal distribution of letters.
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="card">
                    <h5 class="card-header">Multiple targets</h5>
                    <div class="card-body">
                      <p class="card-text">Show and hide multiple elements by referencing them with a selector.</p>

                      <p class="demo-inline-spacing">
                        <a
                          class="btn btn-primary me-1"
                          data-bs-toggle="collapse"
                          href="#multiCollapseExample1"
                          role="button"
                          aria-expanded="false"
                          aria-controls="multiCollapseExample1"
                          >Toggle first element</a
                        >
                        <button
                          class="btn btn-primary me-1"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#multiCollapseExample2"
                          aria-expanded="false"
                          aria-controls="multiCollapseExample2">
                          Toggle second element
                        </button>
                        <button
                          class="btn btn-primary me-1"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target=".multi-collapse"
                          aria-expanded="false"
                          aria-controls="multiCollapseExample1 multiCollapseExample2">
                          Toggle both elements
                        </button>
                      </p>
                      <div class="row">
                        <div class="col-12 col-md-6 mb-2 mb-md-0">
                          <div class="collapse multi-collapse" id="multiCollapseExample1">
                            <div class="d-grid d-sm-flex p-4 border">
                              <img
                                src=" {{ asset('/img/elements/2.jpg') }}"
                                alt="collapse-image"
                                height="125"
                                class="me-6 mb-sm-0 mb-2" />
                              <span>
                                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as
                                necessary, making this the first true generator on the Internet. It uses a dictionary of
                                over 200 Latin words, combined with a handful of model sentence structures, to generate
                                Lorem Ipsum which looks reasonable.
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="col-12 col-md-6">
                          <div class="collapse multi-collapse" id="multiCollapseExample2">
                            <div class="d-grid d-sm-flex p-4 border">
                              <img
                                src=" {{ asset('/img/elements/3.jpg') }}"
                                alt="collapse-image"
                                height="125"
                                class="me-6 mb-sm-0 mb-2" />
                              <span>
                                There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour, or randomised words which don't
                                look even slightly believable. If you are going to use a passage of Lorem Ipsum.
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                  <div class="text-body">
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="footer-link">Pixinvent</a>
                  </div>
                  <div class="d-none d-lg-inline-block">
                    <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank"
                      >License</a
                    >
                    <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4"
                      >More Themes</a
                    >

                    <a
                      href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/"
                      target="_blank"
                      class="footer-link me-4"
                      >Documentation</a
                    >

                    <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block"
                      >Support</a
                    >
                  </div>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>

      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src=" {{ asset('/vendor/libs/jquery/jquery.js') }}"></script>
    <script src=" {{ asset('/vendor/libs/popper/popper.js') }}"></script>
    <script src=" {{ asset('/vendor/js/bootstrap.js') }}"></script>
    <script src=" {{ asset('/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src=" {{ asset('/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src=" {{ asset('/vendor/libs/hammer/hammer.js') }}"></script>
    <script src=" {{ asset('/vendor/libs/i18n/i18n.js') }}"></script>
    <script src=" {{ asset('/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src=" {{ asset('/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src=" {{ asset('/js/main.js') }}"></script>

    <!-- Page JS -->
  </body>
</html>
