@extends('company.commons.main')
@section('title')
<title>client</title>
@endsection
@section('css')
<style>
    .error{
    color:red;
    }
    .button {
  position: relative;
  background-color: #04AA6D;
  border: none;
  font-size: 18px;
  color: #FFFFFF;
  padding: 10px;
  width: 150px;
  text-align: center;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  text-decoration: none;
  overflow: hidden;
  cursor: pointer;
}

.button:after {
  content: "";
  background: #90EE90;
  display: block;
  position: absolute;
  padding-top: 300%;
  padding-left: 350%;
  margin-left: -20px!important;
  margin-top: -120%;
  opacity: 0;
  transition: all 0.8s
}

.button:active:after {
  padding: 0;
  margin: 0;
  opacity: 1;
  transition: 0s
}

</style>
@section('content')
<section class="admin-content">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">

                        <h4 style="margin-top: 100px;" class="">  
                        </h4>
                    </div>
                </div>
            </div>
        </div>

        <div class="container  pull-up">
            <div class="row">
                <div class="col-lg-12">
                @foreach(['success', 'danger'] as $key)
                    @if(Session::has($key))
                    <div class="alert alert-{{ $key }} alert-block">
                        <button type="button" class="close" data-dismiss='alert'>x</button>
                        {{ Session::get($key) }}
                    </div>
                    @endif
                @endforeach

                    <!--widget card begin-->
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="m-b-0">
                                Create Client Forms
                            </h5>
                          
                        </div>
                        <div class="card-body ">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <form action="{{ route('companyclients.store')}}" id="mainuser" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                            <i class="fa fa-user-o  prefix white-text"></i>
                                                <label for="inputname">clientname</label>
                                                <input type="text" class="form-control" name="name" id="inputname"
                                                    placeholder="enter your name">
                                                 @error('name')
                                               {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                            <i class="fa fa-envelope-o prefix white-text"></i>
                                                <label for="inputemail">email</label>
                                                <input type="email" class="form-control" name="email" id="inputemail"
                                                    placeholder="enter your email">
                                                 @error('email')
                                                 {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                            <i class="fa fa-address-card-o  prefix white-text"></i>
                                                <label for="inputaddress">address</label>
                                                <input type="text" class="form-control" name="address" id="inputaddress"
                                                    placeholder="enter your address">
                                                @error('address')
                                                {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                            <i class="fa fa-mobile prefix white-text"></i>
                                                <label for="inputcontactno">contact_no</label>
                                                <input type="text" class="form-control" name="contactno" id="inputcontactno"
                                                    placeholder="enter your contact_no">
                                                @error('contactno')
                                                {{$message}}
                                                @enderror
                                            </div>
                                           
                                        </div>
                                        <div class="form-group">
                                        <button class="button">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection   
@section('scripts')

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    
$(document).ready(function(){
        $("#mainuser").validate({
            errorElement:'span',
            rules:{
                name:{required:true},
                email:{required:true},
                address:{required:true},
                contactno:{required:true,
                    number: true},
               },
            messages:{
                 name:{
                    required:" name always required!."
                  },
                 email:{
                    required:" email always required!."
                  },
                 address:{
                    required:" address always required!."
                  },
                 contactno:{
                    required:" contactno always required!.",
                    number:" only digit value is valid!."
                  }, 
    
                
        },
    submitHandler:function(form){
            if($('#mainuser').valid()){
                form.submit();
            }
            else{
                return false;
            }
        }
    });
});
</script>

@endsection        
         


         


                                        
                  
                   
                
               
