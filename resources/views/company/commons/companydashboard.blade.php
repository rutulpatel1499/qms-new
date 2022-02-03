@extends('company.commons.main')
@section('content')
@section('title')
<title>companyuser</title>
@endsection
  
<section class="admin-content" style=" margin-top: 107px;">
<div class="bg-dark m-b-30" style="margin-top:-50px;">
            <div class="container">
                <div class="row p-b-60 p-t-60">

                    <div class="col-md-10 mx-auto text-center text-white p-b-30">
                        <div class="m-b-20">
                            <div class="avatar avatar-xl my-auto">
                                <img class="avatar-img rounded" src="{{asset('assets/img/logos/instagram.jpg')}}" alt="">

                            </div>
                        </div>
                        @foreach(['success', 'danger'] as $key)
                            @if(Session::has($key))
                            <div class="alert alert-{{ $key }} alert-block">
                            <button type="button" class="close" data-dismiss='alert'>x</button>
                            {{ Session::get($key) }}
                            </div>
                            @endif
                        @endforeach
                        <h1>Analytics Overview</h1>
                    </div>

                </div>
            </div>
        </div>
        <div class="container pull-up">
            <div class="row" style="margin-right: -251px;  margin-left: -26px;">
                <div class="col-lg-3 col-md-6 m-b-30">
                    <div class="card card-hover">
                        <div class="card-body">
                            <div class="text-center p-t-20">
                                <div class="avatar-lg avatar">
                                    <div class="avatar-title rounded-circle badge-soft-success"><i
                                                class="mdi mdi-account-multiple h1 m-0"></i></div>

                                </div>
                                <div class="text-center">
                                    <h1 class="fw-600 p-t-20">{{$client}}</h1>
                                    <p class="text-muted fw-600">Total Clients</p>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 m-b-30">
                    <div class="card card-hover">
                        <div class="card-body">
                            <div class="text-center p-t-20">
                                <div class="avatar-lg avatar">
                                    <div class="avatar-title rounded-circle badge-soft-danger"><i
                                                class="mdi mdi-bootstrap h1 m-0"></i></div>

                                </div>
                                <div class="text-center">
                                    <h1 class="fw-600 p-t-20">{{$brand}}</h1>
                                    <p class="text-muted fw-600">Total Brands</p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 m-b-30">
                    <div class="card card-hover">
                        <div class="card-body">
                            <div class="text-center p-t-20">
                                <div class="avatar-lg avatar">
                                    <div class="avatar-title rounded-circle badge-soft-info"><i
                                                class="mdi mdi-eye-settings-outline h1 m-0"></i></div>

                                </div>
                                <div class="text-center">
                                    <h1 class="fw-600 p-t-20">{{$categories}}</h1>
                                    <p class="text-muted fw-600">Total Categories</p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 m-b-30">
                    <div class="card card-hover">
                        <div class="card-body">
                            <div class="text-center p-t-20">
                                <div class="avatar-lg avatar">
                                    <div class="avatar-title rounded-circle badge-soft-dark"><i
                                                class="mdi mdi-cart h1 m-0"></i></div>

                                </div>
                                <div class="text-center">
                                    <h1 class="fw-600 p-t-20">{{$product}}</h1>
                                    <p class="text-muted fw-600">Total Products</p>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</div>                
                      
@endsection

   
     


