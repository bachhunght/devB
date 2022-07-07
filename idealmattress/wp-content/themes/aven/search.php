<?php
/**
 * Search Page Template
 *
 * @package Zozothemes
 */
 
get_header(); 

$container_class = $scroll_type = $scroll_type_class = '';
$post_type_layout = $excerpt_limit = '';
$data_attr = '';

$original_layout = '';
$original_layout = aven_zozo_get_theme_option( 'zozo_search_page_type' );
$grid_columns = aven_zozo_get_theme_option( 'zozo_search_grid_columns' );

$column_width = '';
$display_mode = '';

// Grid Style
if( $original_layout == 'grid' ) {
	$container_class = 'zozo-isotope-layout ';
	if( $grid_columns != '' ) {
		if( $grid_columns == 'two' ) {
			$container_class .= 'grid-layout grid-col-2';
			$grid_columns_num = 2;
		} elseif( $grid_columns == 'three' ) {
			$container_class .= 'grid-layout grid-col-3';
			$grid_columns_num = 3;
		} elseif( $grid_columns == 'four' ) {
			$container_class .= 'grid-layout grid-col-4';
			$grid_columns_num = 4;
		}
	}
	$post_class = 'isotope-post grid-posts ';
	$column_width = 12 / $grid_columns_num;
	$post_class .= 'post-iso-w' . $column_width;
	$post_class .= ' post-iso-h' . $column_width;
	
	$image_size = 'aven-blog-medium';
	$page_type_layout = 'grid';
	$display_mode = 'isotope';
	$excerpt_limit = aven_zozo_get_theme_option( 'zozo_blog_excerpt_length_grid' );
	$data_attr = 'data-layout=masonry data-columns='. $grid_columns_num .' data-gutter=30';
}
// Large Style
elseif( $original_layout == 'large' ) {
	$container_class = 'large-layout';
	$post_class = 'large-posts';
	$image_size = 'aven-blog-large';
	$post_type_layout = 'large';
	$excerpt_limit = aven_zozo_get_theme_option( 'zozo_blog_excerpt_length_large' );
}
// List Style
elseif( $original_layout == 'list' ) {
	$container_class = 'list-layout';
	$post_class = 'list-posts clearfix';	
	$image_size = 'aven-blog-medium';
	$page_type_layout = 'list';
	$excerpt_limit = aven_zozo_get_theme_option( 'zozo_blog_excerpt_length_list' );
}
// Metro Style
elseif( $original_layout == 'metro' ) {
	$container_class = 'zozo-isotope-layout ';
	$metro_columns = aven_zozo_get_theme_option( 'zozo_search_metro_columns' );
	$metro_gutter = aven_zozo_get_theme_option( 'zozo_search_metro_gutter' );
	
	if( isset( $metro_columns ) && $metro_columns != '' ) {
		if( $metro_columns == 'two' ) {
			$container_class .= 'metro-layout metro-col-2';
			$metro_columns_num = 2;
		} elseif ( $metro_columns == 'three' ) {
			$container_class .= 'metro-layout metro-col-3';
			$metro_columns_num = 3;
		} elseif ( $metro_columns == 'four' ) {
			$container_class .= 'metro-layout metro-col-4';
			$metro_columns_num = 4;
		}
	}
	
	$post_class = 'isotope-post metro-posts ';
	$column_width = 12 / $metro_columns_num;
	$post_class .= 'post-iso-w' . $column_width;
	$post_class .= ' post-iso-h' . $column_width;
	
	$thumb_width = 530;
	$thumb_height = null;
	$page_type_layout = 'metro';
	$display_mode = 'isotope';
	if( isset( $metro_gutter ) && $metro_gutter == '' ) {
		$metro_gutter = 0;
	}
	$data_attr = 'data-layout=masonry data-columns='. $metro_columns_num .' data-gutter='. $metro_gutter .'';
}

$scroll_type = "pagination";
$scroll_type_class = " posts-pagination";

// Meta 
$morelink = $post_author = $post_comments = $post_date = $thumbnail = '';
$meta_array = array();

$morelink = aven_zozo_get_theme_option( 'zozo_blog_read_more' );
$post_author = aven_zozo_get_theme_option( 'zozo_blog_post_meta_author' );
$post_comments = aven_zozo_get_theme_option( 'zozo_blog_post_meta_comments' ); 
$post_date = aven_zozo_get_theme_option( 'zozo_blog_post_meta_date' ); 
$post_cat = aven_zozo_get_theme_option( 'zozo_blog_post_meta_categories' ); 
$thumbnail = aven_zozo_get_theme_option( 'zozo_blog_post_featured_image' );
$search_placeholder = aven_zozo_get_theme_option( 'zozo_search_placeholder' ); 

