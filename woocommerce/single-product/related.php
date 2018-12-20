<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
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
 * @version     3.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post,$product, $woocommerce_loop;
if ( empty( $product ) || ! $product->exists() ) {
	return;
}
if ( ! $related = $product->get_related( $posts_per_page ) ) {
	return;
}
$args = apply_filters( 'woocommerce_related_products_args', array(
	'post_type'            => 'product',
	'ignore_sticky_posts'  => 1,
	'no_found_rows'        => 1,
	'posts_per_page'       => $posts_per_page,
	'orderby'              => $orderby,
	'post__in'             => $related,
	'post__not_in'         => array( $product->id )
) );
$products                    = new WP_Query( $args );
$woocommerce_loop['name']    = 'related';
$woocommerce_loop['columns'] = apply_filters( 'woocommerce_related_products_columns', $columns );
if ( $products->have_posts() ) : ?>
	<div class="productArrival-area">
		<h3><?php esc_html_e( 'New Arrivals', 'divine-spa-lite' ); ?></h3> 
		<div class="controls pull-right"> 
		<a class="left left-arrow btn btn-primary" href="#carousel-example-generic" data-slide="prev">
			<i class="fa fa-angle-left"></i></a> 
		<a class="right right-arrow btn btn-primary" href="#carousel-example-generic" data-slide="next">
			<i class="fa fa-angle-right"></i></a> 
		</div>
         <div class="clearfix"></div>
      <div class="slider">
        <div id="carousel-example-generic" class="carousel slide shop-product" data-ride="carousel"> 
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
 
            <div class="item">
              <div class="row">
				<?php 
				    $new_arr_args = array( 
				        'post_type' => 'product', 
				        'orderby' => 'date', 
				        'order' => 'DESC', 
				        'posts_per_page' => -1
				    ); 
				    $new_arr_product = new WP_Query($new_arr_args); 
				    $new_arri = 1;  
				?>
				<?php  
				while ($new_arr_product->have_posts()): $new_arr_product->the_post(); ?>
                <div class="col-sm-4 col-xs-4">
                  <div class="col-item">
                    <div class="photo"> <?php the_post_thumbnail(); ?></div>
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
                  </div>
                </div>    
				<?php if ($new_arri % 3 == 0 && ($new_arr_product->found_posts != $new_arri)) { ?>
	              </div>
	            </div>
	            <div class="item">
	              <div class="row">
				<?php } $new_arri++; endwhile; wp_reset_postdata(); ?>
              </div>
            </div>
 
          </div>
        </div>
      </div> 
	</div>
  <?php $divine_spa_lite_modal = new WP_Query(array('post_type'=>'product','posts_per_page' => -1)); ?>
  <?php while($divine_spa_lite_modal->have_posts()): $divine_spa_lite_modal->the_post(); ?>
<div id="myModal<?php the_ID(); ?>" class="modal fade product-pop" role="dialog">
  <div class="modal-dialog"> 
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>       
      </div>
      <div class="modal-body row">
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
      </div>
    </div> 
  </div>
</div> 
<?php endwhile; wp_reset_postdata(); ?>
<?php endif;
