<?php
/*
Plugin Name: Zozothemes Core
Plugin URI: http://zozothemes.com
Description: Zozothemes Core Plugin for Zozothemes Themes
Version: 1.2.5
Author: Zozothemes
Author URI: http://zozothemes.com/
*/

define('ZOZO_CORE_URI', plugin_dir_url( __FILE__ ));
define('ZOZO_CORE_DIR', plugin_dir_path( __FILE__ ));

define( 'ZOZO_CORE_ADMIN', plugin_dir_path(__FILE__) . 'admin' ); 
define( 'ZOZO_CORE_ADMIN_ASSETS', plugin_dir_url( __FILE__ ) . 'admin/assets' );

define( 'ZOZO_CORE_THEME_URL', get_template_directory_uri() );

define( 'ZOZO_INCLUDES', get_template_directory() . '/includes/' );

load_plugin_textdomain( 'zozothemes-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

require_once plugin_dir_path( __FILE__ ) . '/inc/functions.php';

if( ! class_exists( 'ZozothemesCore_Plugin' ) ) {
	class ZozothemesCore_Plugin {
		
		const VERSION = '1.0.0';
		
		/**
		 * Instance of this class.
		 *
		 * @since	1.0.0
		 *
		 * @var	  object
		 */
		protected static $instance = null;
		
		/**
		 * Initialize the plugin by setting localization and loading public scripts
		 * and styles.
		 *
		 * @since	 1.0.0
		 */
		private function __construct() {
			
			define( 'ZOZO_TINYMCE_URI', plugin_dir_url( __FILE__ ) . 'tinymce' );
			define( 'ZOZO_TINYMCE_DIR', plugin_dir_path( __FILE__ ) .'tinymce' );
			
			define( 'ZOZO_CORE_WIDGETS', plugin_dir_path( __FILE__ ) . 'widgets' );

			add_action('init', array(&$this, 'init'));
			add_action('admin_init', array(&$this, 'admin_init'));
			add_action('after_setup_theme', array(&$this, 'load_zozothemes_core_text_domain'));
			add_action('wp_enqueue_scripts', array(&$this, 'zozo_custom_scripts'), 30);
			add_action('wp_ajax_zozothemes_shortcodes_popup', array(&$this, 'zozo_popup'));
			
			$this->init_widgets();
			$this->init_aq_resizer();
		}

		/**
		 * Registers TinyMCE rich editor buttons
		 *
		 * @return	void
		 */
		function init() {
		
			if ( get_user_option('rich_editing') == 'true' )
			{
				add_filter( 'mce_external_plugins', array(&$this, 'add_rich_plugins') );
				add_filter( 'mce_buttons', array(&$this, 'register_rich_buttons') );
			}

			$this->init_shortcodes();

		}

		/**
		 * Find and include all shortcodes
		 *
		 * @return void
		 */
		function init_shortcodes() {
			require_once plugin_dir_path( __FILE__ ) . '/shortcodes.php';
		}
		
		/**
		 * Find and include all widget classes within widgets folder
		 *
		 * @return void
		 */
		function init_widgets() {
			
			add_filter('widget_text', 'do_shortcode');
			foreach( glob( plugin_dir_path( __FILE__ ) . '/widgets/*.php' ) as $filename ) {
				require_once $filename;
			}

		}
		
		/**
		 * Include Aq Resizer
		 *
		 * @return void
		 */
		function init_aq_resizer() {
			require_once plugin_dir_path( __FILE__ ) . '/aq_resizer.php';
		}
		
		/**
		 * Register the plugin text domain
		 *
		 * @return void
		 */		
		function load_zozothemes_core_text_domain() {
			load_plugin_textdomain( 'zozothemescore', false, dirname( plugin_basename(__FILE__) ) . '/languages' );
		}
		
		/**
		 * Defins TinyMCE rich editor js plugin
		 *
		 * @return	void
		 */
		function add_rich_plugins( $plugin_array )
		{
			if( is_admin() ) {
				$plugin_array['zozo_button'] = ZOZO_TINYMCE_URI . '/plugin.js';
			}

			return $plugin_array;
		}

		/**
		 * Adds TinyMCE rich editor buttons
		 *
		 * @return	void
		 */
		function register_rich_buttons( $buttons )
		{
			array_push( $buttons, 'zozo_button' );
			return $buttons;
		}
		
		/**
		 * Return an instance of this class.
		 *
		 * @since	 1.0.0
		 *
		 * @return	object	A single instance of this class.
		 */
		public static function get_instance() {

			// If the single instance hasn't been set, set it now.
			if ( null == self::$instance ) {
				self::$instance = new self;
			}

			return self::$instance;

		}
		
		/**
		 * Enqueue Scripts and Styles
		 *
		 * @return	void
		 */
		function zozo_custom_scripts()
		{
			if( ! is_admin() ) {
				wp_enqueue_style( 'zozo-shortcodes', ZOZO_CORE_URI . 'shortcodes.css', array(), null );
			}

		}
		
		/**
		 * Enqueue Scripts and Styles for Admin
		 *
		 * @return	void
		 */
		function admin_init()
		{
			global $pagenow;
		
			if( is_admin() && ( $pagenow == 'themes.php' ) ) {
				wp_enqueue_style( 'zozo-font-awesome', ZOZO_TINYMCE_URI . '/css/font-awesome.css', false, '4.3.0', 'all' );
			}
		
			// css
			wp_enqueue_style( 'zozo-popup', ZOZO_TINYMCE_URI . '/css/popup.css', false, '1.0', 'all' );
			wp_enqueue_style( 'wp-color-picker' );

			// js
			wp_enqueue_script( 'jquery-ui-sortable' );
			wp_enqueue_script( 'zozo-jquery-livequery', ZOZO_TINYMCE_URI . '/js/jquery.livequery.js', false, '1.1.1', false );
			wp_enqueue_script( 'zozo-jquery-appendo', ZOZO_TINYMCE_URI . '/js/jquery.appendo.js', false, '1.0', false );
			wp_enqueue_script( 'zozo-base64', ZOZO_TINYMCE_URI . '/js/base64.js', false, '1.0', false );
			wp_enqueue_script( 'bootstrap-tooltip', ZOZO_TINYMCE_URI . '/js/bootstrap-tooltip.js', false, '2.2.2', false );	
			wp_enqueue_script( 'bootstrap-popover', ZOZO_TINYMCE_URI . '/js/bootstrap-popover.js', false, '2.2.2', false );
			wp_enqueue_script( 'wp-color-picker' );
			
			wp_enqueue_script( 'zozo-popup', ZOZO_TINYMCE_URI . '/js/popup.js', false, '1.0', false );

			wp_localize_script( 'zozo-popup', 'zozoShortcodes', array( 'plugin_folder' => plugins_url( '', __FILE__ ) ) );
		}

		/**
		 * Popup function which will show shortcode options in thickbox.
		 *
		 * @return void
		 */
		function zozo_popup() {

			require_once( ZOZO_TINYMCE_DIR . '/popup.php' );

			die();

		}
	}
}
// Load the instance of the plugin
add_action( 'plugins_loaded', array( 'ZozothemesCore_Plugin', 'get_instance' ) );
register_activation_hook( __FILE__, 'zozo_custom_flush_rules');
function zozo_custom_flush_rules(){
	//defines the post type so the rules can be flushed.
	zozo_register_post_types();

	//and flush the rules.
	flush_rewrite_rules();
}

/* =======================================
 * Register custom post types
 * ======================================= */
function zozo_register_post_types() {
	
	global $zozo_options;
	
	$portfolio_labels = array(
		'name' 					=> esc_html__( 'Portfolio', 'zozothemescore' ),
		'singular_name' 		=> esc_html__( 'Portfolio', 'zozothemescore' ),
		'add_new' 				=> esc_html__( 'Add New', 'zozothemescore' ),
		'add_new_item' 			=> esc_html__( 'Add New Portfolio', 'zozothemescore' ),
		'edit_item' 			=> esc_html__( 'Edit Portfolio', 'zozothemescore' ),
		'new_item' 				=> esc_html__( 'New Portfolio', 'zozothemescore' ),
		'all_items' 			=> esc_html__( 'Portfolio', 'zozothemescore' ),
		'view_item' 			=> esc_html__( 'View Portfolio', 'zozothemescore' ),
		'search_items' 			=> esc_html__( 'Search Portfolio', 'zozothemescore' ),
		'not_found' 			=> esc_html__( 'No Portfolio found', 'zozothemescore' ),
		'not_found_in_trash' 	=> esc_html__( 'No portfolio found in Trash', 'zozothemescore' ), 
		'parent_item_colon' 	=> ''
	);
	
	$portfolio_args = array(
		'labels' 				=> $portfolio_labels,
		'public' 				=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'show_in_menu'       	=> true,
		'query_var' 			=> true,
		'rewrite' 				=> array( 'with_front' => false, 'slug' => 'portfolio' ),
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'has_archive' 			=> false,
		'exclude_from_search' 	=> true,
		'supports' 				=> array( 'title', 'thumbnail', 'excerpt', 'editor' )
	);
	
	if( ! post_type_exists('zozo_portfolio') ) {
		register_post_type( 'zozo_portfolio', $portfolio_args );
	}
		
	$portfolio_category_labels = array(
		'name'              	=> esc_html__( 'Portfolio Categories', 'zozothemescore' ),
		'singular_name'     	=> esc_html__( 'Category', 'zozothemescore' ),
		'search_items'      	=> esc_html__( 'Search Categories', 'zozothemescore' ),
		'all_items'         	=> esc_html__( 'All Categories', 'zozothemescore' ),
		'parent_item'       	=> esc_html__( 'Parent Category', 'zozothemescore' ),
		'parent_item_colon' 	=> esc_html__( 'Parent Category:', 'zozothemescore' ),
		'edit_item'         	=> esc_html__( 'Edit Category', 'zozothemescore' ),
		'update_item'       	=> esc_html__( 'Update Category', 'zozothemescore' ),
		'add_new_item'      	=> esc_html__( 'Add New Category', 'zozothemescore' ),
		'new_item_name'     	=> esc_html__( 'New Category Name', 'zozothemescore' ),
		'menu_name'         	=> esc_html__( 'Categories', 'zozothemescore' ),
	);

	$portfolio_category_args = array(
		'hierarchical'      	=> true,
		'labels'            	=> $portfolio_category_labels,
		'show_ui'           	=> true,
		'show_admin_column' 	=> true,
		'show_in_nav_menus' 	=> true,
		'query_var'         	=> true,
		'rewrite'           	=> array( 'with_front' => false, 'slug' => 'portfolio-categories' ),
	);	
	
	if( ! taxonomy_exists( 'portfolio_categories' ) ) {
		register_taxonomy( 'portfolio_categories', 'zozo_portfolio', $portfolio_category_args );
	}	
	
	$portfolio_tags_labels = array(
		'name'              	=> esc_html__( 'Portfolio Tags', 'zozothemescore' ),
		'singular_name'     	=> esc_html__( 'Tag', 'zozothemescore' ),
		'search_items'      	=> esc_html__( 'Search Tags', 'zozothemescore' ),
		'all_items'         	=> esc_html__( 'All Tags', 'zozothemescore' ),
		'parent_item'       	=> esc_html__( 'Parent Tag', 'zozothemescore' ),
		'parent_item_colon' 	=> esc_html__( 'Parent Tag:', 'zozothemescore' ),
		'edit_item'         	=> esc_html__( 'Edit Tag', 'zozothemescore' ),
		'update_item'       	=> esc_html__( 'Update Tag', 'zozothemescore' ),
		'add_new_item'      	=> esc_html__( 'Add New Tag', 'zozothemescore' ),
		'new_item_name'     	=> esc_html__( 'New Tag Name', 'zozothemescore' ),
		'menu_name'         	=> esc_html__( 'Tags', 'zozothemescore' ),
	);

	$portfolio_tags_args = array(
		'hierarchical'      	=> true,
		'labels'            	=> $portfolio_tags_labels,
		'show_ui'           	=> true,
		'show_admin_column' 	=> true,
		'show_in_nav_menus' 	=> true,
		'query_var'         	=> true,
		'rewrite'           	=> array( 'with_front' => false, 'slug' => 'portfolio-tags' ),
	);
	
	if( ! taxonomy_exists( 'portfolio_tags' ) ) {
		register_taxonomy( 'portfolio_tags', 'zozo_portfolio', $portfolio_tags_args );
	}
	
	$services_labels = array(
		'name' 					=> esc_html__( 'Services', 'zozothemescore' ),
		'singular_name' 		=> esc_html__( 'Services', 'zozothemescore' ),
		'add_new' 				=> esc_html__( 'Add New', 'zozothemescore' ),
		'add_new_item' 			=> esc_html__( 'Add New Service', 'zozothemescore' ),
		'edit_item' 			=> esc_html__( 'Edit Service', 'zozothemescore' ),
		'new_item' 				=> esc_html__( 'New Service', 'zozothemescore' ),
		'all_items' 			=> esc_html__( 'Services', 'zozothemescore' ),
		'view_item' 			=> esc_html__( 'View Service', 'zozothemescore' ),
		'search_items' 			=> esc_html__( 'Search Service', 'zozothemescore' ),
		'not_found' 			=> esc_html__( 'No Service found', 'zozothemescore' ),
		'not_found_in_trash' 	=> esc_html__( 'No Service found in Trash', 'zozothemescore' ), 
		'parent_item_colon' 	=> ''
	);
	
	$services_args = array(
		'labels' 				=> $services_labels,
		'public' 				=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'show_in_menu'       	=> true,
		'query_var' 			=> true,
		'rewrite' 				=> array( 'with_front' => false, 'slug' => 'services' ),
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'has_archive' 			=> false,
		'exclude_from_search' 	=> true,
		'supports' 				=> array( 'title', 'thumbnail', 'excerpt', 'editor' )
	);
	
	if( ! post_type_exists('zozo_services') ) {
		register_post_type( 'zozo_services', $services_args );
	}
	
	$service_category_labels = array(
		'name'              	=> esc_html__( 'Service Categories', 'zozothemescore' ),
		'singular_name'     	=> esc_html__( 'Category', 'zozothemescore' ),
		'search_items'      	=> esc_html__( 'Search Categories', 'zozothemescore' ),
		'all_items'         	=> esc_html__( 'All Categories', 'zozothemescore' ),
		'parent_item'       	=> esc_html__( 'Parent Category', 'zozothemescore' ),
		'parent_item_colon' 	=> esc_html__( 'Parent Category:', 'zozothemescore' ),
		'edit_item'         	=> esc_html__( 'Edit Category', 'zozothemescore' ),
		'update_item'       	=> esc_html__( 'Update Category', 'zozothemescore' ),
		'add_new_item'      	=> esc_html__( 'Add New Category', 'zozothemescore' ),
		'new_item_name'     	=> esc_html__( 'New Category Name', 'zozothemescore' ),
		'menu_name'         	=> esc_html__( 'Categories', 'zozothemescore' ),
	);

	$service_category_args = array(
		'hierarchical'      	=> true,
		'labels'            	=> $service_category_labels,
		'show_ui'           	=> true,
		'show_admin_column' 	=> true,
		'show_in_nav_menus' 	=> true,
		'query_var'         	=> true,
		'rewrite'           	=> array( 'with_front' => false, 'slug' => 'service-categories' ),
	);	
	
	if( ! taxonomy_exists( 'service_categories' ) ) {
		register_taxonomy( 'service_categories', 'zozo_services', $service_category_args );
	}
	
	$testimonial_labels = array(
		'name' 					=> esc_html__( 'Testimonials', 'zozothemescore' ),
		'singular_name' 		=> esc_html__( 'Testimonials', 'zozothemescore' ),
		'add_new' 				=> esc_html__( 'Add New', 'zozothemescore' ),
		'add_new_item' 			=> esc_html__( 'Add New Testimonial', 'zozothemescore' ),
		'edit_item' 			=> esc_html__( 'Edit Testimonial', 'zozothemescore' ),
		'new_item' 				=> esc_html__( 'New Testimonial', 'zozothemescore' ),
		'all_items' 			=> esc_html__( 'Testimonials', 'zozothemescore' ),
		'view_item' 			=> esc_html__( 'View Testimonial', 'zozothemescore' ),
		'search_items' 			=> esc_html__( 'Search Testimonials', 'zozothemescore' ),
		'not_found' 			=> esc_html__( 'No Testimonials found', 'zozothemescore' ),
		'not_found_in_trash' 	=> esc_html__( 'No testimonials found in Trash', 'zozothemescore' ), 
		'parent_item_colon' 	=> ''
	);
	
	$testimonial_args = array(
		'labels' 				=> $testimonial_labels,
		'public' 				=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'show_in_menu'       	=> true,
		'query_var' 			=> true,
		'rewrite' 				=> array( 'with_front' => false, 'slug' => 'testimonial' ),
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'has_archive' 			=> false,
		'exclude_from_search' 	=> true,
		'supports' 				=> array( 'title', 'thumbnail', 'editor' )
	);
	
	if( ! post_type_exists('zozo_testimonial') ) {
		register_post_type( 'zozo_testimonial', $testimonial_args );
	}
	
	$testimonial_category_labels = array(
		'name'              	=> esc_html__( 'Testimonial Categories', 'zozothemescore' ),
		'singular_name'     	=> esc_html__( 'Category', 'zozothemescore' ),
		'search_items'      	=> esc_html__( 'Search Categories', 'zozothemescore' ),
		'all_items'         	=> esc_html__( 'All Categories', 'zozothemescore' ),
		'parent_item'       	=> esc_html__( 'Parent Category', 'zozothemescore' ),
		'parent_item_colon' 	=> esc_html__( 'Parent Category:', 'zozothemescore' ),
		'edit_item'         	=> esc_html__( 'Edit Category', 'zozothemescore' ),
		'update_item'       	=> esc_html__( 'Update Category', 'zozothemescore' ),
		'add_new_item'      	=> esc_html__( 'Add New Category', 'zozothemescore' ),
		'new_item_name'     	=> esc_html__( 'New Category Name', 'zozothemescore' ),
		'menu_name'         	=> esc_html__( 'Categories', 'zozothemescore' ),
	);

	$testimonial_category_args = array(
		'hierarchical'      	=> true,
		'labels'            	=> $testimonial_category_labels,
		'show_ui'           	=> true,
		'show_admin_column' 	=> true,
		'show_in_nav_menus' 	=> true,
		'query_var'         	=> true,
		'rewrite'           	=> array( 'with_front' => false, 'slug' => 'testimonial-categories' ),
	);
	
	if( ! taxonomy_exists( 'testimonial_categories' ) ) {
		register_taxonomy( 'testimonial_categories', 'zozo_testimonial', $testimonial_category_args );
	}
	
	$team_labels = array(
		'name' 					=> esc_html__( 'Team Member', 'zozothemescore' ),
		'singular_name' 		=> esc_html__( 'Team Member', 'zozothemescore' ),
		'add_new' 				=> esc_html__( 'Add New', 'zozothemescore' ),
		'add_new_item' 			=> esc_html__( 'Add New Member', 'zozothemescore' ),
		'edit_item' 			=> esc_html__( 'Edit Member', 'zozothemescore' ),
		'new_item' 				=> esc_html__( 'New Member', 'zozothemescore' ),
		'all_items' 			=> esc_html__( 'Team Members', 'zozothemescore' ),
		'view_item' 			=> esc_html__( 'View Members', 'zozothemescore' ),
		'search_items' 			=> esc_html__( 'Search Members', 'zozothemescore' ),
		'not_found' 			=> esc_html__( 'No Members found', 'zozothemescore' ),
		'not_found_in_trash' 	=> esc_html__( 'No Members found in Trash', 'zozothemescore' ), 
		'parent_item_colon' 	=> ''
	);
	
	$team_args = array(
		'labels' 				=> $team_labels,
		'public' 				=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 				=> true,
		'show_in_menu'       	=> true,
		'query_var' 			=> true,
		'rewrite' 				=> array( 'with_front' => false, 'slug' => 'team' ),
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'has_archive' 			=> false,
		'exclude_from_search' 	=> true,
		'supports' 				=> array( 'title', 'thumbnail', 'editor' )
	);
	
	if( ! post_type_exists('zozo_team_member') ) {
		register_post_type( 'zozo_team_member', $team_args );
	}
		
	$team_category_labels = array(
		'name'              	=> esc_html__( 'Categories', 'zozothemescore' ),
		'singular_name'     	=> esc_html__( 'Category', 'zozothemescore' ),
		'search_items'      	=> esc_html__( 'Search Categories', 'zozothemescore' ),
		'all_items'         	=> esc_html__( 'All Categories', 'zozothemescore' ),
		'parent_item'       	=> esc_html__( 'Parent Category', 'zozothemescore' ),
		'parent_item_colon' 	=> esc_html__( 'Parent Category:', 'zozothemescore' ),
		'edit_item'         	=> esc_html__( 'Edit Category', 'zozothemescore' ),
		'update_item'       	=> esc_html__( 'Update Category', 'zozothemescore' ),
		'add_new_item'      	=> esc_html__( 'Add New Category', 'zozothemescore' ),
		'new_item_name'     	=> esc_html__( 'New Category Name', 'zozothemescore' ),
		'menu_name'         	=> esc_html__( 'Categories', 'zozothemescore' ),
	);

	$team_category_args = array(
		'hierarchical'      	=> true,
		'labels'            	=> $team_category_labels,
		'show_ui'           	=> true,
		'show_admin_column' 	=> true,
		'show_in_nav_menus' 	=> true,
		'query_var'         	=> true,
		'rewrite'           	=> array( 'with_front' => false, 'slug' => 'team-groups' ),
	);
	
	if( ! taxonomy_exists( 'team_categories' ) ) {
		register_taxonomy( 'team_categories', 'zozo_team_member', $team_category_args );
	}
	
}

add_action( 'init', 'zozo_register_post_types', 5 );

/**
 * Include Tweet Plugin
 */

if ( ! function_exists( 'aven_zozo_include_tweet_php' ) ) {
	function aven_zozo_include_tweet_php() {
		require_once ZOZO_CORE_DIR . '/plugins/tweet-php/TweetPHP.php';
	}
}

/* =================================================================
 * Add [year] shortcode to display current year
 * ================================================================= */
 
if ( ! function_exists( 'zozo_year_shortcode' ) ) { 
 
	function zozo_year_shortcode() {
		$year = date('Y');
		return $year;
	}

}
add_shortcode('year', 'zozo_year_shortcode');

/**
 * Visual Composer Shortcodes
 */
 
if( function_exists('vc_set_as_theme') ) {
	add_shortcode( 'zozo_vc_blog', 'aven_zozo_vc_blog_shortcode' );
	add_shortcode( 'zozo_vc_circle_counter', 'aven_zozo_vc_circle_counter_shortcode' );
	add_shortcode( 'zozo_vc_clients_slider', 'aven_zozo_vc_clients_slider_shortcode' );
	add_shortcode( 'zozo_vc_contact_form', 'aven_zozo_vc_contact_form_shortcode' );
	add_shortcode( 'zozo_vc_contact_info', 'aven_zozo_vc_contact_info_shortcode' );
	add_shortcode( 'zozo_vc_content_carousel', 'aven_zozo_vc_content_carousel_shortcode' );
	add_shortcode( 'zozo_vc_counters', 'aven_zozo_vc_counters_shortcode' );
	add_shortcode( 'zozo_vc_day_counter', 'aven_zozo_vc_day_counter_shortcode' );
	add_shortcode( 'zozo_vc_edd_list', 'aven_zozo_vc_edd_list_shortcode' );
	add_shortcode( 'zozo_vc_events_list', 'aven_zozo_vc_events_list_shortcode' );
	add_shortcode( 'zozo_vc_feature_box', 'aven_zozo_vc_feature_box_shortcode' );
	add_shortcode( 'zozo_vc_google_map', 'aven_zozo_vc_google_map_shortcode' );
	add_shortcode( 'zozo_vc_icons', 'aven_zozo_vc_icons_shortcode' );
	add_shortcode( 'zozo_vc_latest_posts', 'aven_zozo_vc_latest_posts_shortcode' );
	add_shortcode( 'zozo_vc_list_item', 'aven_zozo_vc_list_item_shortcode' );
	add_shortcode( 'zozo_vc_mailchimp_form', 'aven_zozo_vc_mailchimp_form_shortcode' );
	add_shortcode( 'zozo_vc_modal', 'aven_zozo_vc_modal_box_shortcode' );
	add_shortcode( 'zozo_vc_portfolio_grid', 'aven_zozo_vc_portfolio_grid_shortcode' );
	add_shortcode( 'zozo_vc_portfolio_slider', 'aven_zozo_vc_portfolio_slider_shortcode' );
	add_shortcode( 'zozo_vc_pricing_table', 'aven_zozo_vc_pricing_table_shortcode' );
	add_shortcode( 'zozo_vc_search_form', 'aven_zozo_vc_search_form_shortcode' );
	add_shortcode( 'zozo_vc_section_title', 'aven_zozo_vc_section_title_shortcode' );
	add_shortcode( 'zozo_vc_service_box', 'aven_zozo_vc_service_box_shortcode' );
	add_shortcode( 'zozo_vc_services_grid', 'aven_zozo_vc_services_grid_shortcode' );
	add_shortcode( 'zozo_vc_team_grid', 'aven_zozo_vc_team_grid_shortcode' );
	add_shortcode( 'zozo_vc_team_list', 'aven_zozo_vc_team_list_shortcode' );
	add_shortcode( 'zozo_vc_team_slider', 'aven_zozo_vc_team_slider_shortcode' );
	add_shortcode( 'zozo_vc_testimonials_grid', 'aven_zozo_vc_testimonials_grid_shortcode' );
	add_shortcode( 'zozo_vc_testimonials_slider', 'aven_zozo_vc_testimonials_slider_shortcode' );
	add_shortcode( 'zozo_vc_twitter_slider', 'aven_zozo_vc_twitter_slider_shortcode' );
	add_shortcode( 'zozo_vc_woo_product_slider', 'aven_zozo_vc_woo_product_slider_shortcode' );
}

/**
 * EPL Shortcodes
 */
if( class_exists('Easy_Property_Listings') ) {
	add_shortcode( 'listing', 'aven_zozo_epl_shortcode_listing' );
}