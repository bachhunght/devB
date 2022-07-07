<?php

// Halloween 2021 Campaign
if ( ( get_option( 'ig_offer_bfcm_2021_icegram' ) !== 'yes' ) && Icegram_upsale::is_offer_period( 'bfcm') ) { 
    $img_url = $this->plugin_url .'/assets/images/bfcm2021.png';
    $ig_plan = get_option( 'ig_engage_plan', 'lite' );
    if( 'lite' === $ig_plan ){
        $img_url = $this->plugin_url .'/assets/images/bfcm2021_lite.png';
    }elseif( 'plus' === $ig_plan || 'pro' === $ig_plan ){
        $img_url = $this->plugin_url .'/assets/images/bfcm2021_pro.png';
    }

    ?>
    <style type="text/css">
        .ig_es_offer {
            width: 55%;
            margin: 0 auto;
            text-align: center;
            padding-top: 1.2em;
        }

    </style>
    <div class="ig_es_offer">
        <a target="_blank" href="?ig_dismiss_admin_notice=1&ig_option_name=ig_offer_bfcm_2021"><img src="<?php echo $img_url; ?>"/></a>
    </div>
<?php } ?>