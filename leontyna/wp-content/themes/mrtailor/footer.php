					<?php global $woocommerce, $yith_wcwl, $page_id; ?>
                    
                    <?php

                    $page_id = "";
                    if ( is_single() || is_page() ) {
                        $page_id = get_the_ID();
                    } else if ( is_home() ) {
                        $page_id = get_option('page_for_posts');		
                    }
					
					if (get_post_meta( $page_id, 'footer_meta_box_check', true )) {
						$page_footer_option = get_post_meta( $page_id, 'footer_meta_box_check', true );
					} else {
						$page_footer_option = "off";
					}
					
					?>
                    
                    <?php if ( $page_footer_option == "off" ) : ?>

                    <footer id="site-footer" role="contentinfo">
						
						 <?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
						 
                            <?php if ( GBT_MT_Opt::getOption( 'expandable_footer' ) ) { ?>
    							<div class="trigger-footer-widget-area">
    								<span class="trigger-footer-widget-icon"></span>
    							</div>
						    <?php } ?>

							<div class="site-footer-widget-area" style="<?php if ( !GBT_MT_Opt::getOption( 'expandable_footer' ) ) echo 'display:block'; ?>">
								<div class="row">
									<?php dynamic_sidebar( 'footer-widget-area' ); ?>
								</div><!-- .row -->
							</div><!-- .site-footer-widget-area -->
                        
						<?php endif; ?>
						
                        <div class="site-footer-copyright-area">
                            <div class="row">
                                <div class="medium-4 columns">	
                                    <div class="payment_methods">
                                        
                                        <?php
                                        if ( GBT_MT_Opt::getOption( 'credit_card_icons' ) != "" ) {
                                            if (is_ssl()) {
                                                $credit_card_icons = str_replace( "http://", "https://", GBT_MT_Opt::getOption( 'credit_card_icons' ) );		
                                            } else {
                                                $credit_card_icons = GBT_MT_Opt::getOption( 'credit_card_icons' );
                                            }
                                        ?>
                
                                        <img src="<?php echo esc_url($credit_card_icons); ?>" alt="<?php esc_html_e( 'Payment methods', 'mr_tailor' )?>" />
                                        
                                        <?php } ?>
            
                                    </div><!-- .payment_methods -->
                                </div><!-- .large-4 .columns -->
                                
                                <div class="medium-8 columns">
                                    <div class="copyright_text">
                                        <?php if ( GBT_MT_Opt::getOption( 'footer_copyright_text' ) != "" ) { ?>
                                            <?php printf(esc_html__( '%s', 'mr_tailor' ), GBT_MT_Opt::getOption('footer_copyright_text')); ?>
                                        <?php } ?>
                                    </div><!-- .copyright_text -->  
                                </div><!-- .large-8 .columns -->            
                            </div><!-- .row --> 
                        </div><!-- .site-footer-copyright-area -->
                               
                    </footer>

                    <?php endif; ?>
                    
                </div><!-- #page -->
                        
            </div><!-- /st-content -->
        </div><!-- /st-pusher -->
        
        <nav class="st-menu slide-from-left">
            <div class="nano">
                <div class="nano-content">
                    <div id="mobiles-menu-offcanvas" class="offcanvas-left-content">
                    	
                        <nav id="mobile-main-navigation" class="mobile-navigation" role="navigation">
						<?php 
							wp_nav_menu(array(
								'theme_location'  => 'main-navigation',
								'fallback_cb'     => false,
								'container'       => false,
								'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
							));
						?>
                        </nav>
                        
                        <?php 
						
						$theme_locations  = get_nav_menu_locations();
						if (isset($theme_locations['top-bar-navigation'])) {
							$menu_obj = get_term($theme_locations['top-bar-navigation'], 'nav_menu');
						}
						
						if ( (isset($menu_obj->count) && ($menu_obj->count > 0)) || (is_user_logged_in()) ) {
						?>
                        
                            <nav id="mobile-top-bar-navigation" class="mobile-navigation" role="navigation">
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
                            </nav>
                        
                        <?php } ?>
                        
                        <?php if ( function_exists('icl_get_languages') || class_exists('woocommerce_wpml') ) { ?>

                        <div class="language-and-currency-offcanvas hide-for-large-up">
							            
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
                            
                            <?php if (class_exists('woocommerce_wpml')) { ?>
                                <?php echo(do_shortcode('[currency_switcher]')); ?>
                            <?php } ?>
                        
                        </div>

                        <?php } ?>
                        
                        <?php do_action( 'footer_socials' ); ?>
                        
                    </div>
                    <div id="filters-offcanvas" class="offcanvas-left-content wpb_widgetised_column">
						<?php if ( is_active_sidebar( 'catalog-widget-area' ) ) : ?>
                            <?php dynamic_sidebar( 'catalog-widget-area' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
        
        <nav class="st-menu slide-from-right">
            <div class="nano">
                <div class="nano-content">
					<div id="minicart-offcanvas" class="offcanvas-right-content"><?php if ( class_exists( 'WC_Widget_Cart' ) ) { the_widget( 'WC_Widget_Cart' ); } ?></div>
                </div>
            </div>
        </nav>
    
    </div><!-- /st-container -->
    
    <?php do_action('mrtailor_footer_action'); ?> 
    
    <?php if ( GBT_MT_Opt::getOption( 'sticky_header' ) ) : ?>
    
	<!-- ******************************************************************** -->
    <!-- * Sticky Header **************************************************** -->
    <!-- ******************************************************************** -->
	
	<div class="site-header-sticky">
        <div class="row">		
		<div class="large-12 columns">
		    <div class="site-header-sticky-inner">
                    
                <?php
                
                if ( GBT_MT_Opt::getOption( 'site_logo' ) != "" ) {
                    if (is_ssl()) {
                        $sticky_header_logo = str_replace( "http://", "https://", GBT_MT_Opt::getOption( 'site_logo' ) );		
                    } else {
                        $sticky_header_logo = GBT_MT_Opt::getOption( 'site_logo' );
                    }
                }

                if ( GBT_MT_Opt::getOption( 'sticky_header_logo' ) != "" ) {
                    if (is_ssl()) {
                        $sticky_header_logo = str_replace( "http://", "https://", GBT_MT_Opt::getOption( 'sticky_header_logo') );		
                    } else {
                        $sticky_header_logo = GBT_MT_Opt::getOption( 'sticky_header_logo' );
                    }
                }

                ?>

                <div class="site-branding">

                    <?php if ( GBT_MT_Opt::getOption( 'site_logo' ) != "" ) : ?>

                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="site-logo" src="<?php echo esc_url($sticky_header_logo); ?>" title="<?php bloginfo( 'description' ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>

                    <?php else : ?>

                        <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>

                <?php endif; ?>

                </div><!-- .site-branding -->
                
                <div id="site-menu">
                    
                    <nav id="site-navigation" class="main-navigation" role="navigation">                    
                        <?php 
                            $args = array(
                                'theme_location'  => 'main-navigation',
                                'fallback_cb'     => false,
                                'container'       => false,
                                'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
                            );

                            if ( class_exists('rc_scm_walker')) {
                                $walker = new rc_scm_walker;
                                $args['walker'] = $walker;
                            }

                            wp_nav_menu( $args );
                        ?>           
                    </nav><!-- #site-navigation -->                  
                    
                    <div class="site-tools">
                        <ul>
                            
                            <li class="mobile-menu-button"><a href="javascript:void(0)"><span class="mobile-menu-text"><?php esc_html_e( 'MENU', 'mr_tailor' )?></span></a></li>
                            
                            <?php if (class_exists('YITH_WCWL')) : ?>
                                <?php if ( GBT_MT_Opt::getOption( 'main_header_wishlist' ) ) : ?>
                                    <li class="wishlist-button">
                                        <a href="<?php echo esc_url($yith_wcwl->get_wishlist_url()); ?>">
                                            <?php if ( GBT_MT_Opt::getOption( 'main_header_wishlist_icon' ) != "" ) : ?>
                                            <img src="<?php echo esc_url(GBT_MT_Opt::getOption( 'main_header_wishlist_icon' )); ?>">
                                            <?php else : ?>
                                            <span class="wishlist_icon"></span>
                                            <?php endif; ?>
                                            <span class="wishlist_items_number"><?php echo yith_wcwl_count_products(); ?></span>
                                        </a>
                                    </li>							
    							<?php endif; ?>
                            <?php endif; ?>
                            
                            
                            
                            <?php if (class_exists('WooCommerce')) : ?>
                                <?php if ( GBT_MT_Opt::getOption( 'main_header_shopping_bag' ) ) : ?>
                                    <?php if ( !GBT_MT_Opt::getOption( 'catalog_mode' ) ) : ?>
                                    <li class="shopping-bag-button" class="right-off-canvas-toggle">
                                        <a href="javascript:void(0)">
                                            <?php if ( GBT_MT_Opt::getOption( 'main_header_shopping_bag_icon' ) != "" ) : ?>
                                            <img src="<?php echo esc_url(GBT_MT_Opt::getOption( 'main_header_shopping_bag_icon' )); ?>">
                                            <?php else : ?>
                                            <span class="shopping_cart_icon"></span>
                                            <?php endif; ?>
                                            <span class="shopping_bag_items_number"><?php echo esc_html($woocommerce->cart->cart_contents_count); ?></span>
                                        </a>
                                    </li>
        							<?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if ( GBT_MT_Opt::getOption( 'main_header_search_bar' ) ) : ?>
                                <li class="search-button">
                                    <a href="javascript:void(0)">
                                        <?php if ( GBT_MT_Opt::getOption( 'main_header_search_bar_icon' ) != "" ) : ?>
                                        <img class="getbowtied-icon-search" src="<?php echo esc_url(GBT_MT_Opt::getOption( 'main_header_search_bar_icon' )); ?>">
                                        <?php else : ?>
                                        <span class="search_icon"></span>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php endif; ?>
                            
                        </ul>	
                    </div>
                
                </div><!-- #site-menu -->
                
                <div class="clearfix"></div>
			</div><!--.site-header-sticky-inner-->	
		</div><!-- .large-12-->
		</div><!--.row--> 
    </div><!-- .site-header-sticky -->
    
    <?php endif; ?>
	
	
    <!-- ******************************************************************** -->
    <!-- * WP Footer() ****************************************************** -->
    <!-- ******************************************************************** -->
	
	<div class="login_header">
		<a class="go_home" href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>
	</div>
	
<?php wp_footer(); ?>
</body>

</html>