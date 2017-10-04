<?php
/**
 * @see Woocommerce Custom Hook
 * @author VNMilky
 */
/**
 * @remove woocommerce_get_sidebar() - 10
 * @remove woocommerce_before_main_content() - 10
 * @remove woocommerce_breadcrumb() - 20
 */
remove_action('woocommerce_sidebar','woocommerce_get_sidebar',10);
remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper',10);
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
/**
 * @see danlet_woocommerce_output_content_wrapper() - 10
 */
add_action('woocommerce_before_main_content','danlet_woocommerce_output_content_wrapper',10);
/**
 * @remove woocommerce_output_content_wrapper_end() - 10
 */
remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end',10);
/**
 * @see danlet_woocommerce_output_content_wrapper_end();
 */
add_action('woocommerce_after_main_content','danlet_woocommerce_output_content_wrapper_end',30);
/**
 * @see danlet_woocommerce_before_shop_loop() - 40
 */
add_action('woocommerce_before_shop_loop','danlet_woocommerce_before_shop_loop',40);
/**
 * @remove woocommerce_pagination() - 10
 */
remove_action('woocommerce_after_shop_loop','woocommerce_pagination',10);
/**
 * @see danlet_woocommerce_pagination() - 10
 */
add_action('woocommerce_after_shop_loop','danlet_woocommerce_pagination',10);
/**
 * @see danlet_woocommerce_after_shop_loop () 15
 */
add_action('woocommerce_after_main_content','danlet_woocommerce_after_shop_loop',15);
/**
 * @see danlet_woocommerce_category() - 5
 */
add_action('woocommerce_archive_description','danlet_woocommerce_category',5);

/**
 * @remove woocommerce_template_loop_product_link_open () -  10

 */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
/**
 * @see danlet_woocommerce_before_shop_loop_item_before() - 5
 * @see add danlet_woocommerce_before_shop_loop_item() - 10
 */
add_action('woocommerce_before_shop_loop_item','danlet_woocommerce_before_shop_loop_item_before',5);
add_action('woocommerce_before_shop_loop_item','danlet_woocommerce_before_shop_loop_item',10);
/**
 * @remove woocommerce_show_product_loop_sale_flash() - 10
 */
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_show_product_loop_sale_flash',10);
remove_action('woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_thumbnail',10);
/**
 * @see danlet_show_product_loop_sale_flash() - 10
 * @see danlet_woocommerce_before_shop_loop_item_after() - 30
 */
add_action('woocommerce_before_shop_loop_item_title','danlet_show_product_loop_sale_flash',10);
add_action('woocommerce_before_shop_loop_item_title','danlet_woocommerce_before_shop_loop_item_after',30);
/**
 * @remove woocommerce_template_loop_product_title() - 10
 */
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
/**
 * @see danlet_woocommerce_shop_loop_item_title_before() - 10
 * @see danlet_woocommerce_shop_loop_item_title_rating() - 20
 * @see danlet_woocommerce_shop_loop_item_title_product() - 30
 */
add_action('woocommerce_shop_loop_item_title','danlet_woocommerce_shop_loop_item_title_before',10);
add_action('woocommerce_shop_loop_item_title','danlet_woocommerce_shop_loop_item_title_rating',20);
add_action('woocommerce_shop_loop_item_title','danlet_woocommerce_shop_loop_item_title_product',30);
/**
 * @see woocommerce_shop_loop_item_title_after() - 30
 */
add_action('woocommerce_after_shop_loop_item_title','danlet_woocommerce_shop_loop_item_title_after',30);
/**
 * @remove woocommerce_template_loop_rating() - 5
 * @remove woocommerce_template_loop_price() - 10
 */
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
/**
 * @see danlet_woocommerce_template_loop_price() - 10
 */
add_action('woocommerce_after_shop_loop_item_title','danlet_woocommerce_template_loop_price',10);
/**
 * @remove woocommerce_template_loop_product_link_close() - 5
 * @remove woocommerce_template_loop_add_to_cart() - 10
 */
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close',5);
remove_action('woocommerce_after_shop_loop_item','woocommerce_template_loop_add_to_cart',10);

//add_action('woocommerce_before_cart','danlet_woocommerce_output_content_wrapper',10);
//add_action('woocommerce_after_cart','danlet_woocommerce_output_content_wrapper_end',30);
/**
 * Header cart
 */
add_action('danlet_woocommerce_header_cart_hook','danlet_woocommerce_header_cart',10);

/**
 * @see Woocommerce Custom Product Hook
 * @author VNMilky
 */
/**
 *
 */
