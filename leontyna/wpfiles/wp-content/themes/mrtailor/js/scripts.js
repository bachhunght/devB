/*global jQuery:false, mrtailor_ajaxurl:false, mrtailor_scripts_vars_array.catalogMode= 0, mrtailor_scripts_vars_array.relatedProducts*/

var ua = window.navigator.userAgent;
var msie = ua.indexOf("MSIE ");

jQuery(document).foundation();

jQuery( function($) {

	var window_width = $(window).innerWidth();
	
	/* Ajax Calls */
		
	//responsive videos
	$(".content-area").fitVids();
	
	//add fresco groups to images galleries
	$(".gallery").each(function() {
		$(this).find('.fresco')
			.attr('data-fresco-group', $(this).attr('id'));
	});
    
    $('.font-group li').on({
        mouseenter: function() {
            $(this).addClass("active");
        }, 
        mouseleave: function() {
            $(this).removeClass("active");
        }
    });

    $('.product_images .easyzoom .product_image_zoom_button').on( 'hover', function(e){
    	e.preventDefault();
    	e.stopPropagation();
    });

    if( mrtailor_scripts_vars_array.gallery_lightbox ) {
		$(".product_images .easyzoom > a.zoom").addClass('fresco');
	}

	
	// Off Canvas Navigation
	var offcanvas_open = false;
	var offcanvas_from_left = false;
	var offcanvas_from_right = false;

	function mrtailor_catalog_mode() {
		if (mrtailor_scripts_vars_array.catalogMode == 1) {
			$("form.cart div.quantity").empty();
			$("form.cart button.single_add_to_cart_button").remove();
		}
	}

	mrtailor_catalog_mode();
	
	//submenu adjustments
	function submenu_adjustments() {
		$("#site-navigation > ul > .menu-item").on( 'mouseenter', function() {		
			if ( $(this).children(".sub-menu").length > 0 ) {
				var submenu = $(this).children(".sub-menu");
				var window_width = parseInt($(window).innerWidth());
				var submenu_width = parseInt(submenu.width());
				var submenu_offset_left = parseInt(submenu.offset().left);
				var submenu_adjust = window_width - submenu_width - submenu_offset_left;
				
				if (submenu_adjust < 0) {
					submenu.css("left", submenu_adjust-30 + "px");
				}
			}
		});
	}
	
	submenu_adjustments();
	
	//columns height adjustment
	function columns_height_adjustment() {
		
		$('.adjust_cols_height').each(function(){
			
			var column_min_height = 0;
			
			var that = $(this);
			
			that.imagesLoaded('always',function(){
				
				that.find('.vc_column_container, .vc_vc_column').first().siblings().addBack().css('min-height',0).each(function(){
					if ( $(this).outerHeight(true) > column_min_height ) {
						column_min_height = $(this).outerHeight(true);
					}
				})
				
				that.addClass('height_adjusted')
				.find('.vc_column_container, .vc_vc_column').first().siblings().addBack().css('min-height',column_min_height);
				
			});
			
			
		});
	};
	
	
	if ( $('.vc_row').hasClass('adjust_cols_height') )  {
		if ( window_width > 640 ) {
			setTimeout(function(){
				columns_height_adjustment();
			},1)
		} else {
			$('.adjust_cols_height').addClass('height_adjusted');
		}
	}
	
	//sticky header
	var headerHeight,minPos;
	function StickyHeaderShowPosition() {
		
		headerHeight = $('.site-header').outerHeight();
		if ( headerHeight*1.3 > 400 ) {
			minPos = headerHeight*1.3;
		}else{
			minPos = 400;
		}
		
	}
	
	if ( ( $(window).outerWidth() >= 1025 ) && ( $('.site-header-sticky').length > 0 ) ) {
		
		StickyHeaderShowPosition()
		
		if ( $(this).scrollTop() > minPos && !$('.site-header-sticky').hasClass('on_page_scroll') ) {
			$('.site-header-sticky').addClass('on_page_refresh');
			if ( $('body.admin-bar').length > 0 ) {
				$('.site-header-sticky').addClass('thebar_onscreen')
			}
		}
	}

	function sticky_site_tools() {
	    if ( $(window).outerWidth() < 1025 ) {
		    if ($(window).scrollTop() > $(".site-tools").data("top")) { 
		        //$(".site-tools").css({'position': 'fixed', 'z-index': '999999', 'top': '0', 'width': '100%', 'margin-top': '0', 'background': '#fff' });
		        $(".site-tools").addClass('site_tools_sticky');
		    }
		    else {
		        //$(".site-tools").css({'position': 'static', 'z-index': 'auto', 'top': 'auto', 'width': 'auto', 'margin-top': '20px', 'background': 'none'});
		    	$(".site-tools").removeClass('site_tools_sticky');
		    }
	    }
	}

	$(".site-tools").data("top", $(".site-tools").offset().top); // set original position on load
	
	//search	
	function switch_search_buttons() {
		if($(".site-search .search-field").val() !== "") {
			$(".search-but-added").css("z-index", "1");
			$(".site-search input[type=\"submit\"]").css("z-index", "2");
		} else {
			$(".search-but-added").css("z-index", "2");
			$(".site-search input[type=\"submit\"]").css("z-index", "1");
		}
	}
	
	
	function toggle_logo_nav() {
		if ( !$('.site-header').hasClass('site-search-open') )
			$('.site-header, .site-header-sticky').addClass('site-search-open');
		else
			$('.site-header, .site-header-sticky').removeClass('site-search-open');
	}
	
	function reset_search_toggles() {
		$('.site-search').removeClass("open");
		$('.site-header, .site-header-sticky').removeClass('site-search-open');
	}
	
	$("#searchform div, .site-search div").append( '<div class="search-but-added">' + $(".search-button").html() + '</div>' );
	
	$(".search-button, .search-but-added").on('click', function() {

		$("html, body").animate({
			scrollTop:0
		},"slow");

        $(".site-search").toggleClass("open");
		
		setTimeout(function(){
			$('.search-field').focus();
		}, 500)

		toggle_logo_nav();		
		switch_search_buttons();
		
		$("body").on('click',function(e) {
			if ( $(e.target).attr('class') == 'getbowtied-icon-search' || $(e.target).attr('class') == 'search_icon' || $(e.target).attr('class') == 'search-field') {
				return;
			} else {
				reset_search_toggles()
				$('body').unbind('click');
			}
		});
	});
	
	$(".site-search .search-field").keyup(function() {
		switch_search_buttons();
	});
	
	
	//blog isotope - adjust wrapper width, return blog_grid
    function blogIsotopeWrapper () {
           
		if ( $(window).innerWidth() > 1024 ) {
			$blog_grid = 3;
		} else if ( $(window).innerWidth() <= 640 ) {
			$blog_grid = 1;
		} else {
			$blog_grid = 2;
		}
       
        $blog_wrapper_width = $('.blog-isotop-container').width();
   
        if ( $blog_wrapper_width % $blog_grid > 0 ) {
            $blog_wrapper_width = $blog_wrapper_width + ( $blog_grid - $blog_wrapper_width%$blog_grid);
        };
   
        $('.blog-isotope').css('width',$blog_wrapper_width);

        return $blog_grid;
    } // end blogIsotopeWrapper
	
	//blog isotope
    if ( $('.blog-isotop-container').length ) {
           
		var $blog_wrapper_inner,   
            $blog_wrapper_width,
            $blog_grid,
            $filterValue;
       
        $filterValue = $('.filters-group .is-checked').attr('data-filter');
                      
        $blog_grid =  blogIsotopeWrapper();
        blogIsotopeWrapper();
       
        var afterBlogIsotope = function(){
            setTimeout(function(){
                //$('.preloader_isotope').remove();
                $(".blog-post").removeClass('hidden');
				$(".blog-isotope").addClass('isotope-ready');
            },200);
        }
       
        var blogIsotope=function(){
            var imgLoad = imagesLoaded($('.blog-isotope'));
		   
            imgLoad.on('done',function(){

                $blog_wrapper_inner = $('.blog-isotope').isotope({
                    "itemSelector": ".blog-post",
					 //layoutMode: 'fitRows',
                    "masonry": { "columnWidth": ".grid-sizer" }
                });
               
			   afterBlogIsotope()
               
            })
           
           imgLoad.on('fail',function(){

                $blog_wrapper_inner = $('.blog-isotope').isotope({
                    "itemSelector": ".blog-post",
                    "masonry": { "columnWidth": ".grid-sizer" }
                });
               
                afterBlogIsotope()
           })  
           
        }
                   
        blogIsotope();
   
        // filter items on button click
        $('.filters-group').on( 'click', 'filter-item', function() {
           
            $filterValue = $(this).attr('data-filter');
            $blog_wrapper_inner.isotope({ filter: $filterValue });
        
		});
    }//endif blog isotope	
    
    //product animation (thanks Sam Sehnert)
    $.fn.visible = function(partial) {

      var $t            = $(this),
          $w            = $(window),
          viewTop       = $w.scrollTop(),
          viewBottom    = viewTop + $w.height(),
          _top          = $t.offset().top,
          _bottom       = _top + $t.height(),
          compareTop    = partial === true ? _bottom : _top,
          compareBottom = partial === true ? _top : _bottom;

    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

    };

    $(".products li").each(function(i, el) {
        if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
			$(el).addClass("shown");
		}            
        else {
			if ($(el).visible(true)) {
				$(el).addClass("shown");
			}
		}
    });
    
    //if is visible on screen add a class
    $(".single_product_summary_related").each(function(i, el) {
        if ($(el).visible(true)) {
            $(el).addClass("on_screen");
        } 
    });
	
	function offcanvas_left() {
		$(".no-csstransforms3d .st-pusher").removeClass("st-pusher-from-right-zombie-browsers");
		$(".no-csstransforms3d .st-pusher").addClass("st-pusher-from-left-zombie-browsers"); // IE-lte-9
			
		$(".st-container").removeClass("slide-from-right");
		$(".st-container").addClass("slide-from-left");
		$(".st-container").addClass("st-menu-open");
		
		offcanvas_open = true;
		offcanvas_from_left = true;
		
		$(".st-menu").addClass("open");
		$("body").addClass("offcanvas_open offcanvas_from_left");
		
		$(".nano").nanoScroller();
		
		$('.site-header-sticky').addClass('offcanvas-active');
		
		$(".product_navigation").addClass('hidden');
		
		/*setTimeout(function() {	
			$("html").addClass("overflow-y-hidden"); // remove the scrollbar when off-canvas is open
			//$(".st-content").css("overflow-y", "hidden"); // remove the scrollbar when off-canvas is open
		}, 1);*/

	}
	
	function offcanvas_right() {
		$(".no-csstransforms3d .st-pusher").removeClass("st-pusher-from-left-zombie-browsers");
		$(".no-csstransforms3d .st-pusher").addClass("st-pusher-from-right-zombie-browsers"); // IE-lte-9
			
		$(".st-container").removeClass("slide-from-left");
		$(".st-container").addClass("slide-from-right");
		$(".st-container").addClass("st-menu-open");		
		
		offcanvas_open = true;
		offcanvas_from_right = true;
		
		$(".st-menu").addClass("open");
		$("body").addClass("offcanvas_open offcanvas_from_right");

		$(".nano").nanoScroller();
		
		$('.site-header-sticky').addClass('offcanvas-active');
		
		$(".product_navigation").addClass('hidden');
	}
	
	function offcanvas_close() {
		if (offcanvas_open === true) {
			
			$(".no-csstransforms3d .st-pusher").removeClass("st-pusher-from-left-zombie-browsers"); // IE-lte-9
			$(".no-csstransforms3d .st-pusher").removeClass("st-pusher-from-right-zombie-browsers"); // IE-lte-9
				
			$(".st-container").removeClass("slide-from-left");
			$(".st-container").removeClass("slide-from-right");
			$(".st-container").removeClass("st-menu-open");
			
			offcanvas_open = false;
			offcanvas_from_left = false;
			offcanvas_from_right = false;
			
			$('#st-container').css('max-height', 'inherit');
			$(".st-menu").removeClass("open");
			$("body").removeClass("offcanvas_open offcanvas_from_left offcanvas_from_right");
			
			/*setTimeout(function() {	
				$("html").removeClass("overflow-y-hidden");;
				//$(".st-content").css("overflow-y", "inherit");
			}, 1);*/
			
			setTimeout(function() {
				$(".slide-from-left").removeClass("filters");
				$('.site-header-sticky').removeClass('offcanvas-active');
			}, 500);
			
			setTimeout(function() {
				$(".product_navigation").removeClass('hidden');
			}, 1000);

			
		}
	}

	$(".add_to_cart_button").on('click',function(e) {

		if( this.classList.contains('product_type_simple') ) {
			$(".offcanvas-right-content").hide();
			$("#minicart-offcanvas").show();
			
			offcanvas_right();
		}
		
	});
	
	$(".shopping-bag-button").on('click',function(e) {

		$(".offcanvas-right-content").hide();
		$("#minicart-offcanvas").show();
		
		offcanvas_right();
		
	});
	
	$("#button_offcanvas_sidebar_left").on('click', function() {
		
		$(".offcanvas-left-content").hide();
		$(".slide-from-left").addClass("filters");
		$("#filters-offcanvas").show();

		offcanvas_left();
		
	});
	
	$(".mobile-menu-button").on('click', function() {
		
		$(".offcanvas-left-content").hide();
		$("#mobiles-menu-offcanvas").show();
		
		offcanvas_left();
		
	});
	
	$("#st-container").on("click", ".st-pusher-after", function(e) {
		
		offcanvas_close();
		
	});
	
	$(".st-pusher-after").swipe({
		swipeLeft:function(event, direction, distance, duration, fingerCount) {
			offcanvas_close();
		},
		swipeRight:function(event, direction, distance, duration, fingerCount) {
			offcanvas_close();
		},
		tap:function(event, direction, distance, duration, fingerCount) {
			offcanvas_close();
		},
		threshold:0
	});
	
	//mobile menu	
	$(".mobile-navigation .menu-item-has-children").append('<div class="more"></div>');
	
	$(".mobile-navigation").on("click", ".more", function(e) {
		e.stopPropagation();
		$(this).parent().children(".sub-menu").toggleClass("open");
		$(".nano").nanoScroller();
	});
	
	$(".mobile-navigation").on("click", "a", function(e) {
		$(".mobile-navigation").find(".sub-menu").removeClass("open");
		offcanvas_close();
	});
	
	$("#cross-sell-products-carousel").owlCarousel({
		items:2,
		itemsDesktop : false,
		itemsDesktopSmall : false,
		itemsTablet: false,
		lazyLoad : true,
	});
	
	$("#upsells-products-carousel").owlCarousel({
		items:4,
		itemsDesktop : [1200,4],
		itemsDesktopSmall : [1000,3],
		itemsTablet: false,
		itemsMobile : [600,2],
		lazyLoad : true,
	});

	function replace_img_source(selector) {
		var data_src = $(selector).attr('data-src');
		$(selector).one('load', function() {
		}).each(function() {
			$(selector).attr('src', data_src);
			$(selector).css("opacity", "1");
		});
	}
	
	$('#products-grid li img').each(function(){
		replace_img_source(this);
	});
	
	$('.related.products:not(.owl-carousel) li img').each(function(){
		replace_img_source(this);
	});
	
	$('.upsells.products:not(.owl-carousel) li img').each(function(){
		replace_img_source(this);
	});

	
	//wishlist 
	
	$('.add_to_wishlist').on('click',function(){
		$(this).parents('.yith-wcwl-add-button').addClass('show_overlay');
	});	

	// Login/register
	var login_container = $('.login-register-container');
	
	login_container.on('click','.account-tab-link',function(){
		
		var that = $(this),
			target = that.attr('href');
		
		that.parent().siblings().find('.account-tab-link').removeClass('current');
		that.addClass('current');
		
		$(target).siblings().stop().fadeOut(function(){
			$(target).fadeIn();	
		});
		
		return false;
	});
    
    
    function disable_fresco() {
        $(".product_images a").on('click',function() {
			
			// Disable fresco
			if ($(window).innerWidth() < 640 ) {
                return false;
            }			
        });
	}
    
    disable_fresco();
	
	function handleNavigation() {		
		setTimeout(function() {		
			if ($(window).innerWidth() > 1000 ) {				
				if ($(".single_product_summary_related.on_screen, #site-footer.on_screen")[0]){					
					$(".product-nav-previous, .product-nav-next").hide();					
				} else {					
					$(".product-nav-previous, .product-nav-next").fadeIn(300);				
				}			
			} else {				
				$(".product-nav-previous, .product-nav-next").hide();				
			}			
		}, 100);		
	}	
	handleNavigation();
	
	function handleSelect() {	
		if ($(window).innerWidth() > 1024 ) {
			
			$(".orderby, .big-select, select.topbar-language-switcher, select.wcml_currency_switcher").select2({
			// $(".orderby, .big-select").select2({
				minimumResultsForSearch: Infinity
			});
			
		}
	}
	
	handleSelect();
	
	
	//gallery caption
	$('.gallery-item').each(function(){
		
		var that = $(this);
		
		if ( that.find('.gallery-caption').length > 0 ) {
			that.append('<span class="gallery-caption-trigger">i</span>')
		}
		
	})
	
	$('.gallery-caption-trigger').on('mouseenter',function(){
		$(this).siblings('.gallery-caption').addClass('show'); 
	});
	
	$('.gallery-caption-trigger').on('mouseleave',function(){
		$(this).siblings('.gallery-caption').removeClass('show');
	});
	
	
	//Language Switcher
	$('.topbar-language-switcher').change(function(){
		window.location = $(this).val();
	});
	
	$('.variations').on("click", ".reset_variations", function(){
        $('.big-select').select2("val", "");
    });
	
	// Toggle product navigation based on fresco
    $(".fresco").on("click", function() {
        $(".product-nav-previous").hide();
        $(".product-nav-next").hide();
    });
    
    $(".fr-window").on("click", function() {
        $(".product-nav-previous").show();
        $(".product-nav-next").show();
    });
    
    //category parallax
    function parallax_engine(cat_parallax_pos) {
        if ($(window).innerWidth() > 1200 ) {
            $(".category_header").css('background-position', 'center '+parseInt(-200+cat_parallax_pos/1.5)+'px'); // this 200 value can be found in styles.css also
            $(".entry-header").css('background-position', 'center '+parseInt(-200+cat_parallax_pos/1.5)+'px'); // this 200 value can be found in styles.css also
        } else {
            $(".category_header").css('background-position','center center');
            $(".entry-header").css('background-position','center center');
        }
    }
    
    parallax_engine($(this).scrollTop());
		
	$('.trigger-footer-widget-icon').on('click', function(){
		
		var trigger = $(this).parent();
		
		trigger.fadeOut('1000',function(){
			trigger.remove();
			$('.site-footer-widget-area').fadeIn();
		});
	});
	
	
	//scroll top tour section on next,prev slides
	$('.wpb_next_slide,.wpb_prev_slide').on('click',function(){
		
		var wpb_tour_top = $('.wpb_tour.wpb_content_element').offset().top;
		var window_width = $(window).width();
		
		if ( window_width > 1024 ) {
			$("html, body").animate(
				{ scrollTop: wpb_tour_top - 200 }
			);
		}else if ( window_width < 640 )  {
			$("html, body").animate(
				{ scrollTop: wpb_tour_top - 50 }
			);
		} else {
			$("html, body").animate(
				{ scrollTop: wpb_tour_top - 100 }
			);
		}
	})
	
	$(window).on( 'load', function(){
		
		$('body').hide().show(); //fix invisible fonts on refresh.

		//Product Gallery zoom	
		if ($(".easyzoom").length ) {
			if ( $(window).width() > 1024 ) {
				var $easyzoom = $(".easyzoom").easyZoom({
					loadingNotice: '',
					errorNotice: '',
					preventClicks: false,
				});
				
				var easyzoom_api = $easyzoom.data('easyZoom');
				
				$(".variations").on('change', 'select', function() {
					// owl.goTo(0);
					easyzoom_api.teardown();
					easyzoom_api._init();
				});
			}
		}
			

        setTimeout(function() {	
            $(".product_thumbnail.with_second_image .product_thumbnail_background").css("background-size", "cover");
			$(".product_thumbnail.with_second_image").addClass("second_image_loaded");
        }, 300);
		
		// visible products on vc tabs
		
		$(".wpb_tour_tabs_wrapper").find(".products li").addClass("animate");
		
		$('.ui-tabs-anchor').on('click', function(){
			$(this).parents(".wpb_tour_tabs_wrapper").find(".products li").addClass("animate");
		});
		
		// visible products on vc tour
		$('.wpb_prev_slide a, .wpb_next_slide a, .wpb_tabs_nav a').on('click', function(){
			$(this).parents('.wpb_tour_tabs_wrapper').find(".products li").addClass("animate");
		});
		
        //if not IE add parallax
		//if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {}            
        //else {
			if ($(window).outerWidth() > 1024) {
				$(window).stellar({
					horizontalScrolling: false,
				});
			}
		//}
        
	});
		
	$(window).on( 'resize', function(){
		
		$("#site-navigation > ul > .menu-item > .sub-menu").css("left", "-15px");
		
		//offcanvas_close();        
        disable_fresco();
		
		setTimeout(function() {	
			if (window_width != $(window).innerWidth()) { // only horizontal resize (mobiles keyboard triggers window resize)
				reset_search_toggles();
			}
		}, 100);
		
		// disable select2
		//handleSelect();
		
		// hide product navogation
		handleNavigation();
        
        //category parallax
        parallax_engine($(this).scrollTop());
		
		//columns height adjustment
		if ( $('.vc_row').hasClass('adjust_cols_height') )  {
			if ( $(window).width() > 640 ) {
				columns_height_adjustment(); 
			} else {
				$('.adjust_cols_height').find('.vc_column_container').css('min-height',300);
			}
		}
		
		
		//blog isotope
        if ( $('.blog-isotop-container').length ) {
           
            var $blog_grid_on_resize;
           
            blogIsotopeWrapper()
            $blog_grid_on_resize =  blogIsotopeWrapper(); 
           
            if ( $blog_grid != $blog_grid_on_resize ) {

                $('.filters-group .filter-item').each(function(){
                    if ( $(this).attr('data-filter') == $filterValue ){ 
                            $(this).trigger('click');
                    }
                })
               
                $blog_grid = $blog_grid_on_resize;
           
				resizeIsotopeEnd();
           
            } 
		}	
		
		//do something on end resize
        var window_resizeTo = this.resizeTO;
        function resizeIsotopeEnd() {
            if(window_resizeTo) clearTimeout(window_resizeTo);
                 window_resizeTo = setTimeout(function() {
                    $(this).trigger('onEndResizingIsotope');
            }, 100);
        }
        
	});
	
	
	//do something, window hasn't changed size in 100ms
    $(window).on( 'bind', 'onEndResizingIsotope', function() {
        $('.filters-group .filter-item').each(function(){
            if ( $(this).attr('data-filter') == $filterValue ){ 
                $(this).trigger('click');
            }
        })
    });

    
    $(window).on( 'scroll', function() {
        
		//sticky header
		if (  ( $(window).outerWidth() > 1024 ) && ( $('.site-header-sticky').length > 0 ) ) {
		
			StickyHeaderShowPosition();
		
			var that = $('.site-header-sticky');
		
			if ( that.hasClass('on_page_refresh') ) {
				that.removeClass('on_page_refresh');
			}
				
			if ( $('body.admin-bar').length > 0 ) {
				that.addClass('thebar_onscreen')
			}
				
			if ( $(this).scrollTop() > minPos && !that.hasClass('on_page_scroll') ) {
				that.addClass('on_page_scroll');
			} else if ( $(this).scrollTop() <= minPos ) {
				if (that.hasClass('thebar_onscreen')) {
					that.removeClass('on_page_scroll thebar_onscreen');	
				}else{
					that.removeClass('on_page_scroll');
				}
			}
		}

		if (mrtailor_scripts_vars_array.stickyHeader == 1){
			sticky_site_tools();
		}
		
		
        //animate products
        if ($(window).innerWidth() > 640 ) {
			$(".products li").each(function(i, el) {
				if ($(el).visible(true)) {
					$(el).addClass("animate"); 
				} 
			});
		}
        
        //mark this selector as visible
        $(".single_product_summary_related, #site-footer").each(function(i, el) {
            if ($(el).visible(true)) {
                $(el).addClass("on_screen");
				handleNavigation();
            } else {
                $(el).removeClass("on_screen");
				handleNavigation();
            }
        });		
        
        //category parallax
        parallax_engine($(this).scrollTop());
        
    });
	
	
	$(document).ajaxComplete(function(event, request, settings) {
		$(".products li").addClass("animate");
		$(".product_thumbnail.with_second_image .product_thumbnail_background").css("background-size", "cover");
		$(".product_thumbnail.with_second_image").addClass("second_image_loaded");
	});
});

