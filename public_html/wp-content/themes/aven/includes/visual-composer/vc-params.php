<?php 
/**
 * Add new params to Visual Composer
 *
 * @package		Aven
 * @subpackage	Visual Composer
 * @author		Zozothemes
 */

/* =========================================
*  Rows
*  ========================================= */

vc_add_param( 'vc_row', array(
	'type'			=> 'dropdown',
	'heading'		=> esc_html__( 'Background Style', 'aven' ),
	'param_name'	=> 'bg_style',
	'value'			=> array(
		esc_html__( 'Default', 'aven' )								=> '',
		esc_html__( 'Primary Background Color', 'aven' )			=> 'bg-normal',
		esc_html__( 'Light Background Color', 'aven' )				=> 'light-wrapper',
		esc_html__( 'Grey Background Color', 'aven' )				=> 'grey-wrapper',
		esc_html__( 'Dark Background Color', 'aven' )				=> 'dark-wrapper',
		esc_html__( 'Dark Grey Background Color', 'aven' )			=> 'dark-grey-wrapper',
		esc_html__( 'Image Left, Content on Right', 'aven' )		=> 'image-left',
		esc_html__( 'Image Right, Content on Left', 'aven' )		=> 'image-right',
	),
) );

vc_add_param( 'vc_row', array(
	'type'			=> 'dropdown',
	'heading'		=> esc_html__( 'Background Skin', 'aven' ),
	'param_name'	=> 'bg_side_skin',
	'value'			=> array(
		esc_html__( 'Default', 'aven' )								=> '',
		esc_html__( 'Primary Background Color', 'aven' )			=> 'bg-normal',
		esc_html__( 'Light Background Color', 'aven' )				=> 'light-wrapper',
		esc_html__( 'Grey Background Color', 'aven' )				=> 'grey-wrapper',
		esc_html__( 'Dark Background Color', 'aven' )				=> 'dark-wrapper',
		esc_html__( 'Dark Grey Background Color', 'aven' )			=> 'dark-grey-wrapper',
	),
	'dependency'	=> array(
		'element'	=> 'bg_style',
		'value'		=> array( 'image-left', 'image-right' )
	),
) );

vc_add_param( 'vc_row', array(
	'type'			=> 'attach_image',
	'heading'		=> esc_html__( 'Left or Right Image', 'aven' ),
	'param_name'	=> 'bg_side_image',
	'value'			=> '',
	'dependency'	=> array(
		'element'	=> 'bg_style',
		'value'		=> array( 'image-left', 'image-right' )
	),
) );

vc_add_param( 'vc_row', array(
	'type'			=> 'dropdown',
	'heading'		=> esc_html__( 'Background Size', 'aven' ),
	'param_name'	=> 'bg_side_size',
	'value'			=> array(
		esc_html__( 'Default', 'aven' )		=> 'default',
		esc_html__( 'Cover', 'aven' )		=> 'cover',
		esc_html__( 'Contain', 'aven' )		=> 'contain',
	),
	'dependency'	=> array(
		'element'	=> 'bg_style',
		'value'		=> array( 'image-left', 'image-right' )
	),
) );

vc_add_param( 'vc_row', array(
	'type'			=> 'dropdown',
	'heading'		=> esc_html__( 'Background Repeat', 'aven' ),
	'param_name'	=> 'bg_side_repeat',
	'value'			=> array(
		esc_html__( 'No Repeat', 'aven' )	=> 'no-repeat',
		esc_html__( 'Repeat', 'aven' )		=> 'repeat',
		esc_html__( 'Repeat-x', 'aven' )	=> 'repeat-x',
		esc_html__( 'Repeat-y', 'aven' )	=> 'repeat-y',
	),
	'dependency'	=> array(
		'element'	=> 'bg_style',
		'value'		=> array( 'image-left', 'image-right' )
	),
) );

