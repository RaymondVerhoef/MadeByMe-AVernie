<?php
/**
 * @see Shortcode Classes
 * @param Full
 * @author VNMilky
 * VC_Template
 */
//Color
$color_button_op =  $color_button_op_a = '';
if($color_button != NULL) {
    $color_button_op = 'rgba(0, 0, 0, 0.1)';
    $color_button_op_a =  '#fff';
}
$setup = array(
    array(
        'background'    => $background_color,
    ),
    'ul[data-color="sh_category"] li a '      => array(
        'color'             => $color_name,
    ),
    'ul[data-color="sh_category"] li a:hover '      => array(
        'color'             => $color_name_hover,
    ),
    'ul[data-color="sh_category"] li.active:before ' => array(
        'background'            => $color_name,
    ),
    'ul[data-color="sh_category"]' => array(
        'border-color'          => $color_line,
    ),
    'h4[data-color="sh_title"] a ' => array(
        'color'             => $color_name_level,
    ),
    'h4[data-color="sh_title"] a:hover ' => array(
        'color'             => $color_name_level_hover,
    ),
    'h4[data-color="sh_title"]:before ' => array(
        'background'            => $color_slash,
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
    echo danlet_css_shortcode('shortcode-classes-'.$rand, $setup);
}
//Data

$list_category = '';
$list_post = '';
if($max_items == ''){
    $max_items = -1;
}
if($option_tabs == ''){
  if($option_data == 'inid') {
    $option_tabs = 'disable';
    }
    else {
         $option_tabs = 'enable';
    }
}
if($order   =='') {
    $order   = 'ASC';
}
if($order_by == '') {
    $order_by = 'ID';
}
if($post_id != NULL) {
    $list_post = explode(',',$post_id);
}
if ($id_category != NULL) {
    $list_category = explode(',',$id_category);
}
if ($id_category != NULL) {
    $args = array(
        'post_type'         => 'level',
        'posts_per_page'    =>  $max_items,
        'order'             =>  $order,
        'orderby'           =>  $order_by,
        'tax_query'         => array(
            array(
                'taxonomy'      => 'course_level',
                'field'         => 'id',
                'terms'         => $list_category,
            ),
        ),
    );
}
else{
    $args = array(
      'post_type'           => 'level',
      'posts_per_page'      => $max_items,
      'post__in'            => $list_post,
    );
}
$loop = new WP_Query( $args );
wp_reset_postdata();
$tabs = 'list_class_'.$rand;
$content =  'content_class_'.$rand;
?><!-- Section Classes -->
<div id="<?php echo esc_attr($_shortcode_id)?>" class="acd_blog <?php echo esc_attr($css_class);?>">
    <div class="container">
    <?php if($option_tabs == 'enable') :
            if($id_category == NULL) {
                    $terms = get_terms( array(
                        'taxonomy' => 'course_level',
                        'hide_empty' => true,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ));
                    foreach ($terms as $term) {
                            if(is_object($term)) {
                                $list_category[] = $term->term_id;
                            }
                        }
                }
    ?>

        <div class="acd_classes_cat">
            <ul data-tabs="<?php echo esc_attr($tabs);?>" data-color="sh_category" class="acd_classes_cat_list">
                <li class="active"><a href="<?php echo get_page_link()?>#" class="acd_black text" data-filter="all"><?php echo esc_html__('All','danlet') ?><span>[<?php echo wp_count_posts('level')->publish; ?>]</span></a></li>
                <?php
                    if(is_array($list_category) == true) :
                    foreach ($list_category as $key => $value) :
                         $terms = get_term_by('id',$value,'course_level', ARRAY_A);
                         $count_post = danlet_post_by_posttype_taxonomy('level',$terms['term_id'],'count');

                ?>
                <li><a href="<?php echo get_page_link()?>#<?php echo esc_attr($terms['name']) ?>" class="acd_black text" data-filter="classes_<?php echo esc_attr($terms['term_id']) ?>"><?php echo esc_attr($terms['name']) ?><span>[<?php echo esc_attr($count_post) ?>]</span></a></li>
                <?php endforeach; endif; ?>
            </ul>
        </div>
        <?php endif; ?>
        <div class="row">
            <ul data-tabs-content="<?php echo esc_attr($content)?>" class="acd_classes_list">
            <?php if($loop->have_posts()):
                    while($loop-> have_posts()) : $loop->the_post();
                        $level_teacher = danlet_get_field('level_teacher')?:danlet_get_field('level_teacher');
                        $term_list = wp_get_post_terms(get_the_ID(), 'course_level', array("fields" => "ids"));
                        $term_list_tabs = '';
                            foreach ($term_list as $key => $value) {
                                $term_list_tabs[] = 'classes_'.$value;
                            }
                            if($term_list_tabs != NULL ) {
                                $term_list_tabs =  implode(' ',$term_list_tabs);
                            }

                      ?>
                <li class="col-lg-6 col-md-6 <?php echo esc_attr($term_list_tabs);?>">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 ">
                            <div class="sh_class_img">
                                <a href="<?php echo get_permalink();?>" title="<?php echo get_the_title();?>">
                                   <?php echo danlet_thumbnail_image(get_the_ID())?>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 acd_classes_content">
                            <div class="sh_class_box">
                                <h4 data-color="sh_title" class="sh_class_title">
                                    <a href="<?php echo get_permalink();?>" title="<?php echo get_the_title();?>">
                                        <?php echo get_the_title();?>
                                    </a>
                                </h4>
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
                                                <a href="<?php echo get_permalink();?>"  target="_blank" title="<?php echo get_the_title();?>"><?php esc_html_e('View more ','danlet')?></a>
                                            </span>
                                        </li>
                                        <li>
                                            <span data-color="sh_icon" class="sh_class_timetable sh_bg_timetable">
                                                <a data-color="sh_icon"  target="_blank" href="<?php echo get_permalink();?>#timetable" title="<?php echo get_the_title();?>"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                            </span>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endwhile; endif; ?>
            </ul>
        </div>
    </div>
</div>
<?php if($option_tabs == 'enable'):
do_action('danlet_js_tabs_class_list_hook',$tabs,$content);
 endif;?>
<!-- End Section Classes -->
