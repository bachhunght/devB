<div id="site-top-bar">
                            
    <div class="row">
        
        <div class="large-5 columns">
        	
			<div class="language-and-currency">
				
				<?php if (function_exists('icl_get_languages')) { ?>
				
					<?php $additional_languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str'); ?>
					
					<select class="topbar-language-switcher">
						<option><?php echo ICL_LANGUAGE_NAME; ?></option>
						<?php
								
						if (count($additional_languages) > 1) {
							foreach($additional_languages as $additional_language){
							  if(!$additional_language['active']) $langs[] = '<option value="'.$additional_language['url'].'">'.$additional_language['native_name'].'</option>';
							}
							echo join(', ', $langs);
						}
						
						?>
					</select>
				
				<?php } ?>
				
				<?php if (class_exists('woocommerce_wpml')) { ?>
					<?php echo(do_shortcode('[currency_switcher]')); ?>
				<?php } ?>
				
			</div><!--.language-and-currency-->
            
            <?php if( GBT_MT_Opt::getOption( 'top_bar_text' ) != '' ) : ?>
            	<div class="site-top-message"><?php echo esc_html( GBT_MT_Opt::getOption( 'top_bar_text' ), 'mr_tailor' ); ?></div> 
            <?php endif; ?>
                           
        </div><!-- .large-6 .columns -->
        
        <div class="large-7 columns">

            <?php do_action( 'header_socials' ); ?>
            
            <nav id="site-navigation-top-bar" class="main-navigation" role="navigation">                    
				<?php 
                    wp_nav_menu(array(
                        'theme_location'  => 'top-bar-navigation',
                        'fallback_cb'     => false,
                        'container'       => false,
                        'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
                    ));
                ?>
                
                <?php if ( is_user_logged_in() ) { ?>
                    <ul><li><a href="<?php echo get_site_url(); ?>/?<?php echo get_option('woocommerce_logout_endpoint'); ?>=true" class="logout_link"><?php esc_html_e('Logout', 'mr_tailor'); ?></a></li></ul>
                <?php } ?>          
            </nav><!-- #site-navigation -->
                           
        </div><!-- .large-8 .columns -->
                    
    </div><!-- .row -->
    
</div><!-- #site-top-bar -->