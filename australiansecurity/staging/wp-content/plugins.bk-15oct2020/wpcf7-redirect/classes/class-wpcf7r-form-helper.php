<?php
/**
 * Class WPCF7r_Form_Helper - Adds contact form scripts and actions
 */
defined( 'ABSPATH' ) || exit;

class WPCF7r_Form_Helper {

	public $textdomain = 'wpcf7-redirect';

	public function __construct() {

		$this->plugin_url     = WPCF7_PRO_REDIRECT_BASE_URL;
		$this->assets_js_lib  = WPCF7_PRO_REDIRECT_BASE_URL . '/assets/lib/';
		$this->assets_js_url  = WPCF7_PRO_REDIRECT_BASE_URL . '/assets/js/';
		$this->assets_css_url = WPCF7_PRO_REDIRECT_BASE_URL . '/assets/css/';
		$this->build_js_url   = WPCF7_PRO_REDIRECT_BASE_URL . '/build/js/';
		$this->build_css_url  = WPCF7_PRO_REDIRECT_BASE_URL . 'build/css/';
		$this->extensions     = wpcf7_get_extensions();
		$this->add_actions();

	}

	/**
	 * Add Actions
	 */
	private function add_actions() {

		global $pagenow;

		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
		add_action( 'wpcf7_editor_panels', array( $this, 'add_panel' ) );
		add_action( 'wpcf7_after_save', array( $this, 'store_meta' ) );
		//add contact form scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'front_end_scripts' ) );
		//add contact form scripts for admin panel
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_backend' ) );
		add_action( 'wp_ajax_activate_wpcf7r_extension', array( $this, 'activate_extension' ) );
		add_action( 'wp_ajax_deactivate_wpcf7r_extension', array( $this, 'deactivate_plugin_license' ) );
		add_action( 'admin_init', array( $this, '_maybe_update_extensions_check' ), 10 );
		add_action( 'wp_ajax_wpcf7r_extension_update', array( $this, '_maybe_update_extension' ), 10 );
		add_action( 'wp_ajax_get_coupon', array( $this, 'get_coupon' ) );
		add_action( 'wpcf7_admin_notices', array( $this, 'render_discount_banner' ), 15, 3 );
		add_action( 'admin_init', array( $this, 'dismiss_ads' ) );
	}

	function _maybe_update_extension() {

		$extension_name = isset( $_POST['extension_name'] ) && $_POST['extension_name'] ? sanitize_text_field( $_POST['extension_name'] ) : '';

		if ( $extension_name ) {
			$extension = $this->get_extension_object( $extension_name );

			if ( $extension->has_update() ) {
				$results = $extension->save_extension_file();
			}

			$results['html'] = $extension->ajax_extension_html();
		}

		wp_send_json( $results );
	}

	public function _maybe_update_extensions_check() {

		$current = get_site_transient( 'update_wpcf7r_extensions' );

		if ( isset( $current->last_checked, $current->version_checked ) &&
			12 * HOUR_IN_SECONDS > ( current_time() - $current->last_checked ) &&
			$current->version_checked === $wp_version ) {

			return;
		}

		$this->check_for_extensions_update();

	}

	public function check_for_extensions_update() {

		$api = new Qs_Api();

		foreach ( $this->extensions as $extension_type => $extension_details ) {

			$extension = new WPCF7R_Extension( $extension_details );

			if ( $extension->is_active() ) {

				$has_update = $api->extension_has_update( $extension );

				if ( $has_update ) {

					$extension->set_needs_update();

				} else {

					$extension->set_updated();

				}
			}
		}

	}

	public function get_extension_object( $extention_name ) {

		$extention_object = isset( $this->extensions[ $extention_name ] ) ? new WPCF7R_Extension( $this->extensions[ $extention_name ] ) : '';

		return $extention_object;

	}

