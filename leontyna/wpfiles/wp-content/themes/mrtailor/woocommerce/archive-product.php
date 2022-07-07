<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     3.4.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

remove_filter( 'woocommerce_product_loop_start', 'woocommerce_maybe_show_product_subcategories' );

// Category Header Image
$category_header_src = "";
if( !is_shop() ) {
    $category_header_src = apply_filters( 'mrtailor_get_category_header_image', '' );
}

$shop_page_has_sidebar = false;

if ( ( GBT_MT_Opt::getOption( 'shop_layout' ) == "1" ) && is_active_sidebar( 'catalog-widget-area' ) ) {
    $shop_page_has_sidebar = true; 
}

$page_title_option = "off";

if ( is_shop() && get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'page_title_meta_box_check', true ) ) {
    $page_title_option = get_post_meta( get_option( 'woocommerce_shop_page_id' ), 'page_title_meta_box_check', true );
}

if (is_shop()) {
    $shop_page_id =  get_option( 'woocommerce_shop_page_id' );
    $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $shop_page_id ), 'large' );
    if ( ! empty( $large_image_url[0] ) ) {
        $category_header_src = $large_image_url[0];
    }
}

$parent_id      = get_queried_object_id();
$categories     = get_terms('product_cat', array('hide_empty' => 0, 'parent' => $parent_id));
$display_mode   = woocommerce_get_loop_display_mode();

$cat_class = "";

if( $display_mode == 'both' ) {
    $cat_class = "original_grid";
}

get_header('shop');

?>
<div id="primary" class="content-area catalog-page <?php echo esc_attr($shop_page_has_sidebar) ? 'with-sidebar' : 'without-sidebar'; ?>">
    
    <div class="category_header <?php echo (esc_url($category_header_src) != "") ? 'with_featured_img' : ''; ?>" <?php echo (esc_url($category_header_src) != "") ? 'style="background-image:url('.$category_header_src.')"' : ''; ?> >
        
        <div class="row">
            <div class="large-8 large-centered columns">

                <?php do_action('woocommerce_before_main_content'); ?>

                <?php if ( $page_title_option == "off" ) : ?>

                    <h1 class="page-title shop_page_title"><?php woocommerce_page_title(); ?></h1>

                <?php endif; ?>

                <?php do_action( 'woocommerce_archive_description' ); ?>
                
            </div>
        </div>
        
    </div>
    
    <div class="row">
        <div class="large-12 columns">        

            <div id="content" class="site-content" role="main">
                
                <?php if (!is_paged()) : //show categories only on first page ?>
                
                    <?php if ( $display_mode != 'products' ) : ?>

                        <?php if ($categories) : ?>
                      
                            <div class="row">
                                <div class="categories_grid <?php if ( ($display_mode != 'subcategories') && ((function_exists('woocommerce_product_loop') && woocommerce_product_loop()) || have_posts()) ) echo 'no_margin'; ?>">
                                    
                                    <?php $cat_counter = 0; ?>
                                    
                                    <?php $cat_number = count($categories); ?>
                                    
                                    <?php foreach($categories as $category) : ?>
                                        
                                        <?php                        
                                            $thumbnail_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
                                            $image = wp_get_attachment_url( $thumbnail_id );
                                        ?>
                                        
                                        <?php 
                                            if($cat_class != "original_grid") 
                                            {
                                                $cat_counter++;                                        

                                                switch ($cat_number) {
                                                    case 1:
                                                        $cat_class = "one_cat_" . $cat_counter;
                                                        break;
                                                    case 2:
                                                        $cat_class = "two_cat_" . $cat_counter;
                                                        break;
                                                    case 3:
                                                        $cat_class = "three_cat_" . $cat_counter;
                                                        break;
                                                    case 4:
                                                        $cat_class = "four_cat_" . $cat_counter;
                                                        break;
                                                    case 5:
                                                        $cat_class = "five_cat_" . $cat_counter;
                                                        break;
                                                    default:
                                                        if ($cat_counter < 7) {
                                                            $cat_class = $cat_counter;
                                                        } else {
                                                            $cat_class = "more_than_6";
                                                        }
                                                }
                                                
                                            }
                                        ?>
                                        
                                        <div class="category_<?php echo esc_attr($cat_class); ?>">
                                            <div class="category_grid_box">
                                                <span class="category_item_bkg" style="background-image:url(<?php echo esc_url($image); ?>)"></span> 
                                                <a href="<?php echo get_term_link( $category->slug, 'product_cat' ); ?>" class="category_item">
                                                    <span class="category_name"><?php echo esc_html($category->name); ?></span>
                                                </a>
                                            </div>
                                        </div>
                                    
                                    <?php endforeach; ?>
                                    
                                    <div class="clearfix"></div>
                                    
                                </div>
                            </div>

                        <?php endif; ?>
                    
                    <?php endif; ?>
                
                <?php endif; ?>
                
                <?php if ( $display_mode != 'subcategories' ) : ?>
        
                    <?php if ( (function_exists('woocommerce_product_loop') && woocommerce_product_loop()) || have_posts() ) : ?>
                    
                        
                        <div class="catalog_top row">
                            <?php do_action( 'woocommerce_before_shop_loop' ); ?>
                        </div>
                        
                        <div class="row">
                            <div class="large-12 columns">
                                <hr class="catalog_top_sep" />
                            </div><!-- .columns -->
                        </div>
            
                        <div class="row">
                            
                            <?php if ($shop_page_has_sidebar) : ?>
                                
                                <div class="large-3 columns show-for-large-up">
                                    <div class="shop_sidebar wpb_widgetised_column">
                                        <?php dynamic_sidebar('catalog-widget-area'); ?>
                                    </div>
                                </div>

                            <?php endif; ?>
                            
                            <div class="<?php echo esc_attr($shop_page_has_sidebar) ? 'large-9' : 'large-12'; ?> columns">
                
                                <div class="active_filters_ontop"><?php the_widget( 'WC_Widget_Layered_Nav_Filters', 'title=' ); ?></div>
                
                                <?php woocommerce_product_loop_start(); ?>            
                                    <?php while ( have_posts() ) : the_post(); ?>                            
                                        <?php wc_get_template_part( 'content', 'product' ); ?>                            
                                    <?php endwhile; // end of the loop. ?>                            
                                <?php woocommerce_product_loop_end(); ?>
                                
                                <div class="woocommerce-after-shop-loop-wrapper">
                                    <?php do_action( 'woocommerce_after_shop_loop' ); ?>
                                </div>
                                
                            </div><!-- .columns -->
                        </div><!--.row-->
                        
                    <?php else : ?>
                                   
                        <?php wc_get_template( 'loop/no-products-found.php' ); ?>
            
                    <?php endif; ?>
                
                <?php endif; ?>
            
                <?php do_action('woocommerce_after_main_content'); ?>

            </div><!-- #content -->           
        </div><!-- .columns -->        
    </div><!-- .row -->
</div><!-- #primary -->

<?php get_footer('shop'); ?>