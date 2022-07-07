<?php

Kirki::add_field( 'mrtailor', array(
    'type'        => 'radio-image',
    'settings'    => 'shop_layout',
    'label'       => esc_attr__( 'Shop Layout', 'mr_tailor' ),
    'section'     => 'panel_shop',
    'default'     => '0',
    'priority'    => 10,
    'choices'     => array(
        '0' => get_template_directory_uri() . '/images/theme_options/icons/shop-sidebar-off.png',
        '1' => get_template_directory_uri() . '/images/theme_options/icons/shop-sidebar-on.png',
    ),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_shop',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'toggle',
	'settings'    => 'catalog_mode',
	'label'       => esc_attr__( 'Catalog Mode', 'mr_tailor' ),
	'section'     => 'panel_shop',
	'description' => esc_html__('When enabled, the feature Turns Off the shopping functionality of WooCommerce.', 'mr_tailor'),
	'default'     => false,
	'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_shop',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'toggle',
	'settings'    => 'breadcrumbs',
	'label'       => esc_attr__( 'Breadcrumbs', 'mr_tailor' ),
	'section'     => 'panel_shop',
	'default'     => true,
	'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_shop',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'add_to_cart_display',
	'label'       => esc_attr__( 'Add to Cart Button Display', 'mr_tailor' ),
	'section'     => 'panel_shop',
	'default' 	  => '1',
	'priority'    => 10,
	'choices'	  => array(
		'0'	=> esc_html__( 'At All Times', 'mr_tailor' ),
        '1' 	=> esc_html__( 'When Hovering', 'mr_tailor' ),
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_shop',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', [
	'type'        => 'select',
	'settings'    => 'products_animation',
	'label'       => esc_html__( 'Product Animation', 'mr_tailor' ),
	'section'     => 'panel_shop',
	'default'     => 'e2',
	'priority'    => 10,
	'multiple'    => 0,
	'choices'     => array(
		'e0' => esc_html__( 'No Animation', 'mr_tailor' ),
        'e1' => esc_html__( 'Fade', 'mr_tailor' ),
        'e2' => esc_html__( 'Move Up', 'mr_tailor' ),
        'e3' => esc_html__( 'Scale Up', 'mr_tailor' ),
        'e4' => esc_html__( 'Fall Perspective', 'mr_tailor' ),
        'e5' => esc_html__( 'Fly', 'mr_tailor' ),
        'e6' => esc_html__( 'Flip', 'mr_tailor' ),
        'e7' => esc_html__( 'Helix', 'mr_tailor' ),
        'e8' => esc_html__( 'PopUp', 'mr_tailor' ),
	),
] );

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_shop',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'toggle',
	'settings'    => 'product_hover_animation',
	'label'       => esc_attr__( 'Product Hover Animation', 'mr_tailor' ),
	'section'     => 'panel_shop',
	'default'     => true,
	'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_shop',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'text',
	'settings'    => 'sale_text',
	'label'       => esc_attr__( 'Sale Text', 'mr_tailor' ),
	'section'     => 'panel_shop',
	'default' 	  => 'Sale!',
	'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_shop',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'text',
	'settings'    => 'out_of_stock_text',
	'label'       => esc_attr__( 'Out of Stock Text', 'mr_tailor' ),
	'section'     => 'panel_shop',
	'default' 	  => 'Out of stock',
	'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_shop',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'image',
	'settings'    => 'my_account_image',
	'label'       => esc_html__( 'My Account Image', 'mr_tailor' ),
	'section'     => 'panel_shop',
	'priority'    => 10,
));
