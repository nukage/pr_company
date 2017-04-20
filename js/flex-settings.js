
    $(window).load(function(){

      $('#carousel').flexslider({

        animation: "slide",

        controlNav: false,

        animationLoop: true,

        slideshow: true,

        itemWidth: 200,

        itemMargin: 2,

        asNavFor: '#slider'

      });



      $('#slider').flexslider({

        animation: "fade",

        slideshowSpeed: 4000,   

        controlNav: false,

        animationLoop: true,

        slideshow: true,

        sync: "#carousel",

        start: function(slider){

          $('body').removeClass('loading');

        }

      });

    });