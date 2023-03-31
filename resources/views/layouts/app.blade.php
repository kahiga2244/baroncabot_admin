 <!DOCTYPE html>
            <html lang="en">

            <head>
              <!-- Required meta tags -->
              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
              <title>baron & cabot</title>
              <!-- base:css -->
              <link rel="stylesheet" href="{{ asset('asset1/vendors/mdi/css/materialdesignicons.min.css') }}">
              <link rel="stylesheet" href="{{ asset('asset1/vendors/css/vendor.bundle.base.css') }}">
              <!-- endinject -->
              <!-- plugin css for this page -->
              <!-- End plugin css for this page -->
              <!-- inject:css -->
              <link rel="stylesheet" href="{{ asset('asset1/css/style.css') }}">
              <link rel="stylesheet" type="text/css" href="{!! asset('assets/fonts/fontawesome/css/all.min.css') !!}">
              <link href="{!! asset('assets/css/custom.css') !!}" type="text/css" rel="stylesheet">
              <script src="{!! asset('assets/vendors/imagesloaded/imagesloaded.pkgd.min.js') !!}"></script>
              <script src="{!! asset('assets/vendors/simplebar/simplebar.min.js') !!}"></script>
              <script src="{!! asset('assets/js/config.js') !!}"></script>

   <!-- ===============================================-->
   <!--    Stylesheets-->
   <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
   {{--<link href="{!! asset('assets/vendors/simplebar/simplebar.min.css') !!}" rel="stylesheet">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
   <link href="{!! asset('assets/css/theme.min.css') !!}" type="text/css" rel="stylesheet" id="style-default">
   <link href="{!! asset('assets/css/user.min.css') !!}" type="text/css" rel="stylesheet" id="user-style-default">
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> --}}

   <link rel="stylesheet" type="text/css" href="{!! asset('assets/fonts/fontawesome/css/all.min.css') !!}">
   <link href="{!! asset('assets/css/custom.css') !!}" type="text/css" rel="stylesheet">
   <link href="{!! asset('assets/vendors/choices/choices.min.css') !!}" rel="stylesheet" />

   @livewireStyles
              <!-- endinject -->
              <link rel="shortcut icon" href="{{ asset('asset1/images/android-icon-48x48.png') }}" />
            </head>
            @include('partials.head1')
<body>
  <div class="container-scroller d-flex">
    <!-- partial:./partials/_sidebar.html -->
    @include('partials._sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      @include('partials._navbar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
                  <!-- partial -->
                     <div class="row">
                        <div class="content">
                           @yield('content')
                        </div>
                     </div>
                    </div>
                    <!-- content-wrapper ends -->
                    <!-- partial:./partials/_footer.html -->

                    <!-- partial -->
                  </div>
                  <!-- main-panel ends -->
                </div>
                <!-- page-body-wrapper ends -->
              </div>
              <!-- container-scroller -->

              <!-- base:js -->
              <script src="{{ asset('asset1/vendors/js/vendor.bundle.base.js') }}"></script>
              <!-- endinject -->
              <!-- Plugin js for this page-->
              <script src="{{ asset('asset1/vendors//chart.js/Chart.min.js') }}"></script>
              <!-- End plugin js for this page-->
              <!-- inject:js -->
              <script src="{{ asset('asset1/vendors/js/off-canvas.js') }}"></script>
              <script src="{{ asset('asset1/vendors/js/hoverable-collapse.js') }}"></script>
              <script src="{{ asset('asset1/vendors/js/template.js') }}"></script>
              <!-- endinject -->
              <!-- plugin js for this page -->
              <!-- End plugin js for this page -->
              <!-- Custom js for this page-->
              <script src="{{ asset('asset1/vendors/js/dashboard.js') }}"></script>
              <!-- End custom js for this page-->
            </body>

            </html>
