<?php
/**
 * The main class that manages the plugin
 */
defined( 'ABSPATH' ) || exit;

class WPCF7R_Base {

	public static $instance;

	public function __construct() {
		self::$instance = $this;

		$this->plugin_path = WPCF7_PRO_REDIRECT_BASE_PATH;

		$this->version = WPCF7_PRO_REDIRECT_PLUGIN_VERSION;

		$this->load_dependencies();
		$this->init_plugin_dependencies();
		$this->post_types();
		$this->add_action_hooks();
		$this->add_ajax_hooks();
	}

	/**
	 * Create instances of all required objects
	 */
	public function init_plugin_dependencies() {
		$this->wpcf_settings = new WPCF7r_Settings();

		$this->wpcf7_redirect = new WPCF7r_Form_Helper();

		$this->wpcf7_utils = new WPCF7r_Utils();

		$this->wpcf7_submission = new WPCF7r_Submission();

		$this->wpcf7_updates_class = new Wpcf7r_Updates( $this->version, WPCF7_PRO_REDIRECT_BASE_NAME );

		$this->wpcf7_updates_class = new WPCF7R_User();
	}

	/**
	 * Register the post type required for the action managment
	 */
	public function post_types() {
		new WPCF7R_Post_Types();
	}

	/**
	 * Get a singelton
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	/**
	 * Some general plugin hooks
	 */
	public function add_action_hooks() {
		//display banner on the redirect settings page
		//the banner will be used to the premium version
		//add_action( 'before_redirect_settings_tab_title' , array( $this->wpcf7_utils , 'get_banner' ) , 10 );
		add_action( 'before_settings_fields', array( $this->wpcf7_utils, 'show_admin_notices' ), 10 );

		add_action( 'admin_notices', array( $this, 'show_admin_notices' ), 10 );

		add_action( 'admin_init', array( $this, 'dismiss_admin_notice' ) );
		//form submission hook
		add_action( 'wpcf7_before_send_mail', array( $this->wpcf7_submission, 'handle_valid_actions' ) );
		//validation actions
		add_filter( 'wpcf7_validate', array( $this->wpcf7_submission, 'handle_validation_actions' ), 10, 2 );
		//handle contact form response
		add_filter( 'wpcf7_ajax_json_echo', array( $this->wpcf7_submission, 'manipulate_cf7_response_object' ), 10, 2 );
		add_action(
			'init',
			function() {
				if ( ! is_admin() ) {
					//handle form rendering
					add_filter( 'wpcf7_contact_form_properties', array( $this->wpcf7_utils, 'render_actions_elements' ), 10, 2 );
				}
			}
		);
		//support for browsers that does not support ajax
		add_action( 'wpcf7_submit', array( $this->wpcf7_submission, 'non_ajax_redirection' ) );
		// add_action( 'after_plugin_row_' . WPCF7_PRO_REDIRECT_BASE_NAME , array( $this->wpcf7_utils , 'license_details_message' ), 10, 2 );
		//handle form duplication
		add_action( 'wpcf7_after_create', array( $this->wpcf7_utils, 'duplicate_form_support' ) );
		//handle form deletion
		add_action( 'before_delete_post', array( $this->wpcf7_utils, 'delete_all_form_actions' ) );
		//catch submission for early $_POST manupulations
		add_action( 'wpcf7_contact_form', array( $this->wpcf7_submission, 'after_cf7_object_created' ) );
		//handle poppup preview
		add_action( 'init', array( $this->wpcf7_utils, 'show_action_preview' ) );
		//handle affiliate extensions
		add_action( 'init', array( $this, 'start_affiliate_extensions' ) );
		//add filter by form on leads list
		if ( class_exists( 'WPCF7R_Leads_Manager' ) && class_exists( 'WPCF7R_Action_Save_Lead' ) ) {
			add_action( 'restrict_manage_posts', array( 'WPCF7R_Leads_Manager', 'add_form_filter' ) );
			add_filter( 'parse_query', array( 'WPCF7R_Leads_Manager', 'filter_request_query' ), 10 );
		}
	}

	/**
	 * Initialize affiliate extensions
	 */
	public function start_affiliate_extensions() {
		$this->aff['accesibie'] = new Ext_Accessibe();
	}

	/**
	 * Dismiss admin notice
	 *
	 * @return void
	 */
	public function dismiss_admin_notice() {
		if ( isset( $_REQUEST['dismiss-cf7r-notices'] ) ) {
			delete_option( 'wpcf7_redirect_notifications' );
		}
	}
	/**
	 * Display admin notifications
	 *
	 * @return void
	 */
	public function show_admin_notices() {
		$notices = get_option( 'wpcf7_redirect_notifications' );

		add_action(
			'admin_footer',
			function() {
				?>
			<script>jQuery(document.body).on('click', '.wpcf7r-notice .notice-dismiss' , function(e){
				e.preventDefault();
				var url = window.location.href;
				if (url.indexOf('?') > -1){
					url += '&dismiss-cf7r-notices=1'
				}else{
					url += '?dismiss-cf7r-notices=1'
				}

				window.location.href = url;
			});</script>
				<?php
			}
		);
		if ( $notices ) {
			foreach ( $notices as $notice_type => $notice ) :
				?>

				<div class="notice is-dismissible <?php echo $notice_type; ?>">
					<p><?php echo $notice; ?></p>
				</div>

				<?php
			endforeach;
		}
	}
	/**
	 * Convert all old plugin settings to actions
	 */
	public function migrate_all_forms() {
		WPCF7r_Utils::auto_migrate( 'migrate_from_cf7_redirect', true );
	}

