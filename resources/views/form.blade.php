<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Token</title>
</head>
<body>

<form action="{{url('/form')}}" method="POST">

    <label for="name">
        <input type="text" name="name" >
    </label>
    <input type="hidden" name="">

    <input type="submit" value="say Hello">
    <input type="hidden" name="_token"  value="{{csrf_token()}}">
</form>

</body>
</html>
