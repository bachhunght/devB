<?php 
/**
 * Section Title shortcode
 */

if ( ! function_exists( 'aven_zozo_vc_section_title_shortcode' ) ) {
	function aven_zozo_vc_section_title_shortcode( $atts, $content = NULL ) {
		
		$atts = vc_map_get_attributes( 'zozo_vc_section_title', $atts );
		extract( $atts );

		$output = '';
		$extra_class = '';

		// Heading style
		if ( isset( $title ) && $title != '' ) {
			$title_style = '';
			if( $title_color ) {
				$title_style .= 'color:'. $title_color .';';
			}
			if( $title_size ) {
				$title_style .= 'font-size:'. $title_size .';';
			}
			if( $title_weight ) {
				$title_style .= 'font-weight:'. $title_weight .';';
			}
			if( $title_line_height ) {
				$title_style .= 'line-height:'. $title_line_height .';';
			}
			if( $title_spacing ) {
				$title_style .= 'letter-spacing:'. $title_spacing .';';
			}
			if( $title_margin ) {
				$title_style .= 'margin:'. $title_margin .';';
			}
			if( $title_style ) {
				$title_style = ' style="'. $title_style  .'"';
			}
		}
		
		// Sub Title
		if ( isset( $sub_title ) && $sub_title != '' ) {
			$sub_title_style = '';
			if( $sub_title_size ) {
				$sub_title_style .= 'font-size:'. $sub_title_size .';';
			}
			if( $sub_title_style ) {
				$sub_title_style = ' style="'. $sub_title_style  .'"';
			}
		}
		
		// Separator
		if( isset( $title_separator ) && $title_separator == 'yes' ) {
			$separator_style = '';
			if( $separator_color ) {
				$separator_style .= 'border-color:'. $separator_color .';';
			}
			if( $separator_style ) {
				$separator_style = ' style="'. $separator_style  .'"';
			}
		}
		
		// Content						
		if( isset( $content ) && $content != '' ) {
			$content_styles = '';
			if ( $content_size ) {
				$content_styles .= 'font-size:'. $content_size.';';
			}
			if ( $content_color ) {
				$content_styles .= 'color:'. $content_color.';';
			}
			if ( $content_line_height ) {
				$content_styles .= 'line-height:'. $content_line_height.';';
			}
			if( $content_margin ) {
				$content_styles .= 'margin:'. $content_margin .';';
			}
			if ( $content_styles ) {
				$content_styles = ' style="'. $content_styles .'"';
			}
		}
		
		if( isset( $text_align ) && $text_align != '' ) {
			$text_align = ' text-'.$text_align.'';
		}
		
		if( isset( $title_transform ) && $title_transform != '' ) {
			$extra_class = ' text-'.$title_transform.'';
		}
		
		// Content
		$content = wpb_js_remove_wpautop( $content, true );
		
		// Classes
		$main_classes = 'zozo-parallax-header';
		
		if( isset( $classes ) && $classes != '' ) {
			$main_classes .= ' ' . $classes;
		}
		$main_classes .= aven_zozo_vc_animation( $css_animation );
		
		$output .= '<div class="'. esc_attr( $main_classes ) .'">';
			$output .= '<div class="parallax-header content-style-'.$content_style.'">';
			if( isset( $sub_title ) && $sub_title != '' ) {
				$output .= '<h4 class="parallax-sub-title'.$text_align.'"'. $sub_title_style .'>'. $sub_title .'</h4>';
			}
			if( isset( $title ) && $title != '' ) {
				$output .= '<'. $title_type .' class="parallax-title'.$text_align.''.$extra_class.'"'.$title_style.'>';
				if( isset( $title_prefix ) && $title_prefix != '' ) {
					$output .= '<span class="title-prefix">'. $title_prefix .'</span>';
				}
				$output .= $title .'</'. $title_type .'>';
			}
			if( isset( $title_separator ) && $title_separator == 'yes' ) {
				$output .= '<hr class="section-title-separator"'.$separator_style.'></hr>';
			}
			if( isset( $content ) && $content != '' ) {
				if( isset( $content_style ) && $content_style == 'blockquote' ) {
					$output .= '<div class="parallax-desc blockquote-style'.$text_align.'"'.$content_styles.'>';
						$output .= '<blockquote><em>';
						$output .= $content;
						$output .= '</em></blockquote>';
					$output .= '</div>';
				} else {
					$output .= '<div class="parallax-desc '.$content_style.'-style'.$text_align.'"'.$content_styles.'>';
						$output .= $content;
					$output .= '</div>';
				}
			}
			$output .= '</div>';
		$output .= '</div>';
		
		return $output;
	}
}

