<?php
/**
 * Blog Functions
 */

// Blog Featured Image or Slider
function aven_zozo_output_blog_post_slider( $post_id, $image_size, $gallery_images_type = '', $layout = '' ) {

	global $post;
	
	if( ! isset( $image_size ) || isset( $image_size ) && $image_size == '' ) {
		$image_size = 'aven-blog-large';
	} 
	
	$output = '';
	
	// Slider Configuration
	$data_attr = '';
	
	if( aven_zozo_get_theme_option( 'zozo_blog_slideshow_autoplay' ) == 1 ) {
		$data_attr .= ' data-autoplay=true ';
	} else {
		$data_attr .= ' data-autoplay=false ';
	}
	
	if( aven_zozo_get_theme_option( 'zozo_blog_slideshow_timeout' ) != '' ) {
		$data_attr .= ' data-timeout=' . aven_zozo_get_theme_option( 'zozo_blog_slideshow_timeout' ) . ' ';
	}
	
	$data_attr .= ' data-nav=true data-loop=true';

	// Gallery Slider
	if( is_single() ) {
		if( isset( $gallery_images_type ) && $gallery_images_type == 'carousel' ) {
			$gallery_attr = '';
		
			if( aven_zozo_get_theme_option( 'zozo_single_blog_citems' ) != '' ) {
				$gallery_attr .= ' data-items=' . aven_zozo_get_theme_option( 'zozo_single_blog_citems' ) . ' ';
			}
			
			if( aven_zozo_get_theme_option( 'zozo_single_blog_citems_scroll' ) != '' ) {
				$gallery_attr .= ' data-slideby=' . aven_zozo_get_theme_option( 'zozo_single_blog_citems_scroll' ) . ' ';
			}
			
			if( aven_zozo_get_theme_option( 'zozo_single_blog_ctablet' ) != '' ) {
				$gallery_attr .= ' data-md=' . aven_zozo_get_theme_option( 'zozo_single_blog_ctablet' ) . ' ';
			}
			
			if( aven_zozo_get_theme_option( 'zozo_single_blog_cmlandscape' ) != '' ) {
				$gallery_attr .= ' data-sm=' . aven_zozo_get_theme_option( 'zozo_single_blog_cmlandscape' ) . ' ';
			}
			
			if( aven_zozo_get_theme_option( 'zozo_single_blog_cmportrait' ) != '' ) {
				$gallery_attr .= ' data-xs=' . aven_zozo_get_theme_option( 'zozo_single_blog_cmportrait' ) . ' ';
			}
			
			if( aven_zozo_get_theme_option( 'zozo_single_blog_cautoplay' ) == 1 ) {
				$gallery_attr .= ' data-autoplay=true ';
			} else {
				$gallery_attr .= ' data-autoplay=false ';
			}
			
			if( aven_zozo_get_theme_option( 'zozo_single_blog_ctimeout' ) != '' ) {
				$gallery_attr .= ' data-timeout=' . aven_zozo_get_theme_option( 'zozo_single_blog_ctimeout' ) . ' ';
			}
			
			if( aven_zozo_get_theme_option( 'zozo_single_blog_cloop' ) == 1 ) {
				$gallery_attr .= ' data-loop=true ';
			} else {
				$gallery_attr .= ' data-loop=false ';
			}
			
			if( aven_zozo_get_theme_option( 'zozo_single_blog_cmargin' ) != '' ) {
				$gallery_attr .= ' data-margin=' . aven_zozo_get_theme_option( 'zozo_single_blog_cmargin' ) . ' ';
			}
			
			if( aven_zozo_get_theme_option( 'zozo_single_blog_cdots' ) == 1 ) {
				$gallery_attr .= ' data-dots=true ';
			} else {
				$gallery_attr .= ' data-dots=false ';
			}
			
			if( aven_zozo_get_theme_option( 'zozo_single_blog_cnav' ) == 1 ) {
				$gallery_attr .= ' data-nav=true ';
			} else {
				$gallery_attr .= ' data-nav=false ';
			}
		}
	}

	$audio_code = $video_code = '';
	$audio_code = get_post_meta( $post_id, 'zozo_single_audio_code', true );
	$video_code = get_post_meta( $post_id, 'zozo_single_video_code', true );
		
	if( has_post_format('link') ) {
		$external_url = '';
		$external_url = get_post_meta( $post_id, 'zozo_external_link_url', true );
		if( isset( $external_url ) && $external_url == '' ) {
			$external_url = get_permalink( $post_id );
		}
	}

	if ( has_post_thumbnail() && ! post_password_required() ) {

		if( has_post_format('gallery') ) {
		
			$output .= '<div class="post-featured-image featured-gallery-slider">';
				$output .= '<div class="entry-thumbnail-wrapper nested-carousel zozo-owl-wrapper">';
					$output .= '<div class="zozo-owl-slider owl-carousel-container owl-carousel-loading">';
					if( is_single() && isset( $gallery_images_type ) && $gallery_images_type == 'carousel' ) {
						$output .= '<div id="zozo_owl_' . $post_id .'" class="entry-thumbnail owl-carousel blog-single-carousel-slider"'. esc_attr( $gallery_attr ) .'>';
							$output .= aven_get_gallery_post_images( 'aven-blog-medium', $post_id, 'no' );
						$output .= '</div>';
					} else {
						$output .= '<div id="zozo_owl_' . $post_id .'" class="entry-thumbnail owl-carousel blog-carousel-slider"'. esc_attr( $data_attr ) .'>';
							$output .= aven_get_gallery_post_images( $image_size, $post_id, 'no' );
						$output .= '</div>';
					}
					$output .= '</div>';
				$output .= '</div>';
			$output .= '</div>';
			
		} else { 
	
			if( is_single() && ( has_post_format('audio') || has_post_format('video') ) ) { 
				if( has_post_format('audio') && $audio_code != '' ) {
					// ========== Audio Player ==========
					$output .= '<div class="audio-player blog-audio-player">';
						$output .= do_shortcode( $audio_code );
					$output .= '</div>			';
				} else if( has_post_format('video') && $video_code != '' ) {
					$output .= '<div class="video-player blog-video-player">';
						$output .= do_shortcode( $video_code );
					$output .= '</div>';
				} 
			} else {
				$output .= '<div class="post-featured-image only-image">';
				$output .= '<div class="entry-thumbnail-wrapper">';
					$output .= '<div class="entry-thumbnail">';
						if( ! is_single() ) {
							if( has_post_format('link') ) { 
								$output .= '<a href="'. esc_url($external_url) .'" title="'. get_the_title() .'" target="_blank" class="post-img">';
							} else {
								$output .= '<a href="'. get_permalink() .'" title="'. get_the_title() .'" class="post-img">';
							} 
						}
						
						$output .= get_the_post_thumbnail( $post_id, $image_size );
						
						if( ! is_single() ) {
							$output .= '</a>';
						}
					$output .= '</div>';
				$output .= '</div>';
				$output .= '</div>';
			}
		
		}
	
	} else if ( ! has_post_thumbnail() ) { 
	
		if( has_post_format('audio') ) {
			// ========== Audio Player ==========
			$output .= '<div class="audio-player blog-audio-player">';
				$output .= do_shortcode( get_post_meta( $post_id, 'zozo_single_audio_code', true ) );
			$output .= '</div>';
		} 
		
		else if( has_post_format('video') ) {
			$output .= '<div class="video-player blog-video-player">';
				$output .= do_shortcode( get_post_meta( $post_id, 'zozo_single_video_code', true ) );
			$output .= '</div>';
		}
		
	}
	
	return $output;
		
}

