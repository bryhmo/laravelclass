<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="getsession1" method="POST">
        @csrf
        <label for="firstname">FisrtName</label>
        <input type="text" name="firstname">
        <br>
        <br>
        <label for="lastname" >LastName</label>
        <input type="text" name="lastname">
        <br>
        <br>
        <label for="email">Email</label>
        <input type="email" name="email">
        <br>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password">
        <br>
        <br>
        <button type="submit">submit</button>
    </form>
</body>
</html>