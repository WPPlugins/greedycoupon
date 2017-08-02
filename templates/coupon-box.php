<?php 
if ( ! defined( 'ABSPATH' ) ) {
          header( 'Status: 403 Forbidden' );
          header( 'HTTP/1.1 403 Forbidden' );
          exit;
      } // Exit if accessed directly
function gd_coupon_box_display($atts,$gd_coupon_box){
	$gd_coupon_box_count=$atts['box'];
	$gd_coupon_box_ids=$atts['id'];
	if(!empty($gd_coupon_box_ids)){
		$post_in='p';
		 $post_value = $gd_coupon_box_ids;
	}else{
$post_in='posts_per_page';
$post_value =$gd_coupon_box_count;
}
$args = array(
$post_in=>$post_value,
'post_type'=>'greedycoupon',
'post_status'=>'publish',
'order'=>'DSC'
);
query_posts( $args );
// The Loop
while ( have_posts() ) : the_post();
 global $post;
// The Query
$the_query = new WP_Query( $args );
//Review Post Meta Value
$rzilla_hosting_name=get_post_meta($post->ID, 'rzilla_hosting_name', true);
?>


<div class="review_box_out">
<div class="review_box" style="height: inherit;padding: 0px;">
	<div style="width:100%;max-height: 100px;height: 90px;overflow:hidden">
<img style="border:0px;background-color:transparent;margin:0px 10px;padding: 10px;width: 90%;" src="<?php echo the_post_thumbnail_url('medium');?>">
</div>
<div align="center">
  <div class="rz-review-rating-circle">  
<meta itemprop="bestRating" content="10"/>
<div class="rz-review-rating" itemprop="ratingValue">
<?php echo $overall_rating;?>
</div>
<div class="rz-review-badge">
<?php echo$overall_rating_stars;?>
</div>
</div>
<span class="rz-review" style="height: 50px;">
<span class="rz-review-rating-text">Overall Rating</span>
</span>
</div>
<div style="float: left;width: 100%;text-align: -webkit-center;border-bottom: 200px solid #333;border-left:0px" class="rz-review-features-rating">

</div>
   <div  style="background-color: #333;padding: 10px;"><a href="<?php the_permalink();?>" class="btn btn-large red">Read Review <i class="fa fa-arrow-circle-right"></i></a></div>
   </div></div>
<?php 
endwhile;
// Reset Query
wp_reset_query();
?>
<?php
return $gd_coupon_box;
}
add_shortcode('gd_coupon_box','gd_coupon_box_display');
?>