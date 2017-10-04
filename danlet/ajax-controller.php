<?php

if(!function_exists('danlet_remove_item_cart')){
    function danlet_remove_item_cart(){
        $id = isset($_POST['id']) ? $_POST['id'] : 0 ;
        $cart = WC()->instance()->cart;
        $cart_id = $cart->generate_cart_id($id);
        $cart_item_id = $cart->find_product_in_cart($cart_id);

        if($cart_item_id){
           $cart->set_quantity($cart_item_id,0);
        }
         ob_start();
        danlet_woocommerce_header_cart();

            $html = ob_get_clean();
        ob_end_clean();
    echo danlet_print_html($html);
    die();
    }
}
add_action('wp_ajax_danlet_remove_item_cart', 'danlet_remove_item_cart');
add_action('wp_ajax_nopriv_danlet_remove_item_cart', 'danlet_remove_item_cart');

function danlet_gallery_load_more() {
	$offset = isset($_POST['count']) ? $_POST['count'] : 0 ;
	$gallery_id = isset($_POST['gallery_id']) ? $_POST['gallery_id'] : 0 ;
	$pages = isset($_POST['pages']) ? $_POST['pages'] : 0 ;

	$images = danlet_get_field('gallery_images', $gallery_id);

	$view_img = array_slice($images,$offset,$pages);

	ob_start();

	foreach ($view_img as $image): ?>
		<li class="col-lg-3 col-md-4 col-sm-6 col-sm-6 acd_gallery_list">
			<div class="acd_gallery_img">
			 	<a href="#" data-toggle="modal" data-target="#gallery-modal_<?php echo esc_attr($id);?>">
				<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['title']); ?>">
				</a>
				 <div id="gallery-modal_<?php echo esc_attr($id);?>" class="modal fade" role="dialog" >
	              <div class="modal-dialog">
	                <!-- Modal content-->
	                <div class="modal-content">
	                  <div class="modal-body">
	                    	<div class="close close-modal" data-dismiss="modal"></div>
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['title']); ?>">
							<!-- social -->
		                    <ul class="acd_gallery_social">
								<li ><a href="<?php echo esc_url('https://plus.google.com/share?url=')?><?php echo esc_url($image['url']); ?>" title="google +"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								<li ><a href="<?php echo esc_url('https://twitter.com/home?status=');?><?php echo esc_url($image['url']); ?>" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li ><a href="<?php echo esc_url('https://www.facebook.com/sharer/sharer.php?u='); ?><?php echo esc_url($image['url']); ?>" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							</ul>
						<!-- end social -->
	                  </div>
	                   <div class="acd_btn_prev btn-next-back" data-current="gallery-modal_<?php echo intval($id)?>" data-next="gallery-modal_<?php echo intval($id - 1)?>"></div>
	                    <div class="acd_btn_next btn-next-back" data-current="gallery-modal_<?php echo intval($id)?>" data-next="gallery-modal_<?php echo intval($id + 1)?>"></div>
	                </div>

	              </div>
	            </div>
			</div>
		</li>
	<?php
	$id++;
	endforeach;
	$html = ob_get_clean();
	ob_end_clean();

	echo danlet_print_html($html);
	die();

}
add_action('wp_ajax_danlet_gallery_load_more', 'danlet_gallery_load_more');
add_action('wp_ajax_nopriv_danlet_gallery_load_more', 'danlet_gallery_load_more');

