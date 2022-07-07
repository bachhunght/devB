<?php

/******************************************************************************/
/***************************** Theme Options *********************************/
/******************************************************************************/

if (!class_exists( 'Kirki')):
	require_once( get_template_directory() . '/settings/kirki/kirki.php');
	add_filter( 'kirki/config', 'getbowtied_kirki_update_url' );
	function getbowtied_kirki_update_url( $config ) {
	    $config['url_path'] = get_template_directory_uri() . '/settings/kirki/';
	    return $config;
	}
endif;

if ( class_exists( 'Kirki' ) ) :
	require_once( get_template_directory() . '/settings/mrtailor.kirki.config.php');
	require_once( get_template_directory() . '/inc/helpers/customizer-options.php');
endif;

/******************************************************************************/
/******************************** Includes ************************************/
/******************************************************************************/

require_once( get_template_directory() . '/inc/icons/class-icons.php');
require_once( get_template_directory() . '/inc/custom-styles/read-options.php');
require_once( get_template_directory() . '/inc/helpers/helpers.php');
require_once( get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php' );
require_once( get_template_directory() . '/inc/tgm/plugins.php' );
require_once( get_template_directory() . '/inc/admin/wizard/class-gbt-helpers.php' );
require_once( get_template_directory() . '/inc/admin/wizard/class-gbt-install-wizard.php' );
require_once( get_template_directory() . '/inc/demo/ocdi-setup.php');

function remove_getbowtied_tools() {
	if (class_exists( 'GetBowtied_Tools' )):
    ?>
	    <div class="notice notice-warning is-dismissible">
	        <p>
	        	<?php esc_html_e('The GetBowtied Tools plugin is no longer required. You can deactivate and delete it. Use the Envato Market plugin for future updates.', 'mr_tailor');?>
	        	<a href="<?php echo admin_url('themes.php?getbowtied_migrate_tools=1');?>">I'm ready</a> or
	        	<a href="https://mrtailor.wp-theme.help/hc/en-us/articles/207382585-How-to-update-the-theme-" target="_blank"><?php esc_html_e('Read More', 'mr_tailor'); ?> →</a></p>
	    </div>
    <?php
	endif;
}
add_action( 'admin_notices', 'remove_getbowtied_tools' );

/**
 * On theme activation redirect to splash page
 */
global $pagenow;

if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

	wp_redirect(admin_url("themes.php?page=gbt-setup")); // Your admin page URL

}

require_once( get_template_directory() . '/inc/custom-styles/custom-styles.php'); // Load Custom Styles
require_once( get_template_directory() . '/inc/custom-styles/gutenberg-styles.php'); // Load Custom Gutenberg Styles
require_once( get_template_directory() . '/inc/templates/post-meta.php'); // Load Post meta template
require_once( get_template_directory() . '/inc/templates/template-tags.php'); // Load Template Tags

//Include Metaboxes
require_once( get_template_directory() . '/inc/metaboxes/page.php');


/******************************************************************************/
/*************************** Visual Composer **********************************/
/******************************************************************************/

if (class_exists('WPBakeryVisualComposerAbstract')) {

	add_action( 'init', 'visual_composer_stuff' );
	function visual_composer_stuff() {

		//enable vc on post types
		if(function_exists('vc_set_default_editor_post_types')) vc_set_default_editor_post_types( array('post','page','product') );

		// Remove vc_teaser
		if (is_admin()) :
			function remove_vc_teaser() {
				remove_meta_box('vc_teaser', '' , 'side');
			}
			add_action( 'admin_head', 'remove_vc_teaser' );
		endif;

	}

}

add_action( 'vc_before_init', 'mrtailor_vcSetAsTheme' );
function mrtailor_vcSetAsTheme() {
	vc_manager()->disableUpdater(true);
	vc_set_as_theme();
}


/******************************************************************************/
/*********************** mr_tailor setup **************************************/
/******************************************************************************/


