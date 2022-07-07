<?php

/**
 * Enqueue scripts and styles.
 */
function auantennas_styles() {
    // Add custom fonts, used in the main stylesheet.
    // wp_enqueue_style( 'auantennas-fonts', auantennas_fonts_url(apply_filters( 'auantennas_fonts_url', auantennas_default_fonts_url() ) ), array(), null );
    //echo get_stylesheet_uri();
    wp_enqueue_style( 'auantennas-core-style', ASSETS_DIR.'css/style.css', array(), '1.0' );
    wp_enqueue_style( 'auantennas-responsive-style', ASSETS_DIR.'css/responsive.css', array( 'auantennas-core-style' ), '1.0' );
    wp_enqueue_style( 'auantennas-bx-slider', ASSETS_DIR.'css/jquery.bxslider.min.css', array( 'auantennas-core-style' ), '1.0' );
    wp_enqueue_style( 'auantennas-fancyboxcss', ASSETS_DIR.'css/jquery.fancybox.css', array( 'auantennas-core-style' ), '1.0' );
    wp_enqueue_style( 'auantennas-style', get_stylesheet_uri(), array( 'auantennas-core-style' ), '1.0' );
    
    wp_enqueue_script( 'auantennas-bx-sliderjs', ASSETS_DIR. 'js/jquery.bxslider.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'auantennas-fancybox', ASSETS_DIR. 'js/jquery.fancybox.pack.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'auantennas-script', ASSETS_DIR. 'js/script.js', array( 'jquery' ), '1.0', true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'auantennas_styles' );