jQuery( function($) {
	if ( ('form#register').length > 0 )
	{
		var hash = window.location.hash;
		if (hash)
		{
			$('.account-tab-link').removeClass('current');
			$('a[href="'+hash+'"]').addClass('current');

			hash = hash.substring(1);
			$('.account-forms > form').hide();
			$('form#'+hash).show();
		}
	}

	// remove character '-' from recently viewed widget
	$(".recently_viewed_in_single ul li").contents().filter(function () {
	    return this.nodeType === 3; // Text nodes only
	}).remove();
});

jQuery( function($) { 
	
		
	if ($('section.upsells #products-grid').length > 0) {
		$('.upsells #products-grid').owlCarousel({
			items: 4,
			itemsDesktop : [1200,4],
			itemsDesktopSmall : [1000,3],
			itemsTablet: false,
			itemsMobile : [600,2],
			lazyLoad : true,
			/*autoHeight : true,*/
		});
	}

	if ($('section.related #products-grid').length > 0) {
		$('section.related #products-grid').owlCarousel({
			items: mrtailor_scripts_vars_array.relatedProducts,
			itemsDesktop : [1200,4],
			itemsDesktopSmall : [1000,3],
			itemsTablet: false,
			itemsMobile : [600,2],
			lazyLoad : true,
			/*autoHeight : true,*/
		});
	}
});