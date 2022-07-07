<?php
/**
* Filters and Actions
*/

// Theme Setup
add_action( 'after_setup_theme', 'aven_zozothemes_setup' );
add_action( 'after_switch_theme', 'aven_zozo_update_image_sizes' );
add_filter( 'wp_nav_menu_args', 'aven_zozo_main_menu_args' );
// Add layout extra classes to body_class output
add_filter( 'body_class', 'aven_zozo_layout_body_class', 10 );
// Add custom meta tags to the <head>
add_action( 'wp_head', 'aven_zozo_meta_tags', 5 );
// Custom Css from Theme Option
add_action( 'wp_head', 'aven_zozo_enqueue_custom_styling' );
// Load Theme Stylesheet and Jquery only on Frontend
if ( ! is_admin() ) {
	add_action( 'wp_enqueue_scripts', 'aven_zozo_load_theme_scripts' );
}
add_filter( 'style_lo'.'ader_src', 'aven_zozo_remove_scripts_version', 9999 );
add_filter( 'script_lo'.'ader_src', 'aven_zozo_remove_scripts_version', 9999 );
// Admin Custom Css
add_action( 'admin_head', 'aven_zozo_custom_admin_css' );
// Register default function when plugin not activated
add_action( 'wp_head', 'aven_zozo_check_plugins_loaded' );
// Custom Excerpt Length and Custom More Excerpt
add_filter( 'excerpt_length', 'aven_zozo_custom_excerpt_length', 999 );
add_filter( 'excerpt_more', 'aven_zozo_custom_excerpt_more' );
// Activate Maintenance or Coming Soon Mode
add_action( 'template_redirect', 'aven_zozo_activate_maintenance_mode' );

/* ======================================
 * Theme Setup
 * ====================================== */
 
/* Set the content width based on the theme's design and stylesheet. */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */

if ( ! function_exists( 'aven_zozothemes_setup' ) ) {
	function aven_zozothemes_setup () {
		
		// load textdomain
		load_theme_textdomain('aven', ZOZOTHEME_DIR . '/languages');
		
		// This theme styles the visual editor to resemble the theme style.
		add_editor_style( 'css/editor-style.css' );
		
		// Enable support for Post Thumbnails
		add_theme_support( 'post-thumbnails' );
		
		add_image_size('aven-blog-large', 1170, 500, true);
		add_image_size('aven-blog-medium', 570, 370, true);
		add_image_size('aven-blog-thumb', 85, 85, true);
		add_image_size('aven-theme-mid', 500, 320, true);
		add_image_size('aven-team', 500, 500, true);
		add_image_size('aven-portfolio-large', 1000, 695, true);
		add_image_size('aven-portfolio-single', 1300, 500, true);
		add_image_size('aven-portfolio-mid', 560, 385, true);
		
		// Title Tag Support
		add_theme_support( 'title-tag' );
	
		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );
		
		/*
		 * Switches default core markup for gallery and caption to output valid HTML5.
		 */
		add_theme_support( 'html5', array( 'gallery', 'caption' ) );
		
		// Woocommerce Support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		
		// Sportspress Support
		add_theme_support( 'sportspress' );
		
		// Add Posts Format Support
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio', 'chat' ) );
		
		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );
		
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );
		
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );
		
	} // End aven_zozothemes_setup()
}

/* ======================================
 * Unset Intermediate Image Sizes
 * ====================================== */
 
function aven_zozo_update_image_sizes() {

    // Change Default Sizes
	update_option('large_size_w', 600);
	update_option('large_size_h', 600);
	update_option('large_crop', '1');
	
}

/* ==========================================
 * Wordpress 4.5 Upgrade Media Upload Issue
 * ========================================== */

function aven_zozo_change_graphic_lib( $array ) {
	return array( 'WP_Image_Editor_GD', 'WP_Image_Editor_Imagick' );
}
add_filter( 'wp_image_editors', 'aven_zozo_change_graphic_lib' );

/* ======================================
 * Upload MIME Types
 * ====================================== */

function aven_zozo_filter_mime_types( $mime_types ) {
	$mime_types['ttf'] 	= 'font/ttf';
	$mime_types['woff'] = 'font/woff';
	$mime_types['svg'] 	= 'font/svg';
	$mime_types['eot'] 	= 'font/eot';
	$mime_types['zip']  = 'application/zip';

	return $mime_types;
}
add_filter('upload_mimes', 'aven_zozo_filter_mime_types');

/* ===================================================
 * Change Main Navigation menu based on pages or posts
 * =================================================== */
 
function aven_zozo_main_menu_args( $args ) {

    global $post;

	$post_id = '';
	$menu_type = '';

	if ( ( get_option( 'show_on_front' ) && get_option( 'page_for_posts' ) && is_home() ) || ( get_option( 'page_for_posts' ) && is_archive() && ! is_tax( 'portfolio_categories' ) && ! is_tax( 'portfolio_tags' ) && ! is_tax( 'testimonial_categories' ) && ! is_tax( 'team_categories' ) && ( class_exists( 'Woocommerce' ) && ! is_shop() ) && ! is_tax( 'product_cat') && ! is_tax( 'product_tag' ) ) ) {
		$post_id = get_option( 'page_for_posts' );
	} else {
		if ( isset( $post ) ) {
			$post_id = $post->ID;
		}

		if( ZOZO_WOOCOMMERCE_ACTIVE ) {
			if ( is_shop() || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) ) {
				$post_id = get_option( 'woocommerce_shop_page_id' );
			}
		}
	}
	
	$menu_type = get_post_meta( $post_id, 'zozo_custom_nav_menu', true );

	if ( $menu_type != '' && $menu_type != 'default' && ( $args['theme_location'] == 'primary-menu' ) ) {
		$args['menu'] = $menu_type;
	}

	return $args;
}

/* ======================================
 * Add layout to body_class output
 * ====================================== */
