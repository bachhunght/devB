<?php
/**
 * Sidebar
 */
?>
<aside class="right-sidebar">
    <div class="quote-form">
        <h2>Request a FREE Quote</h2>
        <?php 
            $contac_form = get_field( 'contact_form', 'options' ); 
            echo do_shortcode( '[contact-form-7 id="'.$contac_form->ID.'"]' ); 
        ?>
    </div>

    <?php $bg_image = get_field( 'background_image', 'options' ); ?>
    <div class="call-now" style="background-image: url(<?php echo $bg_image['url'];?>);">
        <p><?php the_field( 'background_top_title', 'options' );?>
            <a class="phone-number-sidebar" href="tel:<?php the_field( 'contact_no', 'options' );?>"><?php the_field( 'contact_no', 'options' );?></a>
        </p>
    </div>

    <div class="inner-quote">
        <span class="quote-icon">
            <img src="<?php echo ASSETS_DIR;?>/images/chat-icon.png" alt="Quote">
        </span>
        <p>“I would like to thank you for the job you did for me. It is not often that you come across a company that carries out all aspects of a job from booking, turning up on time and performing the job in a friendly and professional manner. I will have no hesitation in recommending you to other people. Thank you.”</p>
        <span class="name-quote">— GEOFF AITKEN</span>
        <div class="quote-btn">
            <a href="<?php echo site_url().'/who-we-service-testimonials/';?> " class="main-btn">Read More</a>          
        </div>
    </div>
</aside>