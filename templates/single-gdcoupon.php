<?php
if ( ! defined( 'ABSPATH' ) ) {
          header( 'Status: 403 Forbidden' );
          header( 'HTTP/1.1 403 Forbidden' );
          exit;
      } // Exit if accessed directly
/*
Template Name: Coupon template
*/
	global $post;
	$coupons=get_post_meta($post->ID, 'coupons_code', true);
		if(strlen($coupons)>5){
			$coupons=json_decode($coupons,true);
		}
	$aff_link=get_post_meta($post->ID, 'coupon_affiliate_link', true);
	$gd_hide_theme_header=get_option('gd_hide_theme_header');
	if($gd_hide_theme_header=='on'){
		wp_head();
		wp_nav_menu();
	}else{
	get_header(); 
	}
	?>
     <div class="clear"></div>
<div id="coupon-wrapper">	
<div class="coupon-container">
<article <?php post_class(); ?> itemscope itemtype="http://schema.org/Article">
<script type="application/ld+json">
{"@context":"http:\/\/schema.org","@type":"Organization","name":"Smarthostingprice","alternateName":"SHPWebHost","url":"https:\/\/smarthostingprice.com\/","logo":"https:\/\/smarthostingprice.com\/wp-content\/uploads\/2016\/12\/cropped-logo_org.png","sameAs":["https:\/\/www.facebook.com\/Smarthostingpricecom-1511917225800608","https:\/\/twitter.com\/shpwebhost"]}</script>
<meta itemprop="author" content="Aman Yadav">
<div class="post-wrapper">
    <div class="coupon-box">
    <div class="coupon-box-header">
      <div class="cmp_image display-inline col-rz-3 col-rs-100">
        <div class="logo_img"> <a id="aff_link" href="#" rel="nofollow"> <img src="<?php the_post_thumbnail_url('medium')?>" alt="<?php the_title();?>"></a> </div>
      </div>
      <div class="coupon-offer-box entry-content display-inline col-rz-7 col-rs-100" >
        <div class="discount-corner"> <span><a id="aff_link" href="<?php echo get_post_meta($post->ID, 'coupon_affiliate_link', true);?>" rel="nofollow" ><?php
foreach(array_reverse($coupons['discount']) as $key=>$val){
 echo $val; break; } ?>	OFF</a></span> </div>
        <div class="coupon-detail">
          <h1 class="entry-title" itemprop="headline"><?php the_title();?></h1>
          <div class="entry-date">
<time class="updated updated-time-main" itemprop="dateModified" datetime="<?php echo get_the_modified_date('Y-m-d');?>">Last updated: <?php echo get_the_modified_date('F j, Y');?></time>
<time class="entry-date published" itemprop="datePublished" datetime="<?php echo get_the_date('Y-m-d');?>"></time>
</div>
          <p><?php echo get_post_meta($post->ID, 'coupon_short_desc', true);?></p>
        </div>
       <ul class="post_share_btn display-inline"><li class="post_share_btn_box"> <a class="fb" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink();?>&amp;t=<?php the_title();?>&amp;redirect_uri=<?php echo get_the_permalink();?>" title="" onclick="essb_window('https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink();?>&amp;t=<?php the_title();?>&amp;redirect_uri=<?php echo get_the_permalink();?>','facebook','185250390'); return false;" target="_blank" rel="nofollow"><span class="fa fa-facebook"></span><span class="essb_network_name">Facebook</span></a></li>
  <li class="post_share_btn_box twitter"> <a class="tw" href="https://twitter.com/intent/tweet?text=<?php the_title();?>&amp;url=<?php echo get_the_permalink();?>&amp;counturl=<?php echo get_the_permalink();?>" title=""  target="_blank" rel="nofollow"><span class="fa fa-twitter"></span><span class="essb_network_name">Twitter</span></a></li>
  <li class="post_share_btn_box google"> <a class="gl" href="https://plus.google.com/share?url=<?php echo get_the_permalink();?>" title="" onclick="essb_window('https://plus.google.com/share?url=<?php echo get_the_permalink();?>','google','185250390'); return false;" target="_blank" rel="nofollow"><span class="fa fa-google-plus"></span><span class="essb_network_name">Google+</span></a></li></ul>
        <div class="coupon-btn-detail coupon-button-type aff_btn float-right">
        <a id="aff_link1" href="#" class="coupon-button coupon-code">
              <span class="code-text"><?php foreach(array_reverse($coupons['code']) as $key=>$val){
 echo $val; break; } ?></span>
              <span class="get-code">Get Code</span>
        </a>
        <div class="clear"></div>
        <script type="text/javascript">
  document.getElementById("aff_link1").onclick = function(){
   window.open("<?php echo get_post_meta($post->ID, 'coupon_affiliate_link', true);?>",'_parent');
  window.open("<?php the_permalink();?>#<?php foreach(array_reverse($coupons['code']) as $key=>$val){
 echo $val; break; } ?>",'_blank');
 }
</script>
<div id="<?php foreach(array_reverse($coupons['code']) as $key=>$val){echo $val; break; } ?>" class="shp_overlay">
	<div id="shp_popup" class="shp_popup">
		<a class="close" href="#">&times;</a>
		<div class="coupon_popup">
