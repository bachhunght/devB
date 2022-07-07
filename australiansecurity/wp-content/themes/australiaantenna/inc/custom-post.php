<?php
/**
 * Custom post
 */

/*function cc_create_testimonial_post() {
    $labels = array(
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial'
    );

    register_post_type( 'testimonial',
       array(
           'labels' => $labels,
           'public' => false,
           'show_ui' => true,
           'menu_position' => 28,
           'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes'),
           'has_archive' => true
       ));
}

add_action( 'init', 'cc_create_testimonial_post' );*/


function cc_create_client_post() {
    $labels = array(
        'name' => 'Clients',
        'singular_name' => 'Client'
    );

    register_post_type( 'client',
       array(
           'labels' => $labels,
           'public' => false,
           'menu_position' => 26,
           'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes'),
           'has_archive' => false
       ));
}
add_action( 'init', 'cc_create_client_post' );