vc_add_param( 'vc_row', array(
	'type'			=> 'dropdown',
	'heading'		=> esc_html__( 'Make Container Fluid ?', 'aven' ),
	'param_name'	=> 'container_fluid',
	'value'			=> array(
		esc_html__( 'No', 'aven' )	=> 'no',
		esc_html__( 'Yes', 'aven' )	=> 'yes',
	),
	'dependency'	=> array(
		'element'	=> 'bg_style',
		'value'		=> array( 'image-left', 'image-right' )
	),
	'description'	=> esc_html__( 'Use this option to make column in fluid container.', 'aven' ),
) );

vc_add_param( 'vc_row', array(
	'type'			=> 'dropdown',
	'heading'		=> esc_html__( 'Column Match Height', 'aven' ),
	'param_name'	=> 'match_height',
	'value'			=> array(
		esc_html__( 'No', 'aven' )	=> 'no',
		esc_html__( 'Yes', 'aven' )	=> 'yes',
	),
	'dependency'	=> array(
		'element'	=> 'bg_style',
		'value'		=> array( '', 'bg-normal', 'light-wrapper', 'grey-wrapper', 'dark-wrapper' )
	),
	'description'	=> esc_html__( 'Use this option to make all column in equal heights..', 'aven' ),
) );

vc_add_param( 'vc_row', array(
	'type'			=> 'dropdown',
	'heading'		=> esc_html__( 'Center Row Content', 'aven' ),
	'param_name'	=> 'center_row',
	'value'			=> array(
		esc_html__( 'No', 'aven' )	=> 'no',
		esc_html__( 'Yes', 'aven' )	=> 'yes',
	),
	'description'	=> esc_html__( 'Use this option to add container and center the inner content. Useful when using full-width pages.', 'aven' ),
) );

vc_add_param( 'vc_row', array(
	'type'			=> 'checkbox',
	'heading'		=> esc_html__( 'Enable Background Image Overlay?', 'aven' ),
	'param_name'	=> 'bg_overlay',
	'description'	=> esc_html__( 'Check this box to enable the overlay for background image.', 'aven' ),
	'value'			=> array(
		esc_html__( 'Yes, please', 'aven' )	=> 'yes'
	),
) );

vc_add_param( 'vc_row', array(
	'type'			=> 'dropdown',
	'heading'		=> esc_html__( 'Background Overlay Style', 'aven' ),
	'param_name'	=> 'bg_overlay_style',
	'value'			=> array(
		esc_html__( 'Default', 'aven' )				=> 'overlay-dark',
		esc_html__( 'Dark Overlay', 'aven' )			=> 'overlay-dark',
		esc_html__( 'Light Overlay', 'aven' )			=> 'overlay-light',
		esc_html__( 'Theme Overlay', 'aven' )			=> 'overlay-primary',	
	),
	'dependency'	=> array(
		'element'	=> 'bg_overlay',
		'value'		=> 'yes'
	),
) );

vc_add_param( 'vc_row', array(
	'type'			=> 'checkbox',
	'heading'		=> esc_html__( 'Enable Video Background?', 'aven' ),
	'param_name'	=> 'enable_video_bg',
	'description'	=> esc_html__( 'Check this box to enable the options for video background.', 'aven' ),
	'value'			=> array(
		esc_html__( 'Yes, please', 'aven' )	=> 'yes'
	),
	'group'			=> esc_html__( 'Video', 'aven' ),
) );

vc_add_param( 'vc_row', array(
	'type'			=> 'textfield',
	'heading'		=> esc_html__( 'Video ID', 'aven' ),
	'param_name'	=> 'video_id',
	'description'	=> esc_html__( 'Enter Youtube Video ID to play background video. Ex: Y-OLlJUXwKU', 'aven' ),
	'dependency'	=> array(
		'element'	=> 'enable_video_bg',
		'value'		=> 'yes'
	),
	'group'			=> esc_html__( 'Video', 'aven' ),
) );

