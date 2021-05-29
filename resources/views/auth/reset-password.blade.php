<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <style>
            small{
                color: red;
            }
            
            label:not(.no)::after{
                content: " *";
                color: red;
            }
        </style>
        <script>
            var verde = "lime 2px solid";
            var rojo = "red 2px solid";

            function validarPassword(){
                    var pass1 = document.getElementById('password');
                    if(pass1.value.length<8){
                        pass1.style.border = rojo;
                        pass1.nextElementSibling.innerHTML = "La contraseña debe tener como mínimo 8 caracteres";
                        validar = false;
                    }else{
                        pass1.style.border = verde;
                        pass1.nextElementSibling.innerHTML = "";
                    }
                }

                function validarPassword2(){
                    var pass1 = document.getElementById('password');
                    var pass2 = document.getElementById('password_confirmation');
                    if(pass2.value.length<=8 || !Object.is(pass1.value, pass2.value)){
                        pass2.style.border = rojo;
                        if(pass2.value.length<=8){
                            pass2.nextElementSibling.innerHTML = "Las contraseñas no coinciden";
                        }
                        validar = false;
                    }else{
                        pass2.style.border = verde;
                        pass2.nextElementSibling.innerHTML = "";
                    }
                }

        </script>
        <form action="{{route('users.change_password')}}" method="POST">
            @csrf

            <!-- Password Reset Token -->
            {{-- <input type="hidden" name="token" value="{{ $request->route('token') }}"> --}}

            <!-- Email Address -->
            {{-- <div>
                <x-label for="email" :value="__('Email:')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="" required autofocus />
            </div> --}}

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Contraseña:')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required oninput="validarPassword()" />
                <small></small>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar Contraseña:')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required oninput="validarPassword2()" />
                                    <small></small>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reestablecer Contraseña') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
