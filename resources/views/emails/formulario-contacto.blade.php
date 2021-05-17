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
    <b><a href="{{route('productos.index')}}"><img src="https://lh3.googleusercontent.com/RS6nQe9WPzM4yC9yWk9VsszAkOgZUOE2Emhbq5Vq7kWkCu3uEgyR9FjB09ebEQ0DsjsBJ_A=s170"></a>
    <p>Nuevo mensaje de: <a href="{{route('ver_perfil', Auth::user()->id)}}"> {{Auth::user()->name}} </a>- {{Auth::user()->email}}</p>
    <p>Este usuario está interesado en su producto <a href="{{route('productos.show', $mensaje['id'])}}">{{$mensaje['producto_nombre']}}</a> publicado en <a href="{{route('productos.index')}}">Milesy</a></p>

    <p>{{$mensaje['mensaje']}}</p>
    </b>
</body>
</html>
