<?php 
class DivineSpaLiteFrameworkOpt{
    // logo
    public function divine_spa_lite_logo(){
        global $divine_spa_lite;
        if((isset($divine_spa_lite['logo-up']['url'])) && !empty($divine_spa_lite['logo-up']['url'])){
            return $divine_spa_lite['logo-up']['url'];
        }else{
            return get_template_directory_uri()."/img/logo.png";
        } 
    } 
    // top header
    public function divine_spa_lite_topHeader(){
        global $post,$divine_spa_lite;   
        if(is_page()){
            $divine_spa_lite_topHdr = get_post_meta($post->ID,'_divine_spa_lite_top_header',true);
            if($divine_spa_lite_topHdr=='yes'){ 
                $divine_spa_lite_phn = (isset($divine_spa_lite['phone-txt'])) ? $divine_spa_lite['phone-txt'] : '';
                $divine_spa_lite_mail = (isset($divine_spa_lite['email-txt'])) ? $divine_spa_lite['email-txt'] : '';
                $divine_spa_lite_time = (isset($divine_spa_lite['available-txt'])) ? $divine_spa_lite['available-txt'] : '';
                $divine_spa_lite_fb = (isset($divine_spa_lite['dv-fb'])) ? $divine_spa_lite['dv-fb'] : '';
                $divine_spa_lite_tw = (isset($divine_spa_lite['dv-tw'])) ? $divine_spa_lite['dv-tw'] : '';
                $divine_spa_lite_gp = (isset($divine_spa_lite['dv-gp'])) ? $divine_spa_lite['dv-gp'] : '';
                $divine_spa_lite_pn = (isset($divine_spa_lite['dv-pin'])) ? $divine_spa_lite['dv-pin'] : '';
                $divine_spa_lite_ld = (isset($divine_spa_lite['dv-ld'])) ? $divine_spa_lite['dv-ld'] : '';
                ?>
                  <div class="header-top-area">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="header-top-left">
                            <ul>
                              <li><i class="fa fa-phone fa-lg" aria-hidden="true"></i><?php echo esc_html($divine_spa_lite_phn); ?></li>
                              <li><i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i><?php echo esc_html($divine_spa_lite_mail); ?></li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="header-top-right">
                            <ul>
                                <li><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo esc_html($divine_spa_lite_time); ?></li>
                                <li> 
                                    <?php if($divine_spa_lite_fb != ''): ?>
                                        <a href="<?php echo esc_url($divine_spa_lite_fb); ?>"><i class="fa fa-facebook"></i></a> 
                                    <?php endif; ?>
                                    <?php if($divine_spa_lite_tw != ''): ?>
                                        <a href="<?php echo esc_url($divine_spa_lite_tw); ?>"><i class="fa fa-twitter"></i></a> 
                                    <?php endif; ?>
                                    <?php if($divine_spa_lite_gp != ''): ?>
                                        <a href="<?php echo esc_url($divine_spa_lite_gp); ?>"><i class="fa fa-google-plus"></i></a> 
                                    <?php endif; ?>
                                    <?php if($divine_spa_lite_ld != ''): ?>
                                        <a href="<?php echo esc_url($divine_spa_lite_ld); ?>"><i class="fa fa-linkedin"></i></a>
                                    <?php endif; ?>
                                    <?php if($divine_spa_lite_pn != ''): ?> 
                                        <a href="<?php echo esc_url($divine_spa_lite_pn); ?>"><i class="fa fa-pinterest"></i></a>
                                    <?php endif; ?> 
                                </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
            }else{
                //
            }
        }else{ 
            if((isset($divine_spa_lite['tophd-switch'])) && ($divine_spa_lite['tophd-switch']==1)){
                $divine_spa_lite_phn = (isset($divine_spa_lite['phone-txt'])) ? $divine_spa_lite['phone-txt'] : '';
                $divine_spa_lite_mail = (isset($divine_spa_lite['email-txt'])) ? $divine_spa_lite['email-txt'] : '';
                $divine_spa_lite_time = (isset($divine_spa_lite['available-txt'])) ? $divine_spa_lite['available-txt'] : '';
                $divine_spa_lite_fb = (isset($divine_spa_lite['dv-fb'])) ? $divine_spa_lite['dv-fb'] : '';
                $divine_spa_lite_tw = (isset($divine_spa_lite['dv-tw'])) ? $divine_spa_lite['dv-tw'] : '';
                $divine_spa_lite_gp = (isset($divine_spa_lite['dv-gp'])) ? $divine_spa_lite['dv-gp'] : '';
                $divine_spa_lite_pn = (isset($divine_spa_lite['dv-pin'])) ? $divine_spa_lite['dv-pin'] : '';
                $divine_spa_lite_ld = (isset($divine_spa_lite['dv-ld'])) ? $divine_spa_lite['dv-ld'] : '';
                ?>
                  <div class="header-top-area">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="header-top-left">
                            <ul>
                              <li><i class="fa fa-phone fa-lg" aria-hidden="true"></i><?php echo esc_html($divine_spa_lite_phn); ?></li>
                              <li><i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i><?php echo esc_html($divine_spa_lite_mail); ?></li>
                            </ul>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                          <div class="header-top-right">
                            <ul>
                                <li><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo esc_html($divine_spa_lite_time); ?></li>
                                <li> 
                                    <?php if($divine_spa_lite_fb != ''): ?>
                                        <a href="<?php echo esc_url($divine_spa_lite_fb); ?>"><i class="fa fa-facebook"></i></a> 
                                    <?php endif; ?>
                                    <?php if($divine_spa_lite_tw != ''): ?>
                                        <a href="<?php echo esc_url($divine_spa_lite_tw); ?>"><i class="fa fa-twitter"></i></a> 
                                    <?php endif; ?>
                                    <?php if($divine_spa_lite_gp != ''): ?>
                                        <a href="<?php echo esc_url($divine_spa_lite_gp); ?>"><i class="fa fa-google-plus"></i></a> 
                                    <?php endif; ?>
                                    <?php if($divine_spa_lite_ld != ''): ?>
                                        <a href="<?php echo esc_url($divine_spa_lite_ld); ?>"><i class="fa fa-linkedin"></i></a>
                                    <?php endif; ?>
                                    <?php if($divine_spa_lite_pn != ''): ?> 
                                        <a href="<?php echo esc_url($divine_spa_lite_pn); ?>"><i class="fa fa-pinterest"></i></a>
                                    <?php endif; ?> 
                                </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
            }
            else{
              //
            }
        }
    } 
    // Page Banner image 
    function divine_spa_lite_page_banner(){
        global $post,$divine_spa_lite;
        if(is_page()){
            if( null != get_post_meta($post->ID,'_divine_spa_lite_page_banner',true) ){
                return get_post_meta($post->ID,'_divine_spa_lite_page_banner',true);
            }else{
                return get_template_directory_uri()."/img/banner-about.jpg";
            }
        }elseif(is_archive() || is_category() || is_tag()){
            if((isset($divine_spa_lite['archv-banner']['url'])) && !empty($divine_spa_lite['archv-banner']['url'])){
                return $divine_spa_lite['archv-banner']['url'];
            }else{
                return get_template_directory_uri()."/img/banner-about.jpg";
            }   
        }elseif(is_search() ){
            if((isset($divine_spa_lite['srch-banner']['url'])) && !empty($divine_spa_lite['srch-banner']['url'])){
                return $divine_spa_lite['srch-banner']['url'];
            }else{
                return get_template_directory_uri()."/img/banner-about.jpg";
            }   
        }elseif(is_single() ){
            if((isset($divine_spa_lite['single-banner']['url'])) && !empty($divine_spa_lite['single-banner']['url'])){
                return $divine_spa_lite['single-banner']['url'];
            }else{
                return get_template_directory_uri()."/img/banner-about.jpg";
            }   
        }else{
            if((isset($divine_spa_lite['blog-banner']['url'])) && !empty($divine_spa_lite['blog-banner']['url'])){
                return $divine_spa_lite['blog-banner']['url'];
            }else{
                return get_template_directory_uri()."/img/banner-about.jpg";
            }   
        } 
    }
    // Enable Banner image 
    function divine_spa_lite_enable_banner(){
        global $post,$divine_spa_lite;
        if(is_archive() || is_category() || is_tag()){
            if(isset($divine_spa_lite['archive-enable'])){
                return $divine_spa_lite['archive-enable'];
            }else{
                return true;
            }   
        }elseif(is_search() ){
            if(isset($divine_spa_lite['search-enable'])){
                return $divine_spa_lite['search-enable'];
            }else{
                return true;
            }   
        }elseif(is_single() ){
            if(isset($divine_spa_lite['single-enable'])){
                return $divine_spa_lite['single-enable'];
            }else{
                return true;
            }   
        }else{
            if(isset($divine_spa_lite['blog-enable'])){
                return $divine_spa_lite['blog-enable'];
            }else{
                return true;
            }   
        } 
    }
    // blog sidebar options
    public function divine_spa_lite_blogSidebar(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['blog-sidebar']) ){
            return $divine_spa_lite['blog-sidebar'];
        }else{
            return "right";
        }
 
    }
    // archive sidebar options
    public function divine_spa_lite_archiveSidebar(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['archv-sidebar']) ){
            return $divine_spa_lite['archv-sidebar'];
        }else{
            return "right";
        }
 
    }
    // search sidebar options
    public function divine_spa_lite_searchSidebar(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['srch-sidebar']) ){
            return $divine_spa_lite['srch-sidebar'];
        }else{
            return "right";
        }
 
    }
    // single sidebar options
    public function divine_spa_lite_singlepostSidebar(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['single-sidebar']) ){
            return $divine_spa_lite['single-sidebar'];
        }else{
            return "right";
        }
 
    }
    // footer social icons
    public function divine_spa_lite_footer_social(){
        global $divine_spa_lite;  
        if ( class_exists( 'Redux' ) ) { 
            echo "<ul>";
                if(isset($divine_spa_lite['footer-fb']) && !empty($divine_spa_lite['footer-fb'])){
                    echo '<li><a href="'.esc_url($divine_spa_lite['footer-fb']).'"><i class="fa fa-facebook"></i></a></li>';
                }
                if(isset($divine_spa_lite['footer-tw']) && !empty($divine_spa_lite['footer-tw'])){
                    echo '<li><a href="'.esc_url($divine_spa_lite['footer-tw']).'"><i class="fa fa-twitter"></i></a></li>';
                } 
                if(isset($divine_spa_lite['footer-gp']) && !empty($divine_spa_lite['footer-gp'])){
                    echo '<li><a href="'.esc_url($divine_spa_lite['footer-gp']).'"><i class="fa fa-google-plus"></i></a></li>';
                }
                if(isset($divine_spa_lite['footer-yt']) && !empty($divine_spa_lite['footer-yt'])){
                    echo '<li><a href="'.esc_url($divine_spa_lite['footer-yt']).'"><i class="fa fa-youtube"></i></a></li>';
                }
                if(isset($divine_spa_lite['footer-ld']) && !empty($divine_spa_lite['footer-ld'])){
                    echo '<li><a href="'.esc_url($divine_spa_lite['footer-ld']).'"><i class="fa fa-linkedin"></i></a></li>';
                } 
            echo "</ul>";
        }else{ ?>
            <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        <?php }
    }
    // copyright text
    public function divine_spa_lite_copyright_text(){
        global $divine_spa_lite;  
        $url1 =  esc_url('https://digitalcenturysf.com/');
        $url2 =  esc_url('https://digitalcenturysf.com/templates/'); 
        $text =  esc_html__('WordPress Themes','divine-spa-lite');
        $text2 =  esc_html__('WordPress Templates','divine-spa-lite');
        printf( '<p><a href="%s">%s</a> Powered by <a class="credits" href="%s">%s</a></p>', esc_url($url1), esc_html($text), esc_url($url2), esc_html($text2) );
    }  
    // payment logo
    public function divine_spa_lite_paymentLogo(){
        global $divine_spa_lite;
        if((isset($divine_spa_lite['payment']['url'])) && !empty($divine_spa_lite['payment']['url'])){
            return $divine_spa_lite['payment']['url'];
        }else{
            return get_template_directory_uri()."/img/payment-method.png";
        } 
    } 
    // google api key
    public function divine_spa_lite_map_api(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['map-api']) && !empty($divine_spa_lite['map-api'])){ 
            return $divine_spa_lite['map-api'];
        }else{
            return "AIzaSyCYI9QbpcEgmUSfnoBplXycjesknwlFW-w";
        }
    } 
    // google latitude
    public function divine_spa_lite_map_lat(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['latitude']) && !empty($divine_spa_lite['latitude'])){ 
            return $divine_spa_lite['latitude'];
        }else{
            return "38.899265";
        }
    } 
    // google longitude
    public function divine_spa_lite_map_long(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['longitude']) && !empty($divine_spa_lite['longitude'])){ 
            return $divine_spa_lite['longitude'];
        }else{
            return "-77.1546508";
        }
    } 
    // google map zoom
    public function divine_spa_lite_map_zoom(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['zoom']) && !empty($divine_spa_lite['zoom'])){ 
            return $divine_spa_lite['zoom'];
        }else{
            return 15;
        }
    } 
    // menu selection
    public function divine_spa_lite_menu_select(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['menu-type']) && !empty($divine_spa_lite['menu-type'])){ 
            return $divine_spa_lite['menu-type'];
        }else{
            return 'd';
        }
    }   
    // single tour form title
    public function divine_spa_lite_tour_form_title(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['tm-form-title']) && !empty($divine_spa_lite['tm-form-title'])){ 
            return $divine_spa_lite['tm-form-title'];
        }else{
            return esc_html__("Tour Booking","divine-spa-lite");
        }
    } 
    public function divine_spa_lite_tour_form_yes(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['tm-form-yes']) && !empty($divine_spa_lite['tm-form-yes'])){ 
            return 0;
        }else{
            return 1;
        }
    } 
    // single tour tags title
    public function divine_spa_lite_tour_tags_title(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['tm-tags-title']) && !empty($divine_spa_lite['tm-tags-title'])){ 
            return $divine_spa_lite['tm-tags-title'];
        }else{
            return esc_html__('Tour Tags','divine-spa-lite');
        }
    }
    public function divine_spa_lite_tour_tags_yes(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['tm-tags-yes']) && !empty($divine_spa_lite['tm-tags-yes'])){ 
            return 0;
        }else{
            return 1;
        }
    } 
    // form fileds display 
    public function divine_spa_lite_booking_fileds_name(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['tm-form-name']) && !empty($divine_spa_lite['tm-form-name'])){ 
            return 0;
        }else{
            return 1;
        }
    }
    public function divine_spa_lite_booking_fileds_email(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['tm-form-email']) && !empty($divine_spa_lite['tm-form-email'])){ 
            return 0;
        }else{
            return 1;
        }
    } 
    public function divine_spa_lite_booking_fileds_phn(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['tm-form-phn']) && !empty($divine_spa_lite['tm-form-phn'])){ 
            return 0;
        }else{
            return 1;
        }
    } 
    public function divine_spa_lite_booking_fileds_sdt(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['tm-form-sdt']) && !empty($divine_spa_lite['tm-form-sdt'])){ 
            return 0;
        }else{
            return 1;
        }
    }   
    public function divine_spa_lite_booking_fileds_edt(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['tm-form-edt']) && !empty($divine_spa_lite['tm-form-edt'])){ 
            return 0;
        }else{
            return 1;
        }
    }  
    public function divine_spa_lite_booking_fileds_adult(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['tm-form-adult']) && !empty($divine_spa_lite['tm-form-adult'])){ 
            return 0;
        }else{
            return 1;
        }
    }  
    public function divine_spa_lite_booking_fileds_child(){
        global $divine_spa_lite;  
        if(isset($divine_spa_lite['tm-form-child']) && !empty($divine_spa_lite['tm-form-child'])){ 
            return 0;
        }else{
            return 1;
        }
    }  
    public function divine_spa_lite_call_to_action(){
        global $post,$divine_spa_lite;  
        $divine_spa_lite_msg =  (isset($divine_spa_lite['ctabtext'])) ? $divine_spa_lite['ctabtext'] : '';
        $divine_spa_lite_phn = (isset($divine_spa_lite['ctabphn'])) ? $divine_spa_lite['ctabphn'] : ''; 
        if(is_page()){
            $divine_spa_lite_call2ac = get_post_meta($post->ID,'_divine_spa_lite_callto_style',true);
            if($divine_spa_lite_call2ac=='yes'){ 
                 ?>
                <div class="home-call-area">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-5 col-md-5"></div>
                      <div class="col-lg-7 col-md-7">
                        <p><?php echo esc_html( $divine_spa_lite_msg); ?></p>
                        <p><span><i class="fa fa-phone"></i></span><?php echo esc_html($divine_spa_lite_phn); ?></p>
                      </div>
                    </div>
                  </div>
                </div>        
                 <?php
            }else{
                //
            }
        }else{
            if(isset($divine_spa_lite['fthhd-switch']) && (1 == $divine_spa_lite['fthhd-switch'])){ 
                 ?>
                <div class="home-call-area">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-5 col-md-5"></div>
                      <div class="col-lg-7 col-md-7">
                        <p><?php echo esc_html($divine_spa_lite_msg); ?></p>
                        <?php if(!empty($divine_spa_lite_phn)): ?>
                            <p><span><i class="fa fa-phone"></i></span><?php echo esc_html($divine_spa_lite_phn); ?></p>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>        
                 <?php
            }else{
                //
            }
        }
 
    }  
    // slider options
    function divine_spa_lite_slider_autoplay_1(){
        global $divine_spa_lite;
        if(!empty($divine_spa_lite['slide-autoplay']) && (1==$divine_spa_lite['slide-autoplay'])){
            return false;
        }else{
            return true;
        } 
    }
    function divine_spa_lite_slider_effect_1(){
        global $divine_spa_lite;
        if(isset($divine_spa_lite['slide-effect'])){
            return $divine_spa_lite['slide-effect'];
        }else{
            return "slideInRight";
        } 
    }
    function divine_spa_lite_slider_speed_1(){
        global $divine_spa_lite;
        if(!empty($divine_spa_lite['slide-speed'])){
            return $divine_spa_lite['slide-speed'];
        }else{
            return 500;
        } 
    }
    function divine_spa_lite_slider_autoplay_2(){
        global $divine_spa_lite;
        if(!empty($divine_spa_lite['slide-autoplay-2']) && (1==$divine_spa_lite['slide-autoplay-2'])){
            return false;
        }else{
            return true;
        } 
    }
    function divine_spa_lite_slider_effect_2(){
        global $divine_spa_lite;
        if(isset($divine_spa_lite['slide-effect-2'])){
            return $divine_spa_lite['slide-effect-2'];
        }else{
            return "slideInRight";
        } 
    }
    function divine_spa_lite_slider_speed_2(){
        global $divine_spa_lite;
        if(!empty($divine_spa_lite['slide-speed-2'])){
            return $divine_spa_lite['slide-speed-2'];
        }else{
            return 500;
        } 
    }
    // search icon on header menu
    function divine_spa_lite_search_icon(){
        global $divine_spa_lite;
        if(isset($divine_spa_lite['srch-ico'])){
            return $divine_spa_lite['srch-ico'];
        }else{
            return 0;
        } 
    }
    // appoinment modal
    function divine_spa_lite_appoinment_modal(){
        global $divine_spa_lite; 
        $divine_spa_lite_mtitle = (isset($divine_spa_lite['modaltitle'])) ? $divine_spa_lite['modaltitle'] : '';
        $divine_spa_lite_ftitle = (isset($divine_spa_lite['mformtitle'])) ? $divine_spa_lite['mformtitle'] : '';
        $divine_spa_lite_fid = (isset($divine_spa_lite['mformid'])) ? $divine_spa_lite['mformid'] : '';
         
        ?>
        <div id="dcsf-appoinment" class="modal fade">
          <div class="modal-dialog"> 
            <i class="fa fa-times"></i>
            <div class="home-callback-area">
                <div class="call-back-form">
                  <h2><?php echo esc_html($divine_spa_lite_mtitle); ?></h2>
                  <?php echo do_shortcode('[contact-form-7 id="'.$divine_spa_lite_fid.'" title="'.$divine_spa_lite_ftitle.'"]'); ?>
                </div>
            </div>
          </div>
        </div>
        <?php
    }

 
}
