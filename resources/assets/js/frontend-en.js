$(document).ready(function () {
    console.log('frontend-en started');
    $('*[class^="tt-carousel-products"]').not('.slick-initialized').slick({
        rtl: false,
        dots: true,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow:  4,
        slidesToScroll: 4,
        adaptiveHeight: true,
        responsive: [{
            breakpoint: 1025,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
            {
                breakpoint: 791,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }]
    });
});