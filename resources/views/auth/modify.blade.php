<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
#uploadFile {
  opacity: 0;
  cursor: pointer;
  position: relative;
  z-index: 3;
}
#uploadFile:hover + .hover {
  opacity: 1;
}

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

.hover {
  height: 100%;
  width: 100%;
  background: rgba(0, 0, 0, 0.8);
  position: absolute;
  top: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  opacity: 0;
  transition-duration: 450ms;
}
.hover i {
  color: white;
  font-size: 55px;
}

small{
    color: red;
    font-style: italic;
}
        </style>
        <script>
            $(function() {
  $("#uploadFile").on("change", function()
                      {
    var files = !!this.files ? this.files : [];
    if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

    if (/^image/.test( files[0].type)){ // only image file
      var reader = new FileReader(); // instance of the FileReader
      reader.readAsDataURL(files[0]); // read the local file

      reader.onloadend = function(){ // set image data as background of div
        $("#imagePreview").css("background-image", "url("+this.result+")");
      }
    }
  });
});

    var verde = "lime 2px solid";
    var rojo = "red 2px solid";

    var validar = false;

    function validarNombre(){
        var name = document.getElementById('name');
        if(name.value.length<3){
            name.style.border = rojo;
            name.nextElementSibling.innerHTML = "El nombre debe tener 3 caracteres mínimo";
        }else{
            name.style.border = verde;
            name.nextElementSibling.innerHTML = "";
        }
    }

    function validarCiudad(){
        var city = document.getElementById('ciudad');
        if(city.value.length<4){
            city.style.border = rojo;
            city.nextElementSibling.innerHTML = "La ciudad no existe";
        }else{
            city.style.border = verde;
            city.nextElementSibling.innerHTML = "";
        }
    }

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

    function validarFormulario(event){
        validarNombre();
        validarCiudad();
        validarEmail();
        if(validar!=true){
            event.preventDefault();
        }
    }

        </script>


    <script>
        function disableButton(form) {
            var btn = form.getElementById('actualizar');
            btn.disabled = true;
            btn.innerText = 'Enviando...'
        }
    </script>


        <!-- Validation Errors -->
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
        <x-alert-message></x-alert-message>

        <form action="{{ route('modify_user', $user) }}" method="POST" enctype="multipart/form-data" onsubmit="disableButton(this)">
            @csrf
            @method('PUT')
            <!--Foto de perfil -->
            <div id="imagePreview" class="mx-auto  mb-5">
                <x-input id="uploadFile" type="file" name="image" class="img" />
                <div class="hover">
                <i class="ion-camera"></i>
                </div>
            </div>
            <p class="mx-auto my-5">Eliminar imágen: <input type="checkbox" class="checkbox" name="del_image"></p>

            <!-- Name -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

            <div>
                <x-label for="name" :value="__('Nombre:')" />

                <x-input id="name" oninput="validarNombre()" class="block mt-1 w-full" type="text" minlength=3 name="name" value="{{$user->name}}" required autofocus />
                <small></small>
            </div>
            <!-- Ciudad -->
            <div class="mt-4">
                <x-label for="ciudad" :value="__('Ciudad:')" />

                <x-input id="ciudad" oninput="validarCiudad()" class="block mt-1 w-full" type="text" name="ciudad" value="{{$user->ciudad}}" required autofocus />
                <small></small>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Correo:')" />

                <x-input id="email" oninput="validarEmail()" class="block mt-1 w-full" type="email" name="email" value="{{$user->email}}" required />
                <small></small>
            </div>

            <script>
                window.onload = inicio;
                function inicio(){
                    document.getElementById('home').classList = document.getElementById('actualizar').classList;
                    document.getElementById('back').classList = document.getElementById('actualizar').classList;
                    document.getElementById('destr').classList = document.getElementById('actualizar').classList;

                    document.getElementById('back').classList.remove('float-right');
                    document.getElementById('back').classList.remove('ml-4');
                    document.getElementById('home').classList.remove('float-right');
                    document.getElementById('home').classList.remove('ml-4');
                }

            </script>

            <div class="mt-4">
                <x-button id="actualizar" class="ml-4 mt-4 float-right" onmouseover="validarFormulario(this)">
                    {{ __('Guardar') }}
                </x-button>
                <a href="{{route('ver_perfil', $user->id)}}" id="back" class="p-4"><i class="fas fa-backward"></i></a>
                <a href="{{route('productos.index')}}" id="home" class="p-4"><i class="fas fa-home"></i></a>
                {{-- <a href="{{route('password.reset', $request->route('token'))}}" id="cambiarPass" class="">Cambiar Contraseña</a> --}}

            </div>
        </form>

            <div>
                <a id="destr" class="mr-0 ml-0" style="background-color: red; padding:3% 10%;" href={{route("destroy_user", $user->id)}} onclick="return confirm(`¿Está seguro de que quiere eliminar este usuario ?`)"><i class="fas fa-trash-alt mr-2"></i> Eliminar Cuenta</a>
            </div>

    </x-auth-card>
</x-guest-layout>
