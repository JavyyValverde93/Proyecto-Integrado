$(document).ready(function () {
    $('.customer-logos').slick({
        slidesToShow: 7,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: true,
        dots: false,
        pauseOnHover: true,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
    
    confButtons();

    window.addEventListener("mouseout", confButtons);
    
    function confButtons(){
        document.getElementsByClassName('slick-prev slick-arrow')[0].innerHTML = "<i class='fas fa-backward'></i> Anterior";
        document.getElementsByClassName('slick-prev slick-arrow')[0].classList.add('ui');
        document.getElementsByClassName('slick-prev slick-arrow')[0].classList.add('button');
        document.getElementsByClassName('slick-prev slick-arrow')[0].classList.add('my-3');

        document.getElementsByClassName('slick-next slick-arrow')[0].innerHTML = "<i class='fas fa-forward'></i> Siguiente";
        document.getElementsByClassName('slick-next slick-arrow')[0].classList.add('ui');
        document.getElementsByClassName('slick-next slick-arrow')[0].classList.add('button');
        document.getElementsByClassName('slick-next slick-arrow')[0].classList.add('my-3');

    }
});

//Alerta cookies

window.addEventListener("load", function () {
    window.cookieconsent.initialise({
        "palette": {
            "popup": {
                "background": "#000000"
            },
            "button": {
                "background": "#ffffff"
            }
        },
        "content": {
            "message": "Utilizamos cookies propias y de terceros para mejorar nuestros servicios. Si continúa con la navegación, consideraremos que acepta este uso.",
            "dismiss": "ACEPTAR",
            "link": "Leer más",
            "href": "http://www.interior.gob.es/politica-de-cookies"
        }
    })
});
