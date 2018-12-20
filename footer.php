<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Divine_Spa_Lite
 */
$divine_spa_lite_opt = new DivineSpaLiteFrameworkOpt();
?>
	</div>
	<footer>
	  <div class="footer-bottom-area">
	    <div class="container">
	      <div class="row">
	        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
	          <?php $divine_spa_lite_opt->divine_spa_lite_copyright_text(); ?>
	        </div> 
	      </div>
	    </div>
	  </div>
	</footer>
</div> 
<a href="#" class="scrollToTop"><i class="fa fa-angle-double-up "></i></a> 
<?php wp_footer(); ?>
</body>
</html>
