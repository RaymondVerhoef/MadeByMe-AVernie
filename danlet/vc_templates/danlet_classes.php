<?php
/**
 * @see Shortcode Classes
 * @author VNMilky
 * VC_Template
 */
$sh_title_element =
$option_position =
//Single
$single_id =
//Advanced
$advanded_name =
$advanded_desc =
$advanded_image =
$advanded_image_2 =
//Color
$color_title =
$color_name =
$color_name_hover =
$color_description =
$color_name_level =
$color_name_level_hover =
$color_teacher_label =
$color_button =
$color_teacher =
$color_teacher_hover =
$background_color =
$_shortcode_id =
//Extra
$css = '';
extract(shortcode_atts(array(
    'option_position'     =>  '',
    'sh_title_element'             =>  '',
    //Single
    'single_id'                 =>  '',
    //Advanded
    'advanded_name'             =>  '',
    'view_more'                 =>  esc_html__('View more' , 'danlet'),
    'advanded_desc'             =>  '',
    'advanded_image'            =>  '',
    'advanded_image_2'          =>  '',
    //Color
    'color_title'               =>  '',
    'color_name'                =>  '',
    'color_name_hover'          =>  '',
    'color_description'         =>  '',
    'color_name_level'          =>  '',
    'color_name_level_hover'    =>  '',
    'color_teacher_label'       =>  '',
    'color_button'              =>  '',
    'color_teacher'             =>  '',
    'color_teacher_hover'       =>  '',
    'background_color'          =>  '',
    '_shortcode_id'          =>  '',
    //Extra
    'css'                       =>  ''
	),$atts));
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

/**
 * @see Shortcode Classes
 * @param Single - Big
 * @author VNMilky
 * VC_Template
 */
$color_button_op =  $color_button_op_a = '';
if($color_button != NULL) {
    $color_button_op = 'rgba(0, 0, 0, 0.1)';
    $color_button_op_a =  '#fff';
}
$setup = array(
    array(
        'background'    => $background_color,
    ),
    'h2[data-color="sh_title"]  '      => array(
        'color'             => $color_title,
    ),
    'h4[data-color="sh_name"] a '      => array(
        'color'             => $color_name_level,
    ),
    'h4[data-color="sh_name"] a:hover '      => array(
        'color'             => $color_name_level_hover,
    ),
     'p[data-color="sh_description"]  '      => array(
        'color'             => $color_description,
    ),
    'p[data-color="sh_label"]' => array(
        'color'             => $color_teacher_label,
    ),
    'ul[data-color="sh_teacher"] li a ' => array(
        'color'             => $color_teacher,
    ),
    'ul[data-color="sh_teacher"] li a ' => array(
        'color'             => $color_teacher,
    ),
    'span[data-color="sh_button"] a' => array(
        'color'             => $color_button_op_a,
    ),
    'span[data-color="sh_button"] ' => array(
        'background'        =>  $color_button,
    ),
    'span[data-color="sh_button"]:hover a' => array(
        'color'             => $color_button,
    ),
    'span[data-color="sh_button"]:hover' => array(
        'background'        =>  $color_button_op,
    ),
    'span[data-color="sh_icon"]:hover a' => array(
        'color'             => $color_button_op_a,
    ),
    'span[data-color="sh_icon"]:hover ' => array(
        'background'        =>  $color_button,
    ),
    'span[data-color="sh_icon"] a' => array(
        'color'             => $color_button,
    ),
    'span[data-color="sh_icon"]' => array(
        'background'        =>  $color_button_op,
    ),

);
if (function_exists('danlet_css_shortcode')) {
    echo danlet_css_shortcode($_shortcode_id, $setup);
}
if($option_position == '') {
    $option_position == 'left';
}
if($single_id == '') {
    $args = array(
        'post_type' => 'level',
        'posts_per_page' => 1,
    );
    $loop = new WP_Query($args);
    wp_reset_postdata();
    $single_id = $loop->posts[0]->ID;
}
 ?><!-- Section classes -->
