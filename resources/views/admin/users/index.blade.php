@extends('common.mainpage')
@section('title')
<title>user</title>
@endsection
@section('content')
<section class="admin-content">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">

                        <h4 style="margin-top: 100px;" class=""> <span class="btn btn-white-translucent">
                                <i class="mdi mdi-table "></i></span> User Tables
                        </h4>
                    


                    </div>
                </div>
            </div>
        </div>

        <div class="container pull-up">
            <div class="row" >

                <div class="col-md-12">
                @foreach(['success', 'danger'] as $key)
                    @if(Session::has($key))
                    <div class="alert alert-{{ $key }} alert-block">
                    <button type="button" class="close" data-dismiss='alert'>x</button>
                    {{ Session::get($key) }}
                    </div>
                    @endif
                @endforeach
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="m-b-0">
                                User Tables
                            </h5>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                          <table class="table">                             
                            <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">role_id</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">email</th>
                                  <th scope="col">contactno</th>
                                  <th scope="col">Action</th>
                                </tr>
                            </thead>
                              <tbody>
                                  @foreach($users as $user)
                                    <tr>
                                        <td scope="row">{{$user->id}}</td>
                                        <td>{{$user->role_id == 1 ? "Admin" : "User"}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->contactno}}</td>
                                    
                                        <td>
                                          <a href="{{ route('users.show',$user->id) }} "class="btn btn-primary">view</a>
                                          <a href="{{ route('users.edit',$user->id) }} "class="btn btn-success">edit</a>
                                    
                                        </td>
                                    </tr>
                                  @endforeach
                              </tbody>
                          </table>
                            </div>

                        </div>
                    </div>


                </div>
               
            </div>
        </div>
    </section>
   @endsection