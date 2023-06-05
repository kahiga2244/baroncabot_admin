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
         <div class="container mt-2">
            <div class="row">
               <div class="col-lg-12 margin-tb">

                  <div class="pull-right mb-2">
                     <a class="btn btn-success" href="{{ route('users.create') }}"> Create User</a>
                  </div>
               </div>
            </div>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
               <p>{{ $message }}</p>
            </div>
            @endif
            <table class="table table-bordered">
            <tr>
               <th>S.No</th>
               <th>Name</th>
               <th>Email</th>
               <th width="280px">Action</th>
            </tr>
            @foreach ($users as $user)
            <tr>
               <td>{{ $user->id }}</td>
               <td>{{ $user->name }}</td>
               <td>{{ $user->email }}</td>
               <td>
                  <form action="{{ route('users.destroy',$user->id) }}" method="Post">
                  <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}">Edit</a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
               </td>
            </tr>
            @endforeach
            </table>
{!! $users->render() !!}

{{-- <div class="col-lg-12 grid-margin stretch-card">
   <div class="card">
     <div class="card-body">
       <p class="card-description">
         <a class="btn btn-success" href="{{ route('users.create') }}"> Create User</a>
       </p>
       <div class="table-responsive">
         <table class="table table-striped">
           <thead>
             <tr>
               <th>
                 S.No
               </th>
               <th>
                 Name
               </th>
               <th>
                 Email
               </th>
               <th>
                 Password
               </th>
               <th>
                 Action
               </th>
             </tr>
           </thead>
           <tbody>
             <tr>
               <td class="py-1">
                  {{ $user->id }}
               </td>
               <td>
                  {{ $user->name }}
               </td>
               <td>
                 {{ $user->email }}
               </td>
               <td>
                  {{ $user->password }}
               </td>
               <td>
                  <form action="{{ route('users.destroy',$user->id) }}" method="Post">
                     <a class="btn btn-primary btn-sm" href="{{ route('users.edit',$user->id) }}">Edit</a>
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                     </form>
                  </td>
               </td>
             </tr>
             <tr>
               <td class="py-1">
                 <img src="../../images/faces/face2.jpg" alt="image"/>
               </td>
               <td>
                 Messsy Adam
               </td>
               <td>
                 <div class="progress">
                   <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                 </div>
               </td>
               <td>
                 $245.30
               </td>
               <td>
                 July 1, 2015
               </td>
             </tr>
             <tr>
               <td class="py-1">
                 <img src="../../images/faces/face3.jpg" alt="image"/>
               </td>
               <td>
                 John Richards
               </td>
               <td>
                 <div class="progress">
                   <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                 </div>
               </td>
               <td>
                 $138.00
               </td>
               <td>
                 Apr 12, 2015
               </td>
             </tr>
             <tr>
               <td class="py-1">
                 <img src="../../images/faces/face4.jpg" alt="image"/>
               </td>
               <td>
                 Peter Meggik
               </td>
               <td>
                 <div class="progress">
                   <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                 </div>
               </td>
               <td>
                 $ 77.99
               </td>
               <td>
                 May 15, 2015
               </td>
             </tr>
             <tr>
               <td class="py-1">
                 <img src="../../images/faces/face5.jpg" alt="image"/>
               </td>
               <td>
                 Edward
               </td>
               <td>
                 <div class="progress">
                   <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                 </div>
               </td>
               <td>
                 $ 160.25
               </td>
               <td>
                 May 03, 2015
               </td>
             </tr>
             <tr>
               <td class="py-1">
                 <img src="../../images/faces/face6.jpg" alt="image"/>
               </td>
               <td>
                 John Doe
               </td>
               <td>
                 <div class="progress">
                   <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                 </div>
               </td>
               <td>
                 $ 123.21
               </td>
               <td>
                 April 05, 2015
               </td>
             </tr>
             <tr>
               <td class="py-1">
                 <img src="../../images/faces/face7.jpg" alt="image"/>
               </td>
               <td>
                 Henry Tom
               </td>
               <td>
                 <div class="progress">
                   <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                 </div>
               </td>
               <td>
                 $ 150.00
               </td>
               <td>
                 June 16, 2015
               </td>
             </tr>
           </tbody>
         </table>
       </div>
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
