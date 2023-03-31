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
                  <div class="card">
                    <div class="card-body">
                      <table>
                        <tr>
                        <td>Id</td>
                        <td>title</td>
                        <td>location</td>
                        <td>price</td>
                        <td>created_at</td>
                        </tr>
                      </table>
                    </div>
                    @foreach($properties as $property)

                    <tr>
                    <td>{{$properties['id']}}</td>
                    <td>{{$properties['title']}}</td>
                    <td>{{$properties['location']}}</td>
                    <td>{{$properties['price']}}</td>
                    <td>{{$properties['created_at']}}</td>
                    </tr>
                    @endforeach
                  </div>


              {{-- <div class="row">
                <div class="col-lg-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Area chart</h4>
                      <canvas id="areaChart"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Doughnut chart</h4>
                      <canvas id="doughnutChart"></canvas>
                    </div>
                  </div>
                </div>
              </div> --}}
              {{-- <div class="row">
                <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Pie chart</h4>
                      <canvas id="pieChart"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 grid-margin grid-margin-lg-0 stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Scatter chart</h4>
                      <canvas id="scatterChart"></canvas>
                    </div>
                  </div>
                </div>
      </div> --}}
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

