<?php

Kirki::add_field( 'mrtailor', array(
	'type'        => 'color',
	'settings'    => 'footer_background_color',
	'label'       => esc_attr__( 'Footer Background Color', 'mr_tailor' ),
	'section'     => 'panel_footer',
	'default'     => '#4a4f6a',
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_footer',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'color',
	'settings'    => 'footer_texts_color',
	'label'       => esc_attr__( 'Footer Text Color', 'mr_tailor' ),
	'section'     => 'panel_footer',
	'default'     => '#a5a7b5',
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_footer',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'color',
	'settings'    => 'footer_links_color',
	'label'       => esc_attr__( 'Footer Links Color', 'mr_tailor' ),
	'section'     => 'panel_footer',
	'default'     => '#ffffff',
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_footer',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'image',
	'settings'    => 'credit_card_icons',
	'label'       => esc_html__( 'Credit Card Icons / Image', 'mr_tailor' ),
	'section'     => 'panel_footer',
	'default'	  => get_template_directory_uri() . '/images/theme_options/icons/payment_cards.png',
	'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_footer',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'textarea',
	'settings'    => 'footer_copyright_text',
	'label'       => esc_attr__( 'Copyright Text', 'mr_tailor' ),
	'section'     => 'panel_footer',
	'default' 	  => '&copy; <a href=\'http://www.getbowtied.com/\'>Get Bowtied</a> - Elite ThemeForest Author.',
	'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_footer',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'toggle',
	'settings'    => 'expandable_footer',
	'label'       => esc_attr__( 'Expandable Footer on Mobiles', 'mr_tailor' ),
	'section'     => 'panel_footer',
	'default'     => true,
	'priority'    => 10,
));