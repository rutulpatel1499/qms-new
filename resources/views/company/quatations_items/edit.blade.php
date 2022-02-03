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

                        <h4 style="margin-top: 100px;" class="">

                        <i class="mdi mdi-table "></i></span>Quatation_item
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
                                Quatation_item Edit Forms
                            </h5>
                           
                        </div>
                        <div class="card-body ">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <form action="{{ route ('companyquatationitem.update',$Quatation_item->id) }}"  method="post">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="main">quatation_id</label>
                                                <select  name="quatation_id"    class ="form-control" id="quatation_id" >
                                                <option selected disabled>select your quatation_id</option>
                                                @foreach($quatation as $quatation_id)
                                                     <option value="{{ $quatation_id->id }}">{{ $quatation_id->name }}</option>
                                                 @endforeach
                                                </select>
                                            </div>  
                                            
                                            <div class="form-group col-md-6">
                                                <label class="main">product_id</label>
                                                <select name="product_id" class ="form-control" id="product_id" >
                                                <option selected disabled>select your product_id</option>
                                                @foreach($products as $product_id)
                                                 <option value="{{ $product_id->id }}">{{ $product_id->name }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <label for="inputqty">qty</label>
                                                <input type="text" class="form-control" name="qty" id="inputqty"
                                                    placeholder="enter your qty"  value="{{ $Quatation_item->qty }}">
                                                @error('qty')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputrate">rate</label>
                                                <input type="text" class="form-control" name="rate" id="inputrate"
                                                 placeholder="enter your rate"  value="{{ $Quatation_item->rate }}">
                                                @error('rate')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputtotal">total</label>
                                                <input type="text" class="form-control" name="total" id="inputtotal"
                                                    placeholder="enter your total"  value="{{ $Quatation_item->total }}">
                                                @error('total')
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


                           
                  
                   
                
               
