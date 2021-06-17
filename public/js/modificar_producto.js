
function disableButton(form) {
    var btn = form.lastElementChild;
    btn.disabled = true;
    btn.innerText = 'Enviando...'
}

// $(function () {
//     $(".tamanio_img").change(function (e){
//         var a = e.target.files[0];
//         if(parseFloat(a.size / 1024).toFixed(2)>=980){
//             alertify.alert("Mensaje de Alerta", parseFloat(a.size / 1024).toFixed(2) + " KB, imágen demasiado grande (980 Mb máximo)");
//             alert('pp');
//             e.currentTarget.parentElement.nextElementSibling.innerHTML = '';
//             console.log(e);
//             e.currentTarget.value = '';
//         }
//     });
// });


var verde = "solid 2px lime";
var rojo = "solid 2px red";

function validarNombre(){
    var name = document.getElementsByName('nombre')[0];
    if(name.value.length<5){
        name.style.border = rojo;
        name.nextElementSibling.innerHTML = "El nombre del producto no es válido";
        return false;
    }else{
        name.style.border = verde;
        name.nextElementSibling.innerHTML = "";
        return true;
    }
}

function validarPrecio(){
    var name = document.getElementsByName('precio')[0];
    if(name.value<0.05){
        name.style.border = rojo;
        name.nextElementSibling.innerHTML = "Este campo es obligatorio";
        return false;
    }else{
        name.style.border = verde;
        name.nextElementSibling.innerHTML = "";
        return true;
    }
}

function validarDescripcion(){
    var name = document.getElementsByName('descripcion')[0];
    if(name.value.length<10){
        name.style.border = rojo;
        name.nextElementSibling.innerHTML = "Este campo debe contener más caracteres";
        return false;
    }else{
        name.style.border = verde;
        name.nextElementSibling.innerHTML = "";
        return true;
    }
}

function validarFormulario(event){
    if(!validarNombre() || !validarDescripcion() || !validarPrecio()){
        event.preventDefault();
    }
}

window.onload = o;
function o(){
    document.getElementById('nav-tabContent').scrollLeft += $(window).width()/2-44;

}