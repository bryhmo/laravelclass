<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    @if(session()->has('message'))
    <div class="alert alert-success" x-data="{show: true}" x-init="setTimeout(() => show = false,3000)" x-show="show"  style="text-align: center;color:green">
        {{ session()->get('message') }}
    </div>
@endif
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <h5 style="text-align:center;color:red">welcome {{$users->firstname}}</h5><hr>
                <h4 style="text-align:center;color:green"> update your profile </h4><hr>

                <form action="/update/{{$users->id}}" method="POST">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="firstname">Name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="enter your firstname" value="{{$users->firstname}}" required>
                        @error('firstname') <span class="text-danger">{{$message}}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input type="text" class="form-control" name="lastname" placeholder="enter your lastname" value="{{$users->lastname}}">
                        @error('lastname') <span class="text-danger">{{$message}}</span>@enderror
                    </div>

                   

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="enter your email" value="{{$users->email}}">
                        @error('email') <span class="text-danger">{{$message}}</span>@enderror
                    </div>

                   

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" placeholder="enter your password" value="{{$users->password}}">
                        @error('password') <span class="text-danger">{{$message}}</span>@enderror
                    </div>


                    <button class="btn btn-primary ">Update</button>

                </form>
            </div>
        </div>

    </div>
</body>
</html>