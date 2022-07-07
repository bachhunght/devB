<?php
/**
 * Custom Meta Boxes and Fields for Post, Pages and other custom post types
 *
 * @package Zozothemes
 */ 
 
class AvenZozoThemeMetaboxes {
	
	public function __construct() 
	{
		add_action('add_met'.'a_boxes', array($this, 'aven_zozo_addmetaboxes'));
		add_action('save_post', array($this, 'aven_zozo_save_meta_boxes'));
		add_action('admin_enqueue_scripts', array($this, 'aven_zozo_load_admin_script'));
	}

	// Load Admin Scripts
	function aven_zozo_load_admin_script() {
		global $pagenow;
		
		if (is_admin() && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {
		
			wp_enqueue_style('aven-admin-style', ZOZO_ADMIN_ASSETS .'css/admin-custom.css');
			
			wp_register_style('aven-select2-style', ZOZO_ADMIN_ASSETS . 'css/select2.css');
	    	wp_enqueue_style('aven-select2-style');			
			
	    	wp_enqueue_media();
			
			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-tabs');
			wp_enqueue_script('jquery-ui-slider');
			
			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_style( 'wp-color-picker' );
			
			wp_register_script('aven-admin-media', ZOZO_ADMIN_ASSETS .'js/metabox.js', array('jquery'), null, true);
	    	wp_enqueue_script('aven-admin-media');
			
			wp_register_script('aven-select2', ZOZO_ADMIN_ASSETS . 'js/select2.js', array('jquery'), null, true);
	    	wp_enqueue_script('aven-select2');
		}
		
		if( is_admin() ) {
			wp_enqueue_style('aven-zozo-admin-css', ZOZO_ADMIN_ASSETS .'css/admin.css');
		}
	}
	
	// Add Meta Boxes for different Post types
	public function aven_zozo_addmetaboxes()
	{
		$this->aven_addmetabox('post_options', 'Post Options', 'post_metabox', 'post');
		$this->aven_addmetabox('page_options', 'Page Options', 'page_metabox', 'page');
		if( ZOZO_WOOCOMMERCE_ACTIVE ) {
			$this->aven_addmetabox('product_options', 'Product Options', 'product_metabox', 'product');
		}
		$this->aven_addmetabox('testimonial_options', 'Testimonial Options', 'testimonial_metabox', 'zozo_testimonial');
		$this->aven_addmetabox('portfolio_options', 'Portfolio Options', 'portfolio_metabox', 'zozo_portfolio', 'advanced');
		$this->aven_addmetabox('portfolio_page_options', 'Page Options', 'portfolio_page_metabox', 'zozo_portfolio', 'advanced');
		$this->aven_addmetabox('service_options', 'Services Options', 'service_metabox', 'zozo_services', 'advanced');
		$this->aven_addmetabox('team_options', 'Team Member Options', 'team_metabox', 'zozo_team_member');
	}
	
	// Add Meta Box for each types
	public function aven_addmetabox($id, $title, $callback, $post_type, $context = 'normal')
	{
		$amb = 'add_met'.'a_box';
	    $amb( 'aven_zozo_' . $id, $title, array($this, 'aven_zozo_' . $callback), $post_type, $context, 'high' );		 
	}
	
	// Save meta box fields
	public function aven_zozo_save_meta_boxes($post_id)
	{
		if(defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}
				
		// check permissions
		if( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
			if( !current_user_can('edit_page', $post_id) )
			return $post_id;
		} elseif( !current_user_can('edit_post', $post_id) ) {
			return $post_id;
		}
		
		$portfolio = array();
		
		if( isset( $_POST['zozoportfolio_options'] ) && is_array( $_POST['zozoportfolio_options'] ) ) {

			foreach( $_POST['zozoportfolio_options'] as $i => $fields ) {
				// skip the hidden "repeatable" div
				if( $i != '%r' ) {
					$portfolio[$i] = $fields;
				}
			}
			
			if( ! empty( $portfolio ) ) {
				update_post_meta($post_id, 'zozoportfolio_options', $portfolio);
			}
		
		}
		
		foreach($_POST as $key => $value) {
			if(strstr($key, 'zozo_')) {
				update_post_meta($post_id, $key, $value);
			}
		}
	}

	public function aven_zozo_post_metabox()
	{
		$zozopostfields = new AvenZozoMetaboxFields();
		$zozopostfields->render_fields( $zozopostfields->render_post_fields() );
	}

	public function aven_zozo_page_metabox()
	{
		$zozopagefields = new AvenZozoMetaboxFields();
		$zozopagefields->render_fields( $zozopagefields->render_page_fields() );
	}
		
	public function aven_zozo_testimonial_metabox()
	{
		$zozotestimonialfields = new AvenZozoMetaboxFields();
		$zozotestimonialfields->render_fields( $zozotestimonialfields->render_testimonial_fields() );
	}
	
	public function aven_zozo_portfolio_metabox()
	{
		$zozoportfoliofields = new AvenZozoMetaboxFields();		
		$zozoportfoliofields->render_portfolio_fields();
	}
	
	public function aven_zozo_portfolio_page_metabox()
	{
		$zozopagefields = new AvenZozoMetaboxFields();
		$zozopagefields->render_fields( $zozopagefields->render_portfolio_page_fields() );
	}
		
	public function aven_zozo_team_metabox()
	{
		$zozoteamfields = new AvenZozoMetaboxFields();
		$zozoteamfields->render_fields( $zozoteamfields->render_team_fields() );
	}
	
	public function aven_zozo_service_metabox()
	{
		$service_fields = new AvenZozoMetaboxFields();		
		$service_fields->render_fields( $service_fields->render_service_fields() );
	}
	
	public function aven_zozo_product_metabox()
	{
		$product_fields = new AvenZozoMetaboxFields();
		$product_fields->render_fields( $product_fields->render_product_fields() );
	}

}

$metaboxes = new AvenZozoThemeMetaboxes;