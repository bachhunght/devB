<?php 
/**
 * List Item shortcode
 */

if ( ! function_exists( 'aven_zozo_vc_list_item_shortcode' ) ) {
	function aven_zozo_vc_list_item_shortcode( $atts, $content = NULL ) {
		
		$atts = vc_map_get_attributes( 'zozo_vc_list_item', $atts );
		extract( $atts );

		$output = '';
		$extra_class = '';

		// Icon style		
		$icon_style = '';
		if( $icon_color ) {
			$icon_style .= 'color:'. $icon_color .';';
		}
		if( $icon_size ) {
			$icon_style .= 'font-size:'. $icon_size .';';
		}		
		if( $icon_style ) {
			$icon_style = ' style="'. $icon_style  .'"';
		}		
		
		if( $type == 'fontawesome' && function_exists( 'vc_icon_element_fonts_enqueue' ) ) vc_icon_element_fonts_enqueue( 'fontawesome' );	
		
		// Content						
		if( isset( $content ) && $content != '' ) {
			$content_style = '';
			if ( $content_size ) {
				$content_style .= 'font-size:'. $content_size.';';
			}
			if ( $content_color ) {
				$content_style .= 'color:'. $content_color.';';
			}
			if( isset( $icon_align ) && ( $icon_align == "default" || $icon_align == "left" ) ) {
				if ( $icon_spacing ) {
					$content_style .= 'margin-left:'. $icon_spacing.';';
				}
			} else if( isset( $icon_align ) && $icon_align == 'right' ) {
				if ( $icon_spacing ) {
					$content_style .= 'margin-right:'. $icon_spacing.';';
				}
			}
			if ( $content_style ) {
				$content_style = ' style="'. $content_style .'"';
			}
			
		}
		
		// Classes
		$main_classes = 'zozo-features-list-wrapper vc-features-list';
		
		if( isset( $classes ) && $classes != '' ) {
			$main_classes .= ' ' . $classes;
		}
		$main_classes .= aven_zozo_vc_animation( $css_animation );
		
		$output .= '<div class="'. esc_attr( $main_classes ) .'">';
			$output .= '<div class="features-list">';
				
				$output .= '<div class="features-list-inner list-text-'.$icon_align.'">';
					// Icon
					$output .= '<div class="features-icon'.$extra_class.'">';
						if( isset( ${'icon_'. $type} ) && ${'icon_'. $type} != '' ) {								
							$output .= '<i class="'. esc_attr( ${'icon_'. $type} ) .' list-icon"'.$icon_style.'></i>';
						}
					$output .= '</div>';
					
					// Content						
					if( isset( $content ) && $content != '' ) {
						$output .= '<div class="list-desc"'. $content_style .'>';
							$output .= wpb_js_remove_wpautop( $content, true );
						$output .= '</div>';
					}				
				$output .= '</div>';
	
			$output .= '</div>';
		$output .= '</div>';
		
		return $output;
	}
}

