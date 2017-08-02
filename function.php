<?php
if ( ! defined( 'ABSPATH' ) ) {
          header( 'Status: 403 Forbidden' );
          header( 'HTTP/1.1 403 Forbidden' );
          exit;
      } // Exit if accessed directly
//Include
include(GRD_PLUGIN_PATH.'templates/recent-coupon.php');
include(GRD_PLUGIN_PATH.'templates/coupon-box.php');
include(GRD_PLUGIN_PATH.'modules/coupon.php');

?>