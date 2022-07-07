<?php
/**
 * Template Name: Internal
 */

get_header( );?>

<!-- banner section -->
<?php get_template_part( 'template-parts/inner', 'banner' ); ?>

<!-- content part -->
<section class="inner-content-part">
    <div class="container">
        <aside class="left-contentbar">
            <?php if(have_posts()): the_post(); ?>
                <?php the_content(); ?>
            <?php endif; ?>
        </aside>

        <?php get_sidebar( ); ?>
    </div>
</section>

<section id="visible-three-page-only" class="blog-info-home">
    <div class="container">
        <h2 style="text-align: center !important; margin-bottom: 0px !important;">Brands We Use</h2>
        <?php echo do_shortcode('[sp_wpcarousel id="1439"]'); ?>
    </div>
</section>


<?php get_footer( );