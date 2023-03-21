<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <!-- ===============================================-->
   <!--    Document Title-->
   <!-- ===============================================-->
   <title>@yield('title')</title>

   <!-- ===============================================-->
   <!--    Favicons-->
   <!-- ===============================================-->
   <meta name="msapplication-TileImage" content="{!! asset('assets/img/favicons/mstile-150x150.png') !!}">
   <meta name="theme-color" content="#ffffff">
   <script src="{!! asset('assets/vendors/imagesloaded/imagesloaded.pkgd.min.js') !!}"></script>
   <script src="{!! asset('assets/vendors/simplebar/simplebar.min.js') !!}"></script>
   <script src="{!! asset('assets/js/config.js') !!}"></script>

   <!-- ===============================================-->
   <!--    Stylesheets-->
   <!-- ===============================================-->
   <link rel="preconnect" href="https://fonts.googleapis.com/">
   <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
   <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
   <link href="{!! asset('assets/vendors/simplebar/simplebar.min.css') !!}" rel="stylesheet">
   <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
   <link href="{!! asset('assets/css/theme.min.css') !!}" type="text/css" rel="stylesheet" id="style-default">
   <link href="{!! asset('assets/css/user.min.css') !!}" type="text/css" rel="stylesheet" id="user-style-default">
   <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

   <link rel="stylesheet" type="text/css" href="{!! asset('assets/fonts/fontawesome/css/all.min.css') !!}">
   <link href="{!! asset('assets/css/custom.css') !!}" type="text/css" rel="stylesheet">
   <link href="{!! asset('assets/vendors/choices/choices.min.css') !!}" rel="stylesheet" />

   @livewireStyles
</head>