vc_add_param( 'vc_row', array(
	'type'			=> 'attach_image',
	'heading'		=> esc_html__( 'Video Fallback Image', 'aven' ),
	'param_name'	=> 'video_fallback',
	'value'			=> '',
	'dependency'	=> array(
		'element'	=> 'enable_video_bg',
		'value'		=> 'yes'
	),
	'group'			=> esc_html__( 'Video', 'aven' ),
) );

vc_add_param( 'vc_row', array(
	'type'			=> 'dropdown',
	'heading'		=> esc_html__( 'Video Autoplay', 'aven' ),
	'param_name'	=> 'video_autoplay',
	'value'			=> array(
		esc_html__( 'Yes', 'aven' )	=> 'true',
		esc_html__( 'No', 'aven' )	=> 'false',
	),
	'dependency'	=> array(
		'element'	=> 'enable_video_bg',
		'value'		=> 'yes'
	),
	'group'			=> esc_html__( 'Video', 'aven' ),
) );

vc_add_param( 'vc_row', array(
	'type'			=> 'dropdown',
	'heading'		=> esc_html__( 'Video Mute', 'aven' ),
	'param_name'	=> 'video_mute',
	'value'			=> array(
		esc_html__( 'No', 'aven' )	=> 'false',
		esc_html__( 'Yes', 'aven' )	=> 'true',
	),
	'dependency'	=> array(
		'element'	=> 'enable_video_bg',
		'value'		=> 'yes'
	),
	'group'			=> esc_html__( 'Video', 'aven' ),
) );

vc_add_param( 'vc_row', array(
	'type'			=> 'dropdown',
	'heading'		=> esc_html__( 'Video Controls', 'aven' ),
	'param_name'	=> 'video_controls',
	'value'			=> array(
		esc_html__( 'No', 'aven' )	=> 'false',
		esc_html__( 'Yes', 'aven' )	=> 'true',
	),
	'dependency'	=> array(
		'element'	=> 'enable_video_bg',
		'value'		=> 'yes'
	),
	'group'			=> esc_html__( 'Video', 'aven' ),
) );

vc_add_param( 'vc_row', array(
	'type'			=> 'textfield',
	'heading'		=> esc_html__( 'Video Height', 'aven' ),
	'param_name'	=> 'video_height',
	'description'	=> esc_html__( 'Enter Video Height. Ex: 400', 'aven' ),
	'dependency'	=> array(
		'element'	=> 'enable_video_bg',
		'value'		=> 'yes'
	),
	'group'			=> esc_html__( 'Video', 'aven' ),
) );

vc_add_param( 'vc_row', array(
	'type'			=> 'dropdown',
	'heading'		=> esc_html__( 'Typography Style', 'aven' ),
	'param_name'	=> 'typo_style',
	'value'			=> array(
		esc_html__( 'Default', 'aven' )		=> 'default',
		esc_html__( 'Dark Text', 'aven' )	=> 'dark',
		esc_html__( 'White Text', 'aven' )	=> 'light',
	),
) );

vc_add_param( 'vc_row', vc_map_add_css_animation( $label = false ) );

vc_add_param( 'vc_row', array(
	'type'			=> 'textfield',
	'heading'		=> esc_html__( 'Minimum Height', 'aven' ),
	'param_name'	=> 'min_height',
	'description'	=> esc_html__( 'You can enter a minimum height for this row.', 'aven' ),
) );

vc_remove_param( 'vc_row', 'equal_height' );

/* =========================================
*  Row Inner
*  ========================================= */

vc_add_param( 'vc_row_inner', array(
	'type'			=> 'dropdown',
	'heading'		=> esc_html__( 'Column Match Height', 'aven' ),
	'param_name'	=> 'match_height',
	'value'			=> array(
		esc_html__( 'No', 'aven' )	=> 'no',
		esc_html__( 'Yes', 'aven' )	=> 'yes',
	),
	'description'	=> esc_html__( 'Use this option to make all column in equal heights..', 'aven' ),
) );

/* =========================================
*  Columns
*  ========================================= */

