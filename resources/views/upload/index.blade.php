<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload</title>
</head>
<body>
<div>
    @if(session('message'))
        <p>{{session('message')}}</p>
    @endif

</div>
<form action="{{ route('file.upload') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="uploadFile">Masukkan gambar</label>
        <input type="file" name="uploadFile" id="uploadFile">
        @if($errors->has('uploadFile'))
            <p>{{$errors->first('uploadFile')}}</p>
        @endif
    </div>

    <button type="submit">Upload</button>
</form>
</body>
</html>