if ( ! function_exists( 'mr_tailor_setup' ) ) :
function mr_tailor_setup() {

	/** Theme support **/
	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce');
	function custom_header_custom_bg() {
		add_theme_support( 'custom-header' );
		add_theme_support( 'custom-background' );
	}

	/** Gutenberg **/
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );

	add_editor_style( get_template_directory_uri() . '/css/admin/editor-styles.css' );

	/** WooCommerce **/
	add_theme_support( 'woocommerce', array(

	    // Product grid theme settings
	    'product_grid'        => array(
	        'default_rows'    => get_option('woocommerce_catalog_rows', 5),
	        'min_rows'        => 2,
	        'max_rows'        => '',

	        'default_columns' => get_option('woocommerce_catalog_columns', 5),
	        'min_columns'     => 2,
	        'max_columns'     => 6,
	    ),
	) );

	/** Add Image Sizes **/
	$shop_catalog_image_size = get_option( 'shop_catalog_image_size' );
	$shop_single_image_size = get_option( 'shop_single_image_size' );
    add_image_size('product_small_thumbnail', (int)$shop_catalog_image_size['width']/3, (int)$shop_catalog_image_size['height']/3, isset($shop_catalog_image_size['crop']) ? true : false); // made from shop_catalog_image_size
	add_image_size('shop_single_small_thumbnail', (int)$shop_single_image_size['width']/3, (int)$shop_single_image_size['height']/3, isset($shop_catalog_image_size['crop']) ? true : false); // made from shop_single_image_size

	/** Register menus **/
	register_nav_menus( array(
		'top-bar-navigation' => esc_html__( 'Top Bar Navigation', 'mr_tailor' ),
		'main-navigation' => esc_html__( 'Main Navigation', 'mr_tailor' ),
	) );

	/** Theme textdomain **/
	load_theme_textdomain( 'mr_tailor', get_template_directory() . '/languages' );

}
endif; // mr_tailor_setup
add_action( 'after_setup_theme', 'mr_tailor_setup' );




/******************************************************************************/
/*********************** Enable excerpts **************************************/
/******************************************************************************/

add_action('init', 'mr_tailor_post_type_support');
function mr_tailor_post_type_support() {
	add_post_type_support( 'page', 'excerpt' );
}


/******************************************************************************/
/**************************** Enqueue styles **********************************/
/******************************************************************************/

// frontend
function mr_tailor_styles() {

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	global $woocommerce;

	wp_enqueue_style('mr_tailor-styles', get_template_directory_uri() . '/css/styles.css', array(), '1.0', 'all' );
	wp_enqueue_style('mr_tailor_swiper_style', get_template_directory_uri() . '/inc/vendor/swiper/css/swiper'.$suffix.'.css', array(), '1.0', 'all' );
	wp_enqueue_style('mr_tailor-fresco', get_template_directory_uri() . '/css/fresco/fresco.css', array(), '1.3.0', 'all' );
	wp_enqueue_style('mr_tailor-default-style', get_stylesheet_uri());

	if( is_cart()) {
		if(empty(WC()->cart->get_cart())) {
			$style = 'h1.entry-title{ display: none; }';
			wp_add_inline_style('mr_tailor-default-style', $style);
		}
	}
}
add_action( 'wp_enqueue_scripts', 'mr_tailor_styles', 99 );


// admin area
function mr_tailor_admin_styles() {
    if ( is_admin() ) {

		wp_enqueue_style("mr_tailor_admin_styles", get_template_directory_uri() . "/css/admin/wp-admin-custom.css", false, "1.0", "all");

		if (class_exists('WPBakeryVisualComposerAbstract')) {
			wp_enqueue_style('mr_tailor_visual_composer', get_template_directory_uri() .'/css/admin/visual-composer.css', false, "1.0", 'all');
		}
    }
}
add_action( 'admin_enqueue_scripts', 'mr_tailor_admin_styles' );





/******************************************************************************/
/*************************** Enqueue scripts **********************************/
/******************************************************************************/

