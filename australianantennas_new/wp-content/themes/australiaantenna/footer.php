<?php
/** 
 * Footer template 
 */
?>
    <!-- Footer part -->
    <footer class="main-footer">
        <div class="container">
<p class="footer-title">Contact</p>
            <ul class="footer-contact-info">
                <li>
                    <p><?php the_field( 'address', 'options' ); ?></p>
                    <p style="margin-top: 15px;">Booking & Installation (Metro Only)</p>
                    <a class="phone-number-footer" href="tel:<?php the_field( 'contact_no', 'options' );?>"><?php the_field( 'contact_no', 'options' );?></a>
                    <p style="margin-top: 15px;">ASIAL Member Number 64264</p>
                </li>
                <li>
                    <a class="email-footer" href="mailto:<?php the_field( 'email', 'options' );?>"><?php the_field( 'email', 'options' );?></a>
                    
                    <div class="footer-links">
                        <?php while( have_rows( 'social_links', 'options' ) ): the_row(); ?>
                            <a href="<?php echo get_sub_field( 'link' ); ?>" target="_blank" rel="nofollow" class="social-media-icons-footer">
                                <?php $icon = get_sub_field( 'image' ); ?> 
                                <img class="social-media-icons-footer" src="<?php echo $icon['url'];?>" alt="<?php echo $icon['title'];?>">
                            </a>
                        <?php endwhile; ?>
                    </div>
                </li>
                <li style="color: white; font-size: 14px;">
                    <div>
                        <a href="https://www.australianantennas.com.au/sitemap/" title=""><strong>Sitemap</strong></a>
                    </div>    
                    <div>
                        <img src="https://www.australianantennas.com.au/wp-content/uploads/2021/04/asial-white.png" style="padding: 20px 0;">
                    </div>
                </li>
            </ul>
        </div>
    </footer>


    <?php wp_footer(); ?>


    </body>
</html>