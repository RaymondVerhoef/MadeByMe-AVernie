<?php
/**
 * @see Shortcode Teacher
 * @option List
 * @author VNMilky
 * VC_Template
 */
$setup      = array(
	array(
		'background'	=> $background_color,
	),
    'h3[data-color="sh_teacher_title_element"]'      => array(
        'color'         	=> $color_title_element,
    ),
     'h3[data-color="sh_teacher_title_element"]:hover'      => array(
        'color'         	=> $color_title_element_hover,
    ),
    'a[data-color="sh_textmore"]'      => array(
        'color'         	=> $color_teacher_textmore,
    ),
    'a[data-color="sh_textmore"]:hover'      => array(
        'color'         	=> $color_teacher_textmore_hover,
    ),
    'i[data-color="sh_textmore"]'      => array(
        'color'         	=> $color_teacher_textmore,
    ),
    'i[data-color="sh_textmore"]:hover'      => array(
        'color'         	=> $color_teacher_textmore_hover,
    ),
    'a[data-color="sh_teacher"]' => array(
        'color'             =>  $color_title_teacher,
    ),
    'a[data-color="sh_teacher"]:hover' => array(
        'color'             =>  $color_title_teacher_hover,
    ),
    '[data-color="sh_level_row"] a'    => array(
        'color'             =>  $color_course,
    ),
    '[data-color="sh_level_row"] a:hover'    => array(
        'color'             =>  $color_course_hover,
    ),
    'i[data-color="social"]:hover'    => array(
        'color'             =>  $color_social_hover,
    ),
    'a[data-color="social"]'    => array(
        'background'		=>  $color_social_hover,
    ),
);
$sh_link    =  vc_build_link($sh_link);
$sh_link_url = $sh_link['url'];
$sh_link_title = $sh_link['title'];
$sh_link_target = $sh_link['target'];
$sh_link_rel = $sh_link['rel'];
if($sh_link['target'] == ' _blank'){
    $sh_link_target = ' target="_blank"';
}

if($sh_link['title'] == ''){
    $sh_link_title = esc_html__('All Teacher', 'danlet');
}


// Make css style for shortcode
if (function_exists('danlet_css_shortcode')) {
    echo danlet_css_shortcode($_shortcode_id, $setup);
}
$list_category = '';
$list_post = '';
if($max_items == '' ||  $max_items <= '3'){
    $max_items = '3';
}
if($order   =='') {
    $order   = 'ASC';
}
if($order_by == '') {
    $order_by = 'ID';
}
if ($post_id != NULL) {
  $list_post = explode(',', $post_id);
}

if ($id_category != NULL) {
    $list_category = explode(',', $id_category);
}
if ($id_category != NULL) {
    $args = array(
        'post_type' => 'teacher',
        'posts_per_page' => $max_items,
        'order'             =>  $order,
        'orderby'          =>  $order_by,
        'post__in'        => $list_post,
        'tax_query'         => array(
            array(
                'taxonomy'  => 'course_teacher',
                'field'     => 'id',
                'terms'     => $list_category,
            ),
        ),
    );
}
else{
    $args = array(
      'post_type' => 'teacher',
      'posts_per_page' => $max_items,
      'post__in'        => $post_id,
    );
}
$loop = new WP_Query( $args );
wp_reset_postdata();
?><!-- Section teacher list -->
<div id="<?php echo esc_attr($_shortcode_id)?>" class="sh_teacher_list <?php echo esc_attr($css_class);?>">
	<div class="container">
	<?php if($teacher_title_element != NULL) :?>
		<h3 data-color="sh_teacher_title_element" data-wow-duration="1s" class="wow fadeIn sh_teacher_title sh_teacher_title_b"><?php echo esc_attr($teacher_title_element)?></h3>
	<?php endif;?>
		<div class="row">
			<ul class="sh_teacher_show_list">
			<?php $i = 0; ?>
			<?php while($loop->have_posts()): $loop->the_post();
            $sh_level_row = danlet_postid_by_metavalue(get_the_ID(),'level_teacher');
				$i += 0.2;
            ?>
                <li class="col-lg-3 col-md-3 wow fadeInUp" data-wow-delay="<?php echo esc_attr($i) . 's' ?>">
					<div class="sh_teacher_list_box">
						<div class="sh_teacher_list_img">
							<div class="sh_teacher_img">
                            <?php echo danlet_thumbnail_image(get_the_ID())?>
							</div>
							<?php if($social == 'enable') :?>
							<ul class="sh_teacher_list_social">
								 <?php
								 	$yt = danlet_get_field('social_youtube')?:danlet_get_field('social_youtube');
								 	$gl = danlet_get_field('social_google')?:danlet_get_field('social_google');
								 	$tw = danlet_get_field('social_twitter')?:danlet_get_field('social_twitter');
                        			$fb = danlet_get_field('social_facebook')?:danlet_get_field('social_facebook');
								if($yt != NULL) : ?>
								<li class="sh_bgtc_list_social_vm"><a data-color="social" href="<?php echo esc_url($yt);?>" title="youtube"><i data-color="social" class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
								<?php endif; if($gl != NULL) : ?>
								<li class="sh_bgtc_list_social_vm"><a data-color="social" href="<?php echo esc_url($gl);?>" title="google +"><i data-color="social" class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								<?php endif; if($tw != NULL) : ?>
								<li class="sh_bgtc_list_social_vm"><a data-color="social" href="<?php echo esc_url($tw);?>" title="twitter"><i data-color="social" class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<?php endif; if($fb != NULL) : ?>
								<li class="sh_bgtc_list_social_vm"><a data-color="social" href="<?php echo esc_url($fb);?>" title="facebook"><i data-color="social" class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<?php endif;?>
							</ul>
						<?php endif; ?>
						</div>
						<div class="sh_teacher_list_content">
							<h3 class="sh_teacher_list_name sh_teacher_list_name_b">
								<a data-color="sh_teacher" href="<?php echo get_permalink();?>" title="<?php echo get_the_title();?>" target="_blank"><?php echo get_the_title();?></a>
							</h3>
							<p data-color="sh_level_row" class="sh_teacher_list_job">
                            <?php
                            if($sh_level_row != NULL):
                                $teach = array();
                                foreach ($sh_level_row as $key => $value) :
                                    $teach[] = '<a  data-color="sh_level_row" href="'.get_permalink($value['post_id']).'">'.get_the_title($value['post_id']).'</a>';
                                endforeach;
                            echo implode(' ,',$teach);
                            endif;
                        ?></p>
						</div>
					</div>
				</li>
			<?php endwhile;?>
			</ul>
		</div>
		<div class="sh_view_all_teacher sh_view_all_teacher_vm">
		<?php if($sh_link_url != NULL) :?>
            <a data-color="sh_textmore" href="<?php echo esc_url($sh_link_url)?>" title="<?php echo esc_attr($sh_link_title)?>"><?php echo esc_attr($sh_link_title)?>

            <i data-color="sh_textmore" class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
		<?php endif;?>
		</div>
	</div>
</div>
<!-- End Section teacher list -->
