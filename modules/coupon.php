<?php 
if ( ! defined( 'ABSPATH' ) ) {
          header( 'Status: 403 Forbidden' );
          header( 'HTTP/1.1 403 Forbidden' );
          exit;
      } // Exit if accessed directly
//Add Coupon

function gdcoupon_meta() {       	

	    $labels = array(

	        'name' => 'Coupon',

	        'singular_name' => 'Coupon',

	        'add_new' => 'Add New',

	        'add_new_item' => 'Add New Coupon',

	        'edit_item' => 'Edit Coupon',

	        'new_item' => 'New Coupon',

	        'all_items' => 'All Coupon',

	        'view_item' => 'View Coupon',

	        'search_items' => 'Search Coupon',

	        'not_found' =>  'No Coupon Found',

	        'not_found_in_trash' => 'No Coupon found in Trash',

	        'parent_item_colon' => '',

	        'menu_name' => 'Coupon',

	    );

	    register_post_type(

	        'greedycoupon',

							array(

								'labels' => $labels,

								'has_archive' =>false,

								'public' => true,

								'menu_position'       => 6,

								'menu_icon'           => GRD_PLUGIN_URL.'assets/images/symbol_logo.png',

								'can_export'          => true,

								'rewrite' => array( 'slug' => 'coupon' ),

								'supports' => array( 'title','editor','revisions','post-formats','thumbnail' ),

								'exclude_from_search' => false,

								'capability_type' => 'post',

	            'register_meta_box_cb' => 'add_gdcoupon_meta',

	            'publicly_queryable'  => true,	          

	        )

	    );

	}

add_action( 'init', 'gdcoupon_meta' );

function gdcoupon_rewrite_flush() {

    // First, we "add" the custom post type via the above written function.

    // Note: "add" is written with quotes, as CPTs don't get added to the DB,

    // They are only referenced in the post_type column with a post entry, 

    // when you add a post of this CPT.

    my_cpt_init();

    // ATTENTION: This is *only* done during plugin activation hook in this example!

    // You should *NEVER EVER* do this on every page load!!

    flush_rewrite_rules();

}

register_activation_hook( __FILE__, 'gdcoupon_rewrite_flush' );

?>