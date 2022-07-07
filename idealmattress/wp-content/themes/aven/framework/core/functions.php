<?php
/* ======================================
 * Functions
 *
 *	aven_zozo_get_post_id()
 *	aven_zozo_header_slider_position()
 *	aven_zozo_featured_post_slider_position()
 *	aven_zozo_unregister_post_type()
 * ====================================== */
 
/* ======================================
 * Get queried post ID
 * ====================================== */
 
if ( ! function_exists( 'aven_zozo_get_post_id' ) ) {
	function aven_zozo_get_post_id() {
		
		$object_id = get_queried_object_id();
	
		if( ( get_option('show_on_front') && get_option('page_for_posts') && is_home() ) || ( get_option('page_for_posts') && is_archive() && ! is_post_type_archive() ) 
		&& ! ( is_tax('product_cat') || is_tax('product_tag' ) ) && ! ( is_tax('portfolio_categories') || is_tax('portfolio_tags' ) ) && ! is_tax('service_categories') && ! is_tax('testimonial_categories' ) && ! is_tax('team_categories' ) || ( get_option('page_for_posts') && is_search() ) ) {
			$post_id = get_option('page_for_posts');		
		} else {
			if( isset( $object_id ) ) {
				$post_id = $object_id;
			}
	
			if( ZOZO_WOOCOMMERCE_ACTIVE ) {
				if( is_shop() ) {
					$post_id = get_option('woocommerce_shop_page_id');
				}
				
				if ( ! is_singular() && ! is_shop() ) {
					$post_id = false;
				}
			} else {
				if( ! is_singular() ) {
					$post_id = false;
				}
			}
		}
		
		return $post_id;
		
	}
}

/* =======================================================
 * Change slider action priority based on slider position
 * ======================================================= */
 
if ( ! function_exists( 'aven_zozo_header_slider_position' ) ) {
	function aven_zozo_header_slider_position() {
		
		$post_id = aven_zozo_get_post_id();
		
		$slider_position = '';
		$slider_position = get_post_meta( $post_id, 'zozo_slider_position', true );
		if( isset( $slider_position ) && $slider_position == '' || $slider_position == 'default' ) {
			$slider_position = aven_zozo_get_theme_option( 'zozo_slider_position' );
		}
		
		if( ! $slider_position ) {
			$slider_position = "below";
		}
		
		if( $slider_position == "above" ) {
			add_action( 'aven_zozo_header_wrapper_start', 'aven_zozo_page_slider_wrapper', 10 );
		} else {
			add_action( 'aven_zozo_header_wrapper_start', 'aven_zozo_page_slider_wrapper', 40 );
		}
		
	}
} 
add_action( 'wp_head', 'aven_zozo_header_slider_position' );

/* ============================================================
 * Change featured post slider action based on slider position
 * ============================================================ */
 
if ( ! function_exists( 'aven_zozo_featured_post_slider_position' ) ) {
	function aven_zozo_featured_post_slider_position() {
		if( aven_zozo_get_theme_option( 'zozo_featured_slider_type' ) == 'below_header' ) {
			add_action( 'aven_zozo_header_wrapper_start', 'aven_zozo_featured_post_slider', 50 );
		}
		elseif( aven_zozo_get_theme_option( 'zozo_featured_slider_type' ) == 'above_footer' ) {
			add_action( 'aven_zozo_header_wrapper_end', 'aven_zozo_featured_post_slider', 5 );
		}
	}
} 
add_action( 'wp_head', 'aven_zozo_featured_post_slider_position' );

/* =======================================================
 * Unregister Custom Post Types
 * ======================================================= */
 
function aven_zozo_unregister_post_type( $post_type, $slug = '' ) {
	global $wp_post_types;
	
	$cpt_disable = '';
	$cpt_disable = aven_zozo_get_theme_option( 'cpt_disable' );
	
	if( isset( $cpt_disable ) ) {
		if( ! empty( $cpt_disable ) ) {
			foreach( $cpt_disable as $post_type => $cpt ) {
				if( $cpt == 1 && isset( $wp_post_types[ $post_type ] ) ) {
					unset( $wp_post_types[ $post_type ] );
				}
			}
		}
	}
}
add_action( 'init', 'aven_zozo_unregister_post_type', 20 );