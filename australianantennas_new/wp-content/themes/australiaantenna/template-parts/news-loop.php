<section class="blog-page inner-content-part">
    <div class="container">
        <div class="blogs">
            <aside class="left-contentbar">						        <?php $args = array(                            'post_type' => 'post' ,                            'orderby' => 'date' ,                            'order' => 'DESC' ,                            'posts_per_page' => 6,                            'category'         => '3',                            'paged' => get_query_var('paged'),                            'post_parent' => $parent                    ); ?>                    					<?php query_posts($args); ?>					   
                <?php if( have_posts() ): ?>
                    <ul class="blog-list">
                        <?php while( have_posts() ): the_post();  ?>
                        <li class="blog-post">
                            <figure class="blog-post-figure">
                                <?php 
                                    $attachment = wp_get_attachment_image_src(  get_post_thumbnail_id( $post->ID ), 'medium', true );
                                    $image = $attachment[0];
                                ?>
                                <a href="<?php the_permalink(); ?>"><img src="<?php echo $image; ?>"/></a>
                            </figure>
                            <div class="blog-post-body">
                                <div class="bpost-head">
                                    <h4 class="blog-post-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
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
                                    <div class="social-share">	
                                        <div class="share-blog-post"><?php socialLinkCat(get_permalink(),get_the_title(),false) ?></div>
                                    </div>
                                </div>
                                <div class="divider"></div>
                                <div class="blog-post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="read-more">Read More...</a>
                            </div>
                        </li>
                        <?php endwhile;?>
                    </ul>
                    <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
                <?php endif; ?>
            </aside>
            <?php get_sidebar( 'recent' ); ?>
        </div>
    </div>
</section>