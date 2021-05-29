<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <style>
        *{
            color: black;
        }
    </style>
    <b><a href="{{route('productos.index')}}"><img src="http://217.160.5.104/plesk-site-preview/www.milesy.com/https/217.160.5.104/storage/logo6a.png"></a>
    <p>Nuevo mensaje Contacto/Sugerencia @if(Auth::user()!=null) de {{Auth::user()->email}} @endif :</p>

    <p>{{$mensaje['mensaje']}}</p>
    </b>
</body>
</html>
