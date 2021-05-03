<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{asset('css/user-profile.css')}}">

    @inject('modelFollower', 'App\Models\Follower')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert-message></x-alert-message>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="wrapper">

                        <div class="profile-card js-profile-card">

                            <div class="profile-card__img">
                                @if(Auth::user()!=null && Auth::user()==$user)
                                <a href="{{route('mod_user', $user->id)}}">
                                    @endif
                                    <img src="{{asset($user->foto)}}">
                                    @if(Auth::user()!=null && Auth::user()==$user)
                                </a>
                                @endif
                            </div>

                            <div class="profile-card__cnt js-profile-cnt">
                                <div class="profile-card__name">{{$user->name}}</div>
                                <div class="profile-card__txt"><strong></strong></div>
                                <div class="profile-card-loc">
                                    <span class="profile-card-loc__icon">
                                        <svg class="icon">
                                            <use xlink:href="#icon-location"></use>
                                        </svg>
                                    </span>

                                    <span class="profile-card-loc__txt">
                                        {{$user->ciudad}}
                                    </span>
                                </div>

                                <div class="profile-card-inf">
                                    <div class="profile-card-inf__item">
                                        <div class="profile-card-inf__title">{{$n_prods}}</div>
                                        <div class="profile-card-inf__txt">Productos</div>
                                    </div>
                                    <button type="button" data-toggle="modal" data-target="#modalSeguidos">
                                        <div class="profile-card-inf__item">
                                            <div class="profile-card-inf__title">{{$n_seguidos}}</div>
                                            <div class="profile-card-inf__txt">Siguiendo</div>
                                        </div>
                                    </button>
                                    <button type="button" data-toggle="modal" data-target="#modalSeguidores">
                                        <div class="profile-card-inf__item">
                                            <div class="profile-card-inf__title">{{$n_seguidores}}</div>
                                            <div class="profile-card-inf__txt">Seguidores</div>
                                        </div>
                                    </button>
                                    @if(Auth::user()!=null && Auth::user()==$user)
                                    <button type="button" data-toggle="modal" data-target="#modalFavoritos">
                                        <div class="profile-card-inf__item">
                                            <div class="profile-card-inf__title">{{$n_guards}}</div>
                                            <div class="profile-card-inf__txt">Favoritos</div>
                                        </div>
                                    </button>
                                    @endif
                                </div>

                                <div class="profile-card-ctr">
                                    @if(!isset($follower->seguido))
                                    <form action="{{route('followers.store', ['seguido='.$user->id])}}" method="POST">
                                        @csrf
                                        <button class="profile-card__button button--orange"><i
                                                class="fas fa-plus mr-1"></i>
                                            Seguir</button>
                                    </form>
                                    @else
                                    <form action="{{route('followers.destroy', $follower)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="profile-card__button button--orange"><i
                                                class="fas fa-minus mr-1"></i> Dejar de seguir</button>
                                    </form>

                                    @endif

                                </div>

                                <div class="row"
                                    style="border-top: 1px solid rgb(211, 209, 209); border-bottom: 1px solid rgb(211, 209, 209)">
                                    <?php $num=2; ?>
                                    @foreach($productos as $item)
                                    <div class="col-md-5 mx-auto my-3">
                                        <a href="{{route('productos.show', $item)}}"
                                            style="text-decoration: none; color: black">
                                            <div @if($num%2==0) class="card float-right" @else class="card float-left"
                                                @endif style="width: 18rem;">
                                                <div class="cardimg">
                                                    <img class="card-img-top" src="{{asset($item->foto1)}}"
                                                        alt="Card image cap">
                                                </div>
                                                <div class="card-body" align="left">
                                                    <h5 class="card-title">{{$item->nombre}}</h5>
                                                    <h4 class="card-title">{{$item->precio}} €</h4>
                                                    <h6 class="card-title font-italic">{{$item->categoria}}</h6>

                                                </div>
                                            </div>
                                        </a>
                                        <?php $num++; ?>
                                    </div>
                                    @endforeach
                                </div>

                            </div>

                            <div class="profile-card-message js-message">
                                <form class="profile-card-form">
                                    <div class="profile-card-form__container">
                                        <textarea placeholder="Say something..."></textarea>
                                    </div>

                                    <div class="profile-card-form__bottom">
                                        <button class="profile-card__button button--blue js-message-close">
                                            Send
                                        </button>

                                        <button class="profile-card__button button--gray js-message-close">
                                            Cancel
                                        </button>
                                    </div>
                                </form>

                                <div class="profile-card__overlay js-message-close"></div>
                            </div>

                        </div>

                    </div>

                    <svg hidden="hidden">
                        <defs>
                            <symbol id="icon-location" viewBox="0 0 32 32">
                                <title>location</title>
                                <path
                                    d="M16 31.68c-0.352 0-0.672-0.064-1.024-0.16-0.8-0.256-1.44-0.832-1.824-1.6l-6.784-13.632c-1.664-3.36-1.568-7.328 0.32-10.592 1.856-3.2 4.992-5.152 8.608-5.376h1.376c3.648 0.224 6.752 2.176 8.608 5.376 1.888 3.264 2.016 7.232 0.352 10.592l-6.816 13.664c-0.288 0.608-0.8 1.12-1.408 1.408-0.448 0.224-0.928 0.32-1.408 0.32zM15.392 2.368c-2.88 0.192-5.408 1.76-6.912 4.352-1.536 2.688-1.632 5.92-0.288 8.672l6.816 13.632c0.128 0.256 0.352 0.448 0.64 0.544s0.576 0.064 0.832-0.064c0.224-0.096 0.384-0.288 0.48-0.48l6.816-13.664c1.376-2.752 1.248-5.984-0.288-8.672-1.472-2.56-4-4.128-6.88-4.32h-1.216zM16 17.888c-3.264 0-5.92-2.656-5.92-5.92 0-3.232 2.656-5.888 5.92-5.888s5.92 2.656 5.92 5.92c0 3.264-2.656 5.888-5.92 5.888zM16 8.128c-2.144 0-3.872 1.728-3.872 3.872s1.728 3.872 3.872 3.872 3.872-1.728 3.872-3.872c0-2.144-1.76-3.872-3.872-3.872z">
                                </path>
                                <path
                                    d="M16 32c-0.384 0-0.736-0.064-1.12-0.192-0.864-0.288-1.568-0.928-1.984-1.728l-6.784-13.664c-1.728-3.456-1.6-7.52 0.352-10.912 1.888-3.264 5.088-5.28 8.832-5.504h1.376c3.744 0.224 6.976 2.24 8.864 5.536 1.952 3.36 2.080 7.424 0.352 10.912l-6.784 13.632c-0.32 0.672-0.896 1.216-1.568 1.568-0.48 0.224-0.992 0.352-1.536 0.352zM15.36 0.64h-0.064c-3.488 0.224-6.56 2.112-8.32 5.216-1.824 3.168-1.952 7.040-0.32 10.304l6.816 13.632c0.32 0.672 0.928 1.184 1.632 1.44s1.472 0.192 2.176-0.16c0.544-0.288 1.024-0.736 1.28-1.28l6.816-13.632c1.632-3.264 1.504-7.136-0.32-10.304-1.824-3.104-4.864-5.024-8.384-5.216h-1.312zM16 29.952c-0.16 0-0.32-0.032-0.448-0.064-0.352-0.128-0.64-0.384-0.8-0.704l-6.816-13.664c-1.408-2.848-1.312-6.176 0.288-8.96 1.536-2.656 4.16-4.32 7.168-4.512h1.216c3.040 0.192 5.632 1.824 7.2 4.512 1.6 2.752 1.696 6.112 0.288 8.96l-6.848 13.632c-0.128 0.288-0.352 0.512-0.64 0.64-0.192 0.096-0.384 0.16-0.608 0.16zM15.424 2.688c-2.784 0.192-5.216 1.696-6.656 4.192-1.504 2.592-1.6 5.696-0.256 8.352l6.816 13.632c0.096 0.192 0.256 0.32 0.448 0.384s0.416 0.064 0.608-0.032c0.16-0.064 0.288-0.192 0.352-0.352l6.816-13.664c1.312-2.656 1.216-5.792-0.288-8.352-1.472-2.464-3.904-4-6.688-4.16h-1.152zM16 18.208c-3.424 0-6.24-2.784-6.24-6.24 0-3.424 2.816-6.208 6.24-6.208s6.24 2.784 6.24 6.24c0 3.424-2.816 6.208-6.24 6.208zM16 6.4c-3.072 0-5.6 2.496-5.6 5.6 0 3.072 2.528 5.6 5.6 5.6s5.6-2.496 5.6-5.6c0-3.104-2.528-5.6-5.6-5.6zM16 16.16c-2.304 0-4.16-1.888-4.16-4.16s1.888-4.16 4.16-4.16c2.304 0 4.16 1.888 4.16 4.16s-1.856 4.16-4.16 4.16zM16 8.448c-1.952 0-3.552 1.6-3.552 3.552s1.6 3.552 3.552 3.552c1.952 0 3.552-1.6 3.552-3.552s-1.6-3.552-3.552-3.552z">
                                </path>
                            </symbol>

                        </defs>
                    </svg>
                </div>

            </div>

        </div>
        <!--------------------------------------------------------------------------------------------- >-->
        <!--------------------------------------------------------------------------------------------- >-->
        <!--------------------------------------------------------------------------------------------- >-->
        <!--------------------------------------------------------------------------------------------- >-->
        <!--------------------------------------------------------------------------------------------- >-->
        {{-- <a href="{{route('modals_data', $user->id)}}">Data</a> --}}
        <script>
            window.onload = cargaProd;
            //Variable para guardar en enlace usado
            var prevPage = null;

            //Variables para guardar los dígitos de los números de la página
            n1 = null;
            n2 = null;
            n3 = null;

            //Variable para controlar numerosas llamadas a cargar productos
            var enlace = "";

            let httpRequest = new XMLHttpRequest();


            function cargaProd(e) {

                enlace = "{{route('modals_data', $user->id)}}";

                httpRequest.open('GET', enlace, true);
                httpRequest.overrideMimeType('text/html');
                httpRequest.send(null);
                httpRequest.onreadystatechange = cargando;
                httpRequest.onload = procesarRespuesta;

            }
            //Crea un nuevo DOM con el enlace de la siguiente página, coge los productos y los trae a esta
            function procesarRespuesta() {
                var respuesta = httpRequest.responseText;
                var dom2 = new DOMParser();
                var doc = dom2.parseFromString(respuesta, 'text/html');

                var seguidos = doc.querySelector('#seguidos').innerHTML;
                document.querySelector('#seguidos').innerHTML = seguidos;
                var seguidores = doc.querySelector('#seguidores').innerHTML;
                document.querySelector('#seguidores').innerHTML = seguidores;
                var favoritos = doc.querySelector('#favoritos').innerHTML;
                document.querySelector('#favoritos').innerHTML = favoritos;
            }

            function cargando() {
                document.querySelector('#seguidos').innerHTML = "<img src={{asset('storage/img/loading.gif')}}>";
            }

        </script>
        <!-- Modal seguidos -->
        <div class="modal fade" id="modalSeguidos" tabindex="-1" role="dialog" aria-labelledby="modalSeguidosTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Seguidos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="seguidos" style="height: 500px; overflow-y:scroll;">
                        {{-- Seguidos... --}}
                        <img src={{asset('storage/img/loading2.gif')}}>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .modal-body a {
                color: black;
            }

            .modal-body .row {
                border: 2px solid black;
                padding: 15px;
                margin: 3px;
            }

        </style>

        <!-- Modal seguidores -->
        <div class="modal fade" id="modalSeguidores" tabindex="-1" role="dialog" aria-labelledby="modalSeguidoresTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Seguidores</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="seguidores" style="height: 500px; overflow-y:scroll;">
                        {{-- Seguidores... --}}
                        <img src={{asset('storage/img/loading2.gif')}}>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        @if(Auth::user()!=null && Auth::user()==$user)
        <!-- Modal favoritos -->
        <div class="modal fade" id="modalFavoritos" tabindex="-1" role="dialog" aria-labelledby="modalFavoritosTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Favoritos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="favoritos" style="height: 500px; overflow-y:scroll;">
                        {{-- Favoritos... --}}
                        <img src={{asset('storage/img/loading2.gif')}}>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        @endif

</x-app-layout>