<div id="<?php echo esc_attr($_shortcode_id)?>"  class="sh_classes sh_classes_pd <?php echo esc_attr($css_class);?>">
    <div class="container">
     <?php if($sh_title_element != NULL ) :?>
        <div class="sh_class_main_title">
            <h2 data-color="sh_title" class="sh_classes_title_b"><?php echo esc_attr($sh_title_element);?></h2>
        </div>
        <?php endif;?>
        <div class="row">
            <ul class="sh_class_container sh_class_padding2">
            <?php

                        $description    = danlet_get_field('detail_description',$single_id)?:danlet_get_field('detail_description',$single_id);
                        $excerpt        = get_the_excerpt($single_id)?get_the_excerpt($single_id):$description;
                        $level_teacher  = danlet_get_field('level_teacher',$single_id)?:danlet_get_field('level_teacher',$single_id);
                        $advanded_desc = ($advanded_desc == '')?$excerpt:$advanded_desc;
                        $advanded_name =  ($advanded_name == '')?get_the_title($single_id):$advanded_name;
                    $name = $advanded_name;
                    $class = '';
                    if($option_position == 'right') {
                        $class = ' right';
                    }
                    $image_top_big =  danlet_get_field('image_top_big',$single_id);
                    $image_top_big = $image_top_big['url'];
                    $image_top_small =  danlet_get_field('image_top_small',$single_id);
                    $image_top_small = $image_top_small['url'];
                    $advanded_image = ($advanded_image == '')?$image_top_big:wp_get_attachment_url($advanded_image);
                    $advanded_image_2 = ($advanded_image_2 == '')?$image_top_small:wp_get_attachment_url($advanded_image_2);

                    $img_topb = '';
                    $img_tops =  '';
                    ?>
                <li class="sh_class_group<?php echo esc_attr($class)?>">
                    <div class="sh_class_img_box sh_classes_two_img_box col-lg-7 col-md-6">
                        <div class="sh_class_two_img wow fadeIn" data-wow-duration="1s">
                            <?php if($advanded_image != NULL) {
                                echo sprintf('<span style="background : url(%s); background-size: cover;" >%s</span>',$advanded_image,$name);
                                } ?>
                        </div>
                        <div class="sh_class_two_img_ab wow fadeIn" data-wow-delay="0.5s" data-wow-duration="1s">
                          <?php if($advanded_image_2 != NULL) {
                            echo sprintf('<span style="background : url(%s); background-size: cover;" >%s</span>',$advanded_image_2,$name);

                        } ?>
                        </div>
                    </div>
                    <div class="sh_class_content col-lg-5 col-md-6">
                        <div class="sh_class_box">
                            <h4 data-color="sh_name" data-wow-duration = "1s" class="wow fadeInUp sh_class_title sh_class_title_r">
                                <a href="<?php echo get_permalink($single_id);?>" title=" <?php echo esc_attr($name) ?>">
                                    <?php echo esc_attr($name) ?>
                                </a>
                            </h4>
                            <p data-color="sh_description" data-wow-delay = "0.2s" class="wow fadeInUp sh_class_description">
                               <?php echo esc_attr(danlet_text_strln(strip_tags($advanded_desc),200));?>
                            </p>
                            <?php if($level_teacher != NULL) :?>
                            <p data-color="sh_label" data-wow-delay = "0.3s"  class="wow fadeInUp sh_class_teacher_job sh_class_teacher_job_b">
                            <?php esc_html_e('Level :','danlet')?>
                            </p>
                            <ul data-color="sh_teacher" data-wow-delay = "0.4s" class="sh_class_teacher wow fadeIn">
                                <?php
                                    $teach ='';
                                        foreach ($level_teacher as $key => $value) :
                                            $teach .= '<li class="sh_class_teacher_r"><a href="'.get_permalink($value->ID).'">'.get_the_title($value->ID).'</a></li> ';
                                        endforeach;

                                    echo danlet_html_wpkses($teach);?>
                            </ul>
                            <?php endif; ?>
                            <ul class="sh_class_book wow fadeIn" data-wow-delay = "1s">
                                 <li>
                                    <span data-color="sh_button" class="book_now bg_booknow">
                                                <a href="<?php echo get_permalink();?>" target="_blank"  title="<?php echo get_the_title();?>"><?php echo esc_attr($view_more)?></a>
                                            </span>

                                    </li>
                                    <li>
                                        <span data-color="sh_icon" class="sh_class_timetable sh_bg_timetable">
                                                <a data-color="sh_icon" href="<?php echo get_permalink();?>#timetable" target="_blank"  title="<?php echo get_the_title();?>"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                            </span>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End section classes -->
