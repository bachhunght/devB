<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

include_once 'functions/function-setup.php';

//==============================================================================
//	Frontend Output
//==============================================================================
if ( ! function_exists( 'gbt_18_mt_render_frontend_posts_grid' ) ) {
	function gbt_18_mt_render_frontend_posts_grid( $attributes ) {

		extract( shortcode_atts( array(
			'number'				=> '12',
			'categoriesSavedIDs'	=> '',
			'align'					=> 'center',
			'orderby'				=> 'date_desc',
			'columns'				=> '3',
			'className'             => 'is-style-default'
		), $attributes ) );

		$args = array(
	        'post_status' 		=> 'publish',
	        'post_type' 		=> 'post',
	        'posts_per_page' 	=> $number
	    );

	    switch ( $orderby ) {
	    	case 'date_asc' :
				$args['orderby'] = 'date';
				$args['order']	 = 'asc';
				break;
			case 'date_desc' :
				$args['orderby'] = 'date';
				$args['order']	 = 'desc';
				break;
			case 'title_asc' :
				$args['orderby'] = 'title';
				$args['order']	 = 'asc';
				break;
			case 'title_desc':
				$args['orderby'] = 'title';
				$args['order']	 = 'desc';
				break;
			default: break;
		}

	    if( substr($categoriesSavedIDs, - 1) == ',' ) {
			$categoriesSavedIDs = substr( $categoriesSavedIDs, 0, -1);
		}

		if( substr($categoriesSavedIDs, 0, 1) == ',' ) {
			$categoriesSavedIDs = substr( $categoriesSavedIDs, 1);
		}

	    if( $categoriesSavedIDs != '' ) $args['category'] = $categoriesSavedIDs;
	    
	    $recentPosts = get_posts( $args );

		ob_start();
		        
	    if ( !empty($recentPosts) ) : ?>

	        <div class="gbt_18_mt_posts_grid <?php echo $className; ?> align<?php echo $align; ?>">
	    
	    		<div class="gbt_18_mt_posts_grid_wrapper <?php echo $className == 'is-style-default' ? 'columns-'.$columns : ''; ?>">
		            
		            <div class="gbt_18_mt_posts_grid_items">

			            <?php foreach($recentPosts as $post) : ?>
			        
			                <?php $post_format = get_post_format($post->ID); ?>

			                <div class="gbt_18_mt_posts_grid_item <?php echo $post_format ? $post_format: 'standard'; ?> <?php if ( !has_post_thumbnail($post->ID)) : ?>no_thumb<?php endif; ?>">
			                    
								<a class="gbt_18_mt_posts_grid_item_link" href="<?php echo get_post_permalink($post->ID); ?>">
									<span class="gbt_18_mt_posts_grid_img_container">
										<span class="gbt_18_mt_posts_grid_img_overlay"></span>
										
										<?php if ( has_post_thumbnail($post->ID)) :
											$image_id = get_post_thumbnail_id($post->ID);
											$image_url = wp_get_attachment_image_src($image_id,'large', true);
										?>
											<span class="gbt_18_mt_posts_grid_img gbt_18_mt_posts_grid_with_img" style="background-image: url(<?php echo esc_url($image_url[0]); ?> );"></span>
										<?php else : ?>
											<span class="gbt_18_mt_posts_grid_img gbt_18_mt_posts_grid_noimg"></span>
										<?php endif;  ?>

									</span>

									<?php if($className == 'is-style-default') : ?>
										<a class="gbt_18_mt_posts_grid_title" href="<?php echo get_post_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a>
									<?php elseif($className == 'is-style-list') : ?>
										<span class="gbt_18_mt_posts_grid_content_wrapper">
											<span class="gbt_18_mt_posts_grid_content_inner">
												
												<span class="gbt_18_mt_posts_grid_item_day"><?php echo date('d', strtotime($post->post_date)); ?></span>
												
												<span class="gbt_18_mt_posts_grid_content">
													<span class="gbt_18_mt_posts_grid_item_date"><?php echo date('F Y', strtotime($post->post_date)); ?></span>
													<h3 class="gbt_18_mt_posts_grid_item_title"><?php echo $post->post_title; ?></h3>
												</span>
												
											</span>
										</span>
									<?php endif; ?>
								</a>
			                    
			                </div>
			    
			            <?php endforeach; ?>

			        </div>
				</div>
			</div>

		<?php

		endif;
		        
		wp_reset_query();

		return ob_get_clean();
	}
}