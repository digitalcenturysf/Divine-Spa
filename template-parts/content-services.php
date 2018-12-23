<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Divine_Spa
 */

?>
<?php if(has_post_thumbnail()): ?>
  <div class="blog-image-bx"> <?php the_post_thumbnail('divine-spa-single-post'); ?> </div>
<?php endif; ?>
<div class="blog-des-bx">
  <h2><?php the_title(); ?></h2>
  <?php the_content(); 
	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'divine-spa' ),
		'after'  => '</div>',
	) );
 
 ?>
</div>
  