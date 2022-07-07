<?php
/** 
 * Header template 
 */
?>
<!DOCTYPE HTML >
<html <?php language_attributes(); ?> class="no-js no-svg">
    <head>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P9QT4V');</script>
<!-- End Google Tag Manager -->

        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
        <?php wp_head(); ?>

<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "LocalBusiness",
    "name": "Australian Antennas",
    "image": "https://www.australianantennas.com.au/wp-content/uploads/2018/05/australian-schema.jpg",
    "url": "https://www.australianantennas.com.au",
    "telephone": "+61 3 0036 1121",
    "address": {
        "@type": "PostalAddress",
        "streetAddress": "15/277-289 Middleborough Road",
        "addressLocality": "Box Hill South",
        "addressRegion": "VIC",
        "postalCode": "3128",
        "addressCountry": "AU"
    },
    "location": {
        "@type": "Place",
        "geo": {
            "@type": "GeoCircle",
            "geoRadius": "100000",
            "geoMidpoint": {
                "@type": "GeoCoordinates",
                "latitude": "-37.8343289",
                "longitude": "145.1323272"
            }
        }
    },
    "openingHours": [
        "Mo-Fr 08:00-17:00",
        "Sa 08:00-14:00"
    ],
    "priceRange": "$$$"
}
</script>

<script type="application/ld+json">
{
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "Australian Antennas",
    "url": "https://www.australianantennas.com.au",
    "logo": "https://www.australianantennas.com.au/wp-content/uploads/2018/05/australian-schema.jpg",
    "contactPoint": [
        {
            "@type": "ContactPoint",
            "telephone": "+61 3 0036 1121",
            "contactType": "sales",
            "email": "sales@australianantennas.com.au",
            "areaServed": [
                "AU"
            ],
            "availableLanguage": [
                "English"
            ]
        }
    ],
    "sameAs": [
        "https://www.facebook.com/AustralianAntennas",
        "https://twitter.com/AusAntennas",
        "https://www.instagram.com/australianantennas/",
        "https://www.youtube.com/user/AustralianAntennas",
        "http://stores.ebay.com.au/Australian-Antennas-for-Digital-TV"
    ]
}
</script>

<?php echo do_shortcode( '[brb_collection id="1320"]' ); ?>



    </head>
    <body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P9QT4V"
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
                        <div class="header-links">
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

                                                                                                                                                                                           	

