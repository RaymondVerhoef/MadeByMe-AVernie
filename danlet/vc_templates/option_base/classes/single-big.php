<?php
/**
 * @see Shortcode Classes
 * @param Single - Big
 * @author VNMilky
 * VC_Template
 */
$color_button_op =  '';
if($color_button != NULL) {
    $color_button_op = 'rgba(0, 0, 0, 0.1)';
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
    'span[data-color="sh_button"] ' => array(
        'color'             => $color_button_op,
        'background'        =>  $color_button,
    ),
    'span[data-color="sh_button"]:hover ' => array(
        'color'             => $color_button,
        'background'        =>  $color_button_op,
    ),
    'span[data-color="sh_icon"] i' => array(
        'color'             =>  $color_button,
        'background'        =>  $color_button_op,
    ),

);
if (function_exists('danlet_css_shortcode')) {
    echo danlet_css_shortcode('shortcode-classes-big-'.$rand, $setup);
}

$single_id_list ='';
if($option_position == '') {
    $option_position == 'list';
}
if($option_position ==  'left' || $option_position == 'right'){
    $max_items =  '1';
}
else {
    if($max_items == ''){
        $max_items = '1';
    }
    else {
        $max_items =  $max_items;
    }
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
 ?><!-- Section classes -->
<div id="shortcode-classes-big-<?php echo esc_attr($rand)?>"  class="sh_classes sh_classes_pd <?php echo esc_attr($css_class);?>">
    <div class="container">
     <?php if($title_element != NULL ) :?>
        <div class="sh_class_main_title">
            <h2 data-color="sh_title" class="sh_classes_title_b"><?php echo esc_attr($title_element);?></h2>
        </div>
        <?php endif;?>
        <div class="row">
            <ul class="sh_class_container sh_class_padding2">
            <?php
                if($loop->have_posts()):
                    $i=1;
                    while($loop-> have_posts()) : $loop->the_post();
                        $description    = danlet_get_field('detail_description')?:danlet_get_field('detail_description');
                        $excerpt        = get_the_excerpt()?get_the_excerpt():$description;
                        $level_teacher  = danlet_get_field('level_teacher')?:danlet_get_field('level_teacher');
                        $advanded_desc = ($advanded_desc == '')?$excerpt:$advanded_desc;
                        $advanded_name =  ($advanded_name == '')?get_the_title():$advanded_name;
                        $advanded_label = ($advanded_label == '')?esc_html__('Teachers','danlet'):$advanded_label;
                    $name = $advanded_name;
                    if($i < 9) {
                        $i = '0'.$i;
                    }
                    $class = '';
                    if($option_position == 'right') {
                        $class = ' right';
                    }
                    else {
                        if(($i%2)==0){
                            $class = ' right';
                        }
                    }
                    $image_top_big =  danlet_get_field('image_top_big');
                    $image_top_big = $image_top_big['url'];
                    $image_top_small =  danlet_get_field('image_top_small');
                    $image_top_small = $image_top_small['url'];
                    $advanded_image = ($advanded_image == '')?$image_top_big:wp_get_attachment_url($advanded_image);
                    $advanded_image_2 = ($advanded_image_2 == '')?$image_top_small:wp_get_attachment_url($advanded_image_2);

                    $img_topb = '';
                    $img_tops =  '';
                    if($advanded_image != NULL) {
                        $img_topb =  sprintf('<span style="background : url(%s); background-size: cover;" >%s</span>',$advanded_image,$name);

                    }
                    if($advanded_image_2 != NULL) {
                        $img_tops =  sprintf('<span style="background : url(%s); background-size: cover;" >%s</span>',$advanded_image_2,$name);

                    }
                    ?>
                <li class="sh_class_group<?php echo esc_attr($class)?>">
                    <div class="sh_class_img_box sh_classes_two_img_box col-lg-7 col-md-7">
                        <div class="sh_class_two_img">
                            <?php echo esc_attr($img_topb) ?>
                        </div>
                        <div class="sh_class_two_img_ab">
                          <?php echo esc_attr($img_tops) ?>
                        </div>
                    </div>
                    <div class="sh_class_content col-lg-5 col-md-5">
                        <div class="sh_class_box">
                            <h4 data-color="sh_name" class="sh_class_title sh_class_title_r">
                                <a href="<?php echo get_permalink();?>" title=" <?php echo esc_attr($name) ?>">
                                    <?php echo esc_attr($name) ?>
                                </a>
                            </h4>
                            <p data-color="sh_description" class="sh_class_description">
                               <?php echo esc_attr(danlet_text_strln(strip_tags($advanded_desc),200));?>
                            </p>
                            <?php if($level_teacher != NULL) :?>
                            <p data-color="sh_label" class="sh_class_teacher_job sh_class_teacher_job_b">
                                <?php echo esc_attr($advanded_label)?>
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
                                                <a target="_blank"  href="<?php echo get_permalink();?>" title="<?php echo get_the_title();?>"><?php esc_html_e('View more ','danlet')?></a>
                                            </span>

                                    </li>
                                    <li>
                                        <span data-color="sh_icon" class="sh_class_timetable sh_bg_timetable">
                                                <a data-color="sh_icon" href="<?php echo get_permalink();?>#timetable"  target="_blank" title="<?php echo get_the_title();?>"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                            </span>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </li>
       <?php $i++;endwhile;endif;?>

            </ul>
        </div>
    </div>
</div>
<!-- End section classes -->