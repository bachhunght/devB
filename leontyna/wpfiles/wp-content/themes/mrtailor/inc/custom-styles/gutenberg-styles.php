<?php
if ( ! function_exists ('mr_tailor_gutenberg_custom_styles') ) {
function mr_tailor_gutenberg_custom_styles() {	

	//convert hex to rgb
	if ( ! function_exists ('getbowtied_hex2rgb') ) {
		function getbowtied_hex2rgb($hex) {
			$hex = str_replace("#", "", $hex);
			
			if(strlen($hex) == 3) {
				$r = hexdec(substr($hex,0,1).substr($hex,0,1));
				$g = hexdec(substr($hex,1,1).substr($hex,1,1));
				$b = hexdec(substr($hex,2,1).substr($hex,2,1));
			} else {
				$r = hexdec(substr($hex,0,2));
				$g = hexdec(substr($hex,2,2));
				$b = hexdec(substr($hex,4,2));
			}
			$rgb = array($r, $g, $b);
			return implode(",", $rgb);
		}
	}

	//fonts
	$custom_main_font = "sans-serif";
    $custom_secondary_font = "sans-serif";

    if (GBT_MT_Opt::getOption( 'main_font_source' ) == "1") { $custom_main_font = GBT_MT_Opt::getOption( 'main_font' )['font-family'] . ', sans-serif'; }    
    if (GBT_MT_Opt::getOption( 'main_font_source' ) == "2") { $custom_main_font = GBT_MT_Opt::getOption( 'main_typekit_font_face' ) . ', sans-serif'; }

    if (GBT_MT_Opt::getOption( 'secondary_font_source' ) == "1") { $custom_secondary_font = GBT_MT_Opt::getOption( 'secondary_font' )['font-family'] . ', sans-serif'; }
    if (GBT_MT_Opt::getOption( 'secondary_font_source' ) == "2") { $custom_secondary_font = GBT_MT_Opt::getOption( 'secondary_typekit_font_face' ) . ', sans-serif'; }

    $base_font = $custom_main_font;
    $headings_font = $custom_main_font;        
   
    if ( GBT_MT_Opt::getOption( 'body_text_font_family' ) != "" ) :
        
        if (GBT_MT_Opt::getOption( 'body_text_font_family' ) == "main_font") :
            $base_font = $custom_main_font;  
        endif;

        if (GBT_MT_Opt::getOption( 'body_text_font_family' ) == "secondary_font") :
            $base_font = $custom_secondary_font;
        endif;

    endif;

    if ( GBT_MT_Opt::getOption( 'title_font_family' ) != "" ) :
        
        if (GBT_MT_Opt::getOption( 'title_font_family' ) == "main_font") :
            $headings_font = $custom_main_font;  
        endif;

        if (GBT_MT_Opt::getOption( 'title_font_family' ) == "secondary_font") :
            $headings_font = $custom_secondary_font;
        endif;

    endif;

	ob_start();	
	?>

		<?php if ( GBT_MT_Opt::getOption( 'main_bg_color' ) != "" ) : ?>
			.editor-styles-wrapper { background-color:<?php echo GBT_MT_Opt::getOption( 'main_bg_color' ) ?>; }
		<?php endif; ?>

		.edit-post-visual-editor figcaption,
		.edit-post-visual-editor p,
		.edit-post-visual-editor td,
		.edit-post-visual-editor th,
		.edit-post-visual-editor span,
		.edit-post-visual-editor li,
		.gbt_18_mt_editor_banner_title,
		.wp-block-verse,
		.wp-block-gbt-banner .banner-subtitle,
		.editor-styles-wrapper select,
		.wc-block-grid__product-price,
		.wc-block-featured-category .wc-block-featured-category__description
        {
            font-family: <?php echo esc_html($base_font); ?>;
        }

        .edit-post-visual-editor h1,
		.edit-post-visual-editor h2,
		.edit-post-visual-editor h3,
		.edit-post-visual-editor h4,
		.edit-post-visual-editor h5,
		.edit-post-visual-editor h6,
		.wp-block-cover .wp-block-cover-text,
		.editor-post-title__block .editor-post-title__input,
		.gbt_18_mt_posts_grid .gbt_18_mt_posts_grid_title,
		.wp-block-file .wp-block-file__button,
		.wp-block-button .wp-block-button__link,
		.gbt_18_mt_banner .gbt_18_mt_banner_title,
		.wp-block-button a,
		.wp-block-quote p,
		.wp-block-quote.is-style-large p,
		.wp-block-pullquote p,
		.wp-block-quote__citation,
		.wp-block-pullquote .wp-block-pullquote__citation,
		.wc-block-grid__product-title,
		.wc-block-grid__product-add-to-cart
		{
            font-family: <?php echo esc_html($headings_font); ?>;
        }

        .editor-styles-wrapper .wp-block,
        .editor-styles-wrapper .editor-rich-text p:not([class*="has-"]),
		.editor-styles-wrapper .wp-block-quote__citation,
		.editor-styles-wrapper .wp-block-pullquote .wp-block-pullquote__citation,
		.editor-styles-wrapper select,
		.wc-block-featured-product .wc-block-featured-product__description,
		.wc-block-featured-category .wc-block-featured-category__description {
        	<?php if( GBT_MT_Opt::getOption( 'body_text_font_size' ) != "" ) : ?>
				font-size:<?php echo GBT_MT_Opt::getOption( 'body_text_font_size' ); ?>px;
			<?php endif; ?>
            
            <?php if( GBT_MT_Opt::getOption( 'body_text_line_height' ) != "" ) : ?>
                line-height:<?php echo GBT_MT_Opt::getOption( 'body_text_line_height' ); ?>px;
            <?php endif; ?>

			<?php if( GBT_MT_Opt::getOption( 'body_text_font_weight' ) != "" ) : ?>
				font-weight: <?php echo GBT_MT_Opt::getOption( 'body_text_font_weight' ); ?>;
			<?php endif; ?>
        }

        .editor-styles-wrapper .wp-block-quote p,
        .editor-styles-wrapper .wp-block-pullquote blockquote > .editor-rich-text p,
        .editor-styles-wrapper .wp-block[data-align="left"] .wp-block-pullquote blockquote > .editor-rich-text p,
        .editor-styles-wrapper .wp-block[data-align="right"] .wp-block-pullquote blockquote > .editor-rich-text p,
        .editor-styles-wrapper .wp-block-cover .wp-block-cover-text {
           	font-size:<?php echo GBT_MT_Opt::getOption( 'body_text_font_size' ) + 10; ?>px; 
        	line-height:<?php echo GBT_MT_Opt::getOption( 'body_text_line_height' ) + 10; ?>px;     	
        }

        .editor-styles-wrapper .wp-block-quote.is-style-large p {
        	font-size:<?php echo GBT_MT_Opt::getOption( 'body_text_font_size' ) + 20; ?>px;
        	line-height:<?php echo GBT_MT_Opt::getOption( 'body_text_line_height' ) + 20; ?>px;
        }

        .wp-block-code code,
        .wp-block-preformatted pre,
        .wp-block-pullquote
		{
			color: <?php echo esc_html(GBT_MT_Opt::getOption( 'body_color' )); ?>;
		}

		.wp-block {
			color: <?php echo esc_html(GBT_MT_Opt::getOption( 'body_color' )); ?>;
		}

		.wc-block-grid__product-title,
		.wc-block-grid__product-price {
			color: <?php echo esc_html(GBT_MT_Opt::getOption( 'headings_color' )); ?>;
		}

		.edit-post-visual-editor ul.wp-block-archives a,
		.edit-post-visual-editor ul.wp-block-latest-posts a,
		.edit-post-visual-editor .wp-block-categories a,
		.wc-block-product-categories.is-list ul li a
		{
			color: <?php echo GBT_MT_Opt::getOption( 'main_color' ) ?>;
		}

		.wc-block-grid__product-add-to-cart a,
		.wc-block-grid__product-rating span:before
		{
			color: <?php echo GBT_MT_Opt::getOption( 'main_color' ) ?> !important;
		}

		.wp-block-gbt-posts-grid .post_header_date a
		{
			color: rgba(<?php echo getbowtied_hex2rgb(GBT_MT_Opt::getOption( 'body_color' )); ?>,0.45);
		}

		<?php if( GBT_MT_Opt::getOption( 'body_text_font_size' ) != "" ) : ?>

			@media only screen and (min-width: 63.9375em) {

				.editor-styles-wrapper .wp-block-heading  h1.editor-rich-text__tinymce,
				.editor-styles-wrapper .editor-post-title__block .editor-post-title__input
				{	
					font-size:<?php echo 3.125*GBT_MT_Opt::getOption( 'body_text_font_size' ); ?>px;
				}
				
				.editor-styles-wrapper .wp-block-heading  h2.editor-rich-text__tinymce,
				.wc-block-featured-product .wc-block-featured-product__title,
				.wc-block-featured-category .wc-block-featured-category__title
				{	
					font-size:<?php echo 2.3125*GBT_MT_Opt::getOption( 'body_text_font_size' ); ?>px;
				}
				
				.editor-styles-wrapper .wp-block-heading  h3.editor-rich-text__tinymce,
				.editor-styles-wrapper .wp-block .wp-block-quote p
				{	
					font-size:<?php echo 1.6875*GBT_MT_Opt::getOption( 'body_text_font_size' ); ?>px;
				}
				
				.editor-styles-wrapper .wp-block-heading  h4.editor-rich-text__tinymce
				{	
					font-size:<?php echo 1.4375*GBT_MT_Opt::getOption( 'body_text_font_size' ); ?>px;
				}
				
				.editor-styles-wrapper .wp-block-heading  h5.editor-rich-text__tinymce
				{	
					font-size:<?php echo 1.125*GBT_MT_Opt::getOption( 'body_text_font_size' ); ?>px;
				}
				
				.editor-styles-wrapper .wp-block-heading  h6.editor-rich-text__tinymce
				{	
					font-size:<?php echo 1*GBT_MT_Opt::getOption( 'body_text_font_size' ); ?>px;
				}
			}
			
		<?php endif; ?>

        <?php if ( GBT_MT_Opt::getOption( 'title_font_weight' ) != "" ) : ?>
				.editor-styles-wrapper .editor-post-title__block .editor-post-title__input,
				.wp-block-heading h1, 
				.wp-block-heading h2, 
				.wp-block-heading h3, 
				.wp-block-heading h4, 
				.wp-block-heading h5, 
				.wp-block-heading h6
				{
					font-weight: <?php echo GBT_MT_Opt::getOption( 'title_font_weight' ); ?>;
					color: <?php echo GBT_MT_Opt::getOption( 'headings_color' )?>;
				}
				
		<?php endif; ?>

	<?php
	
	$content = ob_get_clean();
	wp_add_inline_style( 'mr_tailor-gutenberg-blocks', $content );
	}
}

/**
 * Enqueue stylesheet for block editor
 */
function mr_tailor_block_assets() {
	if ( is_admin() ) {
		wp_enqueue_style( 'mr_tailor-gutenberg-blocks', get_template_directory_uri() . '/css/admin/block-assets.css');
	}
};
add_action( 'enqueue_block_assets', 'mr_tailor_block_assets' );
add_action( 'enqueue_block_assets', 'mr_tailor_gutenberg_custom_styles' );