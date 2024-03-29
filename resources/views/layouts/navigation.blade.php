<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex col-xl-5 col-1">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center hidden">
                    <a href="{{ route('productos.index') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('productos.index')" :active="request()->routeIs('productos.index')">
                        {{ __('Inicio') }}
                    </x-nav-link>
                    @if(Auth::user()!= null)
                    <x-nav-link :href="route('ver_perfil', Auth::user()->id)" :active="request()->routeIs('ver_perfil', Auth::user()->id)">
                        {{ __('Mis productos') }}
                    </x-nav-link>
                    @endif
                    @if(Auth::user()!= null && Auth::user()->tipo==1)
                    <x-nav-link :href="route('admin_zone', ['menu=1'])" :active="request()->routeIs('admin_zone')">
                        {{ __('Zona admin') }}
                    </x-nav-link>
                    @endif
                </div>
            </div>

            <a href="{{route('productos.index')}}" class="m-auto"><img src="{{asset('storage/logo6a.png')}}" width="150"></a>
            
            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 col-5">

                @if(Auth::user()!=null) <a href="{{route('ver_perfil', Auth::user()->id)}}" class="float-right ui button rounded-pill mr-3">Perfil</a> @endif
                <a href="{{route('productos.create')}}" class="ui button positive float-right rounded-pill mr-3" style="background: #10FA91;"><i
                    class="far fa-envelope-open-dollar mr-1"></i> Vender Producto</a>
                    @if(Auth::user()!=null) <img src="{{asset(Auth::user()->foto)}}" width="30px" height="30px" style="background-color: white" class="mr-1 rounded">
                    @else   <a href="{{route('login')}}" class="ui button rounded-pill"><i class="fas fa-sign-in-alt mr-1"></i> Iniciar sesión o registrarse</a>

                    @endif
                @if(Auth::user()!=null)
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            @if(Auth::user()!=null) <div class="gg">{{ Auth::user()->name }}</div> @endif
                            <style>
                                .gg{
                                width:57px;
                                overflow: hidden;
                            }
                            </style>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    @endif
                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar sesión') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Inicio') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('productos.create')" :active="request()->routeIs('productos.create')">
                {{ __('Vender Producto') }}
            </x-responsive-nav-link>
            @if(Auth::user()!= null)
            <x-responsive-nav-link :href="route('ver_perfil', Auth::user()->id)" :active="request()->routeIs('ver_perfil', Auth::user()->id)">
                {{ __('Mis productos') }}
            </x-responsive-nav-link>
            @endif
            @if(Auth::user()!= null && Auth::user()->tipo==1)
            <x-responsive-nav-link :href="route('admin_zone', ['menu=1'])" :active="request()->routeIs('admin_zone')">
                {{ __('Zona admin') }}
            </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <svg class="h-10 w-10 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                @if(Auth::user()!=null)
                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
                @endif
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Cerrar sesión') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<div class="fixed-bottom row mx-auto py-1" style="background-color: white; opacity:92%">
    <div class="col-auto mx-auto">
        <a href="{{route('productos.index')}}"><img src="{{asset('storage/btn-movil/home.png')}}" style="max-width: 40px"></a>
    </div>
    <div class="col-auto mx-auto">
        <a @if(Auth::user()==null)href="{{route('login')}}"@else href="{{route('ver_perfil', [Auth::user()->id, 'fav=y'])}}" @endif><img src="{{asset('storage/btn-movil/liked.png')}}" style="max-width: 40px"></a>
    </div>
    <div class="col-auto mx-auto">
        <a href="{{route('productos.create')}}"><img src="{{asset('storage/btn-movil/sell.png')}}" style="max-width: 40px"></a>
    </div>
    <div class="col-auto mx-auto">
        <a @if(Auth::user()==null)href="{{route('login')}}"@else href="{{route('mod_user', Auth::user()->id)}}" @endif><img src="{{asset('storage/btn-movil/config.png')}}" style="max-width: 40px"></a>
    </div>
    <div class="col-auto mx-auto">
        <a @if(Auth::user()==null)href="{{route('login')}}"@else href="{{route('ver_perfil', Auth::user()->id)}}" @endif><img src="{{asset('storage/btn-movil/profile.png')}}" style="max-width: 40px"></a>
    </div>
</div>
