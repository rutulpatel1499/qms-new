@extends('company.commons.main')
@section('title')
<title>client</title>
@endsection
@section('content')
<section class="admin-content">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">

                        <h4 style="margin-top: 100px;" class=""> 
                        <i class="mdi mdi-table "></i> </span>  Client 
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
                               Client Edit Forms
                            </h5>
                          
                        </div>
                        <div class="card-body ">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <form action="{{ route ('companyclients.update',$client->id) }}"   method="post">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                            <i class="fa fa-user-o prefix white-text"></i>
                                                <label for="inputname">name</label>
                                                <input type="text" class="form-control" name="name" id="inputname"
                                                    placeholder="enter your name"  value="{{ $client->name }}">
                                                @error('name')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                            <i class="fa fa-envelope-o prefix white-text"></i>
                                                <label for="inputemail">email</label>
                                                <input type="email" class="form-control" name="email" id="inputemail"
                                                    placeholder="enter your email"  value="{{ $client->email }}">
                                                @error('email')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                            <i class="fa fa-address-card-o prefix white-text"></i>
                                                <label for="inputaddress">address</label>
                                                <input type="text" class="form-control" name="address" id="inputaddress"
                                                    placeholder="enter your address"  value="{{ $client->address }}">
                                                @error('address')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                            <i class="fa fa-mobile prefix white-text"></i>
                                                <label for="inputcontact_no">contact_no</label>
                                                <input type="text" class="form-control" name="contactno" id="inputcontact_no"
                                                    placeholder="enter your contact_no"  value="{{ $client->contact_no }}">
                                                @error('contact_no')
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


                           
                  
                   
                
               
