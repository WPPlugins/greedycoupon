<?php 
if ( ! defined( 'ABSPATH' ) ) {
          header( 'Status: 403 Forbidden' );
          header( 'HTTP/1.1 403 Forbidden' );
          exit;
      } // Exit if accessed directly
function gd_recent_coupon_display($atts, $gd_recent_coupon){
	if(!empty($atts)){
	$gd_coupon_bg=$atts['bg'];
	}
	?>   
<h3 class="recent_coupon_heading">Featured Coupons</h3>
<hr class="gradient"> 
	<div id="coupon-carousel" class="coupon-carousel <?php if($gd_coupon_bg=='dark'){echo 'bg_dark';}?>">
<?php
global $post;
$args = array('posts_per_page' =>10,'post_type'  => 'greedycoupon','post_status'    => 'publish',
    'order'    => 'DSC'
);
$postslist = get_posts( $args );
foreach ( $postslist as $post ) :
  setup_postdata( $post ); 
  $post_id=get_post_meta($post->ID,'post_id',true);
  ?> 
  <div class="coupon-carousel-item">
    <div class="coupon-carousel-img" <?php if($gd_coupon_bg=='dark'){echo 'style="border: 2px dashed #ffffff;"';}?>>
        <a href="<?php echo get_the_permalink();?>"><img src="<?php the_post_thumbnail_url('medium')?>" alt="<?php $user_review_post_title = explode(' ', get_the_title(), 3); echo $user_review_post_title[0]; ?> Coupon logo"/></a>
    </div>
        <h4><?php $user_review_post_title = explode(' ', get_the_title(), 3);
		echo $user_review_post_title[0]; ?></h4>
        </div>
<?php
endforeach; 
wp_reset_postdata();
?>
    </div>
    <script type="text/javascript">
                jQuery(document).ready(function() {
                    jQuery("#coupon-carousel").gdcCarousel({
                        nav : true, // Show next and prev buttons
                        navText : ['<img src="<?php echo GRD_PLUGIN_URL;?>assets/images/arrow-left.png">','<img src="<?php echo GRD_PLUGIN_URL;?>assets/images/arrow-right.png">'],
                        //pagination : true,
                        //paginationNumbers: true,
                        slideSpeed : 300,
                        paginationSpeed : 400,
                        rewindNav: true,
                        //singleItem: false,
                        autoPlay: true,
                        stopOnHover: true,
                        // "singleItem:true" is a shortcut for:
                        items : 5,
                        //itemsDesktop : 5,
                        itemsDesktopSmall : 4,
                        //itemsTablet: 3,
                        itemsMobile : 2
                    });
                });
            </script>
    
<?php
return $gd_recent_coupon;
}
add_shortcode('gd_coupon_carousel','gd_recent_coupon_display');
?>