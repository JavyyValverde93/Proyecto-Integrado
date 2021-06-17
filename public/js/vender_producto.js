
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
            id = " #"+e.currentTarget.parentElement.nextElementSibling.parentElement.id;
            console.log(id);
            $(id).load(window.location.href+id);
            e.currentTarget.parentElement.nextElementSibling.parentElement.id = Math.floor(Math.random() * 10000);
            e.currentTarget.value = '';
        }
    });
});


function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-upload-wrap').hide();

            $('.file-upload-image').attr('src', e.target.result);
            $('.file-upload-content').show();

            $('.image-title').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
}

function readURL2(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-upload-wrap2').hide();

            $('.file-upload-image2').attr('src', e.target.result);
            $('.file-upload-content2').show();

            $('.image-title2').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
}

function readURL3(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-upload-wrap3').hide();

            $('.file-upload-image3').attr('src', e.target.result);
            $('.file-upload-content3').show();

            $('.image-title3').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
}

function readURL4(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-upload-wrap4').hide();

            $('.file-upload-image4').attr('src', e.target.result);
            $('.file-upload-content4').show();

            $('.image-title4').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
}

function readURL5(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();

        reader.onload = function (e) {
            $('.image-upload-wrap5').hide();

            $('.file-upload-image5').attr('src', e.target.result);
            $('.file-upload-content5').show();

            $('.image-title5').html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);

    } else {
        removeUpload();
    }
}


$('.image-upload-wrap').bind('dragover', function () {
    $('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap').bind('dragleave', function () {
    $('.image-upload-wrap').removeClass('image-dropping');
});

$('.image-upload-wrap2').bind('dragover', function () {
    $('.image-upload-wrap2').addClass('image-dropping2');
});
$('.image-upload-wrap2').bind('dragleave', function () {
    $('.image-upload-wrap2').removeClass('image-dropping2');
});

$('.image-upload-wrap3').bind('dragover', function () {
    $('.image-upload-wrap3').addClass('image-dropping3');
});
$('.image-upload-wrap3').bind('dragleave', function () {
    $('.image-upload-wrap3').removeClass('image-dropping3');
});

$('.image-upload-wrap4').bind('dragover', function () {
    $('.image-upload-wrap4').addClass('image-dropping4');
});
$('.image-upload-wrap4').bind('dragleave', function () {
    $('.image-upload-wrap4').removeClass('image-dropping4');
});

$('.image-upload-wrap5').bind('dragover', function () {
    $('.image-upload-wrap5').addClass('image-dropping5');
});
$('.image-upload-wrap5').bind('dragleave', function () {
    $('.image-upload-wrap5').removeClass('image-dropping5');
});

