<?php

// **************************************
// Sections
// **************************************
Kirki::add_section( 'header_style', array(
    'title'          => esc_attr__('Header Styles', 'mr_tailor' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_header',
) );

Kirki::add_section( 'header_elements', array(
    'title'          => esc_attr__('Header Elements', 'mr_tailor' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_header',
) );

Kirki::add_section( 'header_logo', array(
    'title'          => esc_attr__('Logo', 'mr_tailor' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_header',
) );

Kirki::add_section( 'header_transparency', array(
    'title'          => esc_attr__('Header Transparency', 'mr_tailor' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_header',
) );

Kirki::add_section( 'header_topbar', array(
    'title'          => esc_attr__('Top Bar', 'mr_tailor' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_header',
) );

Kirki::add_section( 'header_sticky', array(
    'title'          => esc_attr__('Sticky Header', 'mr_tailor' ),
    'priority'       => 10,
    'capability'     => 'edit_theme_options',
    'panel'          => 'panel_header',
) );

// **************************************
// Fields
// **************************************

// Header Styles

Kirki::add_field( 'mrtailor', array(
    'type'        => 'radio-image',
    'settings'    => 'header_layout',
    'label'       => esc_attr__( 'Header Layout', 'mr_tailor' ),
    'section'     => 'header_style',
    'default'     => '0',
    'priority'    => 10,
    'choices'     => array(
        '0' => get_template_directory_uri() . '/images/theme_options/icons/header_1.png',
        '1' => get_template_directory_uri() . '/images/theme_options/icons/header_2.png',
    ),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'header_style',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'slider',
	'settings'    => 'header_paddings',
	'label'       => esc_attr__( 'Header Spacing', 'mr_tailor' ),
	'description' => esc_html__('Above and below the logo', 'mr_tailor'),
	'section'     => 'header_style',
	'default'     => 30,
	'priority'    => 10,
	'choices'     => array(
		'min'  => 0,
		'max'  => 200,
		'step' => 1,
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'header_style',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'color',
	'settings'    => 'main_header_background_color',
	'label'       => esc_attr__( 'Header Background Color', 'mr_tailor' ),
	'description' => esc_html__('When not set to Transparent', 'mr_tailor'),
	'section'     => 'header_style',
	'default'     => '#ffffff',
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'header_style',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'slider',
	'settings'    => 'main_header_font_size',
	'label'       => esc_attr__( 'Header Font Size', 'mr_tailor' ),
	'section'     => 'header_style',
	'default'     => 13,
	'priority'    => 10,
	'choices'     => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1,
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'header_style',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'color',
	'settings'    => 'main_header_font_color',
	'label'       => esc_attr__( 'Header Font Color', 'mr_tailor' ),
	'section'     => 'header_style',
	'default'     => '#000000',
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'header_style',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'slider',
	'settings'    => 'main_header_font_weight',
	'label'       => esc_attr__( 'Header Font Weight', 'mr_tailor' ),
	'description' => esc_html__('If your choice is not available for the font in use, the closest weight available will be applied.', 'mr_tailor'),
	'section'     => 'header_style',
	'default'     => 700,
	'priority'    => 10,
	'choices'     => array(
		'min'  => 100,
		'max'  => 900,
		'step' => 100,
	),
));

// Header Elements

Kirki::add_field( 'mrtailor', array(
	'type'        => 'toggle',
	'settings'    => 'main_header_wishlist',
	'label'       => esc_attr__( 'Wishlist Icon', 'mr_tailor' ),
	'section'     => 'header_elements',
	'description' => '<span class="dashicons dashicons-editor-help"></span>Requires the <a target="_blank" href="https://wordpress.org/plugins/yith-woocommerce-wishlist/">YITH WooCommerce Wishlist</a> plugin.',
	'default'     => true,
	'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'image',
	'settings'    => 'main_header_wishlist_icon',
	'label'       => esc_html__( 'Custom Wishlist Icon', 'mr_tailor' ),
	'section'     => 'header_elements',
	'priority'    => 10,
	'active_callback'    => array(
		array(
			'setting'  => 'main_header_wishlist',
			'operator' => '==',
			'value'    => true,
		),
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'header_elements',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'toggle',
	'settings'    => 'main_header_shopping_bag',
	'label'       => esc_attr__( 'Shopping Cart Icon', 'mr_tailor' ),
	'section'     => 'header_elements',
	'default'     => true,
	'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'image',
	'settings'    => 'main_header_shopping_bag_icon',
	'label'       => esc_html__( 'Custom Shopping Cart Icon', 'mr_tailor' ),
	'section'     => 'header_elements',
	'priority'    => 10,
	'active_callback'    => array(
		array(
			'setting'  => 'main_header_shopping_bag',
			'operator' => '==',
			'value'    => true,
		),
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'header_elements',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'toggle',
	'settings'    => 'main_header_search_bar',
	'label'       => esc_attr__( 'Search Icon', 'mr_tailor' ),
	'section'     => 'header_elements',
	'default'     => true,
	'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'image',
	'settings'    => 'main_header_search_bar_icon',
	'label'       => esc_html__( 'Custom Search Icon', 'mr_tailor' ),
	'section'     => 'header_elements',
	'priority'    => 10,
	'active_callback'    => array(
		array(
			'setting'  => 'main_header_search_bar',
			'operator' => '==',
			'value'    => true,
		),
	),
));

// Logo

Kirki::add_field( 'mrtailor', array(
	'type'        => 'image',
	'settings'    => 'site_logo',
	'label'       => esc_html__( 'Your Logo', 'mr_tailor' ),
	'section'     => 'header_logo',
	'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'header_logo',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'image',
	'settings'    => 'sticky_header_logo',
	'label'       => esc_html__( 'Alternative Logo', 'mr_tailor' ),
	'section'     => 'header_logo',
	'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'header_logo',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'slider',
	'settings'    => 'logo_height',
	'label'       => esc_html__( 'Logo Height', 'mr_tailor' ),
	'section'     => 'header_logo',
	'priority'    => 10,
	'default'	  => 60,
	'choices'     => array(
			'min'  => 0,
			'max'  => 300,
			'step' => 1,
		),
));

// Header Transparency

Kirki::add_field( 'mrtailor', array(
	'type'        => 'toggle',
	'settings'    => 'main_header_background_transparency',
	'label'       => esc_attr__( 'Transparent Header', 'mr_tailor' ),
	'section'     => 'header_transparency',
	'default'     => true,
	'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'header_transparency',
    'default'     => '<hr />',
    'priority'    => 10,
    'active_callback'    => array(
		array(
			'setting'  => 'main_header_background_transparency',
			'operator' => '==',
			'value'    => true,
		)
	),
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'main_header_transparency_scheme',
	'label'       => esc_attr__( 'Default Color Scheme', 'mr_tailor' ),
	'section'     => 'header_transparency',
	'default' 	  => 'transparency_light',
	'priority'    => 10,
	'choices'	  => array(
		'transparency_light'	=> esc_html__( 'Light', 'mr_tailor' ),
        'transparency_dark' 	=> esc_html__( 'Dark', 'mr_tailor' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'main_header_background_transparency',
			'operator' => '==',
			'value'    => true,
		)
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'header_transparency',
    'default'     => '<hr />',
    'priority'    => 10,
    'active_callback'    => array(
		array(
			'setting'  => 'main_header_background_transparency',
			'operator' => '==',
			'value'    => true,
		)
	),
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'shop_category_header_transparency_scheme',
	'label'       => esc_attr__( 'Shop Category Page Color Scheme', 'mr_tailor' ),
	'section'     => 'header_transparency',
	'default' 	  => 'inherit',
	'priority'    => 10,
	'choices'	  => array(
		'inherit'               => esc_html__( 'Inherit', 'mr_tailor' ),
        'no_transparency'       => esc_html__( 'No Transparency', 'mr_tailor' ),
        'transparency_light'    => esc_html__( 'Light', 'mr_tailor' ),
        'transparency_dark'     => esc_html__( 'Dark', 'mr_tailor' ),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'main_header_background_transparency',
			'operator' => '==',
			'value'    => true,
		)
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'dropdown',
    'settings'    => 'light_transparency_dropdown',
    'section'     => 'header_transparency',
    'label'       => esc_html__( 'Light Transparency', 'mr_tailor' ),
    'priority'    => 10,
    'active_callback'    => array(
		array(
			'setting'  => 'main_header_background_transparency',
			'operator' => '==',
			'value'    => true,
		)
	),
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'color',
	'settings'    => 'main_header_transparent_light_color',
	'label'       => esc_attr__( 'Transparent Header Light Color', 'mr_tailor' ),
	'description' => esc_html__('The Transparent Header Light Color.', 'mr_tailor'),
	'section'     => 'header_transparency',
	'default'     => '#ffffff',
	'active_callback'    => array(
		array(
			'setting'  => 'main_header_background_transparency',
			'operator' => '==',
			'value'    => true,
		)
	),
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'image',
	'settings'    => 'light_transparent_header_logo',
	'label'       => esc_html__( 'Logo for Light Transparent Header', 'mr_tailor' ),
	'section'     => 'header_transparency',
	'priority'    => 10,
	'active_callback'    => array(
		array(
			'setting'  => 'main_header_background_transparency',
			'operator' => '==',
			'value'    => true,
		)
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'dropdown',
    'settings'    => 'dark_transparency_dropdown',
    'section'     => 'header_transparency',
    'label'       => esc_html__( 'Dark Transparency', 'mr_tailor' ),
    'priority'    => 10,
    'active_callback'    => array(
		array(
			'setting'  => 'main_header_background_transparency',
			'operator' => '==',
			'value'    => true,
		)
	),
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'color',
	'settings'    => 'main_header_transparent_dark_color',
	'label'       => esc_attr__( 'Transparent Header Dark Color', 'mr_tailor' ),
	'description' => esc_html__('The Transparent Header Dark Color.', 'mr_tailor'),
	'section'     => 'header_transparency',
	'default'     => '#000000',
	'active_callback'    => array(
		array(
			'setting'  => 'main_header_background_transparency',
			'operator' => '==',
			'value'    => true,
		)
	),
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'image',
	'settings'    => 'dark_transparent_header_logo',
	'label'       => esc_html__( 'Logo for Dark Transparent Header', 'mr_tailor' ),
	'section'     => 'header_transparency',
	'priority'    => 10,
	'active_callback'    => array(
		array(
			'setting'  => 'main_header_background_transparency',
			'operator' => '==',
			'value'    => true,
		)
	),
));

// Top Bar

Kirki::add_field( 'mrtailor', array(
	'type'        => 'toggle',
	'settings'    => 'top_bar_switch',
	'label'       => esc_attr__( 'Top Bar', 'mr_tailor' ),
	'section'     => 'header_topbar',
	'default'     => true,
	'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'header_topbar',
    'default'     => '<hr />',
    'priority'    => 10,
    'active_callback'    => array(
		array(
			'setting'  => 'top_bar_switch',
			'operator' => '==',
			'value'    => true,
		)
	),
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'color',
	'settings'    => 'top_bar_background_color',
	'label'       => esc_attr__( 'Top Bar Background Color', 'mr_tailor' ),
	'section'     => 'header_topbar',
	'default'     => '#3e5372',
	'active_callback'    => array(
		array(
			'setting'  => 'top_bar_switch',
			'operator' => '==',
			'value'    => true,
		)
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'header_topbar',
    'default'     => '<hr />',
    'priority'    => 10,
    'active_callback'    => array(
		array(
			'setting'  => 'top_bar_switch',
			'operator' => '==',
			'value'    => true,
		)
	),
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'color',
	'settings'    => 'top_bar_typography',
	'label'       => esc_attr__( 'Top Bar Text Color', 'mr_tailor' ),
	'section'     => 'header_topbar',
	'default'     => '#ffffff',
	'active_callback'    => array(
		array(
			'setting'  => 'top_bar_switch',
			'operator' => '==',
			'value'    => true,
		)
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'header_topbar',
    'default'     => '<hr />',
    'priority'    => 10,
    'active_callback'    => array(
		array(
			'setting'  => 'top_bar_switch',
			'operator' => '==',
			'value'    => true,
		)
	),
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'text',
	'settings'    => 'top_bar_text',
	'label'       => esc_attr__( 'Top Bar Text', 'mr_tailor' ),
	'section'     => 'header_topbar',
	'default' 	  => 'Free Shipping on All Orders Over $75!',
	'priority'    => 10,
	'active_callback'    => array(
		array(
			'setting'  => 'top_bar_switch',
			'operator' => '==',
			'value'    => true,
		),
	),
));

// Sticky Header

Kirki::add_field( 'mrtailor', array(
	'type'        => 'toggle',
	'settings'    => 'sticky_header',
	'label'       => esc_attr__( 'Sticky Header', 'mr_tailor' ),
	'section'     => 'header_sticky',
	'default'     => true,
	'priority'    => 10,
));
