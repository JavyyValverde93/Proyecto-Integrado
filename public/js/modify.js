$(function () {
    $("#uploadFile").on("change", function () {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader)
    return; // no file selected, or no FileReader support

        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function () { // set image data as background of div
                $("#imagePreview").css("background-image", "url(" + this.result + ")");
            }
        }
    });
});

var verde = "lime 2px solid";
var rojo = "red 2px solid";

function validarNombre() {
    var name = document.getElementById('name');
    if (name.value.length < 3) {
        name.style.border = rojo;
        name.nextElementSibling.innerHTML = "El nombre debe tener 3 caracteres mínimo";
        return false;
    } else {
        name.style.border = verde;
        name.nextElementSibling.innerHTML = "";
        return true;
    }
}

function validarCiudad() {
    var city = document.getElementById('ciudad');
    if (city.value.length < 4) {
        city.style.border = rojo;
        city.nextElementSibling.innerHTML = "La ciudad no existe";
        return false;
    } else {
        city.style.border = verde;
        city.nextElementSibling.innerHTML = "";
        return true;
    }
}

function validarEmail() {
    var email = document.getElementById('email');
    var comprobar =
        /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if (email.value.length < 5 || !comprobar.test(email.value)) {
        email.style.border = rojo;
        email.nextElementSibling.innerHTML = "El email no es correcto";
        return false;
    } else {
        email.style.border = verde;
        email.nextElementSibling.innerHTML = "";
        return true;
    }
}

function validarFormulario(event) {
    if (!validarNombre() || !validarCiudad() || !validarEmail()) {
        event.preventDefault();
    }
}

function disableButton(form) {
    var btn = form.getElementById('actualizar');
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


window.onload = inicio;

function inicio() {
    document.getElementById('home').classList = document.getElementById('actualizar').classList;
    document.getElementById('back').classList = document.getElementById('actualizar').classList;
    document.getElementById('destr').classList = document.getElementById('actualizar').classList;
    document.getElementById('destr').classList.remove('float-right');
    document.getElementById('destr').classList.remove('ml-4');

    document.getElementById('back').classList.remove('float-right');
    document.getElementById('back').classList.remove('ml-4');
    document.getElementById('home').classList.remove('float-right');
    document.getElementById('home').classList.remove('ml-4');
}