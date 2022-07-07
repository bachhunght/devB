<?php global $yith_wcwl; ?>

<header id="masthead" class="site-header header-default" role="banner">
                            
    <div class="row">		
        
        <div class="large-12 columns">
            
            <div class="site-header-wrapper">
            
                <div class="site-branding">
                    
                    <?php
                    if ( GBT_MT_Opt::getOption( 'site_logo' ) != "" ) {
                        if (is_ssl()) {
                            $site_logo = str_replace("http://", "https://", GBT_MT_Opt::getOption( 'site_logo' ));
                            if ($header_transparency_class == "transparent_header")	{
								if ( ($transparency_scheme == "transparency_light") && (GBT_MT_Opt::getOption( 'light_transparent_header_logo' ) != "") ) {
									$site_logo = str_replace("http://", "https://", GBT_MT_Opt::getOption( 'light_transparent_header_logo' ));	
								}
								if ( ($transparency_scheme == "transparency_dark") && (GBT_MT_Opt::getOption( 'dark_transparent_header_logo' ) != "") ) {
									$site_logo = str_replace("http://", "https://", GBT_MT_Opt::getOption( 'dark_transparent_header_logo' ));	
								}
							}
                        } else {
                            $site_logo = GBT_MT_Opt::getOption( 'site_logo' );
                            if ($header_transparency_class == "transparent_header")	{
								if ( ($transparency_scheme == "transparency_light") && (GBT_MT_Opt::getOption( 'light_transparent_header_logo' ) != "") ) {
									$site_logo = GBT_MT_Opt::getOption( 'light_transparent_header_logo' );
								}
								if ( ($transparency_scheme == "transparency_dark") && (GBT_MT_Opt::getOption( 'dark_transparent_header_logo' ) != "") ) {
									$site_logo = GBT_MT_Opt::getOption( 'dark_transparent_header_logo' );
								}
							}
                        }
                    ?>
    
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="site-logo" src="<?php echo esc_url($site_logo); ?>" title="<?php bloginfo( 'description' ); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>
                    
                    <?php } else { ?>
                    
                        <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
                    
                    <?php } ?>
                    
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
                                        
                    <div class="site-search">
						<?php
                        if (class_exists('WooCommerce')) {
                            the_widget( 'WC_Widget_Product_Search', 'title=' );
                        } else {
                            the_widget( 'WP_Widget_Search', 'title=' );
                        }
                        ?>               
                    </div><!-- .site-search -->
                
                </div><!-- #site-menu -->
                
                <div class="clearfix"></div>
            
            </div><!-- .site-header-wrapper -->
                           
        </div><!-- .columns -->
                    
    </div><!-- .row -->

</header><!-- #masthead -->