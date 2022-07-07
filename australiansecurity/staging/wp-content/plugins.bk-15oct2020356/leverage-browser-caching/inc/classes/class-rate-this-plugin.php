<?php
/**
 * Rate_This_Plugin class.
 */
class Rate_This_Plugin {

	/**
	 * [__construct description]
	 */
	public function __construct() {
		add_action( 'admin_notices', array( $this, 'message' ) );
		add_action( 'admin_init', array( $this, 'handle_notic' ) );
		register_deactivation_hook( LBROWSERC_FILE, array( $this, 'remove_option' ) );
	}

	/**
	 * [message description]
	 * @return [type] [description]
	 */
	public function message() {
		if( get_option( 'lbrowserc_ignore_rating', 'show' ) != 'hide' ) {
			echo '<div class="updated"><p>';
			printf( __( 'Enjoying <b>Leverage Browser Caching</b> Plugin? Please <a target="_blank" href="%1$s">Rate it</a> | <a href="%2$s">Dismiss this info</a>', 'lbrowserc' ), 'https://wordpress.org/support/plugin/leverage-browser-caching/reviews/?filter=5', esc_url( add_query_arg( 'lbrowserc_ignore_rating', '1' ) ) );
			echo "</p></div>";
		}
	}

	/**
	 * [handle_notic description]
	 * @return [type] [description]
	 */
	public function handle_notic() {
		if( isset( $_GET['lbrowserc_ignore_rating']) && '1' == $_GET['lbrowserc_ignore_rating'] ) {
			update_option( 'lbrowserc_ignore_rating', 'hide' );
		}
	}

	/**
	 * [remove_option description]
	 * @return [type] [description]
	 */
	public function remove_option() {
		delete_option( 'lbrowserc_ignore_rating' );
	}

}