vc_add_param( 'vc_column', array(
	'type'			=> 'dropdown',
	'heading'		=> esc_html__( 'Background Style', 'aven' ),
	'param_name'	=> 'bg_style',
	'value'			=> array(
		esc_html__( 'Default', 'aven' )								=> '',
		esc_html__( 'Primary Background Color', 'aven' )			=> 'bg-normal',
		esc_html__( 'Light Background Color', 'aven' )				=> 'light-wrapper',
		esc_html__( 'Grey Background Color', 'aven' )				=> 'grey-wrapper',
		esc_html__( 'Dark Background Color', 'aven' )				=> 'dark-wrapper',
		esc_html__( 'Dark Grey Background Color', 'aven' )			=> 'dark-grey-wrapper',
	),
) );

vc_add_param( 'vc_column', array(
	'type'			=> 'dropdown',
	'heading'		=> esc_html__( 'Typography Style', 'aven' ),
	'param_name'	=> 'typo_style',
	'value'			=> array(
		esc_html__( 'Default', 'aven' )		=> 'default',
		esc_html__( 'Dark Text', 'aven' )	=> 'dark',
		esc_html__( 'White Text', 'aven' )	=> 'light',
	),
) );

vc_add_param( 'vc_column', vc_map_add_css_animation( $label = false) );

/* =========================================
*  Column inner
*  ========================================= */

vc_add_param( 'vc_column_inner', array(
	'type'			=> 'dropdown',
	'heading'		=> esc_html__( 'Background Style', 'aven' ),
	'param_name'	=> 'bg_style',
	'value'			=> array(
		esc_html__( 'Default', 'aven' )								=> '',
		esc_html__( 'Primary Background Color', 'aven' )			=> 'bg-normal',
		esc_html__( 'Light Background Color', 'aven' )				=> 'light-wrapper',
		esc_html__( 'Grey Background Color', 'aven' )				=> 'grey-wrapper',
		esc_html__( 'Dark Background Color', 'aven' )				=> 'dark-wrapper',
		esc_html__( 'Dark Grey Background Color', 'aven' )			=> 'dark-grey-wrapper',
	),
) );

vc_add_param( 'vc_column_inner', array(
	'type'			=> 'dropdown',
	'heading'		=> esc_html__( 'Typography Style', 'aven' ),
	'param_name'	=> 'typo_style',
	'value'			=> array(
		esc_html__( 'Default', 'aven' )		=> 'default',
		esc_html__( 'Dark Text', 'aven' )	=> 'dark',
		esc_html__( 'White Text', 'aven' )	=> 'light',
	),
) );

vc_add_param( 'vc_column_inner', vc_map_add_css_animation( $label = false) );

/* =========================================
*  Accordion
*  ========================================= */

vc_add_param( 'vc_tta_accordion', array(
	'type'			=> 'dropdown',
	'heading'		=> esc_html__( 'Style', 'aven' ),
	'description' 	=> esc_html__( 'Select accordion display style.', 'aven' ),
	'param_name'	=> 'style',
	'value'			=> array(
		esc_html__( 'Default', 'aven' ) 	=> 'default',
		esc_html__( 'Classic', 'aven' ) 	=> 'classic',
		esc_html__( 'Modern', 'aven' ) 		=> 'modern',
		esc_html__( 'Flat', 'aven' ) 		=> 'flat',
		esc_html__( 'Outline', 'aven' ) 	=> 'outline',
	),
) );

/* =========================================
*  Section
*  ========================================= */

vc_remove_param( 'vc_tta_section', 'el_class' );

