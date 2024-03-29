<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Gracias por entrar en Milesy! Antes de comenzar, tienes que  verificar el correo, para ello te hemos enviado un correo, solo debe clickear en el enlace. Si no lo recive, le enviaremos otro.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionaste durante el registro.') }}
        </div>
        @endif
        <div class="mb-4 font-medium text-sm text-red-600">
            <label id="verificado"></label>
        </div>

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Reenviar Verificación de Email') }}
                    </x-button>

                </div>

            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Cerrar Sesión') }}
                </button>
            </form>
        </div>

        <div class="row mt-3">
            <x-button onclick="window.location.href = window.location.href; localStorage.setItem('verificado', 1);">
                {{ __('Ya verificada') }}
            </x-button>
        {{-- </div>
        <script>
            if(localStorage.getItem(verificado)==1){
            }
            document.getElementById('verificado').innerHTML = "Aún no se ha verificado el correo";

        </script> --}}
    </x-auth-card>
</x-guest-layout>