$meta_array = array( 'more' 	=> $morelink, 
					'thumbnail' => $thumbnail,
					'author' 	=> $post_author, 
					'comments' 	=> $post_comments, 
					'date' 		=> $post_date,
					'categories' => $post_cat );
					
?>

<div class="container">
	<div id="main-wrapper" class="zozo-row row">
		<div id="single-sidebar-container" class="single-sidebar-container <?php aven_zozo_content_sidebar_classes(); ?>">
			<div class="zozo-row row">	
				<div id="primary" class="content-area <?php aven_zozo_primary_content_classes(); ?>">
					<div id="content" class="site-content">
						<?php if ( have_posts() && strlen( trim( get_search_query() ) ) != 0 ): ?>
							<div class="zozo-search-page search-page-form">
								<h4><?php esc_html_e( 'New Search', 'aven' ); ?></h4>
																	
								<p><?php esc_html_e('If you didn\'t find what you were looking for, try another search', 'aven'); ?></p>
								<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form search-page">
									<div class="input-group">
										<input type="text" value="" name="s" class="form-control" placeholder="<?php echo esc_attr( $search_placeholder ); ?>" />
										<span class="input-group-btn">
											<button class="btn btn-search" type="submit"><?php esc_html_e('Go', 'aven'); ?></button>
										</span>
									</div>
								</form>		
							</div>
							
							<div id="zozo-blog-posts-container" class="zozo-blog-posts-wrapper zozo-isotope-grid-system">
						
								<?php if( isset( $display_mode ) && $display_mode == 'isotope' ) { ?>
									<div class="zozo-isotope-wrapper blog-isotope-wrapper">
								<?php } ?>
								
								<div id="archive-posts-container" class="zozo-posts-container zozo-search-results-wrapper <?php echo esc_attr($container_class); ?><?php echo esc_attr($scroll_type_class); ?> clearfix"<?php echo esc_attr( $data_attr ); ?>>
		
								<?php while ( have_posts() ): the_post();
									if( isset( $original_layout ) && ( $original_layout == 'large' || $original_layout == 'list' ) ) {
										echo aven_zozo_output_blog_large_layout( $post->ID, $post_class, $image_size, $excerpt_limit, $meta_array, $original_layout );
									} 
									
									else if( isset( $original_layout ) && $original_layout == 'grid' ) {
										echo aven_zozo_output_blog_grid_layout( $post->ID, $post_class, $image_size, $excerpt_limit, $meta_array );
									}
									
									else if( isset( $original_layout ) && $original_layout == 'metro' ) {
										echo aven_zozo_output_blog_metro_layout( $post->ID, $post_class, $thumb_width, $thumb_height, $meta_array );
									}
								endwhile; ?>
								
								</div>
								
								<?php if( isset( $display_mode ) && $display_mode == 'isotope' ) { ?>
									</div>
								<?php } ?>
							
								<div class="zozo-blog-pagination-wrapper">
								<?php echo aven_zozo_pagination( $pages = '', $scroll_type ); ?>
								</div>
								
							</div>
							
						<?php else : ?>
							<div class="zozo-search-no-results">
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="post-inner-wrapper">
									<div class="posts-content-container">
										<div class="entry-header">			   
											<h1 class="entry-title"><?php esc_html_e('Nothing Found', 'aven'); ?></h1>			
											<p><?php esc_html_e('Sorry, but no posts matched your search terms. Please try again with different keywords.', 'aven'); ?></p>
										</div><!-- .entry-header -->
										<div class="entry-content">
											<h4><?php esc_html_e('Try New Search', 'aven'); ?></h4>
											<?php get_search_form(); ?>
										</div><!-- .entry-content -->
									</div><!-- .posts-content-container -->		
								</div><!-- .post-inner-wrapper -->
							</article><!-- #post -->
							</div>
						<?php endif; ?>
						
					</div><!-- #content -->
				</div><!-- #primary -->
			
				<?php get_sidebar(); ?>
			</div>
		</div><!-- #single-sidebar-container -->

		<?php get_sidebar( 'second' ); ?>
	
	</div><!-- #main-wrapper -->
</div><!-- .container -->
<?php get_footer(); ?>