<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
* Icegram Compatibility class with other plugins
*/
if ( ! class_exists( 'Icegram_upsale' ) ) {
	class Icegram_upsale {
		function __construct() {
			//add_action( 'add_meta_boxes', array( &$this, 'add_campaigns_analytics_metaboxes' ), 0 );

			// Add upsale metabox only if there isn't any other ongoing sale period.
			// if ( ! self::is_offer_period( 'bfcm' ) ) {
			// 	add_action( 'add_meta_boxes', array( &$this, 'add_upsell_notice' ), 0 );
			// }
			// add_filter( 'icegram_campaign_tabs', array( &$this, 'add_upsale_tab' ), 10, 1 );
			// add_action('icegram_after_message_settings', array($this,'display_bt_upsale'),10,2);
			// add_filter('icegram_message_field_link' ,array(&$this, 'display_cta_upsale'));
			// add_action('icegram_additional_campaign_rules', array($this,'display_countdown_timer_upsale'),10,2);
		}

		function add_campaigns_analytics_metaboxes(){
			add_meta_box( 'campaign_stats_upsale', __( 'Statistics', 'icegram' ), array( &$this, 'print_campaign_image' ), 'ig_campaign', 'normal', 'high' );
		}


		function print_campaign_image(){
			global $icegram;
			?>
			<a href="https://www.icegram.com/analytics/?utm_source=in_app&utm_medium=analytics&utm_campaign=ig_upsell" target="blank"><img src="<?php echo $icegram->plugin_url ?>/assets/images/analytics.png"/></a>
			<?php
		}

		/**
         * Add Upsell Notice
         *
		 * @since 1.10.40
		 */
		function add_upsell_notice(){
			add_meta_box( 'premium_upsale', __( 'Upgrade To Premium', 'icegram' ), array( &$this, 'print_premium_message' ), 'ig_campaign', 'side' );
		}

		/**
		 * Added Premium Notice
		 *
		 * @since 1.10.40
		 */
		function print_premium_message() {

			$pricing_url = "https://www.icegram.com/pricing/?utm_source=in_app&utm_medium=campaign_upgrade_notice&utm_campaign=ig_upsell";

			/* translators: 1. Div tag 2. Icegram pricing page link 3. Anchor close 4. Discount text 5. Discount code */
			echo sprintf( esc_html__('%1$sUnlock high conversion Icegram campaigns to reduce abandonment & increase sales with %2$sIcegram Engage!%3$sUpgrade now & get %4$sUse code %5$s', 'icegram'), '<div style="font-size:14px"><p class="ig_message_upsale">','<a style="font-weight:500;" href="' . esc_attr( $pricing_url) . '" target="_blank" >', '</a></p>', '<b>10% discount!</b><br/><br/>', '<b class="ig_upsale_premium_code">PREMIUM10</b></div>' );
		}

		function add_upsale_tab( $tabs ){
			$tabs['nav']['upsale'] = '<li class="ig-admin-nav-upsale ig-admin-nav-notab"><a href="https://www.icegram.com/split-testing/?utm_source=in_app&utm_medium=split-testing&utm_campaign=ig_upsell" target="blank">Split testing<span style="font-size: 0.8em; margin-left: 0.3em; padding: 2px; background: #e66060; color: #fff; border-radius: 2px; ">Premium</span></a></li>';
			return $tabs;
		}

		function display_bt_upsale( $message_id, $message_data ){
		global $icegram;
		?>
			<label class="message_label"><a class="ig_bt_upsale" href="https://www.icegram.com/exit-intent-optins/?utm_source=in_app&utm_medium=exit-intent&utm_campaign=ig_upsell" target="_blank"><img src="<?php echo $icegram->plugin_url ?>/assets/images/exit-intent-label.png"/></a></label>
			<a class="ig_bt_upsale" href="https://www.icegram.com/exit-intent-optins/?utm_source=in_app&utm_medium=exit-intent&utm_campaign=ig_upsell" target="_blank"><img src="<?php echo $icegram->plugin_url ?>/assets/images/exit-intent-feild.png"/></a>
		<?php
		}

		function display_cta_upsale( $params ){
			global $icegram;
		?>
			<a class="ig_cta_upsale" href="https://www.icegram.com/cta-actions/?utm_source=in_app&utm_medium=cta&utm_campaign=ig_upsell" target="_blank"><img src="<?php echo $icegram->plugin_url ?>/assets/images/cta-new-tab.png"/></a>
		<?php
		return $params;
		}

		function display_countdown_timer_upsale( $message_id, $message_data ){
			global $icegram;
		?>
		<div class="options_group">
			<a class="" href="https://www.icegram.com/pricing/?utm_source=in_app&utm_medium=countdown_timer&utm_campaign=ig_upsell" target="_blank"><img src="<?php echo $icegram->plugin_url ?>/assets/images/countdown-timer.png"/></a>
		</div>
		<?php
		}

		/**
		 * Check if sale period
		 *
		 * @return boolean
		 */
		public static function is_offer_period( $offer_name = '' ) {

			$is_offer_period = false;
			if ( ! empty( $offer_name ) ) {
				$current_utc_time = time();
				$current_ist_time = $current_utc_time + ( 5.5 * HOUR_IN_SECONDS ); // Add IST offset to get IST time

				if ( 'bfcm' === $offer_name ) {
					$offer_start_time = strtotime( '2021-11-15 12:00:00' ); // Offer start time in IST
					$offer_end_time   = strtotime( '2021-12-01 12:00:00' ); // Offer end time in IST
				}
	
				$is_offer_period = $current_ist_time >= $offer_start_time && $current_ist_time <= $offer_end_time;
			}
			
			return $is_offer_period;
		}

	}
	$icegram_upsale = new Icegram_upsale();
}