// Blog Metro Style Image
function aven_zozo_get_blog_post_media( $post_id, $thumb_width, $thumb_height ) {
	$thumb_image   = get_post_thumbnail_id( $post_id );
	$image_id      = $thumb_image;
	$thumb_img_url = wp_get_attachment_url( $thumb_image, 'full' );
	
	$image = array();
	if( function_exists('aven_zozo_aq_resize') ) {
		$image        = aven_zozo_aq_resize( $thumb_img_url, $thumb_width, $thumb_height, false, false );
	} else {
		$image[0] = wp_get_attachment_url( $thumb_image, 'aven-blog-medium' );
		$image[1] = 570;
		$image[2] = 370;
	}
	$image_alt    = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
	
	if( $thumb_img_url == '' && ! has_post_thumbnail( $post_id ) ) {
		if( isset( $thumb_width ) && $thumb_width == '' ) {
			$thumb_width = 530;
		}
		
		if( isset( $thumb_height ) && $thumb_height == '' ) {
			$thumb_height = 400;
		}
		$image[0] = 'https://placehold.it/'. $thumb_width .'x'. $thumb_height .'?text=No+Image';
		$image[1] = $thumb_width;
		$image[2] = $thumb_height;
	}
	
	$image[3] = $image_alt;
	
	return $image;
}