// frontend
function mr_tailor_scripts() {

	/** In Header **/
	wp_enqueue_script('mr_tailor-modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', '', '2.6.3', FALSE);


	if ( GBT_MT_Opt::getOption( 'main_font_source' ) == "2" ) {
		if ( GBT_MT_Opt::getOption( 'main_font_typekit_kit_id' ) != "" ) {
			wp_enqueue_script('mr_tailor-main_font_typekit', '//use.typekit.net/'.GBT_MT_Opt::getOption( 'main_font_typekit_kit_id' ).'.js', array(), NULL, FALSE );
		}
	}

	if ( GBT_MT_Opt::getOption( 'secondary_font_source' ) == "2" ) {
		if ( GBT_MT_Opt::getOption( 'secondary_font_typekit_kit_id' ) != "" ) {
			wp_enqueue_script('mr_tailor-secondary_font_typekit', '//use.typekit.net/'.GBT_MT_Opt::getOption( 'secondary_font_typekit_kit_id' ).'.js', array(), NULL, FALSE );
		}
	}


	if ( ( GBT_MT_Opt::getOption( 'main_font_source' ) == "2" ) && ( GBT_MT_Opt::getOption( 'secondary_font_source' ) == "2" ) ) {
		if ( ( GBT_MT_Opt::getOption( 'main_font_typekit_kit_id' ) != "" ) || ( GBT_MT_Opt::getOption( 'secondary_font_typekit_kit_id' ) != "" ) ) {
			if ( GBT_MT_Opt::getOption( 'main_font_typekit_kit_id' ) == GBT_MT_Opt::getOption( 'secondary_font_typekit_kit_id' ) ) {
				wp_dequeue_script('mr_tailor-secondary_font_typekit');
			}
		}
	}

	/** In Footer **/

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_script('mr_tailor-foundation', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '5.2.0', TRUE);
	wp_enqueue_script('mr_tailor-foundation-interchange', get_template_directory_uri() . '/js/foundation.interchange.js', array('jquery'), '5.2.0', TRUE);
	wp_enqueue_script('mr_tailor-isotope', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), 'v2.0.0', TRUE);
	wp_enqueue_script('mr_tailor-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.js', array('jquery'), 'v3.1.4', TRUE);
	wp_enqueue_script('mr_tailor-touchswipe', get_template_directory_uri() . '/js/jquery.touchSwipe.min.js', array('jquery'), '1.6.5', TRUE);
	wp_enqueue_script('mr_tailor-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), '1.0.3', TRUE);
	wp_enqueue_script('mr_tailor_swiper_script', get_template_directory_uri() . '/inc/vendor/swiper/js/swiper'.$suffix.'.js', array('jquery'), '3.3.1', TRUE);
	wp_enqueue_script('mr_tailor-owl', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.3.1', TRUE);
	wp_enqueue_script('mr_tailor-fresco', get_template_directory_uri() . '/js/fresco.js', array('jquery'), '1.3.0', TRUE);
	wp_enqueue_script('mr_tailor-nanoscroller', get_template_directory_uri() . '/js/jquery.nanoscroller.min.js', array('jquery'), '0.7.6', TRUE);
	wp_enqueue_script('mr_tailor-select2', get_template_directory_uri() . '/js/select2.min.js', array('jquery'), '3.5.1', TRUE);
	wp_enqueue_script('mr_tailor-scroll_to', get_template_directory_uri() . '/js/jquery.scroll_to.js', array('jquery'), '1.4.5', TRUE);
	wp_enqueue_script('mr_tailor-stellar', get_template_directory_uri() . '/js/jquery.stellar.min.js', array('jquery'), '0.6.2', TRUE);
	wp_enqueue_script('mr_tailor-snapscroll', get_template_directory_uri() . '/js/jquery.snapscroll.min.js', array('jquery'), '1.6.1', TRUE);
	wp_enqueue_script('mr_tailor-easyzoom', get_template_directory_uri() . '/js/easyzoom.js', array('jquery'), '1.0', TRUE);
	wp_enqueue_script('mr_tailor-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0', TRUE);
	wp_enqueue_script('mr_tailor-product-gallery', get_template_directory_uri() . '/js/wc-product-gallery.js', array('jquery'), '1.0', TRUE);
	wp_enqueue_script('mr_tailor-counters', get_template_directory_uri() . '/js/wc-counters.js', array('mr_tailor-scripts'), '1.0', TRUE);

	$mrtailor_scripts_vars_array = array(
		'stickyHeader'		=> ( GBT_MT_Opt::getOption( 'sticky_header' ) ) ? 1 : 0,
		'gallery_lightbox'	=> ( GBT_MT_Opt::getOption( 'product_gallery_lightbox' ) ) ? 1 : 0,
		'catalogMode' 		=> GBT_MT_Opt::getOption( 'catalog_mode' ),
		'relatedProducts'   => GBT_MT_Opt::getOption( 'related_products_per_view' )
	);

	wp_localize_script( 'mr_tailor-scripts', 'mrtailor_scripts_vars_array', $mrtailor_scripts_vars_array );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( ( GBT_MT_Opt::getOption( 'main_font_source' ) == "2" ) || ( GBT_MT_Opt::getOption( 'secondary_font_source' ) == "2" ) ) {
		if( ( GBT_MT_Opt::getOption( 'main_font_typekit_kit_id' ) != "" ) || ( GBT_MT_Opt::getOption( 'secondary_font_typekit_kit_id' ) != "" ) ) {
			$typekit = 'try{Typekit.load();}catch(e){}';
			wp_add_inline_script('mr_tailor-scripts', $typekit);
		}
	}

}
add_action( 'wp_enqueue_scripts', 'mr_tailor_scripts', 99 );



// admin area
function mr_tailor_admin_scripts() {
    if ( is_admin() ) {
        global $post_type;

        wp_enqueue_script(
        	"mr_tailor_admin_notice",
        	get_template_directory_uri() . "/js/wp-admin-notice.js",
        	array('jquery'),
        	false,
        	"1.0"
        );
    }
}
add_action( 'admin_enqueue_scripts', 'mr_tailor_admin_scripts' );


/*********************************************************************************************/
/******************************** Fix empty title on homepage  *******************************/
/*********************************************************************************************/

add_filter( 'wp_title', 'mr_tailor_wp_title', 10, 2 );
function mr_tailor_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'mr_tailor' ), max( $paged, $page ) );
	}

	return $title;
}