/**
 * @hook woocommerce_before_single_product_summary
 * @remove woocommerce_show_product_sale_flash() - 10
 * @remove woocommerce_show_product_images() - 20
 */
remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_sale_flash',10);
remove_action('woocommerce_before_single_product_summary','woocommerce_show_product_images',20);
/**
 * @see danlet_woocommerce_show_product_detail() - 10
 */
add_action('woocommerce_before_single_product_summary','danlet_woocommerce_show_product_detail',10);
/**
 * @hook woocommerce_single_product_summary
 * @remove woocommerce_template_single_title() - 5
 * @remove woocommerce_template_single_rating() - 10
 * @remove woocommerce_template_single_price() - 10
 * @remove woocommerce_template_single_excerpt() - 20
 * @remove woocommerce_template_single_add_to_cart() - 30
 * @remove woocommerce_template_single_meta() - 40
 * @remove woocommerce_template_single_sharing() - 50
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart',30);
/**
 * @see danlet_woocommerce_single_product_summary_before() - 1
 * @see danlet_woocommerce_single_product_summary_title() - 5
 * @see danlet_woocommerce_template_single_rating_before() - 8
 * @see woocommerce_template_single_rating() - 9
 * @see danlet_woocommerce_template_single_rating_after() - 10
 * @see danlet_woocommerce_template_single_price() - 15
 * @see danlet_woocommerce_template_single_add_to_cart() - 20
 * @see danlet_get_categories_woocommerce() - 30
 * @see danlet_woocommerce_single_product_summary_after() - 50
 */
add_action('woocommerce_single_product_summary','danlet_woocommerce_single_product_summary_before',1);
add_action('woocommerce_single_product_summary','danlet_woocommerce_single_product_summary_title',5);
add_action('woocommerce_single_product_summary','danlet_woocommerce_template_single_rating_before',8);
add_action('woocommerce_single_product_summary','woocommerce_template_single_rating',9);
add_action('woocommerce_single_product_summary','danlet_woocommerce_template_single_rating_after',10);
add_action('woocommerce_single_product_summary','danlet_woocommerce_template_single_price',15);
add_action('woocommerce_single_product_summary','danlet_woocommerce_template_single_add_to_cart',20);
add_action('woocommerce_single_product_summary','danlet_get_categories_woocommerce', 30);
add_action('woocommerce_single_product_summary','danlet_woocommerce_single_product_summary_after',50);
/**
 * @hook woocommerce_after_single_product_summary
 * @remove woocommerce_output_product_data_tabs() - 10
 * @remove woocommerce_upsell_display() - 15
 * @remove woocommerce_output_related_products() - 20
 */
remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs',10);
remove_action('woocommerce_after_single_product_summary','woocommerce_upsell_display',15);
remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products',20);
/**
 * @see danlet_woocommerce_after_single_product_svg() 10
 * @see danlet_woocommerce_template_single_detail_before() - 11
 * @see danlet_woocommerce_template_single_detail_after() - 12
 * @see danlet_woocommerce_template_single_excerpt() - 15
 * @see danlet_woocommerce_output_product_data_tabs_before() - 18
 * @see woocommerce_output_product_data_tabs() - 19
 * @see danlet_woocommerce_output_product_data_tabs_after() - 20
 * @see danlet_woocommerce_template_single_related_before() - 24
 * @see danlet_woocommerce_template_single_related_after() - 25
 * @see danlet_woocommerce_template_single_related_product_before() - 28
 * @see danlet_woocommerce_template_single_related_product() - 29
 * @see danlet_woocommerce_template_single_related_product_after() - 30
 */
add_action('woocommerce_after_single_product','danlet_woocommerce_after_single_product_svg', 10);
add_action('woocommerce_after_single_product','danlet_woocommerce_template_single_detail_before', 11);
add_action('woocommerce_after_single_product','danlet_woocommerce_template_single_detail_after', 12);
add_action('woocommerce_after_single_product','danlet_woocommerce_template_single_excerpt', 15);
add_action('woocommerce_after_single_product','danlet_woocommerce_output_product_data_tabs_before', 18);
add_action('woocommerce_after_single_product','woocommerce_output_product_data_tabs', 19);
add_action('woocommerce_after_single_product','danlet_woocommerce_output_product_data_tabs_after', 20);
add_action('woocommerce_after_single_product','danlet_woocommerce_template_single_related_before', 24);
add_action('woocommerce_after_single_product','danlet_woocommerce_template_single_related_after', 25);
add_action('woocommerce_after_single_product','danlet_woocommerce_template_single_related_product', 29);
add_action('woocommerce_after_single_product','danlet_woocommerce_detail_subscriber', 29);
