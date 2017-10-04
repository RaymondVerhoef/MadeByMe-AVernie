<?php
$nav = '';
if($option_nav == 'disable') {
	$nav = 'none';
}
$setup      = array(
	array(
		'background'	=> $background_color,
	),
    'h3[data-color="sh_title"]'      => array(
        'color'         	=> $color_title_element,
    ),
     'h3[data-color="sh_title"]:hover'      => array(
        'color'         	=> $color_title_element_hover,
    ),
    'h2[data-color="sh_name"]' => array(
        'color'             =>  $color_title_video,
    ),
    'h2[data-color="sh_name"]:hover' => array(
        'color'             =>  $color_title_video_hover,
    ),
    'span[data-color="acd_view"]'    => array(
        'color'             =>  $color_view_video,
    ),
    'i[data-color="icon_view"]'    => array(
        'color'             =>  $color_view_video,
    ),

    'span[data-color="acd_like"]'    => array(
        'color'             =>  $color_like_video,
    ),
    'i[data-color="icon_like"]'    => array(
        'color'             =>  $color_like_video,
    ),
    '.ms-nav-prev, .ms-nav-next'    => array(
        'display'             =>  $nav,
    ),

);
// Make css style for shortcode
if (function_exists('danlet_css_shortcode')) {
    echo danlet_css_shortcode($_shortcode_id, $setup);
}
?><!-- section slider-video -->
<div id="<?php echo esc_attr($_shortcode_id)?>" class="acd_classes_detail_video acd_video_bg <?php echo esc_attr($css_class);?>">
<?php if($video_title_element != NULL) :?>
	<h3 data-color="sh_title" class="acd_classes_detail_video_title"><?php echo esc_attr($video_title_element);?></h3>
	<?php endif;?>
	<div class="ms-caro3d-template ms-caro3d-wave acd_classes_detail_video_box">
    <!-- masterslider -->
        <div class="sh_ms_slider master-slider ms-skin-default" id="master-video-<?php echo esc_attr($rand)?>">
        	<?php
	        if($loop->have_posts()):
	        	while($loop-> have_posts()) : $loop->the_post();
	        		$view = beau_getpost_view(get_the_ID());
			        $like = beau_getpost_like(get_the_ID());

	        ?><div class="acd_video_box ms-slide">
				<div class="acd_video_img">
					<a href="<?php echo get_permalink();?>" target="_blank" title="<?php echo get_the_title();?>"><?php echo danlet_thumbnail_image(get_the_ID()) ?></a>
				</div>
				<div class="acd_video_detail_content_view">
						<h2 data-color="sh_name" class="acd_video_detail_name"><?php echo get_the_title();?></h2>
						<ul class="acd_video_detail_total_view">
							<li>
								<span data-color="acd_view"><?php echo esc_attr($view);?></span>
								<i data-color="icon_view" class="fa fa-eye" aria-hidden="true"></i>
							</li>
							<li><span data-color="acd_like">/ <?php
                                if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
                                echo get_comments_number();
                                endif;?></span>
								<i data-color="icon_like" class="fa fa-comment-o" aria-hidden="true"></i>
							</li>
						</ul>
				</div>
			</div>
		<?php
				endwhile;
			endif;
			?>
        </div>
	</div>
</div>
<?php
$danlet_master_prefix = 'video';
do_action('danlet_js_master_slider_hook',$rand,$danlet_master_prefix);
?>
<!-- End section slider-video -->