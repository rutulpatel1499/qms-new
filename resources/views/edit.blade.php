<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>

<style>
    
    .hm-gradient {
    background-image: linear-gradient(to top, #f3e7e9 0%, #e3eeff 99%, #e3eeff 100%);
    border:solid;
    width:500px;
    
}

</style>
<body>
    <h1>new form</form></h1>
    <div >
    <form action="{{ route('form.update',$user->id)}}" class="hm-gradient"  method="post">
        @csrf
        {{ method_field('PATCH') }}
     
    
        <div>
            <label for="">firstname</label>
            <input type="text" class='form-control' name="firstname" placeholder="name" value="{{$user->firstname}}" >
        </div>
        <br>
        <div>
            <label for="">lastname</label>
            <input type="text" class='form-control' name="lastname" placeholder="name" value="{{$user->lastname}}" >
        </div>
        <br>
        <div>
            <label for="">email</label>
            <input type="text" class="form-control" name="email" placeholder="email" value="{{$user->email}}" >
        </div>
        <br>
        <div>
            <label for="">contactnumber</label>
            <input type="text" class="form-control" name="contactnumber"placeholder="contactnumber" value="{{$user->contactnumber}}" >
        </div>
        <div>
            <label for="">address</label>
            <input type="text" class="form-control" name="address"placeholder="contactnumber" value="{{$user->address}}" >
        </div>
        <div>
            <label for="">dateofbirth</label>
            <input type="text" class="form-control" name="dateofbirth"placeholder="dateofbirth" value="{{$user->dateofbirth}}" >
        </div>
        <br>
        <div class="text-center py-4">
                    <button class="btn btn-success">submit </button>
                </div>
    </form>
    </div>
</body>
</html>