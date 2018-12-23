<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Divine_Spa
 */
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="error-content-area spacer-area">
			  <div class="container">
			    <div class="row">
			      <section class="error-bx1">
			        <h1><?php esc_html_e('404','divine-spa'); ?></h1>
			        <h4><?php esc_html_e('Sorry Page Was Not Found','divine-spa'); ?></h4>
			      </section>
			      <figure>
			        <p><?php esc_html_e('The page you are looking is not available or has been removed.
			          Try going to Home Page by using the button below.','divine-spa'); ?></p>
			        <p><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Go To Home Page','divine-spa'); ?></a></p>
			      </figure>
			    </div>
			  </div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
