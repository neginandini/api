<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
{{$b}}
<select>
    @foreach($drop as $d)
<option value="{{$d->id}}"  >{{$d->sname}}</option>
@endforeach

</body>
</html>