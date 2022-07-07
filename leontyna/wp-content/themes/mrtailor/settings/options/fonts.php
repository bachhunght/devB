<?php

Kirki::add_field( 'mrtailor', array(
    'type'        => 'dropdown',
    'settings'    => 'main_font_dropdown',
    'section'     => 'panel_fonts',
    'label'       => esc_html__( 'Main Font', 'mr_tailor' ),
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'main_font_source',
	'label'       => esc_html__( 'Font Source', 'mr_tailor' ),
	'section'     => 'panel_fonts',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'1' => 'Standard + Google Webfonts', 
        '2' => 'Adobe Typekit'
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_fonts',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
    'type'     		=> 'typography',
    'settings' 		=> 'main_font',
    'label'    	  	=> esc_attr__( 'Font Family', 'mr_tailor' ),
    'section'  		=> 'panel_fonts',
    'priority' 		=> 10,
    'default'     	=> array(
        'font-family'    => 'Arimo',
        'variant'        => 'regular',
        'subsets'		 => array( 'latin' ),
    ),
    'output'      	=> array(
		array(
			'element' => '',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'main_font_source',
			'operator' => '==',
			'value'    => '1',
		),
	),
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'text',
	'settings'    => 'main_font_typekit_kit_id',
	'label'       => esc_attr__( 'Typekit Kit ID', 'mr_tailor' ),
	'section'     => 'panel_fonts',
	'default' 	  => '',
	'priority'    => 10,
	'active_callback'    => array(
		array(
			'setting'  => 'main_font_source',
			'operator' => '==',
			'value'    => '2',
		),
	),
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'text',
	'settings'    => 'main_typekit_font_face',
	'label'       => esc_attr__( 'Typekit Font Family', 'mr_tailor' ),
	'section'     => 'panel_fonts',
	'default' 	  => '',
	'priority'    => 10,
	'active_callback'    => array(
		array(
			'setting'  => 'main_font_source',
			'operator' => '==',
			'value'    => '2',
		),
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'dropdown',
    'settings'    => 'secondary_font_dropdown',
    'section'     => 'panel_fonts',
    'label'       => esc_html__( 'Secondary Font', 'mr_tailor' ),
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'secondary_font_source',
	'label'       => esc_html__( 'Font Source', 'mr_tailor' ),
	'section'     => 'panel_fonts',
	'default'     => '1',
	'priority'    => 10,
	'choices'     => array(
		'1' => 'Standard + Google Webfonts', 
        '2' => 'Adobe Typekit'
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_fonts',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
    'type'     		=> 'typography',
    'settings' 		=> 'secondary_font',
    'label'    	  	=> esc_attr__( 'Font Family', 'mr_tailor' ),
    'section'  		=> 'panel_fonts',
    'priority' 		=> 10,
    'default'     => array(
        'font-family'    => 'Montserrat',
        'variant'        => 'regular',
        'subsets'		 => array( 'latin' ),
    ),
    'output'      => array(
		array(
			'element' => '',
		),
	),
	'active_callback'    => array(
		array(
			'setting'  => 'secondary_font_source',
			'operator' => '==',
			'value'    => '1',
		),
	),
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'text',
	'settings'    => 'secondary_font_typekit_kit_id',
	'label'       => esc_attr__( 'Typekit Kit ID', 'mr_tailor' ),
	'section'     => 'panel_fonts',
	'default' 	  => '',
	'priority'    => 10,
	'active_callback'    => array(
		array(
			'setting'  => 'secondary_font_source',
			'operator' => '==',
			'value'    => '2',
		),
	),
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'text',
	'settings'    => 'secondary_typekit_font_face',
	'label'       => esc_attr__( 'Typekit Font Family', 'mr_tailor' ),
	'section'     => 'panel_fonts',
	'default' 	  => '',
	'priority'    => 10,
	'active_callback'    => array(
		array(
			'setting'  => 'secondary_font_source',
			'operator' => '==',
			'value'    => '2',
		),
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'dropdown',
    'settings'    => 'base_font_dropdown',
    'section'     => 'panel_fonts',
    'label'       => esc_html__( 'Base Font Settings', 'mr_tailor' ),
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'body_text_font_family',
	'label'       => esc_html__( 'Font Family', 'mr_tailor' ),
	'section'     => 'panel_fonts',
	'default'     => 'main_font',
	'priority'    => 10,
	'choices'     => array(
		'main_font' => esc_html__( 'Main Font', 'mr_tailor' ),
        'secondary_font' => esc_html__( 'Secondary Font', 'mr_tailor' ),
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_fonts',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'slider',
	'settings'    => 'body_text_font_weight',
	'label'       => esc_attr__( 'Font Weight', 'mr_tailor' ),
	'section'     => 'panel_fonts',
	'default'     => 400,
	'priority'    => 10,
	'choices'     => array(
		'min'  => 100,
		'max'  => 900,
		'step' => 100,
	),
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'slider',
	'settings'    => 'body_text_font_size',
	'label'       => esc_attr__( 'Base Font Size', 'mr_tailor' ),
	'section'     => 'panel_fonts',
	'default'     => 16,
	'priority'    => 10,
	'choices'     => array(
		'min'  => 1,
		'max'  => 150,
		'step' => 1,
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_fonts',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'slider',
	'settings'    => 'body_text_line_height',
	'label'       => esc_attr__( 'Line Height', 'mr_tailor' ),
	'section'     => 'panel_fonts',
	'default'     => 28,
	'priority'    => 10,
	'choices'     => array(
		'min'  => 1,
		'max'  => 200,
		'step' => 1,
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_fonts',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'color',
	'settings'    => 'body_color',
	'label'       => esc_attr__( 'Text Color', 'mr_tailor' ),
	'section'     => 'panel_fonts',
	'default'     => '#222222',
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'dropdown',
    'settings'    => 'headings_font_dropdown',
    'section'     => 'panel_fonts',
    'label'       => esc_html__( 'Headings Settings', 'mr_tailor' ),
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'radio-buttonset',
	'settings'    => 'title_font_family',
	'label'       => esc_html__( 'Font Family', 'mr_tailor' ),
	'section'     => 'panel_fonts',
	'default'     => 'main_font',
	'priority'    => 10,
	'choices'     => array(
		'main_font' => esc_html__( 'Main Font', 'mr_tailor' ),
        'secondary_font' => esc_html__( 'Secondary Font', 'mr_tailor' ),
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_fonts',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'slider',
	'settings'    => 'h1_font_size',
	'label'       => esc_attr__( 'Page Titles Size', 'mr_tailor' ),
	'section'     => 'panel_fonts',
	'default'     => 50,
	'priority'    => 10,
	'choices'     => array(
		'min'  => 1,
		'max'  => 200,
		'step' => 1,
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_fonts',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'slider',
	'settings'    => 'title_font_weight',
	'label'       => esc_attr__( 'Font Weight', 'mr_tailor' ),
	'section'     => 'panel_fonts',
	'default'     => 400,
	'priority'    => 10,
	'choices'     => array(
		'min'  => 100,
		'max'  => 900,
		'step' => 100,
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_fonts',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'slider',
	'settings'    => 'h1_line_height',
	'label'       => esc_attr__( 'Line Height', 'mr_tailor' ),
	'section'     => 'panel_fonts',
	'default'     => 70,
	'priority'    => 10,
	'choices'     => array(
		'min'  => 1,
		'max'  => 200,
		'step' => 1,
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_fonts',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'slider',
	'settings'    => 'h_letter_spacing',
	'label'       => esc_attr__( 'Letter Spacing', 'mr_tailor' ),
	'section'     => 'panel_fonts',
	'default'     => 0,
	'priority'    => 10,
	'choices'     => array(
		'min'  => -10,
		'max'  => 10,
		'step' => 1,
	),
));

Kirki::add_field( 'mrtailor', array(
    'type'        => 'custom',
    'settings'    => 'separator_' . $sep++,
    'section'     => 'panel_fonts',
    'default'     => '<hr />',
    'priority'    => 10,
));

Kirki::add_field( 'mrtailor', array(
	'type'        => 'color',
	'settings'    => 'headings_color',
	'label'       => esc_attr__( 'Headings Color', 'mr_tailor' ),
	'section'     => 'panel_fonts',
	'default'     => '#000000',
));