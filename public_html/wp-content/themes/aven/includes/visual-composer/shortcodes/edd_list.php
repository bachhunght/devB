<?php 
/**
 * The Easy Digital Downloads List shortcode
 */

if ( ! function_exists( 'aven_zozo_vc_edd_list_shortcode' ) ) {
	function aven_zozo_vc_edd_list_shortcode( $atts, $content = NULL ) {
	
		/**
		 * Check if easy digital downloads class exists
		 */
		if ( ! class_exists( 'Easy_Digital_Downloads' ) ) {
			return;
		}
		
		$atts = vc_map_get_attributes( 'zozo_vc_edd_list', $atts );
		extract( $atts );

		$output = '';
		$extra_class = '';
		static $edd_id = 1;
		
		global $post;
		
		if( isset( $edd_listtype ) && $edd_listtype == 'categories' ) {
			// Include categories
			$include_categories = ( '' != $include_categories ) ? $include_categories : '';
			$include_categories = ( 'all' == $include_categories ) ? '' : $include_categories;
			$include_filter_cats = '';
			if( $include_categories ) {
				$include_categories = explode( ',', $include_categories );
				$include_filter_cats = array();
				foreach( $include_categories as $key ) {
					$key = get_term_by( 'slug', $key, 'download_category' );
					$include_filter_cats[] = $key->term_id;
				}
			}
			
			if ( ! empty( $include_categories ) && is_array( $include_categories ) ) {
				$include_categories = array(
					'taxonomy'	=> 'download_category',
					'field'		=> 'slug',
					'terms'		=> $include_categories,
					'operator'	=> 'IN',
				);
			} else {
				$include_categories = '';
			}
		
			// Exclude categories
			$exclude_filter_cats = '';
			if( $exclude_categories ) {
				$exclude_categories = explode( ',', $exclude_categories );
				if ( ! empty( $exclude_categories ) && is_array( $exclude_categories ) ) {
					$exclude_filter_cats = array();
					foreach ( $exclude_categories as $key ) {
						$key = get_term_by( 'slug', $key, 'download_category' );
						$exclude_filter_cats[] = $key->term_id;
					}
					$exclude_categories = array(
							'taxonomy'	=> 'download_category',
							'field'		=> 'slug',
							'terms'		=> $exclude_categories,
							'operator'	=> 'NOT IN',
						);
				} else {
					$exclude_categories = '';
				}
			}
		} else if( isset( $edd_listtype ) && $edd_listtype == 'tags' ) {
			// Include tags
			$include_tags = ( '' != $include_tags ) ? $include_tags : '';
			$include_tags = ( 'all' == $include_tags ) ? '' : $include_tags;
			$include_filter_tags = '';
			if( $include_tags ) {
				$include_tags = explode( ',', $include_tags );
				$include_filter_tags = array();
				foreach( $include_tags as $key ) {
					$key = get_term_by( 'slug', $key, 'download_tag' );
					$include_filter_tags[] = $key->term_id;
				}
			}
			
			if ( ! empty( $include_tags ) && is_array( $include_tags ) ) {
				$include_tags = array(
					'taxonomy'	=> 'download_tag',
					'field'		=> 'slug',
					'terms'		=> $include_tags,
					'operator'	=> 'IN',
				);
			} else {
				$include_tags = '';
			}
		
			// Exclude tags
			$exclude_filter_tags = '';
			if( $exclude_tags ) {
				$exclude_tags = explode( ',', $exclude_tags );
				if ( ! empty( $exclude_tags ) && is_array( $exclude_tags ) ) {
					$exclude_filter_tags = array();
					foreach ( $exclude_tags as $key ) {
						$key = get_term_by( 'slug', $key, 'download_tag' );
						$exclude_filter_tags[] = $key->term_id;
					}
					$exclude_tags = array(
							'taxonomy'	=> 'download_tag',
							'field'		=> 'slug',
							'terms'		=> $exclude_tags,
							'operator'	=> 'NOT IN',
						);
				} else {
					$exclude_tags = '';
				}
			}
		} else if( isset( $edd_listtype ) && $edd_listtype == 'ids' ) {
			// Include Downloads
			$include_postids = ( '' != $include_downloads ) ? $include_downloads : '';
			$include_filter_ids = '';
			if( $include_postids ) {
				$include_postids = explode( ',', $include_downloads );
				$include_filter_ids = array();
				foreach( $include_postids as $key ) {
					$include_filter_ids[] = $key;
				}
			}
			
			// Exclude Downloads
			$exclude_postids = ( '' != $exclude_downloads ) ? $exclude_downloads : '';
			$exclude_filter_ids = '';
			if( $exclude_postids ) {
				$exclude_postids = explode( ',', $exclude_downloads );
				$exclude_filter_ids = array();
				foreach( $exclude_postids as $key ) {
					$exclude_filter_ids[] = $key;
				}
			}
		}
		
		$query_relation = $relation;
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
		$query_args = array(
						'post_type' 		=> 'download',
						'posts_per_page'	=> $posts,
						'paged' 			=> $paged,
						'orderby' 		 	=> $orderby,
						'order' 		 	=> $order,
					  );
					  
		switch ( $orderby ) {
			case 'price':
				$query_args['meta_key'] = 'edd_price';
				$query_args['orderby']  = 'meta_value_num';
			break;
	
			case 'title':
				$query_args['orderby'] = 'title';
			break;
	
			case 'id':
				$query_args['orderby'] = 'ID';
			break;
	
			case 'random':
				$query_args['orderby'] = 'rand';
			break;
	
			default:
				$query_args['orderby'] = 'post_date';
			break;
		}
		
		if( isset( $edd_listtype ) && $edd_listtype == 'categories' ) {
			if ( ! empty( $exclude_categories ) && is_array( $exclude_categories ) ) {
				$query_relation = 'AND';
			}
			$query_args['tax_query'] 	= array(
											'relation'	=> $query_relation,
											$include_categories,
											$exclude_categories );
		} 
		else if( isset( $edd_listtype ) && $edd_listtype == 'tags' ) {
			if ( ! empty( $exclude_tags ) && is_array( $exclude_tags ) ) {
				$query_relation = 'AND';
			}
			$query_args['tax_query'] 	= array(
											'relation'	=> $query_relation,
											$include_tags,
											$exclude_tags );
		} 
		else if( isset( $edd_listtype ) && $edd_listtype == 'ids' ) {
			if( $include_filter_ids != '' ) {
				$query_args['post__in'] 	= $include_filter_ids;
			}
			
			if( $exclude_filter_ids != '' ) {
				$query_args['post__not_in'] = $exclude_filter_ids;
			}
		}
		
		// Allow the query to be manipulated by other plugins
		$query_args = apply_filters( 'edd_downloads_query', $query_args, $atts );
		
		$downloads = new WP_Query( $query_args );
		
		// Classes
		$main_classes = 'zozo-downloads-list-wrapper';
		
		if( isset( $classes ) && $classes != '' ) {
			$main_classes .= ' ' . $classes;
		}
		$main_classes .= aven_zozo_vc_animation( $css_animation );
		$main_classes .= ' style-'. $edd_style;
		$main_classes .= ' clearfix';
		
		$row_class = '';
		$column_class = '';
		if( isset( $edd_style ) && $edd_style == 'grid' ) {
			$row_class = ' row';
			if( isset( $columns ) && $columns != '' ) {
				if( isset( $columns ) && $columns == '1' ) {
					$column_class = ' col-md-12 col-xs-12';
				} else if( isset( $columns ) && $columns == '2' ) {
					$column_class = ' col-md-6 col-sm-6 col-xs-12';
				} else if( isset( $columns ) && $columns == '3' ) {
					$column_class = ' col-md-4 col-sm-6 col-xs-12';
				} else if( isset( $columns ) && $columns == '4' ) {
					$column_class = ' col-md-3 col-sm-6 col-xs-12';
				}
			} else {
				$column_class = ' col-md-12 col-xs-12';
			}
		}
		
		if( isset( $title_transform ) && $title_transform != '' ) {
			$extra_class = ' text-'.$title_transform.'';
		}
		
		// Stylings
		$title_styles = '';
		if( isset( $title_color ) && $title_color != '' ) {
			$title_styles = 'color: '. $title_color .';';
		}
		if( isset( $title_size ) && $title_size != '' ) {
			$title_styles .= 'font-size:'. $title_size .';';
		}
		if( $title_styles ) {
			$title_styles = ' style="'. $title_styles  .'"';
		}
		
		$content_styles = '';
		if( isset( $content_color ) && $content_color != '' ) {
			$content_styles = ' style="color: '. $content_color .';"';
		}
		
		$price_styles = '';
		if( isset( $price_color ) && $price_color != '' ) {
			$price_styles = ' style="color: '. $price_color .';"';
		}
		
		if ( $downloads->have_posts() ) :
			$i = 1;
			$wrapper_class = 'edd_download_columns_' . $columns;
		
			$output .= '<div id="zozo_edd_'.$edd_id.'" class="'. esc_attr( $main_classes ) .'">';
				$output .= '<div class="edd_downloads_list'.$row_class.' '. apply_filters( 'edd_downloads_list_wrapper_class', $wrapper_class, $atts ) .'">';
				
				while ( $downloads->have_posts() ) : $downloads->the_post();
					$schema = edd_add_schema_microdata() ? 'itemscope itemtype="http://schema.org/Product" ' : '';
					
					$output .= '<div '. $schema .'class="edd-column'.$column_class.' '. apply_filters( 'edd_download_class', 'edd_download', get_the_ID(), $atts, $i ) .'" id="edd_download_'. get_the_ID() .'">';
					$output .= '<div class="edd_download_inner">';
					
						do_action( 'edd_download_before' );
						
						// Image
						if( isset( $thumbnails ) && $thumbnails == 'yes' ) {
							if( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail( get_the_ID() ) ) {
								$output .= '<div class="edd_download_image">';
									$output .= '<a href="'. get_permalink() .'" title="'. the_title_attribute( 'echo=0' ) .'">';
										$output .= get_the_post_thumbnail( get_the_ID(), 'aven-theme-mid' );
									$output .= '</a>';
								$output .= '</div>';
							}
							do_action( 'edd_download_after_thumbnail' );
						}
						
						$output .= '<div class="edd_download_content_wrapper">';
						
						// Title
						$output .= '<'. $title_type .' itemprop="name" class="edd_download_title'.$extra_class.'"><a title="'. the_title_attribute( 'echo=0' ) .'" href="' . get_permalink() . '" itemprop="url"'.$title_styles.'>' . get_the_title() . '</a></'. $title_type .'>';
						do_action( 'edd_download_after_title' );
						
						// Price
						if ( $price == 'yes' ) {
							if( edd_has_variable_prices( get_the_ID() ) ) :
								$output .= '<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">';
									$output .= '<div itemprop="price" class="edd_price"'. $price_styles .'>';
										$output .= edd_price_range( get_the_ID() );
									$output .= '</div>';
								$output .= '</div>';
							else :
								$output .= '<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">';
									$output .= '<div itemprop="price" class="edd_price"'. $price_styles .'>';
										ob_start();
										edd_price( get_the_ID() );
										$output .= ob_get_clean();
									$output .= '</div>';
								$output .= '</div>';
							endif;
							do_action( 'edd_download_after_price' );
						}
						
						// Content
						if( isset( $excerpt_length ) && $excerpt_length == '' ) {
							$excerpt_length = 30;
						}
						if( $excerpt == 'yes' && $full_content != 'yes' ) {
							if( has_excerpt() ) :
								$output .= '<div itemprop="description" class="edd_download_excerpt"'. $content_styles .'>';
									$output .= apply_filters( 'edd_downloads_excerpt', aven_zozo_shortcode_stripped_excerpt( get_post_field( 'post_excerpt', get_the_ID() ), $excerpt_length ) );
								$output .= '</div>';
							elseif( get_the_content() ) :
								$output .= '<div itemprop="description" class="edd_download_excerpt"'. $content_styles .'>';
									$output .= apply_filters( 'edd_downloads_excerpt', aven_zozo_shortcode_stripped_excerpt( get_post_field( 'post_content', get_the_ID() ), $excerpt_length ) );
								$output .= '</div>';
							endif;
							do_action( 'edd_download_after_content' );
						}
						else if( $full_content == 'yes' ) {
							$output .= '<div itemprop="description" class="edd_download_full_content"'. $content_styles .'>';
								$output .= apply_filters( 'edd_downloads_content', get_post_field( 'post_content', get_the_ID() ) );
							$output .= '</div>';
							do_action( 'edd_download_after_content' );
						}
						
						// Button
						if ( $buy_button == 'yes' ) {
							$output .= '<div class="edd_download_buy_button">';
								if ( ! edd_has_variable_prices( get_the_ID() ) ) :
									$output .= edd_get_purchase_link( array( 'download_id' => get_the_ID() ) );
								else :
									$output .= '<a href="'. get_permalink() .'" title="'. the_title_attribute( 'echo=0' ) .'" class="btn edd-single-link">'. esc_html__( 'Select Options', 'aven' ) . '</a>';
								endif;
							$output .= '</div>';
						}
						
						$output .= '</div>';
						
						do_action( 'edd_download_after' );
					
					$output .= '</div>';
					$output .= '</div>';
				$i++; 
				endwhile;
				
				$output .= '</div>';
				
				wp_reset_postdata();
				
				if( $pagination == 'yes' ) {
					$output .= aven_zozo_pagination( $downloads->max_num_pages, 'pagination' );
				}
				
			$output .= '</div>';
		else:
			$output .= sprintf( _x( 'No %s found', 'download post type name', 'aven' ), edd_get_label_plural() );
		endif;
		
		$edd_id++;
		return $output;
	}
}

