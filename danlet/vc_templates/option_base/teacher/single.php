<?php
/**
 * @see Shortcode Teacher
 * @option Single
 * @author VNMilky
 * VC_Template
 */
$description = danlet_get_field('detail_description',$single_id)?:danlet_get_field('detail_description',$single_id);
$excerpt = get_the_excerpt($single_id)?get_the_excerpt($single_id):$description;
$advanded_desc = ($advanded_desc == '')?$excerpt:$advanded_desc;
$advanded_name =  ($advanded_name == '')?get_the_title($single_id):$advanded_name;
$thumbnail_url = get_the_post_thumbnail_url($single_id);
$advanded_image = ($advanded_image == '')?$thumbnail_url:wp_get_attachment_url($advanded_image);
$sh_level_row = danlet_postid_by_metavalue($single_id,'level_teacher');
$color_button_op =  $color_button_op_a = $color_link_detail_op ='';
if($color_social_hover != NULL) {
    $color_button_op = 'rgba(0, 0, 0, 0.1)';
    $color_button_op_a =  '#fff';
}
if($color_link_detail != NULL) {
    $color_link_detail_op = 'rgba(0, 0, 0, 0.5)';
}

    if($color_social_op != NULL) {
        $color_button_op_a = $color_social_op;
        $color_social_hover = '#fff';
        $color_button_op = $color_social_op;
        $color_link_detail_op = $color_link_detail;
        $color_link_detail = '#fff';
    }

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
    'a[data-color="sh_detail"]'      => array(
        'color'         	=> $color_link_detail,
    ),
    'a[data-color="sh_detail"]:hover'      => array(
        'color'         	=> $color_link_detail_op,
    ),
    'a[data-color="sh_teacher"]' => array(
        'color'             =>  $color_title_teacher,
    ),
    'h4[data-color="sh_teacher_s"]:before' => array(
        'background'             =>  $color_title_teacher,
    ),

    'a[data-color="sh_teacher"]:hover' => array(
        'color'             =>  $color_title_teacher_hover,
    ),
    'p[data-color="sh_label"]'    => array(
        'color'             =>  $color_label_course,
    ),
    'a[data-color="sh_level_row"]'    => array(
        'color'             =>  $color_course,
    ),
    'a[data-color="sh_level_row"]:hover'    => array(
        'color'             =>  $color_course_hover,
    ),
    'p[data-color="sh_description"]'    => array(
        'color'             =>  $color_description,
    ),
    'polygon[data-color="svg_fill_top"]'    => array(
        'fill'             =>  $acd_svg_bg_top,
    ),
    'polygon[data-color="svg_fill_bot"]'    => array(
        'fill'             =>  $acd_svg_bg_bottom,
    ),
    'span[data-color="sh_button"] a' => array(
        'color'             => $color_button_op_a,
    ),
    'span[data-color="sh_button"] ' => array(
        'background'        =>  $color_social_hover,
    ),
    'span[data-color="sh_button"]:hover a' => array(
        'color'             => $color_social_hover,
    ),
    'span[data-color="sh_button"]:hover' => array(
        'background'        =>  $color_button_op,
    ),

);
// Make css style for shortcode
if (function_exists('danlet_css_shortcode')) {
    echo danlet_css_shortcode($_shortcode_id, $setup);
}
?><!-- Section teacher -->
<div id="<?php echo esc_attr($_shortcode_id)?>" class="sh_teacher_hm sh_teacher_hm_pd <?php echo esc_attr($css_class);?>">
	<?php if($acd_svg_location_top != ''): ?>
		<?php if($acd_svg_location_top == 'svgtopleft'){ ?>
			<svg class="svg_danlet set_svg_top" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" <?php echo danlet_set_zindex_svg($acd_svg_prio_top); ?>>
			  	<polygon data-color="svg_fill_top" points="0 <?php echo esc_attr($acd_svg_view); ?>,1920 0,0 0" class="acd_white fill" ></polygon>
			</svg>
		<?php } elseif($acd_svg_location_top == 'svgtopright'){ ?>
			<svg class="svg_danlet set_svg_top" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" <?php echo danlet_set_zindex_svg($acd_svg_prio_top); ?> >
			  	<polygon data-color="svg_fill_top" points="1920 <?php echo esc_attr($acd_svg_view); ?>,1920 0,0  0" class="acd_white fill" ></polygon>
			</svg>
		<?php } endif; ?>

		<?php if($acd_svg_location_bottom != '') : ?>
			<?php if($acd_svg_location_bottom == 'svgbottomleft'){ ?>
				<svg class="svg_danlet set_svg_bottom" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" <?php echo danlet_set_zindex_svg($acd_svg_prio_bottom); ?>>
				  	<polygon data-color="svg_fill_bot" points="0 <?php echo esc_attr($acd_svg_view); ?>,1920 <?php echo esc_attr($acd_svg_view); ?>,0 0" class="acd_white fill" ></polygon>
				</svg>
			<?php }elseif($acd_svg_location_bottom == 'svgbottomright'){ ?>
				<svg class="svg_danlet set_svg_bottom" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" <?php echo danlet_set_zindex_svg($acd_svg_prio_bottom); ?>>
				  	<polygon data-color="svg_fill_bot" points="1920 <?php echo esc_attr($acd_svg_view); ?>,1920 0,0 <?php echo esc_attr($acd_svg_view); ?>" class="acd_white fill"></polygon>
				</svg>

	<?php } endif; ?>
	<div class="container">
		<div class="row">
			<div class="col-ld-6 col-md-6 col-sm-6 col-xs-12">
				<div class="sh_teacher_hm_img">
				<?php if($teacher_title_element != NULL) :?>
					<h3 data-color="sh_teacher_title_element" data-wow-delay="1s" data-wow-duration="1s" class="wow fadeIn sh_teacher_hm_title sh_teacher_hm_title_el"><?php echo esc_attr($teacher_title_element)?></h3>
				<?php endif;?>
					<div class="images wow fadeInUp" data-wow-duration="1s">
						<a href="<?php echo get_permalink($single_id);?>" title="<?php echo get_the_title($single_id);?>"><img src="<?php echo esc_url($advanded_image)?>" alt="<?php echo esc_attr($advanded_name)?>"></a>
					</div>
				</div>
			</div>
			<div class="col-ld-6 col-md-6 col-sm-6 col-xs-12">
				<div class="sh_teacher_hm_content">
					<h4 data-color="sh_teacher_s" data-wow-duration="1s" class="wow fadeInUp sh_teacher_hm_name sh_teacher_hm_name_cmb"><a data-color="sh_teacher" href="<?php echo get_permalink($single_id);?>" title="<?php echo esc_attr($advanded_name)?>"><?php echo esc_attr($advanded_name)?></a></h4>
					<?php if($sh_level_row != NULL) :?>
					<p class="sh_teacher_hm_teach wow fadeInUp" data-wow-delay="0.25s" data-color="sh_label">
						<?php
                            esc_html_e('Teach:' , 'danlet');
							$teach =array();
    						foreach ($sh_level_row as $key => $value) :
                            	$teach[] = '<span><a  data-color="sh_level_row" href="'.get_permalink($value['post_id']).'">'.get_the_title($value['post_id']).'</a></span>';
                         	endforeach;
                     		echo implode(' ,',$teach);
                     	?>
					</p>
					<?php endif;?>
					<p data-color="sh_description" data-wow-delay="0.5s" class="wow fadeInUp sh_teacher_hm_desc sh_teacher_hm_desc_cbl">
					<?php print(danlet_text_strln(strip_tags($advanded_desc),300));?>
					</p>
                    <?php if($option_viewall == 'enable'):?>
					<ul class="sh_teacher_hm_tb wow fadeIn" data-wow-delay="1s">
						<li class="sh_teacher_hm_tb_cvm"><span data-color="sh_button" class="sh_teacher_hm_tb_bgvm"><a href="<?php echo get_permalink($single_id);?>#timetable" target="_blank" title="<?php echo esc_attr($advanded_name)?>"><i class="fa fa-th-large" aria-hidden="true"></i></a></span></li>
						<li class="sh_teacher_hm_tb_cvm"><a class="acd_btn_awe" data-color="sh_detail" href="<?php echo get_permalink($single_id)?>" title="<?php echo esc_attr($advanded_name)?>"><?php echo esc_html__('View more ','danlet')?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
					</ul>
                <?php endif;?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end section teacher -->
