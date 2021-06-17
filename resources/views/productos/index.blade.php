<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{asset('css/index.css')}}">
        <script src="https://momstudio.es/img/img-elmaquetadorweb/cookieconsent.min.js"></script>
        <style>
            /* Esconder botones de paginación */
            nav[role='navigation'] {
                visibility: hidden;
            }

        </style>
        <datalist id="ciudades">
            <option>Cualquier Lugar</option>
            @auth
            <option>{{Auth::user()->ciudad}}</option>
            @endauth
            @foreach ($ciudades as $item)
            <option value="{{$item->ciudad}}" @if($request->ciudad==$item->ciudad) selected @endif>{{$item->ciudad}}
            </option>
            @endforeach
        </datalist>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="row">
                <div class="ui search my-auto mx-3 col-auto mt-2">
                    <form action="{{route('productos.index')}}" method="GET" class="form form-inline">
                        @csrf
                        <div class="ui icon input">
                            <input class="prompt form-control px-2" value="{{$scope}}" name="nombre" size="50%"
                                type="text" placeholder="Buscar..." onchange="this.form.sumbit()" autofocus>
                            <i class="search icon"></i>
                        </div>

                        @if($request->categoria!=null)
                        <input type="hidden" value="{{$request->categoria}}" name="categoria">
                        @endif

                        @if($request->ordenar!=null)
                        <input type="hidden" value="{{$request->ordenar}}" name="ordenar">
                        @endif
                        <input type="hidden" name="ciudad" value="{{$request->ciudad}}">

                    </form>

                </div>
                <div class="col" align="right">

                </div>
                <form action="{{route('productos.index')}}" class="col-md-auto col-xs-4 mt-2" method="GET">
                    @csrf
                    <i class="fal fa-map-marker-alt mr-2"></i>
                    @php if($request->ciudad=="%"){$request->ciudad="";} @endphp
                    <input class="p-2 rounded formIndex" list="ciudades" placeholder="Buscar en..."
                        value="{{$request->ciudad}}" onchange="this.form.submit()" name="ciudad"
                        style="border: solid 2px black;">
                    <input type="hidden" value="{{$request->categoria}}" name="categoria">
                    <input type="hidden" value="{{$request->ordenar}}" name="ordenar">
                    <input type="hidden" name="nombre" value="{{$request->nombre}}">
                </form>
                <form action="{{route('productos.index')}}" class="col-md-auto col-xs-4 mt-2" method="GET">
                    @csrf
                    <i class="fas fa-sort mr-3"></i><select class="formIndex" name="ordenar"
                        onchange="this.form.submit()">
                        <option value="">Ordenar por...</option>
                        <option value="viejos" @if($request->ordenar=='viejos') selected @endif>Más viejos</option>
                        <option value="nuevos" @if($request->ordenar=='nuevo') selected @endif>Más nuevos</option>
                        <option value="precio-bajo" @if($request->ordenar=='precio-bajo') selected @endif>Precio más
                            bajo</option>
                        <option value="precio-alto" @if($request->ordenar=='precio-alto') selected @endif>Precio más
                            alto</option>
                        <option value="visitas" @if($request->ordenar=='visitas') selected @endif>Más vistos</option>
                        <option value="menos-visitas" @if($request->ordenar=='menos-visitas') selected @endif>Menos
                            vistos</option>
                        <option value="gustados" @if($request->ordenar=='gustados') selected @endif>Más gustados
                        </option>
                        <option value="menos-gustados" @if($request->ordenar=='menos-gustados') selected @endif>Menos
                            gustados</option>
                    </select>
                    <input type="hidden" value="{{$request->categoria}}" name="categoria">
                    <input type="hidden" name="ciudad" value="{{$request->ciudad}}">
                    <input type="hidden" name="nombre" value="{{$request->nombre}}">
                </form>
            </div>
        </h2>
    </x-slot>



    <div class="py-12" style="background: url({{asset('storage/fondologo1.png')}}) fixed">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-message2></x-alert-message2>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container-fluid">

                        <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
                        {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> --}}
                        {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> --}}
                        <script src="{{asset('js/index.js')}}"></script>

                        <div class="container my-5 rounded">
                            <div class="py-3"></div>
                            <h2>Categorías</h2>
                            <section class="customer-logos slider" align="center">
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Coches', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/coche.png')}}">Coches</a></div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Motos', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/moto.png')}}">Motos</a></div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Motor y Accesorios', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/motor.png')}}">Motor y
                                        Accesorios</a></div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Inmobiliaria', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/casa.png')}}">Inmobiliaria</a>
                                </div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Tv, Audio y Foto', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/tv.png')}}">Tv, Audio y Foto</a>
                                </div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Móviles y Telefonía', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/movil.png')}}">Móviles y
                                        Telefonía</a></div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Informática y Electrónica', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/informatica.png')}}">Informática y
                                        Electrónica</a></div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Deporte y Ocio', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/deporte.png')}}">Deporte y
                                        Ocio</a></div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Bicicletas', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/bici.png')}}">Bicicletas</a></div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Consolas y Videojuegos', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/consola.png')}}">Consolas y
                                        Videojuegos</a></div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Hogar y Jardín', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/jardin.png')}}">Hogar y Jardín</a>
                                </div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Electrodomésticos', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/electrodomesticos.png')}}">Electrodomésticos</a>
                                </div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Cine, Libros y Música', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/cine.png')}}">Cine, Libros y
                                        Música</a></div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Niños y Bebés', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/bebe.png')}}">Niños y Bebés</a>
                                </div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Coleccionismo', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/coleccionismo.png')}}">Coleccionismo</a>
                                </div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Materiales de construcción', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/construccion.png')}}">Materiales
                                        de construcción</a></div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Industria y Agricultura', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/tractor.png')}}">Industria y
                                        Agricultura</a></div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Empleo', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/empleo.png')}}">Empleo</a></div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Servicios', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/servicios.png')}}">Servicios</a>
                                </div>
                                <div class="slide font-bold"><a
                                        href="{{route('productos.index', ['categoria=Otros', 'ordenar='.$request->ordenar, "ciudad=$request->ciudad"])}}"><img
                                            src="{{asset('storage/imagenes-categorias/otros.png')}}">Otros</a></div>


                            </section>
                        </div>
                        <div class="row mx-auto" id="prods">
                            @if(Auth::user()!=null)<input type="text" class="hidden" name="uui"
                                value="{{Auth::user()->id}}">@endif
                            @foreach($productos as $item)
                            <div class="col-md-4 my-3">
                                <div class="card mx-auto" style="width: 20rem;">
                                    <a href="{{route('productos.show', [$item, 'u=%'])}}"
                                        style="text-decoration: none; color: black">
                                        <div class="cardimg">
                                            <img class="card-img-top" src="{{$item->foto1}}">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{$item->nombre}}</h5>
                                            <h4 class="card-title">{{$item->precio}} €</h4>
                                            <h6 class="card-title font-italic">{{$item->categoria}}</h6>
                                            <div class="module line-clamp">
                                                <p class="card-text mr-5">{{$item->descripcion}}</p>
                                            </div>
                                            {{-- {{($item->created_at->getTimestamp())}} --}}
                                            {{-- <label class="float-right" align="right" style="opacity: 50%">{{$item->created_at}}</label>
                                            --}}
                                        </div>
                                    </a>

                                </div>

                            </div>
                            @endforeach

                        </div>
                        <div id="links" align="center">
                            <a onclick="cargaProd()" id="next" class="btn rounded-pill p-3 px-4"
                                style="background-color: #10FA91; cursor:pointer"><i class="far fa-plus-circle"></i>
                                Cargar más productos</a>
                        </div>
                        {{$productos->appends($request->except('page'))->links()}}
                    </div>
                    <script>
                        //Variable para guardar en enlace usado
                        var prevPage = null;

                        //Variables para guardar los dígitos de los números de la página
                        n1 = null;
                        n2 = null;
                        n3 = null;

                        //Variable para controlar numerosas llamadas a cargar productos
                        intento = 1;

                        var enlase = document.getElementById('links').nextElementSibling.firstElementChild
                            .lastElementChild.href;

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
                            if (enlase == null) {
                                document.getElementById('next').innerHTML =
                                    'No hay más productos con estas características';
                            }

                            if (intento == 1) {
                                intento = 0;
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
                                httpRequest.onload = procesarRespuesta;
                            }
                        }
                        //Crea un nuevo DOM con el enlace de la siguiente página, coge los productos y los trae a esta
                        function procesarRespuesta() {
                            var respuesta = httpRequest.responseText;
                            var dom2 = new DOMParser();
                            var doc = dom2.parseFromString(respuesta, 'text/html');

                            var pag = doc.querySelector('#prods').innerHTML;

                            if (pag.length >= 50) {
                                document.querySelector('#prods').innerHTML = document.querySelector('#prods')
                                    .innerHTML + pag;
                                history.pushState(null, "", enlace);
                                intento = 1;
                            } else {
                                document.getElementById('next').innerHTML =
                                    'No hay más productos con estas características';
                            }
                        }

                    </script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
