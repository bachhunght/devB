<?php
/**
 * Template Name: Contact
 */

get_header();?>


<!-- banner section -->
<?php get_template_part( 'template-parts/inner', 'banner' ); ?>

<!-- contact body -->
<section class="contact-main-part">
    <div class="container">
        <aside class="contact-form">
            <?php 
                $contac_form = get_field( 'contact_form' ); 
                echo do_shortcode( '[contact-form-7 id="'.$contac_form->ID.'"]' ); 
            ?>
        </aside>
        
        <aside class="contact-details">
            <h2>Contact Us</h2>
            <?php  the_field( 'full_address' ); ?>
            
            <p>
                <b>Phone </b><a class="phone-number-contact-page" href="tel:<?php the_field( 'contact_no', 'options' );?>"><?php the_field( 'contact_no', 'options' );?></a><br>
                <b>Fax </b><?php the_field( 'fax_no', 'options' );?>
            </p>



            <p><a class="email-contact-page" href="mailto:<?php the_field( 'email', 'options' );?>"><?php the_field( 'email', 'options' );?></a></p>
            
            <p style="margin-top: 15px;">ASIAL Member Number 64264</p>

            <div class="contact-links">
                <?php while( have_rows( 'social_links' ) ): the_row(); ?>
                    <a class="social-icons-contact-page" href="<?php echo get_sub_field( 'link' ); ?>" target="_blank">
                        <?php $icon = get_sub_field( 'image' ); ?> 
                        <img class="social-icons-contact-page" src="<?php echo $icon['url'];?>" alt="facebook">
                    </a>
                <?php endwhile; ?>
            </div>

        </aside>
    </div>
</section>

<!-- map -->
<section class="contact-map">
    <iframe src="<?php the_field( 'map_embed_link' ); ?>" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</section>

<?php get_footer();