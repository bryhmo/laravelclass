

<h1 style="color: red;text-align:center">Students Records</h1>


<table border="1" style="margin-left: 15%">
    <tr>
        <th>ID</th>
        <th>LASTNAME</th>
        <th>FIRSTNAME</th>
        <th>OTHERNAME</th>
        <th>EMAIL</th>
        <th>STUDENTID</th>
        <th>SEMESTER</th>
        <th>PHONE</th>

    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{$user['id']}}</td>
        <td>{{$user['lastname']}}</td>
        <td>{{$user['firstname']}}</td>
        <td>{{$user['othername']}}</td>
        <td>{{$user['studentid']}}</td>
        <td>{{$user['semester']}}</td>
        <td>{{$user['email']}}</td>
        <td>{{$user['phone']}}</td>
     
    </tr> 
    @endforeach
</table>
