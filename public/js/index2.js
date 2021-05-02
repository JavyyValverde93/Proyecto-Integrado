
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