if ( ! function_exists( 'aven_zozo_vc_edd_list_shortcode_map' ) ) {
	function aven_zozo_vc_edd_list_shortcode_map() {
		
		vc_map( 
			array(
				"name"					=> esc_html__( "Easy Digital Downloads", "aven" ),
				"description"			=> esc_html__( "List your downloads from EDD Plugin.", 'aven' ),
				"base"					=> "zozo_vc_edd_list",
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
						"heading"		=> esc_html__( "Style", "aven" ),
						"param_name"	=> "edd_style",						
						"value"			=> array(
							esc_html__( "List", "aven" )		=> "list",
							esc_html__( "Grid", "aven" )		=> "grid" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Columns", "aven" ),
						"param_name"	=> "columns",
						"value"			=> array(
							esc_html__( "One Column", "aven" )		=> "1",
							esc_html__( "Two Columns", "aven" )		=> "2",
							esc_html__( "Three Columns", "aven" )		=> "3",
							esc_html__( "Four Columns", "aven" )		=> "4" ),
						'dependency' 	=> array(
							'element' 	=> 'edd_style',
							'value' 	=> array( 'grid' ),
						),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Posts per Page", "aven" ),
						"admin_label" 	=> true,
						"param_name"	=> "posts",						
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "List Events", "aven" ),
						"param_name"	=> "edd_listtype",
						"admin_label" 	=> true,
						"value"			=> array(
							esc_html__( "Categories", "aven" )		=> "categories",
							esc_html__( "Tags", "aven" )				=> "tags",
							esc_html__( "List of IDs", "aven" )		=> "ids" ),
					),
					array(
						'type' 			=> 'autocomplete',
						'heading' 		=> esc_html__( 'Include Downloads', 'aven' ),
						'param_name' 	=> 'include_downloads',
						"admin_label" 	=> true,
						'description' 	=> esc_html__( 'Add downloads by title.', 'aven' ),
						'settings' 		=> array(
							'multiple' 	=> true,
							'sortable' 	=> true,
						),
						'dependency' 	=> array(
							'element' 	=> 'edd_listtype',
							'value' 	=> array( 'ids' ),
						),
					),
					array(
						'type' 			=> 'autocomplete',
						'heading' 		=> esc_html__( 'Exclude Downloads', 'aven' ),
						'param_name' 	=> 'exclude_downloads',
						"admin_label" 	=> true,
						'description' 	=> esc_html__( 'Exclude downloads by title.', 'aven' ),
						'settings' 		=> array(
							'multiple' 	=> true,
							'sortable' 	=> true,
						),
						'dependency' 	=> array(
							'element' 	=> 'edd_listtype',
							'value' 	=> array( 'ids' ),
						),
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__( 'Include Categories', 'aven' ),
						'param_name'	=> 'include_categories',
						'admin_label'	=> true,
						'description'	=> esc_html__('Enter the slugs of a categories (comma seperated) to pull posts from or enter "all" to pull recent posts from all categories. Example: category-1, category-2.','aven'),
						'dependency' 	=> array(
							'element' 	=> 'edd_listtype',
							'value' 	=> array( 'categories' ),
						),
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__( 'Exclude Categories', 'aven' ),
						'param_name'	=> 'exclude_categories',
						'admin_label'	=> true,
						'description'	=> esc_html__('Enter the slugs of a categories (comma seperated) to exclude. Example: category-1, category-2.','aven'),
						'dependency' 	=> array(
							'element' 	=> 'edd_listtype',
							'value' 	=> array( 'categories' ),
						),
					),	
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__( 'Include Tags', 'aven' ),
						'param_name'	=> 'include_tags',
						'admin_label'	=> true,
						'description'	=> esc_html__('Enter the slugs of a categories (comma seperated) to pull posts from or enter "all" to pull recent posts from all categories. Example: category-1, category-2.','aven'),
						'dependency' 	=> array(
							'element' 	=> 'edd_listtype',
							'value' 	=> array( 'tags' ),
						),
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__( 'Exclude Tags', 'aven' ),
						'param_name'	=> 'exclude_tags',
						'admin_label'	=> true,
						'description'	=> esc_html__('Enter the slugs of a categories (comma seperated) to exclude. Example: category-1, category-2.','aven'),
						'dependency' 	=> array(
							'element' 	=> 'edd_listtype',
							'value' 	=> array( 'tags' ),
						),
					),	
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Relation", "aven" ),
						"param_name"	=> "relation",
						"value"			=> array(
							esc_html__( "OR", "aven" )		=> "OR",
							esc_html__( "AND", "aven" )		=> "AND",							
						),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Show Pagination ?", "aven" ),
						"param_name"	=> "pagination",	
						"value"			=> array(
							esc_html__( "Yes", "aven" )		=> "yes",
							esc_html__( "No", "aven" )		=> "no" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Show Price ?", "aven" ),
						"param_name"	=> "price",	
						"value"			=> array(
							esc_html__( "Yes", "aven" )		=> "yes",
							esc_html__( "No", "aven" )		=> "no" ),
					),	
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Show Excerpt ?", "aven" ),
						"param_name"	=> "excerpt",	
						"value"			=> array(
							esc_html__( "Yes", "aven" )		=> "yes",
							esc_html__( "No", "aven" )		=> "no" ),
					),
					array(
						"type"			=> 'textfield',
						"heading"		=> esc_html__( "Excerpt Length", "aven" ),
						"param_name"	=> "excerpt_length",	
						"value"			=> "",
						'dependency'	=> array(
							'element'	=> 'excerpt',
							'value'		=> array( 'yes' ),
						),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Show Full Content ?", "aven" ),
						"param_name"	=> "full_content",	
						"value"			=> array(
							esc_html__( "No", "aven" )		=> "no",
							esc_html__( "Yes", "aven" )		=> "yes" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Show Buy Button ?", "aven" ),
						"param_name"	=> "buy_button",	
						"value"			=> array(
							esc_html__( "Yes", "aven" )		=> "yes",
							esc_html__( "No", "aven" )		=> "no" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Show Thumbnails ?", "aven" ),
						"param_name"	=> "thumbnails",	
						"value"			=> array(
							esc_html__( "Yes", "aven" )		=> "yes",
							esc_html__( "No", "aven" )		=> "no" ),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Order By", "aven" ),
						"param_name"	=> "orderby",
						"value"			=> array(
							esc_html__( "Price", "aven" )		=> "price",
							esc_html__( "ID", "aven" )		=> "id",
							esc_html__( "Random", "aven" )	=> "random",
							esc_html__( "Post Date", "aven" )	=> "post_date",
							esc_html__( "Title", "aven" )		=> "title",
						),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Order", "aven" ),
						"param_name"	=> "order",
						"value"			=> array(
							esc_html__( "ASC", "aven" )		=> "ASC",
							esc_html__( "DESC", "aven" )		=> "DESC",							
						),
					),
					array(
						"type"			=> 'dropdown',
						"heading"		=> esc_html__( "Downloads Title Type", "aven" ),
						"param_name"	=> "title_type",
						"value"			=> array(
							esc_html__( "h2", "aven" )	=> "h2",
							esc_html__( "h3", "aven" )	=> "h3",
							esc_html__( "h4", "aven" )	=> "h4",
							esc_html__( "h5", "aven" )	=> "h5",
							esc_html__( "h6", "aven" )	=> "h6",
						),
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html__( "Downloads Title Text Transform", 'aven' ),
						"param_name"	=> "title_transform",
						"value"			=> array(
							esc_html__( "Default", 'aven' )		=> '',
							esc_html__( "None", 'aven' )			=> 'none',
							esc_html__( "Capitalize", 'aven' )	=> 'capitalize',
							esc_html__( "Uppercase", 'aven' )		=> 'uppercase',
							esc_html__( "Lowercase", 'aven' )		=> 'lowercase',
						),
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html__( "Downloads Title Font Size", "aven" ),
						"param_name"	=> "title_size",
						"description" 	=> esc_html__( "Enter Title Font Size in px. Ex: 18px", "aven" ),
					),
					array(
						"type"			=> 'colorpicker',
						"heading"		=> esc_html__( "Title Color", "aven" ),
						"param_name"	=> "title_color",
						"group"			=> esc_html__( "Design", "aven" ),
					),
					array(
						"type"			=> 'colorpicker',
						"heading"		=> esc_html__( "Content Color", "aven" ),
						"param_name"	=> "content_color",
						"group"			=> esc_html__( "Design", "aven" ),
					),
					array(
						"type"			=> 'colorpicker',
						"heading"		=> esc_html__( "Price Color", "aven" ),
						"param_name"	=> "price_color",
						"group"			=> esc_html__( "Design", "aven" ),
					),
				)
			) 
		);
		
		//Filters For autocomplete param:
		//For suggestion: vc_autocomplete_[shortcode_name]_[param_name]_callback
		add_filter( 'vc_autocomplete_zozo_vc_edd_list_include_downloads_callback', 'zozo_vc_edd_list_include_field_search', 10, 1 ); // Get suggestion(find). Must return an array
		add_filter( 'vc_autocomplete_zozo_vc_edd_list_include_downloads_render', 'zozo_vc_edd_list_include_field_render', 10, 1 ); // Render exact post. Must return an array (label,value)
		add_filter( 'vc_autocomplete_zozo_vc_edd_list_exclude_downloads_callback', 'zozo_vc_edd_list_exclude_field_search', 10, 1 ); // Get suggestion(find). Must return an array
		add_filter( 'vc_autocomplete_zozo_vc_edd_list_exclude_downloads_render', 'zozo_vc_edd_list_exclude_field_render', 10, 1 ); // Render exact post. Must return an array (label,value)
		
		/**
		 * @param $search_string
		 *
		 * @return array
		 */
		function zozo_vc_edd_list_include_field_search( $search_string ) {
			$query = $search_string;
			$data = array();
			$args = array( 's' => $query, 'post_type' => 'download' );
			$args['vc_search_by_title_only'] = true;
			$args['numberposts'] = - 1;
			if ( strlen( $args['s'] ) == 0 ) {
				unset( $args['s'] );
			}
			add_filter( 'posts_search', 'vc_search_by_title_only', 500, 2 );
			$posts = get_posts( $args );
			if ( is_array( $posts ) && ! empty( $posts ) ) {
				foreach ( $posts as $post ) {
					$data[] = array(
						'value' => $post->ID,
						'label' => $post->post_title,
						'group' => $post->post_type,
					);
				}
			}
		
			return $data;
		}
		
		/**
		 * @param $value
		 *
		 * @return array|bool
		 */
		function zozo_vc_edd_list_include_field_render( $value ) {
			$post = get_post( $value['value'] );
		
			return is_null( $post ) ? false : array(
				'label' => $post->post_title,
				'value' => $post->ID,
				'group' => $post->post_type
			);
		}
		
		/**
		 * @param $data_arr
		 *
		 * @return array
		 */
		function zozo_vc_edd_list_exclude_field_search( $data_arr ) {
			if( is_array( $data_arr ) ) {
				$query = isset( $data_arr['query'] ) ? $data_arr['query'] : null;
				$term = isset( $data_arr['term'] ) ? $data_arr['term'] : "";
			} else {
				$query = $data_arr;
			}
			$data = array();
			
			$args = ! empty( $query ) ? array( 's' => $query, 'post_type' => 'download' ) : array( 's' => $term, 'post_type' => 'download' );
			
			$args['vc_search_by_title_only'] = true;
			$args['numberposts'] = - 1;
			if ( strlen( $args['s'] ) == 0 ) {
				unset( $args['s'] );
			}
			add_filter( 'posts_search', 'vc_search_by_title_only', 500, 2 );
			$posts = get_posts( $args );
			if ( is_array( $posts ) && ! empty( $posts ) ) {
				foreach ( $posts as $post ) {
					$data[] = array(
						'value' => $post->ID,
						'label' => $post->post_title,
						'group' => $post->post_type,
					);
				}
			}
		
			return $data;
		}
		
		/**
		 * @param $value
		 *
		 * @return array|bool
		 */
		function zozo_vc_edd_list_exclude_field_render( $value ) {
			$post = get_post( $value['value'] );
		
			return is_null( $post ) ? false : array(
				'label' => $post->post_title,
				'value' => $post->ID,
				'group' => $post->post_type
			);
		}
		
	}
}
add_action( 'vc_before_init', 'aven_zozo_vc_edd_list_shortcode_map' );