if ( ! function_exists( 'aven_zozo_vc_section_title_shortcode_map' ) ) {
	function aven_zozo_vc_section_title_shortcode_map() {
		
		vc_map( 
			array(
				"name"					=> esc_html__( "Section Title", "aven" ),
				"description"			=> esc_html__( "Section Title with more options.", 'aven' ),
				"base"					=> "zozo_vc_section_title",
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
						"param_name"	=> "text_align",
						"value"			=> array(
							esc_html__( "Default", "aven" )	=> "",
							esc_html__( "Center", "aven" )	=> "center",
							esc_html__( "Left", "aven" )		=> "left",
							esc_html__( "Right", "aven" )		=> "right",
						),
					),
					// Headings
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Sub Title", "aven" ),
						"param_name"	=> "sub_title",						
						"value"			=> "",
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Sub Title Font Size", "aven" ),
						"param_name"	=> "sub_title_size",
						"description" 	=> esc_html__( "Enter Sub Title Font Size in px. Ex: 20px", "aven" ),
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Title Prefix Text", "aven" ),
						"param_name"	=> "title_prefix",	
						'admin_label' 	=> true,
						"value"			=> "",
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Heading", "aven" ),
						"param_name"	=> "title",
						'admin_label' 	=> true,
						"value"			=> "Sample Heading",
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Heading Type", "aven" ),
						"param_name"	=> "title_type",
						'admin_label' 	=> true,
						"std" 			=> "h2",
						"value"			=> array(
							esc_html__( "h2", "aven" )	=> "h2",
							esc_html__( "h3", "aven" )	=> "h3",
							esc_html__( "h4", "aven" )	=> "h4",
							esc_html__( "h5", "aven" )	=> "h5",
							esc_html__( "h6", "aven" )	=> "h6",
							esc_html__( "div", "aven" )	=> "div",
						),
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Heading Text Transform", 'aven' ),
						"param_name"	=> "title_transform",
						"value"			=> array(
							esc_html__( "Default", 'aven' )		=> '',
							esc_html__( "None", 'aven' )			=> 'none',
							esc_html__( "Capitalize", 'aven' )	=> 'capitalize',
							esc_html__( "Uppercase", 'aven' )		=> 'uppercase',
							esc_html__( "Lowercase", 'aven' )		=> 'lowercase',
						),
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Heading Font Weight", 'aven' ),
						"param_name"	=> "title_weight",
						"value"			=> array(
							esc_html__( "Default", 'aven' )	=> '',
							esc_html__( "100", 'aven' )		=> '100',
							esc_html__( "200", 'aven' )		=> '200',
							esc_html__( "300", 'aven' )		=> '300',
							esc_html__( "400", 'aven' )		=> '400',
							esc_html__( "500", 'aven' )		=> '500',
							esc_html__( "600", 'aven' )		=> '600',
							esc_html__( "700", 'aven' )		=> '700',
							esc_html__( "800", 'aven' )		=> '800',
							esc_html__( "900", 'aven' )		=> '900',
						),
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Heading Font Size", "aven" ),
						"param_name"	=> "title_size",
						"description" 	=> esc_html__( "Enter Heading Font Size in px. Ex: 25px", "aven" ),
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Heading Line Height", "aven" ),
						"param_name"	=> "title_line_height",
						"description" 	=> esc_html__( "Enter Heading Line Height in px. Ex: 20px", "aven" ),
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Heading Letter Spacing", "aven" ),
						"param_name"	=> "title_spacing",
						"description" 	=> esc_html__( "Enter Heading Letter Spacing in px. Ex: 1px", "aven" ),
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Heading Color", "aven" ),
						"param_name"	=> "title_color",
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Heading Margin", "aven" ),
						"param_name"	=> "title_margin",
						"description" 	=> esc_html__( "Enter Heading Margin in px. Ex: 5px 5px 5px 5px", "aven" ),
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Separator", 'aven' ),
						"param_name"	=> "title_separator",
						'admin_label' 	=> true,
						"value"			=> array(
							esc_html__( "No", 'aven' )		=> 'no',
							esc_html__( "Yes", 'aven' )		=> 'yes',
						),
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Separator Color", "aven" ),
						"param_name"	=> "separator_color",
						"group"			=> esc_html__( "Heading", "aven" ),
						'dependency'	=> array(
							'element'	=> 'title_separator',
							'value'		=> 'yes',
						),
					),
					// Content
					array(
						"type"			=> "textarea_html",
						"holder"		=> "div",
						"heading"		=> esc_html__( "Content", "aven" ),
						"param_name"	=> "content",
						"value"			=> '',
						"group"			=> esc_html__( "Content", "aven" ),
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Content Style", 'aven' ),
						"param_name"	=> "content_style",
						"value"			=> array(
							esc_html__( "Default", 'aven' )		=> 'default',
							esc_html__( "Blockquote", 'aven' )	=> 'blockquote',
							esc_html__( "Inline", "aven" )		=> "inline",
						),
						"group"			=> esc_html__( "Content", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Content Font Size", "aven" ),
						"param_name"	=> "content_size",
						"description" 	=> esc_html__( "Enter Content Font Size in px. Ex: 25px", "aven" ),
						"group"			=> esc_html__( "Content", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Content Line Height", "aven" ),
						"param_name"	=> "content_line_height",
						"description" 	=> esc_html__( "Enter Content Line Height in px. Ex: 20px", "aven" ),
						"group"			=> esc_html__( "Content", "aven" ),
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Content Color", "aven" ),
						"param_name"	=> "content_color",
						"group"			=> esc_html__( "Content", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Content Margin", "aven" ),
						"param_name"	=> "content_margin",
						"description" 	=> esc_html__( "Enter Content Margin in px. Ex: 5px 5px 5px 5px", "aven" ),
						"group"			=> esc_html__( "Content", "aven" ),
					),
				)
			)
		);
	}
}
add_action( 'vc_before_init', 'aven_zozo_vc_section_title_shortcode_map' );