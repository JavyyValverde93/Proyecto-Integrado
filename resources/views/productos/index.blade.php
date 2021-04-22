<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div class="ui search col my-auto mx-3">
                <form action="{{route('productos.index')}}" method="GET" class="form form-inline">
                    @csrf
                    <div class="ui icon input">
                        <input class="prompt form-control px-2" value="{{$scope}}" name="nombre" size="50%" type="text"
                            placeholder="Buscar..." onchange="this.form.sumbit()">
                        <i class="search icon"></i>
                    </div>

                </form>
            </div>
        </h2>
    </x-slot>
    <style>
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
            -webkit-line-clamp: 1;
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

    </style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container-fluid">
                        <div class="row mx-auto" id="prods">
                            @if(Auth::user()!=null)<input type="text" class="hidden" name="uui"
                                value="{{Auth::user()->id}}">@endif
                            @foreach($productos as $item)
                            <div class="col-md-6 col-lg-4 mx-auto my-3">
                                <a href="{{route('productos.show', [$item, 'u=%'])}}"
                                    style="text-decoration: none; color: black">
                                    <div class="card" style="width: 18rem;">
                                        <div class="cardimg">
                                            <img class="card-img-top" src="{{$item->foto1}}" alt="Card image cap">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{$item->nombre}}</h5>
                                            <h4 class="card-title">{{$item->precio}} €</h4>
                                            <h6 class="card-title font-italic">{{$item->categoria}}</h6>
                                            <div class="module line-clamp">
                                                <p class="card-text mr-4">{{$item->descripcion}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @endforeach

                        </div>
                        <div id="links" align="center">
                            <a onclick="cargaProd()" id="next"
                                class="btn btn-success btn-lg mx-3 btn-block"><i class="fas fa-plus-circle"></i> Cargar
                                más</a>
                        </div>
                        {{$productos->appends($request->except('page'))->links()}}

                        <script>
                            //Variable para guardar en enlace usado
                            var prevPage = null;

                            n1 = null;
                            n2 = null;
                            n3 = null;


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

                                if(prevPage==null){
                                    prevPage = enl;
                                }else{
                                    prevPage = enl.replace("page=" + n, "page=" + n1);
                                }
                                n1 = null;
                                n2 = null;
                                n3 = null;
                            }

                            function cargaProd() {
                                if(prevPage==null){
                                    numPage(enlase);
                                }else{
                                    //Le suma 1 al page del enlace anterior
                                    numPage(prevPage);
                                }

                                enlace = prevPage;


                                httpRequest.open('GET', enlace, true);
                                httpRequest.overrideMimeType('text/html');
                                httpRequest.send(null);

                                httpRequest.onload = procesarRespuesta;
                            }

                            function procesarRespuesta() {
                                var respuesta = httpRequest.responseText;
                                var dom2 = new DOMParser();
                                var doc = dom2.parseFromString(respuesta, 'text/html');

                                var pag = doc.querySelector('#prods').innerHTML;
                                document.querySelector('#prods').innerHTML = document.querySelector('#prods')
                                    .innerHTML + pag;

                                history.pushState(null, "", enlace);
                            }

                        </script>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
