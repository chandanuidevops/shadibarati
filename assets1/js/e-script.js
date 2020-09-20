$(function() {

    "use strict";


    var htmlBody = $('html, body');
    var nav = $('.custom_nav'),

        winDow = $(window),
        backtop = $('.BackTop');


    var menuTop = nav.offset().top;

    winDow.on('scroll', function() {

        var scrolTop = winDow.scrollTop();

        //menu js 
        if (scrolTop > menuTop) {
            nav.addClass('navfix');
        } else {
            nav.removeClass('navfix');
        }
        //back to top button js 

        if (scrolTop > 250) {
            backtop.fadeIn(1000);
        } else {
            backtop.fadeOut(1000);
        }



    });

    backtop.on('click', function() {
        $('html, body').animate({
            scrollTop: 0
        }, 500);
    });


    // venobox js part js
    $('.venobox').venobox();



    //header slider js
    $('.slider_img').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        dots: false,
        autoplaySpeed: 5000,
        infinite: true,
        arrows: true,
        prevArrow: '.slidPrv',
        nextArrow: '.slidNext',
        speed: 1000,
        fade: true,
        cssEase: 'linear'
    });


    // counter js
    $('.number-count').counterUp({
        time: 3000
    });
    //Story slick part 
    $('.story-slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        dots: false,
        arrows: false,
        prevArrow: '<i class="far fa-heart slidPrv3"></i>',
        nextArrow: '<i class="far fa-heart slidNext3"></i>',
        vertical: true,
        verticalSwiping: true,
        autoplay: false,
        centerMode: true,
        centerPadding: '0px',
        focusOnSelect: true,
        speed: 1000,

        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            }
        ]
    });


    //awesometeam js
    $('.Family_slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        centerPadding: 0,
        dots: false,
        centerMode: true,
        arrows: false,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    autoplay: true,
                    infinity: true,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    autoplay: true,
                    infinity: true,
                    dots: false,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 481,
                settings: {
                    slidesToShow: 1,
                    autoplay: true,
                    infinity: true,
                    dots: true,
                    slidesToScroll: 1
                }
            }
        ]
    });

    // USER FEEDBACK js
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider_item'
    });
    $('.slider_item').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        autoplay: true,
        centerPadding: 0,
        centerMode: true,
        arrows: false,
        centerMode: true,
        focusOnSelect: true,
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    autoplay: true,
                    infinity: true,
                    dots: false,
                    slidesToScroll: 1
                }
            }
        ]
    });
    //blog part slider  js
    $('.blog_slid').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        dots: false,
        autoplaySpeed: 5000,
        arrows: true,
        prevArrow: '.blog-prv',
        nextArrow: '.blog-next',
        infinite: true,
        responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 479,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });


    winDow.on('load', function() {
        $('#preloader').delay().fadeOut()
    });

}(jQuery));