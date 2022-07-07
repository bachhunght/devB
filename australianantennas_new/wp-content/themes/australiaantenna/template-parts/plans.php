<?php
/**
 * Template Name: Plans
 */

get_header( );?>

<!-- banner section -->
<?php get_template_part( 'template-parts/inner', 'banner' ); ?>

<!-- content part -->
<section class="inner-content-part">
    <div class="container">
        <aside>
            <?php if(have_posts()): the_post(); ?>
                <?php the_content(); ?>
            <?php endif; ?>
        </aside>
        
    </div>
</section>


<?php get_footer( );