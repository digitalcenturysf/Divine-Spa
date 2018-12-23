<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Divine_Spa
 */
?>
<section id="post-<?php the_ID(); ?>" <?php post_class('masonry-entry'); ?>> 
  	<?php $divine_spa_post_cls = "no-img";
  	if(has_post_thumbnail()){ the_post_thumbnail('divine-spa-blog-post'); $divine_spa_post_cls = ""; } ?>
    <div class="blog-description <?php echo esc_attr($divine_spa_post_cls); ?>"> 
    	<a href="<?php the_permalink(); ?>">
        	<p><i class="fa fa-calendar"></i><?php the_time('d F, Y'); ?> | <?php esc_html_e('by','divine-spa'); ?>  <?php the_author(); ?></p>
        	<h2><?php the_title(); ?></h2>
        </a> 
        <?php if(!has_post_thumbnail()): ?>
	        <p class="short-content"><?php echo wp_kses_post(wp_trim_words(get_the_content(),13,'...')); ?></p>
	    <?php endif; ?>
    </div>
    <a href="<?php the_permalink(); ?>"><span></span></a> 
</section>
