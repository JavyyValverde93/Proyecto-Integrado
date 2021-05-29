<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
    
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
        <link rel="stylesheet" href="{{asset('css/modify.css')}}">
        <script src="{{asset('js/modify.js')}}"></script>

        <style>
            #imagePreview {
                border-radius: 100%;
                border: 5px solid rgba(0, 0, 0, 0.3);
                width: 130px;
                height: 130px;
                background-image: url("{{asset($user->foto)}}");
                background-position: center center;
                background-size: cover;
                overflow: hidden;
                display: flex;
                position: relative;
            }

            #destr{
                background-color: red; 
                padding:3% 10%;
            }

            label:not(.no)::after {
                content: " *";
                color: red;
            }

            .changePass{
                text-decoration: underline;
            }

        </style>
        <!-- Validation Errors -->
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
        <x-alert-message></x-alert-message>

        <form action="{{ route('modify_user', $user) }}" method="POST" enctype="multipart/form-data"
            onsubmit="disableButton(this)">
            @csrf
            @method('PUT')
            <!--Foto de perfil -->
            <div id="imagePreview" class="mx-auto  mb-5">
                <x-input id="uploadFile" type="file" name="image" class="img tamanio_img" />
                <div class="hover">
                    <i class="ion-camera"></i>
                </div>
            </div>
            <p class="mx-auto my-5">Eliminar imágen: <input type="checkbox" class="checkbox" name="del_image"></p>

            <!-- Name -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
                integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
                crossorigin="anonymous" />

            <div>
                <x-label for="name" :value="__('Nombre:')" />

                <x-input id="name" oninput="validarNombre()" class="block mt-1 w-full" type="text" minlength=3
                    name="name" value="{{$user->name}}" required autofocus />
                <small>{{$errors->first('name')}}</small>
            </div>
            <!-- Ciudad -->
            <div class="mt-4">
                <x-label for="ciudad" :value="__('Ciudad:')" />

                <x-input id="ciudad" oninput="validarCiudad()" class="block mt-1 w-full" type="text" name="ciudad"
                    value="{{$user->ciudad}}" required autofocus />
                <small>{{$errors->first('ciudad')}}</small>
            </div>

            <!-- Email Address -->
            <div class="my-4">
                <x-label for="email" :value="__('Correo:')" />

                <x-input id="email" oninput="validarEmail()" class="block mt-1 w-full" type="email" name="email"
                    value="{{$user->email}}" required />
                <small>{{$errors->first('email')}}</small>
            </div>
            <p></p>

            <a href="{{route('users.password_reset', $user)}}" class="mt-4 changePass">Cambiar Contraseña</a>
            <div class="mt-4">
                <x-button id="actualizar" class="ml-4 mt-4 float-right" onclick="validarFormulario(event)">
                    {{ __('Guardar') }}
                </x-button>
                <a href="{{route('ver_perfil', $user->id)}}" id="back" class="p-4"><i class="fas fa-backward"></i></a>
                <a href="{{route('productos.index')}}" id="home" class="p-4"><i class="fas fa-home"></i></a>
            </div>
        </form>
        <div class="row">
            <a id="destr" class="mr-0 ml-0 btn-block"
                href={{route("destroy_user", $user->id)}}
                onclick="return confirm(`¿Está seguro de que quiere eliminar su usuario ?`)"><i
                    class="fas fa-trash-alt mr-2"></i> Eliminar Cuenta</a>
        </div>

    </x-auth-card>
</x-guest-layout>
