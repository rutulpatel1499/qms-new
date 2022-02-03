<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<style>
    
    .hm-gradient {
    background-image: linear-gradient(to top, #f3e7e9 0%, #e3eeff 99%, #e3eeff 100%);
    border:solid;
    width:500px;
    }
    .error_clear_last
    {
        color:red;
    }

</style>
<body >

            <form action="{{ route('form.store')}}" class="hm-gradient"  id="mainuser" method="POST">
            @csrf
                <h3 class="text-center indigo-text font-bold py-4"><strong>Subscribe</strong></h3>
                <div class="form-group col-md-6">
                              <label for="inputname">firstname</label>
                              <input type="text" class="form-control" name="firstname" id="inputname"
                                 placeholder="enter your firstname">
                </div>
                @error('firstname')
                {{$message}}
                @enderror
                <div class="form-group col-md-6">
                              <label for="inputname">lastname</label>
                              <input type="text" class="form-control" name="lastname" id="inputname"
                                 placeholder="enter your lastname">
                </div>
                @error('lastname')
                {{$message}}
                @enderror
                <div class="form-group col-md-6">
                              <label for="inputname">email</label>
                              <input type="text" class="form-control" name="email" id="inputname"
                                 placeholder="enter your email">
                </div>
                @error('email')
                {{$message}}
                @enderror
                <div class="form-group col-md-6">
                              <label for="inputname">contactnumber</label>
                              <input type="text" class="form-control" name="contactnumber" id="inputname"
                                 placeholder="enter your contactnumber">
                </div>
                @error('contactnumber')
                {{$message}}
                @enderror
                <div class="form-group col-md-6">
                              <label for="inputname">address</label>
                              <input type="text" class="form-control" name="address" id="inputname"
                                 placeholder="enter your address">
                </div>
                @error('address')
                {{$message}}
                @enderror
                <div class="form-group col-md-6">
                              <label for="inputname">dateofbirth</label>
                              <input type="text" class="form-control" name="dateofbirth" id="inputname"
                                 placeholder="enter your dateofbirth">
                </div>
                @error('dateofbirth')
                {{$message}}
                @enderror
                
                <div class="text-center py-4">
                    <button class="btn btn-success">submit </button>
                </div>
            </form>
            
 
</body>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
   $(document).ready(function(){
       $("#mainuser").validate({
           errorElement: 'span',
           rules:{
                firstname:{required:true},
                lastname:{required:true},
                email:{required:true},
                contactnumber:{required:true},
                address:{required:true},
                dateofbirth:{required:true},
               },
            messages:{
                 firstname:{
                    required:" firstname always required!."
                  },
                 lastname:{
                    required:" lastname always required!."
                  },
                 email:{
                    required:" email always required!."
                  },
                 contactnumber:{
                    required:" contactno always required!.",
                    number:" only digit value is valid!."
                  }, 
                 address:{
                    required:" address always required!."
                  },
    
                 dateofbirth:{
                    required:" dateofbirth always required!."
                  },
    
                
        },
   submitHandler:function(form){
   if($('#mainuser').valid()){
   form.submit();
   }
   else{
   return false;
   }}
   });
   });
</script>

</html>