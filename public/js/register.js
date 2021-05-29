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
  
      var validar = true;
  
      function validarNombre(){
          var name = document.getElementById('name');
          if(name.value.length<3){
              name.style.border = rojo;
              name.nextElementSibling.innerHTML = "El nombre debe tener 3 caracteres mínimo";
              validar = false;
  
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
              validar = false;
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
              validar = false;
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
                  pass2.nextElementSibling.innerHTML = "Es obligatorio confirmar la contraseña";
              }else{
                  pass2.nextElementSibling.innerHTML = "Las contraseñas no coinciden";
              }
              validar = false;
          }else{
              pass2.style.border = verde;
              pass2.nextElementSibling.innerHTML = "";
          }
      }
  
      function validarFormulario(event){
          validar = true;
          validarNombre();
          validarCiudad();
          validarEmail();
          validarPassword();
          validarPassword2();
          if(validar===false){
              event.preventDefault();
          }
      }
  
      function disableButton(form) {
        var btn = form.lastElementChild;
        btn.disabled = true;
        btn.innerText = 'Enviando...'
    }

    $(function () {
        $(".tamanio_img").change(function (e){
            var a = e.target.files[0];
            if(parseFloat(a.size / 1024).toFixed(2)>=980){
                alertify.alert("Mensaje de Alerta", parseFloat(a.size / 1024).toFixed(2) + " KB, imágen demasiado grande (980 Mb máximo)");
                e.currentTarget.value = '';
                setTimeout(function(){
                    document.getElementById('imagePreview').style = '';
                },1000);
            }
        });
    });
  
  