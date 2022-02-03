@extends('company.commons.main')
@section('title')
<title>productspecification</title>
@endsection
@section('content')
<section class="admin-content">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">

                        <h4 style="margin-top: 100px;" class=""> 
                        <i class="mdi mdi-table "></i></span>Productspecification 
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
                                Productspecification Edit Forms
                            </h5>
  
                        </div>
                        <div class="card-body ">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <form action="{{ route ('productspecification.update',$productspecification->id) }}"  method="post">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                            <label for="inputproduct_id">product_id</label>
                                                <select name="product_id"  class="form-control" id="product_id" >
                                                <option selected disabled>select your product_id</option>
                                                @foreach($products as $productid)
                                                    <option value="{{ $productid->id }}">{{ $productid->name }}</option>
                                                @endforeach
                                                </select>
                                                @error('product_id')
                                                    {{$message}}
                                                @enderror
                                            </div>     
                                            <div class="form-group col-md-6">
                                                <label for="inputkey">key</label>
                                                <input type="text" class="form-control" name="key" id="inputkey"
                                                    placeholder="enter your key"  value="{{ $productspecification->key }}">
                                                @error('key')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputvalue">value</label>
                                                <input type="text" class="form-control" name="value" id="inputvalue"
                                                    placeholder="enter your value"  value="{{ $productspecification->value }}">
                                                @error('value')
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


                           
                  
                   
                
               
