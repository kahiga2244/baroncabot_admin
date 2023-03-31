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
          <div>
            <tbody>
               @foreach ((array)$projects as $property)
               <tr>
                  <td>{{$property['id']}}</td>
                  <td>{{$property['location']}}</td>
               </tr>
            </tbody>
            @endforeach
          </div>
          <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Latest Properties</h4>
                  <p class="card-description">
                    Recently Added <code>.table</code>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Property</th>
                          <th>Price</th>
                          <th>Published On</th>
                          <th>Location</th>

                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Peter</td>
                          <td>53275534</td>
                          <td>16 May 2017</td>
                          <td><label class="badge badge-success">Completed</label></td>
                        </tr>
                        <tr>
                          <td>Dave</td>
                          <td>53275535</td>
                          <td>20 May 2017</td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Latest Businesses</h4>
                  <p class="card-description">
                   Recent Business <code>.table-hover</code>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Businesses</th>
                          <th>Email</th>
                          <th>Status</th>
                          <th>Joined On</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>Peter</td>
                          <td>After effects</td>
                          <td class="text-success"> 82.00% <i class="mdi mdi-arrow-up"></i></td>
                          <td><label class="badge badge-success">Completed</label></td>
                        </tr>
                        <tr>
                          <td>Dave</td>
                          <td>53275535</td>
                          <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                          <td><label class="badge badge-warning">In progress</label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

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
