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

                        <h4 style="margin-top: 100px;"  class=""> <span class="btn btn-white-translucent">
                        <i class="mdi mdi-table "></i></span>Brand
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
                                Brand Tables
                            </h5>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                          <table class="table">                            
                                <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">brandname</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @if(count($brands))
                                    @foreach($brands as $user)
                                        <tr>
                                            <td scope="row">{{$loop->iteration}}</td>
                                            <td>{{$user->brandname}}</td>
                                        
                                        
                                            
                                            <td>
                                            <a href="{{ route('companybrands.show',$user->id) }} "class="btn btn-primary">view</a>
                                            <a href="{{ route('companybrands.edit',$user->id) }} "class="btn btn-success">edit</a>
                                            <form action="{{ route('companybrands.destroy', $user->id) }}"  style="display: contents;" method="POST">
                                                    @csrf

                                                    @method('DELETE')
                                                    <button  class="btn btn-danger ">Delete</button>
                                            </form>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                  @else
                                  <tr>
                                      <td>
                                          No data found.
                                      </td>
                                  </tr>
                                  @endif

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