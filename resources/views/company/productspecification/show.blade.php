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
                                Productspecification Show Forms
                            </h5>
                          
                        </div>
                        <div class="card-body ">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <form >
                                        @csrf
                                      
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label>product_id:</label>
                                                <input type="text"  class="form-control"  name="product_id" 
                                                value="{{ $Product_specification->products->name}}" disabled>  
                                               
                                            </div>  
                                           
                                            <div class="form-group col-md-6">
                                                <label for="inputkey">key</label>
                                                <input type="text" class="form-control" name="key" id="inputkey"
                                                    placeholder="enter your key"  value="{{ $Product_specification->key }}"disabled>
                                                @error('key')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputvalue">value</label>
                                                <input type="text" class="form-control" name="value" id="inputvalue"
                                                    placeholder="enter your value"  value="{{ $Product_specification->value }}"disabled>
                                                @error('value')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                        </div>
                                      
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
                                                                            
                                            
                                            
                                        


                           
                  
                   
                
               
