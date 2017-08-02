<?php
/*
Plugin Name: GreedyCoupon
Plugin URI: http://livertigo.com/product/greedycoupon
Description: GreedyCoupon is an customized coupon plugin for wordpress websites.
Author: Aman Yadav
Version: 1.0.1
Author URI: https://liveurlifehere.com
Copyright: (c) 2017 livertigo web solution
License: GNU General Public License v3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/
if ( ! defined( 'ABSPATH' ) ) {
   header( 'Status: 403 Forbidden' );
   header( 'HTTP/1.1 403 Forbidden' );
exit;
}
// Exit if accessed directly
define( 'GRD_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );	
define( 'GRD_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'GRD_PLUGIN_VERSION', '1.0.1' );		  
//Include
include(GRD_PLUGIN_PATH.'function.php');
//Admin
function greedycoupon_admin(){
include(GRD_PLUGIN_PATH.'admin/greedycoupon-admin.php'); 
}
include(GRD_PLUGIN_PATH.'admin/meta.php');
//WP Dashboard title
function gdcoupon_menu_page() {
    add_menu_page(
        __('GreedyCoupon','textdomain'),
        'GreedyCoupon',
        'manage_options',
        'greedycoupon',
        'greedycoupon_admin',
        GRD_PLUGIN_URL.'assets/images/symbol_logo.png',
        99);
}
add_action( 'admin_menu', 'gdcoupon_menu_page' );
//include plugin stylesheet
function gdcoupon_scripts() {
wp_enqueue_style( 'gdcoupon_style', GRD_PLUGIN_URL.'style.css',false,GRD_PLUGIN_VERSION,'all');
wp_enqueue_script('jquery');
wp_enqueue_style( 'gdcoupon_carousel_style', GRD_PLUGIN_URL.'assets/app/owl-carousel/owl.carousel.min.css',false,GRD_PLUGIN_VERSION,'all');
wp_enqueue_style( 'owl_carousel_style', GRD_PLUGIN_URL.'assets/app/owl-carousel/owl.theme.default.min.css',false,GRD_PLUGIN_VERSION,'all');
wp_enqueue_script('owl_carousel_js', GRD_PLUGIN_URL.'assets/app/owl-carousel/owl.carousel.js',false,GRD_PLUGIN_VERSION,'all');
}
add_action( 'wp_enqueue_scripts', 'gdcoupon_scripts' );
function greedycoupon_admin_scripts() {
wp_enqueue_script('jquery');
wp_enqueue_script('gdcoupon_fa-picker-js', GRD_PLUGIN_URL.'assets/js/fa-picker/simple-iconpicker.min.js',false,GRD_PLUGIN_VERSION,'all');
wp_enqueue_style( 'gdcoupon_fa-picker', GRD_PLUGIN_URL.'assets/css/fa-picker/simple-iconpicker.min.css',false,GRD_PLUGIN_VERSION,'all');
wp_enqueue_style( 'gdcoupon_fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',false,GRD_PLUGIN_VERSION,'all');
wp_enqueue_style( 'gdcoupon_admin-css', GRD_PLUGIN_URL.'assets/css/admin-css.css',false,GRD_PLUGIN_VERSION,'all');
}
add_action( 'admin_enqueue_scripts', 'greedycoupon_admin_scripts',99 );
add_filter( 'template_include', 'include_gdcoupon_template_function', 1 );
function include_gdcoupon_template_function( $template_path ) {
    if (get_post_type() == 'greedycoupon' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-gdcoupon.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = GRD_PLUGIN_PATH. '/templates/single-gdcoupon.php';
            }
        }else{
		 //No Post
	}
    }
    return $template_path;
}
// Notice
function gd_admin_notice(){
	if(get_option('gd_permalink')!=='1'){
    echo '<div class="error">
       <p>Before Start with GreedyCoupon you need to Flush Permalink cache. For this you need to <a href="'.get_site_url().'/wp-admin/options-permalink.php">Visit Permalink Setting</a> & click on <strong>save</strong> button.<span style="float: right;"><a href="'.get_site_url().'/wp-admin/edit.php?post_type=greedycoupon&gd_permalink=1"><span style="margin: 10px;font-size: 11px;color: #f50;">Close it if already flushed</span><i class="fa fa-times"></i></a></span></p>	   
    </div>';
	}	
}
add_action('admin_notices', 'gd_admin_notice');
if($_GET['gd_permalink']=='1'){
	update_option('gd_permalink','1');	
}