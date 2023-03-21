<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
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
            <div class="content">
               @yield('content')
            </div>


      @include('partials._javaScripts')
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script>
   var navbarTopShape = localStorage.getItem('phoenixNavbarTopShape');
   var navbarPosition = localStorage.getItem('phoenixNavbarPosition');
   var body = document.querySelector('body');
   var navbarDefault = document.querySelector('#navbarDefault');
   var navbarTopNew = document.querySelector('#navbarTopNew');
   var navbarSlim = document.querySelector('#navbarSlim');
   var navbarTopSlimNew = document.querySelector('#navbarTopSlimNew');

   var documentElement = document.documentElement;
   var navbarVertical = document.querySelector('.navbar-vertical');

   if (navbarTopShape === 'slim' && navbarPosition === 'vertical') {
      navbarDefault.remove();
      navbarTopNew.remove();
      navbarTopSlimNew.remove();
      navbarSlim.style.display = 'block';
      navbarVertical.style.display = 'inline-block';
      body.classList.add('nav-slim');
   } else if (navbarTopShape === 'slim' && navbarPosition === 'horizontal') {
      navbarDefault.remove();
      navbarVertical.remove();
      navbarTopNew.remove();
      navbarSlim.remove();
      navbarTopSlimNew.removeAttribute('style');
      body.classList.add('nav-slim');
   } else if (navbarTopShape === 'default' && navbarPosition === 'horizontal') {
      navbarDefault.remove();
      navbarSlim.remove();
      navbarVertical.remove();
      navbarTopSlimNew.remove();
      navbarTopNew.removeAttribute('style');
      documentElement.classList.add('navbar-horizontal')

   } else {
      body.classList.remove('nav-slim');
      navbarSlim.remove();
      navbarTopNew.remove();
      navbarTopSlimNew.remove();
      navbarDefault.removeAttribute('style');
      navbarVertical.removeAttribute('style');
   }

   var navbarTopStyle = localStorage.getItem('phoenixNavbarTopStyle');
   var navbarTop = document.querySelector('.navbar-top');
   if (navbarTopStyle === 'darker') {
      navbarTop.classList.add('navbar-darker');
   }

   var navbarVerticalStyle = localStorage.getItem('phoenixNavbarVerticalStyle');
   var navbarVertical = document.querySelector('.navbar-vertical');
   if (navbarVerticalStyle === 'darker') {
      navbarVertical.classList.add('navbar-darker');
   }
</script>
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
