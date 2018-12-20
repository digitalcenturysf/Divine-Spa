<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Divine_Spa_Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php 
$divine_spa_lite_opt = new DivineSpaLiteFrameworkOpt();
$divine_spa_lite_logo = $divine_spa_lite_opt->divine_spa_lite_logo(); 
wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<header>
	  <div class="main-header-area">
	    <div class="container">
	      <div class="row">
	        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
	          <div class="logo-area"> <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($divine_spa_lite_logo); ?>" alt="logo"></a> </div>
	        </div> 
	        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
	          <div class="main-menu">
	            <?php divine_spa_lite_main_menu(); ?>
	          </div>
	        </div> 
	        <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12 acurate"> 
		        <div class="search-area"> 
		          	<span data-toggle="modal" data-target="#dcsf_search"><i class="fa fa-search fa-lg"></i></span> 
		          	<?php if(class_exists('WooCommerce')): ?>
			          	<?php divine_spa_lite_woocommere_min_cart(); ?>
			    	<?php endif; ?>
		        </div>
		         <!-- Search Modal -->
				<div id="dcsf_search" class="modal fade">
				  <div class="modal-dialog">
				  		<i class="fa fa-times"></i>
						<?php divine_spa_lite_header_search(); ?>
				  </div>
				</div>
	        </div> 
	      </div>
	    </div>
	  </div>
	  <div class="mobile-menu-area">
	    <div class="container">
	      <div class="row">
	        <div class="col-md-12">
	          <div class="mobile-menu">
	            <nav id="dropdown">
	             	<?php divine_spa_lite_main_menu(); ?>
	            </nav>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
	</header>
	<!-- header area end here --> 
    
    <?php get_template_part('banner'); ?>  
 
	<div id="content" class="site-content">
