<?php
/* =========================================
 * Enqueues child theme stylesheet
 * ========================================= */

function aven_zozo_enqueue_child_theme_styles() {
	wp_enqueue_style( 'aven-zozo-child-style', get_stylesheet_uri(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'aven_zozo_enqueue_child_theme_styles', 30 );