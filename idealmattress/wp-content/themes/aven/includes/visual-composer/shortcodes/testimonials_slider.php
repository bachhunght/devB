<?php 
/**
 * Testimonials Slider shortcode
 */

if ( ! function_exists( 'aven_zozo_vc_testimonials_slider_shortcode' ) ) {
	function aven_zozo_vc_testimonials_slider_shortcode( $atts, $content = NULL ) {
		
		$atts = vc_map_get_attributes( 'zozo_vc_testimonials_slider', $atts );
		extract( $atts );

		$output = '';
		global $post;
		static $testimonials_id = 1;
				
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
		
		if( isset( $auto_play ) && $auto_play != '' ) {
			$data_attr .= ' data-autoplay="' . $auto_play . '" ';
		}
		if( isset( $timeout_duration ) && $timeout_duration != '' ) {
			$data_attr .= ' data-autoplay-timeout="' . $timeout_duration . '" ';
		}

		if( isset( $infinite_loop ) && $infinite_loop != '' ) {
			$data_attr .= ' data-loop="' . $infinite_loop . '" ';
		}
		
		if( isset( $margin ) && $margin != '' ) {
			$data_attr .= ' data-margin="' . $margin . '" ';
		}
		
		if( isset( $pagination ) && $pagination != '' ) {
			$data_attr .= ' data-pagination="' . $pagination . '" ';
		}
		if( isset( $navigation ) && $navigation != '' ) {
			$data_attr .= ' data-navigation="' . $navigation . '" ';
		}
		
		$center_class = '';
		if( isset( $style ) && $style == 'style-3' ) {
			$center_class = " text-center";
		}
		
		// Classes
		$main_classes = '';
		$main_classes .= aven_zozo_vc_animation( $css_animation );
		
		if( isset( $classes ) && $classes != '' ) {
			$main_classes .= ' ' . $classes;
		}
		
		$query_args = array(
						'post_type' 		=> 'zozo_testimonial',
						'posts_per_page' 	=> -1,
						'orderby' 		 	=> 'date',
						'order' 		 	=> 'DESC',
					  );
					  
		if( $categories_id != 'all' ) {
			$query_args['tax_query'] 	= array(
											array(
												'taxonomy' 	=> 'testimonial_categories',
												'field' 	=> 'slug',
												'terms' 	=> $categories_id
											) );
		
		}
		
		$testimonial_query = new WP_Query( $query_args );
		
		if( $testimonial_query->have_posts() ) {
			$output = '<div class="zozo-testimonial-slider-wrapper'.$main_classes.'">';
			$output .= '<div id="zozo-testimonial-slider'.$testimonials_id.'" class="zozo-owl-carousel owl-carousel testimonial-carousel-slider"'.$data_attr.'>';
			
				while ($testimonial_query->have_posts()) : $testimonial_query->the_post();
					$testi_img 			= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'aven-blog-thumb');
					$author_designation = get_post_meta( $post->ID, 'zozo_author_designation', true );
					$author_company 	= get_post_meta( $post->ID, 'zozo_author_company_name', true );
					$author_company_url = get_post_meta( $post->ID, 'zozo_author_company_url', true );
					$author_rating 		= get_post_meta( $post->ID, 'zozo_author_rating', true );
					
					$output .= '<div class="testimonial-item tstyle-'.$style.''. $center_class .'">';
					
						if( isset( $style ) && $style == 'border2' ) {
							if( isset( $testi_img ) && $testi_img != '' ) {
								$output .= '<div class="testimonial-img">';
								$output .= '<img src="'.esc_url($testi_img[0]).'" width="'.esc_attr($testi_img[1]).'" height="'.esc_attr($testi_img[2]).'" alt="'.get_the_title().'" class="img-responsive img-circle" />';
								$output .= '</div>';
							}
						}
						
						if( isset( $style ) && $style == 'style-3' ) {
							$output .= '<div class="author-info-box">';
								if( isset( $testi_img ) && $testi_img != '' ) {
									$output .= '<div class="testimonial-img">';
									$output .= '<img src="'.esc_url($testi_img[0]).'" width="'.esc_attr($testi_img[1]).'" height="'.esc_attr($testi_img[2]).'" alt="'.get_the_title().'" class="img-responsive" />';
									$output .= '</div>';
								}
							
								$output .= '<div class="author-details">';
									$output .= '<p><span class="testimonial-author-name"><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></span></p>';
									$output .= '<p class="author-designation-info">';
										if( isset( $author_designation ) && $author_designation != '' ) {
											$output .= '<span class="testimonial-author-designation">'.$author_designation.'</span>';
										}
										if( isset( $author_company ) && $author_company != '' ) {
											if( isset( $author_company_url ) && $author_company_url != '' ) {
												$output .= '<span class="testimonial-author-company"><a href="'.esc_url( $author_company_url ).'" target="_blank">'.$author_company.'</a></span>';
											} else {
												$output .= '<span class="testimonial-author-company">'.$author_company.'</span>';
											}
										}
									$output .= '</p>';
								$output .= '</div>';
							$output .= '</div>';
							
							if( isset( $author_rating ) && $author_rating != '' ) {
								$output .= '<div class="testimonial-rating">';
									$output .= '<div class="rateit" data-rateit-value="'.$author_rating.'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>';
								$output .= '</div>';
							}
						}
						
						$output .= '<div class="testimonial-content">';
							if( isset( $testi_desc_type ) && $testi_desc_type == 'full_content' ) {
								$output .= '<blockquote>'. get_the_content() .'</blockquote>';
							} elseif( isset( $testi_desc_type ) && $testi_desc_type == 'excerpt' ) {
								$output .= '<blockquote><p>'. aven_zozo_shortcode_stripped_excerpt( get_the_content(), $excerpt_limit ) .'</p></blockquote>';
							}
							
							if( isset( $style ) && $style != 'style-3' ) {
								if( isset( $author_rating ) && $author_rating != '' ) {
									$output .= '<div class="testimonial-rating">';
										$output .= '<div class="rateit" data-rateit-value="'.$author_rating.'" data-rateit-ispreset="true" data-rateit-readonly="true"></div>';
									$output .= '</div>';
								}
							}
						$output .= '</div>';
						
						
						if( isset( $style ) && $style != 'style-3' ) {
							$output .= '<div class="author-info-box">';
								if( isset( $style ) && $style != 'border2' ) {
									if( isset( $testi_img ) && $testi_img != '' ) {
										$output .= '<div class="testimonial-img">';
										$output .= '<img src="'.esc_url($testi_img[0]).'" width="'.esc_attr($testi_img[1]).'" height="'.esc_attr($testi_img[2]).'" alt="'.get_the_title().'" class="img-responsive" />';
										$output .= '</div>';
									}
								}
							
								$output .= '<div class="author-details">';
									$output .= '<p><span class="testimonial-author-name"><a href="'.get_permalink().'" title="'.get_the_title().'">'.get_the_title().'</a></span></p>';
									$output .= '<p class="author-designation-info">';
										if( isset( $author_designation ) && $author_designation != '' ) {
											$output .= '<span class="testimonial-author-designation">'.$author_designation.'</span>';
										}
										if( isset( $author_company ) && $author_company != '' ) {
											if( isset( $author_company_url ) && $author_company_url != '' ) {
												$output .= '<span class="testimonial-author-company"><a href="'.esc_url( $author_company_url ).'" target="_blank">'.$author_company.'</a></span>';
											} else {
												$output .= '<span class="testimonial-author-company">'.$author_company.'</span>';
											}
										}
									$output .= '</p>';
								$output .= '</div>';
							$output .= '</div>';
						}
							
					$output .= '</div>';
					
				endwhile;
				
			$output .= '</div>';
			$output .= '</div>';
		}
		
		$testimonials_id++;
		wp_reset_postdata();
		
		return $output;
	}
}

