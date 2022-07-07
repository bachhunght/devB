<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */
 
global $woocommerce_loop;
 
?>

<?php

if ( ( isset($woocommerce_loop['columns']) && $woocommerce_loop['columns'] != "" ) ) {
	$products_per_column = $woocommerce_loop['columns'];
} else {
	$products_per_column = get_option('woocommerce_catalog_columns', 3);

	if (isset($_GET["products_per_row"])) {
		$products_per_column = $_GET["products_per_row"];
	}
}

if ($products_per_column == 6) {
	$products_per_column_large = 6;
	$products_per_column_medium = 4;
	$products_per_column_small = 2;
}

if ($products_per_column == 5) {
	$products_per_column_large = 5;
	$products_per_column_medium = 4;
	$products_per_column_small = 2;
}

if ($products_per_column == 4) {
	$products_per_column_large = 4;
	$products_per_column_medium = 3;
	$products_per_column_small = 2;
}

if ($products_per_column == 3) {
	$products_per_column_large = 3;
	$products_per_column_medium = 3;
	$products_per_column_small = 2;
}

if ($products_per_column == 2) {
	$products_per_column_large = 2;
	$products_per_column_medium = 2;
	$products_per_column_small = 2;
}

if ($products_per_column == 1) {
	$products_per_column_large = 1;
	$products_per_column_medium = 1;
	$products_per_column_small = 1;
}

?>

<?php

if ( GBT_MT_Opt::getOption( 'products_animation' ) ) {
    $effect = GBT_MT_Opt::getOption( 'products_animation' );
} else {
    $effect = 'e0';
}

?>

<div class="row">
	<div class="large-12 columns">
		<ul id="products-grid" class="<?php if (GBT_MT_Opt::getOption( 'add_to_cart_display' ) == '0') echo 'force-add-to-cart'; ?> products products-grid effect-<?php echo esc_attr($effect); ?> small-block-grid-<?php echo esc_attr($products_per_column_small); ?> medium-block-grid-<?php echo esc_attr($products_per_column_medium); ?> large-block-grid-<?php echo esc_attr($products_per_column_large); ?> columns-<?php echo esc_attr($products_per_column); ?>">