<?php
/**
 * Output a single payment method
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<li class="payment_method_<?php echo esc_attr( $gateway->id ); ?>">
	<input id="payment_method_<?php echo esc_attr( $gateway->id ); ?>" type="radio" class="input-radio check_box_radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />

	<label  class="check_label_radio" for="payment_method_<?php echo esc_attr( $gateway->id ); ?>">
		<?php echo esc_html($gateway->get_title()) . $gateway->get_icon(); ?>
	</label>
	<?php if ( $gateway->has_fields() || $gateway->get_description() ) : ?>
		<div class="payment_box payment_method_<?php echo esc_attr( $gateway->id ); ?>" <?php if ( ! $gateway->chosen ) : ?>style="display:none;"<?php endif; ?>>
			<?php $gateway->payment_fields(); ?>
		</div>
	<?php endif; ?>
</li>
