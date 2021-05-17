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
    <p>Nuevo mensaje Contacto/Sugerencia @if(Auth::user()!=null) de {{Auth::user()->email}} @endif :</p>

    <p>{{$mensaje['mensaje']}}</p>
    </b>
</body>
</html>
