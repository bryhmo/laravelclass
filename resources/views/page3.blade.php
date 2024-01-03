<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1><p>URL GENERATION, PAGE THREE ,URL THREE</p></h1>
    <a href="twourl.com">URLTWO</a><br>
    <a href="oneurl.com">URLONE</a>
    <h2 style="color: red;">FROM :{{URL::previous()}} </h2>
    <h3 style="color: green;">my current url is:{{URL::current()}}</h3>
</body>
</html>