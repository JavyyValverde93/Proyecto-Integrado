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
    <b><a href="{{route('productos.index')}}"><img src="https://lh3.googleusercontent.com/IWFfy1G9U9YNsOM5_uC35Aqw7KMC3pCdtYro91oxt2wBx54pM-7YrohJRk36f_hqB0g-5Q=s170"></a>
    <p>Nuevo mensaje de: {{Auth::user()->name}} - {{Auth::user()->email}}</p>
    <p>Este usuario está interesado en su producto <a href="{{route('productos.show', $mensaje['id'])}}">{{$mensaje['producto_nombre']}}</a> publicado en <a href="{{route('productos.index')}}">Milesy</a></p>

    <p>{{$mensaje['mensaje']}}</p>
    </b>
</body>
</html>
