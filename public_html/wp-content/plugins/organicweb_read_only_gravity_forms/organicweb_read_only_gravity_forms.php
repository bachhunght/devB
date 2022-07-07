<?php
/**
 * Plugin Name: OrganicWeb Read Only Gravity Forms
 * Plugin URI: http://organicweb.com.au
 * Description:  Enables the ability to make a Gravity Forms field read only. Add 'disable' to the field CSS class.
 * Author: Gary Eckstein
 * Author URI: http://organicweb.com.au
 * Version: 0.1.0
 */
// Register Script
function organicweb_gf_readonly() {

	wp_register_script( 'organicweb_read_only', plugins_url( '/js/organicwebreadonly.js' , __FILE__ ) , array( 'jquery' ), false, true );
	wp_enqueue_script( 'organicweb_read_only' );

}

// Hook into the 'wp_enqueue_scripts' action
add_action( 'wp_enqueue_scripts', 'organicweb_gf_readonly' );
?>