vc_add_param( 'vc_tta_section', array(
	"type" 			=> "dropdown",
	"heading" 		=> esc_html__( "Icon library", "aven" ),
	"value" 		=> array(
		esc_html__( "Font Awesome", "aven" ) 		=> "fontawesome",
		esc_html__( 'Open Iconic', 'aven' ) 		=> 'openiconic',
		esc_html__( 'Typicons', 'aven' ) 		=> 'typicons',
		esc_html__( 'Entypo', 'aven' ) 			=> 'entypo',
		esc_html__( "Lineicons", "aven" ) 		=> "lineicons",
		esc_html__( "Flaticons", "aven" ) 		=> "flaticons",
	),
	"admin_label" 	=> true,
	"param_name" 	=> "i_type",
	"dependency" 	=> array(
						"element" 	=> "add_icon",
						"value" 	=> "true",
					),
	"description" 	=> esc_html__( "Select icon library.", "aven" ),
) );

vc_add_param( 'vc_tta_section', array(
	"type" 			=> 'iconpicker',
	"heading" 		=> esc_html__( "Icon", "aven" ),
	"param_name" 	=> "i_icon_lineicons",
	"value" 		=> "",
	"settings" 		=> array(
		"emptyIcon" 	=> true,
		"type" 			=> 'simplelineicons',
		"iconsPerPage" 	=> 4000,
	),
	"dependency" 	=> array(
		"element" 	=> "i_type",
		"value" 	=> "lineicons",
	),
	"description" 	=> esc_html__( "Select icon from library.", "aven" ),
) );

vc_add_param( 'vc_tta_section', array(
	"type" 			=> 'iconpicker',
	"heading" 		=> esc_html__( "Icon", "aven" ),
	"param_name" 	=> "i_icon_flaticons",
	"value" 		=> "",
	"settings" 		=> array(
		"emptyIcon" 	=> true,
		"type" 			=> 'flaticons',
		"iconsPerPage" 	=> 4000,
	),
	"dependency" 	=> array(
		"element" 	=> "i_type",
		"value" 	=> "flaticons",
	),
	"description" 	=> esc_html__( "Select icon from library.", "aven" ),
) );

vc_add_param( 'vc_tta_section', array(
	'type' 			=> 'textfield',
	'heading' 		=> esc_html__( 'Extra class name', 'aven' ),
	'param_name' 	=> 'el_class',
	'description' 	=> esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'aven' )
) );

/* =========================================
*  Button
*  ========================================= */

vc_add_param( 'vc_btn', array(
	"type" 			=> "dropdown",
	'heading' 		=> esc_html__( 'Style', 'aven' ),
	'description' 	=> esc_html__( 'Select button display style.', 'aven' ),
	'value' 		=> array(
		esc_html__( 'Default', 'aven' ) 		=> 'default',
		esc_html__( 'Transparent', 'aven' ) 	=> 'transparent',
		esc_html__( 'Modern', 'aven' ) 			=> 'modern',
		esc_html__( 'Classic', 'aven' ) 		=> 'classic',
		esc_html__( 'Flat', 'aven' ) 			=> 'flat',
		esc_html__( 'Outline', 'aven' ) 		=> 'outline',
		esc_html__( '3d', 'aven' ) 				=> '3d',
		esc_html__( 'Custom', 'aven' ) 			=> 'custom',
		esc_html__( 'Outline custom', 'aven' ) 	=> 'outline-custom',
	),
	"param_name" 	=> "style",
) );

vc_add_param( 'vc_btn', array(
	'type' 					=> 'dropdown',
	'heading' 				=> esc_html__( 'Color', 'aven' ),
	'param_name' 			=> 'color',
	'description' 			=> esc_html__( 'Select button color.', 'aven' ),
	// compatible with btn2, need to be converted from btn1
	'param_holder_class' 	=> 'vc_colored-dropdown vc_btn3-colored-dropdown',
	'value' 				=> array(
				// Theme Colors
				esc_html__( 'Theme Color', 'aven' ) 		=> 'primary-bg',
				// Btn1 Colors
				esc_html__( 'Classic Grey', 'aven' ) 		=> 'default',
				esc_html__( 'Classic Blue', 'aven' ) 		=> 'primary',
				esc_html__( 'Classic Turquoise', 'aven' ) 	=> 'info',
				esc_html__( 'Classic Green', 'aven' ) 		=> 'success',
				esc_html__( 'Classic Orange', 'aven' )		=> 'warning',
				esc_html__( 'Classic Red', 'aven' ) 		=> 'danger',
				esc_html__( 'Classic Black', 'aven' ) 		=> "inverse"
			   // + Btn2 Colors (default color set)
		   ) + vc_get_shared( 'colors-dashed' ),
	'std' 					=> 'primary-bg',
	// must have default color grey
	'dependency' => array(
		'element' => 'style',
		'value_not_equal_to' => array( 'custom', 'outline-custom' )
	),
) );

