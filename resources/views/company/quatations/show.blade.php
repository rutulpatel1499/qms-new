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
                     Quatation Show Forms
                  </h5>
               </div>
               <div>
                  <a href="{{ route('pdfGenrate', $quatation->id) }}" style="margin-left:900px; margin-top:-36px; font-size:25px;" class="btn btn-success">PDF GENRATE</a>
                  <!-- <button style="margin-left: 1000px;"class="btn btn-success">Pdf Genrate</button> -->
               </div>
               <div class="card-body">
                  <div class="form-row">
                     <div class="form-group col-md-12">
                        <form >
                           @csrf
                           <div class="row">
                              <div class="form-group col-md-6">
                                 <label>client_id:</label>
                                 <input type="text"  class="form-control"  name="client_id" 
                                    value="{{$quatation->clients->name}}" disabled>                       
                              </div>
                              <div class="form-group col-md-6">
                                 <label for="inputquatation_no">quatation_no</label>
                                 <input type="text" class="form-control" name="quatation_no" id="inputquatation_no"
                                    placeholder="enter your quatation_no"  value="{{ $quatation->quatation_no }}"disabled>
                               
                              </div>
                              <div class="form-group col-md-6">
                                 <label for="inputname">name</label>
                                 <input type="text" class="form-control" name="name" id="inputname"
                                    placeholder="enter your name"  value="{{ $quatation->name }}"disabled>
                                
                              </div>
                              <div class="form-group col-md-6">
                                 <label for="inputdiscount">discount</label>
                                 <input type="text" class="form-control" name="discount" id="inputdiscount"
                                    placeholder="enter your discount"  value="{{ $quatation->discount }}"disabled>
        
                              </div>
                              
                           </div>
                        </form>
                        <h1>quatation_item table</h1>
                        <div class="card-body">
                        <div class="table-responsive">
                           <table class="table">
                     
                              <tbody>
                       
                                 <thead>
                                    <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">quatation_id</th>
                                       <th scope="col">productname</th>
                                       <th scope="col">rate</th>
                                       <th scope="col">qty</th>
                                       <th scope="col">discount</th>
                                       <th scope="col">total</th>
                                 
                                    </tr>
                                 </thead>
                                 @foreach($quatations_items as $quatations)
                                
                                 <tr>
                                    <td scope="row">{{$loop->iteration}}</td>
                                    <td>{{ $quatations->quatations->name}}</td>
                                    <td>{{ $quatations->products->name}}</td>
                                    <td>{{ $quatations->rate}}</td>
                                    <td>{{ $quatations->qty}}</td>
                                    <td>{{$quatations->quatations->discount}}</td>
                                    <td ><input  value="{{ ($quatations->total)- ($quatations->total * $quatations->quatations->discount/100)  }} "  style="width:200px;"  readonly></td>
                                 </tr>
                                 @endforeach
                           
                              </tbody>
                           </table>
                        </div>
                        </div>
                        <div style="float: right; margin-right: 121px;" > 
                           <span style="" >Subtotal</span>
                           <input style="border: solid; width:200px; mar" value="{{$total_amount }}" readonly>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection

