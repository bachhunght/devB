<?php	
	global $woocommerce, $wp_version;
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


    <!-- ******************************************************************** -->
    <!-- * WordPress wp_head() ********************************************** -->
    <!-- ******************************************************************** -->
    
    <?php wp_head(); ?>
    
    <!-- ******************************************************************** -->
    <!-- * Custom Favicon *************************************************** -->
    <!-- ******************************************************************** -->
    
    <?php
	if ( GBT_MT_Opt::getOption( 'favicon' ) != "" ) {
        
        if (is_ssl()) {
            $favicon_image_img = str_replace("http://", "https://", GBT_MT_Opt::getOption( 'favicon' ));		
        } else {
            $favicon_image_img = GBT_MT_Opt::getOption( 'favicon' );
        }
	?>
    
    <!-- ******************************************************************** -->
    <!-- * Favicon ********************************************************** -->
    <!-- ******************************************************************** -->
    
    <link rel="shortcut icon" href="https://www.leontyna.com.au/dev/wp-content/uploads/2019/08/index.ico" type="image/x-icon" />
        
    <?php } ?>
    
    <!-- ******************************************************************** -->
    <!-- * Custom Header JavaScript Code ************************************ -->
    <!-- ******************************************************************** -->

    <?php do_action('mrtailor_header_start'); ?>

</head>

<body <?php body_class(); ?>>

	<div id="st-container" class="st-container">

        <div class="st-pusher">
            
            <div class="st-pusher-after"></div>   
                
                <div class="st-content">
                    
                    <?php

					$header_transparency_class = "";
					$transparency_scheme = "";
					
					if ( GBT_MT_Opt::getOption( 'main_header_background_transparency' ) ) {
						$header_transparency_class = "transparent_header";
					} else {
                        $header_transparency_class = "normal_header";
                    }
					
					$transparency_scheme = GBT_MT_Opt::getOption( 'main_header_transparency_scheme' );
					
					$page_id = "";
					if ( is_single() || is_page() ) {
						$page_id = get_the_ID();
					} else if ( is_home() ) {
						$page_id = get_option('page_for_posts');		
					}
					
					if ( (get_post_meta($page_id, 'page_header_transparency', true)) && (get_post_meta($page_id, 'page_header_transparency', true) != "inherit") ) {
                        $header_transparency_class = "transparent_header";
						$transparency_scheme = get_post_meta( $page_id, 'page_header_transparency', true );
					}
					
					if ( (get_post_meta($page_id, 'page_header_transparency', true)) && (get_post_meta($page_id, 'page_header_transparency', true) == "no_transparency") ) {
						$header_transparency_class = "normal_header";
						$transparency_scheme = "";
					}

                    if (class_exists('WooCommerce')) 
                    {
                        if (is_shop())
                        {
                            if ( (get_post_meta(get_option( 'woocommerce_shop_page_id' ), 'page_header_transparency', true)) && (get_post_meta(get_option( 'woocommerce_shop_page_id' ), 'page_header_transparency', true) != "inherit") ) {
                                $header_transparency_class = "transparent_header";
                                $transparency_scheme = get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'page_header_transparency', true );

                            } else {
                                $header_transparency_class = "normal_header";
                                $transparency_scheme = "";
                            }
                            
                            if ( (get_post_meta(get_option( 'woocommerce_shop_page_id' ), 'page_header_transparency', true)) && (get_post_meta(get_option( 'woocommerce_shop_page_id' ), 'page_header_transparency', true) == "no_transparency") ) {
                                $header_transparency_class = "normal_header";
                                $transparency_scheme = "";
                            }
                        }

                        if ( is_product_category() && is_woocommerce() )
                        {
                            // die('here');

                            if ( GBT_MT_Opt::getOption( 'shop_category_header_transparency_scheme' ) == 'inherit' )
                            {
                                // do nothing, inherit
                            }
                            else if ( GBT_MT_Opt::getOption( 'shop_category_header_transparency_scheme' ) == 'no_transparency' )
                            {
                                $header_transparency_class = "";
                                $transparency_scheme = "";
                            }
                            else 
                            {
                                $header_transparency_class = "transparent_header";
                                $transparency_scheme = GBT_MT_Opt::getOption( 'shop_category_header_transparency_scheme' );
                            }
                        }
                    }

					?>
                    
                    <div id="page" class="<?php echo esc_attr($header_transparency_class); ?> <?php echo esc_html($transparency_scheme); ?>">
                    
                        <?php do_action( 'before' ); ?>
                        
                        <div class="top-headers-wrapper">
						
							<?php if ( GBT_MT_Opt::getOption( 'top_bar_switch' ) ) : ?>                        
                                <?php require_once( get_template_directory() .'/header-topbar.php'); ?>
                            <?php endif; ?>                      
                            
                            <?php
                            
							if ( GBT_MT_Opt::getOption( 'header_layout' ) == "0" ) {
								require_once( get_template_directory() .'/header-default.php');
							} else {
								require_once( get_template_directory() .'/header-centered.php');
							}
							
							?>
                        
                        </div>
                        
                        <?php if (function_exists('wc_print_notices')) : ?>
                        <?php wc_print_notices(); ?>
                        <?php endif; ?>