/* =========================================
*  Call To Action
*  ========================================= */

vc_add_param( 'vc_cta', array(
	'type' 			=> 'dropdown',
	'heading' 		=> esc_html__( 'Style', 'aven' ),
	'param_name' 	=> 'style',
	'value' 		=> array(
		esc_html__( 'Default', 'aven' ) 	=> 'default',
		esc_html__( 'Classic', 'aven' ) 	=> 'classic',
		esc_html__( 'Flat', 'aven' ) 		=> 'flat',
		esc_html__( 'Outline', 'aven' ) 	=> 'outline',
		esc_html__( '3d', 'aven' ) 			=> '3d',
		esc_html__( 'Custom', 'aven' ) 		=> 'custom',
	),
	'std' 			=> 'default',
	'description' 	=> esc_html__( 'Select call to action display style.', 'aven' ),
) );

vc_add_param( 'vc_cta', array(
	"type" 			=> "dropdown",
	'heading' 		=> esc_html__( 'Style', 'aven' ),
	'description' 	=> esc_html__( 'Select button display style.', 'aven' ),
	'value' 		=> array(
		esc_html__( 'Default', 'aven' ) 		=> 'default',
		esc_html__( 'Transparent', 'aven' ) 	=> 'transparent',
		esc_html__( 'Modern', 'aven' ) 			=> 'modern',
		esc_html__( 'Classic', 'aven' ) 		=> 'classic',
		esc_html__( 'Flat', 'aven' ) 			=> 'flat',
		esc_html__( 'Outline', 'aven' ) 		=> 'outline',
		esc_html__( '3d', 'aven' ) 				=> '3d',
		esc_html__( 'Custom', 'aven' ) 			=> 'custom',
		esc_html__( 'Outline custom', 'aven' ) 	=> 'outline-custom',
	),
	'dependency' 			=> array(
		'element' 		=> 'add_button',
		'not_empty' 	=> true,
	),
	"integrated_shortcode" 			=> "vc_btn",
	"integrated_shortcode_field" 	=> "btn_",
	"param_name" 					=> "btn_style",
	"group"							=> esc_html__( 'Button', 'aven' ),
) );

vc_add_param( 'vc_cta', array(
	'type' 					=> 'dropdown',
	'heading' 				=> esc_html__( 'Color', 'aven' ),
	'param_name' 			=> 'btn_color',
	'description' 			=> esc_html__( 'Select button color.', 'aven' ),
	// compatible with btn2, need to be converted from btn1
	'param_holder_class' 	=> 'vc_colored-dropdown vc_btn3-colored-dropdown',
	'value' 				=> array(
				// Theme Colors
				esc_html__( 'Theme Color', 'aven' ) 		=> 'primary-bg',
				// Btn1 Colors
				esc_html__( 'Classic Grey', 'aven' ) 		=> 'default',
				esc_html__( 'Classic Blue', 'aven' ) 		=> 'primary',
				esc_html__( 'Classic Turquoise', 'aven' ) 	=> 'info',
				esc_html__( 'Classic Green', 'aven' ) 		=> 'success',
				esc_html__( 'Classic Orange', 'aven' )		=> 'warning',
				esc_html__( 'Classic Red', 'aven' ) 		=> 'danger',
				esc_html__( 'Classic Black', 'aven' ) 		=> "inverse"
			   // + Btn2 Colors (default color set)
		   ) + vc_get_shared( 'colors-dashed' ),
	'std' 							=> 'primary-bg',
	"group"							=> esc_html__( 'Button', 'aven' ),
	"integrated_shortcode" 			=> "vc_btn",
	"integrated_shortcode_field" 	=> "btn_",
	// must have default color grey
	'dependency' 			=> array(
		'element' 				=> 'btn_style',
		'value_not_equal_to' 	=> array( 'custom', 'outline-custom' )
	),
) );

