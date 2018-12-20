<?php
/**
 * DCSF Divine functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Divine_Spa_Lite
 */
define("DIVINE_SPA_LITE_CSS", get_template_directory_uri() . "/css/" );
define("DIVINE_SPA_LITE_INC", get_template_directory_uri() . "/inc/" );
define("DIVINE_SPA_LITE_DURI", get_template_directory_uri() ."/" );
define("DIVINE_SPA_LITE_JS", get_template_directory_uri() . "/js/" );

if ( ! function_exists( 'divine_spa_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function divine_spa_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on DCSF Divine, use a find and replace
	 * to change 'divine-spa-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'divine-spa-lite', get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	// woocommerce support
	add_theme_support( 'woocommerce' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'divine-spa-lite-blog-post', 398,265,true );
	add_image_size( 'divine-spa-lite-single-post', 848,414,true ); 

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'mainmenu' => esc_html__( 'Main Menu', 'divine-spa-lite' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'divine_spa_lite_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', divine_spa_lite_fonts_url() ) );

}
endif;
add_action( 'after_setup_theme', 'divine_spa_lite_setup' );

/**
 *	Register Fonts
 */
function divine_spa_lite_fonts_url() {
    $divine_spa_lite_font = '';
     
	$raleway = _x( 'on', 'Raleway font: on or off', 'divine-spa-lite' );
	$open_sans = _x( 'on', 'Open Sans font: on or off', 'divine-spa-lite' );
	$dancing = _x( 'on', 'Dancing Script font: on or off', 'divine-spa-lite' );
	 
	if ( 'off' !== $open_sans || 'off' !== $raleway ) {
		$font_families = array();
 
		if ( 'off' !== $raleway ) {
		$font_families[] = 'Raleway:400,100,200,300,500,600,700,800,900';
		}
		 
		if ( 'off' !== $open_sans ) {
		$font_families[] = 'Open Sans:400,300,600,700,800';
		}
		 
		if ( 'off' !== $dancing ) {
		$font_families[] = 'Dancing Script:400,700';
		}
		 
		$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'latin,latin-ext' ),
		);
		$divine_spa_lite_font = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
    return esc_url_raw( $divine_spa_lite_font );
}
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function divine_spa_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'divine_spa_lite_content_width', 640 );
}
add_action( 'after_setup_theme', 'divine_spa_lite_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function divine_spa_lite_scripts() {
	global $post,$divine_spa_lite;
	$divine_spa_lite_opt = new DivineSpaLiteFrameworkOpt();
 	// LOAD FONTS
	 wp_enqueue_style( 'divine-spa-lite-fonts', divine_spa_lite_fonts_url(), array(), '1.0.0' );

	wp_enqueue_style( 'bootstrap', DIVINE_SPA_LITE_CSS . 'bootstrap.min.css' );
	wp_enqueue_style( 'animate', DIVINE_SPA_LITE_CSS . 'animate.css' ); 
	wp_enqueue_style( 'meanmenu', DIVINE_SPA_LITE_CSS . 'meanmenu.min.css' ); 
	wp_enqueue_style( 'font-awesome', DIVINE_SPA_LITE_CSS . 'font-awesome.min.css' ); 
	wp_enqueue_style( 'divine-spa-lite-style', get_stylesheet_uri() );
	wp_enqueue_style( 'divine-spa-lite-responsive', DIVINE_SPA_LITE_CSS . 'responsive.css' ); 

	wp_enqueue_script( 'modernizr', DIVINE_SPA_LITE_JS . 'vendor/modernizr-2.8.3.min.js', array('jQuery'), '2.8.3', false ); 
	wp_enqueue_script( 'bootstrap', DIVINE_SPA_LITE_JS . 'bootstrap.min.js', array('jquery'), '3.3.5', true );
	wp_enqueue_script( 'meanmenu', DIVINE_SPA_LITE_JS . 'jquery.meanmenu.js', array(), '2.0.8', true );  
	wp_enqueue_script( 'divine-spa-lite-main', DIVINE_SPA_LITE_JS . 'main.js', array(), '1.0', true );
	wp_enqueue_script( 'divine-spa-lite-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'divine-spa-lite-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	// inline style css
	$divine_spa_lite_custom_css = "";
    $divine_spa_lite_adv_css = $divine_spa_lite['custom_css']; //E.g. #FF0000

    if(isset($divine_spa_lite['logo-width']) && !empty($divine_spa_lite['logo-width'])){ 
    	$divine_spa_lite_logo_wd = $divine_spa_lite['logo-width'];
        $divine_spa_lite_custom_css .= "
			.main-header-area .logo-area img{
				width:{$divine_spa_lite_logo_wd};
			}
        ";
    }  
    
    $divine_spa_lite_custom_css .= "{$divine_spa_lite_adv_css}";
    wp_add_inline_style( 'divine-spa-lite-style', $divine_spa_lite_custom_css );

}
add_action( 'wp_enqueue_scripts', 'divine_spa_lite_scripts' );
 
/**
 * divine_spa_lite nav menu
 */ 
function divine_spa_lite_main_menu(){
	wp_nav_menu( array(
		'theme_location'    => 'mainmenu',
		'depth'             => 3,
		'container'         => false,
		'menu_id'        	=> '',
		'menu_class'        => '',
		'fallback_cb'       => 'divine_spa_lite_default_menu'
	));
}

/**
 * menu fallback
 */ 
if(is_user_logged_in()):
	function divine_spa_lite_default_menu() {
		?>
	    <ul>                  
	    	<li><a href="<?php echo esc_url(admin_url('nav-menus.php')); ?>"><?php esc_html_e( 'Add Menu', 'divine-spa-lite' ); ?></a></li>
		</ul>
		<?php
	}
endif;
/**
 * DCSF Divine header search form
 */ 
function divine_spa_lite_header_search(){
?>
    <form action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div id="custom-search-input">
            <div class="input-group">
                <input type="text" class="search-query form-control" value="<?php echo get_search_query(); ?>" name="s"  placeholder="Search ..." />
                <span class="input-group-btn">
                    <button class="btn btn-danger" type="submit">
                        <span><i class="fa fa-search" aria-hidden="true"></i></span>
                    </button>
                </span>
            </div>
        </div>
    </form>
<?php
}
/**
 * Divine Spa Lite Pagination.
 */
if ( ! function_exists( 'divine_spa_lite_pagination' ) ){
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 * Based on paging nav function from Twenty Fourteen
	 */ 
	function divine_spa_lite_pagination() {
		// Don't print empty markup if there's only one page.
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return;
		}
		$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$query_args   = array();
		$url_parts    = explode( '?', $pagenum_link );
		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}
		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';
		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';
		// Set up paginated links.
		$links = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $GLOBALS['wp_query']->max_num_pages,
			'current'  => $paged,
			'mid_size' => 3,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => '<i class="fa fa-angle-double-left" aria-hidden="true"></i>',
			'next_text' => '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
			'type'      => 'list',
		) );
		if ( $links ) :
		?>  
		<div class="pagination-area">
		    <?php echo wp_kses($links); ?> 
		</div> 
		<?php
		endif;
	}
}

