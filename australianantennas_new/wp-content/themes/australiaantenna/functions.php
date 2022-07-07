<?php
//switch_theme( 'Camy' );
define( 'ASSETS_DIR', get_template_directory_uri() . '/assets/' );
define( 'WIDGETS_DIR', get_template_directory() . '/inc/widgets/' );

function auantennas_setup() {
    load_theme_textdomain( 'auantennas' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );

    add_image_size( 'auantennas-featured-image', 2000, 1200, true );

    add_image_size( 'auantennas-thumbnail-avatar', 100, 100, true );

    add_image_size( 'auantennas-logo', 307, 85, false);

    add_image_size( 'testimonial-thumbnail', 76, 76, false);

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus( array(
        'top'    => __( 'Top Menu', 'auantennas' ),
        'social' => __( 'Social Links Menu', 'auantennas' ),
    ) );

    //add_theme_support('nav-menus');
    
    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );


    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'auantennas_setup' );

function auantennas_widgets_init() {
    register_sidebar(array(
        'id' => 'sidebar',
        'name' => 'Sidebar Widget',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));		    		

    register_sidebar(array(        		
        'id' => 'sidebar_category',
        'name' => 'Sidebar Category Widget',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'id' => 'sidebar_category_top',
        'name' => 'Sidebar Category Top Widget',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));	

    register_sidebar(array(
        'id' => 'footer1',
        'name' => 'Footer Widget 1',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'id' => 'footer2',
        'name' => 'Footer Widget 2',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'id' => 'footer3',
        'name' => 'Footer Widget 3',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'id' => 'footer4',
        'name' => 'Footer Widget 4',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __( 'Home Sidebar' ),
        'id' => 'home-sidebar',
        'description' => __( 'Widgets in this area will be shown on the home page right-hand side.' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ));

    register_sidebar(array(
        'name' => __( 'Home Bottom' ),
        'id' => 'home-bottom',
        'description' => __( 'Widgets in this area will be shown on the bottom part of the home page' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    ));
}
add_action( 'widgets_init', 'auantennas_widgets_init' );

function auantennas_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'auantennas_javascript_detection', 0 );

function auantennas_pingback_header() {
    if ( is_singular() && pings_open() ) {
        printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
    }
}
add_action( 'wp_head', 'auantennas_pingback_header' );

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
    
}

function auantennas_excerpt_length( $length ) {
    return 13;
}
add_filter( 'excerpt_length', 'auantennas_excerpt_length', 999 );

function socialLinkCat( $link, $title, $email ) {
    $social = '';
    $social .='<a class="addthis_button" addthis:url="'.$link.'" addthis:title="'.$title.'" >';
    $social .='</a><script type="text/javascript" src="http://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-507800a118eab6fa"></script>';	

    echo $social; 
}

function filter_plugin_updates( $value ) {
    // unset( $value->response['widgetkit/widgetkit.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );

require_once ( WIDGETS_DIR . 'popular-post-widget.php' ); 
require get_parent_theme_file_path( '/inc/enqueue.php' );
require get_parent_theme_file_path( '/inc/pagination.php' );
require get_parent_theme_file_path( '/inc/custom-post.php' );

?>