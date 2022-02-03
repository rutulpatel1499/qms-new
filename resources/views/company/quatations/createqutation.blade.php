@extends('company.commons.main')
@section('title')
<title>quatation</title>
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
               <h4  style="margin-top: 100px;">  
               <i class="mdi mdi-table "></i></span> Quatations
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
                     Create Quatation Forms
                  </h5>
               
            </div>
            
            <div class="card-body ">
               <div class="form-row">
                  <div class="form-group col-md-12">
         
                     <form action="{{ route('companyquatation.store')}}" id="mainuser" method="post">
                        @csrf
                        <div class="row">
                           
                           <div class="form-group col-md-6">
                              <label for="inputclient_id">client_id</label>
                              <select name="client_id"    class ="form-control" id="client_id" >
                                 <option selected disabled>select your client_id</option>
                                 @foreach($clients as $client)
                                 <option value="{{ $client->id}}">{{ $client->name }}</option>
                                 @endforeach
                              </select>
                              @error('client_id')
                              {{$message}}
                              @enderror
                           </div>
                           <div class="form-group col-md-6">
                              <label for="inputquatation_no">quatation_no</label>
                              <input type="text" class="form-control" name="quatation_no" id="inputquatation_no"
                                 placeholder="enter your quatation_no">
                              @error('quatation_no')
                              {{$message}}
                              @enderror
                           </div>
                           <div class="form-group col-md-6">
                              <label for="inputname">name</label>
                              <input type="text" class="form-control" name="name" id="inputname"
                                 placeholder="enter your name">
                              @error('name')
                              {{$message}}
                              @enderror
                           </div>
                           <div class="form-group col-md-6">
                              <label for="inputdiscount">discount</label>
                              <input type="text" class="form-control" name="discount" id="inputdiscount"
                                 placeholder="enter your discount">
                              @error('discount')
                              {{$message}}
                              @enderror
                           </div>
                           <div class="form-group col-md-6">
                              <label for="inputrate">productname</label>
                              <select name="product_id" class ="form-control"   id="drop-down-id" >
                                 <option selected disabled>select your product</option>
                                 @foreach($products as $product_id)
                                 <option value="{{ $product_id->id }}" id="this_{{ $product_id->id }}">{{ $product_id->name }}</option>
                                 @endforeach
                              </select>
                              @error('product_id')
                              {{$message}}
                              @enderror
                           </div>
                           <div class="form-group col-md-6 mt-10">
                              <button type="button" id="add1" class="btn btn-primary" style="margin-top: 28px;">Add Product</button>
                           </div>
                           <div class="form-group col-md-12">
                              <div class="row">
                                 <div class="col-12">
                                    <div class="card">
                                       <div class="card-body">
                                          <div class="table-responsive p-t-10">
                                             <table id="table" class="table" style="width:100%">
                                                <thead>
                                                   <tr  >
                                                      <th>productname</th>
                                                      <th>rate</th>
                                                      <th>qty</th>
                                                      <th>total</th>
                                                     
                                                   </tr>
                                                </thead>
                                                <tbody id="product-table">
                                                  
                                                </tbody>
                                             </table>
                                          </div>
                                          <p class='error-msg' style="color:red; float:right; margin-right:240px;"></p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <button class="button">Submit</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
 
</section>

@endsection  

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js" integrity="sha256-VAvG3sHdS5LqTT+5A/aeq/bZGa/Uj04xKxY8KM/w9EE=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js" integrity="sha512-DaXizW7rneJiM/XOnTQVQ7wDZBVNXf5U9rE88BPYhQcEQ4pjaEZlCX5hgY3+4C3K91jfdpUWbz8t8mL/g1BDTw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/additional-methods.min.js" integrity="sha512-rqPSGr/uZkKsdIvz5qGPdfNLx/lS5zuro7jlb0Mp9MaKt6SWsB8yu6bwottqwqFF8jmzoEDXIf6mtH+TTUvs6Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
   $(document).on('click','#add1', function(){
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
   
           var productId = $('#drop-down-id').val();
         //   console.log("productId");
         //   console.log(productId);
           url = '{{ route("getAllProducts", ":productId") }}';
           url = url.replace(':productId', productId);
           console.log(url);
   
           $.ajax({
                   method: 'GET',
                   url: url,
                   success: function(result) {
                            $('#product-table').append(result.data);
                        if(result.hasOwnProperty('success') == 'true')
                        {
   
                        }
                     //   console.log('Success');
                     //   console.log(result.data);
                   },
                   error: function(xhr, exception){ 
                       console.log('Error');
                   }
               });
       });
    
     
   $(document).ready(function(){
   
          $("#mainuser").validate({
           errorElement: 'span',
           rules: {
               client_id:{required: true},
               quatation_no:{required: true},
               name:{required: true},
               discount:{required: true},
              },
           messages: {
                client_id: {
                   required: " client_id always required."
                 },
           quatation_no: {
                   required: " quatation_no always required."
                 },
                name: {
                   required: " name always required."
                 },
           discount: {
                   required: " discount always required."
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

<script>
   $(document).ready(function(){
      //update rate   
      $(document).on('change', '.rate-update' , function(e){
         e.preventDefault(); 
         var oldvalue = $(this).val();
         console.log(oldvalue);
         //get qty
         var qty = $(this).parents('tr').first().find('.qty').val();
         console.log(qty);
         //sum rate and qty
         var total = (oldvalue) * (qty);
         console.log(total);
         // print total
         $(this).parents('tr').first().find('.total').val(total);

      });
   
   });  
</script>
<script>
   $(document).ready(function(){
      //update qty   
      $(document).on('change', '.qty' , function(e){
         e.preventDefault(); 
         var oldvalue = $(this).val();
         console.log(oldvalue);
         //get rate
         var rate = $(this).parents('tr').first().find('.rate-update').val();
         console.log(rate);
         var product_id = $(this).parents('tr').attr('id');
         //sum qty and rate
         var total = (oldvalue) * (rate);
         console.log(total);
         // print total
         $(this).parents('tr').first().find('.total').val(total);
         
         $.ajax({
               type: "GET",
               url: '{{route("checkqty") }}',
               data: {qty :oldvalue , id :product_id},
            
               success: function(data){
                     console.log(data);
                     $('.error-msg').text(data.message);   
               },
               error: function(xhr, exception){ 
                       console.log('Error');
                   }
            });
      });
   
   });  
</script>
@endsection