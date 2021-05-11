<x-app-layout>
        <x-slot name="header">
            <link rel="stylesheet" href="{{asset('css/index.css')}}">

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <div class="row">
                    <div class="ui search my-auto mx-3 col-auto mt-2">
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
                    <div class="col" align="right">

                    </div>
                    <form action="{{route('productos.index')}}" class="col-auto mt-2" method="GET">
                        @csrf
                        <i class="fas fa-sort mr-2"></i><select name="ordenar" onchange="this.form.submit()">
                                <option>Ordenar por...</option>
                                <option value="viejos" @if($request->ordenar=='viejos') selected @endif>Más viejos</option>
                                <option value="nuevos" @if($request->ordenar=='nuevo') selected @endif>Más nuevos</option>
                                <option value="precio-bajo" @if($request->ordenar=='precio-bajo') selected @endif>Precio más bajo</option>
                                <option value="precio-alto" @if($request->ordenar=='precio-alto') selected @endif>Precio más alto</option>
                                <option value="visitas" @if($request->ordenar=='visitas') selected @endif>Más vistos</option>
                                <option value="menos-visitas" @if($request->ordenar=='menos-visitas') selected @endif>Menos vistos</option>
                                <option value="gustados" @if($request->ordenar=='gustados') selected @endif>Más gustados</option>
                                <option value="menos-gustados" @if($request->ordenar=='menos-gustados') selected @endif>Menos gustados</option>
                            </select>
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
            <script src="{{asset('js/index2.js')}}"></script>
            
                            <div class="container my-5 rounded" style="background: url({{asset('storage/fondologo1.png')}}) fixed">
                            <h2>Categorías</h2>
                            <section class="customer-logos slider" align="center">
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Coches'])}}"><img src="{{asset('storage/imagenes-categorias/coche.png')}}">Coches</a></div>
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Motos'])}}"><img src="{{asset('storage/imagenes-categorias/moto.png')}}">Motos</a></div>
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Motor y Accesorios'])}}"><img src="{{asset('storage/imagenes-categorias/motor.png')}}">Motor y Accesorios</a></div>
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Inmobiliaria'])}}"><img src="{{asset('storage/imagenes-categorias/casa.png')}}">Inmobiliaria</a></div>
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Tv, Audio y Foto'])}}"><img src="{{asset('storage/imagenes-categorias/tv.png')}}">Tv, Audio y Foto</a></div>
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Móviles y Telefonía'])}}"><img src="{{asset('storage/imagenes-categorias/movil.png')}}">Móviles y Telefonía</a></div>
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Informática y Electrónica'])}}"><img src="{{asset('storage/imagenes-categorias/informatica.png')}}">Informática y Electrónica</a></div>
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Deporte y Ocio'])}}"><img src="{{asset('storage/imagenes-categorias/deporte.png')}}">Deporte y Ocio</a></div>
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Bicicletas'])}}"><img src="{{asset('storage/imagenes-categorias/bici.png')}}">Bicicletas</a></div>
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Consolas y Videojuegos'])}}"><img src="{{asset('storage/imagenes-categorias/consola.png')}}">Consolas y Videojuegos</a></div>
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Hogar y Jardín'])}}"><img src="{{asset('storage/imagenes-categorias/jardin.png')}}">Hogar y Jardín</a></div>
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Cine, Libros y Música'])}}"><img src="{{asset('storage/imagenes-categorias/cine.png')}}">Cine, Libros y Música</a></div>
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Niños y Bebés'])}}"><img src="{{asset('storage/imagenes-categorias/bebe.png')}}">Niños y Bebés</a></div>
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Coleccionismo'])}}"><img src="{{asset('storage/imagenes-categorias/coleccionismo.png')}}">Coleccionismo</a></div>
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Materiales de construcción'])}}"><img src="{{asset('storage/imagenes-categorias/construccion.png')}}">Materiales de construcción</a></div>
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Industria y Agricultura'])}}"><img src="{{asset('storage/imagenes-categorias/tractor.png')}}">Industria y Agricultura</a></div>
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Empleo'])}}"><img src="{{asset('storage/imagenes-categorias/empleo.png')}}">Empleo</a></div>
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Servicios'])}}"><img src="{{asset('storage/imagenes-categorias/servicios.png')}}">Servicios</a></div>
                                <div class="slide font-bold"><a href="{{route('productos.index', ['categoria=Otros'])}}"><img src="{{asset('storage/imagenes-categorias/otros.png')}}">Otros</a></div>


                            </section>
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
                                            {{-- {{($item->created_at->getTimestamp())}} --}}
                                            {{-- <label class="float-right" align="right" style="opacity: 50%">{{$item->created_at}}</label> --}}
                                        </div>
                                    </a>

                                </div>

                            </div>
                            @endforeach

                        </div>
                        {{$productos->appends($request->except('page'))->links()}}
                    </div>

                </div>
            </div>
        </div>
</x-app-layout>