	public function deactivate_plugin_license() {

		if ( ! isset( $_POST['extension_name'] ) ) {

			$results = array(
				'message' => __( 'Missing name or serial', 'wpcf7-redirect' ),
			);

		} else {

			$extentsion_settings = $this->extensions[ $_POST['extension_name'] ];

			if ( $extentsion_settings ) {
				$extentsion = new WPCF7R_Extension( $extentsion_settings );
				$results    = $extentsion->deactivate_license();
			}
		}

		wp_send_json( $results );

	}

	public function activate_extension() {

		if ( ! isset( $_POST['extension_name'] ) || ! isset( $_POST['serial'] ) ) {
			$results = array(
				'message' => __( 'Missing name or serial', 'wpcf7-redirect' ),
			);
		} else {

			$extentsion_settings = $this->extensions[ $_POST['extension_name'] ];

			if ( $extentsion_settings ) {
				$extentsion = new WPCF7R_extension( $extentsion_settings );
				$serial     = sanitize_text_field( $_POST['serial'] );
				$results    = $extentsion->activate( $serial );
			} else {
				$results['extension_html'] = __( 'Somthing went wrong', 'wpcf7-redirect' );
			}
		}

		wp_send_json( $results );
	}
	/**
	 * Dismiss plugin ads
	 */
	public function dismiss_ads() {

		if ( isset( $_GET['wpcf7_redirect_dismiss_banner'] ) && '1' === $_GET['wpcf7_redirect_dismiss_banner'] ) {
			update_option( 'wpcf7_redirect_dismiss_banner', 1 );
		}

	}

