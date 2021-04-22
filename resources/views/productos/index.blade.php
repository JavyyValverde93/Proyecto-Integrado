<x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <div class="row">
                    <div class="ui search my-auto mx-3">
                        <form action="{{route('productos.index')}}" method="GET" class="form form-inline">
                            @csrf
                            <div class="ui icon input">
                                <input class="prompt form-control px-2" value="{{$scope}}" name="nombre" size="50%" type="text"
                                    placeholder="Buscar..." onchange="this.form.sumbit()">
                                <i class="search icon"></i>
                            </div>

                            @if($request->categoria!=null)
                            <input type="hidden" value="{{$request->categoria}}" name="categoria">
                            @endif

                        </form>
                    </div>
                </div>
            </h2>
        </x-slot>

        <x-alert-message></x-alert-message>
    <style>
        /* Esconder botones de paginación */
        nav[role='navigation']{
            visibility: hidden;
        }

        h5 {
            margin: 0px;
            font-size: 1.4em;
            font-weight: 700;
        }

        p {
            font-size: 12px;
        }

        /* Limitar caracteres por filas */
        .module {
            width: 250px;
            margin: 0 0 1em 0;
            overflow: hidden;
        }

        .module p {
            margin: 0;
        }

        .line-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        /*Recortar imagen*/
        .cardimg {
            width: 16rem;
            height: 12rem;
            overflow: hidden;
            margin: auto;
            position: relative;
        }

        .card-img-top {
            position: absolute;
            left: -100%;
            right: -100%;
            top: -100%;
            bottom: -100%;
            margin: auto;
            min-height: 100%;
            min-width: 100%;
        }

        img:hover,
        .card:hover,
        .card-title:hover {
            transform: scale(1.1)
        }

        #precio {
            font-weight: bold;
        }

        option{
            font-size:20px;
        }

        #next:hover{
            cursor: url(puntero.svg), url(puntero.cur), pointer;
            transform: scale(1.1);
        }

    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container-fluid">
                        <div class="" align="right">
                            <form action="{{route('productos.index')}}" method="GET">
                                <select name="categoria" class="form-control fa rounded my-4" onchange="this.form.submit()">
                                    <option value="">Seleccione la categoría...</option>
                                    <option class="fa" value="Coches" @if($request->categoria!=null && $request->categoria=="Coches") selected @endif>&#xf1b9; Coches</option>
                                    <option class="fa" value="Motos" @if($request->categoria!=null && $request->categoria=="Motos") selected @endif>&#xf21c; Motos</option>
                                    <option class="fa" value="Motor y Accesorios" @if($request->categoria!=null && $request->categoria=="Motor y Accesorios") selected @endif>&#xf5e3; Motor y Accesorios</option>
                                    <option class="fa" value="Inmobiliaria" @if($request->categoria!=null && $request->categoria=="Inmobiliaria") selected @endif>&#xf015; Inmobiliaria</option>
                                    <option class="fa" value="Tv, Audio y Foto" @if($request->categoria!=null && $request->categoria=="Tv, Audio y Foto") selected @endif>&#xf26c; Tv, Audio y Foto</option>
                                    <option class="fa" value="Móviles y Telefonía" @if($request->categoria!=null && $request->categoria=="Móviles y Telefonía") selected @endif>&#xf10b; Móviles y Telefonía</option>
                                    <option class="fa" value="Informática y Electrónica" @if($request->categoria!=null && $request->categoria=="Informática y Electrónica") selected @endif>&#xf109; Informática y Electrónica</option>
                                    <option class="fa" value="Deporte y Ocio" @if($request->categoria!=null && $request->categoria=="Deporte y Ocio") selected @endif>&#xf45f; Deporte y Ocio</option>
                                    <option class="fa" value="Bicicletas" @if($request->categoria!=null && $request->categoria=="Bicicletas") selected @endif>&#xf84a; Bicicletas</option>
                                    <option class="fa" value="Consolas y Videojuegos" @if($request->categoria!=null && $request->categoria=="Consolas y Videojuegos") selected @endif>&#xf11b; Consolas y Videojuegos</option>
                                    <option class="fa" value="Hogar y Jardín" @if($request->categoria!=null && $request->categoria=="Hogar y Jardín") selected @endif>&#xf801; Hogar y Jardín</option>
                                    <option class="fa" value="Cine, Libros y Música" @if($request->categoria!=null && $request->categoria=="Cine, Libros y Música") selected @endif>&#xf008; Cine, Libros y Música</option>
                                    <option class="fa" value="Niños y Bebés" @if($request->categoria!=null && $request->categoria=="Niños y Bebés") selected @endif>&#xf77c; Niños y Bebés</option>
                                    <option class="fa" value="Coleccionismo" @if($request->categoria!=null && $request->categoria=="Coleccionismo") selected @endif>&#xf70f; Coleccionismo</option>
                                    <option class="fa" value="Materiales de construcción" @if($request->categoria!=null && $request->categoria=="Materiales de construcción") selected @endif>&#xf6e3; Materiales de construcción</option>
                                    <option class="fa" value="Industria y Agricultura" @if($request->categoria!=null && $request->categoria=="Industria y Agricultura") selected @endif>&#xf722; Industria y Agricultura</option>
                                    <option class="fa" value="Empleo" @if($request->categoria!=null && $request->categoria=="Empleo") selected @endif>&#xf0b1; Empleo</option>
                                    <option class="fa" value="Servicios" @if($request->categoria!=null && $request->categoria=="Servicios") selected @endif>&#xf554; Servicios</option>
                                    <option class="fa" value="Otros" @if($request->categoria!=null && $request->categoria=="Otros") selected @endif>&#xf069; Otros</option>
                                </select>
                                @if($request->nombre!=null)
                                <input type="hidden" value="{{$request->nombre}}" name="nombre">
                                @endif
                            </form>
                        </div>
                        <div class="row mx-auto" id="prods">
                            @if(Auth::user()!=null)<input type="text" class="hidden" name="uui"
                                value="{{Auth::user()->id}}">@endif
                            @foreach($productos as $item)
                            <div class="col-md-6 col-lg-4 my-3">
                                <div class="card" style="width: 18rem;">
                                    <a href="{{route('productos.show', [$item, 'u=%'])}}" style="text-decoration: none; color: black">
                                        <div class="cardimg">
                                            <img class="card-img-top" src="{{$item->foto1}}" alt="Card image cap">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{$item->nombre}}</h5>
                                            <h4 class="card-title">{{$item->precio}} €</h4>
                                            <h6 class="card-title font-italic">{{$item->categoria}}</h6>
                                            <div class="module line-clamp">
                                                <p class="card-text mr-5">{{$item->descripcion}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div id="links" align="center">
                            <a onclick="cargaProd()" id="next" class="btn rounded-pill p-3 px-4" style="background-color: #10FA91"><i class="far fa-plus-circle"></i> Cargar más productos</a>
                        </div>
                        {{$productos->appends($request->except('page'))->links()}}

                        <script>
                            //Variable para guardar en enlace usado
                            var prevPage = null;

                            //Variables para guardar los dígitos de los números de la página
                            n1 = null;
                            n2 = null;
                            n3 = null;

                            //Variable para controlar numerosas llamadas a cargar productos
                            intento = 1;

                            var enlase = document.getElementById('links').nextElementSibling.firstElementChild.lastElementChild.href;

                            var enlace = "";

                            let httpRequest = new XMLHttpRequest();

                            //Devuelve el número de la página, después del page= del enlace
                            function numPage(enl) {
                                for (i = 1; i <= 4; i++) {
                                    if (enl[enl.length - i] != "=") {
                                        if (n1 == null) {
                                            n1 = enl[enl.length - i];
                                        } else {
                                            if (n2 == null) {
                                                n2 = enl[enl.length - i] * 10;
                                            } else {
                                                if (n3 == null) {
                                                    n3 = enl[enl.length - i] * 100;
                                                }
                                            }
                                        }
                                    } else {
                                        break;
                                    }
                                }
                                if (n2 != null) {
                                    n = n1 + n2;
                                    if (n3 != null) {
                                        n = n + n3;
                                    }
                                } else {
                                    n = n1;
                                }
                                n1 = +n + 1;

                                if (prevPage == null) {
                                    prevPage = enl;
                                } else {
                                    prevPage = enl.replace("page=" + n, "page=" + n1);
                                }
                                n1 = null;
                                n2 = null;
                                n3 = null;
                            }

                            function cargaProd(e) {

                                if(intento==1){
                                    intento=0;
                                    if (prevPage == null) {
                                        numPage(enlase);
                                    } else {
                                        //Le suma 1 al page del enlace anterior
                                        numPage(prevPage);
                                    }

                                    enlace = prevPage;


                                    httpRequest.open('GET', enlace, true);
                                    httpRequest.overrideMimeType('text/html');
                                    httpRequest.send(null);
                                    httpRequest.LOADING = cargando;
                                    httpRequest.onload = procesarRespuesta;
                                }
                            }
                            //Crea un nuevo DOM con el enlace de la siguiente página, coge los productos y los trae a esta
                            function procesarRespuesta() {
                                var respuesta = httpRequest.responseText;
                                var dom2 = new DOMParser();
                                var doc = dom2.parseFromString(respuesta, 'text/html');

                                var pag = doc.querySelector('#prods').innerHTML;
                                document.querySelector('#prods').innerHTML = document.querySelector('#prods').innerHTML + pag;

                                history.pushState(null, "", enlace);

                                intento = 1;
                            }

                            function cargando(){
                                document.querySelector('#prods').innerHTML = document.querySelector('#prods').innerHTML + "<img src={{asset('storage/img/loading.gif')}}>";
                            }

                        </script>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
