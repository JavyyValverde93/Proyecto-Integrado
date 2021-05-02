<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <style>
            small{
                color: red;
                font-style: italic;
            }
        </style>
        <script>

            var verde = "lime 2px solid";
            var rojo = "red 2px solid";

            function validarEmail(){
        var email = document.getElementById('email');
        var comprobar = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        if(email.value.length<5 || !comprobar.test(email.value)){
            email.style.border = rojo;
            email.nextElementSibling.innerHTML = "El email no es correcto";
        }else{
            email.style.border = verde;
            email.nextElementSibling.innerHTML = "";
        }
    }

    function validarPassword(){
        var pass1 = document.getElementById('password');
        if(pass1.value.length<8){
            pass1.style.border = rojo;
            pass1.nextElementSibling.innerHTML = "La contraseña debe tener como mínimo 8 caracteres";
        }else{
            pass1.style.border = verde;
            pass1.nextElementSibling.innerHTML = "";
        }
    }
        </script>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" oninput="validarEmail()" type="email" name="email" :value="old('email')" required autofocus />
                <small></small>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                oninput="validarPassword()"
                                name="password"
                                required autocomplete="current-password" />
                                <small></small>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                </label>
                @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 float-right" href="{{ route('password.request') }}">
                            {{ __('Olvidaste tu contraseña?') }}
                        </a>
                    @endif
            </div>

            <div class="flex items-center justify-end mt-4">

                <script>
                    window.onload = inicio;
                    function inicio(){
                        document.getElementById('reg').classList = document.getElementById('ini').classList;
                    }
                </script>
                <a href="{{route('register')}}" id="reg">Registrarse</a>
                <x-button class="ml-3" id="ini">
                    {{ __('Iniciar sesión') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
