<?php
/**

 * Template Name: News

 */

get_header(); ?>

<?php 

    $banner = get_field('banner'); 

    if( empty( $banner ) ) {

        $banner = array();

        $banner['url'] = ASSETS_DIR.'/images/inner-banner.jpg';

    }

?>

<section class="inner-banner-part" style="background-image: url(<?php echo $banner['url']; ?>);">

    <div class="container">

        <h1>News</h1>

    </div>  

</section>





<?php get_template_part( 'template-parts/news', 'loop' ); ?>



<?php get_footer();
