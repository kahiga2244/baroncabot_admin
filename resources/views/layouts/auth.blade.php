
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
   @include('partials._head')

   <body>
      <!-- ===============================================-->
      <!--    Main Content-->
      <!-- ===============================================-->
     @yield('content')
      <!-- ===============================================-->
      <!--    End of Main Content-->
      <!-- ===============================================-->
      @include('partials._javaScripts')
   </body>
</html>
