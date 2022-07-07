<?php 
/**
 * Features shortcode
 */

if ( ! function_exists( 'aven_zozo_vc_feature_box_shortcode' ) ) {
	function aven_zozo_vc_feature_box_shortcode( $atts, $content = NULL ) {
		
		extract( 
			shortcode_atts(
				array(
					'id'					=> '',
					'classes'				=> '',
					'css_animation'			=> '',
					'text_align'			=> 'center',
					'title_style' 			=> 'title-below',
					'box_style' 			=> 'default-box',
					'info_box_style' 		=> 'box-with-bg',
					'box_link' 				=> '',
					'feature_image' 		=> '', 
					'image_url' 			=> '',
					'image_shape' 			=> 'none',
					'image_filters' 		=> '',
					'image_hover_style' 	=> '',
					'type' 					=> '',
					'icon_flaticons' 		=> '',
					'icon_fontawesome' 		=> '',
					'icon_lineicons' 		=> '',
					'icon_size' 			=> 'normal',
					'icon_shape' 			=> 'icon-none',
					'icon_skin_color' 		=> 'icon-skin-default',
					'icon_style' 			=> 'icon-bg',
					'icon_pattern' 			=> 'pattern-1',
					'pattern_image' 		=> '',
					'icon_hover_style' 		=> 'no-hover',
					'title'					=> esc_html__('Sample Heading', 'aven'),
					'title_type'			=> 'h2',
					'title_extra_class' 	=> '',
					'title_size'			=> '',
					'title_weight' 			=> '',
					'title_color'			=> '',
					'title_url'				=> '',
					'title_align' 			=> '',
					'content_size'			=> '',
					'content_color'			=> '',
					'content_align' 		=> '',
					'separator' 			=> 'yes',
					'show_button' 			=> 'no',
					'button_text' 			=> esc_html__( 'Read More', 'aven' ),
					'button_url' 			=> '',
					'button_style' 			=> 'normal_style',
					'bg_color'				=> '',
					'bg_hover_color' 		=> '',
					'box_br_color' 			=> '',
					'box_hv_br_color' 		=> '',
					'icon_bg_color'			=> '',
					'icon_color'			=> '',
					'icon_border_color' 	=> '',
					'icon_hv_color'			=> '',
					'icon_hv_bg_color' 		=> '',
					'icon_hv_br_color' 		=> '',
					'css' 					=> '',
				), $atts 
			) 
		);

		$output = '';
		$extra_class = '';
		static $feature_box_id = 1;

		// ID
		$div_id = '';
		$custom_id = '';
		if ( isset( $id ) && $id != '' ) {
			$div_id = ' id="'. $id .'"';
			$custom_id = '#' . $id;
		} else {
			$div_id = ' id="feature-box-'. $feature_box_id .'"';
			$custom_id = '#feature-box-' . $feature_box_id;
		}

		// Style
		$custom_stylings = '';
		// Background Color
		if( isset( $bg_color ) && $bg_color != '' ) {
			if( isset( $info_box_style ) && $info_box_style == 'box-with-bg' ) {	
				$custom_stylings .= $custom_id . '.feature-box-style.style-box-with-bg .grid-item { background-color:'. $bg_color .'; }' . "\n";
			} elseif( isset( $info_box_style ) && $info_box_style == 'outline-box' ) {
				$custom_stylings .= $custom_id . '.feature-box-style.style-outline-box .grid-item { background-color:'. $bg_color .'; }' . "\n";
			} elseif( isset( $box_style ) && $box_style == 'overlay-box' ) {
				$custom_stylings .= $custom_id . '.feature-box-style.style-overlay-box .grid-overlay-bottom { background-color:'. $bg_color .'; }' . "\n";
			}
		}
		
		// Hover Background Color
		if( isset( $bg_hover_color ) && $bg_hover_color != '' ) {
			if( isset( $info_box_style ) && $info_box_style == 'box-with-bg' ) {	
				$custom_stylings .= $custom_id . '.feature-box-style.style-box-with-bg .grid-item { background-color:'. $bg_hover_color .'; }' . "\n";
			} elseif( isset( $info_box_style ) && $info_box_style == 'outline-box' ) {
				$custom_stylings .= $custom_id . '.feature-box-style.style-outline-box .grid-item:hover { background-color:'. $bg_hover_color .'; }' . "\n";
			} elseif( isset( $box_style ) && $box_style == 'overlay-box' ) {
				$custom_stylings .= $custom_id . '.feature-box-style.style-overlay-box .grid-item:hover .grid-overlay-bottom { background-color:'. $bg_hover_color .'; }' . "\n";
			}
		}
		
		// Background Pattern Image
		if( ( isset( $icon_style ) && $icon_style == 'icon-pattern' ) && ( isset( $icon_pattern ) && $icon_pattern == 'custom-pattern' ) ) {
			if ( isset( $pattern_image ) && $pattern_image != '' ) {
				$pattern = wpb_getImageBySize( array( 'attach_id' => $pattern_image, 'thumb_size' => 'full' ) );
				$custom_stylings .= $custom_id . '.feature-box-style .grid-item .zozo-icon.icon-pattern.custom-pattern { background-image:url('. $pattern['p_img_large'][0] .'); }' . "\n";
			} 
		}
		
		if( $type == 'fontawesome' && function_exists( 'vc_icon_element_fonts_enqueue' ) ) vc_icon_element_fonts_enqueue( 'fontawesome' );	
		
		// Outlined Box Border Styles
		if( isset( $box_br_color ) && $box_br_color != '' ) {
			$custom_stylings .= $custom_id . '.feature-box-style.style-outline-box .grid-item { border-color:'. $box_br_color .'; }' . "\n";
		}
		
		if( isset( $box_hv_br_color ) && $box_hv_br_color != '' ) {
			$custom_stylings .= $custom_id . '.feature-box-style.style-outline-box .grid-item:hover { border-color:'. $box_hv_br_color .'; }' . "\n";
		}
		
		if( ( isset( $icon_bg_color ) && $icon_bg_color != '' ) || ( isset( $icon_color ) && $icon_color != '' ) || ( isset( $icon_border_color ) && $icon_border_color != '' ) ) {
			
			$custom_stylings .= $custom_id . " .grid-item .grid-box-inner .grid-icon { ";
			
			if ( isset( $icon_bg_color ) && $icon_bg_color != '' ) {
				$custom_stylings .= 'background-color:'. $icon_bg_color .'; ';
			}
			if ( isset( $icon_border_color ) && $icon_border_color != '' ) {
				$custom_stylings .= 'border-color:'. $icon_border_color .'; ';
			}
			if ( isset( $icon_color ) && $icon_color != '' ) {
				$custom_stylings .= 'color:'. $icon_color .'; ';
			}
			
			$custom_stylings .= "}" . "\n";
			
		}
		
		// Hover Styles	
		if( ( isset( $icon_hv_color ) && $icon_hv_color != '' ) || ( isset( $icon_hv_br_color ) && $icon_hv_br_color != '' ) || ( isset( $icon_hv_bg_color ) && $icon_hv_bg_color != '' ) || ( isset( $icon_hv_br_color ) && $icon_hv_br_color != '' ) ) {			
			// Hover Only Background
			if ( isset( $icon_hover_style ) && $icon_hover_style == 'icon-hv-bg' ) {
				$custom_stylings .= $custom_id . " .grid-item:hover .grid-box-inner .icon-hv-bg .grid-icon { ";
				if ( isset( $icon_hv_bg_color ) && $icon_hv_bg_color != '' ) {
					$custom_stylings .= 'background-color:'. $icon_hv_bg_color .'; ';
				}
				
				$custom_stylings .= "}" . "\n";
			} 
			// Hover Only Border
			elseif ( isset( $icon_hover_style ) && $icon_hover_style == 'icon-hv-br' ) {
				$custom_stylings .= $custom_id . " .grid-item:hover .grid-box-inner .icon-hv-br .grid-icon { ";
				if ( isset( $icon_hv_br_color ) && $icon_hv_br_color != '' ) {
					$custom_stylings .= 'border-color:'. $icon_hv_br_color .'; ';
				}
							
				$custom_stylings .= "}" . "\n";
			} 
			// Hover Background & Border
			elseif ( isset( $icon_hover_style ) && $icon_hover_style == 'icon-hv-bg-br' ) {
				$custom_stylings .= $custom_id . " .grid-item:hover .grid-box-inner .icon-hv-bg-br .grid-icon { ";
				if ( isset( $icon_hv_bg_color ) && $icon_hv_bg_color != '' ) {
					$custom_stylings .= 'background-color:'. $icon_hv_bg_color .'; ';
				}
				if ( isset( $icon_hv_br_color ) && $icon_hv_br_color != '' ) {
					$custom_stylings .= 'border-color:'. $icon_hv_br_color .'; ';
				}				
				$custom_stylings .= "}" . "\n";
			} 
			// Hover Background & Icon Color
			elseif ( isset( $icon_hover_style ) && $icon_hover_style == 'icon-hv-bg-icon' ) {
				$custom_stylings .= $custom_id . " .grid-item:hover .grid-box-inner .icon-hv-bg-icon .grid-icon { ";
				if ( isset( $icon_hv_bg_color ) && $icon_hv_bg_color != '' ) {
					$custom_stylings .= 'background-color:'. $icon_hv_bg_color .'; ';
				}
				if ( isset( $icon_hv_color ) && $icon_hv_color != '' ) {
					$custom_stylings .= 'color:'. $icon_hv_color .'; ';
				}	
				$custom_stylings .= "}" . "\n";
			}
			// Hover Border & Icon Color
			elseif ( isset( $icon_hover_style ) && $icon_hover_style == 'icon-hv-br-icon' ) {
				$custom_stylings .= $custom_id . " .grid-item:hover .grid-box-inner .icon-hv-br-icon .grid-icon { ";
				if ( isset( $icon_hv_br_color ) && $icon_hv_br_color != '' ) {
					$custom_stylings .= 'border-color:'. $icon_hv_br_color .'; ';
				}
				if ( isset( $icon_hv_color ) && $icon_hv_color != '' ) {
					$custom_stylings .= 'color:'. $icon_hv_color .'; ';
				}
				$custom_stylings .= "}" . "\n";
			}
			// Hover Icon Color
			elseif ( isset( $icon_hover_style ) && $icon_hover_style == 'icon-hv-color' ) {
				$custom_stylings .= $custom_id . " .grid-item:hover .grid-box-inner .icon-hv-color .grid-icon { ";
				if ( isset( $icon_hv_color ) && $icon_hv_color != '' ) {
					$custom_stylings .= 'color:'. $icon_hv_color .'; ';
				}			
				$custom_stylings .= "}" . "\n";
			}	
			// Hover All
			elseif ( isset( $icon_hover_style ) && $icon_hover_style == 'icon-hv-all' ) {
				$custom_stylings .= $custom_id . " .grid-item:hover .grid-box-inner .icon-hv-all .grid-icon { ";
				if ( isset( $icon_hv_bg_color ) && $icon_hv_bg_color != '' ) {
					$custom_stylings .= 'background-color:'. $icon_hv_bg_color .'; ';
				}
				if ( isset( $icon_hv_br_color ) && $icon_hv_br_color != '' ) {
					$custom_stylings .= 'border-color:'. $icon_hv_br_color .'; ';
				}	
				if ( isset( $icon_hv_color ) && $icon_hv_color != '' ) {
					$custom_stylings .= 'color:'. $icon_hv_color .'; ';
				}			
				$custom_stylings .= "}" . "\n";
			}
		
		}
		
		if ( isset( $custom_stylings ) && $custom_stylings != '' ) {
			//$output .= '<style type="text/css" scoped>';
			//$output .= $custom_stylings;
			//$output .= '</style>';
			$output .= '<div class="zozo-vc-custom-css" data-css="'. $custom_stylings .'"></div>';
		}
		
		// Classes
		$main_classes = 'zozo-feature-box feature-box-style';
		$image_classes = '';
		
		if( isset( $classes ) && $classes != '' ) {
			$main_classes .= ' ' . $classes;
		}
		
		if( isset( $image_filters ) && $image_filters != '' ) {
			$main_classes .= ' zozo-img-filter-' . $image_filters;
			$image_classes = ' image-filter-' . $image_filters;
		}
		
		if( isset( $image_hover_style ) && $image_hover_style != '' ) {
			$main_classes .= ' zozo-img-hover zozo-img-hover-' . $image_hover_style;
		}
		
		if( isset( $box_style ) && $box_style != 'info-box' ) {
			$main_classes .= ' style-' . $box_style;
		} else {
			$main_classes .= ' style-info-box style-' . $info_box_style;
		}
		
		if( isset( $separator ) && $separator != '' ) {
			$main_classes .= ' style-sep-' . $separator;
		}
		
		if( isset( $image_shape ) && $image_shape != '' ) {
			$image_classes .= ' img-' . $image_shape;
		}
		
		if( isset( $feature_image ) && $feature_image != '' ) {
			$img_org_size = wp_get_attachment_image_src( $feature_image, 'full' );
			if( $img_org_size[1] <= 250 ) {
				$image_classes .= ' img-size-small';
			}
		}
		
		$css_classes = array( vc_shortcode_custom_css_class( $css ) );
		
		$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), 'zozo_vc_feature_box', $atts ) );
		
		$main_classes .= ' ' . esc_attr( trim( $css_class ) );
		
		$main_classes .= aven_zozo_vc_animation( $css_animation );
		$main_classes .= ' clearfix';
		
		// Image URL
		$img_link = $img_title = $img_target = '';
		if( $image_url && $image_url != '' ) {
			$link = vc_build_link( $image_url );
			$img_link = isset( $link['url'] ) ? $link['url'] : '';
			$img_title = isset( $link['title'] ) ? $link['title'] : '';
			$img_target = !empty( $link['target'] ) ? $link['target'] : '_self';
		}
		
		// Heading style
		if ( isset( $title ) && $title != '' ) {
			$heading_style = '';
			if( $title_color ) {
				$heading_style .= 'color:'. $title_color .';';
			}
			if( $title_size ) {
				$heading_style .= 'font-size:'. $title_size .';';
			}
			if( $title_weight ) {
				$heading_style .= 'font-weight:'. $title_weight .';';
			}
			if( $heading_style ) {
				$heading_style = 'style="'. $heading_style  .'"';
			}
			
			$title_class = '';
			if( $title_align != '' ) {
				$title_class = ' text-'. $title_align .'';
			}
			$title_class .= ' ' . $title_extra_class;
			
			// Heading URL
			$title_link = $link_title = $link_target = '';
			if( $title_url && $title_url != '' ) {
				$link = vc_build_link( $title_url );
				$title_link = isset( $link['url'] ) ? $link['url'] : '';
				$link_title = isset( $link['title'] ) ? $link['title'] : '';
				$link_target = !empty( $link['target'] ) ? $link['target'] : '_self';
			}
		}
		
		// Content						
		if( isset( $content ) && $content != '' ) {
			$content_style = '';
			if ( $content_size ) {
				$content_style .= 'font-size:'. $content_size.';';
			}
			if ( $content_color ) {
				$content_style .= 'color:'. $content_color.';';
			}
			if ( $content_style ) {
				$content_style = 'style="'. $content_style .'"';
			}
			
			$content_class = '';
			if( $content_align != '' ) {
				$content_class = ' text-'. $content_align .'';
			}
		}
		
		// Button URL
		$button_link = $button_title = $button_target = '';
		if( $button_url && $button_url != '' ) {
			$link = vc_build_link( $button_url );
			$button_link = isset( $link['url'] ) ? $link['url'] : '';
			$button_title = isset( $link['title'] ) ? $link['title'] : '';
			$button_target = !empty( $link['target'] ) ? $link['target'] : '_self';
		}
		
		// Icon Shape Class
		$icon_extra_class = '';
		$grid_extra_class = '';
		if( isset( ${'icon_'. $type} ) && ${'icon_'. $type} != '' ) {
			if( isset( $icon_shape ) && $icon_shape != 'icon-none' ) {
				$icon_extra_class = ' icon-shape';
				$grid_extra_class = ' grid-icon-shape';
			}
		}
		
		// Icon Class
		$icon_wrapper_class = '';
		if( isset( ${'icon_'. $type} ) && ${'icon_'. $type} != '' ) {
			$icon_wrapper_class = ' grid-box-'.$icon_size.' grid-box-'.$icon_shape.'';
		} else {
			$icon_wrapper_class = ' grid-box-image';
		}
		
		$output .= '<div class="'. esc_attr( $main_classes ) .'"'. $div_id .'>';
			$output .= '<div class="grid-item">';
			
			if( isset( $box_style ) && ( $box_style != 'title-top-icon' && $box_style != 'overlay-box' ) ) {
			
				$output .= '<div class="grid-box-inner grid-text-'.$text_align.''.$icon_wrapper_class.''.$grid_extra_class.' grid-shape-'.$image_shape.'">';
				
					// Grid Box Style Center
					if( isset( $text_align ) && $text_align == "center" ) {
						
						// Heading ( Title Above )
						if( isset( $title_style ) && $title_style == "title-above" ) {
							if ( isset( $title ) && $title != '' ) {
								if( isset( $title_link ) && $title_link != '' ) {
									$output .= '<a href="'. esc_url( $title_link ) .'" title="'. esc_attr( $link_title ) .'" target="'. esc_attr( $link_target ) .'">';
								}
								$output .= '<'. $title_type .' class="grid-title-top grid-title'.$title_class.'" '.$heading_style.'>'. $title .'</'. $title_type .'>';
								if( isset( $title_link ) && $title_link != '' ) {
									$output .= '</a>';
								}
							}
						}
				
						// Image
						if( isset( $feature_image ) && $feature_image != '' ) {
							if( $image_shape == 'circle' ) {
								$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $feature_image, 'thumb_size' => 'aven-team', 'class' => 'img-' . $image_shape ) );
							} else {
								$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $feature_image, 'thumb_size' => 'aven-theme-mid', 'class' => 'img-' . $image_shape ) );
							}							
							$thumbnail = $post_thumbnail['thumbnail'];
							
							$output .= '<div class="grid-image-wrapper zozo-image-wrapper'.$image_classes.'">';
								if( isset( $img_link ) && $img_link != '' ) {
									$output .= '<a href="'. esc_url( $img_link ) .'" title="'. esc_attr( $img_title ) .'" target="'. esc_attr( $img_target ) .'">';
								}
								$output .= $thumbnail;
								if( isset( $img_link ) && $img_link != '' ) {
									$output .= '</a>';
								}
							$output .= '</div>';
						} 
						else {
							// Icon
							if( isset( ${'icon_'. $type} ) && ${'icon_'. $type} != '' ) {
								$output .= '<div class="grid-icon-wrapper '.$icon_hover_style.' shape-'.$icon_shape.'">';
									$output .= '<i class="'. esc_attr( ${'icon_'. $type} ) .' grid-icon zozo-icon'.$icon_extra_class.' '.$icon_shape.' '.$icon_skin_color.' '.$icon_style.' '.$icon_pattern.' icon-'.$icon_size.'"></i>';
								$output .= '</div>';
							}
							
						}
						
						// Heading ( Title Below )
						if( isset( $title_style ) && $title_style == "title-below" ) {
							if ( isset( $title ) && $title != '' ) {
								if( isset( $title_link ) && $title_link != '' ) {
									$output .= '<a href="'. esc_url( $title_link ) .'" title="'. esc_attr( $link_title ) .'" target="'. esc_attr( $link_target ) .'">';
								}							
								$output .= '<'. $title_type .' class="grid-title-below grid-title'.$title_class.'" '.$heading_style.'>'. $title .'</'. $title_type .'>';				
								if( isset( $title_link ) && $title_link != '' ) {
									$output .= '</a>';
								}						
							}
						}
					
						// Content
						if( isset( $content ) && $content != '' ) {
							$output .= '<div class="grid-desc'.$content_class.'" '. $content_style .'>';
								$output .= wpb_js_remove_wpautop( $content, true );
							$output .= '</div>';
						}
						
						// Heading ( Title Bottom )
						if( isset( $title_style ) && $title_style == "title-bottom" ) {
							if ( isset( $title ) && $title != '' ) {
								if( isset( $title_link ) && $title_link != '' ) {
									$output .= '<a href="'. esc_url( $title_link ) .'" title="'. esc_attr( $link_title ) .'" target="'. esc_attr( $link_target ) .'">';
								}							
								$output .= '<'. $title_type .' class="grid-title-bottom grid-title'.$title_class.'" '.$heading_style.'>'. $title .'</'. $title_type .'>';				
								if( isset( $title_link ) && $title_link != '' ) {
									$output .= '</a>';
								}						
							}
						}
						
						// Button
						if( isset( $show_button ) && $show_button == 'yes' ) {
							$output .= '<div class="grid-button'.$content_class.'">';
								if( isset( $button_style ) && $button_style == 'normal_style' ) {
									$output .= '<a href="'.esc_url( $button_link ).'" title="'. esc_attr( $button_title ).'" target="'. esc_attr( $button_target ).'">'.$button_text.'</a>';
								} elseif( isset( $button_style ) && $button_style == 'button_style' ) {
									$output .= '<a href="'.esc_url( $button_link ).'" class="btn btn-fbox-more" title="'. esc_attr( $button_title ).'" target="'. esc_attr( $button_target ).'">'.$button_text.'</a>';
								}
							$output .= '</div>';
						}
					}
					// Grid Box Style Left or Right
					elseif( isset( $text_align ) && ( $text_align == "left" || $text_align == "right" ) ) {
						
						// Image
						if( isset( $feature_image ) && $feature_image != '' ) {
							$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $feature_image, 'thumb_size' => 'aven-theme-mid', 'class' => 'img-' . $image_shape ) );
							$thumbnail = $post_thumbnail['thumbnail'];
							
							$output .= '<div class="grid-image-wrapper zozo-image-wrapper'.$image_classes.'">';
								if( isset( $img_link ) && $img_link != '' ) {
									$output .= '<a href="'. esc_url( $img_link ) .'" title="'. esc_attr( $img_title ) .'" target="'. esc_attr( $img_target ) .'">';
								}
								$output .= $thumbnail;
								if( isset( $img_link ) && $img_link != '' ) {
									$output .= '</a>';
								}
							$output .= '</div>';
						} 
						else {
							// Icon
							if( isset( ${'icon_'. $type} ) && ${'icon_'. $type} != '' ) {
								$output .= '<div class="grid-icon-wrapper '.$icon_hover_style.' shape-'.$icon_shape.'">';
									$output .= '<i class="'. esc_attr( ${'icon_'. $type} ) .' grid-icon zozo-icon'.$icon_extra_class.' '.$icon_shape.' '.$icon_skin_color.' '.$icon_style.' '.$icon_pattern.' icon-'.$icon_size.'"></i>';
								$output .= '</div>';
							}
						}
							
						$output .= '<div class="grid-content-wrapper">';
							// Heading
							if ( isset( $title ) && $title != '' ) {
								if( isset( $title_link ) && $title_link ) {
									$output .= '<a href="'. esc_url( $title_link ) .'" title="'. esc_attr( $link_title ) .'" target="'. esc_attr( $link_target ) .'">';
								}							
								$output .= '<'. $title_type .' class="grid-title'.$title_class.'" '.$heading_style.'>'. $title .'</'. $title_type .'>';				
								if( isset( $title_link ) && $title_link ) {
									$output .= '</a>';
								}						
							}
						
							// Content						
							if( isset( $content ) && $content != '' ) {
								$output .= '<div class="grid-desc'.$content_class.'" '. $content_style .'>';
									$output .= wpb_js_remove_wpautop( $content, true );								
								$output .= '</div>';
							}
							
							// Button
							if( isset( $show_button ) && $show_button == 'yes' ) {
								$output .= '<div class="grid-button'.$content_class.'">';
									if( isset( $button_style ) && $button_style == 'normal_style' ) {
										$output .= '<a href="'.esc_url( $button_link ).'" title="'. esc_attr( $button_title ).'" target="'. esc_attr( $button_target ).'">'.$button_text.'</a>';
									} elseif( isset( $button_style ) && $button_style == 'button_style' ) {
										$output .= '<a href="'.esc_url( $button_link ).'" class="btn btn-fbox-more" title="'. esc_attr( $button_title ).'" target="'. esc_attr( $button_target ).'">'.$button_text.'</a>';
									}
								$output .= '</div>';
							}
						$output .= '</div>';
						
					}
				
				$output .= '</div>'; // .grid-box-inner
			}
			elseif( isset( $box_style ) && $box_style == "overlay-box" ) {
				$count = '';
				
				// Box URL
				$box_url = $box_title = $box_target = '';
				if( $box_link && $box_link != '' ) {
					$link = vc_build_link( $box_link );
					$box_url = isset( $link['url'] ) ? $link['url'] : '';
					$box_title = isset( $link['title'] ) ? $link['title'] : '';
					$box_target = !empty( $link['target'] ) ? $link['target'] : '_self';
				}
				$output .= '<div class="grid-box-inner grid-text-'.$text_align.''.$icon_wrapper_class.' grid-shape-'.$image_shape.'">';
					
					if( isset( $box_url ) && $box_url != '' ) {
						$output .= '<a href="'. esc_url( $box_url ) .'" class="overlay-box-link" title="'. esc_attr( $box_title ) .'" target="'. esc_attr( $box_target ).'"></a>';
					}
					
					for( $count = 1; $count <= 2; $count++ ) {
						if( $count == 1 ) {
							$output .= '<div class="grid-overlay-top">';
						} else {
							$output .= '<div class="grid-overlay-bottom">';
						}
						
						$output .= '<div class="grid-overlay-info">';
						// Heading ( Title Above )
						if( isset( $title_style ) && $title_style == "title-above" ) {
							if ( isset( $title ) && $title != '' ) {
								if( isset( $title_link ) && $title_link != '' ) {
									$output .= '<a href="'. esc_url( $title_link ) .'" title="'. esc_attr( $link_title ) .'" target="'. esc_attr( $link_target ) .'">';
								}
								$output .= '<'. $title_type .' class="grid-title-top grid-title'.$title_class.'" '.$heading_style.'>'. $title .'</'. $title_type .'>';
								if( isset( $title_link ) && $title_link != '' ) {
									$output .= '</a>';
								}
							}
						}
						
						// Image
						if( isset( $feature_image ) && $feature_image != '' ) {
							if( $image_shape == 'circle' ) {
								$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $feature_image, 'thumb_size' => 'aven-team', 'class' => 'img-' . $image_shape ) );
							} else {
								$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $feature_image, 'thumb_size' => 'aven-theme-mid', 'class' => 'img-' . $image_shape ) );
							}
							
							$thumbnail = $post_thumbnail['thumbnail'];
							
							$output .= '<div class="grid-image-wrapper zozo-image-wrapper'.$image_classes.'">';
								if( isset( $img_link ) && $img_link != '' ) {
									$output .= '<a href="'. esc_url( $img_link ) .'" title="'. esc_attr( $img_title ) .'" target="'. esc_attr( $img_target ) .'">';
								}
								$output .= $thumbnail;
								if( isset( $img_link ) && $img_link != '' ) {
									$output .= '</a>';
								}
							$output .= '</div>';
						} 
						else {
							// Icon
							if( isset( ${'icon_'. $type} ) && ${'icon_'. $type} != '' ) {
								$output .= '<div class="grid-icon-wrapper '.$icon_hover_style.' shape-'.$icon_shape.'">';
									$output .= '<i class="'. esc_attr( ${'icon_'. $type} ) .' grid-icon zozo-icon'.$icon_extra_class.' '.$icon_shape.' '.$icon_skin_color.' '.$icon_style.' '.$icon_pattern.' icon-'.$icon_size.'"></i>';
								$output .= '</div>';
							}
						}
						
						// Heading ( Title Below )
						if( isset( $title_style ) && $title_style == "title-below" ) {
							if ( isset( $title ) && $title != '' ) {
								if( isset( $title_link ) && $title_link != '' ) {
									$output .= '<a href="'. esc_url( $title_link ) .'" title="'. esc_attr( $link_title ) .'" target="'. esc_attr( $link_target ) .'">';
								}							
								$output .= '<'. $title_type .' class="grid-title-below grid-title'.$title_class.'" '.$heading_style.'>'. $title .'</'. $title_type .'>';				
								if( isset( $title_link ) && $title_link != '' ) {
									$output .= '</a>';
								}						
							}
						}
												
						if( $count == 2 ) {
							// Content
							if( isset( $content ) && $content != '' ) {
								$output .= '<div class="grid-desc'.$content_class.'" '. $content_style .'>';
									$output .= wpb_js_remove_wpautop( $content, true );
								$output .= '</div>';
							}
						}
						
						// Heading ( Title Bottom )
						if( isset( $title_style ) && $title_style == "title-bottom" ) {
							if ( isset( $title ) && $title != '' ) {
								if( isset( $title_link ) && $title_link != '' ) {
									$output .= '<a href="'. esc_url( $title_link ) .'" title="'. esc_attr( $link_title ) .'" target="'. esc_attr( $link_target ) .'">';
								}							
								$output .= '<'. $title_type .' class="grid-title-bottom grid-title'.$title_class.'" '.$heading_style.'>'. $title .'</'. $title_type .'>';				
								if( isset( $title_link ) && $title_link != '' ) {
									$output .= '</a>';
								}						
							}
						}
						$output .= '</div>';
						
						if( $count <= 2 ) {
							// Button
							if( isset( $show_button ) && $show_button == 'yes' ) {
								$output .= '<div class="grid-button'.$content_class.'">';
									if( isset( $button_style ) && $button_style == 'normal_style' ) {
										$output .= '<a href="'.esc_url( $button_link ).'" title="'. esc_attr( $button_title ).'" target="'. esc_attr( $button_target ).'">'.$button_text.'</a>';
									} elseif( isset( $button_style ) && $button_style == 'button_style' ) {
										$output .= '<a href="'.esc_url( $button_link ).'" class="btn btn-fbox-more" title="'. esc_attr( $button_title ).'" target="'. esc_attr( $button_target ).'">'.$button_text.'</a>';
									}
								$output .= '</div>';
							}
						}
						
						$output .= '</div>';
					}
				$output .= '</div>'; // .grid-box-inner
			}
			else {
				$icon_box_class = '';
				$icon_box_class = " grid-icon-box-".$text_align."";
					
				$output .= '<div class="grid-icon-box">';
				$output .= '<div class="grid-box-inner grid-icon-box-wrapper'.$icon_wrapper_class.''.$grid_extra_class.' '.$icon_box_class.'">';
					
					if ( ( isset( $title ) && $title != '' ) || ( isset( $feature_image ) && $feature_image != '' ) ) {
						$output .= '<div class="grid-icon-box-title">';
					}
					
					if( $text_align == "right" ) {
						// Heading
						if ( isset( $title ) && $title != '' ) {
							if( isset( $title_link ) && $title_link ) {
								$output .= '<a href="'. esc_url( $title_link ) .'" title="'. esc_attr( $link_title ) .'" target="'. esc_attr( $link_target ) .'">';
							}
							$output .= '<'. $title_type .' class="grid-title'.$title_class.'" '.$heading_style.'>'. $title .'</'. $title_type .'>';
							if( isset( $title_link ) && $title_link ) {
								$output .= '</a>';
							}
						}
					}
					
					// Image
					if( isset( $feature_image ) && $feature_image != '' ) {
						$post_thumbnail = wpb_getImageBySize( array( 'attach_id' => $feature_image, 'thumb_size' => 'thumbnail', 'class' => 'img-' . $image_shape ) );
						$thumbnail = $post_thumbnail['thumbnail'];
						
						$output .= '<div class="grid-image-wrapper zozo-image-wrapper'.$image_classes.'">';
							if( isset( $img_link ) && $img_link != '' ) {
								$output .= '<a href="'. esc_url( $img_link ) .'" title="'. esc_attr( $img_title ) .'" target="'. esc_attr( $img_target ) .'">';
							}
							$output .= $thumbnail;
							if( isset( $img_link ) && $img_link != '' ) {
								$output .= '</a>';
							}
						$output .= '</div>';
					} 
					else {
						// Icon
						if( isset( ${'icon_'. $type} ) && ${'icon_'. $type} != '' ) {
							$output .= '<div class="grid-icon-wrapper '.$icon_hover_style.' shape-'.$icon_shape.'">';
								$output .= '<i class="'. esc_attr( ${'icon_'. $type} ) .' grid-icon zozo-icon'.$icon_extra_class.' '.$icon_shape.' '.$icon_skin_color.' '.$icon_style.' '.$icon_pattern.' icon-'.$icon_size.'"></i>';
							$output .= '</div>';
						}
					}
					
					if( $text_align == "left" || $text_align == "center" ) {
						// Heading
						if ( isset( $title ) && $title != '' ) {
							if( isset( $title_link ) && $title_link ) {
								$output .= '<a href="'. esc_url( $title_link ) .'" title="'. esc_attr( $link_title ) .'" target="'. esc_attr( $link_target ) .'">';
							}
							$output .= '<'. $title_type .' class="grid-title'.$title_class.'" '.$heading_style.'>'. $title .'</'. $title_type .'>';
							if( isset( $title_link ) && $title_link ) {
								$output .= '</a>';
							}
						}
					}
					
					if ( ( isset( $title ) && $title != '' ) || ( isset( $feature_image ) && $feature_image != '' ) ) {
						$output .= '</div>';
					}
					
					$output .= '<div class="clearfix"></div>';
					
					$output .= '<div class="grid-icon-box-content">';
						// Content						
						if( isset( $content ) && $content != '' ) {
							$output .= '<div class="grid-desc'.$content_class.'" '. $content_style .'>';
								$output .= wpb_js_remove_wpautop( $content, true );
							$output .= '</div>';
						}
					
						// Button
						if( isset( $show_button ) && $show_button == 'yes' ) {
							$output .= '<div class="grid-button'.$content_class.'">';
								if( isset( $button_style ) && $button_style == 'normal_style' ) {
									$output .= '<a href="'.esc_url( $button_link ).'" title="'. esc_attr( $button_title ).'" target="'. esc_attr( $button_target ).'">'.$button_text.'</a>';
								} elseif( isset( $button_style ) && $button_style == 'button_style' ) {
									$output .= '<a href="'.esc_url( $button_link ).'" class="btn btn-fbox-more" title="'. esc_attr( $button_title ).'" target="'. esc_attr( $button_target ).'">'.$button_text.'</a>';
								}
							$output .= '</div>';
						}
					$output .= '</div>';
				
				$output .= '</div>';
				$output .= '</div>'; // .grid-icon-box
			}
			$output .= '</div>'; // .grid-item
			
		$output .= '</div>';
		
		$feature_box_id++;
		
		return $output;
	}
}

