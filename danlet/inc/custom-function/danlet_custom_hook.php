<?php
/**
 * @author  VNMilky
 */
/**
 * @see Hook Fillter Timetable
 */
add_action('wp_ajax_danlet_reload_level' , 'danlet_reload_level');
add_action('wp_ajax_nopriv_danlet_reload_level' , 'danlet_reload_level');
add_action('wp_ajax_danlet_filter_class' , 'danlet_filter_class');
add_action('wp_ajax_nopriv_danlet_filter_class' , 'danlet_filter_class');

/**
 * @see hooked Login
 */
add_action( 'register_form', 'danlet_register_form' );
add_action( 'user_register', 'danlet_user_register' );
add_filter( 'registration_errors', 'danlet_registration_errors', 10, 3 );
add_action('danlet_login_popup_header_hook','danlet_login_popup_header');
/**
 * @see hooked js
 */
add_action('danlet_js_single_video_hook','danlet_js_single_video',10);
add_action('danlet_js_google_map_hook','danlet_js_google_map',10,2);
add_action('danlet_js_master_slider_hook','danlet_js_master_slider',10,2);
add_action('danlet_js_tabs_class_list_hook','danlet_js_tabs_class_list',10,3);
add_action('danlet_js_gallery_full_hook','danlet_js_gallery_full',10,2);
add_action('danlet_js_swiper_hook','danlet_js_swiper',10,3);
add_action('danlet_js_tabs_class_list_small_hook','danlet_js_tabs_class_list_small',10,2);
add_action('danlet_js_testimonial_hook','danlet_js_testimonial',10);
add_action('danlet_js_single_video_loadmore_hook','danlet_js_single_video_loadmore',10);
add_action('danlet_js_sh_user_hook','danlet_js_sh_user',10);
add_action('danlet_js_single_video_player_hook','danlet_js_single_video_player',10,3);
add_action('danlet_js_login_header_hook','danlet_js_login_header',10);
add_action('danlet_js_counto_hook','danlet_js_counto',10);
add_action('danlet_js_timetable_hook','danlet_js_timetable',10,4);