/******************************************************************************/
/******************** Revolution Slider set as Theme **************************/
/******************************************************************************/

if(function_exists( 'set_revslider_as_theme' )){
	add_action( 'init', 'mr_tailor_set_revslider_as_theme' );
	function mr_tailor_set_revslider_as_theme() {
		set_revslider_as_theme();
	}
}





/******************************************************************************/
/****** Register widgetized area and update sidebar with default widgets ******/
/******************************************************************************/

function mr_tailor_widgets_init() {

	$sidebars_widgets = wp_get_sidebars_widgets();
	$footer_area_widgets_counter = "0";
	if (isset($sidebars_widgets['footer-widget-area'])) $footer_area_widgets_counter  = count($sidebars_widgets['footer-widget-area']);

	switch ($footer_area_widgets_counter) {
		case 0:
			$footer_area_widgets_columns ='large-12';
			break;
		case 1:
			$footer_area_widgets_columns ='large-12 medium-12 small-12';
			break;
		case 2:
			$footer_area_widgets_columns ='large-6 medium-6 small-12';
			break;
		case 3:
			$footer_area_widgets_columns ='large-4 medium-6 small-12';
			break;
		case 4:
			$footer_area_widgets_columns ='large-3 medium-6 small-12';
			break;
		case 5:
			$footer_area_widgets_columns ='footer-5-columns large-2 medium-6 small-12';
			break;
		case 6:
			$footer_area_widgets_columns ='large-2 medium-6 small-12';
			break;
		default:
			$footer_area_widgets_columns ='large-2 medium-6 small-12';
	}

	//default sidebar
	register_sidebar(array(
		'name'          => esc_html__( 'Sidebar', 'mr_tailor' ),
		'id'            => 'default-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	//footer widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'mr_tailor' ),
		'id'            => 'footer-widget-area',
		'before_widget' => '<div class="' . $footer_area_widgets_columns . ' columns"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//catalog widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Shop Sidebar', 'mr_tailor' ),
		'id'            => 'catalog-widget-area',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'mr_tailor_widgets_init' );


/*********************************************************************************************/
/************************** WooCommerce Custom Out of Stock **********************************/
/*********************************************************************************************/
add_action( 'init', 'out_of_stock_stuff' );
function out_of_stock_stuff() {

	if ( GBT_MT_Opt::getOption( 'out_of_stock_text' ) != '' ) {
		add_filter( 'woocommerce_get_availability', 'custom_get_availability', 1, 2);
		function custom_get_availability( $availability, $_product ) {
			if ( !$_product->is_in_stock() ) {
				$availability['availability'] = esc_html(GBT_MT_Opt::getOption( 'out_of_stock_text' ), 'mr_tailor');
			}
			return $availability;
		}
	}

}

/*********************************************************************************************/
/****************************** WooCommerce Custom Sale **************************************/
/*********************************************************************************************/


add_filter('woocommerce_sale_flash', 'woocommerce_custom_sale_tag_sale_flash', 10, 3);
function woocommerce_custom_sale_tag_sale_flash($original, $post, $product) {

	if ( GBT_MT_Opt::getOption( 'sale_text' ) != '' ):
		echo '<span class="onsale">'. esc_html(GBT_MT_Opt::getOption( 'sale_text' ), 'mr_tailor') .'</span>';
	else:
		echo '';
	endif;
}


/******************************************************************************/
/****** Add Fresco to Galleries ***********************************************/
/******************************************************************************/

add_filter( 'wp_get_attachment_link', 'sant_prettyadd', 10, 6);
function sant_prettyadd ($content, $id, $size, $permalink, $icon, $text) {
    if ($permalink) {
    	return $content;
    }
    $content = preg_replace("/<a/","<span class=\"fresco\" data-fresco-group=\"\"", $content, 1);
    return $content;
}


//================================================================================
// Udpate cart counter
//================================================================================

add_filter('woocommerce_add_to_cart_fragments', 'mrtailor_shopping_bag_items_number');
function mrtailor_shopping_bag_items_number( $fragments )
{
	global $woocommerce;
	ob_start(); ?>

    <span class="shopping_bag_items_number"><?php echo esc_html(WC()->cart->get_cart_contents_count()); ?></span>
	<?php
	$fragments['.shopping_bag_items_number'] = ob_get_clean();
	return $fragments;
}


/******************************************************************************/
/* WooCommerce Number of Related Products *************************************/
/******************************************************************************/
function woocommerce_output_related_products() {
	$atts = array(
		'posts_per_page' => '12',
		'orderby'        => 'rand'
	);
	woocommerce_related_products($atts);
}



/******************************************************************************/
/* WooCommerce Add data-src & lazyOwl to Thumbnails ***************************/
/******************************************************************************/
function woocommerce_get_product_thumbnail( $size = 'product_small_thumbnail', $placeholder_width = 0, $placeholder_height = 0  ) {
	global $post;

	if ( has_post_thumbnail() ) {
		$image_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'shop_catalog' );
		return get_the_post_thumbnail( $post->ID, $size, array('data-src' => $image_src[0], 'class' => 'lazyOwl') );
	} elseif ( wc_placeholder_img_src() ) {
		return wc_placeholder_img( $size );
	}
}

