<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            {{-- <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a> --}}
        </x-slot>
        <style>
            
            label:not(.no)::after{
                content: " *";
                color: red;
            }
        </style>
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
        <link rel="stylesheet" href="{{asset('css/register.css')}}">
        <script src="{{asset('js/register.js')}}"></script>

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" onsubmit="disableButton(this)">
            @csrf

            <!--Foto de perfil -->
            <div id="imagePreview" class="mx-auto">
                <x-input id="uploadFile" type="file" name="image" class="img tamanio_img" />
                <div class="hover">
                <i class="ion-camera"></i>
                </div>
            </div>

            <!-- Name -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
            <div>
                <x-label for="name" :value="__('Nombre:')" />

                <x-input id="name" oninput="validarNombre()" class="block mt-1 w-full" type="text" minlength=3 name="name" :value="old('name')" required autofocus />
                <small>{{$errors->first('name')}}</small>
            </div>
            <!-- Ciudad -->
            <div class="mt-4">
                <x-label for="ciudad" :value="__('Ciudad:')" />

                <x-input id="ciudad" oninput="validarCiudad()" class="block mt-1 w-full" type="text" name="ciudad" :value="old('ciudad')" required autofocus />
                <small>{{$errors->first('ciudad')}}</small>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Correo:')" />

                <x-input id="email" oninput="validarEmail()" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <small>{{$errors->first('email')}}</small>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Contraseña:')" />

                <x-input id="password" oninput="validarPassword()" onchange="ocultarPass(event);" onfocus="mostrarPass(event);" onmouseover="mostrarPass(event);" onmouseout="ocultarPass(event)" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                                <small>{{$errors->first('password')}}</small>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar Contraseña:')" />

                <x-input id="password_confirmation" oninput="validarPassword2()" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
                                <small>{{$errors->first('password_confirmation')}}</small>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Ya tiene cuenta?') }}
                </a>

                <x-button class="ml-4" id="btnRegistrarse" onclick="validarFormulario(event)">
                    {{ __('Registrarse') }}
                </x-button>
            </div>
        </form>
        <script>
            function mostrarPass(event){
				document.getElementById('password').type = 'text';
                event.path[0].type = "text";
            }
            function ocultarPass(event){
				document.getElementById('password').type = 'password';
                event.path[0].type = 'password';
            }
        </script>
    </x-auth-card>
</x-guest-layout>
