
    $(document).ready(function(){
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
    document.getElementsByClassName('slick-prev slick-arrow')[0].innerHTML = "<i class='fas fa-backward'></i> Anterior";
    document.getElementsByClassName('slick-prev slick-arrow')[0].classList.add('ui');
    document.getElementsByClassName('slick-prev slick-arrow')[0].classList.add('button');
    document.getElementsByClassName('slick-prev slick-arrow')[0].classList.add('my-3');
    
    document.getElementsByClassName('slick-next slick-arrow')[0].innerHTML = "<i class='fas fa-forward'></i> Siguiente";
    document.getElementsByClassName('slick-next slick-arrow')[0].classList.add('ui');
    document.getElementsByClassName('slick-next slick-arrow')[0].classList.add('button');
    document.getElementsByClassName('slick-next slick-arrow')[0].classList.add('my-3');
    
    });


    
                            //Variable para guardar en enlace usado
                            var prevPage = null;

                            //Variables para guardar los dígitos de los números de la página
                            n1 = null;
                            n2 = null;
                            n3 = null;

                            //Variable para controlar numerosas llamadas a cargar productos
                            intento = 1;

                            var enlase = document.getElementById('links').nextElementSibling.firstElementChild.lastElementChild.href;

                            var enlace = "";

                            let httpRequest = new XMLHttpRequest();

                            //Devuelve el número de la página, después del page= del enlace
                            function numPage(enl) {
                                for (i = 1; i <= 4; i++) {
                                    if (enl[enl.length - i] != "=") {
                                        if (n1 == null) {
                                            n1 = enl[enl.length - i];
                                        } else {
                                            if (n2 == null) {
                                                n2 = enl[enl.length - i] * 10;
                                            } else {
                                                if (n3 == null) {
                                                    n3 = enl[enl.length - i] * 100;
                                                }
                                            }
                                        }
                                    } else {
                                        break;
                                    }
                                }
                                if (n2 != null) {
                                    n = n1 + n2;
                                    if (n3 != null) {
                                        n = n + n3;
                                    }
                                } else {
                                    n = n1;
                                }
                                n1 = +n + 1;

                                if (prevPage == null) {
                                    prevPage = enl;
                                } else {
                                    prevPage = enl.replace("page=" + n, "page=" + n1);
                                }
                                n1 = null;
                                n2 = null;
                                n3 = null;
                            }

                            function cargaProd(e) {

                                if(intento==1){
                                    intento=0;
                                    if (prevPage == null) {
                                        numPage(enlase);
                                    } else {
                                        //Le suma 1 al page del enlace anterior
                                        numPage(prevPage);
                                    }

                                    enlace = prevPage;


                                    httpRequest.open('GET', enlace, true);
                                    httpRequest.overrideMimeType('text/html');
                                    httpRequest.send(null);
                                    httpRequest.LOADING = cargando;
                                    httpRequest.onload = procesarRespuesta;
                                }
                            }
                            //Crea un nuevo DOM con el enlace de la siguiente página, coge los productos y los trae a esta
                            function procesarRespuesta() {
                                var respuesta = httpRequest.responseText;
                                var dom2 = new DOMParser();
                                var doc = dom2.parseFromString(respuesta, 'text/html');

                                var pag = doc.querySelector('#prods').innerHTML;
                                document.querySelector('#prods').innerHTML = document.querySelector('#prods').innerHTML + pag;

                                history.pushState(null, "", enlace);

                                intento = 1;
                            }

                            function cargando(){
                                document.querySelector('#prods').innerHTML = document.querySelector('#prods').innerHTML + "<img src={{asset('storage/img/loading.gif')}}>";
                            }

                            //Alerta cookies
                            
                            window.addEventListener("load", function(){
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
                                })});