@extends('company.commons.main')
@section('title')
<title>quatation</title>
@endsection
@section('content')
<section class="admin-content">
   <div class="bg-dark">
      <div class="container  m-b-30">
         <div class="row">
            <div class="col-12 text-white p-t-40 p-b-90">
               <h4 style="margin-top: 100px;" class="">  
               <i class="mdi mdi-table "></i></span> Quatations
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
                     Quatation Edit Forms
                  </h5>
               </div>
               <div class="card-body ">
                  <div class="form-row">
                     <div class="form-group col-md-12">
                        <form action="{{ route ('companyquatation.update',$quatation->id) }}"  method="post">
                           @csrf
                           {{ method_field('PATCH') }}
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label class="main">client_id</label>
                                 <select  name="client_id"    class ="form-control" id="category" >
                                    <option selected disabled>select your category_id</option>
                                    @foreach($clients as $client)
                                    <option value="{{ $client->id}}">{{ $client->name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                              <div class="form-group col-md-6">
                                 <label for="inputquatation_no">quatation_no</label>
                                 <input type="text" class="form-control" name="quatation_no" id="inputquatation_no"
                                    placeholder="enter your quatation_no"  value="{{ $quatation->quatation_no }}">
                                 @error('quatation_no')
                                 {{$message}}
                                 @enderror
                              </div>
                              <div class="form-group col-md-6">
                                 <label for="inputname">name</label>
                                 <input type="text" class="form-control" name="name" id="inputname"
                                    placeholder="enter your name"  value="{{ $quatation->name }}">
                                 @error('name')
                                 {{$message}}
                                 @enderror
                              </div>
                              <div class="form-group col-md-6">
                                 <label for="inputdiscount">discount</label>
                                 <input type="text" class="form-control" name="discount" id="inputdiscount"
                                    placeholder="enter your discount"  value="{{ $quatation->discount }}">
                                 @error('discount')
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