<?php
/**
 * Content before index title.
 *
 * @see danlet_cover_page()
 * @see danlet_main_view()
 */
//add_action('danlet_before_main_content','danlet_cover_page', 10);
add_action('danlet_before_main_content','danlet_main_view', 20);

/**
 * Content before index title.
 *
 * @see danlet_after_main_view()
 */
add_action('danlet_after_main_content','danlet_after_main_view', 20);

/**
 * Content before index title.
 *
 * @see danlet_loop_before()
 */
add_action('danlet_before_content','danlet_loop_before', 20);


/**
 * Content before index title.
 *
 * @see danlet_pagination()
 * @see danlet_loop_after()
 */
//add_action('danlet_after_content','danlet_pagination', 10);
add_action('danlet_after_content','danlet_loop_after', 20);


/**
 * Content before index title.
 *
 * @see danlet_before_sidebar()
 */
add_action('danlet_sidebar','danlet_before_sidebar', 10);


/**
 * Content before index title.
 *
 * @see danlet_after_sidebar()
 */
add_action('danlet_sidebar','danlet_after_sidebar', 90);


/**
 * Content before index title.
 *
 * @see danlet_get_sticker()
 * @see danlet_get_thumbnail()
 * @see danlet_date_time_content()
 */
add_action( 'danlet_before_index_loop_item_title', 'danlet_get_sticker', 10);
add_action( 'danlet_before_index_loop_item_title', 'danlet_get_thumbnail_archive', 20);
add_action( 'danlet_before_index_loop_item_title', 'danlet_date_time_content', 30);


/**
 * Content before index content.
 *
 * @see danlet_before_content()
 */
add_action( 'danlet_before_index_content', 'danlet_before_content', 10);

/**
 * Content index.
 *
 * @see danlet_date_time_content()
 * @see danlet_title_content()
 * @see danlet_description_content()
 */

add_action( 'danlet_index_content', 'danlet_title_content', 20);
add_action( 'danlet_index_content', 'danlet_get_author_archive', 30);
add_action( 'danlet_index_content', 'danlet_description_content', 40);
add_action( 'danlet_index_content', 'danlet_tag_content', 50);
add_action( 'danlet_index_content', 'danlet_category_content', 60);
add_action( 'danlet_index_content', 'danlet_category_readmore', 70);



/**
 * Content after index content.
 *
 * @see danlet_after_content()
 */
add_action( 'danlet_after_index_content', 'danlet_after_content', 10);


/**
 * Content before index title.
 *
 * @see danlet_before_main_content_details()
 * @see danlet_breadcrumb()
 */
add_action('danlet_before_main_content_details','danlet_before_main_content_details', 20);
add_action('danlet_before_main_content_details','danlet_breadcrumb', 30);

/**
 * Content after index title.
 *
 * @see danlet_after_main_content_details()
 */
add_action('danlet_after_main_content_details','danlet_after_main_content_details', 10);


/**
 * Content before index title.
 *
 * @see danlet_before_content_single_div()
 */
add_action('danlet_before_content_single','danlet_before_content_single_div', 10);


/**
 * Content after index title.
 *
 * @see danlet_next_prev_post()
 * @see danlet_author_box_detail()
 * @see danlet_comment_form()
 * @see danlet_after_content_single_div()
 */

add_action('danlet_after_content_single','danlet_next_prev_post', 10);
add_action('danlet_after_content_single','danlet_author_box_detail', 20);
add_action('danlet_after_content_single','danlet_comment_form', 30);
add_action('danlet_after_content_single','danlet_after_content_single_div', 40);


/**
 * Content before index title.
 *
 * @see danlet_get_date_post()
 * @see danlet_get_thumbnail()
 * @see danlet_get_sticker()
 * @see danlet_title_single_content()
 * @see danlet_info_single_content()
 */
add_action('danlet_before_loop_content', 'danlet_get_date_post', 5);
add_action('danlet_before_loop_content','danlet_get_thumbnail', 10);
add_action('danlet_before_loop_content','danlet_get_sticker', 20);
add_action('danlet_before_loop_content','danlet_title_single_content', 30);
add_action('danlet_before_loop_content','danlet_info_single_content', 40);

/**
 * Content after index title.
 *
 * @see danlet_next_prev_post()
 * @see danlet_author_box_detail()
 * @see danlet_comment_form()
 * @see danlet_after_content_single_div()
 */

add_action('danlet_after_loop_content','danlet_before_content_single', 10);
add_action('danlet_after_loop_content','danlet_content_single', 20);
add_action('danlet_after_loop_content','danlet_tag_share_content_single', 30);
add_action('danlet_after_loop_content','danlet_after_content_single', 40);


/**
 * Cover info of page.
 *
 * @see danlet_cover_page()
 * @see danlet_breadcrumb()
 */

//add_action('danlet_cover_info','danlet_cover_page', 10);
add_action('danlet_cover_info','danlet_breadcrumb', 20);

/**
 * Cover image of page.
 *
 * @see danlet_cover_page()
 */

add_action('danlet_cover_image','danlet_cover_page', 10);


/* ------------------------ */

/* Hook custom Woocommerce Page Archiver */

/**
 * woocommerce_before_main_content hook.
 *
 * @hooked danlet_cover_page_shop - 9
 * @hooked woocommerce_output_content_wrapper - 10
 */
//add_action('woocommerce_before_main_content','danlet_cover_page_shop', 9);

remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);

/**
 * woocommerce_after_shop_loop_item_title hook.
 *
 * @hooked woocommerce_template_loop_rating - 5
 */
remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price', 10);
/**
 * @author VNMilky
 * add_action('woocommerce_after_shop_loop_item','danlet_get_link_view_product', 5);
 */



/**
 * woocommerce_shop_loop_item_title hook.
 *
 * @hooked danlet_get_product_title_product - 10
 * @hooked woocommerce_template_loop_price - 20
 */
/**
 * @author VNMilky
 * add_action('woocommerce_shop_loop_item_title','danlet_get_product_title_product', 10);
 * add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_price', 20);
 */


remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title', 10);



/* ------------------------ */

/* Hook custom Woocommerce Page Single */

/**
 * woocommerce_single_product_summary hook.
 *
 * @hooked woocommerce_template_single_rating - 4
 * @hooked danlet_get_categories_woocommerce - 30
 * @hooked danlet_get_tag_woocommerce - 30
 * @hooked danlet_get_description_single_woocommerce - 60
 */
//add_action('woocommerce_single_product_summary','woocommerce_template_single_rating', 4);
//add_action('woocommerce_single_product_summary','danlet_get_categories_woocommerce', 30);
//add_action('woocommerce_single_product_summary','danlet_get_tag_woocommerce', 30);
//add_action('woocommerce_single_product_summary','danlet_get_description_single_woocommerce', 60);
//add_action('woocommerce_single_product_summary','danlet_get_review_single_woocommerce', 65);

//remove_action('woocommerce_single_product_summary','woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta', 40);


/**
 * woocommerce_after_single_product_summary hook.
 *
 * @hooked danlet_get_product_title_product - 10
 * @hooked woocommerce_template_loop_price - 20
 */

remove_action('woocommerce_after_single_product_summary','woocommerce_output_product_data_tabs', 10);
remove_action('woocommerce_after_single_product_summary','woocommerce_upsell_display', 15);

/**
 * view_content_gallery_image hook.
 *
 * @hooked danlet_view_gallery - 10
 */
add_action( 'danlet_view_content_gallery_image', 'danlet_view_gallery', 10);


/**
 * danlet_get_view_dj hook.
 * @hooked danlet_title_dj - 10
 * @hooked danlet_view_dj_one - 20
 */
add_action('danlet_get_view_dj', 'danlet_title_dj', 10);
add_action('danlet_get_view_dj', 'danlet_view_dj_one', 20);
/**
 * Content before detail artist
 * @see danlet_header_artist_view() - 5
 * @see danlet_detail_artist_view() - 10
 * @see danlet_after_detail_artist_view() - 50
 */
add_action('danlet_before_detail_artist','danlet_header_artist_view',5);
add_action('danlet_before_detail_artist','danlet_detail_artist_view',10);

/**
 * Content detail artist
 * @see danlet_content_detail_artist() - 10
 */
add_action('danlet_content_single_artist','danlet_content_detail_artist',10);
/**
 * Content detail artist
 * @see danlet_artist_podcast_view() - 10
 */
add_action('danlet_podcast_single_artist','danlet_artist_podcast_view',10);

/**
 * Content after detail artist
 * @see danlet_after_detail_artist_view() - 50
 */
add_action('danlet_after_detail_artist','danlet_after_detail_artist_view',20);
/**
 * danlet_details_event_before hook.
 * @hooked danlet_details_event - 10
 * @hooked danlet_details_event_button - 20
 */
add_action('danlet_details_event', 'danlet_details_event', 10);
add_action('danlet_details_event_before', 'danlet_details_event', 10);

/**
 * danlet_details_event_after hook.
 * @hooked danlet_details_event_button - 10
 */
add_action('danlet_details_event_after', 'danlet_details_event_button', 10);

/**
 * @author shadow
 * Date 29.11
 * danlet_single_course hook,
 *@hooked danlet_single_course_detail - 10
 */
add_action('danlet_single_course', 'danlet_single_course_detail', 10);

/**
 * @author VNMilky
 * @see danlet_teacher_detail() - 10
 * @see danlet_teacher_timetable() - 20
 */
add_action('danlet_teacher_detail','danlet_teacher_detail',10);
// add_action('danlet_teacher_detail','danlet_teacher_timetable',20);
/*
 * danlet_single_video_play  hook,
 * @hooked danlet_single_video_details - 10
 * @hooked danlet_before_desc_video - 15
 * @hooked danlet_description_single_video - 20
 * @hooked danlet_author_box_detail - 30
 * @hooked danlet_tag_share_content_single_tagxonomy -40
 * @hooked danlet_comment_form - 50
 * @hooked danlet_load_more_video - 60
 * @hooked danlet_after_desc_video - 80
 */
add_action('danlet_single_video_play', 'danlet_single_video_details' ,10);
add_action('danlet_single_video_play', 'danlet_before_desc_video' ,15);
add_action('danlet_single_video_play', 'danlet_description_single_video' ,20);
add_action('danlet_single_video_play', 'danlet_author_box_detail' ,30);
add_action('danlet_single_video_play', 'danlet_tag_share_content_single_tagxonomy' ,40);
add_action('danlet_single_video_play', 'danlet_comment_form' ,50);
add_action('danlet_single_video_play', 'danlet_load_more_video' ,60);

add_action('danlet_single_video_play', 'danlet_after_desc_video' ,80);