function woocommerce_subcategory_thumbnail( $category ) {
	$small_thumbnail_size  	= apply_filters( 'single_product_small_thumbnail_size', 'product_small_thumbnail' );
	$thumbnail_size  		= apply_filters( 'single_product_small_thumbnail_size', 'shop_catalog' );
	$dimensions    			= wc_get_image_size( $small_thumbnail_size );
	$thumbnail_id  			= get_term_meta( $category->term_id, 'thumbnail_id', true  );

	if ( $thumbnail_id ) {
		$image_small = wp_get_attachment_image_src( $thumbnail_id, $small_thumbnail_size  );
		$image_small = $image_small[0];
		$image = wp_get_attachment_image_src( $thumbnail_id, $thumbnail_size  );
		$image = $image[0];
	} else {
		$image = $image_small = wc_placeholder_img_src();

	}

	if ( $image_small )
		echo '<img data-src="' . esc_url( $image ) . '" class="lazyOwl" src="' . esc_url( $image_small ) . '" alt="' . esc_attr( $category->name ) . '" width="' . esc_attr( $dimensions['width'] ) . '" height="' . esc_url( $dimensions['height'] ) . '" />';
}





/******************************************************************************/
/* WooCommerce Wrap Oembed Stuff **********************************************/
/******************************************************************************/
add_filter('embed_oembed_html', 'mr_tailor_embed_oembed_html', 99, 4);
function mr_tailor_embed_oembed_html($html, $url, $attr, $post_id) {
	return '<div class="video-container">' . $html . '</div>';
}

