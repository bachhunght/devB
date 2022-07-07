<?php

Kirki::add_field( 'mrtailor', array(
	'type'        => 'color',
	'settings'    => 'main_color',
	'label'       => esc_attr__( 'Main Theme Color', 'mr_tailor' ),
	'section'     => 'panel_styling',
	'default'     => '#4a4f6a',
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_styling',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'color',
	'settings'    => 'main_bg_color',
	'label'       => esc_attr__( 'Background Color', 'mr_tailor' ),
	'section'     => 'panel_styling',
	'default'     => '#ffffff',
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_styling',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'image',
	'settings'    => 'main_bg_image',
	'label'       => esc_html__( 'Background Image', 'mr_tailor' ),
	'section'     => 'panel_styling',
	'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_styling',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'color',
	'settings'    => 'navigation_bg',
	'label'       => esc_attr__( 'Navigation Dropdown Background', 'mr_tailor' ),
	'section'     => 'panel_styling',
	'default'     => '#ffffff',
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_styling',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'color',
	'settings'    => 'navigation_link_color',
	'label'       => esc_attr__( 'Navigation Dropdown Links Color', 'mr_tailor' ),
	'section'     => 'panel_styling',
	'default'     => '#000000',
));