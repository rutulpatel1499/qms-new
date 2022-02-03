@extends('company.commons.main')
@section('title')
<title>quatationitems</title>
@endsection
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
                                Create Quatation_item Forms
                            </h5>
                         
                        </div>
                        <div class="card-body ">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <form action="{{ route('companyquatationitem.store')}}" id="mainuser" method="post">
                                        @csrf
                                        <div class="row">
                                            
                                            <div class="form-group col-md-6">
                                            <label for="inputquatation_id">quatation_id</label>
                                                <select name="quatation_id"    class ="form-control" id="quatation_id" >
                                                <option selected disabled>select your quatation_id</option>
                                                @foreach($quatation as $quatation_id)
                                                    <option value="{{ $quatation_id->id}}">{{ $quatation_id->name }}</option>
                                                @endforeach
                                                </select>
                                                @error('quatation_id')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="inputbrand_id">product_id</label>
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
                                                <label for="inputqty">qty</label>
                                                <input type="text" class="form-control" name="qty" id="inputqty"
                                                     placeholder="enter your qty">
                                                 @error('qty')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputrate">rate</label>
                                                <input type="text" class="form-control" name="rate" id="inputrate"
                                                    placeholder="enter your rate">
                                                @error('rate')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputtotal">total</label>
                                                <input type="text" class="form-control" name="total" id="inputtotal"
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

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    
    $(document).ready(function(){
        $("#mainuser").validate({
            errorElement: 'span',
            rules: {
                quatation_id:{required: true},
                product_id:{required: true},
                qty:{required: true},
                rate:{required: true},
                total:{required: true},
               },
            messages: {
                 quatation_id: {
                    required: " name always required."
                  },
                 product_id: {
                    required: " product_id always required."
                  },
                 qty: {
                    required: " qty always required."
                  },
                 rate: {
                    required: " rate always required."
                  },
                
                 total: {
                    required: " total always required."
                  },
                
            },
            submitHandler: function(form) {
                if ($('#mainuser').valid()) {
                    form.submit();
                }
                else {
                    return false;
                }
            }
        });
    });
</script>

@endsection           


                                        
                  
                   
                
               
