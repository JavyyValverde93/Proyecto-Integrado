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
    <p>Nuevo mensaje Contacto/Sugerencia @if(Auth::user()!=null) de {{Auth::user()->email}} @endif :</p>

    <p>{{$mensaje['mensaje']}}</p>
    </b>
</body>
</html>
