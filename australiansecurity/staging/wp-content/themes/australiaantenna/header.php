<?php
/** 
 * Header template 
 */
?>
<!DOCTYPE HTML >
<html <?php language_attributes(); ?> class="no-js no-svg">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KWX9C3G');</script>
<!-- End Google Tag Manager -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
        <?php wp_head(); ?>

    </head>
    <body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KWX9C3G"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
        <div class="top">
            <div class="go-to-top">
                <div class="go-to-top-arrow"></div>
            </div>
        </div>
        
        <!-- Header start -->
        <header class="main-header">
            <div class="container">
                <div class="logo">
                    <a href="<?php echo site_url(); ?>">
                        <?php $logo = get_field( 'logo', 'options' );?>
                        <img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>">
                    </a>
                </div>
                <div class="right-header">
                    <div class="header-contact">
                        <p>Call now for a <a class="phone-number-header" href="tel:<?php the_field( 'contact_no', 'options' );?>"> FREE QUOTE <?php the_field( 'contact_no', 'options' );?></a></p>
                        <div class="header-links" style="margin-bottom:15px;">
                             <?php while( have_rows( 'social_links', 'options' ) ): the_row(); ?>
                                <a class="social-media-icons-header" href="<?php echo get_sub_field( 'link' ); ?>" target="_blank">
                                    <?php $icon = get_sub_field( 'image' ); ?> 
                                    <img class="social-media-icons-header" src="<?php echo $icon['url'];?>" alt="<?php echo $icon['alt'];?>">
                                </a>
                            <?php endwhile; ?>
                        </div>
                    </div>
                    <a href="javascript:void(0)" class="hb-menu">
                        <span></span>
                    </a>
                    
                    <?php 
                        if ( has_nav_menu( 'top' ) ) {
                            wp_nav_menu( array(
                                'container' => 'nav',
                                'container_class' => 'main-nav',
                                'theme_location' => 'top'
                            ) ); 
                        }
                    ?>
                </div>
            </div>  
        </header>