if ( ! function_exists( 'aven_zozo_vc_feature_box_shortcode_map' ) ) {
	function aven_zozo_vc_feature_box_shortcode_map() {
		
		vc_map( 
			array(
				"name"					=> esc_html__( "Feature Box", "aven" ),
				"description"			=> esc_html__( "A feature box with list or grid style.", 'aven' ),
				"base"					=> "zozo_vc_feature_box",
				"category"				=> esc_html__( "Theme Addons", "aven" ),
				"icon"					=> "zozo-vc-icon",
				"params"				=> array(
					array(
						'type'			=> 'textfield',
						'admin_label' 	=> true,
						'heading'		=> esc_html__( 'ID', "aven" ),
						'param_name'	=> 'id',
						'value' 		=> '',
					),
					array(
						'type'			=> 'textfield',
						'admin_label' 	=> true,
						'heading'		=> esc_html__( 'Extra Classes', "aven" ),
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
						"heading"		=> esc_html__( "Style", "aven" ),
						"param_name"	=> "box_style",
						'admin_label' 	=> true,
						"value"			=> array(
							esc_html__( "Default Box", "aven" )			=> "default-box",
							esc_html__( "Info Box", "aven" )				=> "info-box",							
							esc_html__( "Icon & Title on Top", "aven" )	=> "title-top-icon",
							esc_html__( "Overlay Style", "aven" )			=> "overlay-box",
						),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Info Box Style", "aven" ),
						"param_name"	=> "info_box_style",
						"value"			=> array(
							esc_html__( "Box with Background", "aven" )		=> "box-with-bg",
							esc_html__( "Box without Background", "aven" )	=> "box-without-bg",
							esc_html__( "Box with Bordered", "aven" )			=> "outline-box",
						),
						'dependency'	=> array(
							'element'	=> 'box_style',
							"value" 	=> array( "info-box" ),
						),
					),
					array(
						"type"			=> "vc_link",
						"heading"		=> esc_html__( "Box Link", 'aven' ),
						"param_name"	=> "box_link",
						"value"			=> "",
						'dependency'	=> array(
							'element'	=> 'box_style',
							"value" 	=> array( "overlay-box" ),
						),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Alignment", "aven" ),
						"param_name"	=> "text_align",
						'admin_label' 	=> true,
						"value"			=> array(
							esc_html__( "Default", "aven" )	=> "",
							esc_html__( "Center", "aven" )	=> "center",
							esc_html__( "Left", "aven" )		=> "left",
							esc_html__( "Right", "aven" )		=> "right",
						),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Title Position", "aven" ),
						"param_name"	=> "title_style",
						"value"			=> array(
							esc_html__( "Default", "aven" )						=> "",
							esc_html__( "Title below Icon or Image", "aven" )		=> "title-below",
							esc_html__( "Title above Icon or Image", "aven" )		=> "title-above",
							esc_html__( "Title Bottom", "aven" )					=> "title-bottom",
						),
						'dependency'	=> array(
							'element'	=> 'text_align',
							"value" 	=> array( "", "center" ),
						),
					),
					// Image 
					array(
						"type"			=> "attach_image",
						"heading"		=> esc_html__( "Image", "aven" ),
						"param_name"	=> "feature_image",
						"value"			=> "",
						'group'			=> esc_html__( 'Image', 'aven' ),
					),
					array(
						"type"			=> "vc_link",
						"heading"		=> esc_html__( "Image Link", 'aven' ),
						"param_name"	=> "image_url",
						"value"			=> "",
						'group'			=> esc_html__( 'Image', 'aven' ),
						'dependency'	=> array(
							'element'	=> 'feature_image',
							'not_empty'	=> true,
						),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Image Shapes", "aven" ),
						"param_name"	=> "image_shape",
						"value"			=> array(
							esc_html__( "None", "aven" )		=> "",
							esc_html__( "Rounded", "aven" )	=> "rounded",
							esc_html__( "Circle", "aven" )	=> "circle",
						),
						'group'			=> esc_html__( 'Image', 'aven' ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Image Filters", 'aven' ),
						"param_name"	=> "image_filters",
						"value"			=> aven_zozo_vc_image_filters(),
						'group'			=> esc_html__( 'Image', 'aven' ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Image Hover Effects", 'aven' ),
						"param_name"	=> "image_hover_style",
						"value"			=> aven_zozo_vc_image_hovers(),
						'group'			=> esc_html__( 'Image', 'aven' ),
					),
					// Icon
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
						"heading" 		=> esc_html__( "Feature Icon", "aven" ),
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
						"heading" 		=> esc_html__( "Feature Icon", "aven" ),
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
						"heading" 		=> esc_html__( "Feature Icon", "aven" ),
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
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Icon Size", "aven" ),
						"param_name"	=> "icon_size",
						"value"			=> array(
							esc_html__( "Normal", "aven" )		=> "normal",
							esc_html__( "Small", "aven" )			=> "small",
							esc_html__( "Medium", "aven" )		=> "medium",
							esc_html__( "Large", "aven" )			=> "large",
							esc_html__( "Extra Large", "aven" )	=> "exlarge",
						),
						"group"			=> esc_html__( "Icon", "aven" ),
					),			
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Icon Shape", "aven" ),
						"param_name"	=> "icon_shape",
						'admin_label' 	=> true,
						"value"			=> array(
							esc_html__( "None", "aven" )		=> "icon-none",
							esc_html__( "Circle", "aven" )	=> "icon-circle",
							esc_html__( "Rounded", "aven" )	=> "icon-rounded",
							esc_html__( "Square", "aven" )	=> "icon-square",
						),
						"group"			=> esc_html__( "Icon", "aven" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Icon Color", "aven" ),
						"param_name"	=> "icon_skin_color",
						"value"			=> array(
							esc_html__( "Default", "aven" )	=> "icon-skin-default",
							esc_html__( "Light", "aven" )		=> "icon-skin-light",
							esc_html__( "Dark", "aven" )		=> "icon-skin-dark",
						),
						'dependency'	=> array(
							'element'	=> 'icon_shape',
							'value'		=> array( 'icon-none' ),
						),
						"group"			=> esc_html__( "Icon", "aven" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Icon Background Style", "aven" ),
						"param_name"	=> "icon_style",
						'admin_label' 	=> true,
						"value"			=> array(
							esc_html__( "Default Background", "aven" )				=> "icon-bg",
							esc_html__( "Light Background", "aven" )					=> "icon-light",
							esc_html__( "Dark Background", "aven" )					=> "icon-dark",
							esc_html__( "Transparent", "aven" )						=> "icon-transparent",
							esc_html__( "Pattern Background", "aven" )				=> "icon-pattern",
							esc_html__( "Bordered", "aven" )							=> "icon-bordered",
							esc_html__( "Bordered w/ Background", "aven" ) 			=> "icon-border-bg",
							esc_html__( "Bordered w/ Background Alt Style", "aven" ) 	=> "icon-border-bg-space",
						),
						"group"			=> esc_html__( "Icon", "aven" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Icon Pattern Background", "aven" ),
						"param_name"	=> "icon_pattern",
						"value"			=> array(
							esc_html__( "Pattern 1", "aven" )			=> "pattern-1",
							esc_html__( "Pattern 2", "aven" )			=> "pattern-2",
							esc_html__( "Pattern 3", "aven" )			=> "pattern-3",
							esc_html__( "Pattern 4", "aven" )			=> "pattern-4",
							esc_html__( "Pattern 5", "aven" )			=> "pattern-5",
							esc_html__( "Custom Pattern", "aven" )	=> "custom-pattern",
						),
						"group"			=> esc_html__( "Icon", "aven" ),
						'dependency'	=> array(
							'element'	=> 'icon_style',
							'value'		=> array( 'icon-pattern' ),
						),
					),
					array(
						"type"			=> "attach_image",
						"heading"		=> esc_html__( "Pattern Image", "aven" ),
						"param_name"	=> "pattern_image",
						"value"			=> "",
						"group"			=> esc_html__( "Icon", "aven" ),
						'dependency'	=> array(
							'element'	=> 'icon_pattern',
							'value'		=> array( 'custom-pattern' ),
						),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Icon Hover Style", "aven" ),
						"param_name"	=> "icon_hover_style",
						"value"			=> array(
							esc_html__( "No Hover", "aven" )							=> "no-hover",
							esc_html__( "Color", "aven" )								=> "icon-hv-color",
							esc_html__( "Background Color", "aven" )					=> "icon-hv-bg",
							esc_html__( "Border Color", "aven" )						=> "icon-hv-br",
							esc_html__( "Both Background & Border Color", "aven" )	=> "icon-hv-bg-br",
							esc_html__( "Both Border & Icon Color", "aven" )			=> "icon-hv-br-icon",
							esc_html__( "Both Background & Icon Color", "aven" )		=> "icon-hv-bg-icon",
							esc_html__( "All Colors", "aven" ) 						=> "icon-hv-all",
						),
						"group"			=> esc_html__( "Icon", "aven" ),
					),
					// Headings
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Heading", "aven" ),
						"param_name"	=> "title",
						"value"			=> "Sample Heading",
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Heading Type", "aven" ),
						"param_name"	=> "title_type",
						"value"			=> array(
							esc_html__( "h2", "aven" )	=> "h2",
							esc_html__( "h3", "aven" )	=> "h3",
							esc_html__( "h4", "aven" )	=> "h4",
							esc_html__( "h5", "aven" )	=> "h5",
							esc_html__( "h6", "aven" )	=> "h6",
						),
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					array(
						"type"			=> "vc_link",
						"heading"		=> esc_html__( "Heading URL", "aven" ),
						"param_name"	=> "title_url",
						"value"			=> "",
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Heading Font Size", "aven" ),
						"param_name"	=> "title_size",
						"description" 	=> esc_html__( "Enter Heading Font Size. Ex: 20px", "aven" ),
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Heading Weight", 'aven' ),
						"param_name"	=> "title_weight",
						"std"			=> '',
						"value"			=> array(
							esc_html__( "Default", 'aven' )		=> '',
							esc_html__( "Normal", 'aven' )		=> '400',
							esc_html__( "Medium", 'aven' )		=> '500',
							esc_html__( "Semi Bold", 'aven' )		=> '600',
							esc_html__( "Bold", 'aven' )			=> '700',
							esc_html__( "Extra Bold", 'aven' )	=> '800',
							esc_html__( "Ultra Bold", 'aven' )	=> '900',
						),
						"group" 		=> esc_html__( "Heading", "aven" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Heading Alignment", "aven" ),
						"param_name"	=> "title_align",
						"value"			=> array(
							esc_html__( "Default", "aven" )	=> "",
							esc_html__( "Center", "aven" )	=> "center",
							esc_html__( "Left", "aven" )		=> "left",
							esc_html__( "Right", "aven" )		=> "right",
						),
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__( 'Extra Heading Classes', "aven" ),
						'param_name'	=> 'title_extra_class',
						'value' 		=> '',
						"group"			=> esc_html__( "Heading", "aven" ),
					),
					// Content
					array(
						"type"			=> "textarea_html",
						"holder"		=> "div",
						"heading"		=> esc_html__( "Content", "aven" ),
						"param_name"	=> "content",
						"value"			=> esc_html__( 'I am text block. Please change this dummy text in your page editor for this feature box.', "aven" ),
						"group"			=> esc_html__( "Content", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Content Font Size", "aven" ),
						"param_name"	=> "content_size",
						"description" 	=> esc_html__( "Enter Content Font Size. Ex: 15px", "aven" ),
						"group"			=> esc_html__( "Content", "aven" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Content Alignment", "aven" ),
						"param_name"	=> "content_align",
						"value"			=> array(
							esc_html__( "Default", "aven" )	=> "",
							esc_html__( "Center", "aven" )	=> "center",
							esc_html__( "Left", "aven" )		=> "left",
							esc_html__( "Right", "aven" )		=> "right",
						),
						"group"			=> esc_html__( "Content", "aven" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Show Separator", "aven" ),
						"param_name"	=> "separator",
						"value"			=> array(
							esc_html__( "Yes", "aven" )		=> "yes",
							esc_html__( "No", "aven" )		=> "no",
						),
						"description" 	=> esc_html__( "Choose this option to show border separator between content and button.", "aven" ),
						"group"			=> esc_html__( "Content", "aven" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Show Button", "aven" ),
						"param_name"	=> "show_button",
						"value"			=> array(
							esc_html__( "No", "aven" )	=> "no",
							esc_html__( "Yes", "aven" )	=> "yes",							
						),
						"group"			=> esc_html__( "Content", "aven" ),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Button Text", "aven" ),
						"param_name"	=> "button_text",
						"group"			=> esc_html__( "Content", "aven" ),
					),
					array(
						"type"			=> "vc_link",
						"heading"		=> esc_html__( "Button URL", "aven" ),
						"param_name"	=> "button_url",
						"value"			=> "",
						"group"			=> esc_html__( "Content", "aven" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Button Style", "aven" ),
						"param_name"	=> "button_style",
						"value"			=> array(
							esc_html__( "Normal", "aven" )	=> "normal_style",
							esc_html__( "Button", "aven" )	=> "button_style",							
						),
						"group"			=> esc_html__( "Content", "aven" ),
					),
					// Stylings
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Heading Color", "aven" ),
						"param_name"	=> "title_color",
						"group"			=> esc_html__( "Stylings", "aven" ),
					),
					array(
						"type"			=> "colorpicker",
						"heading"		=> esc_html__( "Content Color", "aven" ),
						"param_name"	=> "content_color",
						"group"			=> esc_html__( "Stylings", "aven" ),
					),
					array(
						"type"			=> 'colorpicker',
						"heading"		=> esc_html__( "Box Background Color", "aven" ),
						"param_name"	=> "bg_color",
						"group"			=> esc_html__( "Stylings", "aven" ),
						'dependency'	=> array(
							'element'	=> 'box_style',
							'value'		=> array( 'info-box' ),
						),
					),
					array(
						"type"			=> 'colorpicker',
						"heading"		=> esc_html__( "Box Hover Background Color", "aven" ),
						"param_name"	=> "bg_hover_color",
						"group"			=> esc_html__( "Stylings", "aven" ),
						'dependency'	=> array(
							'element'	=> 'box_style',
							'value'		=> array( 'info-box' ),
						),
					),
					array(
						"type"			=> 'colorpicker',
						"heading"		=> esc_html__( "Box Border Color", "aven" ),
						"param_name"	=> "box_br_color",
						"group"			=> esc_html__( "Stylings", "aven" ),
						'dependency'	=> array(
							'element'	=> 'info_box_style',
							'value'		=> 'outline-box',
						),
					),
					array(
						"type"			=> 'colorpicker',
						"heading"		=> esc_html__( "Box Hover Border Color", "aven" ),
						"param_name"	=> "box_hv_br_color",
						"group"			=> esc_html__( "Stylings", "aven" ),
						'dependency'	=> array(
							'element'	=> 'info_box_style',
							'value'		=> 'outline-box',
						),
					),
					array(
						"type"			=> 'colorpicker',
						"heading"		=> esc_html__( "Icon Color", "aven" ),
						"param_name"	=> "icon_color",
						"group"			=> esc_html__( "Stylings", "aven" ),
					),
					array(
						"type"			=> 'colorpicker',
						"heading"		=> esc_html__( "Icon Background Color", "aven" ),
						"param_name"	=> "icon_bg_color",
						"group"			=> esc_html__( "Stylings", "aven" ),
						'dependency'	=> array(
							'element'	=> 'icon_style',
							'value'		=> array( 'icon-bg', 'icon-border-bg', 'icon-pattern', 'icon-border-bg-space' ),
						),
					),
					array(
						"type"			=> 'colorpicker',
						"heading"		=> esc_html__( "Icon Border Color", "aven" ),
						"param_name"	=> "icon_border_color",
						"group"			=> esc_html__( "Stylings", "aven" ),
						'dependency'	=> array(
							'element'	=> 'icon_style',
							'value'		=> array( 'icon-border-bg', 'icon-bordered', 'icon-border-bg-space' ),
						),
					),
					array(
						"type"			=> 'colorpicker',
						"heading"		=> esc_html__( "Icon Hover Color", "aven" ),
						"param_name"	=> "icon_hv_color",
						"group"			=> esc_html__( "Stylings", "aven" ),
						'dependency'	=> array(
							'element'	=> 'icon_hover_style',
							'value'		=> array( 'icon-hv-color', 'icon-hv-br-icon', 'icon-hv-bg-icon', 'icon-hv-all' ),
						),
					),
					array(
						"type"			=> 'colorpicker',
						"heading"		=> esc_html__( "Icon Hover Background Color", "aven" ),
						"param_name"	=> "icon_hv_bg_color",
						"group"			=> esc_html__( "Stylings", "aven" ),
						'dependency'	=> array(
							'element'	=> 'icon_hover_style',
							'value'		=> array( 'icon-hv-bg', 'icon-hv-bg-br', 'icon-hv-bg-icon', 'icon-hv-all' ),
						),
					),
					array(
						"type"			=> 'colorpicker',
						"heading"		=> esc_html__( "Icon Hover Border Color", "aven" ),
						"param_name"	=> "icon_hv_br_color",
						"group"			=> esc_html__( "Stylings", "aven" ),
						'dependency'	=> array(
							'element'	=> 'icon_hover_style',
							'value'		=> array( 'icon-hv-br', 'icon-hv-bg-br', 'icon-hv-br-icon', 'icon-hv-all' ),
						),
					),
					array(
						'type' 			=> 'css_editor',
						'heading' 		=> esc_html__( 'CSS box', 'aven' ),
						'param_name' 	=> 'css',
						'group' 		=> esc_html__( 'Design Options', 'aven' )
					),					
				)
			) 
		);
	}
}
add_action( 'vc_before_init', 'aven_zozo_vc_feature_box_shortcode_map' );