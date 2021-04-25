<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            {{-- <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a> --}}
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
  background-image: url(https://i.pinimg.com/236x/70/a2/05/70a2054d4f873ee9c6c208b9d6b31f15.jpg);
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

    function validarPassword2(){
        var pass1 = document.getElementById('password');
        var pass2 = document.getElementById('password_confirmation');
        if(pass2<8 || !Object.is(pass1.value, pass2.value)){
            pass2.style.border = rojo;
            pass2.nextElementSibling.innerHTML = "Las contraseñas no coinciden";
        }else{
            pass2.style.border = verde;
            pass2.nextElementSibling.innerHTML = "";
        }
    }

    function validarFormulario(event){
        validarNombre();
        validarCiudad();
        validarEmail();
        validarPassword();
        validarPassword2();
        if(validar!=true){
            event.preventDefault();
        }
    }

        </script>

        <!-- Validation Errors -->
        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!--Foto de perfil -->
            <div id="imagePreview" class="mx-auto">
                <x-input id="uploadFile" type="file" name="image" class="img" />
                <div class="hover">
                <i class="ion-camera"></i>
                </div>
            </div>

            <!-- Name -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
            <div>
                <x-label for="name" :value="__('Nombre:')" />

                <x-input id="name" oninput="validarNombre()" class="block mt-1 w-full" type="text" minlength=3 name="name" :value="old('name')" required autofocus />
                <small></small>
            </div>
            <!-- Ciudad -->
            <div class="mt-4">
                <x-label for="ciudad" :value="__('Ciudad:')" />

                <x-input id="ciudad" oninput="validarCiudad()" class="block mt-1 w-full" type="text" name="ciudad" :value="old('ciudad')" required autofocus />
                <small></small>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Correo:')" />

                <x-input id="email" oninput="validarEmail()" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <small></small>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Contraseña:')" />

                <x-input id="password" oninput="validarPassword()" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                                <small></small>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirmar Contraseña:')" />

                <x-input id="password_confirmation" oninput="validarPassword2()" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
                                <small></small>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Ya tiene cuenta?') }}
                </a>

                <x-button class="ml-4" onmouseover="validarFormulario(this)">
                    {{ __('Registrarse') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
