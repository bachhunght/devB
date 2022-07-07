<?php
/**
 * Google Map shortcode
 */

if ( ! function_exists( 'aven_zozo_vc_google_map_shortcode' ) ) {
	function aven_zozo_vc_google_map_shortcode( $atts, $content = NULL ) {		
		
		$atts = vc_map_get_attributes( 'zozo_vc_google_map', $atts );
		extract( $atts );

		$output = '';
		
		// Classes
		$main_classes = '';
		if( isset( $classes ) && $classes != '' ) {
			$main_classes .= ' ' . $classes;
		}
		$main_classes .= aven_zozo_vc_animation( $css_animation );
		
		$addresses = explode('|', $address);
		
		if( $map_overlay == "true" && $hue_color == '' ) {
			if( aven_zozo_get_theme_option( 'zozo_custom_scheme_color' ) != '' ) {
				$hue_color = aven_zozo_get_theme_option( 'zozo_custom_scheme_color' );
			} else {
				$hue_color = "#0099cc";
			}
		}
		
		if( isset( $saturation ) && $saturation == '' ) {
			$saturation = "80";
		}
		
		if( isset( $lightness ) && $lightness == '' ) {
			$lightness = "-10";
		}
		
		$data_attr = '';
		$data_attr = ' data-type="'. $map_type .'"';
		$data_attr .= ' data-zoom="'. $zoom .'"';
		$data_attr .= ' data-scrollwheel="'. $scroll_wheel .'"';
		$data_attr .= ' data-zoomcontrol="'. $zoom_control .'"';
		if( $map_overlay == "true" ) {
			$data_attr .= ' data-hue="'. $hue_color .'"';
		}
		if( isset( $marker_image ) && $marker_image == '' ) {
			$new_marker_image = ZOZOTHEME_URL . '/images/map-marker.png';
		} else if( isset( $marker_image ) && $marker_image != '' ) {
			$marker_image_id = preg_replace( '/[^\d]/', '', $marker_image );
			$new_marker_image_src = wp_get_attachment_image_src( $marker_image_id, 'full' );
			if ( ! empty( $new_marker_image_src[0] ) ) {
				$new_marker_image = $new_marker_image_src[0];
			}
		}
		$data_attr .= ' data-marker="'. $new_marker_image .'"';
		$data_attr .= ' data-saturation="'. $saturation .'"';
		$data_attr .= ' data-lightness="'. $lightness .'"';
		$data_attr .= ' data-address="'. $addresses[0] .'"';
		$data_attr .= ' data-addresses="'. $address .'"';
		$data_attr .= ' data-title="'. $title .'"';
		$data_attr .= ' data-content="' . str_replace( '"', "'", $info_content ) .'"';
		
		if( isset( $map_width ) && $map_width != '' ) {
			$map_styles = ' style="width: '.$map_width.'; ';
			if( isset( $map_height ) && $map_height != '' ) {
				$map_styles .= 'height: '.$map_height.';"';
			} else {
				$map_styles .= '"';
			}
		}
		
		wp_enqueue_script( 'aven-zozo-gmaps-js' );
		
		$output .= '<div class="gmap-wrapper">';
			$output .= '<div class="gmap_canvas"'. $data_attr .''.$map_styles.'>';
			$output .= '</div>';
		$output .= '</div>';
		
		return $output;
	}
}

if ( ! function_exists( 'aven_zozo_vc_google_map_shortcode_map' ) ) {
	function aven_zozo_vc_google_map_shortcode_map() {
	
		vc_map( 
			array(
				"name"					=> esc_html__( "Google Map", "aven" ),
				"description"			=> esc_html__( "Google Map with different options and styles.", 'aven' ),
				"base"					=> "zozo_vc_google_map",
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
						'admin_label' 	=> true,
						"heading"		=> esc_html__( "Map Type", "aven" ),
						"param_name"	=> "map_type",
						"value"			=> array(
							esc_html__( "Roadmap", "aven" )		=> "roadmap",
							esc_html__( "Satellite", "aven" )		=> "satellite",
							esc_html__( "Hybrid", "aven" )		=> "hybrid",
							esc_html__( "Terrain", "aven" )		=> "terrain" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Map Width", "aven" ),
						"param_name"	=> "map_width",
						"value"			=> "100%",
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Map Height", "aven" ),
						"param_name"	=> "map_height",
						"value"			=> "376px",
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Zoom Level", "aven" ),
						"param_name"	=> "zoom",
						'admin_label' 	=> true,
						"value"			=> "12",
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Map Scrollwheel", "aven" ),
						"param_name"	=> "scroll_wheel",
						"value"			=> array(
							esc_html__( "Yes", "aven" )	=> "true",
							esc_html__( "No", "aven" )	=> "false",
						),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Map Zoom Control", "aven" ),
						"param_name"	=> "zoom_control",
						"value"			=> array(
							esc_html__( "Yes", "aven" )	=> "true",
							esc_html__( "No", "aven" )	=> "false",
						),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Map Overlay", "aven" ),
						"param_name"	=> "map_overlay",
						"value"			=> array(
							esc_html__( "Yes", "aven" )	=> "true",
							esc_html__( "No", "aven" )	=> "false",
						),
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Map Overlay Color", "aven" ),
						"param_name"	=> "hue_color",
						"value"			=> "",				
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Saturation", "aven" ),
						"param_name"	=> "saturation",
						"description" 	=> esc_html__( "Saturation level 0 to 100", "aven" ),
						"value"			=> "",
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Lightness", "aven" ),
						"param_name"	=> "lightness",
						"description" 	=> esc_html__( "Lightness level 0 to 100", "aven" ),
						"value"			=> "",
					),
					array(
						"type"			=> "attach_image",
						"heading"		=> esc_html__( "Marker Image", "aven" ),
						"param_name"	=> "marker_image",
						"value"			=> "",
					),
					array(
						"type"			=> "textarea",
						"heading"		=> esc_html__( "Latitude/ Longtitude", "aven" ),
						"param_name"	=> "address",
						'admin_label' 	=> true,
						"description" 	=> sprintf( esc_html__( "Add latitude/longtitude to show marker on map. To show multiple marker locations on map, to separate latitude/longtitude by using | symbol. %s Ex: -33.867139, 151.207114|-4.325, 15.322222", "aven" ), '<br />' ),
						"value"			=> "-33.867139, 151.207114",
					),
					// Content
					array(
						"type"			=> "exploded_textarea",
						"heading"		=> esc_html__( "Title", "aven" ),
						"param_name"	=> "title",
						"value" 		=> 'Title for First Marker,Title for Second Marker',
						"description" 	=> esc_html__( "Enter title for each marker position here. Divide titles with linebreaks (Enter).", "aven" ),
						"group"			=> esc_html__( "Content", "aven" ),
					),
					array(
						"type"			=> 'textarea',
						"heading"		=> esc_html__( "Content", "aven" ),
						"param_name"	=> "info_content",
						"value" 		=> 'Content for First Marker|Content for Second Marker',
						"description" 	=> esc_html__( "Enter content for each marker position here. Divide content with | and divide new line with ,", "aven" ),
						"group"			=> esc_html__( "Content", "aven" ),
					),
				)
			) 
		);
	}
}
add_action( 'vc_before_init', 'aven_zozo_vc_google_map_shortcode_map' );