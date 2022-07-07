<?php 
    $banner = get_field('banner'); 
    if( empty( $banner )) {
        $banner = array();
        $banner['url'] = ASSETS_DIR.'/images/inner-banner.jpg';
    }
?>
<section class="inner-banner-part" style="background-image: url(<?php echo $banner['url']; ?>);">
    <div class="container">
        <h1><?php the_title(); ?></h1>
    </div>  
</section>