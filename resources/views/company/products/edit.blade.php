@extends('company.commons.main')
@section('title')
<title>product</title>
@endsection
@section('content')
<section class="admin-content">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">

                        <h4 style="margin-top: 100px;" class=""> 
                        <i class="mdi mdi-table "></i></span>Product 
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
                                Product Edit Forms
                            </h5>
  
                        </div>
                        <div class="card-body ">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <form action="{{ route ('companyproducts.update',$product->id) }}"  method="post">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="main">category</label>
                                                <select  name="category"    class ="form-control" id="category" >
                                                <option selected disabled>select your category_id</option>
                                                @foreach($categories as $category)
                                                    
                                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                @endforeach
                                                </select>
                                            </div>  
                                             
                                            <div class="form-group col-md-6">
                                                <label class="main">brand</label>
                                                <select name="brand" class ="form-control" id="brand" >
                                                <option selected disabled>select your brand_id</option>
                                                @foreach($brands as $brand_id)
                                                    <option value="{{ $brand_id->id }}">{{ $brand_id->brandname }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <label for="inputname">productname</label>
                                                <input type="text" class="form-control" name="productname" id="inputname"
                                                    placeholder="enter your productname"  value="{{ $product->name }}">
                                                @error('productname')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputrate">rate</label>
                                                <input type="text" class="form-control" name="rate" id="inputrate"
                                                    placeholder="enter your rate"  value="{{ $product->rate }}">
                                                @error('rate')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputquantity">quantity</label>
                                                <input type="text" class="form-control" name="quantity" id="inputquantity"
                                                    placeholder="enter your quantity" value="{{ $product->quantity }}">
                                                @error('quantity')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                        </div>
                                        
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


                           
                  
                   
                
               
