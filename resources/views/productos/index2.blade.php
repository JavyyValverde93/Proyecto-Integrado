<x-app-layout>
    <x-slot name="header">
        <link rel="stylesheet" href="{{asset('css/index.css')}}">
        <script src="https://momstudio.es/img/img-elmaquetadorweb/cookieconsent.min.js"></script>

        <style>
            /* Esconder botones de paginación */
            nav[role='navigation']{
                visibility: hidden;
            }
        </style>
        <datalist id="ciudades">
            <option>Cualquier Lugar</option>
            @auth
                <option>{{Auth::user()->ciudad}}</option>
            @endauth
            @foreach ($ciudades as $item)
                <option value="{{$item->ciudad}}" @if($request->ciudad==$item->ciudad) selected @endif>{{$item->ciudad}}</option>
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
                    </form>

                </div>
                <div class="col" align="right">

                </div>
                <form action="{{route('productos.index')}}" class="col-auto mt-2" method="GET">
                    @csrf
                    <i class="fal fa-map-marker-alt mr-2"></i>
                    @php if($request->ciudad=="%"){$request->ciudad="";} @endphp
                    <input list="ciudades" placeholder="Buscar en..." value="{{$request->ciudad}}" onchange="this.form.submit()" class="p-2 rounded" name="ciudad" style="border: solid 2px black">
                    <input type="hidden" value="{{$request->categoria}}" name="categoria">
                    <input type="hidden" value="{{$request->ordenar}}" name="ordenar">
                </form>
                <form action="{{route('productos.index')}}" class="col-auto mt-2" method="GET">
                    @csrf
                    <i class="fas fa-sort mr-2"></i><select name="ordenar" onchange="this.form.submit()">
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
                </form>
            </div>
        </h2>
    </x-slot>

    <x-alert-message></x-alert-message>
    <script src="{{asset('js/index2.js')}}"></script>


<div class="py-12" style="background: url({{asset('storage/fondologo1.png')}}) fixed">
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
                                <option class="fa" value="Electrodomésticos" @if($request->categoria!=null && $request->categoria=="Electrodomésticos") selected @endif>&#xf898; Electrodomésticos</option>
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
                            
                            @if($request->ordenar!=null)
                            <input type="hidden" value="{{$request->ordenar}}" name="ordenar">
                            @endif
                            <input type="hidden" name="ciudad" value="{{$request->ciudad}}">
                        </form>
                    </div>


                    <div class="row mx-auto" id="prods">
                        @foreach($productos as $item)
                        <div class="col-md-5 col-lg-4 my-3">
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
                                        <label class="float-right" align="right" style="opacity: 50%">{{$item->created_at}}</label>
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
                            if(enlase==null){
                                document.getElementById('next').innerHTML = 'No hay más productos con estas características';
                            }

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
                                httpRequest.onload = procesarRespuesta;
                            }
                        }
                        //Crea un nuevo DOM con el enlace de la siguiente página, coge los productos y los trae a esta
                        function procesarRespuesta() {
                            var respuesta = httpRequest.responseText;
                            var dom2 = new DOMParser();
                            var doc = dom2.parseFromString(respuesta, 'text/html');

                            var pag = doc.querySelector('#prods').innerHTML;

                            if(pag.length>=50){
                                document.querySelector('#prods').innerHTML = document.querySelector('#prods').innerHTML + pag;
                                history.pushState(null, "", enlace);
                                intento = 1;
                            }else{
                                document.getElementById('next').innerHTML = 'No hay más productos con estas características';
                            }
                        }

                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
