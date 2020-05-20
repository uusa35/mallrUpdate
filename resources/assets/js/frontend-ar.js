$(document).ready(function() {
    console.log('from inside custom-ar')
    console.log('from inside the Slick Carousel');
    var item = 4;
    products = $('.tt-carousel-products');
    brands = $('.tt-carousel-brands');
    products.slick({
        rtl: true,
        dots: true,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: item || 4,
        slidesToScroll: item || 4,
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
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
    });
    brands.slick({
        rtl: true,
        dots: true,
        arrows: true,
        infinite: true,
        speed: 300,
        slidesToShow: item || 4,
        slidesToScroll: item || 4,
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
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }]
    });
});
