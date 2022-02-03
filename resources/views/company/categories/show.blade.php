@extends('company.commons.main')
@section('title')
<title>category</title>
@endsection
@section('content')
<section class="admin-content">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">

                        <h4 style="margin-top: 100px;" class="">
                        <i class="mdi mdi-table "></i> </span> Category 
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
                               Category Show Forms
                            </h5>
         
                        </div>
                        <div class="card-body ">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <form >
                                        @csrf
                                        <div class="row">
                                            
                                            
                                            <div class="form-group col-md-6">
                                                <label for="inputname">category</label>
                                                <input type="text" class="form-control" name="name" id="inputname"
                                                    placeholder="enter your name" value="{{ $Category->category }}" disabled>
                                                @error('name')
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

                           
                  
                   
                
               
