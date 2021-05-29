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
    <p>Nuevo mensaje de: <a href="{{route('ver_perfil', Auth::user()->id)}}"> {{Auth::user()->name}} </a>- {{Auth::user()->email}}</p>
    <p>Este usuario está interesado en su producto <a href="{{route('productos.show', $mensaje['id'])}}">{{$mensaje['producto_nombre']}}</a> publicado en <a href="{{route('productos.index')}}">Milesy</a></p>

    <p>{{$mensaje['mensaje']}}</p>
    </b>
</body>
</html>
