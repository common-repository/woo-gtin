<?php 
// prevent direct access as per woocommerce recommendations 
// ref: https://docs.woocommerce.com/document/create-a-plugin/
if (!defined('ABSPATH')) { 
	exit; 
}
/*
Plugin Name: GTIN for WooCommerce
Plugin URI: https://iftekhar.net/plugins/
Description: Add GTIN field for WooCommerce Product.
Author: Iftekhar Bhuiyan
Version: 1.0
Author URI: https://iftekhar.net/about/
Text Domain: gtin-for-woocommerce
*/

// check if WooCommerce is active
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))){
	
	// add custom GTIN field
	add_action('woocommerce_product_options_inventory_product_data','add_custom_product_gtin_field', 10, 1);
	function add_custom_product_gtin_field(){
		global $woocommerce, $post;
		$product = new WC_Product(get_the_ID());
		echo '<div id="gtin_attr" class="options_group">';
		// add tooltip
		woocommerce_wp_text_input( 
			array(	
				'id' 		  => '_gtin',
				'label'       => 'GTIN',
				'desc_tip'    => 'true',
				'description' => 'Enter the Global Trade Item Number (UPC,EAN,ISBN)')
			);
		echo '</div>';
	}
	
	// save product GTIN
	add_action('woocommerce_process_product_meta','save_custom_product_gtin_field');
	function save_custom_product_gtin_field($post_id){
		// gtin integer
		$gtin_post = intval($_POST['_gtin']);
		
		// save the data
		if($gtin_post){
			update_post_meta($post_id,'_gtin', $gtin_post);
		} else {
			update_post_meta($post_id,'_gtin', '');
		}
		
		// remove if GTIN meta is empty
		$gtin_data = get_post_meta($post_id,'_gtin', true);
		if (empty($gtin_data)){
			delete_post_meta($post_id,'_gtin');
		}
	}
}
?>