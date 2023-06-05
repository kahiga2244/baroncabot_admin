@extends('layouts.app')
@section('title','Dashboard')
@section('content')
            
              <div class="card-body">
                <h4 class="card-title">Business</h4>
                <br>
                <p class="card-description">
                  Details <code>per single business</code>
                </p>

                <div class="table-responsive">

                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                           Business
                           </th>
                           <th>
                           Email
                           </th>
                           <th>
                           Phone
                           </th>
                           <th>
                           Status
                           </th>
                           <th>
                           Properties
                           </th>
                           <th>Joined On</th>
                      </tr>
                    </thead>
                     @if(count($results) > 0)
                    <tbody>
                     @foreach($results as $result)
                      <tr>
                        <td>{{ $result->name }}</td>
                        <td>{{ $result->email}}</td>
                        <td>{{ $result->phone_number}}</td>
                        <td class="align-middle review fs-0 text-center ps-4">
                           <span class="badge badge-success">On Sale</span>
                        </td>
                        <td></td>
                        <td class="time align-middle white-space-nowrap text-600 ps-4">{!! date('F jS, Y', strtotime($result->created_at)) !!}</td>
                        <td><a href="{!! route('property.edit',$result->business_code) !!}"><button type="button" class="btn btn-info">Edit</button></a></td>
                        <td><a class="dropdown-item text-danger" href="#!"><button type="button" class="btn btn-danger">Remove</button></a></td>
                        <td></td>
                     </tr>
                      @endforeach
                    </tbody>
                    @else
                    <p>No results found.</p>
                    @endif
                  </table>
                </div>
              </div>
            </div>
          
          <!-- row end -->
         {{-- <div class="row">
            @if(count($results) > 0)
            <ul>
                @foreach($results as $result)
                    <li>{{ $result->title }} - {{ $result->location }}</li>
                @endforeach
            </ul>
        @else
            <p>No results found.</p>
        @endif
         </div> --}}

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
@endsection