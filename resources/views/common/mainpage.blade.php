<!DOCTYPE html>
<html lang="en">
   <meta charset="UTF-8">
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
   <meta name="apple-mobile-web-app-capable" content="yes">
   <meta name="apple-touch-fullscreen" content="yes">
   <meta name="apple-mobile-web-app-status-bar-style" content="default">
   @yield('title') 
   <link rel="icon" type="image/x-icon" href="{{asset('assets/img/logo.png')}}"/>
   <link rel="icon" href="{{asset('assets/img/logo.png" type="image/png')}}" sizes="16x16">
   <link rel="stylesheet" href="{{asset('assets/vendor/pace/pace.css')}}">
   <script src="{{asset('assets/vendor/pace/pace.min.js')}}"></script>
   <!--vendors-->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/jquery-scrollbar/jquery.scrollbar.css')}}">
   <link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui/jquery-ui.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}">
   <link rel="stylesheet" href="{{asset('assets/vendor/timepicker/bootstrap-timepicker.min.css')}}">
   <link href="{{asset('https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet')}}">
   <!--Material Icons-->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/materialdesignicons/materialdesignicons.min.css')}}">
   <!--Material Icons-->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/feather/feather-icons.css')}}">
   <!--Bootstrap + atmos Admin CSS-->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/atmos.min.css')}}">
   <!-- Additional library for page -->
   </head>

   @yield('style')
   <body class="sidebar-pinned ">
      @include('partials.header')
      @include('partials.sidebar')
      

      @yield('content')          
      <!--   @include('partials.footer') -->
      <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}" ></script>
      <script src="{{asset('assets/vendor/jquery-ui/jquery-ui.min.js')}}  " ></script>
      <script src="{{asset('assets/vendor/popper/popper.js')}}  " ></script>
      <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('assets/vendor/select2/js/select2.full.min.js')}} "></script>
      <script src="{{asset('assets/vendor/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
      <script src="{{asset('assets/vendor/listjs/listjs.min.js')}} "></script>
      <script src="{{asset('assets/vendor/moment/moment.min.js')}}"></script>
      <script src="{{asset('assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
      <script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
      <script src="{{asset('assets/vendor/bootstrap-notify/bootstrap-notify.min.js ')}} "></script>
      <script src="{{asset('assets/js/atmos.min.js')}}"></script>
      <!--page specific scripts for demo-->
      <!--Additional Page includes-->
      <script src="{{asset('assets/vendor/apexchart/apexcharts.min.js')}}"></script>
      <!--chart data for current dashboard-->
      <script src="{{asset('assets/js/dashboard-01.js')}}" ></script>
      @yield('scripts')
   </body>
</html>

      

 
     
      