add_filter( 'woocommerce_widget_cart_is_hidden', 'always_show_cart_widget', 40, 0 );
function always_show_cart_widget() {
    return false;
}

/******************************************************************************/
/****** Set woocommerce images sizes ******************************************/
/******************************************************************************/

if ( ! function_exists('mr_tailor_woocommerce_image_dimensions') ) :
	function mr_tailor_woocommerce_image_dimensions() {
		global $pagenow;

		if ( ! isset( $_GET['activated'] ) || $pagenow != 'themes.php' ) {
			return;
		}

	  	$catalog = array(
			'width' 	=> '350',	// px
			'height'	=> '435',	// px
			'crop'		=> 1 		// true
		);

		$single = array(
			'width' 	=> '570',	// px
			'height'	=> '708',	// px
			'crop'		=> 1 		// true
		);

		$thumbnail = array(
			'width' 	=> '70',	// px
			'height'	=> '87',	// px
			'crop'		=> 0 		// false
		);

		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
		update_option( 'shop_single_image_size', $single ); 		// Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
	}
	add_action( 'after_switch_theme', 'mr_tailor_woocommerce_image_dimensions', 1 );
endif;


/********************************************************************************/
if ( ! isset( $content_width ) ) $content_width = 640; /* pixels */


/******************************************************************************/
/****** Track recent products *************************************************/
/******************************************************************************/
function custom_track_product_view() {
    if ( ! is_singular( 'product' ) ) {
        return;
    }

    global $post;

    if ( empty( $_COOKIE['woocommerce_recently_viewed'] ) )
        $viewed_products = array();
    else
        $viewed_products = (array) explode( '|', $_COOKIE['woocommerce_recently_viewed'] );

    if ( ! in_array( $post->ID, $viewed_products ) ) {
        $viewed_products[] = $post->ID;
    }

    if ( sizeof( $viewed_products ) > 4 ) {
        array_shift( $viewed_products );
    }

    // Store for session only
    wc_setcookie( 'woocommerce_recently_viewed', implode( '|', $viewed_products ) );
}

add_action( 'template_redirect', 'custom_track_product_view', 20 );

/******************************************************************************/
/****** Limit number of cross-sells *******************************************/
/******************************************************************************/
add_filter('woocommerce_cross_sells_total', 'cartCrossSellTotal');
function cartCrossSellTotal($total) {
	$total = '2';
	return $total;
}

//==============================================================================
//	Custom WooCommerce upsells
//==============================================================================
if ( ! function_exists( 'getbowtied_output_upsells' ) ) {
	function getbowtied_output_upsells() {
		echo '<div class="row">';
			echo '<div class="large-12 large-centered columns">';
			woocommerce_upsell_display( 12,4 ); // Display 3 products in rows of 3
	    	echo '</div>';
	    echo '</div>';
	}
}

//==============================================================================
//	Custom WooCommerce related products
//==============================================================================
if ( ! function_exists( 'getbowtied_output_related' ) ) {
	function getbowtied_output_related() {

		echo '<div class="row">';
			echo '<div class="large-12 large-centered columns">';
		    $atts = array(
		    	'posts_per_page' => '12',
				'columns'		 => GBT_MT_Opt::getOption( 'related_products_per_view' ),
				'orderby'        => 'rand',
				'order' 		 => 'asc'
			);
			woocommerce_related_products($atts); // Display 3 products in rows of 3
	    	echo '</div>';
	    echo '</div>';
	}
}


/**
 * Breaks the product name into title & separate variations
 *
 * @param  [string] $product_name
 *
 * @return [string] Html of product name
 */
