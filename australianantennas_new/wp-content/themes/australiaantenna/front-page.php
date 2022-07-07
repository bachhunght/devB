<?php
/**
 * Front page template of the website
 */

get_header( );?>

<!-- banner section -->
<section class="main-banner">
    <ul class="slider bxslider" id="banner-slider">
        <?php while( have_rows('banner_images') ): the_row(); ?>
        <?php $banner_img = get_sub_field('banner_image'); ?>
        <li style="background-image: url(<?php echo $banner_img['url'];?>);">
            <div class="container banner-text-content">
                <!-- <h1>Australian Antennas</h1> -->
                <?php the_sub_field('banner_text'); ?>
                <div class="banner-btn">
                    <a href="<?php the_field( 'get_a_free_quote_link', 'options' ); ?>" class="main-btn">Get a FREE Quote</a>
                </div>
            </div>
        </li>
        <?php endwhile; ?>
    </ul>  
</section>

<!-- info section -->
<section class="info-part">
    <div class="container">
        <?php the_field('after_banner_description'); ?>
    </div>
</section>

<!-- why us -->
<section class="why-us-part">
    <div class="container">
        <h2><?php the_field('why_us_section_title'); ?></h2>
        <ul class="why-us-list">
            <?php while(have_rows('why_us_list')): the_row(); ?>
            <li>
                <?php $icon = get_sub_field('image'); ?>
                <span class="icon-box">
                    <img src="<?php echo $icon['url'];?>" alt="<?php echo $icon['alt'];?>">
                </span>
                <h4><?php the_sub_field('title');?></h4>
                <?php the_sub_field('description'); ?>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>  
</section>

<!-- more info part -->
<section class="more-info-part">
    <div class="container">

        <div class="service-part">
            <h2><?php the_field('why_choose_us'); ?></h2>
            <?php the_field('why_us_description'); ?>

            <ul class="service-list">
                <li>
                    <?php the_field('left_section'); ?>
                </li>
                <li>
                    <?php the_field('right_section'); ?>
                </li>      
            </ul>
        </div>

        <div class="about-us-part">
            <ul>
                <?php while(have_rows('box_list')): the_row(); ?>
                <?php 
                    $cssclass = get_sub_field('box_css_class'); 
                    if($cssclass == 'about-us-box'):
                ?>
                        <li>
                            <a href="<?php the_sub_field('box_links_to');?>" class="about-us-box">
                                <span>
                                    <?php $bg_image = get_sub_field('box_image'); ?>
                                    <img src="<?php echo $bg_image['url'];?>" alt="<?php echo $bg_image['alt'];?>">
                                </span>
                                <h4><?php the_sub_field('box_title');?></h4>
                            </a>
                        </li>
                    <?php elseif($cssclass == 'learn-more-box'): ?>
                        <li>
                            <div class="learn-more-box">
                                <span class="learn-more-img">
                                    <?php $bg_image = get_sub_field('box_image'); ?>
                                    <img src="<?php echo $bg_image['url'];?>" alt="<?php echo $bg_image['alt'];?>">
                                </span>
                                <div class="learn-more-text">
                                    <h4><?php the_sub_field('box_title');?></h4>
                                    <a href="<?php the_sub_field('box_links_to');?>" class="main-btn"><?php the_sub_field('box_button_label');?></a>
                                </div>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endwhile; ?>
            </ul>
        </div>

        <div class="contact-home">
            <h2>Request a FREE Quote</h2>
            <?php 
                $contac_form = get_field( 'contact_form' ); 
                echo do_shortcode( '[contact-form-7 id="'.$contac_form->ID.'"]' ); 
            ?>
        </div>

    </div>  
</section>

<!-- testimonials part -->
<section class="testimonials-home">
    <div class="container">
        <h2>Testimonials</h2>
        <ul class="testimonials-list">
            <?php 
                while (have_rows('testimonails')) : the_row(); 
                    $postObj = get_sub_field('testimonial');
                    $client_name = get_post_meta($postObj->ID, 'wpcf-client-name', true);
                    $client_area = get_post_meta($postObj->ID, 'wpcf-client-area', true);
                    $testimonial_content = get_post_meta($postObj->ID, 'wpcf-testimonial', true);
                    $testimonial_video = get_post_meta($postObj->ID, 'wpcf-testimonial-video-url', true);
            ?>
                <li>
                    <p><?php echo $testimonial_content;?></p>
                    <span class="client-name">— <?php echo $client_name; ?></span>
                </li>
            <?php endwhile; ?>
        </ul>
        <div class="more-testimonial">
            <a href="<?php the_field('read_more_link');?>" class="main-btn">Read More</a>
        </div>
    </div>
</section>

<!-- blog-part -->
<section class="blog-info-home">
    <div class="container">
        <div class="info-part">
            <?php the_field('why_you_need');?>
        </div>
        <?php 
            if( is_active_sidebar( 'home-bottom' ) ): 
                dynamic_sidebar( 'home-bottom' ); 
            endif;
        ?>
    </div>
</section>

<?php get_footer( ); 