<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.5.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

    global $post, $product, $woocommerce;
    $values = get_post_custom( $post->ID );
    $page_product_youtube = isset($values['page_product_youtube']) ? esc_attr( $values['page_product_youtube'][0]) : '';

    $attachment_ids = $product->get_gallery_image_ids();
    	
    if ( $attachment_ids ) {
    	
    ?> 

    	<?php if ( $product->get_image_id() ) {
        
            if ( GBT_MT_Opt::getOption( 'products_layout' ) == 1 ) {

                echo "<div class='product_thumbnails horizontal_product_thumbnails'>";

            } else {

                echo "<div class='product_thumbnails'>";

    		}

            //Featured
            
            $image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
            $image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
            $image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ), array(
                'title' => $image_title
                ) );
            
			$attachment_count   = count( $product->get_gallery_image_ids() );

            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<div class="carousel-cell is-nav-selected">%s</div>', $image ), $post->ID ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

            //Thumbs
        
            $attachment_ids = $product->get_gallery_image_ids();
        
            if ( $attachment_ids ) {
            
                foreach ( $attachment_ids as $attachment_id ) {
        
                    $image_link = wp_get_attachment_url( $attachment_id, 'thumbnail' );
        
                    if ( ! $image_link )
                        continue;
        
                    $image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );
                    $image_title = esc_attr( get_the_title( $attachment_id ) );
        
                    echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<div class="carousel-cell">%s</div>', $image ), $attachment_id, $post->ID ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
                    
                }

                if ( $page_product_youtube  ) {
                    echo '<div class="carousel-cell youtube"><i class="spk-icon-video-player"></i></div>';
                }

        
            ?>
            
        </div><!-- /.product_images -->
        
    	<?php
    	} //has_post_thumbnail

    	} else {	
    		echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $post->ID );	
    	}
    	
    } //attachment_ids

