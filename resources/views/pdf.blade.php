<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Pdf</title>
        <style>
            table, th, td 
        {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 15px;
        }
        div.subtotal
        {
            font-size:20px;
            text-align:right;
        }
        </style>
</head>
<body>  
      
    <div style=" text-align:center;">Quatationpdf</div>
    <div>
        <label for="">CurrentDate:</label>
        <input type="date" style="width: 200px;" id="currentDate" value="{{ $date }}" >
        <br><br>
    </div>
    <div >
        <label for="inputname">client name :</label>
        <input type="text" style="width: 200px;" class="form-control" value="{{$quatations->clients->name}}">
        <br><br>
    </div>
    <div>
        <label for="inputquatation_no">quatation_no:</label>
        <input type="text" style="width: 200px;" class="form-control" value="{{$quatations->quatation_no}}">
        <br><br>
    </div>
    <div style="font-size:20px; text-align:left;" >Product Details</div>
        <table  class="table">
            <tbody>
                <thead>
                    <tr>
                        <th scope="col">Sr no</th>      
                        <th scope="col">productname</th>
                        <th scope="col">rate </th>
                        <th scope="col">qty</th>
                        <th scope="col">discount</th>
                        <th scope="col">total</th>
                    </tr>
                </thead>   
                @if(count($quatations_items))       
                @foreach($quatations_items as $new_value)
                   
                    <tr>
                        <td scope="row">{{$loop->iteration}}</td>
                        <td>{{ $new_value->products->name}}</td>
                        <td>{{ $new_value->rate}}</td>
                        <td>{{ $new_value->qty}}</td>
                        <td>{{$new_value->quatations->discount}}</td>
                        <td ><input  value="{{ ($new_value->total) - ($new_value->total * $new_value->quatations->discount/100)  }} "  style="width: 90px;"  readonly></td>
                        
                    </tr>
                    
                    @endforeach
                 @endif  

            </tbody>
        </table> 
        <div class="subtotal"  style="float: right; margin-right: 138px;" >
        <span>Subtotal</span>
        <input type="text"  style="border: solid; width: 100px;" value="{{ $total_amount}} ">

        </div>
    </body>
</html>
        