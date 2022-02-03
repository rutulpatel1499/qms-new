@extends('company.commons.main')
@section('title')
<title>Products</title>
@endsection
@section('content')
<section class="admin-content">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">

                        <h4  style="margin-top: 100px;"> <span class="btn btn-white-translucent">
                        <i class="mdi mdi-table "></i></span>Product
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
                                Product Tables
                            </h5>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                          <table class="table">                             
                               <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">category</th>
                                  <th scope="col">brand</th>
                                  <th scope="col">productname</th>
                                  <th scope="col">rate</th>
                                  <th scope="col">Quantity</th>
                                  <th scope="col">Action</th>
                          
                                </tr>
                              </thead>
                              <tbody>
                              @if(count($products))
                                  @foreach($products as $product)
                                  <tr>
                                      <td scope="row">{{$loop->iteration}}</td>
                                      <td>{{$product->categories->category}}</td>
                                    
                                        <td>{{$product->brands->brandname}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->rate}}</td>
                                        <td>{{$product->quantity}}</td>
                                       
                                    
                                        <td>
                                          <a href="{{ route('companyproducts.show',$product->id) }} "class="btn btn-primary">view</a>
                                          <a href="{{ route('companyproducts.edit',$product->id) }} "class="btn btn-success">edit</a>
                                            <form action="{{ route('companyproducts.destroy', $product->id) }}" style="display: contents;" method="POST">
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