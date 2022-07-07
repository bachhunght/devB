<?php
/**
 * Template Name: Antenna Range
 */

get_header();?>

<!-- banner section -->
<?php get_template_part( 'template-parts/inner', 'banner' ); ?>

<!-- content part -->
<section class="inner-content-part">
    <div class="container">
        <div class="antenna-range-page">
            <aside class="left-contentbar">
                <ul class="antenna-range-list">
                    <?php while( have_rows( 'antenna_ranges' ) ): the_row(); ?>
                        <li>
                            <div class="flex-left">
                                <?php the_sub_field('description'); ?>
                            </div>
                            <div class="flex-right">
                                <?php $image = get_sub_field( 'image' ); ?>
                                <a href="<?php echo $image['url']; ?>" class="fancybox" rel="gallery"><img src="<?php echo $image['sizes']['medium'];?>" alt="<?php echo $image['alt'];?>" /></a>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </aside>

            <?php get_sidebar( 'new' ); ?>
        </div>
    </div>
</section>

<?php get_footer();