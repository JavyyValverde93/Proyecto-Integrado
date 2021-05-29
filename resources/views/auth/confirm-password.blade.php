<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <style>
            
            label:not(.no)::after{
                            content: " *";
                            color: red;
                        }
        </style>
        <script>
            var verde = "lime 2px solid";
            var rojo = "red 2px solid";

            function validarPassword() {
                var pass1 = document.getElementById('password');
                if (pass1.value.length < 8) {
                    pass1.style.border = rojo;
                    pass1.nextElementSibling.innerHTML = "";
                } else {
                    pass1.style.border = verde;
                    pass1.nextElementSibling.innerHTML = "";
                }
            }

        </script>

        <div class="mb-4 text-sm text-gray-600 mt-0">
            {{ __('Por seguridad, confirme su contraseña antes de continuar.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Contraseña:')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                    oninput="validarPassword()" required autocomplete="current-password" />
            </div>

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Confirmar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
