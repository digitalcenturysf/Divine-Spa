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
  <h5 class="btm"><i class="fa fa-calendar"></i><?php the_time('d F, Y'); ?>  &nbsp; | &nbsp;  <?php esc_html_e('by','divine-spa'); ?> <span><?php the_author(); ?></span></h5>
  <?php the_content(); 
	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'divine-spa' ),
		'after'  => '</div>',
	) );
 
global $numpages;
if ( is_singular() && $numpages > 1 ) {
      if ( is_singular( 'attachment' ) ) {
        // Parent post navigation.
        the_post_navigation( array(
          'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'divine-spa' ),
        ) );
      } elseif ( is_singular( 'post' ) ) {
        // Previous/next post navigation.
        the_post_navigation( array(
          'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next', 'divine-spa' ) . '</span> ' .
            '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'divine-spa' ) . '</span> ' .
            '<span class="post-title">%title</span>',
          'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous', 'divine-spa' ) . '</span> ' .
            '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'divine-spa' ) . '</span> ' .
            '<span class="post-title">%title</span>',
        ) );
      }
}
 ?>
</div>
<div class="blog-share-bx">
  <div class="row">
    <div class="col-lg-6 col-md-6 tag-bx">
      <?php if(has_tag()): ?><span> <?php esc_html_e('Tags','divine-spa'); ?>:</span> <?php the_tags( '', ', ', '' ); ?> <?php endif; ?>
    </div> 
  </div>
</div>
<?php 
$divine_spa_author = get_the_author_meta('description');
if($divine_spa_author):
?>
  <div class="blog-author-bx">
    <h3>About Post Author</h3>
    <section class="clearfix author">
      <figure><?php echo get_avatar( get_the_author_meta( 'ID' ), 130 ); ?></figure>
      <div>
        <h4><b><?php the_author(); ?></b></h4> 
        <p><?php the_author_meta('description'); ?></p>
      </div>
    </section>
  </div>
<?php endif; ?>