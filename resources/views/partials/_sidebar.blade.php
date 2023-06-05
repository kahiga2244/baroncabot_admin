<nav class="sidebar sidebar-offcanvas" style="color: #002748;" id="sidebar">
   <ul class="nav">
     <li class="nav-item sidebar-category">
       <p>Navigation</p>
       <span></span>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="{{url('/dashboard')}}">
         <i class="mdi mdi-view-quilt menu-icon"></i>
         <span class="menu-title">Dashboard</span>
         <div class="badge badge-info badge-pill"></div>
       </a>
     </li>
     <li class="nav-item sidebar-category">
       <p>Components</p>
       <span></span>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="{!! route('reservations.index') !!}">
        <i class="mdi mdi-view-headline menu-icon"></i>
        <span class="menu-title">Payment proof</span>
      </a>
    </li>
     <li class="nav-item">
       <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
         <i class="mdi mdi-palette menu-icon"></i>
         <span class="menu-title">Property</span>
         <i class="menu-arrow"></i>
       </a>
       <div class="collapse" id="ui-basic">
         <ul class="nav flex-column sub-menu">
           <li class="nav-item"> <a class="nav-link" href="{!! route('property.index') !!}">All Property</a></li>
           <li class="nav-item"> <a class="nav-link" href="{!! route('property.create') !!}">Add Propery</a></li>
         </ul>
       </div>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="{!! route('property.reserved') !!}">
         <i class="mdi mdi-view-headline menu-icon"></i>
         <span class="menu-title">Reserved</span>
       </a>
     </li>
     {{-- <li class="nav-item">
      <a class="nav-link" href="{!! route('property.deals') !!}">
         <i class="mdi mdi-file-document-box-outline menu-icon"></i>
        <span class="menu-title">Deals</span>
      </a>
    </li> --}}
    {{-- <li class="nav-item sidebar-category">
      <p>Illustrations</p>
      <span></span>

    {{--   <li class="nav-item">
       <a class="nav-link" href="{!! route('charts.table') !!}">
         <i class="mdi mdi-grid-large menu-icon"></i>
         <span class="menu-title">Tables</span>
       </a>
     </li> --}}

     {{-- <li class="nav-item sidebar-category">
       <p>Pages</p>
       <span></span>
     </li> --}}
     {{-- <li class="nav-item">
       <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
         <i class="mdi mdi-account menu-icon"></i>
         <span class="menu-title">User Pages</span>
         <i class="menu-arrow"></i>
       </a>
       <div class="collapse" id="auth">
         <ul class="nav flex-column sub-menu">
           <li class="nav-item"> <a class="nav-link" href="{{ url('/login')}}"> Login </a></li>
           <li class="nav-item"> <a class="nav-link" href="{{ url('/register')}}"> Register </a></li>
           <li class="nav-item"> <a class="nav-link" href="{{ url('/users')}}"> Add User </a></li>
         </ul>
       </div>
     </li> --}}
     <li class="nav-item">
      <a class="nav-link" href="{!! route('page.businesses') !!}">
        <i class="mdi mdi-grid-large menu-icon"></i>
        <span class="menu-title">Business</span>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a class="nav-link" href="{!! route('marketing.index') !!}">
        <i class="mdi mdi-book-plus menu-icon"></i>
        <span class="menu-title">Marketing</span>
      </a>
    </li> --}}
    {{-- <li class="nav-item sidebar-category">
      <p>Comparison</p>
      <span></span>
    </li> --}}
    {{-- <li class="nav-item">
      <a class="nav-link" href="{!! route('comparison.bizUser') !!}">
        <i class="mdi mdi-file-document-box-outline menu-icon"></i>
        <span class="menu-title">Businesses</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{!! route('comparison.reservedCompany') !!}">
        <i class="mdi mdi-file-document-box-outline menu-icon"></i>
        <span class="menu-title">Reserved</span>
      </a>
    </li> --}}
    <li class="nav-item">
      <a class="nav-link" href="{!! route('logout') !!}">
        <button class="btn bg-danger btn-sm menu-title">Logout</button>
      </a>
    </li>
   </ul>
 </nav>
