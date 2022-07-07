<?php
/**
 * Visual Composer Functions
 *
 * @package     Aven
 * @subpackage  Includes/Visual Composer
 * @author      Zozothemes
 */

// Retun if the Visual Composer plugin isn't active
if ( ! ZOZO_VC_ACTIVE ) {
    return;
}

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if( function_exists('vc_set_as_theme') ){
	function aven_zozo_vcSetAsTheme() {
		vc_set_as_theme( $disable_updater = true );
	}
	add_action( 'vc_before_init', 'aven_zozo_vcSetAsTheme' );
}

// Admin Init
add_action( 'init', 'aven_zozo_vc_extend_params_init', 10 );

function aven_zozo_vc_extend_params_init() {

	// Add Params
	if ( function_exists( 'vc_add_param' ) ) {
		require_once( ZOZOINCLUDES . 'visual-composer/vc-params.php' );
	}
	
}

// Admin Visual Composer New Shortcode Params
add_action( 'init', 'aven_zozo_vc_new_params_init' );

function aven_zozo_vc_new_params_init() {
	$function = 'vc_add_' . 'shortcode_param';
	// Generate param type "number"
	$function( 'number', 'aven_zozo_number_settings_field' );
}

// Function generate param type "number"
function aven_zozo_number_settings_field( $settings, $value ) {
	$dependency = '';
	$param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
	$type 		= isset($settings['type']) ? $settings['type'] : '';
	$min 		= isset($settings['min']) ? $settings['min'] : '';
	$max 		= isset($settings['max']) ? $settings['max'] : '';
	$suffix 	= isset($settings['suffix']) ? $settings['suffix'] : '';
	$class 		= isset($settings['class']) ? $settings['class'] : '';
	
	$output = '<input type="number" min="'.$min.'" max="'.$max.'" class="wpb_vc_param_value ' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="'.$value.'" style="max-width:100px; margin-right: 10px;" />'.$suffix;
	return $output;
}

add_action( 'vc_after_init', 'aven_zozo_add_new_color_options' );

function aven_zozo_add_new_color_options() {
  //Get current values stored in the param
  $param = WPBMap::getParam( 'vc_masonry_grid', 'button_color' );
  //Append new value to the 'value' array
  //$param['value'][esc_html__( 'Theme Color', 'aven' )] = 'primary-bg';
  //Finally "mutate" param with new values
  vc_update_shortcode_param( 'vc_masonry_grid', $param );
}

// Get VC CSS Animation
function aven_zozo_vc_animation( $css_animation ) {
	$output = '';
	if ( '' !== $css_animation ) {
		wp_enqueue_script( 'vc_waypoints' );
		$output = ' wpb_animate_when_almost_visible wpb_' . $css_animation;
	}

	return $output;
}

// Include all custom shortcodes for VC
require_once( ZOZOINCLUDES . 'visual-composer/vc-init.php' );

// Default Layouts
require_once( ZOZOINCLUDES . 'visual-composer/vc-layouts.php' );

/**
 * Simple Line Icons
 *
 * @param $icons - taken from filter 
 * 
 * @return array - of icons for iconpicker, can be categorized, or not.
 */
if( ! function_exists('aven_zozo_vc_custom_simplelineicons') ) {
	function aven_zozo_vc_custom_simplelineicons( $icons ) {
	
		$pattern = '/\.(icon-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
		$simpleline_icons_path = ZOZO_ADMIN_ASSETS . 'css/simple-line-icons.css';
		
		$response = wp_remote_get( $simpleline_icons_path );
		if( is_array($response) ) {
			$subject = $response['body']; // use the content
		}
				
		preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);
		
		$all_line_icons = array();
		$all_new_line_icons = array();
		
		foreach($matches as $match){
			$all_line_icons['simple-icon ' . $match[1]] = $match[1];
		}
		
		foreach($all_line_icons as $key => $value ){
			$all_new_line_icons[] = array( $key => $value );
		}
	
		return array_merge( $icons, $all_new_line_icons );
		
	}
}

add_filter( 'vc_iconpicker-type-simplelineicons', 'aven_zozo_vc_custom_simplelineicons', 10, 1 );

/**
 * Flaticons
 *
 * @param $icons - taken from filter 
 * 
 * @return array - of icons for iconpicker, can be categorized, or not.
 */
if( ! function_exists('aven_zozo_vc_custom_flaticons') ) {
	function aven_zozo_vc_custom_flaticons( $icons ) {
	
		$pattern = '/\.(flaticon-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
		$flaticons_path = ZOZO_ADMIN_ASSETS . 'css/flaticon.css';
		
		$response = wp_remote_get( $flaticons_path );
		if( is_array($response) ) {
			$subject = $response['body']; // use the content
		}
		
		preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);
		
		$all_flat_icons = array();
		$all_new_flat_icons = array();
		
		foreach($matches as $match){
			$all_flat_icons['flaticon ' . $match[1]] = $match[1];
		}
		
		foreach($all_flat_icons as $key => $value ){
			$all_new_flat_icons[] = array( $key => $value );
		}
	
		return array_merge( $icons, $all_new_flat_icons );
	}
}

add_filter( 'vc_iconpicker-type-flaticons', 'aven_zozo_vc_custom_flaticons', 10, 1 );

/**
 * Image hover Styles
 */
if ( ! function_exists( 'aven_zozo_vc_image_hovers' ) ) {
	function aven_zozo_vc_image_hovers() {
		$hovers = array (
			esc_html__( 'None', 'aven' )				=> '',
			esc_html__( 'Fade Out', 'aven' )			=> 'fade-out',
			esc_html__( 'Fade In', 'aven' )				=> 'fade-in',
			esc_html__( 'Grow', 'aven' )				=> 'grow',
			esc_html__( 'Grow & Rotate', 'aven' )		=> 'grow-rotate',
			esc_html__( 'Sepia', 'aven' )				=> 'sepia',
			esc_html__( 'Normal - Blurr', 'aven' )		=> 'blurr',
			esc_html__( 'Blurr - Normal', 'aven' )		=> 'blurr-invert',
			
		);
		return apply_filters( 'aven_zozo_vc_image_hovers', $hovers );
	}
}

/**
 * Image filter Styles
 */
if ( ! function_exists( 'aven_zozo_vc_image_filters' ) ) {
	function aven_zozo_vc_image_filters() {
		$filters = array (
			esc_html__( 'None', 'aven' )		=> '',
			esc_html__( 'Grayscale', 'aven' )	=> 'grayscale',
		);
		return apply_filters( 'aven_zozo_vc_image_filters', $filters );
	}
}