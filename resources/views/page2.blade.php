<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="padding: 20%;">

@include('page1')

<x-headercomponent data="hello im page 2"/>
<h1><p>URL GENERATion, PAGE TWO ,URL TWO</p></h1>
    <a href="oneurl.com">URLONE</a><br>
    <a href="threeurl.com">URLTHREE</a>
    <h2 style="color: red;">FROM :{{URL::previous()}} </h2>
    <h3 style="color: green;">my current url is:{{URL::current()}}</h3>
</body>
</html>