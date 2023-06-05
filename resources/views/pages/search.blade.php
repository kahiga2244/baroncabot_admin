@extends('layouts.app')
@section('title','Dashboard')
@section('content')

            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Property</h4>
                <br>
                <p class="card-description">
                  Details <code> per property</code>
                </p>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>
                          Property
                        </th>
                        <th>
                          Price
                        </th>
                        <th>
                          Location
                        </th>
                        <th>
                          Status
                        </th>
                        <th>
                          Owner
                        </th>
                        <th>
                           Published On
                        </th>
                      </tr>
                    </thead>
                     @if(count($results) > 0)
                    <tbody>
                     @foreach($results as $result)
                      <tr>
                        {{-- <td class="py-1">
                          <img src="../../images/faces/face1.jpg" alt="image"/>
                        </td> --}}
                        <td>
                           {{ $result->title }}
                        </td>
                        <td>
                          $ {{ $result->price }}
                        </td>
                        <td>
                          {{ $result ->location }}
                        </td>
                        <td class="align-middle review fs-0 text-center ps-4">
                           <span class="badge badge-success">On Sale</span>
                        </td>
                        <td class="vendor align-middle text-start fw-semi-bold ps-4">
                           @if($result->upload_type == 'Admin')
                              <a href="#">Admin</a>
                           @else

                           @endif
                        </td>
                        <td class="time align-middle white-space-nowrap text-600 ps-4">{!! date('F jS, Y', strtotime($result->created_at)) !!}</td>
                         <td><a href="{!! route('property.edit',$result->property_code) !!}"><button type="button" class="btn btn-info">Edit</button></a></td>
                        <td><a class="dropdown-item text-danger" href="#!"><button type="button" class="btn btn-danger">Remove</button></a></td>
                         {{-- <td class="align-middle white-space-nowrap text-end pe-0 ps-4"> --}}
                           {{-- <div class="position-relative">
                              <div class="hover-actions">
                                 <button class="btn btn-sm btn-phoenix-secondary me-1 fs--2"><span class="fas fa-check"></span></button>
                                 <button class="btn btn-sm btn-phoenix-secondary fs--2"><span class="fas fa-trash"></span></button></div>
                           </div> --}}
                           {{-- <div class="font-sans-serif btn-reveal-trigger position-static">
                              <button class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs--2" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2"></span></button>
                              <div class="dropdown-menu dropdown-menu-end py-2">
                                 <a class="dropdown-item" href="{!! route('property.edit',$result->property_code) !!}">Edit</a>
                                 <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
                              </div>
                           </div> 
                           </td>--}}
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