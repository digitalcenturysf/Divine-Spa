
	<!-- inner-banner-area start here-->
<div class="about-banner-area">
	<div class="container"> 
		<div class="heading-cmn-area">
			<h2><?php divine_spa_lite_breadcrumb(); ?></h2>
			<?php 
			if ( !is_front_page() && !is_home() ): ?>
				<div class="header-page-locator">
				  <ul>
				    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home','divine-spa-lite'); ?> /</a> <?php divine_spa_lite_breadcrumb(); ?></li>
				  </ul>
				</div>
			<?php endif; ?>
		</div> 
	</div>
</div>
	<!-- inner-banner-area start end--> 