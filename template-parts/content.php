<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Divine_Spa_Lite
 */
?>
<section id="post-<?php the_ID(); ?>" <?php post_class('masonry-entry'); ?>> 
  	<?php $divine_spa_lite_post_cls = "no-img";
  	if(has_post_thumbnail()){ the_post_thumbnail('divine-spa-lite-blog-post'); $divine_spa_lite_post_cls = ""; } ?>
    <div class="blog-description <?php echo esc_attr($divine_spa_lite_post_cls); ?>"> 
    	<a href="<?php the_permalink(); ?>">
        	<p><i class="fa fa-calendar"></i><?php echo get_the_time('d F, Y'); ?>   I   <?php esc_html_e('by','divine-spa-lite'); ?>  <?php the_author(); ?></p>
        	<h2><?php the_title(); ?></h2>
        </a> 
        <?php if(!has_post_thumbnail()): ?>
	        <p class="short-content"><?php echo wp_trim_words(get_the_content(),13,'...') ?></p>
	    <?php endif; ?>
    </div>
    <a href="<?php the_permalink(); ?>"><span></span></a> 
</section>
