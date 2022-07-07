<?php
/** 
 * Category page
 */
get_header();  ?>

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
        <h1>Blog</h1>
    </div>  
</section>

<?php get_template_part( 'template-parts/category', 'loop' ); ?>

<?php get_footer();