// Blog Large Style Output
function aven_zozo_output_blog_large_layout( $post_id, $post_class, $image_size, $excerpt_limit, $meta_array, $layout ) {

	$output = '';
	
	if( has_post_format('link') ) {
		$external_url = '';
		$external_url = get_post_meta( $post_id, 'zozo_external_link_url', true );
		if( isset( $external_url ) && $external_url == '' ) {
			$external_url = get_permalink( $post_id );
		}
	}
	
	if( ! isset( $post_class ) || isset( $post_class ) && $post_class == '' ) {
		$post_class = '';
	}
	
	$output .= '<article id="post-'.$post_id.'" ';
					ob_start();
						post_class($post_class);
					$output .= ob_get_clean() .'>';

	$output .= '<div class="post-inner-wrapper">';
	
		if( ! $meta_array['thumbnail'] ) {
			if( $layout == 'list' ) {
				$output .= aven_zozo_output_blog_post_slider( $post_id, $image_size, '', 'grid' );
			} else {
				$output .= aven_zozo_output_blog_post_slider( $post_id, $image_size );
			}
		}
		
		$output .= '<div class="posts-content-container">';
		
			if( has_post_format('quote') ) {
									
				$output .= '<div class="entry-summary clearfix">
					<div class="entry-quotes quote-format">';
				$output .= '<blockquote>';
					$output .= '<p>'. aven_zozo_blog_trim_excerpt( $excerpt_limit ) .'</p>';
					$output .= '<footer><h2 class="entry-title">';
						$output .= '<a href="'. get_permalink( $post_id ) .'" rel="bookmark" title="'. get_the_title() .'">'. get_the_title() .'</a>';
					$output .= '</h2></footer>';
				$output .= '</blockquote>';
				
				$output .= wp_link_pages( array(
							'before' 		=> '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'aven' ) . '</span>',
							'after' 		=> '</div>',
							'link_before' 	=> '<span>',
							'link_after' 	=> '</span>',
							'echo' 			=> 0
						) );
			
				$output .= '</div></div>';
			
			} else {
				
				// Title
				$output .= '<div class="entry-header"><h2 class="entry-title">';
					if( has_post_format('link') ) {
						$output .= '<a href="'. esc_url( $external_url ) .'" rel="bookmark" title="'. get_the_title() .'" target="_blank">'. get_the_title() .'</a>';
					} else {
						$output .= '<a href="'. get_permalink( $post_id ) .'" rel="bookmark" title="'. get_the_title() .'">'. get_the_title() .'</a>';
					}
				$output .= '</h2></div>';
				
				// Entry Content
				$output .= '<div class="entry-summary clearfix">';
				$output .= '<p>'. aven_zozo_blog_trim_excerpt( $excerpt_limit ) .'</p>';
				$output .= wp_link_pages( array(
							'before' 		=> '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'aven' ) . '</span>',
							'after' 		=> '</div>',
							'link_before' 	=> '<span>',
							'link_after' 	=> '</span>',
							'echo' 			=> 0
						) );
				$output .= '</div>';
				
			}
			
			// Entry Meta
			$output .= '<div class="entry-meta-wrapper">';
				$output .= '<div class="entry-meta">';
					// Sticky Post
					if ( is_sticky() && is_home() && ! is_paged() ) {
						$output .= '<div class="sticky-post"><i class="simple-icon icon-pin"></i> <span class="meta-name">'. esc_html__('Featured', 'aven') .'</span></div>';
					}
					
					// Author
					if( ! $meta_array['author'] ) {
						$output .= '<div class="post-author">';
							$output .= get_avatar(get_the_author_meta('email'), '40');
							$output .= '<h6 class="post-author-name">'. get_the_author_posts_link() .'</h6>';
						$output .= '</div>';
					}
				$output .= '</div>';
				
				// Read More Link
				if( ! $meta_array['more'] ) {
					$output .= '<div class="read-more">';
						if( has_post_format('link') ) {
							$output .= '<a href="'. esc_url( $external_url ) .'" class="btn-more read-more-link" target="_blank">';
						} else {
							$output .= '<a href="'. get_permalink( $post_id ) .'" class="btn-more read-more-link">';
						}
						
						if( ! aven_zozo_get_theme_option( 'zozo_blog_read_more_text' ) ) { 
							$output .= esc_html__('Read more', 'aven'); 
						} else { 
							$output .= esc_attr( aven_zozo_get_theme_option( 'zozo_blog_read_more_text' ) ); 
						}
						
						$output .= '</a>';
					$output .= '</div>';
				}
			$output .= '</div>';
			
		$output .= '</div>';
		
	$output .= '</div>';
	$output .= '</article>';
	
	return $output;
}

