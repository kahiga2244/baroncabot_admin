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

          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">{{ __('Register') }}</h4>

                <form class="forms-sample" method="post" action="{{ route('pages.adduser')}}">
                  @csrf
                  @{{method_field('POST')}}
                  <div class="form-group">
                    <label for="exampleInputName1">{{ __('Name') }}</label>
                    <input type="text" class="form-control" name= "name" id="exampleInputName1" value="{{ old('name') }}" placeholder="name" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail3">{{ __('Email Address') }}</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                  </div>

                  {{-- <div class="form-group">
                    <label for="exampleInputPassword4">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                  </div>
                  <div class="form-group">
                     <label for="exampleInputPassword4">Confirm Password</label>
                     <input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
                   </div> --}}
                  {{-- <div class="form-group">
                    <label for="exampleSelectGender">Role</label>
                      <select class="form-control" id="exampleSelectGender">
                        <option>Admin</option>
                        <option>Agent</option>
                        <option>Customer</option>
                      </select>
                    </div> --}}
                    <div class="form-group">
                     <label for="exampleSelectGender">Gender</label>
                       <select class="form-control" id="exampleSelectGender">
                         <option>Male</option>
                         <option>Female</option>
                       </select>
                     </div>
                  <button type="submit" class="btn btn-primary mr-2">{{ __('Add User') }}</button>
                </form>
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
