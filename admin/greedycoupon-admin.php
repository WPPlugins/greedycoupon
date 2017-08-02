<?php
if ( ! defined( 'ABSPATH' ) ) {
          header( 'Status: 403 Forbidden' );
          header( 'HTTP/1.1 403 Forbidden' );
          exit;
      } // Exit if accessed directly
if(isset($_POST['gd_save'])){
	$gd_hide_theme_header=$_POST['gd_hide_theme_header'];
	update_option('gd_hide_theme_header',$gd_hide_theme_header);
	}
	$gd_hide_theme_header=get_option('gd_hide_theme_header');
	if($gd_hide_theme_header=='on'){
		$gd_hide_theme_header='checked';
	}
?>
<div class="greedy-container">
  <div class="greedy-header">
    <div class="greedy-header-logo"> <img width="300px" src="<?php echo GRD_PLUGIN_URL; ?>assets/images/logo.png">
      <div class="greedy-header-button"> <a href="https://livertigo.com/product/greedycoupon" class="button" target="_blank" style=" text-decoration: none; ">Help Guide</a> <a href="http://livertigo.com/contact-us" class="button" target="_blank" style=" text-decoration: none; ">Contact Us</a></div>
    </div>
  </div>
  <div class="greedy-body">
    <div class="greedy-navigation">
      <ul>
        <li data-id="dashboard" class="actv"><i style="margin-right: 5px;" class="fa fa-desktop"></i>Dashboard</li>
        <li data-id="help"><i style="margin-right: 5px;" class="fa fa-help"></i>Help</li>
      </ul>
    </div>
    <div class="greedy-main-content container">
      <div class="tabc actv" id="dashboard">
        <div class="row">
            <div class="col-md-12">
              <div class="col-md-2">
              <div class="dashboard-box" style="
    background-color: #1baed3;
    padding: 10px;
    text-align: center;
    color: #fff;
    border-radius: 5px;
    border: 3px solid #d8d8d8;
    box-shadow: inset 0px 0px 10px 1px #24798e;
">
                <h4 style="
    font-size: 40px;
    margin: 5px;
    color: #fff;
"><?php echo wp_count_posts( 'greedycoupon' )->publish;?></h4>
                <div>Total Post</div>
              </div>
              </div>
            </div>
            <div class="clear"></div>
            <hr>
            <div class="col-md-12">
            <form method="post" action="">
            <input type="checkbox" name="gd_hide_theme_header" <?php echo $gd_hide_theme_header;?>>
            <label>Do not display theme header</label>
            <input type="submit" class="button" name="gd_save" value="Save Values">
            </form>
            </div>
        </div>
        </div>
        <div class="tabc" id="help">
        <div class="row">
            <div class="col-md-12">
            <h3>Carousel Shortcode</h3>
            <p>To use carousel anywhere in website use a shortcode and place with customized coupon post.</p>
            <blockquote>[gd_coupon_carousel]</blockquote>
            </div>
        </div>
        </div>
      </div>
      </div>
      </div>
<script>
$('.form-control').click(function() {
    $('#greedy_save').css({
        'background-color': '#f03325',
		'box-shadow': 'inset 0px 0px 10px 0px #b72b20',
		'border':'1px solid #ccc',		
    });
});
</script> 
<script>
jQuery(".greedy-navigation ul li").click(function(){
var id=jQuery(this).attr("data-id");
jQuery(".tabc").hide();
jQuery("#"+id).show();
jQuery(".greedy-navigation ul li").removeClass("actv");
jQuery(this).addClass("actv");
});
</script> 
<script>
$(document).ready(function(){
$("upper p").css("display", "block");
});
</script>