if ( ! function_exists( 'getbowtied_modify_cart_title' ) ) {
	function getbowtied_modify_cart_title( $product_name ) {

		$product_info = explode('&ndash;', $product_name);

		if ( sizeOf( $product_info ) == 1 ){

			return $product_name;

		} else {

			$product_variations = array_pop($product_info);

			$product_info = array(implode('&ndash;', $product_info), $product_variations);

			$output = $product_info[0]; //product name

		    $output .= "</a><div class='product-variations'>";

			$product_variations = explode(',', $product_variations);

			foreach( $product_variations as $variation ) {

				$variation = explode(': ', $variation);

				if( sizeOf( $variation ) > 1 ) {

					$output .= "<span class='product-variation'><b>" . $variation[0] . ":</b> " . strtoupper( $variation[1] ) . "</span>";

				} else {

					return $product_name;
				}
			}

			$output .= "</div>";

			return $output;
		}
	}
}

add_filter( 'woocommerce_cart_item_name', 'getbowtied_modify_cart_title' );

if (!function_exists('getbowtied_migrate_tools')) {
add_action('admin_init', 'getbowtied_migrate_tools');
function getbowtied_migrate_tools() {
	if (isset($_GET['getbowtied_migrate_tools'])) {
		if (class_exists('GetBowtied_Tools')) {
			deactivate_plugins( 'getbowtied-tools/getbowtied-tools.php' );

			if (!class_exists('Envato_Market') || !class_exists('OCDI_Plugin') || !class_exists('WooCommerce') || !defined('WPB_VC_VERSION')) {
				wp_redirect(admin_url('themes.php?page=tgmpa-install-plugins'));
			} else {
				wp_redirect(admin_url('admin.php?page=envato-market'));
			}
		}
	}
}
}

/**
 * HookMeUp admin notification
 */
add_action( 'admin_notices', 'mt_hookmeup_notification' );
if( !function_exists('mt_hookmeup_notification') ) {
	function mt_hookmeup_notification() {

		if ( !get_option('dismissed-hookmeup-notice', FALSE ) && !class_exists('HookMeUp') ) : ?>
			<div class="notice-warning settings-error notice is-dismissible hookmeup_notice">
				<p>
					<strong>
						<span>This theme recommends the following plugin: <em><a href="https://wordpress.org/plugins/hookmeup/" target="_blank">HookMeUp – Additional Content for WooCommerce</a></em>.</span>
					</strong>
				</p>
			</div>
		<?php endif;
	}
}

if ( ! function_exists( 'gbt_dismiss_dashboard_notice' ) ) {
	function gbt_dismiss_dashboard_notice() {
		if( $_POST['notice'] == 'hookmeup' ) {
			update_option('dismissed-hookmeup-notice', TRUE );
		}

		if( $_POST['notice'] == 'extender' ) {
			update_option('dismissed-extender-notice', TRUE );
		}

		if( $_POST['notice'] == 'portfolio' ) {
			update_option('dismissed-portfolio-notice', TRUE );
		}
	}
	add_action( 'wp_ajax_gbt_dismiss_dashboard_notice', 'gbt_dismiss_dashboard_notice' );
}

// Load font variants
add_filter( 'kirki_enqueue_google_fonts', function( $fonts ) {
		if(empty($fonts)) return $fonts;
   		$fonts[ GBT_MT_Opt::getOption( 'main_font' )['font-family'] ][] = 'regular';
   		$fonts[ GBT_MT_Opt::getOption( 'main_font' )['font-family'] ][] = '700';
	 	$fonts[ GBT_MT_Opt::getOption( 'secondary_font' )['font-family'] ][] = 'regular';
   		$fonts[ GBT_MT_Opt::getOption( 'secondary_font' )['font-family'] ][] = '700';

	return $fonts;
}, 100 );

/**
 * WooCommerce Cart is empty remove notice class
 */
remove_action('woocommerce_cart_is_empty', 'wc_empty_cart_message', 10);
add_action('woocommerce_cart_is_empty', 'mrtailor_empty_cart_message', 10);
 function mrtailor_empty_cart_message() {
	echo '<p class="cart-empty">' . wp_kses_post( apply_filters( 'wc_empty_cart_message', __( 'Your cart is currently empty.', 'woocommerce' ) ) ) . '</p>';
}
