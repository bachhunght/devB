<?php
/**
 * Single blog post
 */

get_header(); ?>

<!-- banner section -->
<?php 
    $banner = get_field('banner'); 
    if( empty( $banner ) ) {
        $banner = array();
        $banner['url'] = ASSETS_DIR.'/images/inner-banner.jpg';
    }
?>
<section class="inner-banner-part" style="background-image: url(<?php echo $banner['url']; ?>);">
    <div class="container">
        <?php if( in_category( 'news' ) ): ?>
            <h2>News</h2>
        <?php elseif( in_category( 'awards' ) ): ?>
            <h2>Awards</h2>
        <?php else: ?>
            <h2>Blog</h2>
        <?php endif; ?>
    </div>  
</section>

<section class="blog-page inner-content-part">
    <div class="container">
        <div class="blogs">
            <aside class="left-contentbar">
                <div class="single-post">
                    <div class="single-post-head">
                        <div class="blog-post-author">
                            <div class="img-circle">
                                <img src="http://2.gravatar.com/avatar/b8c2bb61ece78f9bf107a6a6385489d1?s=64&d=mm&r=g" />
                            </div>
                            <span class="display-name"><?php echo get_the_author_meta( 'display_name' ); ?></span>
                        </div>
                        <div class="blog-post-info">
                            <h1 class="blog-post-title"><?php the_title(); ?></h1>
                            <div class="blog-post-meta clearfix">
                                <ul>
                                    <li>
                                        <label>Date:</label>
                                        <span><?php the_time('M d, Y'); ?></span>
                                    </li>
                                    <li>
                                        <label>Categories: </label>
                                        <span><?php echo get_the_category_list( ',' ); ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="divider"></div>
                            <?php echo !has_post_thumbnail();  if( has_post_thumbnail() ) : ?>
                            <div class="featured-image blog-post-image">
                                <?php
                                    $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large', false );
                                    $featured_image = $featured_image[0];                                
                                ?>
                                <img src="<?php echo $featured_image; ?>" />
                            </div>
                            <?php endif;?>
                            <div class="blog-post-content blog-post-excerpt">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <?php get_sidebar( 'recent' ); ?>
        </div>
    </div>
</section>
<?php get_footer(); 