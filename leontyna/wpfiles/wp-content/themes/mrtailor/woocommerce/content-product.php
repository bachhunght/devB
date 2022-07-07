<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

//woocommerce_after_shop_loop_item_title
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

add_action( 'woocommerce_after_shop_loop_item_title_loop_price', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item_title_loop_rating', 'woocommerce_template_loop_rating', 5 );

//woocommerce_before_shop_loop_item_title
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

$mc_product_class = '';
if ( GBT_MT_Opt::getOption( 'catalog_mode' ) ) {
	$mc_product_class = 'catalog_mode';
}

?>

<li <?php wc_product_class( $mc_product_class, $product ); ?> >

	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<div class="product_wrapper">

		<?php
            $attachment_ids = $product->get_gallery_image_ids();
            if ( $attachment_ids ) {
                $loop = 0;
                foreach ( $attachment_ids as $attachment_id ) {
                    $image_link = wp_get_attachment_url( $attachment_id );
                    if (!$image_link) continue;
                    $loop++;
                    $product_thumbnail_second = wp_get_attachment_image_src($attachment_id, 'shop_catalog');
                    if ($loop == 1) break;
                }
            }
        ?>
        
        <?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
        
        <?php if( !GBT_MT_Opt::getOption( 'catalog_mode' ) ) : ?>
			<?php wc_get_template( 'loop/sale-flash.php' ); ?>
        <?php endif; ?>
        
        <?php

        $style = '';
        $class = '';        
        if (isset($product_thumbnail_second[0])) { 
			if ( GBT_MT_Opt::getOption( 'product_hover_animation' ) ) {          
				$style = 'background-image:url(' . $product_thumbnail_second[0] . ')';
				$class = 'with_second_image'; 
			}
        }
        
        ?>
		
		<div class="product_thumbnail_wrapper">
			
			<div class="product_thumbnail <?php echo esc_attr($class); ?>">
				
				<a href="<?php the_permalink(); ?>">
				
					<span class="product_thumbnail_background" style="<?php echo esc_attr($style); ?>"></span>
					<?php
						if ( has_post_thumbnail( $post->ID ) ) { 	
							echo  get_the_post_thumbnail( $post->ID, 'shop_catalog');
						}else{
							 echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $post->ID );
						}
					?>
				</a>
				
			</div>
			
			<?php if (class_exists('YITH_WCWL')) : ?>
			<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
			<?php endif; ?>
			
		</div><!--product_thumbnail_wrapper-->
        
       
        <?php if ( !GBT_MT_Opt::getOption( 'catalog_mode' ) ) : ?>
			<?php if( !$product->is_in_stock() && !empty(GBT_MT_Opt::getOption( 'out_of_stock_text' ))) : ?>            
                <div class="out_of_stock_badge_loop <?php if (!$product->is_on_sale()) : ?>first_position<?php endif; ?>"><?php echo esc_html(GBT_MT_Opt::getOption( 'out_of_stock_text' ), 'mr_tailor'); ?></div>            
            <?php endif; ?>
        <?php endif; ?>

		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

	</div><!--product_wrapper-->
    
    <?php do_action( 'woocommerce_after_shop_loop_item_title_loop_rating' ); ?>
    
	<div class="product_after_shop_loop">
        
        <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
		
		<div class="product_after_shop_loop_switcher">
            
            <div class="product_after_shop_loop_price">
                <?php do_action( 'woocommerce_after_shop_loop_item_title_loop_price' ); ?>
            </div>
            
            <div class="product_after_shop_loop_buttons">
                <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
            </div>
            
        </div>
        
    </div>

</li>