/**
 * DCSF Divine comment list modify
 */ 
function divine_spa_lite_comments($comment, $args, $depth) { ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>"> 
      <section class="clearfix">
        <figure><?php echo get_avatar( $comment, 120 ); ?></figure>
        <div class="cbox">
          <h4><?php comment_author_link() ?></h4>
          <span><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></span>
          <h6><?php printf( __( '%1$s @ %2$s','divine-spa-lite' ), get_comment_date( '', $comment ), get_comment_time() ); ?></h6>
			<?php if ($comment->comment_approved == '0') : ?>
				<p><em><?php esc_html_e('Your comment is awaiting moderation.','divine-spa-lite'); ?></em></p>
			<?php endif; ?>
	    	<?php comment_text(); ?>
        </div>
      </section>    
<?php } 

/**
 * Comment box title change
 */   
add_filter( 'comment_form_defaults', 'divine_spa_lite_comment_form_allowed_tags' );
function divine_spa_lite_comment_form_allowed_tags( $defaults ) { 
	$defaults['title_reply'] =  esc_html__( 'Leave Your Comment','divine-spa-lite' );
	$defaults['comment_notes_before'] =  '';
	$defaults['title_reply_before'] =  '<h3>';
	$defaults['title_reply_after'] =  '</h3>';
    $defaults['comment_field'] = '';
	$defaults['label_submit'] =  esc_html__( 'Submit','divine-spa-lite' ); 
	return $defaults;
}
/**
 * Comment form field order
 */   
add_action( 'comment_form_after_fields', 'divine_spa_lite_add_textarea' );
add_action( 'comment_form_logged_in_after', 'divine_spa_lite_add_textarea' );
function divine_spa_lite_add_textarea()
{
    echo '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="Your Comment*" cols="45" rows="8" maxlength="65525"  required="required"></textarea></p>';
}
/**
 * remove comment fields
 */  
