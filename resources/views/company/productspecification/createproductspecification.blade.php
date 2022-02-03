@extends('company.commons.main')
@section('title')
<title>productspecification</title>
@endsection
@section('css')
<style>
    .error{
    color:red;
    }
    .button {
  position: relative;
  background-color: #04AA6D;
  border: none;
  font-size: 18px;
  color: #FFFFFF;
  padding: 10px;
  width: 150px;
  text-align: center;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  text-decoration: none;
  overflow: hidden;
  cursor: pointer;
}

.button:after {
  content: "";
  background: #90EE90;
  display: block;
  position: absolute;
  padding-top: 300%;
  padding-left: 350%;
  margin-left: -20px!important;
  margin-top: -120%;
  opacity: 0;
  transition: all 0.8s
}

.button:active:after {
  padding: 0;
  margin: 0;
  opacity: 1;
  transition: 0s

}
</style>
@section('content')
<section class="admin-content">
        <div class="bg-dark">
            <div class="container  m-b-30">
                <div class="row">
                    <div class="col-12 text-white p-t-40 p-b-90">

                        <h4  style="margin-top: 100px;" class=""> 
                        </h4>
                       
                    </div>
                </div>
            </div>
        </div>

        <div class="container  pull-up">
            <div class="row">
                <div class="col-lg-12">

                    <!--widget card begin-->
                    <div class="card m-b-30">
                        <div class="card-header">
                        @foreach(['success', 'danger'] as $key)
                            @if(Session::has($key))
                            <div class="alert alert-{{ $key }} alert-block">
                                <button type="button" class="close" data-dismiss='alert'>x</button>
                                {{ Session::get($key) }}
                            </div>
                            @endif
                        @endforeach
                            <h5 class="m-b-0">
                               Create Productspecification Forms
                            </h5>
                         
                        </div>
                        <div class="card-body ">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <form action="{{ route('productspecification.store')}}" id="mainuser" method="post">
                                        @csrf
                                        <div class="row">
                                            
                                            <div class="form-group col-md-6">
                                            <label for="inputproduct_id">product_id</label>
                                                <select name="product_id"    class ="form-control" id="product_id" >
                                                <option selected disabled>select your product_id</option>
                                                @foreach($products as $product_id)
                                                    <option value="{{ $product_id->id }}">{{ $product_id->name }}</option>
                                                @endforeach
                                                </select>
                                                @error('product_id')
                                                {{$message}}
                                                @enderror
                                            </div>
                                           
                                            <div class="form-group col-md-6">
                                                <label for="inputkey">key</label>
                                                <input type="text" class="form-control" name="key" id="inputkey"
                                                    placeholder="enter your key">
                                                 @error('key')
                                                {{$message}}
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputvalue">value</label>
                                                <input type="text" class="form-control" name="value" id="inputvalue"
                                                    placeholder="enter your value">
                                                @error('value')
                                                {{$message}}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <button class="button">Submit</button>
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
@section('scripts')

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
    
    $(document).ready(function(){
        $("#mainuser").validate({
            errorElement: 'span',
            rules: {
                product_id:{required: true},
                key:{required: true},
                value:{required: true},
               },
            messages: {
                    product_id: {
                    required: " product_id always required."
                  },
                 
                 key: {
                    required: " key always required."
                  },
                 value: {
                    required: " value always required."
                  },
                
            },
            submitHandler: function(form) {
                if ($('#mainuser').valid()) {
                    form.submit();
                }
                else {
                    return false;
                }
            }
        });
    });
</script>

@endsection           


                                        
                  
                   
                
               
