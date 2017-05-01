// JavaScript Document

// Portfolio Isotope Filter
jQuery(document).ready( function($) {
        var $container = $('.portfolio-items');

        if ($('body.home').length > 0)
        {


        $container.isotope({
            filter: '.category-featured',
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }

        });
        $('#category-featured').addClass('active');
        }
        else{
            $('#all').addClass('active');
        };
        $('.cat a').click(function() {
            $('.cat .active').removeClass('active');
            $(this).addClass('active');
            var selector = $(this).attr('data-filter');
            $container.isotope({
                filter: selector,
                animationOptions: {
                    duration: 750,
                    easing: 'linear',
                    queue: false
                }
            });
            return false;
        });

         // layout Isotope again after all images have loaded
    $container.imagesLoaded( function() {
        $container.isotope('layout');
    });

    });
	
 