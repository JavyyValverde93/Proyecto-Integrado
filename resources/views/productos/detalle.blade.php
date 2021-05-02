<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('css/detalle_producto.css')}}">
    <script src="{{asset('js/detalle_producto.js')}}"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-message></x-alert-message>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="m-1 p-3 rounded row" style="border: solid 1px #21ba454e; background-color:rgba(238, 238, 238, 0.313)">
                    <div class="col-10">
                        <div class="row">
                            <div class="col-auto">
                                <a href="{{route('ver_perfil', $producto->user->id)}}" style="color: black;">
                                    <img src="{{asset($producto->user->foto)}}" class="rounded-circle" style="max-height: 70px; max-with:70px">
                                </a>

                            </div>
                            <div class="col float-left">
                                <a href="{{route('ver_perfil', $producto->user->id)}}" style="color: black">
                                    <b>{{$producto->user->name}}</b>
                                    <br><i>{{$producto->user->ciudad}}</i>
                                </a>
                            </div>
                        </div>


                    </div>
                    <div class="col-2 my-auto">
                        {{-- Si el usuario logueado es el propietario del anuncio o admin puede modificarlo --}}
                        @if(Auth::user()!=null && Auth::user()==$producto->user || Auth::user()!=null && Auth::user()->tipo==1)
                            <a href="{{route('productos.edit', $producto)}}" style="color:#10FA91"><i class="far fa-edit fa-2x"></i></a>
                        @else
                            @if(count($guardados)>=1)
                                <i class="fas fa-bookmark fa-2x float-right my-auto" onclick="quitar()"></i>
                            @else
                                <i class="far fa-bookmark fa-2x float-right my-auto" onclick="guardar()"></i>
                            @endif
                            {{-- Formulario guardar productos en favoritos y enviar id  --}}
                            <form @if(Auth::user()!=null) action="{{route('guardar', Auth::user()->id)}}" @endif method="GET" name="save_prod">
                            <input type="text" name="ui" class="hidden" value="{{$producto->id}}">
                            </form>
                            {{-- Formulario quitar producto de favoritos y enviar id --}}
                            @foreach($guardados as $save)
                            <form action="{{route('guardados.destroy', $save)}}" method="POST" name="delete_prod">
                                @csrf
                                @method('DELETE')
                            </form>
                            @endforeach
                        @endif

                    </div>
                </div>

                <div class="p-6 bg-white border-b border-gray-200 mt-5">


                    <div class="dado-molon row mt-2 ml-2">
                        <div class="cube-container col-lg-6 col-md-12">

                            <div class="cube initial-position cardimg mt-0">

                                <img class="cube-face-image image-1 card-img-top" src="{{asset($producto->foto1)}}">
                                @if($producto->foto2!=null)
                                <img class="cube-face-image image-2 card-img-top" src="{{asset($producto->foto2)}}">
                                @else
                                <img class="cube-face-image image-2 card-img-top" src="{{asset('storage/logo2.png')}}">
                                @endif
                                @if($producto->foto3!=null)
                                <img class="cube-face-image image-3 card-img-top" src="{{asset($producto->foto3)}}">
                                @else
                                <img class="cube-face-image image-3 card-img-top" src="{{asset('storage/logo2.png')}}">
                                @endif
                                @if($producto->foto4!=null)
                                <img class="cube-face-image image-4 card-img-top" src="{{asset($producto->foto4)}}">
                                @else
                                <img class="cube-face-image image-4 card-img-top" src="{{asset('storage/logo2.png')}}">
                                @endif
                                @if($producto->foto5!=null)
                                <img class="cube-face-image image-5 card-img-top" src="{{asset($producto->foto5)}}">
                                @else
                                <img class="cube-face-image image-5 card-img-top" src="{{asset('storage/logo2.png')}}">
                                @endif
                                @if($producto->foto6!=null)
                                <img class="cube-face-image image-6 card-img-top" src="{{asset($producto->foto6)}}">
                                @else
                                <img class="cube-face-image image-6 card-img-top" src="{{asset('storage/logo2.png')}}">
                                @endif
                            </div>
                        </div>

                        <div class="image-buttons col-6 mx-auto">

                            <input type="image" class="show-image-1" src="{{asset($producto->foto1)}}">
                            @if($producto->foto2!=null)
                            <input type="image" class="show-image-2" src="{{asset($producto->foto2)}}">
                            @else
                            <input type="image" class="show-image-2" src="{{asset('storage/logo2.png')}}">
                            @endif
                            <p></p>
                            @if($producto->foto3!=null)
                            <input type="image" class="show-image-3" src="{{asset($producto->foto3)}}">
                            @else
                            <input type="image" class="show-image-3" src="{{asset('storage/logo2.png')}}">
                            @endif
                            @if($producto->foto4!=null)
                            <input type="image" class="show-image-4" src="{{asset($producto->foto4)}}">
                            @else
                            <input type="image" class="show-image-4" src="{{asset('storage/logo2.png')}}">
                            @endif
                            <p></p>
                            @if($producto->foto5!=null)
                            <input type="image" class="show-image-5" src="{{asset($producto->foto5)}}">
                            @else
                            <input type="image" class="show-image-5" src="{{asset('storage/logo2.png')}}">
                            @endif
                            @if($producto->foto6!=null)
                            <input type="image" class="show-image-6" src="{{asset($producto->foto6)}}">
                            @else
                            <input type="image" class="show-image-6" src="{{asset('storage/logo2.png')}}">
                            @endif
                        </div>
                    </div>

                    <div class="p-4">

                    </div>

                    <div class="mb-5 mx-5 p-2 mt-5" style="font-size:1.5em; background: rgba(214, 212, 212, 0.097)">
                        <b>{{$producto->nombre}}</b><i class="float-right mx-3"><i class="far fa-eye"></i> {{$producto->visualizaciones}}<i class="far fa-bookmark ml-3"></i> {{$favoritos}}</i> <br>
                        <i style="font-size: 0.7em">{{$producto->categoria}}</i><br>
                        <p>{{$producto->precio}}€</p>
                        <p style="font-size: 1em">{{$producto->descripcion}}</p>
                    </div>

                    {{-- Galería de imágenes --}}
                    <style>
                        #galeria img{
                            border: solid 2px #10FA91;
                            margin-top: 20px;
                            max-height: 500px;
                            max-width: 500px;
                        }

                        strong{
                            font-size: 3em;
                        }
                    </style>
                    <div align="center" style="background-color: rgba(214, 212, 212, 0.097)">
                        <strong>Galería de imágenes</strong>
                    </div>

                    <div class="row my-5">
                        <div class="col-10 mx-auto" id="galeria" align="center">
                            <img src="{{asset($producto->foto1)}}">
                            @if($producto->foto2!=null)
                            <img src="{{asset($producto->foto2)}}">
                            @endif
                            @if($producto->foto3!=null)
                            <img src="{{asset($producto->foto3)}}">
                            @endif
                            @if($producto->foto4!=null)
                            <img src="{{asset($producto->foto4)}}">
                            @endif
                            @if($producto->foto5!=null)
                            <img src="{{asset($producto->foto5)}}">
                            @endif
                        </div>

                    </div>

                    {{-- Comentarios y preguntas --}}
                    <div class="justify-center">
                        <div class="row mt-0 justify-center">
                            <nav class="compreg">
                                <div class="nav nav-tabs col-12 mx-auto" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active px-5" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Comentarios</a>
                                <a class="nav-item nav-link px-5" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Preguntas</a>
                                </div>
                            </nav>
                        </div>
                        <div class="row justify-center">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" style="max-width: 400px;" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <div style="max-width: 400px; max-height:400px; overflow-y:scroll">
                                        <?php $coment = 0; ?>
                                        @foreach($comentarios as $coments)
                                            <div class="p-3 rounded mt-2" style="background-color: @if($coment%2==0) #10FA91 @else #21ba45 @endif">
                                                <form action="{{route('comentarios.destroy', $coments)}}" method="POST">
                                                <p>@if($coment%2==1) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @endif
                                                    <a href="{{route('ver_perfil', $coments->user->id)}}" class="p-0" style="color: black"><b>{{$coments->user->name}}: </b></a>{{$coments->comentario}}
                                                        @csrf
                                                        @if(Auth::user()!=null && Auth::user()->id==$coments->user->id || Auth::user()!=null && Auth::user()->tipo==1)
                                                        @method('DELETE')
                                                        <button type="submit" style="color:red; font-size:17px;" class="float-right"><i class="far fa-times-circle"></i></button>
                                                        @endif
                                                    </form>
                                                    @foreach($resPreg as $res)
                                                    @if($res->comentario->id==$coments->id)
                                                    <form action="{{route('respuestas.destroy', $res)}}" method="POST">
                                                            <a href="{{route('ver_perfil', $coments->user->id)}}" class="p-0" style="color: black">&nbsp;<b>{{$res->user->name}}: </b></a>{{$res->respuesta}}
                                                                @csrf
                                                                @if(Auth::user()!=null && Auth::user()->id==$res->user->id || Auth::user()!=null && Auth::user()->tipo==1)
                                                                @method('DELETE')
                                                                <button type="submit" style="color:red; font-size:17px;" class="float-right"><i class="far fa-times-circle"></i></button>
                                                                @endif
                                                            </form>

                                                    @endif
                                                    @endforeach
                                                    @if(Auth::user()!=null)
                                                    <form action="{{route('respuestas.store', ['idp='.$producto->id, 'idc='.$coments->id, 'idu='.Auth::user()->id])}}" method="POST">
                                                        @csrf
                                                        <input type="text" name="respuesta" placeholder="Respuesta comentario..." onchange="this.form.submit()">
                                                        <button type="submit" class="ui button">Responder</button>
                                                    </form>
                                                    @endif

                                                </p>
                                            </div>
                                            <?php $coment ++; ?>
                                        @endforeach
                                        @if($coment==0) <div class="p-3 rounded-pill mt-3" align="center" style="background-color: #10fa91a7; border-color: 1px solid #21ba45">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{__('Sin comentarios')}}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div> @endif
                                        <p></p>
                                    </div>
                                    <form action="{{route('comentarios.store')}}" class="my-4" method="POST" name="com">
                                        @csrf
                                        @if(Auth::user()!=null)<input type="text" class="hidden" value="{{Auth::user()->id}}" name="user_id">
                                        <input type="text" class="hidden" value="{{$producto->id}}" name="producto_id">
                                        <textarea cols="40" style="width: 100%" name="comentario" placeholder="Escriba aquí para comentar este producto..."></textarea><br>
                                        <button type="submit" class="btn btn-primary float-right mt-2">Enviar comentario</button>
                                        @endif
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" style="max-width: 400px" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <div style="max-width: 400px; max-height:400px; overflow-y:scroll">
                                        <?php $coment = 0; ?>
                                        @foreach($preguntas as $preg)
                                            <div class="p-3 rounded mt-2" style="background-color: @if($coment%2==0) #3be8b0 @else #00b2a9 @endif">
                                                <p id="preguntax"><a href="{{route('ver_perfil', $preg->user->id)}}" style="color: black"><b>{{$preg->user->name}}: </b></a>{{$preg->pregunta}}</p>
                                                @if(Auth::user()!=null && Auth::user()->id==$preg->user->id || Auth::user()!=null && Auth::user()->tipo==1)
                                                @if($preg->respuesta!=null)
                                                <form action="{{route('preguntas.destroy', [$preg, 'p=|'])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{__('Respuesta del vendedor')}}: </b>{{$preg->respuesta}}
                                                    <button type="submit" class="btn btn-danger" name="hidd">Eliminar respuesta</button>
                                                    </p>
                                                </form>
                                                @else
                                                <form action="{{route('preguntas.update', $preg)}}" method="POST" autocomplete="off">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="text" name="respuesta" placeholder="Respuesta a {{$preg->user->name}}: ">
                                                    <button type="submit" class="ui button mt-2">Enviar respuesta</button>
                                                </form>
                                                @endif
                                                @endif
                                            </div>
                                            <?php $coment ++; ?>
                                        @endforeach
                                    </div>

                                    @if($coment==0)
                                    <div class="p-3 rounded-pill mt-3" align="center" style="background-color: #10fa91a7; border-color: 1px solid #21ba45">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>{{__(' Sin Preguntas')}}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </div>
                                    @endif
                                    <form action="{{route('preguntas.store')}}" method="POST">
                                        @csrf
                                        @if(Auth::user()!=null)
                                        <input type="text" class="hidden" value="{{Auth::user()->id}}" name="user_id">
                                            @if(Auth::user()->id!=$producto->user->id)
                                                <input type="text" class="hidden" value="{{$producto->id}}" name="producto_id">
                                                <textarea name="pregunta" style="width: 100%" class="mt-3" cols="50" placeholder="Escriba aquí para preguntar sobre este producto..."></textarea><br>
                                                <button type="submit" class="btn btn-primary float-right">Enviar pregunta</button>
                                            @endif
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        function getFullscreen(element){
        if(element.requestFullscreen) {
            element.requestFullscreen();
            } else if(element.mozRequestFullScreen) {
            element.mozRequestFullScreen();
            } else if(element.webkitRequestFullscreen) {
            element.webkitRequestFullscreen();
            } else if(element.msRequestFullscreen) {
            element.msRequestFullscreen();
            }
        }

        var imagen = document.getElementsByClassName('cube-face-image')[0];
        var imagen2 = document.getElementsByClassName('cube-face-image')[1];
        var imagen3 = document.getElementsByClassName('cube-face-image')[2];
        var imagen4 = document.getElementsByClassName('cube-face-image')[3];
        var imagen5 = document.getElementsByClassName('cube-face-image')[4];
        var imagen6 = document.getElementsByClassName('cube-face-image')[5];

        imagen.addEventListener("dblclick", function(e){
        getFullscreen(this);
        },false);

        imagen2.addEventListener("dblclick", function(e){
        getFullscreen(this);
        },false);

        imagen3.addEventListener("dblclick", function(e){
        getFullscreen(this);
        },false);

        imagen4.addEventListener("dblclick", function(e){
        getFullscreen(this);
        },false);

        imagen5.addEventListener("dblclick", function(e){
        getFullscreen(this);
        },false);

    </script>

</x-app-layout>
