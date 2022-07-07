<?php

class GBT_MT_Opt {

	/**
	 * Cache each request to prevent duplicate queries
	 *
	 * @var array
	 */
	protected static $cached = [];

	/**
	 *  Constructor
	 */
	private function __construct() {}

	/**
	 * Default values for theme options
	 *
	 * @return array
	 */
	private static function theme_defaults() {
		return array(
			'favicon' => get_template_directory_uri() . '/favicon.png',

			// Header Styles
			'header_layout' 								=> '0',			
		    'header_paddings' 								=> 30,
		    'main_header_background_color' 					=> '#ffffff',
		    'main_header_font_size' 						=> '13',
		    'main_header_font_color' 						=> '#000000',
		    'main_header_font_weight' 						=> '900',
		    
		    'main_header_wishlist' 							=> true,
		    'main_header_wishlist_icon' 					=> '',
		    'main_header_shopping_bag' 						=> true,
		    'main_header_shopping_bag_icon' 				=> '',
		    'main_header_search_bar' 						=> true,
		    'main_header_search_bar_icon' 					=> '',
		    
		    'site_logo' 									=> '',
		    'sticky_header_logo' 							=> '',
		    'logo_height' 									=> 60,
		    
		    'main_header_background_transparency' 			=> false,
		    'main_header_transparency_scheme' 				=> 'transparency_light',
		    'shop_category_header_transparency_scheme'		=> 'inherit',
		    'main_header_transparent_light_color' 			=> '#ffffff',
		    'light_transparent_header_logo' 				=> '',
		    'main_header_transparent_dark_color' 			=> '#000000',
		    'dark_transparent_header_logo' 					=> '',
		    
		    'top_bar_switch' 								=> true,
		    'top_bar_background_color' 						=> '#3e5372',
		    'top_bar_typography' 							=> '#ffffff',
		    'top_bar_text' 									=> esc_html__( 'Free Shipping on All Orders Over $75!', 'mr_tailor' ),
		    
		    'sticky_header' 								=> true,

		    // Footer Styles
		    'footer_background_color' 						=> '#4a4f6a',
		    'footer_texts_color' 							=> '#a5a7b5',
		    'footer_links_color' 							=> '#ffffff',
		    'credit_card_icons' 							=> get_template_directory_uri() . '/images/theme_options/icons/payment_cards.png',
		    'footer_copyright_text'							=> '&copy; <a href=\'http://www.getbowtied.com/\'>Get Bowtied</a> - Elite ThemeForest Author.',
		    'expandable_footer' 							=> true,

		    // Shop Styles
		    'shop_layout' 									=> '0',
		    'catalog_mode' 									=> false,
		    'breadcrumbs' 									=> true,
		    'add_to_cart_display'							=> '1',
		    'products_animation' 							=> 'e2',
		    'product_hover_animation' 						=> true,
		    'sale_text' 									=> esc_html__( 'Sale!', 'mr_tailor' ),
		    'out_of_stock_text' 							=> esc_html__( 'Out of stock', 'mr_tailor' ),
		    'my_account_image' 								=> '',

		    // Product Styles
		    'products_layout' 								=> '0',
		    'product_gallery_zoom' 							=> true,
		    'product_gallery_lightbox' 						=> false,
		    'recently_viewed_products' 						=> true,
		    'related_products_per_view' 					=> '4',

		    // Blog Styles
		    'sidebar_blog_listing' 							=> '0',

		    // Styling
		    'main_color' 									=> '#4a4f6a',
		    'main_bg_color' 								=> '#ffffff',
		    'main_bg_image' 								=> '',
		    'navigation_bg' 								=> '#ffffff',
		    'navigation_link_color' 						=> '#000000',

		    // Fonts
		    'main_font_source' 								=> '1',
		    'main_font' 									=> array('font-family' => 'Arimo','variant' => 'regular'),
		    'main_font_typekit_kit_id' 						=> '',
		    'main_typekit_font_face' 						=> '',
		    'secondary_font_source' 						=> '1',
		    'secondary_font' 								=> array('font-family' => 'Montserrat','variant' => 'regular'),
		    'secondary_font_typekit_kit_id' 				=> '',
		    'secondary_typekit_font_face' 					=> '',
		    'body_text_font_family' 						=> 'main_font',
		    'body_text_font_weight' 						=> '400',
		    'body_text_font_size' 							=> '16',
		    'body_text_line_height' 						=> '28',
		    'body_color' 									=> '#222222',
		    'title_font_family' 							=> 'main_font',
		    'h1_font_size' 									=> '50',
		    'title_font_weight' 							=> '400',
		    'h1_line_height' 								=> '70',
		    'h_letter_spacing' 								=> 0,
		    'headings_color' 								=> '#000000',
		);
	} 

	/**
	 * Return the theme option
	 *
	 * @param  string $option_name 
	 * @param  string $default     
	 *
	 * @return string
	 */
	public static function getOption( $option_name, $default= '' ) {

		/* Return cached if possible */
		if ( array_key_exists($option_name, self::$cached) && empty($default) )
			return self::$cached[$option_name];
		/* If no default is given, fetch from theme defaults variable */
		if (empty($default)) {
			$default = array_key_exists($option_name, self::theme_defaults())? self::theme_defaults()[$option_name] : '';
		}

		$opt= get_theme_mod($option_name, $default);
		
		/* Cache the result */
		self::$cached[$option_name]= $opt;		

		return self::$cached[$option_name];
	}
}