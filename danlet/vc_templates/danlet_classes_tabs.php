<?php
/**
 * @see Shortcode Classes
 * @param Tabs
 * @author VNMilky
 * VC_Template
 */
//Single
$option_single =
$single_category =
$single_id =
$order_by =
$order =
$max_items =
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
$color_tabs  =
$color_tabs_hover =
$color_number =
$color_slash =
$color_line =
$advanded_enable =
$background_color =
$_shortcode_id =
//Extra
$option_tabs =
$css = '';
extract(shortcode_atts(array(
    //Genarel

    //Single
    'option_single'             =>  '',
    'single_id'                 =>  '',
    'single_category'           =>  '',
    'option_position'           =>  '',
    'order_by'                  =>  '',
    'order'                     =>  '',
    'max_items'                 =>  '',
    //Color
    'color_name'                =>  '',
    'color_name_hover'          =>  '',
    'color_description'         =>  '',
    'color_name_level'          =>  '',
    'color_name_level_hover'    =>  '',
    'color_teacher_label'       =>  '',
    'color_button'              =>  '',
    'color_teacher'             =>  '',
    'color_teacher_hover'       =>  '',
    'color_tabs'                =>  '',
    'color_tabs_hover'          =>  '',
    'color_number'              =>  '',
    'background_color'          =>  '',
    '_shortcode_id'             =>  '',
    //Extra
    'option_tabs'               =>  'enable',
    'css'                       =>  ''
    ),$atts));
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

$rand = rand(1, 99999);
$color_button_op =  $color_button_op_a = '';
if($color_button != NULL) {
    $color_button_op = 'rgba(0, 0, 0, 0.1)';
    $color_button_op_a =  '#fff';
}
$setup = array(
    array(
        'background'    => $background_color,
    ),
    'h4[data-color="sh_title"] a '      => array(
        'color'             => $color_name_level,
    ),
    'h4[data-color="sh_title"] a:hover '      => array(
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
    'ul[data-color="sh_tabs"] li a ' => array(
        'color'             => $color_tabs,
    ),
    'ul[data-color="sh_tabs"] li a:hover ' => array(
        'color'             => $color_tabs_hover,
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
$single_id_list ='';
if($max_items == ''){
    $max_items = '3';
}
$class = '';
if($option_position == 'right') {
    $class = ' right';
}
if($single_id != NULL) {
    $single_id_list = explode(',', $single_id);
}
if ($single_category != NULL) {
    $args = array(
        'post_type'         => 'level',
        'posts_per_page'    =>  $max_items,
        'order'             =>  $order,
        'orderby'           =>  $order_by,
        'tax_query'         => array(
            array(
                'taxonomy'      => 'course_level',
                'field'         => 'id',
                'terms'         => $single_category,
            ),
        ),
    );
}
else{
    $args = array(
      'post_type'           => 'level',
      'posts_per_page'      => $max_items,
      'post__in'            => $single_id_list,
    );
}
$loop = new WP_Query( $args );
wp_reset_postdata();
$count = count($loop->posts);
 ?><!-- Section Blog -->
<div class="acd_blog <?php echo esc_attr($css_class);?>">
    <div class="container">
            <div class="row">
                <ul class="sh_class_container acd_classes_arc">
                    <li class="sh_class_group <?php echo esc_attr($class)?> acd_class_box">
                        <div class="sh_class_img_box col-lg-6 col-md-7">
                            <div class="sh_class_img">
                                <?php $is = 1; while ($loop->have_posts()) : $loop->the_post(); ?>
                                <div data-tabs-item="tabs_item_<?php echo esc_attr($rand)?>" class="sh_single <?php echo ($is == 1)?'display':'none'; ?> classes_s_<?php echo get_the_ID(); ?>"><a href="<?php echo get_the_permalink() ?>" title="<?php echo get_the_title() ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php echo get_the_title() ?>">
                                </a>
                                </div>
                                <?php $is++;endwhile; ?>
                                <?php if($option_tabs == 'enable' && $count > 1) :?>
                                <ul data-tabs="tabs_classes_<?php echo esc_attr($rand)?>" data-color="sh_tabs" class="acd_class_level">
                                    <?php $i = 1; while ($loop->have_posts()) : $loop->the_post();
                                    $i = ($i <= 9)?'0'.$i:$i;

                                    ?>
                                    <li class="class-item"><a href="<?php echo get_page_link()?>#classes_s_<?php echo get_the_ID(); ?>" title="<?php echo get_the_title() ?>" data-filter="classes_s_<?php echo get_the_ID(); ?>"><?php echo esc_attr($i) ?>. <?php echo ucfirst(danlet_get_field('level_level')); ?></a></li>
                                <?php $i++; endwhile; ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php $id = 1; while ($loop->have_posts()) : $loop->the_post();
                            $description    = danlet_get_field('detail_description')?:danlet_get_field('detail_description');
                            $excerpt        = get_the_excerpt()?get_the_excerpt():$description;
                            $level_teacher  = danlet_get_field('level_teacher')?:danlet_get_field('level_teacher');
                        ?>
                        <div data-tabs-item="tabs_item_<?php echo esc_attr($rand)?>" class="sh_class_content <?php echo ($id == 1)?'display':'none'; ?> col-lg-6 col-md-5 classes_s_<?php echo get_the_ID(); ?>">
                            <div class="sh_class_box">
                                <h4 data-color="sh_title" class="sh_class_title sh_class_title_r">
                                    <a href="<?php echo get_the_permalink() ?>" title="<?php echo get_the_title() ?>">
                                        <?php echo esc_attr(danlet_text_strln(strip_tags(get_the_title()),50,true)); ?>
                                    </a>
                                </h4>
                                <p data-color="sh_description" class="sh_class_description">
                                    <?php echo esc_attr(danlet_text_strln(strip_tags($excerpt),200));?>
                                </p>
                                <?php if($level_teacher != NULL) :?>
                                <p data-color="sh_label" class="sh_class_teacher_job sh_class_teacher_job_b">
                                    <?php esc_html_e('Teachers:', 'danlet'); ?>
                                </p>
                                <ul data-color="sh_teacher" class="sh_class_teacher">
                                <?php
                                    $teach ='';
                                    foreach ($level_teacher as $key => $value) :
                                    $teach .= '<li class="sh_class_teacher_r"><a href="'.get_permalink($value->ID).'">'.get_the_title($value->ID).'</a></li> ';
                                    endforeach;
                                    echo danlet_html_wpkses($teach);?>
                                </ul>
                                <?php endif; ?>
                                <ul class="sh_class_book">
                                    <li>
                                    <span data-color="sh_button" class="book_now bg_booknow">
                                                <a href="<?php echo get_permalink();?>" target="_blank"  title="<?php echo get_the_title();?>"><?php echo esc_html__('View more ','danlet')?></a>
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
                    <?php $id++; endwhile; ?>
                    </li>
                </ul>
            </div>
    </div>
<?php if($option_tabs == 'enable' && $count > 1):
$tabs = 'tabs_classes_'.esc_attr($rand);
$tabs_item =  'tabs_item_'.esc_attr($rand);
do_action('danlet_js_tabs_class_list_small_hook',$tabs,$tabs_item);
endif; ?>
</div>