// Blog Grid Style Output
function aven_zozo_output_blog_grid_layout( $post_id, $post_class, $image_size, $excerpt_limit, $meta_array, $animation = array() ) {

	$output = '';
	
	if( has_post_format('link') ) {
		$external_url = '';
		$external_url = get_post_meta( $post_id, 'zozo_external_link_url', true );
		if( isset( $external_url ) && $external_url == '' ) {
			$external_url = get_permalink( $post_id );
		}
	}
	
	if( ! isset( $post_class ) || isset( $post_class ) && $post_class == '' ) {
		$post_class = '';
	}
	
	$css_animation = $animation_classes = $animation_delay = $data_attr = '';
	
	if( ! empty( $animation ) ) {
		$css_animation = $animation['animation'];
		$animation_delay = $animation['delay'];
	} else {
		$css_animation = '';
		$animation_delay = '';
	}
	
	if( $css_animation !== '' ) {
        $animation_classes = ' animate_when_almost_visible ' . $css_animation;
        if( $animation_delay !== '' ) {
			$data_attr = ' data-delay=' . $animation_delay;
		}
	}
	
	$output .= '<article id="post-'.$post_id.'" ';
					ob_start();
						post_class($post_class);
					$output .= ob_get_clean() .'>';

	$output .= '<div class="post-inner-wrapper post-inside-wrapper margin-top-20'. $animation_classes .'"'. esc_attr( $data_attr ) .'>';
	
		if( ! $meta_array['thumbnail'] ) {
			$output .= aven_zozo_output_blog_post_slider( $post_id, $image_size, '', 'grid' );
		}
		
		$output .= '<div class="posts-content-container">';
			// Title
			$output .= '<div class="entry-header"><h2 class="entry-title">';
				if( has_post_format('link') ) {
					$output .= '<a href="'. esc_url( $external_url ) .'" rel="bookmark" title="'. get_the_title() .'" target="_blank">'. get_the_title() .'</a>';
				} else {
					$output .= '<a href="'. get_permalink( $post_id ) .'" rel="bookmark" title="'. get_the_title() .'">'. get_the_title() .'</a>';
				}
			$output .= '</h2></div>';
			
			// Entry Content
			$output .= '<div class="entry-summary clearfix">';
			$output .= '<p>'. aven_zozo_blog_trim_excerpt( $excerpt_limit ) .'</p>';
			$output .= wp_link_pages( array(
						'before' 		=> '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'aven' ) . '</span>',
						'after' 		=> '</div>',
						'link_before' 	=> '<span>',
						'link_after' 	=> '</span>',
						'echo' 			=> 0
					) );
			$output .= '</div>';
			
			// Entry Meta
			$output .= '<div class="entry-meta-wrapper">';
				$output .= '<div class="entry-meta">';
					// Sticky Post
					if ( is_sticky() && is_home() && ! is_paged() ) {
						$output .= '<div class="sticky-post"><i class="simple-icon icon-pin"></i> <span class="meta-name">'. esc_html__('Featured', 'aven') .'</span></div>';
					}
					
					// Author
					if( ! $meta_array['author'] ) {
						$output .= '<div class="post-author">';
							$output .= get_avatar(get_the_author_meta('email'), '40');
							$output .= '<h6 class="post-author-name">'. get_the_author_posts_link() .'</h6>';
						$output .= '</div>';
					}
				$output .= '</div>';
			
				// Read More Link
				if( ! $meta_array['more'] ) {
					$output .= '<div class="read-more">';
						if( has_post_format('link') ) {
							$output .= '<a href="'. esc_url( $external_url ) .'" class="btn-more read-more-link" target="_blank">';
						} else {
							$output .= '<a href="'. get_permalink( $post_id ) .'" class="btn-more read-more-link">';
						}
						
						if( ! aven_zozo_get_theme_option( 'zozo_blog_read_more_text' ) ) { 
							$output .= esc_html__('Read more', 'aven'); 
						} else { 
							$output .= esc_attr( aven_zozo_get_theme_option( 'zozo_blog_read_more_text' ) ); 
						}
						
						$output .= '</a>';
					$output .= '</div>';
				}
			$output .= '</div>';
			
		$output .= '</div>';
		
	$output .= '</div>';
	$output .= '</article>';
	
	return $output;
}

