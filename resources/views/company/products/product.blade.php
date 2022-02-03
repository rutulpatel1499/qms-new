@extends('company.commons.main')
@section('title')
<title>product</title>
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
   -webkit-transition-duration: 0.4s; 
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
  {
     background-color: antiquewhite;
  }
</style>
@section('content')
<section class="admin-content" >
   <div class="bg-dark">
      <div class="container  m-b-30">
         <div class="row">
            <div class="col-12 text-white p-t-40 p-b-90">
               <h4  style="margin-top: 100px;" class=""> 
               </h4>
            </div>
         </div>
      </div>
   </div>
   <div class="container  pull-up">
   <div class="row">
      <div class="col-lg-12">
         <!--widget card begin-->
         <div class="card m-b-30">
         @foreach(['success', 'danger'] as $key)
            @if(Session::has($key))
            <div class="alert alert-{{ $key }} alert-block">
               <button type="button" class="close" data-dismiss='alert'>x</button>
               {{ Session::get($key) }}
            </div>
            @endif
         @endforeach
            <div class="card-header">
               <h5 class="m-b-0">
                  Create Product Forms
               </h5>
            </div>
            <div class="card-body ">
               <div class="form-row">
                  <div class="form-group col-md-12">
                     <form action="{{ route('companyproducts.store')}}" id="mainuser" method="post">
                        @csrf
                        <div class="row">
                           <div class="form-group col-md-6">
                              <label for="inputcategory_id">category</label>
                              <select name="category"    class ="form-control" id="category" >
                                 <option selected disabled>select your category_id</option>
                                 @foreach($categories as $category)
                                 <option value="{{ $category->id }}">{{ $category->category }}</option>
                                 @endforeach
                              </select>
                              @error('category')
                              {{$message}}
                              @enderror
                           </div>
                           <div class="form-group col-md-6">
                              <label for="inputbrand_id">brand</label>
                              <select name="brand"    class ="form-control" id="brand" >
                                 <option selected disabled>select your brand_id</option>
                                 @foreach($brands as $brandid)
                                 <option value="{{ $brandid->id}}">{{ $brandid->brandname }}</option>
                                 @endforeach
                              </select>
                              @error('brand')
                              {{$message}}
                              @enderror
                           </div>
                           <div class="form-group col-md-6">
                              <label for="inputname">product name</label>
                              <input type="text" class="form-control" name="productname" id="inputname"
                                 placeholder="enter your productname">
                              @error('productname')
                             {{$message}}
                              @enderror
                           </div>
                           
                           <div class="form-group col-md-6">
                              <label for="inputrate">rate</label>
                              <input type="text" class="form-control" name="rate" id="inputrate"
                                 placeholder="enter your rate" >
                              @error('rate')
                              {{$message}}
                              @enderror
                           </div>
                           <div class="form-group col-md-6">
                              <label for="inputquantity">Quantity</label>
                              <input type="text" class="form-control" name="quantity" id="inputquantity"
                                 placeholder="enter your quantity">
                              @error('quantity')
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
           errorElement: 'span',
           rules: {
               category:{required: true},
               brand:{required: true},
               productname:{required: true},
               rate:{required: true,
                  min:1,
               },
               quantity:{required: true},
              },
           messages: {
                category: {
                   required: " category always required.",
                 },
                brand: {
                   required: " brand always required."
                 },
                 productname: {
                   required: " productname always required."
                 },
                rate: {
                   required: " rate always required.",
                   min: jQuery.validator.format("Please don't enter 0 value.enter minimum value is 1. ")
                   
                 },
               quantity: {
                   required: " quantity always required."
                 },
               
           },
           submitHandler: function(form) {
               if ($('#mainuser').valid()) {
                   form.submit();
               }
               else {
                   return false;
               }
           }
       });
   });
</script>
   
                  
@endsection