vc_add_param( 'vc_cta', array(
	"type" 			=> "dropdown",
	'heading' 		=> esc_html__( 'Icon color', 'aven' ),
	'description' 	=> esc_html__( 'Select icon color.', 'aven' ),
	'value' 		=> array_merge( vc_get_shared( 'colors' ), array( esc_html__( 'Theme Color', 'aven' ) => 'primary-bg' ), array( esc_html__( 'Custom color', 'aven' ) => 'custom' ) ),
	'dependency' 			=> array(
		'element' 		=> 'add_icon',
		'not_empty' 	=> true,
	),
	"integrated_shortcode" 			=> "vc_icon",
	"integrated_shortcode_field" 	=> "i_",
	"param_name" 					=> "i_color",
	'param_holder_class' 			=> 'vc_colored-dropdown',
	"group"							=> esc_html__( 'Icon', 'aven' ),
) );

vc_add_param( 'vc_cta', array(
	"type" 			=> "dropdown",
	'heading' 		=> esc_html__( 'Background color', 'aven' ),
	'description' 	=> esc_html__( 'Select background color for icon.', 'aven' ),
	'value' 		=> array_merge( vc_get_shared( 'colors' ), array( esc_html__( 'Theme Color', 'aven' ) => 'primary-bg' ), array( esc_html__( 'Custom color', 'aven' ) => 'custom' ) ),
	'dependency' 		=> array(
		'element' 		=> 'i_background_style',
		'not_empty' 	=> true,
	),
	"integrated_shortcode" 			=> "vc_icon",
	"integrated_shortcode_field" 	=> "i_",
	"param_name" 					=> "i_background_color",
	'param_holder_class' 			=> 'vc_colored-dropdown',
	"group"							=> esc_html__( 'Icon', 'aven' ),
) );

/* =========================================
*  Progress Bar
*  ========================================= */

vc_add_param( 'vc_progress_bar', array(
	'type' 			=> 'dropdown',
	'heading' 		=> esc_html__( 'Color', 'aven' ),
	'param_name' 	=> 'bgcolor',
	'value' 		=> array(
		esc_html__( 'Default', 'aven' ) 	=> 'bar_default',
		esc_html__( 'Default White', 'aven' ) 	=> 'bar_default_white',
		esc_html__( 'Grey', 'aven' ) 		=> 'bar_grey',
		esc_html__( 'Blue', 'aven' ) 		=> 'bar_blue',
		esc_html__( 'Turquoise', 'aven' ) 	=> 'bar_turquoise',
		esc_html__( 'Green', 'aven' ) 		=> 'bar_green',
		esc_html__( 'Orange', 'aven' ) 		=> 'bar_orange',
		esc_html__( 'Red', 'aven' ) 		=> 'bar_red',
		esc_html__( 'Black', 'aven' ) 		=> 'bar_black',
		esc_html__( 'Custom Color', 'aven' ) 	=> 'custom'
	),
	'admin_label' 	=> true,
	'description' 	=> esc_html__( 'Select bar background color.', 'aven' ),
) );

vc_add_param( 'vc_progress_bar', array(
	'type' 			=> 'dropdown',
	'heading' 		=> esc_html__( 'Style', 'aven' ),
	'param_name' 	=> 'bar_style',
	'value' 		=> array(
		esc_html__( 'Default', 'aven' ) 		=> 'default',
		esc_html__( 'Tooltip', 'aven' ) 		=> 'tooltip',
	),
	'description' 	=> esc_html__( 'Select bar style.', 'aven' ),
) );

