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
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $product;
// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php post_class("col-lg-4 col-md-4  col-sm-6"); ?>>
  	<section>
  		<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
    	<figure></figure>
    	<div class="product-overlay">
      		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      		 
      		<h4><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></h4>
      		<div class="butn">
            <div class="crt"><a class="emp"><?php do_action( 'woocommerce_after_shop_loop_item' ); ?></div>
            <?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
        		<div class="zom"><a href="#" data-toggle="modal" data-target="#myModal<?php the_id(); ?>"><i class="fa fa-search" aria-hidden="true"></i></a></div>
      		</div>
    	</div>
  	</section>
</div>
<div id="myModal<?php the_ID(); ?>" class="modal fade product-pop" role="dialog">
  <div class="modal-dialog">
<?php $divine_spa_lite_post_id = get_the_ID(); ?>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>       
      </div>
      <div class="modal-body row">
      <?php $divine_spa_lite_modal = new WP_Query(array('post_type'=>'product','p' => $divine_spa_lite_post_id)); ?>
      <?php while($divine_spa_lite_modal->have_posts()): $divine_spa_lite_modal->the_post(); ?>
        <div class="col-lg-5 col-md-5">
        	<div class="product-image">
        		<?php the_post_thumbnail(); ?>
        	</div>
        </div>
        <div class="col-lg-7 col-md-7">
            <h3><?php the_title(); ?></h3>
            <div><a href="<?php the_permalink(); ?>" class="see-btn"><?php esc_html_e('See all features','divine-spa-lite'); ?></a></div>
            <h4><?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?></h4>
            <aside><?php esc_html_e('SKU','divine-spa-lite'); ?>: <?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'divine-spa-lite' ); ?></aside>
             <?php echo apply_filters( 'woocommerce_short_description', $post->post_excerpt ) ?> 
 
            	<?php divine_spa_lite_modal_add_to_cart(); ?>
            
            <div class="social-share-area">
            <h5><?php esc_html_e('Share this product','divine-spa-lite'); ?></h5>
               <a target="_blank" href="<?php echo esc_url('http://www.facebook.com/sharer.php?u='.get_the_permalink().'&amp;title='.get_the_title()); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>  
               <a target="_blank" href="<?php echo esc_url('http://twitter.com/home/?status='.get_the_title().' - '.get_the_permalink()); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a> 
               <a target="_blank" href="<?php echo esc_url('https://plus.google.com/share?url='.get_the_permalink().'&amp;title='.get_the_title()); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a> 
               <a target="_blank" href="<?php echo esc_url('http://pinterest.com/pin/create/button/?url='.get_the_permalink().'&amp;title='.get_the_title()); ?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>  
               <a target="_blank" href="<?php echo esc_url('http://www.linkedin.com/shareArticle?mini=true&amp;title='.get_the_title().'&amp;url='.get_the_permalink()); ?> "><i class="fa fa-linkedin" aria-hidden="true"></i></a> 
            </div>
          </div>
        <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </div> 
  </div>
</div> 