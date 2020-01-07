$(document).ready(function() {
    // Navbar Minimize on Scroll
    $(window).scroll(function() {
        var scrollTop = $(window).scrollTop();
        if (scrollTop == 0) {
            $('#nav-header').css({ height: '100px', display: "block" });
        } else if (scrollTop <= 500) {
            $('#nav-header').css({ height: '75px', display: "block" });
        } else {
            $('#nav-header').css({ height: '0px'});
        }
    });

    // Setup For Carousel For Best Seller Products
    var owl = $('.owl-carousel');

    owl.owlCarousel({
        margin: 10,
        dots: false,
        dotsEach: false,
        responsive: {
            0: {
                items: 2
            },
            700: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });

    $('.bef-btn').click(function() {
        owl.trigger('prev.owl.carousel', [300]);
    });
    $('.aft-btn').click(function() {
        owl.trigger('next.owl.carousel');
    });
});