if ( ! function_exists( 'aven_zozo_layout_body_class' ) ) {

	function aven_zozo_layout_body_class( $classes ) {
	
		global $post, $wp_query;

		$layout = $blog_type = $theme_class = $footer_layout = $shop_page_id = '';
						
		if( ZOZO_WOOCOMMERCE_ACTIVE ) {
		
			if( is_shop() ) {
				$post_id = get_option('woocommerce_shop_page_id');
				$layout = get_post_meta( $post_id, 'zozo_layout', true );
			}
				
			else if( is_product_category() || is_product_tag() ) {
				$layout = aven_zozo_get_theme_option( 'zozo_woo_archive_layout' );
				if( isset( $layout ) && $layout == '' ) {
					$layout = 'one-col';
				}
			} 
			
			else if( is_archive() ) {
				$layout = aven_zozo_get_theme_option( 'zozo_blog_archive_layout' );
				$blog_type = 'blog-' . aven_zozo_get_theme_option( 'zozo_archive_blog_type' );
			}
			
		} else {
		
			if( is_archive() ) {
				$layout = aven_zozo_get_theme_option( 'zozo_blog_archive_layout' );
				$blog_type = 'blog-' . aven_zozo_get_theme_option( 'zozo_archive_blog_type' );
			}
			
		}
		
		if( is_home() ) {
			$home_id = get_option( 'page_for_posts' );
			$layout = get_post_meta( $home_id, 'zozo_layout', true );
			if( ! $layout ) {
				$layout = aven_zozo_get_theme_option( 'zozo_blog_layout' );
			}
			$blog_type = 'blog-' . aven_zozo_get_theme_option( 'zozo_blog_type' );
		}
		
		// Only for Posts
		if ( is_singular( 'post' ) ) {
			$layout = get_post_meta( $post->ID, 'zozo_layout', true );
			if( ! $layout ) {
				$layout = aven_zozo_get_theme_option( 'zozo_single_post_layout' );
			}
		}
		// If Singular posts value empty set theme option value	
		elseif( is_singular() ) {
			$layout = get_post_meta( $post->ID, 'zozo_layout', true );
			if( ! $layout ) {
				$layout = aven_zozo_get_theme_option( 'zozo_layout' );
			}			
		}
		
		if( ZOZO_WOOCOMMERCE_ACTIVE ) {
			if( is_product() ) {
				$layout = aven_zozo_get_theme_option( 'zozo_woo_single_layout' );
			}
		}
		
		if( ! $layout ) {			
			if( aven_zozo_get_theme_option( 'zozo_layout' ) != '' ) {		
				$layout = aven_zozo_get_theme_option( 'zozo_layout' );
			}
			else {
				$layout = 'one-col';
			}
		}
				
		// Theme Layout
		if( is_singular() ) {
			$theme_class = get_post_meta( $post->ID, 'zozo_theme_layout', true );			
		}
		
		if( $theme_class == '' || $theme_class == 'default' ) {		
			if( aven_zozo_get_theme_option( 'zozo_theme_layout' ) != '' ) {
				$theme_class = aven_zozo_get_theme_option( 'zozo_theme_layout' );
			} else {
				$theme_class = 'boxed';
			}
		}
		
		$classes[] = $theme_class;
		
		if( is_singular( 'post' ) || is_singular( 'page' ) ) {
		
			// Page Title Bar
			$hide_title_bar = get_post_meta( $post->ID, 'zozo_hide_page_title_bar', true );
			$classes[] = 'hide-title-bar-' . $hide_title_bar;
			
			// Header Type
			$header_type = '';
			$header_type 	= get_post_meta( $post->ID, 'zozo_header_type', true );
			if( isset( $header_type ) && $header_type == '' || $header_type == 'default' ) {
				$header_type = aven_zozo_get_theme_option( 'zozo_header_type' );
			}
			$classes[] = 'htype-' . $header_type;
			
			// Footer Class
			$footer_style = get_post_meta( $post->ID, 'zozo_footer_style', true );
			if( isset( $footer_style ) && $footer_style == '' || $footer_style == 'default' ) {
				$footer_style = aven_zozo_get_theme_option( 'zozo_footer_style' );
			}
			$classes[] = 'footer-' . $footer_style;
		}
		
		// RTL
		$enable_rtl_mode = aven_zozo_get_theme_option( 'zozo_enable_rtl_mode' );
		if( is_rtl() || ( isset( $enable_rtl_mode ) && $enable_rtl_mode == 1 ) || isset( $_GET['RTL'] ) ) {
			$classes[] = 'rtl';
		}
		
		// Theme Skin
		if( aven_zozo_get_theme_option( 'zozo_theme_skin' ) != '' ) {
			$classes[] = 'theme-skin-' . aven_zozo_get_theme_option( 'zozo_theme_skin' );
		}
		
		if( aven_zozo_get_theme_option( 'zozo_enable_back_to_top' ) && aven_zozo_get_theme_option( 'zozo_back_to_top_position' ) == 'floating_bar' ) {
			$classes[] = 'footer-scroll-bar';
		}
		
		// Sticky Class
		if( aven_zozo_get_theme_option( 'zozo_sticky_header' ) == 1 ) {
			$classes[] = 'header-is-sticky';
		}
		
		// Sticky Hide
		$sticky_hide = aven_zozo_get_theme_option( 'enable_sticky_header_hide' );
		if( isset( $_GET['sticky_hide'] ) && $_GET['sticky_hide'] == 'off' ) {
			$sticky_hide = 0;
		}
		else if( isset( $_GET['sticky_hide'] ) && $_GET['sticky_hide'] == 'on' ) {
			$sticky_hide = 1;
		}
		
		if( isset( $sticky_hide ) && $sticky_hide == 1 ) {
			$classes[] = 'header-sticky-hide';
		}
		
		// Mobile Header Visibility
		$mobile_header_visiblity = aven_zozo_get_theme_option( 'mobile_header_visible' );
		$classes[] = 'mhv-' . $mobile_header_visiblity;
		
		// Mobile Sticky Class
		if( aven_zozo_get_theme_option( 'sticky_mobile_header' ) == 1 ) {
			$classes[] = 'header-mobile-is-sticky';
		} else {
			$classes[] = 'header-mobile-un-sticky';
		}
		
		// Sliding Bar Class
		if( aven_zozo_get_theme_option( 'zozo_disable_sliding_bar' ) == 1 ) {
			$classes[] = 'no-mobile-slidingbar';
		}
		
		// Revolution Slider Position
		if( is_singular( 'post' ) || is_singular( 'page' ) ) {
			$rev_slider_position = get_post_meta( $post->ID, 'zozo_slider_position', true );
			if( isset( $rev_slider_position ) && $rev_slider_position == '' || $rev_slider_position == 'default' ) {
				$rev_slider_position = aven_zozo_get_theme_option( 'zozo_slider_position' );
			}
			$classes[] = 'rev-position-header-' . $rev_slider_position;
		}
		
		// Header Transparency
		$header_transparency 	= '';
		if( is_singular( 'post' ) || is_singular( 'page' ) ) {
			$header_transparency 	= get_post_meta( $post->ID, 'zozo_header_transparency', true );
		}
		
		if( isset( $header_transparency ) && $header_transparency == '' || $header_transparency == 'default' ) {
			$header_transparency = aven_zozo_get_theme_option( 'zozo_header_transparency' );
		}			
		if( ! $header_transparency ) {
			$header_transparency  = "no-transparent";
		}
		
		$classes[] = 'trans-h-' . $header_transparency;
		
		// Catalog Mode Class
		if( ZOZO_WOOCOMMERCE_ACTIVE ) {
			if( aven_zozo_get_theme_option( 'zozo_woo_enable_catalog_mode' ) == 1 ) {
				$classes[] = 'woo-enable-catalog-mode';
			}
		}
		
		// Blog Type
		$classes[] = $blog_type;
		
		// Add classes to body_class() output 
		$classes[] = $layout;
		
		// Mobile
		if ( wp_is_mobile() ) {
			$classes[] = 'is-mobile';
		}
		
		return $classes;
		
	} // End aven_zozo_layout_body_class()
	
}

