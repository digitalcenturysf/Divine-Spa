<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
wc_print_notices();
do_action( 'woocommerce_before_cart' ); ?>
<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
<?php do_action( 'woocommerce_before_cart_table' ); ?>
<table class="shop_table_responsive cart table-bordered" cellspacing="0">
	<tbody>
		<tr>
			<td><?php esc_html_e( 'Image', 'divine-spa-lite' ); ?></td>
			<td><?php esc_html_e( 'Product', 'divine-spa-lite' ); ?></td>
			<td><?php esc_html_e( 'Price', 'divine-spa-lite' ); ?></td>
			<td><?php esc_html_e( 'Quantity', 'divine-spa-lite' ); ?></td>
			<td><?php esc_html_e( 'Total', 'divine-spa-lite' ); ?></td>
			<td><?php esc_html_e( 'Remove', 'divine-spa-lite' ); ?></td>
		</tr>  
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>
		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
				<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
					<td>
						<figure>
						<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
							if ( ! $product_permalink ) {
								echo $thumbnail;
							} else {
								printf( '%s',  $thumbnail );
							}
						?>
						</figure>
					</td>
					<td data-title="<?php esc_html_e( 'Product', 'divine-spa-lite' ); ?>">
						<?php
							if ( ! $product_permalink ) {
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '%s', $_product->get_title() ), $cart_item, $cart_item_key );
							}
							// Meta data
							echo WC()->cart->get_item_data( $cart_item );
							// Backorder notification
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'divine-spa-lite' ) . '</p>';
							}
						?>
					</td>
					<td class="cart-price" data-title="<?php esc_attr_e( 'Price', 'divine-spa-lite' ); ?>">
						<?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?>
					</td>
					<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'divine-spa-lite' ); ?>">
						<div class="qty-bx">
							<input type="button" value="-" class="minus">
							<?php
								if ( $_product->is_sold_individually() ) {
									$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
								} else {
									$product_quantity = woocommerce_quantity_input( array(
										'input_name'  => "cart[{$cart_item_key}][qty]",
										'input_value' => $cart_item['quantity'],
										'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
										'min_value'   => '0'
									), $_product, false );
								}
								echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
							?>
							<input type="button" value="+" class="plus">
						</div>
					</td>
					<td class="cart-price" data-title="<?php esc_attr_e( 'Total', 'divine-spa-lite' ); ?>">
						<?php
							echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
						?>
					</td>
					<td>
						<?php
							echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
								'<a href="%s"  title="%s" data-product_id="%s" data-product_sku="%s">X</a>',
								esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
								__( 'Remove this item', 'divine-spa-lite' ),
								esc_attr( $product_id ),
								esc_attr( $_product->get_sku() )
							), $cart_item_key );
						?>
					</td>
				</tr>
				<?php
			}
		}
		do_action( 'woocommerce_cart_contents' );
		?>
		<tr>
			<td colspan="6">
				<input type="submit" class="button updtcart" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'divine-spa-lite' ); ?>" />
				<?php do_action( 'woocommerce_cart_actions' ); ?>
				<?php wp_nonce_field( 'woocommerce-cart' ); ?>
				<a href="<?php echo esc_url(home_url('/').'shop/'); ?>" class="cmn-btn1"><?php esc_html_e('Continue Shopping','divine-spa-lite'); ?></a>
			</td>
		</tr>
		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</tbody>
</table>
<?php do_action( 'woocommerce_after_cart_table' ); ?>
</form>
<div class="cart-content-area">
  <div class="cart-total-area">
    <section class="col-lg-4 col-md-4">
		<h3><?php esc_html_e('Enter A Coupon Code','divine-spa-lite'); ?></h3>
		<?php if ( wc_coupons_enabled() ) { ?>
		<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
			<div class="coupon">
			<div>
				<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'divine-spa-lite' ); ?>" />
			</div>
			<p> 
				<input type="submit" class="button coupon" name="apply_coupon" value="<?php esc_attr_e( 'Apply Code', 'divine-spa-lite' ); ?>" />
			</p>
			<?php do_action( 'woocommerce_cart_coupon' ); ?>
			</div>
		</form>
		<?php } ?> 
    </section>
    <section class="col-lg-4 col-md-4">
      <?php do_action( 'woocommerce_cart_collaterals' ); ?>
    </section>
  </div>
 </div>
 
<?php do_action( 'woocommerce_after_cart' ); ?>