// loadmore single video
function danlet_load_more_single_video() {
	$count = isset($_POST['count']) ? $_POST['count'] : 0 ;
	$pages = isset($_POST['pages']) ? $_POST['pages'] : 0 ;

	$args = array(
		'post_type' => 'video',
		'post_per_page' => $pages,
		'offset' => $count,
	);
	$loop = new WP_Query($args);
	wp_reset_postdata();
	while($loop->have_posts()) : $loop->the_post();
	ob_start();
	$number_comment = get_comments_number();
	?>
		<li>
			<div class="sidebar_recent_post_box">
				<div class="sidebar_recent_post_img">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						 <?php echo danlet_thumbnail_image(get_the_ID());?>
					</a>
				</div>
				<div class="sidebar_recent_post_date"> <?php echo date_i18n( 'M / d', strtotime(get_the_date('Y-m-d')) ); ?></div>
				<div class="sidebar_recent_post_name">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
				</div>
				<ul class="sidebar_recent_post_view">
					<li>
						<span><?php echo beau_getpost_view(get_the_ID()); ?></span>
						<i class="fa fa-eye" aria-hidden="true"></i>
					</li> /
					<li>
						<span><?php echo esc_attr($number_comment) ?></span>
						<i class="fa fa-comment-o" aria-hidden="true"></i>
					</li>
				</ul>
			</div>
		</li>
	<?php endwhile;
	$html = ob_get_clean();
	ob_end_clean();

	echo danlet_print_html($html);
	die();
}
add_action('wp_ajax_danlet_load_more_single_video','danlet_load_more_single_video');
add_action('wp_ajax_nopriv_danlet_load_more_single_video','danlet_load_more_single_video');

// infomatio_user time table

function danlet_infomation_user() {
	$filter = isset($_POST['filter']) ? $_POST['filter'] : 0 ;
	$class_id = isset($_POST['class_id']) ? $_POST['class_id'] : 0 ;
	$class_id = explode(',', $class_id);
        switch($filter) {
            case 'subcribed-class' :
                get_subscribed_class($class_id);
                break;
            case 'timetable' :
                if(empty($class_id)) die();
                $additional_arg = array(
                    'post__in' => $class_id
                );
                echo json_encode(danlet_get_class_list($additional_arg , false , false));
                die();
                break;
            case 'logout' :
                break;
        }

}
add_action('wp_ajax_danlet_infomation_user','danlet_infomation_user');

/**
 * return html
 */
function get_subscribed_class($class_id){
    ob_start();
        ?>
	<div class="teacher">
            <ul class="acd_classes_list">
            <?php
            foreach($class_id as $id_class) :
            ?>
                    <li class="col-lg-6 col-md-6">
                            <div class="row">
                                    <div class="col-lg-6 col-md-6 ">
                                            <div class="sh_class_img">
                                                    <a href="<?php echo get_permalink($id_class); ?>" title="<?php echo get_the_title($id_class); ?>">
                                                            <?php echo get_the_post_thumbnail($id_class); ?>
                                                    </a>
                                            </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 acd_classes_content">
                                            <div class="sh_class_box">
                                                    <h4 class="sh_class_title">
                                                            <a href="<?php echo get_permalink($id_class); ?>" title="<?php echo get_the_title($id_class); ?>">
                                                                    <?php echo get_the_title($id_class); ?>
                                                            </a>
                                                    </h4>
                                                    <p class="sh_class_teacher_job sh_class_teacher_job_b">
                                                            <?php esc_html_e('Teachers:', 'danlet'); ?>
                                                    </p>
                                                    <ul class="sh_class_teacher">
                                                    <?php
                                                    $tea = danlet_get_field('class_teacher', $id_class);
                                                    foreach($tea as $teacher) :
                                                     ?>
                                                            <li class="sh_class_teacher_r">
                                                                    <a href="<?php echo get_permalink($teacher->ID); ?>" title="<?php echo get_the_title($teacher->ID); ?>"><?php echo get_the_title($teacher->ID); ?></a>
                                                            </li>
                                                    <?php endforeach; ?>
                                                    </ul>
                                                    <ul class="sh_class_book">
                                                            <li>
                                                                    <span class="sh_class_timetable sh_bg_timetable">
                                                                            <i class="fa fa-th-large" aria-hidden="true"></i>
                                                                    </span>
                                                            </li>
                                                    </ul>
                                            </div>
                                    </div>
                            </div>
                    </li>
                    <?php endforeach; ?>
            </ul>

	<?php
	$html = ob_get_clean();
	ob_end_clean();

	echo danlet_print_html($html);
        die();
}