	/**
	 * Register plugins ajax hooks
	 */
	public function add_ajax_hooks() {

		add_action( 'wp_ajax_close_ad_banner', array( $this->wpcf7_utils, 'close_banner' ) );

		add_action( 'wp_ajax_wpcf7r_delete_action', array( $this->wpcf7_utils, 'delete_action_post' ) );

		add_action( 'wp_ajax_wpcf7r_add_action', array( $this->wpcf7_utils, 'add_action_post' ) );
		//save actions order
		add_action( 'wp_ajax_wpcf7r_set_action_menu_order', array( $this->wpcf7_utils, 'set_action_menu_order' ) );
		//make an api test
		add_action( 'wp_ajax_wpcf7r_make_api_test', array( $this->wpcf7_utils, 'make_api_test' ) );
		//get mailchimp lists
		add_action( 'wp_ajax_wpcf7r_get_mailchimp_lists', array( $this->wpcf7_utils, 'get_mailchimp_lists' ) );
		//get popup template
		add_action( 'wp_ajax_wpcf7r_get_action_template', array( $this->wpcf7_utils, 'get_action_template' ) );

		//alert conflicts
		add_action( 'admin_init', array( $this, 'alert_conflicts' ) );
		//run the migration process
		add_action( 'wp_ajax_wpcf7r_migrate_all_forms', array( $this, 'migrate_all_forms' ) );

		add_action( 'wp_ajax_nopriv_wpcf7r_get_nonce', array( $this, 'wpcf7r_get_nonce' ) );
		add_action( 'wp_ajax_wpcf7r_get_nonce', array( $this, 'wpcf7r_get_nonce' ) );
		//debug create form
		add_action( 'wp_ajax_import_from_debug', array( $this->wpcf7_utils, 'import_from_debug' ) );

	}

	/**
	 * Generate nonce field
	 *
	 * @return void
	 */
	public function wpcf7r_get_nonce() {
		$nonce_action = isset( $_POST['param'] ) && $_POST['param'] ? sanitize_text_field( $_POST['param'] ) : '';

		$nonce = wp_create_nonce( $nonce_action );

		wp_send_json_success( array( 'nonce' => $nonce ) );
	}

	/**
	 * Alert the user of a conflict between free and premium plugin
	 */
	public function alert_conflicts() {
		if ( class_exists( 'Mailchimp' ) ) {
			$reflector = new ReflectionClass( 'Mailchimp' );
			/* Translators: the file location */
			WPCF7r_Utils::add_admin_notice( 'alert', sprintf( __( 'There might be a conflict that causing mailchimp action not to function properly, disable any mailchimp plugin to avoid problems, mailchimp is already defined on %s', 'wpcf7-redirect' ), $reflector->getFileName() ) );
		}
	}

	/**
	 * Get files required to run the plugin
	 */
	public function load_dependencies() {
		require_once( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-wpcf7r-list-table.php' );
		require_once( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-wpcf7r-leads-manager.php' );
		require_once( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-wpcf7r-lead.php' );
		require_once( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-wpcf7r-settings.php' );
		require_once( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-wpcf7r-submission.php' );

		$this->include_conditional_logic_file();

		require_once( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-wpcf7r-utils.php' );
		require_once( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-wpcf7r-form-helper.php' );
		require_once( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-wpcf7r-post-types.php' );
		require_once( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-wpcf7r-actions.php' );
		require_once( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-wpcf7r-form.php' );
		require_once( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-wpcf7r-html.php' );
		require_once( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-qs-api.php' );
		require_once( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-wpcf7r-updates.php' );
		require_once( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-wpcf7r-action.php' );
		require_once( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-wpcf7r-user.php' );
		require_once( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-wpcf7r-mailchimp-helper.php' );
		require_once( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-wpcf7r-extensions.php' );
		require_once( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-wpcf7r-extension.php' );

		if ( ! class_exists( 'Mailchimp' ) ) {
			require_once( WPCF7_PRO_REDIRECT_BASE_PATH . 'vendor/autoload.php' );
		}

		// Load all actions
		foreach ( glob( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'actions/*.php' ) as $filename ) {
			require_once( $filename );
		}

		// Load all addons
		if ( is_dir( WPCF7_PRO_REDIRECT_ADDONS_PATH ) ) {
			foreach ( glob( WPCF7_PRO_REDIRECT_ADDONS_PATH . '*.php' ) as $filename ) {
				require_once( $filename );
			}
		}

		// Load affiliate extensions
		foreach ( glob( WPCF7_PRO_REDIRECT_CLASSES_PATH . 'aff/*.php' ) as $filename ) {
			require_once( $filename );
		}
	}

	/**
	 * Check and include the conditional logic files if exists
	 */
	private function include_conditional_logic_file() {
		$paths = array(
			WPCF7_PRO_REDIRECT_CLASSES_PATH . 'class-wpcf7r-conditions.php',
			WPCF7_PRO_REDIRECT_ADDONS_PATH . 'class-wpcf7r-conditions.php',
		);

		foreach ( $paths as $path ) {
			if ( file_exists( $path ) ) {
				require_once( $path );
			}
		}
	}
}