if ( ! function_exists( 'aven_zozo_vc_list_item_shortcode_map' ) ) {
	function aven_zozo_vc_list_item_shortcode_map() {
		
		vc_map( 
			array(
				"name"					=> esc_html__( "List Item", "aven" ),
				"description"			=> esc_html__( "List your items with Icons.", 'aven' ),
				"base"					=> "zozo_vc_list_item",
				"category"				=> esc_html__( "Theme Addons", "aven" ),
				"icon"					=> "zozo-vc-icon",
				"params"				=> array(					
					array(
						'type'			=> 'textfield',
						'admin_label' 	=> true,
						'heading'		=> esc_html__( 'Extra Class', "aven" ),
						'param_name'	=> 'classes',
						'value' 		=> '',
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "CSS Animation", "aven" ),
						"param_name"	=> "css_animation",
						"value"			=> array(
							esc_html__( "No", "aven" )					=> '',
							esc_html__( "Top to bottom", "aven" )			=> "top-to-bottom",
							esc_html__( "Bottom to top", "aven" )			=> "bottom-to-top",
							esc_html__( "Left to right", "aven" )			=> "left-to-right",
							esc_html__( "Right to left", "aven" )			=> "right-to-left",
							esc_html__( "Appear from center", "aven" )	=> "appear" ),
					),
					array(
						"type"			=> "textarea_html",
						"holder"		=> "div",
						"heading"		=> esc_html__( "Content", "aven" ),
						"param_name"	=> "content",
						"value"			=> esc_html__( 'I am text block. Please change this dummy text in your page editor for this list item section.', "aven" ),						
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Content Font Size", "aven" ),
						"description" 	=> esc_html__( "Enter Font Size in px. Ex: 20px", "aven" ),
						"param_name"	=> "content_size",						
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Content Text Color", "aven" ),
						"param_name"	=> "content_color",						
					),
					// Icon
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Alignment", "aven" ),
						"param_name"	=> "icon_align",
						"value"			=> array(
							esc_html__( "Default", "aven" )	=> "default",
							esc_html__( "Left", "aven" )		=> "left",
							esc_html__( "Right", "aven" )		=> "right",
						),
						"group"			=> esc_html__( "Icon", "aven" ),
					),
					array(
						"type" 			=> "dropdown",
						"heading" 		=> esc_html__( "Choose from Icon library", "aven" ),
						"value" 		=> array(
							esc_html__( "Font Awesome", "aven" ) 		=> "fontawesome",
							esc_html__( "Lineicons", "aven" ) 		=> "lineicons",
							esc_html__( "Flaticons", "aven" ) 		=> "flaticons",
						),
						"admin_label" 	=> true,
						"param_name" 	=> "type",
						"description" 	=> esc_html__( "Select icon library.", "aven" ),
						"group"			=> esc_html__( "Icon", "aven" ),
					),					
					array(
						"type" 			=> 'iconpicker',
						"heading" 		=> esc_html__( "Icon", "aven" ),
						"param_name" 	=> "icon_fontawesome",
						"settings" 		=> array(
							"emptyIcon" 	=> false,
							"type" 			=> "fontawesome",
							"iconsPerPage" 	=> 200,
						),
						"dependency" 	=> array(
							"element" 	=> "type",
							"value" 	=> "fontawesome",
						),
						"description" 	=> esc_html__( "Select icon from library.", "aven" ),
						"group"			=> esc_html__( "Icon", "aven" ),
					),				
					array(
						"type" 			=> 'iconpicker',
						"heading" 		=> esc_html__( "Icon", "aven" ),
						"param_name" 	=> "icon_lineicons",
						"value" 		=> "",
						"settings" 		=> array(
							"emptyIcon" 	=> true,
							"type" 			=> 'simplelineicons',
							"iconsPerPage" 	=> 200,
						),
						"dependency" 	=> array(
							"element" 	=> "type",
							"value" 	=> "lineicons",
						),
						"description" 	=> esc_html__( "Select icon from library.", "aven" ),
						"group"			=> esc_html__( "Icon", "aven" ),
					),
					array(
						"type" 			=> 'iconpicker',
						"heading" 		=> esc_html__( "Icon", "aven" ),
						"param_name" 	=> "icon_flaticons",
						"value" 		=> "",
						"settings" 		=> array(
							"emptyIcon" 	=> true,
							"type" 			=> 'flaticons',
							"iconsPerPage" 	=> 200,
						),
						"dependency" 	=> array(
							"element" 	=> "type",
							"value" 	=> "flaticons",
						),
						"description" 	=> esc_html__( "Select icon from library.", "aven" ),
						"group"			=> esc_html__( "Icon", "aven" ),
					),
					array(
						"type"			=> 'colorpicker',
						"heading"		=> esc_html__( "Icon Color", "aven" ),
						"param_name"	=> "icon_color",
						"group"			=> esc_html__( "Icon", "aven" ),
					),		
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Icon Font Size", "aven" ),
						"param_name"	=> "icon_size",
						"description" 	=> esc_html__( "Enter Icon Size in px. Ex: 15px", "aven" ),
						"group"			=> esc_html__( "Icon", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Icon Spacing", "aven" ),
						"param_name"	=> "icon_spacing",
						"description" 	=> esc_html__( "Enter Icon Right Spacing in px. Ex: 30px", "aven" ),
						"group"			=> esc_html__( "Icon", "aven" ),			
					),
				)
			) 
		);
	}
}
add_action( 'vc_before_init', 'aven_zozo_vc_list_item_shortcode_map' );