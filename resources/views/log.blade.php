<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>loginpage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

    @if(session()->has('error'))
    <h1 style="color: red;text-align:center">
        {{session('error')}}
    </h1>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <h4>login</h4><hr>

                <form action="{{route('student.session')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="firstname">Name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="enter your firstname" value="{{old('firstname')}}" required>
                        @error('firstname') <span class="text-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="text" class="form-control" name="lastname" placeholder="enter your lastname" value="{{old('lastname')}}">
                        @error('lastname') <span class="text-danger">{{$message}}</span>@enderror
                    </div>


                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="enter your phone" value="{{old('email')}}">
                        @error('name') <span class="text-danger">{{$message}}</span>@enderror
                    </div>
                    <button class="btn btn-primary">login</button>

                </form>
    
</body>
</html>