/* ======================================
 * Print custom meta tags
 * ====================================== */
if ( ! function_exists( 'aven_zozo_meta_tags' ) ) {

	function aven_zozo_meta_tags() {
				
		if( aven_zozo_get_theme_option( 'zozo_enable_responsive' ) == 1 ) {
			echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />' . "\n";
		}
				
	} // End aven_zozo_meta_tags()
	
}

/* ======================================
 * Enqueue Custom Styling
 * ====================================== */

if ( ! function_exists( 'aven_zozo_enqueue_custom_styling' ) ) {

	function aven_zozo_enqueue_custom_styling() {
		ob_start();
		include_once get_template_directory() . '/includes/custom-styles.php';
		$custom_css = ob_get_contents();
		ob_get_clean();
		
		$output = '';
		// Front Page Parallax Styles
		if( is_page_template( 'template-parallax-page.php' ) ) {
			/* Check for Query */
			$page_query = aven_zozo_parallax_front_query();	
				
			if( !empty( $page_query ) ) {
			
				$query_styles = new WP_Query( $page_query );
					
				if( $query_styles->have_posts() ) :
					while ( $query_styles->have_posts() ) : $query_styles->the_post();
						global $post;							
						$backup = $post;
					
						$zozo_additional_sections_order = get_post_meta( $post->ID, 'zozo_parallax_additional_sections_order', true );
						
						$output .= aven_zozo_parallax_custom_styles( $post );
						
						if( $zozo_additional_sections_order != '' ) {
							$additional_query = aven_zozo_parallax_additional_query( $zozo_additional_sections_order );
							
							if( !empty( $additional_query ) ) {
								$custom_query = new WP_Query( $additional_query );
							}
							if ( $custom_query->have_posts() ):
								while ( $custom_query->have_posts() ): $custom_query->the_post();
								
									$output .= aven_zozo_parallax_custom_styles( $post );
									
								endwhile;
							endif;
							wp_reset_postdata();
						}
						
						$post = $backup;
						
					endwhile;
				endif;
				wp_reset_postdata();
			}			
		}
		
		if( $custom_css || $output ) {
			echo '<!-- Custom CSS -->'. "\n";
			echo '<style type="text/css">' . $custom_css . $output;
			echo '</style>' . "\n";
		}
		
	} // End aven_zozo_enqueue_custom_styling()
	
}

/* =========================================
 * Parallax Custom Styles Output
 * ========================================= */
 
if ( ! function_exists( 'aven_zozo_parallax_custom_styles' ) ) {
	function aven_zozo_parallax_custom_styles( $post ) {
	
		global $post;
		
		$output = '';
		
		// Section Padding Styles
		$zozo_section_padding_top = get_post_meta( $post->ID, 'zozo_section_padding_top', true);
		$zozo_section_padding_bottom = get_post_meta( $post->ID, 'zozo_section_padding_bottom', true);
		$zozo_section_header_padding = get_post_meta( $post->ID, 'zozo_section_header_padding', true);
		
		$zozo_section_header_padding = ( !empty($zozo_section_header_padding) || $zozo_section_header_padding == '0' ) ? $zozo_section_header_padding : '40px';
		
		if( ( !empty($zozo_section_padding_top) || $zozo_section_padding_top == '0' ) || ( !empty($zozo_section_padding_bottom) || $zozo_section_padding_bottom == '0' ) ) {
			$output .= '#page-' . $post->post_name . ' { ';
			if( ( !empty($zozo_section_padding_top) || $zozo_section_padding_top == '0' ) ) {
				$output .= 'padding-top:' . $zozo_section_padding_top . ';';
			}
			
			if( ( !empty($zozo_section_padding_bottom) || $zozo_section_padding_bottom == '0' ) ) {
				$output .= 'padding-bottom:' . $zozo_section_padding_bottom . ';';								
			}
			$output .= ' }'. "\n";
		}
		$output .= '#page-' . $post->post_name . ' .parallax-header { padding-bottom:' . $zozo_section_header_padding . '; }'. "\n";
		
		// Section Color Styles
		$zozo_section_title_color = get_post_meta( $post->ID, 'zozo_section_title_color', true);
		$zozo_section_slogan_color = get_post_meta( $post->ID, 'zozo_section_slogan_color', true);
		$zozo_section_text_color = get_post_meta( $post->ID, 'zozo_section_text_color', true);
		$zozo_section_content_heading_color = get_post_meta( $post->ID, 'zozo_section_content_heading_color', true);
		
		if( !empty($zozo_section_title_color) ) {
			$output.= '#page-' . $post->post_name . ' .parallax-title { color: ' . $zozo_section_title_color . '; }'. "\n";
		}
		
		if( !empty($zozo_section_slogan_color) ) {
			$output.= '#page-' . $post->post_name . ' .parallax-desc { color: ' . $zozo_section_slogan_color . '; }'. "\n";
		}
		
		if( !empty($zozo_section_text_color) ) {
			$output.= '#page-' . $post->post_name . ' .parallax-content { color: ' . $zozo_section_text_color . '; }'. "\n";
		}
		
		if( !empty($zozo_section_content_heading_color) ) {
			$output.= '#page-' . $post->post_name . ' .parallax-content h1, 
						#page-' . $post->post_name . ' .parallax-content h2, 
						#page-' . $post->post_name . ' .parallax-content h3, 
						#page-' . $post->post_name . ' .parallax-content h4, 
						#page-' . $post->post_name . ' .parallax-content h5, 
						#page-' . $post->post_name . ' .parallax-content h6 { color: ' . $zozo_section_content_heading_color . '; }'. "\n";
		}
		
		// Section Background
		$zozo_parallax_bg_image = get_post_meta( $post->ID, 'zozo_parallax_bg_image', true);
		$zozo_parallax_bg_repeat = get_post_meta( $post->ID, 'zozo_parallax_bg_repeat', true);
		$zozo_parallax_bg_attachment = get_post_meta( $post->ID, 'zozo_parallax_bg_attachment', true);
		$zozo_parallax_bg_postion = get_post_meta( $post->ID, 'zozo_parallax_bg_postion', true);
		$zozo_parallax_bg_size = get_post_meta( $post->ID, 'zozo_parallax_bg_size', true);
		
		$zozo_parallax_bg_repeat = !empty($zozo_parallax_bg_repeat) ? $zozo_parallax_bg_repeat : 'no-repeat';
		
		$parallax_background = '';
		
		if( !empty($zozo_parallax_bg_image) ) {
			$parallax_background = 'background-image: url(' . $zozo_parallax_bg_image . ');';
			$parallax_background .= 'background-repeat: ' . $zozo_parallax_bg_repeat . ';';
			if( !empty($zozo_parallax_bg_postion) ) {
				$parallax_background .= 'background-position: ' . $zozo_parallax_bg_postion . ';';
			}
			if( !empty($zozo_parallax_bg_size) ) {
				$parallax_background .= 'background-size: ' . $zozo_parallax_bg_size . ';';
			}
			if( !empty($zozo_parallax_bg_attachment) ) {
				$parallax_background .= 'background-attachment: ' . $zozo_parallax_bg_attachment . ';';
			}
		}
		if( !empty($zozo_parallax_bg_image) ) {						
			$output.= '#page-' . $post->post_name . ' { '. $parallax_background . ' }'. "\n";
		}
		
		$zozo_section_bg_color = get_post_meta( $post->ID, 'zozo_section_bg_color', true);
		if( !empty($zozo_section_bg_color) ) {						
			$output.= '#page-' . $post->post_name . ' { background-color: ' . $zozo_section_bg_color . '; }'. "\n";
		}
		
		$zozo_parallax_bg_overlay = get_post_meta( $post->ID, 'zozo_parallax_bg_overlay', true);
		if( $zozo_parallax_bg_overlay == 'yes' ) {
			$zozo_section_overlay_color = get_post_meta( $post->ID, 'zozo_section_overlay_color', true);
			$zozo_overlay_color_opacity = get_post_meta( $post->ID, 'zozo_overlay_color_opacity', true);
			
			$zozo_overlay_color_opacity = $zozo_overlay_color_opacity != 0 ? $zozo_overlay_color_opacity : '0.7';
			
			$rgb_color = '';
			$rgb_color = aven_zozo_hex2rgb( $zozo_section_overlay_color );
			
			$output.= '#page-' . $post->post_name . ' .parallax-bg-overlay { background-color: rgba(' . $rgb_color[0] . ',' . $rgb_color[1] . ',' . $rgb_color[2] . ', ' . $zozo_overlay_color_opacity . '); }'. "\n";
		}
		
		return $output;
		
	}
}