vc_add_param( 'vc_progress_bar', array(
	'type' 			=> 'textfield',
	'heading' 		=> esc_html__( 'Bar Height', 'aven' ),
	'param_name' 	=> 'bar_height',
	'description' 	=> esc_html__( 'Enter bar height. Ex: 20px', 'aven' )
) );

/* =========================================
*  Testimonial Categories
*  ========================================= */
if( ZOZO_TESTIMONIAL_ACTIVE ) {

	$testimonial_args = array(
		'orderby'                  => 'name',
		'hide_empty'               => 0,
		'hierarchical'             => 1,
		'taxonomy'                 => 'testimonial_categories'
	);
	
	$testimonial_lists = get_categories( $testimonial_args );
	$testimonials_cats = array( 'Show all categories' => 'all' );
	
	foreach( $testimonial_lists as $cat ){
		$testimonials_cats[$cat->name] = $cat->slug;
	}
	
	vc_add_param( 'zozo_vc_testimonials_slider', array(
		'type'			=> 'dropdown',
		'admin_label' 	=> true,
		'heading'		=> esc_html__( 'Choose Testimonial Categories', 'aven' ),
		'param_name'	=> 'categories_id',
		'value' 		=> $testimonials_cats		
	) );
	
	vc_add_param( 'zozo_vc_testimonials_grid', array(
		'type'			=> 'dropdown',
		'admin_label' 	=> true,
		'heading'		=> esc_html__( 'Choose Testimonial Categories', 'aven' ),
		'param_name'	=> 'categories_id',
		'value' 		=> $testimonials_cats		
	) );
	
}

/* =========================================
*  Team Categories
*  ========================================= */
if( ZOZO_TEAM_ACTIVE ) {

	$team_args = array(
		'orderby'                  => 'name',
		'hide_empty'               => 0,
		'hierarchical'             => 1,
		'taxonomy'                 => 'team_categories'
	);
	
	$team_lists = get_categories( $team_args );
	$team_cats = array( 'Show all categories' => 'all' );
	
	foreach( $team_lists as $cat ){
		$team_cats[$cat->name] = $cat->slug;
	}
	
	vc_add_param( 'zozo_vc_team_grid', array(
		'type'			=> 'dropdown',
		'admin_label' 	=> true,
		'heading'		=> esc_html__( 'Choose Team Categories', 'aven' ),
		'param_name'	=> 'categories_id',
		'value' 		=> $team_cats		
	) );
	
	vc_add_param( 'zozo_vc_team_slider', array(
		'type'			=> 'dropdown',
		'admin_label' 	=> true,
		'heading'		=> esc_html__( 'Choose Team Categories', 'aven' ),
		'param_name'	=> 'categories_id',
		'value' 		=> $team_cats		
	) );
	
	vc_add_param( 'zozo_vc_team_list', array(
		'type'			=> 'dropdown',
		'admin_label' 	=> true,
		'heading'		=> esc_html__( 'Choose Team Categories', 'aven' ),
		'param_name'	=> 'categories_id',
		'value' 		=> $team_cats		
	) );
	
}

/* =========================================
*  Woocommerce Product Categories
*  ========================================= */
if( ZOZO_WOOCOMMERCE_ACTIVE ) {

	$woo_args = array(
		'orderby'                  => 'name',
		'hide_empty'               => 0,
		'hierarchical'             => 1,
		'taxonomy'                 => 'product_cat'
	);
	
	$woo_lists = get_categories( $woo_args );
	$woo_cats = array( 'Show all categories' => 'all' );
	
	foreach( $woo_lists as $cat ){
		$woo_cats[$cat->name] = $cat->slug;
	}
	
	vc_add_param( 'zozo_vc_woo_product_slider', array(
		'type'			=> 'dropdown',
		'admin_label' 	=> true,
		'heading'		=> esc_html__( 'Choose Product Categories', 'aven' ),
		'param_name'	=> 'categories_id',
		'value' 		=> $woo_cats		
	) );
	
}