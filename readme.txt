=== GTIN for WooCommerce ===
Contributors: iftekharbhuiyan
Plugin Name: GTIN for WooCommerce
Plugin URI: https://wordpress.org/plugins/
Tags: gtin, upc, ean, isbn, woocommerce, google merchant center
Author URI: https://profiles.wordpress.org/iftekharbhuiyan
Author: Iftekhar Bhuiyan
Requires at least: 2.5
Tested up to: 4.8.1
Stable tag: 4.8.1
License: GPLv3 or later
URI: http://www.gnu.org/licenses/gpl-3.0.html
WC requires at least: 3.0
WC tested up to: 3.1.2


Adds GTIN field for WooCommerce Product.

== Description ==

This plugin adds "GTIN" field for every WooCommerce product and saves it on the database. You can locate the field from "Product Data" meta box inside "Inventory" tab. Highly useful for submitting product feed on Google Merchant Center.

Features:
* Simple user interface.
* Lightweight Plugin

[ Usage ]

Meta key to retrieve individual product's GTIN data is "_gtin". You can grab the data using the snippet below.

<?php
$gtin_data = get_post_meta($post_id,'_gtin', true);
if (!empty($gtin_data)){
	echo $gtin_data;
}
?>


== Installation ==

1. Upload the "gtin-for-woocommerce" folder on your site's "/wp-content/plugins" folder.
2. Activate it from your site's plugin section. You're done!

== Changelog ==
= 1.0 =
* Release Date - 17 September 2017*
