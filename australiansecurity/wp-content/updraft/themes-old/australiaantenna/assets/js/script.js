;( function( $ ) {
    /* Script on ready
    --------------------------------------------------------------------------*/
    $( document ).on( 'ready', function() {
        //$('.wpcf7-tel').keyup(function () { 
        //  this.value = this.value.replace(/[^0-9\.]/g,'');
        //}
        $('.for_tel .wpcf7-tel,.for_tel .your-alt-phone input').keyup(function () { 
            this.value = this.value.replace(/[^0-9\.]/g,'');
        });

        //  slider  // 
        $('#banner-slider').bxSlider({
            pager:false,
            auto:true,
            pause:4000
        });

        /* menu for responsive */
        $(".hb-menu").click(function () {
            $(this).toggleClass("active");
            $("nav.main-nav").slideToggle();

        });

        $('.contact-map').click(function(){
            $(this).find('iframe').addClass('clicked')})
            .mouseleave(function(){
            $(this).find('iframe').removeClass('clicked')});

        /*if ($(window).width() < 768) {*/
        var isMobile = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
        if(isMobile) {
                $(".has-subnav > a").click(function () {
                $(this).next().slideToggle();
                });
        }
        
        if($('.fancybox').length > 0) {
            $(".fancybox").fancybox({
                maxWidth	: 800,
                maxHeight	: 600,
                fitToView	: false,
                width		: '70%',
                height		: '70%',
                autoSize	: false,
                closeClick	: false,
                openEffect	: 'none',
                closeEffect	: 'none'
            });
        }
        
        $('.go-to-top').click(function() {
            $('html, body').animate({scrollTop:0}, 'slow');
        });
    } );

    /* Script on scroll
    --------------------------------------------------------------------------*/
    $(window).on( 'scroll', function() {
        if ($(window).scrollTop() >= 200) {
            $('.main-header').fadeIn(200).addClass('main-header-sticky');
            $(".top ").fadeIn(200);
        } else {
            $(".top ").fadeOut(200);
            $('.main-header').removeClass('main-header-sticky');
        }
    });

    /* Script on resize
    --------------------------------------------------------------------------*/
    $(window).on( 'resize', function() {
        
    });

    /* Script on load
    --------------------------------------------------------------------------*/
    $(window).on( 'load', function() {
        
    });


    /* Script all functions
    --------------------------------------------------------------------------*/
})(jQuery);
