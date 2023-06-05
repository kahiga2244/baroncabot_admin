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
          {{-- <div class="row">
            <a class="nav-link" href="{{ url('users-table')}}">
            <button class="btn btn-outline-dark btn-icon-text" >
            <i class="mdi mdi-signal text-info mdi-36px"></i>
            <span class="d-inline-block text-left">
               <small class="font-weight-light d-block">{{count($uD->introducer)}}</small>
               introducers
            </span>
            </button>
         </a>
          </div> --}}
<div class="row">
   <div class="col grid-margin stretch-card">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">Relationship </h4>
            <p class="card-description">
            between Businesses <code> & Users</code>
            </p>
            <div class="table-responsive">
            <table class="table table-hover">
               <thead>
                  <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Company</th>
                  <th>Roles</th>
                  {{-- <th>introducer</th> --}}
                  </tr>
               </thead>
               <tbody>

                 @foreach ($users as $uD)
                  <tr>
                  <td>{{$uD->id}}</td>
                  <td>{{$uD->name}}</td>
                  <td>{{$uD->name}}</td>
                  <td>{{$uD->role}}</td>
                  {{-- <td>{{$uD->introducer}}</td> --}}
                  </tr>
                  @endforeach
               </tbody>
            </table>
            {{-- {{$users ?? ''->links()}} --}}


            </div>
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
