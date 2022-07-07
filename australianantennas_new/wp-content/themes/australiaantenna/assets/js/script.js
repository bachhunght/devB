/* Script on ready
------------------------------------------------------------------------------*/
jQuery(document).ready(function(){

//jQuery('.wpcf7-tel').keyup(function () { 
  //  this.value = this.value.replace(/[^0-9\.]/g,'');
//}
jQuery('.for_tel .wpcf7-tel,.for_tel .your-alt-phone input').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

	//  slider  // 
	jQuery('#banner-slider').bxSlider({
	 	pager:false,
	 	auto:true,
	 	pause:4000
	});

	/* menu for responsive */
    jQuery(".hb-menu").click(function () {
        jQuery(this).toggleClass("active");
        jQuery("nav.main-nav").slideToggle();

    });

    jQuery('.contact-map').click(function(){
        jQuery(this).find('iframe').addClass('clicked')})
        .mouseleave(function(){
        jQuery(this).find('iframe').removeClass('clicked')});

    /*if (jQuery(window).width() < 768) {*/
    var isMobile = (/android|webos|iphone|ipad|ipod|blackberry|iemobile|opera mini/i.test(navigator.userAgent.toLowerCase()));
    if(isMobile) {
         jQuery(".has-subnav > a").click(function () {
            jQuery(this).next().slideToggle();
         });
    }
    
    if(jQuery('.fancybox').length > 0) {
        jQuery(".fancybox").fancybox({
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
    
    jQuery('.go-to-top').click(function() {
        jQuery('html, body').animate({scrollTop:0}, 'slow');
    });
});
/* Script on scroll
------------------------------------------------------------------------------*/
jQuery(window).scroll(function() {
    if (jQuery(window).scrollTop() >= 200) {
        jQuery('.main-header').fadeIn(200).addClass('main-header-sticky');
        jQuery(".top ").fadeIn(200);
    } else {
        jQuery(".top ").fadeOut(200);
        jQuery('.main-header').removeClass('main-header-sticky');
    }
});

/* Script on resize
------------------------------------------------------------------------------*/
jQuery(window).resize(function() {
    
});

/* Script on load
------------------------------------------------------------------------------*/
jQuery(window).load(function() {
    
});


/* Script all functions
------------------------------------------------------------------------------*/	