<div class="coupon_wh_logo float-left">
<img width="250px" src="<?php the_post_thumbnail_url('medium')?>" alt="<?php the_title()?>">
</div>
<div align="center" class="coupon_popup_right float-right">
<div class="coupon_code">
<span><?php foreach(array_reverse($coupons['code']) as $key=>$val){
 echo $val; break; } ?></span>
</div>
<div class="coupon_inst" style="color:#636363;font-weight:400;">
<span>Valid From: <?php
foreach(array_reverse($coupons['start_date']) as $key=>$val){
 echo $val; break; } ?></span> to 
 <span>
 <?php
foreach(array_reverse($coupons['end_date']) as $key=>$val){ echo $val; break; } ?>
 </span>
</div>
</div>
</div>
	</div>
</div>
        </div>
      </div>
      </div>
    </div>
    <?php echo do_shortcode('[gd_coupon_carousel]');?>
	<!--<div align="center" itemscope itemtype="http://schema.org/Review" class="review-wrapper" >
			<span itemprop="itemReviewed" itemscope itemtype="http://schema.org/Thing">
			<meta itemprop="name" content="<?php //the_title();?>">
		</span>
		<span itemprop="author" itemscope itemtype="http://schema.org/Person"><meta itemprop="name" content="Admin"></span>
		<h4>Hosting Coupon Trust Rating</h4>
    	<span style="color:#FC0">5/5</span>		
			<span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
				<meta itemprop="ratingValue" content="5">
				<meta itemprop="bestRating" content="5">
			</span>
				</div>-->
    <div class="coupon_post_content">
    <h3>Recent Coupon codes & Deals</h3>
    <ul class="coupon-list">
<?php 
		$c=count($coupons['discount']);
			for($i=0;$i<$c;$i++){ 
		?>	
	<li>
    <div class="recent_coupon_box">
	<div class="display-inline col-rz-1">
	<div class="coupon-discount">
    <span class="coupon-value"><?php echo $coupons['discount']['coupon_'.$i.'_discount'];?></span>
    <span>Discount</span>
    <span class="coupon-type">Coupon</span>
    </div>
</div>
	<div class="border-left display-inline col-rz-9">
    <div class="gd_coupon_detail">
    <p><strong><?php echo $coupons['discount']['coupon_'.$i.'_discount'];?> Discount coupon </strong> - <?php echo $coupons['detail']['coupon_'.$i.'_detail'];?></p>
<span class="date pull-left">
<span>Valid from</span>
<span><?php echo date('d F Y',strtotime($coupons['start_date']['start_'.$i.'_date']));?></span>
<span>to</span>
<span><?php echo date('d F Y',strtotime($coupons['end_date']['end_'.$i.'_date']));?></span>
</span>
<div class="coupon-btn-detail coupon-button-type aff_btn float-right">
        <a id="aff_link<?php echo $coupons['code']['coupon_'.$i.'_code'];?>" href="#" class="coupon-button coupon-code">
              <span class="code-text"><?php echo $coupons['code']['coupon_'.$i.'_code'];?></span>
              <span class="get-code">Get Code</span>
        </a>
        <div class="clear"></div>
       <script type="text/javascript">
  document.getElementById("aff_link<?php echo $coupons['code']['coupon_'.$i.'_code'];?>").onclick = function(){
   window.open("<?php echo $aff_link;?>",'_parent');
  window.open("<?php the_permalink();?>#<?php echo $coupons['code']['coupon_'.$i.'_code'];?>",'_blank');
}
</script>
        </div>
<div>
</div> 
</div>
</div>
	</div>  
	</li>
<?php 
	} ?>
</ul>
    </div>
    <div class="gd_coupon_sidebar">
    <div class="gd_cp_sidebar_content">
    <h3>Latest Maximum discount coupon</h3>
	<?php  
			$args = array('posts_per_page' => 5,'post_status'    => 'publish','post_type'=> 'greedycoupon',			
			'order'     => 'DSC',
 		    'meta_key' => 'coupons_code', // i want something like this views['all']
 			'orderby' => 'meta_value_num'
	            );
query_posts( $args );
// The Loop
while ( have_posts() ) : the_post(); ;
$post_id=get_the_ID();
$coupons_all=get_post_meta($post_id, 'coupons_code', true);
$a=get_post_meta($post_id, 'coupon_count', true);
$a=$a-2;
if(strlen($coupons_all)>5){
			$coupons_all=json_decode($coupons_all,true);
		}
?>
<div class="gd_top_coupon"><span class="gd_discount"><?php echo $coupons_all['discount']['coupon_'.$a.'_discount'];?></span><a href="<?php the_permalink();?>"><?php the_title();?></a>
<em><?php the_modified_date('d M,Y');?></em></div>
<?php endwhile;
 // Reset Query
wp_reset_query();?>    
</div>
    </div>
<div class="clear"></div>
<div class="coupon_post">
<div class="coupon_post_sub_heading coupon_post_dec">
<?php the_content(); ?>
</div>
</div>
</div>
</article>
  </div>
  <div class="clear"></div>
 </div>
 <div class="clear"></div>
<?php get_footer(); ?>