<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<title> Admin login </title>
<link rel="icon" type="image/x-icon" href="assets/img/logo.png"/>
<link rel="icon" href="assets/img/logo.png" type="image/png" sizes="16x16">
<link rel="stylesheet" href="assets/vendor/pace/pace.css">
<script src="assets/vendor/pace/pace.min.js"></script>
<!--vendors-->
<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" type="text/css" href="assets/vendor/jquery-scrollbar/jquery.scrollbar.css">
<link rel="stylesheet" href="assets/vendor/select2/css/select2.min.css">
<link rel="stylesheet" href="assets/vendor/jquery-ui/jquery-ui.min.css">
<link rel="stylesheet" href="assets/vendor/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="assets/vendor/timepicker/bootstrap-timepicker.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">
<!--Material Icons-->
<link rel="stylesheet" type="text/css" href="assets/fonts/materialdesignicons/materialdesignicons.min.css">
<!--Material Icons-->
<link rel="stylesheet" type="text/css" href="assets/fonts/feather/feather-icons.css">
<!--Bootstrap + atmos Admin CSS-->
<link rel="stylesheet" type="text/css" href="assets/css/atmos.min.css">
<!-- Additional library for page -->
<style>
  .admin-main{
    background-image:url('background/nature.jpg');
  }
  .admin-brand-content
  {
    color:blue;
    font-size:20px;
  }
  .text-center
  {
    color:blue;
    font-size:30px;
  }
  .text-underline
  {
    color:blue;
    font-size:20px; 
  }
  .mx-auto
  {
  position: absolute;
  right: 0;
  margin: 40px;
  max-width: 500px;
  padding: 16px;
  background-color: white;
  }
</style>

</head>
<body class="jumbo-page" >

<main class="admin-main ">
        <div class="row ">
            <div class="col-lg-4  ">
                <div class="row align-items-center m-h-100">
                    <div class="mx-auto col-md-8">
                        <div class="p-b-20 text-center">
                            <p>
                                <img src="assets/img/logo.svg" width="80" alt="">

                            </p>
                            
                            <p class="admin-brand-content" >
                               Atmos
                            </p>
                        </div>
                        <h3 class="text-center p-b-20 fw-400">Login</h3>
                        <form  class="needs-validation" action="/loginme" method="post">
                        @csrf
                            <div class="form-row">
                                <div class="form-group floating-label col-md-12">
                                    <label>email</label>
                                    <input type="email" name="email" required class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group floating-label col-md-12">
                                    <label>password</label>
                                    <input type="password" name="password" required class="form-control" placeholder="password" >
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block btn-lg">login</button>
                            <!-- <button type="" class="fa fa-google btn btn-primary btn-block btn-lg"> login with google</button> -->
                            <a href="{{ url('google') }}" style="margin-top: 20px;" class="fa fa-google btn btn-lg btn-success btn-block">
                                  <strong>Login With Google</strong>
                                </a>     
                        </form>
                        <p class="text-right p-t-10">
                            <a href="{{route('reset')}}" class="text-underline">Forgot Password?</a>
                        </p>
                        
                    </div>

                </div>
            </div>
            <div class="col-lg-8 d-none d-md-block bg-cover" >

            </div>
        </div>
    </div>
</main>

<script src="assets/vendor/jquery/jquery.min.js"   ></script>
<script src="assets/vendor/jquery-ui/jquery-ui.min.js"   ></script>
<script src="assets/vendor/popper/popper.js"   ></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"   ></script>
<script src="assets/vendor/select2/js/select2.full.min.js"   ></script>
<script src="assets/vendor/jquery-scrollbar/jquery.scrollbar.min.js"   ></script>
<script src="assets/vendor/listjs/listjs.min.js"   ></script>
<script src="assets/vendor/moment/moment.min.js"></script>
<script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
<script src="assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/vendor/bootstrap-notify/bootstrap-notify.min.js"   ></script>
<script src="assets/js/atmos.min.js"></script>
<!--page specific scripts for demo-->

</body>
</html>