function divine_spa_lite_remove_comment_fields($fields) {
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
    unset($fields['url']);
    $fields['author'] = '<p class="comment-form-author"> <input id="author" placeholder="Name*" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' /></p>';
    $fields['email'] = '<p class="comment-form-email"><input id="email" placeholder="Email*" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></p>';
    return $fields;
}
add_filter('comment_form_default_fields','divine_spa_lite_remove_comment_fields');
 
   
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function divine_spa_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'divine-spa-lite' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'divine-spa-lite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget', 'divine-spa-lite' ),
		'id'            => 'sidebar-f',
		'description'   => esc_html__( 'Add widgets here.', 'divine-spa-lite' ),
		'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 col-sm-3 col-xs-12 %2$s"><div class="single-footer">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'divine_spa_lite_widgets_init' );


/**
 *  Divine Spa Lite BreadCrumb
 */ 
function divine_spa_lite_breadcrumb(){
	global $post,$dcsf_divine;	
	if(isset($dcsf_divine['blog-title'])){
		$dcsf_divine_blog_title=  $dcsf_divine['blog-title'];
	}else{
		$dcsf_divine_blog_title=  esc_html__('Blog','divine-spa-lite');
	} 

	if(is_front_page() && is_home()){ 
		echo esc_html($dcsf_divine_blog_title); 

	}elseif(is_home() || is_page()){ 
	    if( is_page() && ''!=get_post_meta($post->ID,'_dcsf_divine_page_banner_title',true)){
	        $dcsf_divine_ptitle = get_post_meta($post->ID,'_dcsf_divine_page_banner_title',true); 
		}else{
			$dcsf_divine_ptitle =  get_the_title( get_option('page_for_posts', true) );
		}
	  echo esc_html($dcsf_divine_ptitle);
	}elseif(is_single()){
		if(isset($dcsf_divine['single-title']) && (''!=$dcsf_divine['single-title'])){
			printf( '<span>' . $dcsf_divine['single-title'] . '</span>' ); 
		}else{
			the_title();
		}  
	}elseif(is_search()){
		if(isset($dcsf_divine['srch-title']) && (''!=$dcsf_divine['srch-title'])){
			printf( '<span>' . $dcsf_divine['srch-title'] . '</span>' ); 
		}else{
			printf( '<span>' . get_search_query() . '</span>' );
		}  
	}elseif(is_category() || is_tag()) {
		if(isset($dcsf_divine['archv-title']) && (''!=$dcsf_divine['archv-title'])){
			printf($dcsf_divine['archv-title']); 
		}else{
			single_cat_title("", true); 
		}  
	}elseif(is_archive()){ 
		if(isset($dcsf_divine['archv-title']) && (''!=$dcsf_divine['archv-title'])){
			printf($dcsf_divine['archv-title']); 
		}else{
	 		if ( class_exists('WooCommerce' ) ){ if(is_shop() || is_product_category() || is_product_tag() ){ woocommerce_page_title(); }else{ echo get_the_date('F Y'); } }else{ echo get_the_date('F Y'); } 
		}   
	}elseif(is_404()){ esc_html_e('404 Error','divine-spa-lite');}else{ the_title();}
}



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
require get_template_directory() . '/inc/divine-framework-options.php'; 
 
// woocommerce min cart
function divine_spa_lite_woocommere_min_cart(){
	global $woocommerce;
?> 
 <span class="acart"> <a href="<?php echo esc_url(home_url('/').'cart/'); ?>"> <i class="fa fa-shopping-cart fa-lg"></i><b><?php if ( class_exists( 'WooCommerce' ) ) { echo $woocommerce->cart->cart_contents_count; }else{ echo '0'; } ?></b></a> </span>
<?php 
}

// product item count with ajax
add_filter( 'woocommerce_add_to_cart_fragments', 'divine_spa_lite_woocommerce_header_add_to_cart_fragment' );
function divine_spa_lite_woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
	ob_start();
	?>
 <span class="acart"> <a href="<?php echo esc_url(home_url('/').'cart/'); ?>"> <i class="fa fa-shopping-cart fa-lg"></i><b><?php if ( class_exists( 'WooCommerce' ) ) { echo $woocommerce->cart->cart_contents_count; }else{ echo '0'; } ?></b></a> </span>
	<?php
	$fragments['span.acart'] = ob_get_clean();
	return $fragments;
}
