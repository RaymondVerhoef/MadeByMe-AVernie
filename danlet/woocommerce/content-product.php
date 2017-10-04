<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li class="col-lg-3 col-md-4 col-xs-12">
	<div class="acd_shop_box">
	<?php
	/**
	 * @author VNMilky
	 * @hook woocommerce_before_shop_loop_item
	 * @remove woocommerce_template_loop_product_link_open() - 10
	 * @hooked danlet_woocommerce_before_shop_loop_item_before() - 5
 	 * @hooked add danlet_woocommerce_before_shop_loop_item() - 10
	 */
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );
	/**
	 * @author VNMilky
	 * @hook woocommerce_before_shop_loop_item_title
	 * @remove woocommerce_show_product_loop_sale_flash() - 10
	 * @remove woocommerce_template_loop_product_thumbnail () - 10
	 * @hooked danlet_show_product_loop_sale_flash() - 10
	 * @hooked danlet_woocommerce_before_shop_loop_item_after() - 30
	 */
	/**
	 * woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );
	/**
	 * @author VNMilky
	 * @hook woocommerce_shop_loop_item_title
	 * @remove woocommerce_template_loop_product_title() - 10
	 * @hooked woocommerce_shop_loop_item_title_before() - 10
	 * @hooked danlet_woocommerce_shop_loop_item_title_rating() - 20
	 * @hooked danlet_woocommerce_shop_loop_item_title_product() - 30
	 *
	 */
	/**
	 * woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	do_action( 'woocommerce_shop_loop_item_title' );
	/**
	 * @author VNMilky
	 * @hook woocommerce_after_shop_loop_item_title
	 * @remove woocommerce_template_loop_rating() - 5
	 * @remove woocommerce_template_loop_price() - 10
	 * @hooked danlet_woocommerce_template_loop_price() -  10
	 * @hooked woocommerce_shop_loop_item_title_after() - 30
 	 */
	/**
	 * woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item_title' );
	/**
	 * @author VNMilky
	 * @hook woocommerce_after_shop_loop_item
	 * @remove woocommerce_template_loop_product_link_close() - 5
	 * @remove woocommerce_template_loop_add_to_cart() - 10
	 */
	/**
	 * woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	do_action( 'woocommerce_after_shop_loop_item' );
	?>
	</div>
</li>