if ( ! function_exists( 'aven_zozo_vc_testimonials_slider_shortcode_map' ) ) {
	function aven_zozo_vc_testimonials_slider_shortcode_map() {
				
		vc_map( 
			array(
				"name"					=> esc_html__( "Testimonials Slider", "aven" ),
				"description"			=> esc_html__( "Show your testimonials in Slider.", 'aven' ),
				"base"					=> "zozo_vc_testimonials_slider",
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
							esc_html__( "No", "aven" )						=> '',
							esc_html__( "Top to bottom", "aven" )			=> "top-to-bottom",
							esc_html__( "Bottom to top", "aven" )			=> "bottom-to-top",
							esc_html__( "Left to right", "aven" )			=> "left-to-right",
							esc_html__( "Right to left", "aven" )			=> "right-to-left",
							esc_html__( "Appear from center", "aven" )		=> "appear" ),
					),
					array(
						"type"			=> 'dropdown',
						"admin_label" 	=> true,
						"heading"		=> esc_html__( "Testimonial Style", "aven" ),
						"param_name"	=> "style",
						"value"			=> array(
							esc_html__( 'Default Style', 'aven' ) 	=> "default",
							esc_html__( 'Style 1', 'aven' ) 		=> "border",
							esc_html__( 'Style 2', 'aven' ) 		=> "border2",
							esc_html__( 'Style 3', 'aven' ) 		=> "style-3" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Testimonial Description Type", "aven" ),
						"param_name"	=> "testi_desc_type",
						"value"			=> array(
							esc_html__( "Excerpt", "aven" )			=> "excerpt",
							esc_html__( "Full Content", "aven" )		=> "full_content" ),
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__( 'Excerpt Limit', 'aven' ),
						'param_name'	=> "excerpt_limit",
						'value'			=> "35",
						'dependency'	=> array(
							'element'	=> "testi_desc_type",
							'value'		=> 'excerpt'
						),
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
				)
			) 
		);
	}
}
add_action( 'vc_before_init', 'aven_zozo_vc_testimonials_slider_shortcode_map' );