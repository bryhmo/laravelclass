<h1 style="text-align: center;color:red">file upload</h1>
<form   style="text-align: center" 
    action="{{route('file.upload')}}" 
     method="POST"
     enctype="multipart/form-data">
    @csrf
<label for="file">File Upload</label>
<br>
<br>
<input type="file" name="photo">
<br>
<br>
<button type="submit">submit</button>
</form>