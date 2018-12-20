<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
wc_print_notices();
do_action( 'woocommerce_before_checkout_form', $checkout );
// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', esc_html__( 'You must be logged in to checkout.', 'divine-spa-lite' ) );
	return;
}
?>
<div class="checkout-content-area">
	<div class="billing-details-area">
	<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">
		<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>
			<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
			<div class="col2-set" id="customer_details">
				<div class="col-1">
					<?php do_action( 'woocommerce_checkout_billing' ); ?>
				</div>
				<div class="col-2">
					<?php do_action( 'woocommerce_checkout_shipping' ); ?>
				</div>
			</div>
			<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>
		<?php endif; ?>
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
      <div class="billing-order-area">
      	<div class="row">
      		<!-- review order -->
	        <div class="col-lg-6 col-md-6">
	          <section class="order-section">
	            <h3><?php esc_html_e('Your Order','divine-spa-lite'); ?></h3>
	            <ul>
					<?php
						do_action( 'woocommerce_review_order_before_cart_contents' );
						$i=1;
						foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
							$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
								?>
								 <li><?php echo $i; ?>. <?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;'; ?> <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?></li>
								<?php
								$i++;
							}
						}
						do_action( 'woocommerce_review_order_after_cart_contents' );
					?>
	              <li class="bld"><?php esc_html_e('Subtotal','divine-spa-lite'); ?> <?php wc_cart_totals_subtotal_html(); ?></li>
				<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
					<li><?php wc_cart_totals_coupon_label( $coupon ); ?> <?php wc_cart_totals_coupon_html( $coupon ); ?></li>
				<?php endforeach; ?>
				<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>
					<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>
					<li><?php wc_cart_totals_shipping_html(); ?></li>
					<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>
				<?php endif; ?> 
				<?php foreach ( WC()->cart->get_fees() as $fee ) : ?> 
					<li><?php echo esc_html( $fee->name ); ?> <?php wc_cart_totals_fee_html( $fee ); ?></li>
				<?php endforeach; ?>
				<?php if ( wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart ) : ?>
					<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
						<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
							<li><?php echo esc_html( $tax->label ); ?> <?php echo wp_kses_post( $tax->formatted_amount ); ?></li>
						<?php endforeach; ?>
					<?php else : ?> 
							<li><?php echo esc_html( WC()->countries->tax_or_vat() ); ?> <?php wc_cart_totals_taxes_total_html(); ?></li>  
					<?php endif; ?>
				<?php endif; ?>
	              <li class="bld"><?php esc_html_e('Total','divine-spa-lite'); ?> <?php wc_cart_totals_order_total_html(); ?></li>
	            </ul>
	          </section>
	        </div>
      		<!-- payment -->
	        <div class="col-lg-6 col-md-6">
	          <section class="payment-section">
	          	<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	            
	          </section>
	        </div>
        </div>
      </div> 
	 
		<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
	</form>
	</div>
</div>
<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
