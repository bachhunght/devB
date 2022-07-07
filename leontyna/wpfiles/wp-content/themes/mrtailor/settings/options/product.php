<?php

Kirki::add_field( 'mrtailor', array(
    'type'        => 'radio-image',
    'settings'    => 'products_layout',
    'label'       => esc_attr__( 'Product Layout', 'mr_tailor' ),
    'section'     => 'panel_product',
    'default'     => '0',
    'priority'    => 10,
    'choices'     => array(
        '0' => get_template_directory_uri() . '/images/theme_options/icons/product-sidebar-off.png',
        '1' => get_template_directory_uri() . '/images/theme_options/icons/product-sidebar-on.png',
    ),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_product',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'toggle',
	'settings'    => 'product_gallery_zoom',
	'label'       => esc_attr__( 'Product Gallery Zoom', 'mr_tailor' ),
	'section'     => 'panel_product',
	'default'     => true,
	'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_product',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'toggle',
    'settings'    => 'product_gallery_lightbox',
    'label'       => esc_attr__( 'Product Gallery Lightbox', 'mr_tailor' ),
    'section'     => 'panel_product',
    'default'     => false,
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_product',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'toggle',
	'settings'    => 'recently_viewed_products',
	'label'       => esc_attr__( 'Recently viewed', 'mr_tailor' ),
	'section'     => 'panel_product',
	'default'     => true,
	'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_product',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'slider',
	'settings'    => 'related_products_per_view',
	'label'       => esc_attr__( 'Number of Related Products per View', 'mr_tailor' ),
	'section'     => 'panel_product',
	'default'     => 4,
	'priority'    => 10,
	'choices'     => array(
		'min'  => 2,
		'max'  => 6,
		'step' => 1,
	),
));