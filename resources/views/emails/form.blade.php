<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('contacto')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="nombre">
                            {{ $errors->first('nombre')}}
                            <input type="text" name="correo">
                            <input type="text" name="asunto">
                            <input type="text" name="mensaje">
                            <button type="submit">Submit papu</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