// Blog Metro Output
function aven_zozo_output_blog_metro_layout( $post_id, $post_class, $thumb_width, $thumb_height, $meta_array, $animation = array(), $metro_gutter = '' ) {

	$output = '';
	$post_image = aven_zozo_get_blog_post_media( $post_id, $thumb_width, $thumb_height );
	
	if( has_post_format('link') ) {
		$external_url = '';
		$external_url = get_post_meta( $post_id, 'zozo_external_link_url', true );
		if( isset( $external_url ) && $external_url == '' ) {
			$external_url = get_permalink( $post_id );
		}
	}
	
	if( ! isset( $post_class ) || isset( $post_class ) && $post_class == '' ) {
		$post_class = '';
	}
	
	$css_animation = $animation_classes = $animation_delay = $data_attr = '';
	
	if( ! empty( $animation ) ) {
		$css_animation = $animation['animation'];
		$animation_delay = $animation['delay'];
	} else {
		$css_animation = '';
		$animation_delay = '';
	}
	
	if( $css_animation !== '' ) {
        $animation_classes = ' animate_when_almost_visible ' . $css_animation;
        if( $animation_delay !== '' ) {
			$data_attr = ' data-delay=' . $animation_delay;
		}
	}
	
	if( isset( $metro_gutter ) && $metro_gutter == '' ) {
		$metro_gutter = aven_zozo_get_theme_option( 'zozo_blog_metro_gutter' );
		if( isset( $metro_gutter ) && $metro_gutter == '' ) {
			$metro_gutter = 0;
		}
	}
	
	$output .= '<article id="post-'.$post_id.'" ';
					ob_start();
						post_class($post_class);
					$output .= ob_get_clean() .'>';

	$output .= '<div class="post-metro-inner-wrapper post-inside-wrapper margin-top-'. $metro_gutter .''. $animation_classes .'"'. esc_attr( $data_attr ) .'>';
		if( has_post_format('link') ) {
			$output .= '<a href="'. esc_url($external_url) .'" title="'.get_the_title().'" target="_blank">';
		} else {
			$output .= '<a href="'. get_permalink($post_id) .'" title="'.get_the_title().'">';
		}
		
		if( $post_image ) {
			$output .= '<div class="post-metro-image">';
			$output .= '<img src="' . $post_image[0] . '" width="' . $post_image[1] . '" height="' . $post_image[2] . '" alt="' . $post_image[3] . '" />';
			$output .= '</div>';
		}
	
		$output .= '<div class="post-metro-overlay">';
			$output .= '<div class="entry-header"><h2 class="entry-title">' . get_the_title() .'</h2></div>';
			
			// Categories
			if( ! $meta_array['categories'] ) {
				$output .= '<div class="post-metro-categories">';
					$categories = get_the_category();
					$separator = ', ';
					$cat_output = '';
					
					if( $categories ){
						foreach( $categories as $category ) {
							$cat_output .= $category->cat_name . $separator;
						}
					}
					$output .= trim( $cat_output, $separator );
				$output .= '</div>';
			}
		$output .= '</div>';
			
		$output .= '</a>';
	$output .= '</div>';
	
	$output .= '</article>';
	
	return $output;
}