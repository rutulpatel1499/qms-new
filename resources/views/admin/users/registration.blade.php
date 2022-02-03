@extends('common.mainpage')
@section('title')
<title>registration</title>
@endsection
@section('content')
<section class="admin-content">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">

                        <h4 style="margin-top: 100px;" class=""> Registrastion Form 
                        </h4>
                        <p class="opacity-75 ">
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
                            registrastion form
                            </h5>
                            <p class="m-b-0 text-muted">
                            
                            </p>
                        </div>
                        <div class="card-body ">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <form action="{{route('storedata')}}" method="post">
                                        @csrf
                                        <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="inputcategory_id">role_id</label>
                                                <select name="role_id"    class ="form-control" id="role_id" >
                                                <option selected disabled>select your role_id</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                                </select>
                                                @error('role_id')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputname">name</label>
                                                <input type="text" class="form-control" name="name" id="inputname"
                                                    placeholder="enter your name">
                                                @error('name')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Email</label>
                                                <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                                                @error('email')
                                                    {{$message}}
                                                @enderror                                           
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputcontactno">contactno</label>
                                                <input type="text" name="contactno" class="form-control" id="inputcontactno" placeholder=" enter contactno">
                                                @error('contactno')
                                                    {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4">Password</label>
                                                <input type="password" name="password" class="form-control" id="inputPassword4"  placeholder=" enter password" >
                                                @error('password')
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

                           
                  
                   
                
               
