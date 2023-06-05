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
            <div class="col-lg-12 grid-margin stretch-card">
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
                          <th>Title</th>
                          <th>Property Type</th>
                          <th>Price</th>
                          <th>Location</th>
                          <th>Payment Plan</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($properties as $property)
                        <tr>
                           <td>{{$property->title}}</td>
                           <td>{{$property->property_type}}</td>
                           <td>{{$property->price}}</td>
                           <td>{{$property->location}}</td>
                           <td>{{$property->payment_plan}}</td>
                        </tr>

                     </tbody>
                     @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div>
            {{-- <div class="col-lg-6 grid-margin stretch-card">
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
                          <th>Name</th>
                          <th>Email</th>
                          <th>Created_at</th>
                          <th>Update_at</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($businesses ?? '' as $business)
                        <tr>
                           <td>{{$business->name}}</td>
                           <td>{{$business->email}}</td>
                           <td>{{$business->created_at}}</td>
                           <td>{{$business->updated_at}}</td>
                        </tr>

                     </tbody>
                     @endforeach
                    </table>
                  </div>
                </div>
              </div>
            </div> --}}
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
