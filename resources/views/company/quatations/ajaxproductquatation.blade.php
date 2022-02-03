@extends('company.commons.main')

@section('content')
<section class="admin-content">
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
                        <div class="card-header">
                            <h5 class="m-b-0">
                                 Forms
                            </h5>
                        
                        </div>
                        <div class="card-body ">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <form>
                                        @csrf
                                        <div class="row"> 

                                            <div class="form-group col-md-6">
                                            <label for="inputrate">product_id</label>
                                            <select name="product_id"    class ="form-control" id="product_id" >
                                            <option selected disabled>select your product_id</option>
                                            @foreach($products as $product_id)
                                                <option value="{{ $product_id->id }}">{{ $product_id->name }}</option>
                                            @endforeach
                                            </select>
                                            @error('product_id')
                                                {{$message}}
                                            @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputrate">rate</label>
                                                <input type="text" class="form-control" name="rate" id="rate"
                                                    placeholder="enter your rate">
                                                    
                                                @error('rate')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputqty">qty</label>
                                                <input type="text" class="form-control" name="qty" id="qty"
                                                    placeholder="enter your qty">
                                                @error('qty')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputtotal">total</label>
                                                <input type="text" class="form-control" name="total" id="total"
                                                    placeholder="enter your total">
                                                @error('total')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                        </div>     
                                      
                                        <div class="form-group">
                                        <button class="btn btn-primary">Submit</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script>
      $(document).ready(function(){
       
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '{{ route("productquatationsave") }}',
                    data: formData,
                    
                    success: function(result) {

                        console.log('Success');
                        console.log(result);
                    },
                    error: function(xhr, exception) { 
                        console.log('Error');
                    }
                });
                
            });
        });
</script>
@endsection 
<!-- var j = 0;
                 $("#add1").click(function(){
                   //  j++;
                    $('#dynamictable2').append('<tr id="row'+j+'"><td><input type="text" required class="form-control eme_name" id="name_'+j+'" name="name['+j+']" placeholder="productname"><p></p></td><td><input type="text" class="form-control can_address" id="address_'+j+'"  name="address['+j+']" placeholder="qty" required><p></p></td><td><input type="text" class="form-control can_address" id="address_'+j+'"  name="address['+j+']" placeholder="rate" required><p></p></td><td><input type="text"  required class="form-control can_contact" id="contact_number_'+j+'" name="contact_number['+j+']" placeholder="total " ><p></p></td><td><button type="button" id="'+j+'" class="btn btn-danger remove_row1">-</button></td></tr>');
                      
                        

                  });
                  $(document).on("click",'.remove_row1',function(){
                        var row_id1=$(this).attr("id");
                        $('#row'+row_id1+'').remove();
                    });  -->