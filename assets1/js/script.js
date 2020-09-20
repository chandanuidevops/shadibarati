//scroll page on clicking nav
(function ($)
{ "use strict"; 
$('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () 
{ 
    $('a.js-scroll-trigger').removeClass('active') 
    $(this).addClass('active'); 
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) 
    { 
        var target = $(this.hash); 
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']'); 
        if (target.length) 
        { 
            $('html, body').animate({ scrollTop: (target.offset().top - 0) }, 1000, "easeInOutExpo"); 
            return false; 
        } 
    } 
}); 
})(jQuery); 
 //fixed nav on scroll
window.onscroll = function() {myFunction()};
var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}

//family gallery slider
$(document).on('ready', function() {
    $('.four-time').slick({
    dots: false,
    slidesToShow: 4,
    slidesToScroll: 4,
    touchMove: true,
    arrows:false,
    responsive: [
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: false
      }
    },
  ]
    });
     $('.testimonial').slick({
    dots: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    touchMove: true,
    arrows:false,
     })
})

//family gallery slider
