<?php 
/**
 * Service Box shortcode
 */

if ( ! function_exists( 'aven_zozo_vc_service_box_shortcode' ) ) {
	function aven_zozo_vc_service_box_shortcode( $atts, $content = NULL ) {
	
		$atts = vc_map_get_attributes( 'zozo_vc_service_box', $atts );
		extract( $atts );

		$output = '';
		$extra_class = '';
		
		$icon_styles = '';
		if( $icon_color ) {
			$icon_styles = ' style="color:'. $icon_color .';"';
		}
		
		$title_styles = '';
		if( $title_color ) {
			$title_styles = ' style="color:'. $title_color .';"';
		}
		
		$ribbon_styles = '';
		if( $ribbon_font_color ) {
			$ribbon_styles = ' style="color:'. $ribbon_font_color .';"';
		}
		
		$content_styles = '';
		if( $content_color ) {
			$content_styles = ' style="color:'. $content_color .';"';
		}
		
		if( $type == 'fontawesome' && function_exists( 'vc_icon_element_fonts_enqueue' ) ) vc_icon_element_fonts_enqueue( 'fontawesome' );	
		
		// Classes
		$main_classes = 'zozo-vc-service-box';
		
		if( isset( $classes ) && $classes != '' ) {
			$main_classes .= ' ' . $classes;
		}
		if( isset( $alignment ) && $alignment != '' ) {
			$main_classes .= ' text-' . $alignment;
		}
		if( isset( $box_style ) && $box_style != '' ) {		
			$main_classes .= ' service-box-'. $box_style;
		}
		$main_classes .= aven_zozo_vc_animation( $css_animation );
		
		$output .= '<div class="'. esc_attr( $main_classes ) .'">';	
			$output .= '<div class="service-box-inner">';
				if( isset( $ribbon_text ) && $ribbon_text != '' ) {
					$output .= '<div class="service-ribbon-text"'.$ribbon_styles.'>'. $ribbon_text .'</div>';
				}
				$output .= '<div class="service-box-content">';
					// Icon
					if( isset( ${'icon_'. $type} ) && ${'icon_'. $type} != '' ) {
						$output .= '<i class="'. esc_attr( ${'icon_'. $type} ) .' service-icon"'.$icon_styles.'></i>';
					}
				$output .= '</div>';
			$output .= '</div>';
			// Title
			if( isset( $title ) && $title != '' ) {
				// Title URL
				$title_link = $link_title = $link_target = '';
				if( $title_url && $title_url != '' ) {
					$link = vc_build_link( $title_url );
					$title_link = isset( $link['url'] ) ? $link['url'] : '';
					$link_title = isset( $link['title'] ) ? $link['title'] : '';
					$link_target = isset( $link['target'] ) ? $link['target'] : '';
				}
				if( isset( $title_link ) && $title_link != '' ) {
					$output .= '<a href="'. esc_url( $title_link ) .'" title="'. esc_attr( $link_title ) .'" target="'. esc_attr( $link_target ) .'">';
				}
				$output .= '<h5 class="service-title"'.$title_styles.'>'. $title .'</h5>';
				if( isset( $title_link ) && $title_link != '' ) {
					$output .= '</a>';
				}
			}
			// Content
			$output .= '<div class="service-desc"'. $content_styles .'>';
				$output .= apply_filters( 'the_content', $content );
			$output .= '</div>';
		$output .= '</div>';
		
		return $output;
	}
}

if ( ! function_exists( 'aven_zozo_vc_service_box_shortcode_map' ) ) {
	function aven_zozo_vc_service_box_shortcode_map() {
		
		vc_map( 
			array(
				"name"					=> esc_html__( "Service Box", "aven" ),
				"description"			=> esc_html__( "List your services with different style.", 'aven' ),
				"base"					=> "zozo_vc_service_box",
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
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Alignment", "aven" ),
						"param_name"	=> "alignment",
						"value"			=> array(
							esc_html__( "Default", "aven" )	=> "center",
							esc_html__( "Center", "aven" )	=> "center",
							esc_html__( "Left", "aven" )		=> "left",
							esc_html__( "Right", "aven" )		=> "right",
						),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Services Box Style", "aven" ),
						"param_name"	=> "box_style",
						"value"			=> array(
							esc_html__( "Default", "aven" )	=> "circle",
							esc_html__( "Circle", "aven" )	=> "circle",
							esc_html__( "Rounded", "aven" )	=> "rounded",
							esc_html__( "Square", "aven" )	=> "square",
						),
					),
					array(
						"type" 			=> "dropdown",
						"heading" 		=> esc_html__( "Choose from Icon library", "aven" ),
						"value" 		=> array(
							esc_html__( "None", "aven" ) 				=> "",
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
					// Content
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Ribbon Text", "aven" ),
						"param_name"	=> "ribbon_text",
						"value"			=> "",
						"group"			=> esc_html__( "Content", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Heading", "aven" ),
						"param_name"	=> "title",
						"value"			=> "Sample Heading",
						"group"			=> esc_html__( "Content", "aven" ),
					),
					array(
						"type"			=> "vc_link",
						"heading"		=> esc_html__( "Heading URL", "aven" ),
						"param_name"	=> "title_url",
						"value"			=> "",
						"group"			=> esc_html__( "Content", "aven" ),
					),
					array(
						"type"			=> "textarea_html",
						"holder"		=> "div",
						"heading"		=> esc_html__( "Content", "aven" ),
						"param_name"	=> "content",
						"value"			=> esc_html__( 'I am text block. Please change this dummy text in your page editor for this service box.', "aven" ),
						"group"			=> esc_html__( "Content", "aven" ),
					),
					// Stylings
					array(
						"type"			=> 'colorpicker',
						"heading"		=> esc_html__( "Icon Color", "aven" ),
						"param_name"	=> "icon_color",
						"group"			=> esc_html__( "Stylings", "aven" ),
					),		
					array(
						"type"			=> 'colorpicker',
						"heading"		=> esc_html__( "Title Color", "aven" ),
						"param_name"	=> "title_color",
						"group"			=> esc_html__( "Stylings", "aven" ),			
					),
					array(
						"type"			=> 'colorpicker',
						"heading"		=> esc_html__( "Ribbon Font Color", "aven" ),
						"param_name"	=> "ribbon_font_color",
						"group"			=> esc_html__( "Stylings", "aven" ),			
					),
					array(
						"type"			=> 'colorpicker',
						"heading"		=> esc_html__( "Content Color", "aven" ),
						"param_name"	=> "content_color",
						"group"			=> esc_html__( "Stylings", "aven" ),			
					),
				)
			) 
		);
	}
}
add_action( 'vc_before_init', 'aven_zozo_vc_service_box_shortcode_map' );