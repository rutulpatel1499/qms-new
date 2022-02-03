@extends('company.commons.main')
@section('title')
<title>brand</title>
@endsection
@section('content')
<section class="admin-content">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">

                        <h4 style="margin-top: 100px;" class="">
                        <i class="mdi mdi-table "></i></span>Brand  
                        </h4>
                        <p class="opacity-75 ">
                            
                            <br>
                            
                        </p>


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
                               Edit Brand Form
                            </h5>
                            
                        </div>
                        <div class="card-body ">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <form action="{{ route ('companybrands.update',$Brand->id) }}"  method="post">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="inputname">brandname</label>
                                                <input type="text" class="form-control" name="name" id="inputname"
                                                    placeholder="enter your brandname"  value="{{ $Brand->brandname }}">
                                                @error('name')
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


                           
                  
                   
                
               
