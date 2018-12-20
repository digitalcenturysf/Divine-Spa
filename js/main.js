(function ($) {
 "use strict";
$("#dcsf_search .modal-dialog i.fa,#dcsf-appoinment .modal-dialog i.fa").click(function(){
	$('#dcsf_search').modal('hide');
	$('#dcsf-appoinment').modal('hide');
});
// single prooduct image tabs
$(".productDetailBx .images .thumbnails .first").click(function(e){
	e.preventDefault();
	var gurl = $(this).find('img').attr('src');
	$(".productDetailBx .images .woocommerce-main-image img").attr('src',gurl);
});
// single product tabs
$('.productTab-area .nav-tabs li:first-child').addClass('active');
$('.productTab-area .tab-content .tab-pane:first-child').addClass('active in');
$('.productTab-area #commentform p.comment-form-rating').prependTo(".productTab-area #commentform");
// single latest product 
$('.productArrival-area .slider .carousel-inner .item:first-child').addClass('active'); 

// pagination  
$(".pagination-area ul.page-numbers span.current").replaceWith('<a href="#" class="active">' + $(".pagination-area ul.page-numbers span.current").html() + "</a>"); 
$('.pagination-area ul.page-numbers').addClass('pagination pagination-lg');
// accordion
$('.faq-area .panel-group .panel:first-child .panel-collapse').addClass('in'); 
$('.faq-area .panel-group .panel:first-child .panel-title a').removeClass('collapsed');

// testimonial 2
$('.home2-testimonial-area .carousel-indicators li:first-child').addClass('active');  
$('.home2-testimonial-area .carousel-inner .item:first-child').addClass('active');  

// widget search
$(".widget_search form.search-form .search-field").unwrap(); 
$(".widget_search form.search-form span.screen-reader-text").remove();
$(".widget_search form.search-form .search-submit").remove(); 
$(".widget_search form.search-form .search-field").attr("placeholder","Search ...");
// footer widget
$('.footer-top-area .divine_spa_lite_working_hours .single-footer').addClass('footer-two');
$('.footer-top-area .divine_spa_lite_instagram .single-footer').addClass('footer-four');
$('.footer-top-area .divine_spa_lite_address .single-footer').addClass('footer-three');
// single post comment
$(".blog-single-area ol.comment-list li .comment-reply-link").prepend('<i class="fa fa-reply"></i> ');
$(".comment-respond").addClass('blog-comment-bx');
$(".comment-form-author").replaceWith('<div class="col-lg-6 col-md-6">' + $(".comment-form-author").html() + "</div>"); 
$(".comment-form-email").replaceWith('<div class="col-lg-6 col-md-6">' + $(".comment-form-email").html() + "</div>"); 
$('.comment-respond.blog-comment-bx #author,.comment-respond.blog-comment-bx #email,.comment-respond.blog-comment-bx #comment').addClass('form-control');
$(".comment-respond.blog-comment-bx .col-lg-6.col-md-6").wrapAll("<div class=\"row\"></div>");
$(".comment-respond.blog-comment-bx .row").wrapAll("<div class=\"form-group\"></div>");
$(".comment-form-comment").replaceWith('<div class="form-group">' + $(".comment-form-comment").html() + "</div>");  
$(".comment-respond.blog-comment-bx #submit").unwrap();

// widget recent post , category, archive , recent comments
$(".widget_pages ul li a,.widget_recent_entries ul li a,.widget_categories ul li a,.widget_archive ul li a,.widget_recent_comments ul li .comment-author-link,.widget_meta ul li a,#menu-testing-menu li a").prepend('<i class="fa fa-angle-right"></i>'); 
$(".services-list-area section figure.hover").hide();
$(".services-list-area section").hover(function(){
    $("figure.hvr", this).hide();
    $("figure.hover", this).show();
    }, function(){
    $("figure.hvr", this).show();
    $("figure.hover", this).hide();
});

$('.checkout-content-area .billing-details-area form.woocommerce-checkout input[type="text"],.checkout-content-area .billing-details-area form.woocommerce-checkout .input-text').addClass('form-control');
// add to cart button
    $(".home-product-area.woocommerce .social-media-icons a.add_to_cart_button,.shop-product .product-overlay a.button").click(function() {  
    	$(this).find("i").removeClass("fa-shopping-cart").addClass("fa-check-square");    
    })
$(".home-product-area.woocommerce .social-media-icons ul li a:first-child, .shop-product .product-overlay .butn .crt a.emp").remove();
 
/*---------------------------- 
 Modal 
------------------------------ */
$('.thumbnail').click(function(){
      $('.modal-body').empty();
  	var title = $(this).parent('a').attr("title");
  	$('.modal-title').html(title);
  	$($(this).parents('div').html()).appendTo('.modal-body');
  	$('#myModal').modal({show:true});
});
 

/*--------------------------
 scrollUp
---------------------------- */	
$(document).ready(function(){
	
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
});
/*----------------------------
 jQuery MeanMenu
------------------------------ */
	jQuery('nav#dropdown').meanmenu();	
	 
/*----------------------------
 price-slider active
------------------------------ */  
	  $( "#slider-range" ).slider({
	   range: true,
	   min: 40,
	   max: 600,
	   values: [ 60, 570 ],
	   slide: function( event, ui ) {
		$( "#amount" ).val( "£" + ui.values[ 0 ] + " - £" + ui.values[ 1 ] );
	   }
	  });
	  $( "#amount" ).val( "£" + $( "#slider-range" ).slider( "values", 0 ) +
	   " - £" + $( "#slider-range" ).slider( "values", 1 ) );  
	   
/*--------------------------
 scrollUp
---------------------------- */	
	$.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    }); 

/*------------------------------- 
 Product modal 
---------------------------------*/  
/* when product quantity changes, update quantity attribute on add-to-cart button */
$("form.cart").on("change", "input.qty", function() {
    if (this.value === "0")
        this.value = "1";
 
    $(this.form).find("button[data-quantity]").data("quantity", this.value);
});  
$("button.cmn-btn1").click(function(){ 
	setTimeout(function(){
	$("p.notf").fadeIn().fadeOut(3000); 
	},500); 
}); 
jQuery( function( $ ) { 
  // Quantity buttons
  $( '.spd div.qty-bx:not(.buttons_added), td.qty-bx:not(.buttons_added)' ).addClass( 'buttons_added' ).append( '<input type="button" value="+" class="plus" />' ).prepend( '<input type="button" value="-" class="minus" />' ); 
 
  $( document ).on( 'click', '.plus, .minus', function() {  
    var $qty    = $( this ).closest( '.qty-bx' ).find( '.qty' ), 
      currentVal  = parseFloat( $qty.val() ), 
      max     = parseFloat( $qty.attr( 'max' ) ), 
      min     = parseFloat( $qty.attr( 'min' ) ), 
      step    = $qty.attr( 'step' ); 
    // Format values 
    if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
    if ( max === '' || max === 'NaN' ) max = '';
    if ( min === '' || min === 'NaN' ) min = 0;
    if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;
    // Change the value
    if ( $( this ).is( '.plus' ) ) {
      if ( max && ( max == currentVal || currentVal > max ) ) {
        $qty.val( max );
      } else {
        $qty.val( currentVal + parseFloat( step ) );
      }
    } else {
      if ( min && ( min == currentVal || currentVal < min ) ) {
        $qty.val( min );
      } else if ( currentVal > 0 ) {
        $qty.val( currentVal - parseFloat( step ) );
      }
    }
    // Trigger change event
    $qty.trigger( 'change' );
  });
});
 
})(jQuery); 