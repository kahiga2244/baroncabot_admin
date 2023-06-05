@extends('layouts.app')
@section('title','Dashboard')
@section('content')
   @include('partials._messages')
     <!-- partial -->
     <div class="card-body">
      <h4 class="card-title">Reserved <br>&nbsp;<code>per single reserved unit</code></h4>   
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>
                 Unit
                 </th>
                 <th>
                 Client
                 </th>
                 <th>
                 Floor
                 </th>
                 <th>
                 Price Floor
                 </th>
                 <th>
                 Reserved Date
                 </th>
                 <th>Due Date</th>
                 <th>status</th>
                 <th>Reserved By</th>

            </tr>
          </thead>
           @if(count($results) > 0)
          <tbody>
           @foreach($results as $count=>$result)
            <tr>

              <td>{!! $result->buyer_title !!}</td>
              {{-- <td>
                 <a href="{!! route('property.reserved.details',$result->reserve_code) !!}">
                    <h5 class="">{!! $result->title !!}</h5>
                    @php
                       $parent = Property::property_info($result->propertyCode)->getData();
                    @endphp
                    <small class="text-muted">{!! $parent->property->title !!}</small>
                 </a>
              </td> --}}
              <td></td>
              <td>
                 {!! $result->buyer_name !!}<br>
                 {{-- {!! $result->buyer_telephone !!}<br>
                 {!! $result->buyer_email !!} --}}
              </td>
              <td>{!! $result->floor !!}</td>
              <td>{{ $result->price }}</td>

              <td>
                 {!! date('F jS, Y', strtotime($result->reservation_date)) !!}
              </td>
              <td>
                 {!! date('F jS, Y', strtotime($result->reservation_due_date)) !!}
              </td>

              <td>
                 @if($result->status == 'Reserved')
                    <span class="badge badge-phoenix badge-phoenix-success">Reserved</span>
                 @else
                    <span class="badge badge-phoenix badge-phoenix-warning">Waiting Approval</span>
                 @endif
              </td>
              <td>{!! $result->mortgage_company_name !!}</td>
              <td> {!! $result->name !!}</td>

              <td><a class="dropdown-item " href="{!! route('property.reserved.details',$result->reserve_code) !!}"><button type="button" class="btn btn-info">view</button></a></td>
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