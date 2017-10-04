<?php
/**
 * @see Shortcode Classes
 * @author VNMilky
 * VC_Template
 */
$sh_title_element =
$option_position =
$single_id =
//Advanced
$advanded_name =
$advanded_desc =
$advanded_number =
$advanded_image =
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
$color_number =
$background_color =
$_shortcode_id =
//Extra
$option_tabs =
$css = '';
extract(shortcode_atts(array(
    //Genarel
    'sh_title_element'             =>  '',
    //Single
    'option_position'           =>  '',
    //Full
    'single_id'                  =>  '',
    //Advanded
    'advanded_name'             =>  '',
    'advanded_desc'             =>  '',
    'advanded_number'           =>  '',
    'advanded_image'            =>  '',
    'view_more'                 =>  esc_html__('View more' , 'danlet'),
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
    'color_number'              =>  '',
    'background_color'          =>  '',
    '_shortcode_id'          =>  '',
    //Extra
    'option_tabs'               =>  'enable',
    'css'                       =>  ''
    ),$atts));
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$rand = rand(1, 99999);
//Include Option
$color_button_op =  $color_button_op_a = '';
if($color_button != NULL) {
    $color_button_op = 'rgba(0, 0, 0, 0.1)';
    $color_button_op_a =  '#fff';
}
$setup = array(
    array(
        'background'    => $background_color,
    ),
    'span[data-color="sh_number"]' => array(
        'color'             => $color_number,
    ),
    'p[data-color="sh_description"]' => array(
        'color'             => $color_description,
    ),
    'h2[data-color="sh_title"]' => array(
        'color'            => $color_title,
    ),
    'h4[data-color="sh_name"] a ' => array(
        'color'             => $color_name_level,
    ),
    'h4[data-color="sh_name"] a:hover ' => array(
        'color'             => $color_name_level_hover,
    ),
    'p[data-color="sh_label"]' => array(
        'color'             => $color_teacher_label,
    ),
    'ul[data-color="sh_teacher"] li a ' => array(
        'color'             => $color_teacher,
    ),
    'ul[data-color="sh_teacher"] li a:hover ' => array(
        'color'             => $color_teacher_hover,
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
?>
 <div id="<?php echo esc_attr($_shortcode_id)?>" class="sh_classes <?php echo esc_attr($css_class);?>">
 <div class="container">
        <?php if($sh_title_element != NULL ) :?>
            <div class="sh_class_main_title">
                <h2 data-color="sh_title" class="sh_classes_title_b"><?php echo esc_attr($sh_title_element);?></h2>
            </div>
        <?php endif;?>
            <div class="row">
                <ul class="sh_class_container sh_class_padding">
                <?php
                        $description    = danlet_get_field('detail_description',$single_id)?:danlet_get_field('detail_description',$single_id);
                        $excerpt        = get_the_excerpt($single_id)?get_the_excerpt($single_id):$description;
                        $advanded_desc = ($advanded_desc == '')?$excerpt:$advanded_desc;
                        $level_teacher  = danlet_get_field('level_teacher',$single_id)?:danlet_get_field('level_teacher',$single_id);
                        $advanded_number = ($advanded_number == '')?'1':$advanded_number;
                        $advanded_number = ($advanded_number < 9)? '0'.$advanded_number:$advanded_number;

                        $advanded_name =  ($advanded_name == '')?get_the_title($single_id):$advanded_name;
                        $class = '';
                        if($option_position == 'right') {
                            $class = ' right';
                        }
                    ?>
                    <li class="sh_class_group<?php echo esc_attr($class)?>">
                        <div class="sh_class_img_box col-md-7 col-xs-12">
                            <div class="sh_class_img wow fadeIn" data-wow-duration="1s">
                                <a  href="<?php echo get_permalink($single_id);?>" title="<?php echo esc_attr($advanded_name)?>">
                                        <?php if($advanded_image != ''){
                                                 $image = wp_get_attachment_url($advanded_image);
                                                echo sprintf('<img src="%s" alt="%s">',$image,$advanded_name);

                                            }  else {
                                                  echo danlet_thumbnail_image($single_id);
                                            }
                                            ?>
                                </a>
                                <span data-wow-delay="1s" data-color="sh_number" class="wow fadeIn sh_class_date sh_font_el"><?php echo esc_attr( $advanded_number);?></span>
                            </div>
                        </div>
                        <div class="sh_class_content col-md-5 col-xs-12">
                            <div class="sh_class_box">
                                <h4  data-color="sh_name" class="wow fadeInUp sh_class_title sh_class_title_r">
                                    <a href="<?php echo get_permalink($single_id);?>" title="<?php echo esc_attr($advanded_name)?>">
                                        <?php echo esc_attr($advanded_name)?>
                                    </a>
                                </h4>
                                <p data-wow-delay="0.15s" data-color="sh_description" class="wow fadeInUp sh_class_description">
                                    <?php echo esc_attr(danlet_text_strln(strip_tags($advanded_desc),200));?>
                                </p>
                                <?php if($level_teacher != NULL) :?>
                                <p data-wow-delay="0.85s" data-color="sh_label" class="wow fadeInUp sh_class_teacher_job sh_class_teacher_job_b">
                                    <?php esc_html_e('Teachers:','danlet')?>
                                </p>

                                <ul class="sh_class_teacher wow fadeInUp" data-wow-delay="1s" data-color="sh_teacher">
                                    <?php

                                    $teach ='';

                                        foreach ($level_teacher as $key => $value) :
                                            $teach .= '<li class="sh_class_teacher_r"><a data-value="'.get_the_title($value->ID).'" href="'.get_permalink($value->ID).'">'.get_the_title($value->ID).'</a></li> ';
                                        endforeach;

                                    echo danlet_html_wpkses($teach);?>
                                </ul>
                                <?php endif;?>
                                <ul class="sh_class_book wow fadeInUp" data-wow-delay="1.5s">
                                    <li>
                                        <span data-color="sh_button" class="book_now bg_booknow">
                                            <a href="<?php echo get_permalink($single_id);?>"  target="_blank" title="<?php echo get_the_title();?>"><?php echo esc_attr($view_more); ?></a>
                                        </span>
                                    </li>
                                    <li>
                                        <span data-color="sh_icon" class="sh_class_timetable sh_bg_timetable">
                                                <a data-color="sh_icon" href="<?php echo get_permalink($single_id);?>#timetable"  target="_blank" title="<?php echo get_the_title();?>"><i class="fa fa-th-large" aria-hidden="true"></i></a>
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
