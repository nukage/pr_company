// JavaScript Document

jQuery(document).ready( function($) {
//Better letter solution for artists
if ($('.letterholder').length > 0) {
    var $letter = $('.letterholder').html();
$('.letter').append(' - ' + $letter);
}

        var $container = $('.portfolio-items');
        var $pastclienttxt= $("#pastclienttxt").html();  
        var $notpastclienttxt = ':not(.category-' + ($pastclienttxt).replace(/\s+/g, '-').toLowerCase() + ')' ;
        
// Portfolio Isotope Filter
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
       
            $container.isotope({
            filter:$notpastclienttxt,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
        });

        $('#all').addClass('active');
        };
        $("#all").attr("data-filter", $notpastclienttxt);
        
        $('.cat a').click(function() {
            if ( $(this).is("#category-past-clients")) {
                    $('#oldclientslist').removeClass('invisible');
            }
            else {
                $('#oldclientslist').addClass('invisible');
            };
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
	
 