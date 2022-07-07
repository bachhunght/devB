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
                    <div>
                    <a class="email-footer" href="mailto:sales@australiansecurity.com.au" style="clear: both;display: block;">sales@australiansecurity.com.au</a><br />
                    
                    <a href="https://www.australiansecurity.com.au/contact/" class="main-btn">Contact Us</a>
					
					<span style="font-weight: bold; margin-bottom:10px; display:none;">Melbourne's best reviewed <br />Antenna Company</span>
                    </div>
                    <div>
                    <img src="https://www.australiansecurity.com.au/wp-content/uploads/2021/04/asial-white.png" style="padding: 20px 0;">
                    </div>
                    
                </li>
                <li style="color: white; font-size: 14px;">
                    <p style="margin-bottom: 15px !important;"><a href="https://www.australiansecurity.com.au/zip-now-pay-later/" title="">Interest Free</a></p>
                    <p style="margin-bottom: 15px !important;"><a href="https://www.australiansecurity.com.au/who-we-service-our-clients/" title="">Our Clients</a></p>
                    <p style="margin-bottom: 15px !important;"><a href="https://www.australiansecurity.com.au/faqs-cctv/" title="">FAQs</a></p>
                    <p style="margin-bottom: 15px !important;"><a href="https://www.australiansecurity.com.au/blog/" title="">Blog</a></p>
                    <p style="margin-bottom: 15px !important;"><a href="https://www.australiansecurity.com.au/sitemap/" title="">Sitemap</a></p>
                    <p style="margin-bottom: 15px !important;"><a href="https://www.australiansecurity.com.au/privacy-policy/" title="">Privacy Policy</a></p>


                </li>
            </ul>
            
            <p class="footer-four-images"><img src="https://www.australiansecurity.com.au/wp-content/uploads/2020/03/energy-safe-victoria.png"><img style="padding-left: 20px;" src="https://www.australiansecurity.com.au/wp-content/uploads/2020/03/victoria-police.png"><img src="https://www.australiansecurity.com.au/wp-content/uploads/2020/03/Working-with-Children.png"><img style="padding-left: 20px;" src="https://www.australiansecurity.com.au/wp-content/uploads/2020/03/Work-Safe.png"></p>
        </div>
        
        
    </footer>


    <?php wp_footer(); ?>
	<?php echo do_shortcode( '[brb_collection id="1314"]' ); ?>


    </body>
</html>