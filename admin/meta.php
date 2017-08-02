<?php

//Main Meta

function add_gdcoupon_meta() {

$post_types = array ( 'post', 'page', 'event' );

add_meta_box('plugin-gdcoupon-box', 'GreedyCoupon Post', 'add_plugin_gdcoupon_box', 'greedycoupon', 'normal', 'high');

}

add_action( 'add_meta_boxes', 'add_gdcoupon_meta' );

//include Meta files

include(GRD_PLUGIN_PATH.'admin/coupon-meta.php');



