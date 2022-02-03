<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
    <title>Document</title>
</head>
<body>
    <div>
    <table class="table">                            
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">firstname</th>
            <th scope="col">lastname</th>
            <th scope="col">email</th>
            <th scope="col">contactnumber</th>
            <th scope="col">address</th>
            <th scope="col">dateofbirth</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td scope="row">{{$loop->iteration}}</td>
                    <td>{{$user->firstname}}</td>
                    <td>{{$user->lastname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->contactnumber}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->dateofbirth}}</td>
                    <td>
                        <a href="{{ route('form.show',$user->id) }} " class="btn btn-primary">view</a>
                        <a href="{{ route('form.edit',$user->id) }} "class="btn btn-success">edit</a>
                        <form action="{{route('form.destroy',$user->id)}}"  style="display: contents;"  method="POST" >
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">delete</button>
                        </form>                       
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
</html>