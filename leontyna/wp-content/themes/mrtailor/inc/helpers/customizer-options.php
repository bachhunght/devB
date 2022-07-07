<?php

if( !get_option( 'mt_import_redux_options_to_kirki', false ) ) {
	add_action( 'init', 'import_redux_options_to_kirki' );
}

if( !function_exists('gbt_mt_string_to_bool') ) {
	function gbt_mt_string_to_bool($string) {
		return is_bool( $string ) ? $string : ( 'yes' === $string || 1 === $string || 'true' === $string || '1' === $string );
	} 
}

function import_redux_options_to_kirki() {

	$mr_tailor_options = get_option( 'mr_tailor_theme_options', array() );

	if( !empty($mr_tailor_options) ) {

		$mr_tailor_kirki_options = array(

			//favicon
			'favicon'									=> isset($mr_tailor_options['favicon']['url']) ? $mr_tailor_options['favicon']['url'] : get_template_directory_uri() . '/favicon.png',

			// header
			'header_layout'								=> isset($mr_tailor_options['header_layout']) ? $mr_tailor_options['header_layout'] : '0',
		    'header_paddings'							=> isset($mr_tailor_options['header_paddings']) ? $mr_tailor_options['header_paddings'] : 30,
		    'main_header_background_color'				=> isset($mr_tailor_options['main_header_background_color']) ? $mr_tailor_options['main_header_background_color'] : '#ffffff',
		    'main_header_font_size'						=> isset($mr_tailor_options['main_header_typography']['font-size']) ? str_replace( 'px', '', $mr_tailor_options['main_header_typography']['font-size']) : '13',
		    'main_header_font_color'					=> isset($mr_tailor_options['main_header_typography']['color']) ? $mr_tailor_options['main_header_typography']['color'] : '#000000',
		    'main_header_font_weight'					=> isset($mr_tailor_options['main_header_font_weight']) ? $mr_tailor_options['main_header_font_weight'] : '900',
		    'main_header_wishlist'						=> isset($mr_tailor_options['main_header_wishlist']) ? gbt_mt_string_to_bool($mr_tailor_options['main_header_wishlist']) : true,
		    'main_header_wishlist_icon'					=> isset($mr_tailor_options['main_header_wishlist_icon']['url']) ? $mr_tailor_options['main_header_wishlist_icon']['url'] : '',
		    'main_header_shopping_bag'					=> isset($mr_tailor_options['main_header_shopping_bag']) ? gbt_mt_string_to_bool($mr_tailor_options['main_header_shopping_bag']) : true,
		    'main_header_shopping_bag_icon'				=> isset($mr_tailor_options['main_header_shopping_bag_icon']['url']) ? $mr_tailor_options['main_header_shopping_bag_icon']['url'] : '',
		    'main_header_search_bar'					=> isset($mr_tailor_options['main_header_search_bar']) ? gbt_mt_string_to_bool($mr_tailor_options['main_header_search_bar']) : true,
		    'main_header_search_bar_icon'				=> isset($mr_tailor_options['main_header_search_bar_icon']['url']) ? $mr_tailor_options['main_header_search_bar_icon']['url'] : '',
		    'site_logo'									=> isset($mr_tailor_options['site_logo']['url']) ? $mr_tailor_options['site_logo']['url'] : '',
		    'sticky_header_logo'						=> isset($mr_tailor_options['sticky_header_logo']['url']) ? $mr_tailor_options['sticky_header_logo']['url'] : '',
		    'logo_height'								=> isset($mr_tailor_options['logo_height']) ? $mr_tailor_options['logo_height'] : 60,
		    'main_header_background_transparency'		=> isset($mr_tailor_options['main_header_background_transparency']) ? gbt_mt_string_to_bool($mr_tailor_options['main_header_background_transparency']) : false,
		    'main_header_transparency_scheme'			=> isset($mr_tailor_options['main_header_transparency_scheme']) ? $mr_tailor_options['main_header_transparency_scheme'] : 'transparency_light',
		    'shop_category_header_transparency_scheme'	=> isset($mr_tailor_options['shop_category_header_transparency_scheme']) ? $mr_tailor_options['shop_category_header_transparency_scheme'] : 'inherit',
		    'main_header_transparent_light_color'		=> isset($mr_tailor_options['main_header_transparent_light_color']) ? $mr_tailor_options['main_header_transparent_light_color'] : '#ffffff',
		    'light_transparent_header_logo'				=> isset($mr_tailor_options['light_transparent_header_logo']['url']) ? $mr_tailor_options['light_transparent_header_logo']['url'] : '',
		    'main_header_transparent_dark_color'		=> isset($mr_tailor_options['main_header_transparent_dark_color']) ? $mr_tailor_options['main_header_transparent_dark_color'] : '#000000',
		    'dark_transparent_header_logo'				=> isset($mr_tailor_options['dark_transparent_header_logo']['url']) ? $mr_tailor_options['dark_transparent_header_logo']['url'] : '',
		    'top_bar_switch'							=> isset($mr_tailor_options['top_bar_switch']) ? gbt_mt_string_to_bool($mr_tailor_options['top_bar_switch']) : true,
		    'top_bar_background_color'					=> isset($mr_tailor_options['top_bar_background_color']) ? $mr_tailor_options['top_bar_background_color'] : '#3e5372',
		    'top_bar_typography'						=> isset($mr_tailor_options['top_bar_typography']) ? $mr_tailor_options['top_bar_typography'] : '#ffffff',
		    'top_bar_text'								=> isset($mr_tailor_options['top_bar_text']) ? $mr_tailor_options['top_bar_text'] : esc_html__( 'Free Shipping on All Orders Over $75!', 'mr_tailor' ),
		    'sticky_header'								=> isset($mr_tailor_options['sticky_header']) ? gbt_mt_string_to_bool($mr_tailor_options['sticky_header']) : true,

		    // footer
		    'footer_background_color'					=> isset($mr_tailor_options['footer_background_color']) ? $mr_tailor_options['footer_background_color'] : '#4a4f6a',
		    'footer_texts_color'						=> isset($mr_tailor_options['footer_texts_color']) ? $mr_tailor_options['footer_texts_color'] : '#a5a7b5',
		    'footer_links_color'						=> isset($mr_tailor_options['footer_links_color']) ? $mr_tailor_options['footer_links_color'] : '#ffffff',
		    'credit_card_icons'							=> isset($mr_tailor_options['credit_card_icons']['url']) ? $mr_tailor_options['credit_card_icons']['url'] : get_template_directory_uri() . '/images/theme_options/icons/payment_cards.png',
		    'footer_copyright_text'						=> isset($mr_tailor_options['footer_copyright_text']) ? $mr_tailor_options['footer_copyright_text'] : '&copy; <a href=\'http://www.getbowtied.com/\'>Get Bowtied</a> - Elite ThemeForest Author.',
		    'expandable_footer'							=> isset($mr_tailor_options['expandable_footer']) ? gbt_mt_string_to_bool($mr_tailor_options['expandable_footer']) : true,

		    // shop
		    'shop_layout'								=> isset($mr_tailor_options['shop_layout']) ? $mr_tailor_options['shop_layout'] : '0',
		    'catalog_mode'								=> isset($mr_tailor_options['catalog_mode']) ? gbt_mt_string_to_bool($mr_tailor_options['catalog_mode']) : false,
		    'breadcrumbs'								=> isset($mr_tailor_options['breadcrumbs']) ? gbt_mt_string_to_bool($mr_tailor_options['breadcrumbs']) : true,
		    'add_to_cart_display'						=> isset($mr_tailor_options['add_to_cart_display']) ? $mr_tailor_options['add_to_cart_display'] : '1',
		    'products_animation'						=> isset($mr_tailor_options['products_animation']) ? $mr_tailor_options['products_animation'] : 'e2',
		    'product_hover_animation'					=> isset($mr_tailor_options['product_hover_animation']) ? gbt_mt_string_to_bool($mr_tailor_options['product_hover_animation']) : true,
		    'sale_text'									=> isset($mr_tailor_options['sale_text']) ? $mr_tailor_options['sale_text'] : esc_html__( 'Sale!', 'mr_tailor' ),
		    'out_of_stock_text'							=> isset($mr_tailor_options['out_of_stock_text']) ? $mr_tailor_options['out_of_stock_text'] : esc_html__( 'Out of stock', 'mr_tailor' ),
		    'my_account_image'							=> isset($mr_tailor_options['my_account_image']['url']) ? $mr_tailor_options['my_account_image']['url'] : '',

		    // product page
		    'products_layout'							=> isset($mr_tailor_options['products_layout']) ? $mr_tailor_options['products_layout'] : '0',
		    'product_gallery_zoom'						=> isset($mr_tailor_options['product_gallery_zoom']) ? gbt_mt_string_to_bool($mr_tailor_options['product_gallery_zoom']) : true,
		    'recently_viewed_products'					=> isset($mr_tailor_options['recently_viewed_products']) ? gbt_mt_string_to_bool($mr_tailor_options['recently_viewed_products']) : true,
		    'related_products_per_view'					=> isset($mr_tailor_options['related_products_per_view']) ? $mr_tailor_options['related_products_per_view'] : '4',

		    // blog
		    'sidebar_blog_listing'						=> isset($mr_tailor_options['sidebar_blog_listing']) ? $mr_tailor_options['sidebar_blog_listing'] : '0',

		    // styling
		    'main_color'								=> isset($mr_tailor_options['main_color']) ? $mr_tailor_options['main_color'] : '#4a4f6a',
		    'main_bg_color'								=> isset($mr_tailor_options['main_bg_color']) ? $mr_tailor_options['main_bg_color'] : '#ffffff',
		    'main_bg_image'								=> isset($mr_tailor_options['main_bg_image']['url']) ? $mr_tailor_options['main_bg_image']['url'] : '',
		    'navigation_bg'								=> isset($mr_tailor_options['navigation_bg']) ? $mr_tailor_options['navigation_bg'] : '#ffffff',
		    'navigation_link_color'						=> isset($mr_tailor_options['navigation_link_color']) ? $mr_tailor_options['navigation_link_color'] : '#000000',

		    // fonts
		    'main_font_source'							=> isset($mr_tailor_options['main_font_source']) ? $mr_tailor_options['main_font_source'] : '1',
		    'main_font'									=> isset($mr_tailor_options['main_font']) ? $mr_tailor_options['main_font'] : array('font-family' => 'Arimo','variant' => 'regular'),
		    'main_font_typekit_kit_id'					=> isset($mr_tailor_options['main_font_typekit_kit_id']) ? $mr_tailor_options['main_font_typekit_kit_id'] : '',
		    'main_typekit_font_face'					=> isset($mr_tailor_options['main_typekit_font_face']) ? $mr_tailor_options['main_typekit_font_face'] : '',
		    'secondary_font_source'						=> isset($mr_tailor_options['secondary_font_source']) ? $mr_tailor_options['secondary_font_source'] : '1',
		    'secondary_font'							=> isset($mr_tailor_options['secondary_font']) ? $mr_tailor_options['secondary_font'] : array('font-family' => 'Montserrat','variant' => 'regular'),
		    'secondary_font_typekit_kit_id'				=> isset($mr_tailor_options['secondary_font_typekit_kit_id']) ? $mr_tailor_options['secondary_font_typekit_kit_id'] : '',
		    'secondary_typekit_font_face'				=> isset($mr_tailor_options['secondary_typekit_font_face']) ? $mr_tailor_options['secondary_typekit_font_face'] : '',
		    'body_text_font_family'						=> isset($mr_tailor_options['body_text_font_family']) ? $mr_tailor_options['body_text_font_family'] : 'main_font',
		    'body_text_font_weight'						=> isset($mr_tailor_options['body_text_font_weight']) ? $mr_tailor_options['body_text_font_weight'] : '400',
		    'body_text_font_size'						=> isset($mr_tailor_options['body_text_font_size']) ? $mr_tailor_options['body_text_font_size'] : '16',
		    'body_text_line_height'						=> isset($mr_tailor_options['body_text_line_height']) ? $mr_tailor_options['body_text_line_height'] : '28',
		    'body_color'								=> isset($mr_tailor_options['body_color']) ? $mr_tailor_options['body_color'] : '#222222',
		    'title_font_family'							=> isset($mr_tailor_options['title_font_family']) ? $mr_tailor_options['title_font_family'] : 'main_font',
		    'h1_font_size'								=> isset($mr_tailor_options['h1_font_size']) ? $mr_tailor_options['h1_font_size'] : '50',
		    'title_font_weight'							=> isset($mr_tailor_options['title_font_weight']) ? $mr_tailor_options['title_font_weight'] : '400',
		    'h1_line_height'							=> isset($mr_tailor_options['h1_line_height']) ? $mr_tailor_options['h1_line_height'] : '70',
		    'h_letter_spacing'							=> isset($mr_tailor_options['h_letter_spacing']) ? $mr_tailor_options['h_letter_spacing'] : 0,
		    'headings_color'							=> isset($mr_tailor_options['headings_color']) ? $mr_tailor_options['headings_color'] : '#000000',
	    );

		$mr_tailor_social_media_options = array(
		    'facebook_link'				=> isset($mr_tailor_options['facebook_link']) ? $mr_tailor_options['facebook_link'] : '#',
		    'twitter_link'				=> isset($mr_tailor_options['twitter_link']) ? $mr_tailor_options['twitter_link'] : '#',
		    'vkontakte_link'			=> isset($mr_tailor_options['vkontakte_link']) ? $mr_tailor_options['vkontakte_link'] : '',
		    'pinterest_link'			=> isset($mr_tailor_options['pinterest_link']) ? $mr_tailor_options['pinterest_link'] : '#',
		    'linkedin_link'				=> isset($mr_tailor_options['linkedin_link']) ? $mr_tailor_options['linkedin_link'] : '',
		    'googleplus_link'			=> isset($mr_tailor_options['googleplus_link']) ? $mr_tailor_options['googleplus_link'] : '',
		    'rss_link'					=> isset($mr_tailor_options['rss_link']) ? $mr_tailor_options['rss_link'] : '',
		    'tumblr_link'				=> isset($mr_tailor_options['tumblr_link']) ? $mr_tailor_options['tumblr_link'] : '',
		    'instagram_link'			=> isset($mr_tailor_options['instagram_link']) ? $mr_tailor_options['instagram_link'] : '',
		    'youtube_link'				=> isset($mr_tailor_options['youtube_link']) ? $mr_tailor_options['youtube_link'] : '',
		    'vimeo_link'				=> isset($mr_tailor_options['vimeo_link']) ? $mr_tailor_options['vimeo_link'] : '',
	    );

		$mr_tailor_social_sharing_options = array(
		    'sharing_options'			=> isset($mr_tailor_options['sharing_options']) ? $mr_tailor_options['sharing_options'] : true,
		    'sharing_options_blog'		=> isset($mr_tailor_options['sharing_options_blog']) ? $mr_tailor_options['sharing_options_blog'] : true,
	    );

		$mr_tailor_portfolio_slug = isset($mr_tailor_options['portfolio_item_slug']) ? $mr_tailor_options['portfolio_item_slug'] : 'portfolio-item';

		$mr_tailor_custom_css 	= isset($mr_tailor_options['custom_css']) ? $mr_tailor_options['custom_css'] : '';
		$mr_tailor_header_js 	= isset($mr_tailor_options['header_js']) ? $mr_tailor_options['header_js'] : '';
		$mr_tailor_footer_js 	= isset($mr_tailor_options['footer_js']) ? $mr_tailor_options['footer_js'] : '';

		// kirki options
		foreach( $mr_tailor_kirki_options as $option => $option_value ) {
			set_theme_mod( $option, $option_value );
		}

		// social media
		foreach( $mr_tailor_social_media_options as $social => $social_value ) {
			if( $social_value != '' ) {
				update_option( 'mt_' . $social, $social_value );
			}
		}

		// social sharing options
		$product_sharing = $mr_tailor_social_sharing_options['sharing_options'] ? 'yes' : 'no';
		update_option( 'mt_product_sharing_options', $product_sharing );

		$blog_sharing = $mr_tailor_social_sharing_options['sharing_options_blog'] ? 'yes' : 'no';
		update_option( 'mt_blog_sharing_options', $blog_sharing );

		// portfolio options
		update_option( 'mt_portfolio_slug', $mr_tailor_portfolio_slug );

		// custom code
		wp_update_custom_css_post( wp_get_custom_css() . ' ' . $mr_tailor_custom_css );
		update_option( 'mt_custom_code_header_js', $mr_tailor_header_js );
		update_option( 'mt_custom_code_footer_js', $mr_tailor_footer_js );

		if( get_theme_mod( 'main_header_background_color', false ) ) {
			update_option( 'mt_import_redux_options_to_kirki', true );
		}
	}
}