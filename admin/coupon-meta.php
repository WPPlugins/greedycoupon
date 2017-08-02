<?php
if ( ! defined( 'ABSPATH' ) ) {
          header( 'Status: 403 Forbidden' );
          header( 'HTTP/1.1 403 Forbidden' );
          exit;
      } // Exit if accessed directly
/////////////////////////////////////// coupon setup ///////////////////////////////////////
function add_plugin_gdcoupon_box(){
		global $post;
		$coupons=get_post_meta($post->ID, 'coupons_code', true);
		$coupon_short_desc=get_post_meta($post->ID, 'coupon_short_desc', true);
		$coupon_affiliate_link=get_post_meta($post->ID, 'coupon_affiliate_link', true);
		if(strlen($coupons)>5){
			$coupons=json_decode($coupons,true);
		}
		$show=get_post_meta($post->ID, 'coupon_show', true);
		$checked=($show=="on")?"checked":"";
		$p=$i=$j=$k=$l=$m=$n=0;
		?>

<textarea name="coupon_short_desc" placeholder="Coupon Short Descripition" maxlength="300" style="width: 100%;height: 70px;"><?php echo $coupon_short_desc;?></textarea>
<input type="url" name="coupon_affiliate_link" value="<?php echo $coupon_affiliate_link;?>" placeholder="Coupon affiliate Link">
<table>
  <tr>
    <td><div class="coupon-discount">
        <?php if(is_array($coupons)){
foreach($coupons['discount'] as $key=>$val){?>
        <input type="text" name="<?php echo $key;?>" value="<?php echo $val;?>" style="display:block;width: 118px;">
        <?php $j++;

	}

}?>
        <input type="text" placeholder="Coupon discount" name="coupon_<?php echo $j;?>_discount" value="" style="display:block;width: 118px;">
      </div></td>
    <td><div class="coupon-code">
        <?php if(is_array($coupons)){
		foreach($coupons['code'] as $key=>$val){?>
        <input type="text" name="<?php echo $key;?>" value="<?php echo $val;?>" style="display:block;width: 118px;">
        <?php $k++;}
		}?>
        <input type="text" placeholder="Coupon Code" name="coupon_<?php echo $k;?>_code" style="display:block;width: 118px;">
        <input type="hidden" name="coupon_count" value="<?php echo ($k+1);?>">
      </div></td>
    <td><div class="coupon-detail">
        <?php if(is_array($coupons)){

foreach($coupons['detail'] as $key=>$val){?>
        <input type="text" name="<?php echo $key;?>" value="<?php echo $val;?>" style="display:block;width:250px;">
        <?php $l++;

	}

}?>
        <input type="text" placeholder="Coupon Detail" name="coupon_<?php echo $l;?>_detail" value="" style="display:block;width:250px;">
      </div></td>
    <td><div class="start-date">
        <?php if(is_array($coupons)){

foreach($coupons['start_date'] as $key=>$val){?>
        <input type="text" name="<?php echo $key;?>" value="<?php echo $val;?>" style="display:block;width: 118px;">
        <?php $m++;

	}

}?>
        <input type="date" name="start_<?php echo $m;?>_date" value="" style="display:block;width: 118px;">
      </div></td>
    <td><div class="end-date">
        <?php if(is_array($coupons)){

foreach($coupons['end_date'] as $key=>$val){?>
        <input type="text" name="<?php echo $key;?>" value="<?php echo $val;?>" style="display:block;width: 118px;">
        <?php $n++;

	}

}?>
        <input type="date" name="end_<?php echo $n;?>_date" value="" style="display:block;width: 118px;">
      </div></td>
    <td style="vertical-align:top"><div class="coupon-delete">
        <?php if(is_array($coupons)){

foreach($coupons['code'] as $key=>$val){?>
        <span data-val="<?php echo $o;?>" style="display:block;" class="delete-coupon dashicons dashicons-minus"></span>
        <?php $o++;

	}

}?>
        <span data-val="<?php echo $o;?>" style="display:block;" class="delete-coupon dashicons dashicons-minus"></span> </div></td>
    <td style="vertical-align:top"><span class="dashicons dashicons-plus" id="add_coupon"></span></td>
  </tr>
</table>
<script>
jQuery("body").on("click",".delete-coupon",function(){
var vl=jQuery(this);
jQuery('input[name="coupon_'+vl.attr("data-val")+'_discount"]').remove();
jQuery('input[name="coupon_'+vl.attr("data-val")+'_code"]').remove();
jQuery('input[name="coupon_'+vl.attr("data-val")+'_detail"]').remove();
jQuery('input[name="start_'+vl.attr("data-val")+'_date"]').remove();
jQuery('input[name="end_'+vl.attr("data-val")+'_date"]').remove();
vl.remove();
gd_count=vl.attr("data-val");
});

var gd_count=(<?php echo $k ;?>+1);
	jQuery("#add_coupon").click(function(){
	jQuery(".coupon-discount").append('<input placeholder="Coupon discount" type="text" name="coupon_'+gd_count+'_discount" value="" style="display:block;width: 118px;">');
	jQuery(".coupon-code").append('<input placeholder="Coupon code" type="text" name="coupon_'+gd_count+'_code" value="" style="display:block;width: 118px;">');
	jQuery(".coupon-detail").append('<input placeholder="Coupon Detail" type="text" name="coupon_'+gd_count+'_detail" value="" style="display:block;width:250px">');
	jQuery(".start-date").append('<input type="date" name="start_'+gd_count+'_date" value="" style="display:block;width: 118px;">');
	jQuery(".end-date").append('<input type="date" name="end_'+gd_count+'_date" value="" style="display:block;width: 118px;">');
	jQuery('input[name="coupon_count"]').val(parseInt(jQuery('input[name="coupon_count"]').val())+1);
	jQuery(".coupon-delete").append('<span data-val="'+gd_count+'" style="display:block;" class="delete-coupon dashicons dashicons-minus"></span>');
gd_count++;
});
</script>
<?php  }
// SAVE REVIEW BOX SETTING
	function save_plugin_coupon_box($post_id,$post){
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
 	  return $post_id;
    }
		$key='coupon_show';
		$value=sanitize_text_field($_POST['coupon_show']);
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key);
		$key='coupon_affiliate_link';
		$value=sanitize_text_field($_POST['coupon_affiliate_link']);
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key);
		$key='coupon_short_desc';
		$value=sanitize_text_field($_POST['coupon_short_desc']);
	if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key);
		$key='coupon_count';
		$value=sanitize_text_field($_POST['coupon_count']);
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key);
		$metakey='coupons_code';
		$c=sanitize_text_field($_POST['coupon_count']);
		$discount=array();
		$code=array();
		$detail=array();
		$start_date=array();
		$end_date=array();
		$j=0;
		for($i=0;$i<=$c;$i++){
			if(sanitize_text_field($_POST['coupon_'.$i.'_discount'])!=""){
				$discount['coupon_'.$j.'_discount']=sanitize_text_field($_POST['coupon_'.$i.'_discount']);
				$code['coupon_'.$j.'_code']=sanitize_text_field($_POST['coupon_'.$i.'_code']);
				$detail['coupon_'.$j.'_detail']=sanitize_text_field($_POST['coupon_'.$i.'_detail']);
				$start_date['start_'.$j.'_date']=sanitize_text_field($_POST['start_'.$i.'_date']);
				$end_date['end_'.$j.'_date']=sanitize_text_field($_POST['end_'.$i.'_date']);
				$j++;
			}
		}
		$arr=array();
		$arr['discount']=$discount;
		$arr['code']=$code;
		$arr['detail']=$detail;
		$arr['start_date']=$start_date;
		$arr['end_date']=$end_date;
		$metavalue=json_encode($arr);
		if(get_post_meta($post->ID, $metakey, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $metakey, $metavalue);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $metakey, $metavalue);
		}	
		if(!$metavalue) delete_post_meta($post->ID, $metakey);
if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
        return $post_id;
    }
}
add_action('save_post', 'save_plugin_coupon_box' ,1,2); // save the custom fields	
?>