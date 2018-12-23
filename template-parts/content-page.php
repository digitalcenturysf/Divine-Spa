<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Divine_Spa
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2 class="entry-titles"><?php esc_html_e('This is title','divine-spa') ?></h2>
	<?php if((get_post_meta(get_the_ID(),'_divine_spa_header_style',true)!='sldr') && (get_post_meta(get_the_ID(),'_divine_spa_header_style',true)!='bnr') && (get_post_meta(get_the_ID(),'_divine_spa_header_style',true)!='revsldr')): ?>
		<header class="entry-header">
			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		</header><!-- .entry-header -->
	<?php endif; ?>
	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'divine-spa' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php if ( get_edit_post_link() ) : ?>
		 
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'divine-spa' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
		 
	<?php endif; ?>
</article><!-- #post-## -->