	/**
	 * Only load scripts when contact form instance is created
	 */
	public function front_end_scripts() {

		wp_register_style( 'wpcf7-redirect-script-frontend', $this->build_css_url . 'wpcf7-redirect-frontend.min.css' );
		wp_enqueue_style( 'wpcf7-redirect-script-frontend' );
		wp_register_script( 'wpcf7-redirect-script', $this->build_js_url . 'wpcf7-redirect-frontend-script.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'wpcf7-redirect-script' );
		wp_localize_script( 'wpcf7-redirect-script', 'wpcf7r', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		//add support for other plugins
		do_action( 'wpcf7_redirect_enqueue_frontend', $this );
	}

	/**
	 * Check if the current page is the plugin settings page
	 */
	public function is_wpcf7_settings_page() {
		return isset( $_GET['page'] ) && 'wpc7_redirect' === $_GET['page'];
	}

	public function is_wpcf7_lead_page() {
		return 'wpcf7r_leads' === get_post_type();
	}

	public function is_accesibe_page() {
		$screen = get_current_screen();

		return 'toplevel_page_' . qs_get_plugin_display_name() === $screen->base;
	}

	/**
	 * Check if the current page is the contact form edit screen
	 */
	public function is_wpcf7_edit() {

		$wpcf7_page          = isset( $_GET['page'] ) && 'wpcf7' === $_GET['page'] && isset( $_GET['post'] ) && $_GET['post'];
		$wpcf7_page_new_page = isset( $_GET['page'] ) && 'wpcf7-new' === $_GET['page'];

		return $wpcf7_page_new_page || $wpcf7_page;
	}

	/**
	 * Load plugin textdomain.
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'wpcf7-redirect', false, basename( dirname( __FILE__ ) ) . '/lang' );
	}

	/**
	 * Enqueue theme styles and scripts - back-end
	 */
	public function enqueue_backend() {

		if ( $this->is_wpcf7_edit() || $this->is_wpcf7_settings_page() || $this->is_wpcf7_lead_page() || $this->is_accesibe_page() ) {

			wp_enqueue_style( 'admin-build', $this->build_css_url . 'wpcf7-redirect-backend.css' );
			wp_enqueue_script( 'admin-build-js', $this->build_js_url . 'wpcf7-redirect-backend-script.js', array(), null, true );
			wp_enqueue_script(
				array(
					'jquery-ui-core',
					'jquery-ui-sortable',
					'wp-color-picker',
				)
			);
			//add support for other plugins
			do_action( 'wpcf_7_redirect_admin_scripts', $this );
		}
	}

	/**
	 * Store form data
	 *
	 * @param $cf7
	 */
	function store_meta( $cf7 ) {

		$form = get_cf7r_form( $cf7->id() );
		$form->store_meta( $cf7 );
	}

	/**
	 * Adds a tab to the editor on the form edit page
	 *
	 * @param array $panels An array of panels. Each panel has a callback function.
	 */
	public function add_panel( $panels ) {

		//disable plugin functionality for old contact form 7 installations

		if ( wpcf7_get_cf7_ver() > 4.8 ) {

			$panels['redirect-panel'] = array(
				'title'    => __( 'Actions', 'wpcf7-redirect' ),
				'callback' => array( $this, 'create_panel_inputs' ),
			);

			$panels['extensions-panel'] = array(
				'title'    => __( 'Extensions', 'wpcf7-redirect' ),
				'callback' => array( $this, 'extensions_manager' ),
			);

			if ( is_wpcf7r_debug() ) {

				$panels['debug-panel'] = array(
					'title'    => __( 'Debug', 'wpcf7-redirect' ),
					'callback' => array( $this, 'wpcf7_debug' ),
				);

			}
		}

		return $panels;
	}

	/**
	 * Get the default fields
	 */
	public static function get_plugin_default_fields() {

		return array(
			array(
				'name' => 'redirect_type',
				'type' => 'text',
			),
		);
	}

	/**
	 * Handler to retrive banner to display
	 * At the moment used to display the pro version bannner
	 */
	public function banner() {
		$banner_manager = new Banner_Manager();
		$banner_manager->show_banner();
	}

	/**
	 * Create the panel inputs
	 *
	 * @param  object $post Post object.
	 */
	public function create_panel_inputs( $cf7 ) {

		$form = get_cf7r_form( $cf7->id() );

		$form->init();
	}

	/**
	 * Manage contact form 7 redirection pro extensions
	 *
	 * @param $cf7
	 */
	public function extensions_manager( $cf7 ) {

		$this->extensions_manager = $this->get_extension_manager();
		$this->extensions_manager->init();

	}

	/**
	 * Get extension manager instance
	 *
	 * @return void
	 */
	public function get_extension_manager() {
		return isset( $this->extensions_manager ) ? $this->extensions_manager : new WPCF7R_Extensions();
	}

	public function wpcf7_debug( $cf7 ) {
		$form     = get_cf7r_form( $cf7->id() );
		$cf7_json = serialize( $form );
		echo "<textarea style='width:100%;height:500px;'>{$cf7_json}</textarea>";
	}

	/**
	 * Render discount banner
	 *
	 * @param $page
	 * @param $action
	 * @param $object
	 */
	public function render_discount_banner( $page, $action, $object ) {

		if ( 'edit' === $action ) {
			if ( ! get_option( 'wpcf7_redirect_dismiss_banner' ) ) :
				?>
				<div class="rp-overlay">
					<div class="rp-discount">
						<button type="button" class="rp-close" aria-label="<?php _e( 'Close Banner', 'wpcf7-redirect' ); ?>" title="<?php _e( 'Close Banner', 'wpcf7-redirect' ); ?>">&times;</button>
						<span class="rp-top-title">
						<?php _e( 'Redirection Pro for Contact Form 7', 'wpcf7-redirect' ); ?>
						</span>
						<span class="rp-title-large">
							<?php _e( 'Get 20% Off', 'wpcf7-redirect' ); ?>
						</span>
						<ul class="rp-features-list">
							<li>
								<?php _e( 'Get 20% OffUpgrade your Contact Form 7 experience', 'wpcf7-redirect' ); ?>
							</li>
							<li>
								<?php _e( 'With conditional actions management', 'wpcf7-redirect' ); ?>
							</li>
						</ul>
						<div class="rp-contact-form">
							<span class="rp-contact-form-title">
								<?php _e( 'With conditional actions managementGet it now -', 'wpcf7-redirect' ); ?>
							</span>
							<div class="rp-cols">
								<div class="rp-col-form">
									<div class="rp-contact-form-form">
										<div class="input-wrap">
											<input type="email" name="rp_user_email" id="rp_user_email" aria-label="Enter your e-mail here" value="<?php echo get_option( 'admin_email' ); ?>" placeholder="Enter your e-mail here" />
											<button class="btn-rp-submit" aria-label="Contact Form 7 Redirection Pro - submit application for a discount">
												<span class="rp-icon-plane"></span>
											</button>
										</div>
										<div class="checkbox-wrap">
											<input type="checkbox" name="rp_get_offers" id="rp_get_offers" value="0">
											<label for="rp_get_offers">
												<?php _e( 'Keep me up to date on updates and exclusive offers', 'wpcf7-redirect' ); ?>
											</label>
										</div>
										<div class="rp-form-message">
											<span class="rp-loader"></span>
										</div>
									</div>
								</div>
								<div class="rp-col-featured">
									<a href="<?php echo WPCF7_PRO_REDIRECT_PLUGIN_PAGE_URL; ?>" rel="noopener" target="_blank">
										<span class="rp-text">
											<?php _e( 'Featured in:', 'wpcf7-redirect' ); ?>
										</span>
										<span class="logo-querysol"></span>
									</a>
								</div>
							</div>
						</div>
						<footer class="rp-footer">
							<div class="rp-footer-top">
								<strong><?php _e( 'WHY IT’S THE MIGHTIEST', 'wpcf7-redirect' ); ?></strong><?php _e( ' - Powerful conditional logic  - Manage custom error messages  - Manage direction rules -', 'wpcf7-redirect' ); ?>
								<?php _e( 'Mailchimp integration - Paypal integration  - Manage Google/Facebook Pixels', 'wpcf7-redirect' ); ?>
								<a href="<?php echo WPCF7_PRO_REDIRECT_PLUGIN_PAGE_URL; ?>" target="_blank" rel="noopener">
									<?php _e( 'Learn More', 'wpcf7-redirect' ); ?>
								</a>
							</div>
							<div class="rp-footer-bottom">
								<?php _e( 'Query Solutions Ltd. 2010 Ⓒ', 'wpcf7-redirect' ); ?>
							</div>
						</footer>
					</div>
				</div>
				<?php
			endif;
		}
	}

	/**
	 * Get coupon ajax function
	 *
	 * @return wp_send_json
	 */
	public function get_coupon() {
		$data = $_POST['data'];

		$email = isset( $data['email'] ) && is_email( $data['email'] ) ? $data['email'] : false;

		if ( ! $email ) {
			$results = array(
				'status'  => 'rp-error',
				'message' => 'Please enter a valid email.',
			);

			wp_send_json( $results );
		} else {
			$ip     = $_SERVER['REMOTE_ADDR'];
			$url    = home_url();
			$accept = sanitize_text_field( $data['get_offers'] );
			$params = array(
				'ip_address' => $ip,
				'accept'     => $accept,
				'email'      => $email,
				'url'        => $url,
			);

			$params = http_build_query( $params );

			$endpoint = WPCF7_PRO_REDIRECT_PLUGIN_PAGE_URL . "wp-json/api-v1/get-coupon?{$params}";

			$response = wp_remote_post( $endpoint );

			$body = json_decode( wp_remote_retrieve_body( $response ), true );

			if ( isset( $body['message'] ) ) {
				$results = array(
					'status'  => 'rp-success',
					'message' => $body['message'],
				);
			} elseif ( isset( $body['redirect'] ) ) {
				$results = array(
					'status' => 'rp-success',
					'url'    => $body['redirect'],
				);
			}
		}

		wp_send_json( $results );
	}
}

register_activation_hook( __FILE__, array( 'WPCF7r_Form_Helper', 'plugin_activated' ) );
