<?php 
/**
 * Content Carousel Slider shortcode
 */

if ( ! function_exists( 'aven_zozo_vc_content_carousel_shortcode' ) ) {
	function aven_zozo_vc_content_carousel_shortcode( $atts, $content = NULL ) {
	
		$atts = vc_map_get_attributes( 'zozo_vc_content_carousel', $atts );
		extract( $atts );

		$output = '';
		static $carousel_id = 1;
		
		// Slider Configuration
		$data_attr = '';
		
		if( isset( $items ) && $items != '' ) {
			$data_attr .= ' data-items="' . $items . '" ';
		}
		
		if( isset( $items_scroll ) && $items_scroll != '' ) {
			$data_attr .= ' data-slideby="' . $items_scroll . '" ';
		}
		
		if( isset( $items_tablet ) && $items_tablet != '' ) {
			$data_attr .= ' data-items-tablet="' . $items_tablet . '" ';
		}
		
		if( isset( $items_mobile_landscape ) && $items_mobile_landscape != '' ) {
			$data_attr .= ' data-items-mobile-landscape="' . $items_mobile_landscape . '" ';
		}
		
		if( isset( $items_mobile_portrait ) && $items_mobile_portrait != '' ) {
			$data_attr .= ' data-items-mobile-portrait="' . $items_mobile_portrait . '" ';
		}
		
		if( isset( $margin ) && $margin != '' ) {
			$data_attr .= ' data-margin="' . $margin . '" ';
		}
		
		if( isset( $auto_play ) && $auto_play != '' ) {
			$data_attr .= ' data-autoplay="' . $auto_play . '" ';
		}
		if( isset( $timeout_duration ) && $timeout_duration != '' ) {
			$data_attr .= ' data-autoplay-timeout="' . $timeout_duration . '" ';
		}
		
		if( isset( $infinite_loop ) && $infinite_loop != '' ) {
			$data_attr .= ' data-loop="' . $infinite_loop . '" ';
		}
		
		if( isset( $pagination ) && $pagination != '' ) {
			$data_attr .= ' data-pagination="' . $pagination . '" ';
		}
		if( isset( $navigation ) && $navigation != '' ) {
			$data_attr .= ' data-navigation="' . $navigation . '" ';
		}
		
		// Classes
		$main_classes = '';
		$main_classes .= aven_zozo_vc_animation( $css_animation );		
		
		$output = '<div class="zozo-content-carousel-wrapper'.$main_classes.'">';
		$output .= '<div id="zozo-content-carousel'.$carousel_id.'" class="zozo-owl-carousel owl-carousel content-carousel-slider"'.$data_attr.'>';
			$output .= do_shortcode( wpb_js_remove_wpautop( $content ) );
		$output .= '</div>';
		$output .= '</div>';
		
		$carousel_id++;
		
		return $output;
	}
}

if ( ! function_exists( 'aven_zozo_vc_content_carousel_shortcode_map' ) ) {
	function aven_zozo_vc_content_carousel_shortcode_map() {
		
		vc_map( 
			array(
				"name"					=> esc_html__( "Content Carousel", "aven" ),
				"description"			=> esc_html__( "Show your contents in carousel slider.", 'aven' ),
				"base"					=> "zozo_vc_content_carousel",
				"as_parent" 			=> array( 'only' => 'vc_row' ),
				"js_view" 				=> 'VcColumnView',
				"category"				=> esc_html__( "Theme Addons", "aven" ),
				"icon"					=> "zozo-vc-icon",
				"params"				=> array(
					array(
						'type'			=> 'textfield',
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
					// Slider
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items to Display", "aven" ),
						"param_name"	=> "items",
						'admin_label'	=> true,
						"group"			=> esc_html__( "Slider", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items to Scrollby", "aven" ),
						"param_name"	=> "items_scroll",
						"group"			=> esc_html__( "Slider", "aven" ),
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__( "Auto Play", 'aven' ),
						'param_name'	=> "auto_play",
						'admin_label'	=> true,
						'value'			=> array(
							esc_html__( 'True', 'aven' )	=> 'true',
							esc_html__( 'False', 'aven' )	=> 'false',
						),
						"group"			=> esc_html__( "Slider", "aven" ),
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__( 'Timeout Duration (in milliseconds)', 'aven' ),
						'param_name'	=> "timeout_duration",
						'value'			=> "5000",
						'dependency'	=> array(
							'element'	=> "auto_play",
							'value'		=> 'true'
						),
						"group"			=> esc_html__( "Slider", "aven" ),
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__( "Infinite Loop", 'aven' ),
						'param_name'	=> "infinite_loop",
						'value'			=> array(
							esc_html__( 'False', 'aven' )	=> 'false',
							esc_html__( 'True', 'aven' )	=> 'true',
						),
						"group"			=> esc_html__( "Slider", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Margin ( Items Spacing )", "aven" ),
						"param_name"	=> "margin",
						'admin_label'	=> true,
						"group"			=> esc_html__( "Slider", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items To Display in Tablet", "aven" ),
						"param_name"	=> "items_tablet",
						"group"			=> esc_html__( "Slider", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items To Display In Mobile Landscape", "aven" ),
						"param_name"	=> "items_mobile_landscape",
						"group"			=> esc_html__( "Slider", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Items To Display In Mobile Portrait", "aven" ),
						"param_name"	=> "items_mobile_portrait",
						"group"			=> esc_html__( "Slider", "aven" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Navigation", "aven" ),
						"param_name"	=> "navigation",
						"value"			=> array(
							esc_html__( "Yes", "aven" )	=> "true",
							esc_html__( "No", "aven" )	=> "false" ),
						"group"			=> esc_html__( "Slider", "aven" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Pagination", "aven" ),
						"param_name"	=> "pagination",
						"value"			=> array(
							esc_html__( "Yes", "aven" )	=> "true",
							esc_html__( "No", "aven" )	=> "false" ),
						"group"			=> esc_html__( "Slider", "aven" ),
					),
				),
				'default_content' => '[vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner]',
			) 
		);
	}
}
add_action( 'vc_before_init', 'aven_zozo_vc_content_carousel_shortcode_map' );

/**
 * We need to define this so that VC will show our nesting container correctly
 */
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Zozo_Vc_Content_Carousel extends WPBakeryShortCodesContainer {
    }
}