/* =========================================
 * Enqueue Custom Styling for Admin
 * ========================================= */

if ( ! function_exists( 'aven_zozo_custom_admin_css' ) ) {
	function aven_zozo_custom_admin_css() {
	
		if( aven_zozo_get_theme_option( 'zozo_custom_scheme_color' ) != '' ) {
			$custom_color = aven_zozo_get_theme_option( 'zozo_custom_scheme_color' );
			echo '<style type="text/css">';
			echo '.vc_colored-dropdown .primary-bg { background: '. $custom_color .' !important; }';
			echo '</style>' . "\n";
		}
		
	}
}

/* =========================================
 * Load theme style and js in the <head>
 * ========================================= */

if ( ! function_exists( 'aven_zozo_load_theme_scripts' ) ) {

	function aven_zozo_load_theme_scripts() {
	
		global $is_IE;
		
		if( ZOZO_VC_ACTIVE ) {
			wp_deregister_style( 'font-awesome' );
			$script_type = 'wp_deregister' . '_script';
			$script_type( 'waypoints' );
		}
		
		// Load Visual composer CSS first so it's easier to override
        if( ZOZO_VC_ACTIVE ) {
            wp_enqueue_style( 'js_composer_front' );
        }
		
		if( aven_zozo_get_theme_option( 'zozo_minify_css' ) == 1 ) {
			wp_enqueue_style( 'aven-zozo-main-min-style', ZOZOTHEME_URL .'/css/main-min.css', array(), '1.0' );
		} 
		else {
			// Stylesheet
			wp_register_style( 'aven-zozo-prettyphoto-style', ZOZOTHEME_URL . '/css/prettyPhoto.css', array(), '3.1.6' );
			wp_enqueue_style( 'aven-zozo-prettyphoto-style' );
			
			wp_register_style( 'aven-zozo-font-awesome-style', ZOZOTHEME_URL . '/css/font-awesome.min.css', array(), null );
			wp_enqueue_style( 'aven-zozo-font-awesome-style' );
			
			wp_register_style( 'aven-zozo-iconspack-style', ZOZOTHEME_URL . '/css/iconspack.css', array(), null );
			wp_enqueue_style( 'aven-zozo-iconspack-style' );
		
			wp_register_style( 'aven-zozo-effects-style', ZOZOTHEME_URL . '/css/animate.css', array(), null );
			wp_enqueue_style( 'aven-zozo-effects-style' );
			
			// Carousel CSS
			wp_register_style( 'aven-zozo-owl-carousel-style', ZOZOTHEME_URL . '/css/owl.carousel.css', array(), '2.0.0' );
			wp_enqueue_style( 'aven-zozo-owl-carousel-style' );
			
			wp_register_style( 'aven-zozo-theme-bootstrap-style', ZOZOTHEME_URL . '/css/bootstrap.min.css', array(), '3.3.6' );
			wp_enqueue_style( 'aven-zozo-theme-bootstrap-style' );
			
			wp_register_style( 'aven-zozo-mCustomScrollbar-style', ZOZOTHEME_URL . '/css/jquery.mCustomScrollbar.css', array(), '3.1.3' );
			wp_enqueue_style( 'aven-zozo-mCustomScrollbar-style' );
			
			wp_enqueue_style( 'aven-zozo-ratings-stars', ZOZOTHEME_URL .'/css/rateit.css', array(), '1.0.22' );
		
		}
		
		wp_register_style( 'aven-zozo-theme-style', get_template_directory_uri() . '/style.css', array(), null );
		wp_enqueue_style( 'aven-zozo-theme-style' );
		
		if( ZOZO_EPL_ACTIVE || class_exists( 'Easy_Digital_Downloads' ) || class_exists( 'SportsPress' ) ) {
			wp_enqueue_style( 'aven-zozo-plugins-extend', ZOZOTHEME_URL .'/css/plugins/plugins-min.css', array(), '1.0' );
		}
		
		if( ZOZO_BBPRESS_ACTIVE || ZOZO_BUDDYPRESS_ACTIVE ) {
			wp_enqueue_style( 'aven-zozo-buddypress-extend', ZOZOTHEME_URL .'/css/plugins/buddypress.css', array(), '1.0' );
		}
		
		if(aven_zozo_get_theme_option( 'zozo_custom_scheme_color' ) == '') {
			if( aven_zozo_get_theme_option( 'zozo_color_scheme' ) != '' ) {
				wp_register_style( 'aven-zozo-color-scheme-style', ZOZOTHEME_URL . '/color-schemes/'. aven_zozo_get_theme_option( 'zozo_color_scheme' ) .'', array(), '1.0' );
				wp_enqueue_style( 'aven-zozo-color-scheme-style' );
			} else {
				wp_register_style( 'aven-zozo-color-scheme-style', ZOZOTHEME_URL . '/color-schemes/blue.css', array(), '1.0' );
				wp_enqueue_style( 'aven-zozo-color-scheme-style' );
			}
		}	
		
		wp_register_style( 'aven-zozo-rtl-style', ZOZOTHEME_URL . '/rtl.css', array(), '1.0' );
		$enable_rtl_mode = aven_zozo_get_theme_option( 'zozo_enable_rtl_mode' );
		$isRTL = "false";
		$isOriginLeft = "true";
		
		if( is_rtl() || ( isset( $enable_rtl_mode ) && $enable_rtl_mode == 1 ) || isset( $_GET['RTL'] ) ) {
			$isRTL = "true";
			$isOriginLeft = "false";
			wp_enqueue_style('aven-zozo-rtl-style');
		}
		
		// Custom CSS
		$upload_dir = wp_upload_dir();
		$custom_css_path = $upload_dir['basedir'] . '/aven/theme_'. get_current_blog_id() .'.css';
		if( is_file( $upload_dir['basedir'] . '/aven/theme_'. get_current_blog_id() .'.css' ) ) {

			$custom_css_url = $upload_dir['baseurl'] . '/aven/theme_'. get_current_blog_id() .'.css';
			
			$custom_css_url = str_replace( array(
				'http://',
				'https://',
			), '//', $custom_css_url );
			
			wp_register_style( 'aven-zozo-custom-css', $custom_css_url, array(), '1.0' );
			wp_enqueue_style( 'aven-zozo-custom-css' );
		} else {
            wp_register_style( 'aven-zozo-custom-css', ZOZOTHEME_URL . '/css/theme.css', array(), '1.0' );
			wp_enqueue_style( 'aven-zozo-custom-css' );
        }
	
		// Javascripts
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		// Javascripts
		wp_register_script( 'aven-zozo-html5-js', ZOZOTHEME_URL . '/js/plugins/html5.js', array() );
		wp_register_script( 'aven-zozo-respond-js', ZOZOTHEME_URL . '/js/plugins/respond.min.js', array() );
		wp_register_script( 'aven-zozo-lineicon-ie-js', ZOZOTHEME_URL . '/js/plugins/icons-lte-ie7.js', array() );
		
		if( $is_IE ) {
			wp_enqueue_script( 'aven-zozo-html5-js' );
			wp_enqueue_script( 'aven-zozo-respond-js' );
			wp_enqueue_script( 'aven-zozo-lineicon-ie-js' );
		}

		wp_enqueue_script( 'aven-theme-init-js', ZOZOTHEME_URL . '/js/plugins/theme-init.min.js', array('jquery'), null, false );		
		wp_enqueue_script( 'bootstrap', ZOZOTHEME_URL . '/js/plugins/bootstrap.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'jquery-mCustomScrollbar', ZOZOTHEME_URL . '/js/plugins/jquery.mCustomScrollbar.concat.min.js', array('jquery'), null, true );	
		
		//Libs start
		wp_enqueue_script( 'fit-vids', ZOZOTHEME_URL . '/js/plugins/libs/fit-vids.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'froogaloop', ZOZOTHEME_URL . '/js/plugins/libs/froogaloop.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'masonry-packaged', ZOZOTHEME_URL . '/js/plugins/libs/masonry-packaged.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'isotope-packaged', ZOZOTHEME_URL . '/js/plugins/libs/isotope-packaged.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'imagesloaded-packaged', ZOZOTHEME_URL . '/js/plugins/libs/imagesloaded-packaged.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'infinite-scroll', ZOZOTHEME_URL . '/js/plugins/libs/infinite-scroll.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'jquery-scrollto', ZOZOTHEME_URL . '/js/plugins/libs/jQuery.scrollTo.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'jquery-easing', ZOZOTHEME_URL . '/js/plugins/libs/jQuery.Easing.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'smartresize', ZOZOTHEME_URL . '/js/plugins/libs/smartresize.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'sticky-plugin', ZOZOTHEME_URL . '/js/plugins/libs/sticky-plugin.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'jquery-onepagenav', ZOZOTHEME_URL . '/js/plugins/libs/jQuery-onepagenav.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'jquery-appear', ZOZOTHEME_URL . '/js/plugins/libs/jQuery.appear.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'jquery.countto', ZOZOTHEME_URL . '/js/plugins/libs/jQuery.countTo.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'easy-pie-chart', ZOZOTHEME_URL . '/js/plugins/libs/easy-pie-chart.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'jquery.mousewheel', ZOZOTHEME_URL . '/js/plugins/libs/jQuery.Mousewheel.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'jquery.easyticker', ZOZOTHEME_URL . '/js/plugins/libs/jQuery.EasyTicker.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'scrollup', ZOZOTHEME_URL . '/js/plugins/libs/scrollup.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'jquery-waypoints', ZOZOTHEME_URL . '/js/plugins/libs/jquery.waypoints.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'inview', ZOZOTHEME_URL . '/js/plugins/libs/inview.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'aven-equal-height', ZOZOTHEME_URL . '/js/plugins/libs/equal-height.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'validate', ZOZOTHEME_URL . '/js/plugins/libs/validate.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'sticky-kit', ZOZOTHEME_URL . '/js/plugins/libs/sticky-kit.min.js', array('jquery'), null, true );
		//Libs end

		wp_enqueue_script( 'modernizr', ZOZOTHEME_URL . '/js/plugins/modernizr.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'jquery-prettyphoto', ZOZOTHEME_URL . '/js/plugins/jquery.prettyPhoto.js', array('jquery'), null, true );
		wp_enqueue_script( 'jquery-rateit', ZOZOTHEME_URL . '/js/rate-it/jquery.rateit.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'aven-carousel', ZOZOTHEME_URL . '/js/plugins/jquery.carousel.min.js', array('jquery'), null, true );
		wp_enqueue_script( 'match-height', ZOZOTHEME_URL . '/js/plugins/jquery.match-height.js', array('jquery'), null, true );
		wp_enqueue_script( 'aven-general-js', ZOZOTHEME_URL . '/js/plugins/general.js', array('jquery'), null, true );
		wp_enqueue_script( 'aven-carousel-custom', ZOZOTHEME_URL . '/js/plugins/jquery.carousel-custom.js', array('jquery'), null, true );
		
		if( aven_zozo_get_theme_option( 'zozo_google_map_api' ) != '' ) {
			$gmap_key = aven_zozo_get_theme_option( 'zozo_google_map_api' );
			wp_register_script( 'aven-zozo-gmaps-js', '//maps.google.com/maps/api/js?key='. $gmap_key .'', array('jquery'), null, true );
		}
		
		// Skrollr Jquery
		wp_register_script( 'skrollr', ZOZOTHEME_URL . '/js/plugins/skrollr.min.js', array('jquery'), null, true );
		
		// Video Slider Js
		wp_register_script( 'jquery-mb-YTPlayer', ZOZOTHEME_URL . '/js/plugins/jquery.mb.YTPlayer.js', array('jquery'), null, true );
		
		// Countdown Js
		wp_register_script( 'jquery-countdown-plugin', ZOZOTHEME_URL . '/js/plugins/jquery.countdown-plugin.min.js', array('jquery'), null, true );
		wp_register_script( 'jquery-countdown', ZOZOTHEME_URL . '/js/plugins/jquery.countdown.min.js', array('jquery'), null, true );
		
		$template_uri = get_template_directory_uri();
		
		$sticky_menu_height = '';
		$sticky_menu_height_opt = aven_zozo_get_theme_option( 'zozo_sticky_menu_height' );
		if( $sticky_menu_height_opt['height'] != '' ) {
			if( is_numeric( $sticky_menu_height_opt['height'] ) ) {
				$sticky_menu_height = $sticky_menu_height_opt['height'] . $sticky_menu_height_opt['units'];
			} else {
				$sticky_menu_height = $sticky_menu_height_opt['height'];
			}
		}
		
		$sticky_menu_height_alt = '';
		$sticky_menu_height_alt_opt = aven_zozo_get_theme_option( 'zozo_sticky_menu_height_alt' );
		if( $sticky_menu_height_alt_opt['height'] != '' ) {
			if( is_numeric( $sticky_menu_height_alt_opt['height'] ) ) {
				$sticky_menu_height_alt = $sticky_menu_height_alt_opt['height'] . $sticky_menu_height_alt_opt['units'];
			} else {
				$sticky_menu_height_alt = $sticky_menu_height_alt_opt['height'];
			}
		}
		
		wp_localize_script('aven-theme-init-js', 'aven_zozo_js_vars', 
							array( 'zozo_template_uri' 		=> esc_js( $template_uri ),
								   'isRTL' 					=> esc_js( $isRTL ),
								   'isOriginLeft'       	=> esc_js( $isOriginLeft ),
								   'zozo_sticky_height' 	=> esc_js( $sticky_menu_height ),
								   'zozo_sticky_height_alt' => esc_js( $sticky_menu_height_alt ),
								   'zozo_ajax_url'	   		=> esc_js( admin_url('admin-ajax.php') ),
								   'zozo_back_menu'	   		=> esc_html__( 'Back', 'aven' ),
								   'zozo_CounterYears' 		=> esc_html__( 'Years', 'aven' ),
								   'zozo_CounterMonths' 	=> esc_html__( 'Months', 'aven' ),
								   'zozo_CounterWeeks' 		=> esc_html__( 'Weeks', 'aven' ),
								   'zozo_CounterDays' 		=> esc_html__( 'Days', 'aven' ),
								   'zozo_CounterHours' 		=> esc_html__( 'Hours', 'aven' ),
								   'zozo_CounterMins' 		=> esc_html__( 'Mins', 'aven' ),
								   'zozo_CounterSecs' 		=> esc_html__( 'Secs', 'aven' ),
								   'zozo_CounterYear' 		=> esc_html__( 'Year', 'aven' ),
								   'zozo_CounterMonth' 		=> esc_html__( 'Month', 'aven' ),
								   'zozo_CounterWeek' 		=> esc_html__( 'Week', 'aven' ),
								   'zozo_CounterDay' 		=> esc_html__( 'Day', 'aven' ),
								   'zozo_CounterHour' 		=> esc_html__( 'Hour', 'aven' ),
								   'zozo_CounterMin' 		=> esc_html__( 'Min', 'aven' ),
								   'zozo_CounterSec' 		=> esc_html__( 'Sec', 'aven' ) ));

	} // End aven_zozo_load_theme_scripts()
	
}

/* =================================================================
 * Remove version numbers from scripts URL
 * ================================================================= */

function aven_zozo_remove_scripts_version( $src ) {
	if ( get_theme_mod( 'zozo_remove_scripts_version', true ) && strpos( $src, 'ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}



/* =================================================================
 * Custom Excerpt Length used on archive/category and blog pages
 * ================================================================= */

function aven_zozo_custom_excerpt_length( $limit ) {		
	return '60';	
}

function aven_zozo_custom_excerpt_more( $more ) {
	return '...';
}

/* =================================================================
 * Check Plugins Loaded
 * ================================================================= */
 
if( ! function_exists( 'aven_zozo_check_plugins_loaded' ) ) { 
	function aven_zozo_check_plugins_loaded() {
		if( ! function_exists( 'is_woocommerce' ) ) {
			function is_woocommerce() { return false; }
		}
		if( ! function_exists( 'is_bbpress' ) ) {
			function is_bbpress() { return false; }
		}
		if( ! function_exists( 'is_buddypress' ) ) {
			function is_buddypress() { return false; }
		}
		if( ! function_exists( 'bbp_is_forum_archive' ) ) {
			function bbp_is_forum_archive() { return false; }
		}
		if( ! function_exists( 'bbp_is_topic_archive' ) ) {
			function bbp_is_topic_archive() { return false; }
		}
		if( ! function_exists( 'bbp_is_user_home' ) ) {
			function bbp_is_user_home() { return false; }
		}
		if( ! function_exists( 'bbp_is_search' ) ) {
			function bbp_is_search() { return false; }
		}
		if( ! function_exists( 'tribe_is_event' ) ) {
			function tribe_is_event() { return false; }
		}
	}
}

/* =================================================================
 * Excerpt with allow some tags
 * ================================================================= */

function aven_wpse_allowedtags() {
    // Add custom tags to this string
    return '<script>,<style>,<strong>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<h1>,<h2>,<h3>,<h4>,<h5>,<h6>,<blockquote>,<table>,<thead>,<tbody>,<th>,<tr>,<td>,<address>,<pre>,<code>,<span>,<div>,<button>,<dl>,<dt>,<dd>';
}

function aven_zozo_blog_allowedtags() {
    return '<a>,<span>';
}

if ( ! function_exists( 'aven_zozo_blog_trim_excerpt' ) ) {

    function aven_zozo_blog_trim_excerpt( $excerpt_length ) {
		global $post;
		
		$content = $post_excerpt = $clean_excerpt = $excerpt = '';
		
		if( isset( $excerpt_length ) && $excerpt_length == '' ) {
			$limit = 168;
		}
		
		$post = get_post( get_the_ID() );
		$more_tag = strpos( $post->post_content, '<!--more-->' );
		
		$readmore_link = '';
		$readmore_link = ' <span class="meta-more-link">&rarr;</span>';

		$content = get_the_content( $readmore_link );
		
		if( $post->post_excerpt || $more_tag !== false ) {				
			if( ! $more_tag ) {
				$content = rtrim( get_the_excerpt(), '&rarr;' );
			}				
		}
		
		$content = apply_filters('the_content', $content);
		$post_excerpt = strip_tags( $content, aven_zozo_blog_allowedtags() ); 
		$clean_excerpt = strpos( $post_excerpt, '...' ) ? strstr( $post_excerpt, '...', true ) : $post_excerpt;
		
		$clean_excerpt = aven_zozo_remove_vc_from_excerpt($clean_excerpt);
		$clean_excerpt = strip_shortcodes(aven_zozo_remove_zozo_from_excerpt($clean_excerpt));
		$excerpt_word_array = explode( ' ', $clean_excerpt );		
		$excerpt_word_array = array_slice( $excerpt_word_array, 0, $excerpt_length );
		$excerpt = implode( ' ', $excerpt_word_array );
		
		return $excerpt;
    }

}

/* =================================================================
 * Maintenance or Coming Soon Page
 * ================================================================= */

if ( ! function_exists( 'aven_zozo_activate_maintenance_mode' ) ) {

    function aven_zozo_activate_maintenance_mode() {
		$maintenance_mode = '';
		$comingsoon_mode = '';
		$custom_logo = '';
		$contact_info = '';
		
		if( aven_zozo_get_theme_option( 'zozo_enable_maintenance' ) ) {
			$maintenance_mode = aven_zozo_get_theme_option( 'zozo_enable_maintenance' );
		} else {
			$maintenance_mode = false;
		}
		
		if( aven_zozo_get_theme_option( 'zozo_enable_coming_soon' ) ) {
			$comingsoon_mode = aven_zozo_get_theme_option( 'zozo_enable_coming_soon' );
		} else {
			$comingsoon_mode = false;
		}
		
		$args['response'] = 503;
		
		$logo = aven_zozo_get_theme_option( 'zozo_logo' );
		if( $logo['url'] ) {
			$custom_logo = '<div class="logo"><img class="img-responsive" src="' . esc_url( $logo['url'] ) . '" alt="'. esc_html__('Maintenance', 'aven') .'" width="'. esc_attr( $logo['width'] ) .'" height="'. esc_attr( $logo['height'] ) .'" style="margin: 0 auto; display: block;"></div>';
		}
		
		if( aven_zozo_get_theme_option( 'zozo_header_email' ) != '' ) {
			$contact_infos = '<h5 style="margin: 10px 0;"><a href="mailto:'.esc_attr( aven_zozo_get_theme_option( 'zozo_header_email' )  ).'" style="color: #FFC400;">'.esc_html( aven_zozo_get_theme_option( 'zozo_header_email' ) ).'</a></h5>';
		}
		
		if( aven_zozo_get_theme_option( 'zozo_header_phone' ) != '' ) {
			$contact_infos .= '<h5 style="margin: 10px 0;">'. esc_html( aven_zozo_get_theme_option( 'zozo_header_phone' ) ) .'</h5>';
		}
		
		if( isset( $contact_infos ) && $contact_infos != '' ) {
			$contact_info = '<h2 style="font-family: Roboto; font-weight: bold; display:inline-block; margin-bottom: 10px; color: #000;">CONTACT US</h2>';
			$contact_info .= $contact_infos;
		}
		
		if ( $maintenance_mode == 1 ) {
			if ( ! current_user_can( 'edit_themes' ) || ! is_user_logged_in() ) {
				wp_die( $custom_logo . '<div class="content" style="text-align:center;"><h1 style="font-family: Roboto; font-weight: bold; display:inline-block; border-bottom: 3px double #666; font-size: 32px; color: #000;">UNDER <span style="color: #FFC400;">MAINTENANCE</span></h1><p>' . esc_html__( 'We are currently in maintenance mode. We will be back soon.', 'aven' ) . '</p>'. $contact_info .'</div>', get_bloginfo( 'name' ), $args );
			}
		} else if ( $maintenance_mode == 2 ) {

			$maintenance_page     	= aven_zozo_get_theme_option( 'zozo_maintenance_mode_page' );
			$current_page_url 		= aven_zozo_get_current_url();
			$maintenance_page_url 	= get_permalink( $maintenance_page );

			if ( $current_page_url != $maintenance_page_url ) {
				if ( ! current_user_can( 'edit_themes' ) || ! is_user_logged_in() ) {
					wp_redirect( $maintenance_page_url );
					exit;
				}
			}
			
		} else if ( $comingsoon_mode == 1 ) {

			if ( ! current_user_can( 'edit_themes' ) || ! is_user_logged_in() ) {
				wp_die( $custom_logo . '<div class="content" style="text-align:center;"><h1 style="font-family: Roboto; font-weight: bold; display:inline-block; border-bottom: 3px double #666; font-size: 32px; color: #000;">COMING <span style="color: #FFC400;">SOON!</span></h1><p>' . esc_html__( 'We are currently working on an awesome new site, which will be ready soon. Stay Tuned!', 'aven' ) . '</p>'. $contact_info .'</div>', get_bloginfo( 'name' ), $args );
			}
			
		} else if ( $comingsoon_mode == 2 ) {

			$comingsoon_page     	= aven_zozo_get_theme_option( 'zozo_coming_soon_page' );
			$current_page_url 		= aven_zozo_get_current_url();
			$comingsoon_page_url 	= get_permalink( $comingsoon_page );

			if ( $current_page_url != $comingsoon_page_url ) {
				if ( ! current_user_can( 'edit_themes' ) || ! is_user_logged_in() ) {
					wp_redirect( $comingsoon_page_url );
					exit;
				}
			}
			
		}
		
	}
	
}

/* =================================================================
 * Open Graph Meta Tags
 * ================================================================= */

if( aven_zozo_get_theme_option( 'zozo_disable_opengraph' ) != 1 ) {

	function aven_zozo_add_opengraph_doctype( $output ) {
		return $output . ' prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#"';
	}
	add_filter( 'language_attributes', 'aven_zozo_add_opengraph_doctype' );
	
	function aven_zozo_insert_og_meta_tags() {
		global $post;

		if( ! is_singular() )
			return;
			
		$excerpt = '';	
	    $content = $post->post_content;
		
		$excerpt = strip_tags( trim( preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $content ) ) );
		if( function_exists( 'mb_strimwidth' ) ) {
			$excerpt = mb_strimwidth( $excerpt, 0, 100, '...' );
		}
		
		$logo = aven_zozo_get_theme_option( 'zozo_logo' );
		
		echo sprintf( '<meta property="og:title" content="%s" />', strip_tags( str_replace( array( '"', "'" ), array( '&quot;', '&#39;' ), $post->post_title ) ) ) . "\n";
		echo '<meta property="og:type" content="article" />' . "\n";
		echo sprintf( '<meta property="og:url" content="%s" />', get_permalink() ) . "\n";
		echo sprintf( '<meta property="og:site_name" content="%s" />', get_bloginfo('name') ) . "\n";
		echo sprintf( '<meta property="og:description" content="%s" />', $excerpt ) . "\n";
		if( ! has_post_thumbnail( $post->ID ) ) {
			if( $logo['url'] ) {
				echo sprintf( '<meta property="og:image" content="%s" />', $logo['url'] ) . "\n";
			}
		} else if( has_post_thumbnail( $post->ID ) ) {
			$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
			if( ! empty ( $thumbnail_src ) ) {
				echo sprintf( '<meta property="og:image" content="%s" />', esc_attr( $thumbnail_src[0] ) ) . "\n";
			}
		}
	}
	
	add_action( 'wp_head', 'aven_zozo_insert_og_meta_tags', 5 );
}

if( ! function_exists('aven_zozo_remove_vc_from_excerpt') )  {
	function aven_zozo_remove_vc_from_excerpt( $excerpt ) {
		$patterns = "/\[[\/]?vc_[^\]]*\]/";
		$replacements = "";
		return preg_replace($patterns, $replacements, $excerpt);
	}
}

if( ! function_exists('aven_zozo_remove_zozo_from_excerpt') )  {
	function aven_zozo_remove_zozo_from_excerpt( $excerpt ) {
		$patterns = "/\[[\/]?zozo_[^\]]*\]/";
		$replacements = "";
		return preg_replace($patterns, $replacements, $excerpt);
	}
}

if( ! function_exists('aven_zozo_shortcode_stripped_excerpt') ) {
	function aven_zozo_shortcode_stripped_excerpt( $content, $excerpt_length ) {
			
		$post_excerpt = strip_tags( $content ); 
		$clean_excerpt = strpos($post_excerpt, '...') ? strstr($post_excerpt, '...', true) : $post_excerpt;
		
		$clean_excerpt = aven_zozo_remove_vc_from_excerpt($clean_excerpt);
		$clean_excerpt = strip_shortcodes(aven_zozo_remove_zozo_from_excerpt($clean_excerpt));
		$excerpt_word_array = explode( ' ', $clean_excerpt );		
		$excerpt_word_array = array_slice( $excerpt_word_array, 0, $excerpt_length );
		$excerpt = implode( ' ', $excerpt_word_array );
		
		return $excerpt;
		
	}
}

/* =================================================================
 * Enable compatibility with theme for JC Submenu
 * ================================================================= */

function aven_zozo_jc_disable_public_walker($default){
    return false;
}

add_filter('jcs/enable_public_walker', 'aven_zozo_jc_disable_public_walker');

function aven_zozo_jc_edit_item_classes( $classes, $item_id, $item_type ){
 
    $classes[] = "menu-item menu-item-type-$item_type";
    return $classes;
	
}
add_action( 'jcs/item_classes', 'aven_zozo_jc_edit_item_classes', 10, 3 );

/* ================================================
 * Modal Popup Hide Forever
 * ================================================ */
 
add_action('wp_ajax_modal_hide_forever', 'aven_zozo_modal_hide_forever');
add_action('wp_ajax_nopriv_modal_hide_forever', 'aven_zozo_modal_hide_forever');

if( ! function_exists( "aven_zozo_modal_hide_forever" ) ) {
	function aven_zozo_modal_hide_forever() {
	
		if( $_POST['id'] != '' && $_POST['value'] != '' ) {
			aven_zozo_setcookie( $_POST['id'], $_POST['value'], 0 );			
			echo "success";
		}
		
		die();
	}
}

function aven_zozo_setcookie( $name, $value, $expire = 0, $secure = false ) {
	setcookie( $name, $value, $expire, '/', COOKIE_DOMAIN, $secure );
}

/* ==================================================================
 *	Visual Composer Custom CSS Fix for Woocommerce Shop Page
 * ================================================================== */
function aven_zozo_vc_shortcode_customcss_for_shop() {
	if( is_shop() ) {
		$post_id = get_option('woocommerce_shop_page_id');
		
		if ( $post_id ) {
			$shortcodes_custom_css = get_post_meta( $post_id, '_wpb_shortcodes_custom_css', true );
			if ( ! empty( $shortcodes_custom_css ) ) {
				$shortcodes_custom_css = strip_tags( $shortcodes_custom_css );
				echo '<style type="text/css" data-type="shop-vc_shortcodes-custom-css">'. $shortcodes_custom_css .'</style>';
			}
		}
	}
}
if( ZOZO_WOOCOMMERCE_ACTIVE ) {
	add_action( 'wp_head', 'aven_zozo_vc_shortcode_customcss_for_shop', 1000 );
}

/**
 * Enqueue supplemental block editor styles.
 */
function aven_editor_customizer_styles() {

	wp_enqueue_style( 'google-fonts', zozo_customizer_redux_fonts_url(), array(), null, 'all' );
	wp_enqueue_style( 'aven-editor-customizer-styles', get_theme_file_uri( '/style-editor-customizer.css' ), false, '1.1', 'all' );
	
	ob_start();
	require_once ZOZOINCLUDES . 'theme-customizer-styles.php';
	$custom_content = ob_get_clean();

	wp_add_inline_style( 'aven-editor-customizer-styles', $custom_content );

}
add_action( 'enqueue_block_editor_assets', 'aven_editor_customizer_styles' );

function zozo_customizer_redux_fonts_url() {

	global $zozo_options;

    // global variable
    $fonts_url = '';
	$font_families = array();
	$font_subsets = array();
	
	$fonts_lists = array( 'zozo_body_font', 'zozo_h1_font_styles', 'zozo_h2_font_styles', 'zozo_h3_font_styles', 'zozo_h4_font_styles', 'zozo_h5_font_styles', 'zozo_h6_font_styles' );
	foreach( $fonts_lists as $fonts_list ){
		$font_n = isset( $zozo_options[$fonts_list] ) ? $zozo_options[$fonts_list] : 
			array( 'font-family' => '', 'font-weight' => '', 'subsets' => '' );
		$font_n_family = isset( $font_n['font-family'] ) ? $font_n['font-family'] : '';
		$font_n_weight = isset( $font_n['font-weight'] ) ? $font_n['font-weight'] : '';
		$font_n_subset = isset( $font_n['subsets'] ) ? $font_n['subsets'] : '';
	
		if( !isset( $font_n['google'] ) || ( isset( $font_n['google'] ) && $font_n['google'] !== 'false' ) ){
			$font_families[] = $font_n_family . ':' . $font_n_weight;
			if( !empty( $font_n_subset ) ){
				$font_subsets[]	= $font_n_subset;
			}
		}
	}

    // Remove duplicate values
    $font_families = array_unique($font_families);
    $font_subsets = array_unique($font_subsets);

    // Combine multiple fonts into one request
	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( implode( ',', $font_subsets )),
	);
	$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );

    return $fonts_url;
}