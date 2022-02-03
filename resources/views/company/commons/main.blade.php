<!DOCTYPE html>
<html lang="en">
   <meta charset="UTF-8">
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
   <meta name="apple-mobile-web-app-capable" content="yes">
   <meta name="apple-touch-fullscreen" content="yes">
   <meta name="apple-mobile-web-app-status-bar-style" content="default">
  
   @yield('title')
   <link rel="icon" type="image/x-icon" href="{{asset('assets/img/logo.png')}}">
   <link rel="icon" href="{{asset('assets/img/logo.png')}}" type="image/png" sizes="16x16">
   <link rel="stylesheet" href="{{asset('assets/vendor/pace/pace.css')}}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="{{asset('assets/vendor/pace/pace.min.js')}}"></script>
   <!--vendors-->
   @yield('css')
   <style>
       

         .context h1{
            text-align: center;
            color: #fff;
            font-size: 50px;            
         }

         .circles{
            position: absolute;
            
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
         }

         .circles li{
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: red;
            animation: animate 25s linear infinite;
            bottom: -150px;
            
         }

         .circles li:nth-child(1){
            left: 80%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
         }


         .circles li:nth-child(2){
            left: 20%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
         }

         .circles li:nth-child(3){
            left: 88%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
         }

         .circles li:nth-child(4){
            left: 20%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
         }

         .circles li:nth-child(5){
            left: 95%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
         }

         .circles li:nth-child(6){
            left: 75%;
            width:30px;
            height:30px;
            animation-delay: 3s;
         }

         .circles li:nth-child(7){
            left: 15%;
            width: 30px;
            height: 30px;
            animation-delay: 7s;
         }

         .circles li:nth-child(8){
            left: 90%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
         }

         .circles li:nth-child(9){
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
         }

         .circles li:nth-child(10){
            left: 85%;
            width: 15px;
            height: 15px;
            animation-delay: 0s;
            animation-duration: 11s;
         }



         @keyframes animate {

            0%{
               transform: translateY(0) rotate(0deg);
               opacity: 1;
               border-radius: 0;
            }

            100%{
               transform: translateY(-1000px) rotate(720deg);
               opacity: 0;
               border-radius: 50%;
            }

         }    
   </style>
   <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{asset('assets/vendor/jquery-scrollbar/jquery.scrollbar.css')}}">
   <link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui/jquery-ui.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}">
   <link rel="stylesheet" href="{{asset('assets/vendor/timepicker/bootstrap-timepicker.min.css')}}">
   <link href="{{asset('https://fonts.googleapis.com/css?family=Roboto:400,500,600')}}" rel="stylesheet">
   <!--Material Icons-->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/materialdesignicons/materialdesignicons.min.css')}}">
   <!--Material Icons-->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/fonts/feather/feather-icons.css')}}">
   <!--Bootstrap + atmos Admin CSS-->
   <link rel="stylesheet" type="text/css" href="{{asset('assets/css/atmos.min.css')}}">
   <!-- Additional library for page -->
   </head>

   <body class="sidebar-pinned" style=" background-color:azure; font-variant: common-ligatures; font-size: 19px;">   
   
      @include('company.commons.companysidebar')
    
      @include('company.commons.companyheader')
     
   
      @yield('content')  
      
      <div >
         <ul class="circles" style="z-index:-1;">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
         </ul>
      </div >
      <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('assets/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
      <script src="{{asset('assets/vendor/popper/popper.js')}}"></script>
      <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}" ></script>
      <script src="{{asset('assets/vendor/select2/js/select2.full.min.js')}}"></script>
      <script src="{{asset('assets/vendor/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
      <script src="{{asset('assets/vendor/listjs/listjs.min.js')}}"></script>
      <script src="{{asset('assets/vendor/moment/moment.min.js')}}"></script>
      <script src="{{asset('assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
      <script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
      <script src="{{asset('assets/vendor/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
      <script src="{{asset('assets/js/atmos.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('assets/js/particles.min.js')}}"></script>
     
      <!--page specific scripts for demo-->
      <!--Additional Page includes-->
 
      @yield('scripts')
      <!--chart data for current dashboard-->
     
   </body>
</html>
 

 
     
      