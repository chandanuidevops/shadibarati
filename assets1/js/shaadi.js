

 
  
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
              $('html, body').animate({ scrollTop: (target.offset().top - 90) }, 1000, "easeInOutExpo"); 
              return false; 
          } 
      } 
  }); 
  })(jQuery); 

  