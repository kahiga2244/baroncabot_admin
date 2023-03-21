
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
          <!-- row end -->
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-facebook d-flex align-items-center">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-city text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                     <h4 class="text-white font-weight-bold">{!! number_format($projects) !!}&nbsp;<span class="fs-1 fw-semi-bold text-900 ms-2">Projects</span></h4>
                     <p class="mt-2 text-white card-text text-800 fs--1 mb-0">Total Projects</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-google d-flex align-items-center">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-office-building text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                     <h4 class="text-white font-weight-bold">{!! number_format($units) !!}&nbsp;<span class="fs-1 fw-semi-bold text-900 ms-2">Units</span></h4>
                     <p class="mt-2 text-white card-text text-800 fs--1 mb-0">Total Units</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-twitter d-flex align-items-center">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-calendar-check text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                     <h4 class="text-white font-weight-bold">{!! $reserves->count() !!}&nbsp;<span class="fs-1 fw-semi-bold text-900 ms-2">Reserved</span></h4>
                     <p class="mt-2 text-white card-text text-800 fs--1 mb-0">Total Reserved units</p>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
               <div class="card bg-facebook d-flex align-items-center">
                 <div class="card-body py-5">
                   <div
                     class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                     <i class="mdi mdi-coin text-white icon-lg"></i>
                     {{-- <span class="fs-4 far fa-city text-primary-500"></span> --}}
                     <div class="ml-3 ml-md-0 ml-xl-3">
                        <h4 class="text-white font-weight-bold">{!! number_format($sold) !!}&nbsp;<span class="fs-1 fw-semi-bold text-900 ms-2">Sold</span></h4>
                        <p class="mt-2 text-white card-text text-800 fs--1 mb-0">Total units sold</p>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
          </div>
          <!-- row end -->
        </div>
        <!-- content-wrapper ends -->
        {{-- <!-- partial:./partials/_footer.html -->
        <footer class="footer">
          <div class="card">
            <div class="card-body">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © baron & cabot 2023</span>
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Distributed By: <a href="https://www.themewagon.com/" target="_blank">ThemeWagon</a></span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard templates</a> from Bootstrapdash.com</span>
              </div>
            </div>
          </div>
        </footer> --}}
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="asset1/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="asset1/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="asset1/js/off-canvas.js"></script>
  <script src="asset1/js/hoverable-collapse.js"></script>
  <script src="asset1/js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="asset1/js/dashboard.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
