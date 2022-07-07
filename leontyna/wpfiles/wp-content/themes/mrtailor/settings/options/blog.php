<?php

Kirki::add_field( 'mrtailor', array(
    'type'        => 'radio-image',
    'settings'    => 'sidebar_blog_listing',
    'label'       => esc_attr__( 'Blog Layout', 'mr_tailor' ),
    'section'     => 'panel_blog',
    'default'     => '0',
    'priority'    => 10,
    'choices'     => array(
      	'0' => get_template_directory_uri() . '/images/theme_options/icons/blog_no_sidebar.png',
        '1' => get_template_directory_uri() . '/images/theme_options/icons/blog_sidebar.png',
        '2' => get_template_directory_uri() . '/images/theme_options/icons/blog-masonry.png',
    ),
));