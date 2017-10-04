<?php
/**
 * @see Shortcode Teacher
 * @option Table
 * @author VNMilky
 * VC_Template
 */
$color_button_op =  $color_button_op_a = '';
if($color_social_hover != NULL) {
    $color_button_op = 'rgba(0, 0, 0, 0.1)';
    $color_button_op_a =  '#fff';
}
$setup      = array(
	array(
		'background'	=> $background_color,
	),
    'h3[data-color="sh_teacher_title_element"]'      => array(
        'color'         	=> $color_title_element,
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
    'a[data-color="social"] ' => array(
        'color'         	=>  $color_button_op_a,
        'background'		=>	$color_social_hover,
    ),
    'a[data-color="social"]:hover ' => array(
        'color'         	=> 	$color_social_hover,
        'background'		=>	$color_button_op,
    ),
    'a[data-color="sh_button"] ' => array(
        'color'         	=> $color_button_op_a,
        'background'		=>	$color_social_hover,
    ),
    'a[data-color="sh_button"]:hover ' => array(
        'color'         	=> 	$color_social_hover,
        'background'		=>	$color_button_op,
    ),
);
// Make css style for shortcode
if (function_exists('danlet_css_shortcode')) {
    echo danlet_css_shortcode($_shortcode_id, $setup);
}
$list_category = '';
$list_post = '';
if($max_items == ''){
    $max_items = -1;
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
if($list_post == NULL && $list_category == NULL) {
    $args = array(
      'post_type'           => 'teacher',
      'posts_per_page'      => $max_items,
    );
} else {
    if($list_category != NULL) {
        $args = array(
            'post_type'         => 'teacher',
            'posts_per_page'    =>  $max_items,
            'order'             =>  $order,
            'orderby'           =>  $order_by,
            'tax_query'         => array(
                array(
                    'taxonomy'      => 'course_teacher',
                    'field'         => 'id',
                    'terms'         => $list_category,
                ),
            ),
        );
    }
    else {
         $args = array(
            'post_type'           => 'teacher',
            'posts_per_page'      => $max_items,
            'post__in'            => $list_post,
        );
    }
}
$loop = new WP_Query( $args );
wp_reset_postdata();
$tabs = 'list_teacher_'.$rand;
$content =  'content_teacher_'.$rand;
?>
<!--Section teacher -->
<div id="<?php echo esc_attr($_shortcode_id)?>" class="acd_blog <?php echo esc_attr($css_class);?>">
	<div class="container">
	<?php if($teacher_title_element != NULL) :?>
		<h3 data-color="sh_teacher_title_element" class="acd_teacher_title_classes_detail"><?php echo esc_attr($teacher_title_element)?></h3>
			<?php endif;?>
              <?php if($option_tabs == 'enable') :
                    if($id_category == NULL) {
                     $terms = get_terms( array(
                        'taxonomy' => 'course_teacher',
                        'hide_empty' => true,
                        'orderby' => 'name',
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
                <li class="active"><a href="<?php echo get_page_link()?>#" class="acd_black text" data-filter="all"><?php echo esc_html__('All','danlet') ?><span>[<?php echo wp_count_posts('teacher')->publish; ?>]</span></a></li>
                <?php if(is_array($list_category) == true) :
                        foreach ($list_category as $x => $s):
                            $terms = get_term_by('id',$s,'course_teacher', ARRAY_A);
                            $count_post = danlet_post_by_posttype_taxonomy('teacher',$terms['term_id'],'count');
                    ?>
                   <li><a href="<?php echo get_page_link()?>#<?php echo esc_attr($terms['slug']) ?>" class="acd_black text" data-filter="classes_<?php echo esc_attr($terms['term_id']) ?>"><?php echo esc_attr($terms['name']) ?><span>[<?php echo esc_attr($count_post) ?>]</span></a></li>
                <?php endforeach; endif; ?>
            </ul>
        </div>
        <?php endif; ?>
		<div class="row">
			<ul data-tabs-content="<?php echo esc_attr($content)?>" class="acd_teacher_list">
			<?php $i=1; while($loop->have_posts()): $loop->the_post();
				$description = danlet_get_field('detail_description')?:danlet_get_field('detail_description');
                $excerpt = get_the_excerpt()?get_the_excerpt():$description;
                $sh_level_row = danlet_postid_by_metavalue(get_the_ID(),'level_teacher');
                $term_list = wp_get_post_terms(get_the_ID(), 'course_teacher', array("fields" => "ids"));
                $term_list_tabs = '';
                    foreach ($term_list as $key => $value) {
                        $term_list_tabs[] = 'classes_'.$value;
                    }
                    if($term_list_tabs != NULL ) {
                        $term_list_tabs =  implode(' ',$term_list_tabs);
                    }
                ?>
				<li class="col-lg-6 col-md-6 col-sm-6 col-xs-12 <?php echo ((($i+4)%4==3) || (($i+4)%4==0))?'acd_teacher_right':''; ?> <?php echo esc_attr($term_list_tabs)?>">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 acd_teacher_img_box">
							<div class="acd_teacher_img">
								<a href="<?php echo get_permalink();?>" target="_blank" title="<?php echo get_the_title();?>"><?php echo danlet_thumbnail_image(get_the_ID())?></a>
								<?php if($social == 'enable') :?>
								<ul class="acd_teacher_social">
								<?php
								 	$yt = danlet_get_field('social_youtube')?:danlet_get_field('social_youtube');
								 	$gl = danlet_get_field('social_google')?:danlet_get_field('social_google');
								 	$tw = danlet_get_field('social_twitter')?:danlet_get_field('social_twitter');
                        			$fb = danlet_get_field('social_facebook')?:danlet_get_field('social_facebook');
									if($yt != NULL) : ?>
									<li ><a data-color="social" href="<?php echo esc_url($yt);?>" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
									<?php endif; if($gl != NULL) : ?>
									<li ><a data-color="social" href="<?php echo esc_url($gl);?>" title="Google +"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
									<?php endif; if($tw != NULL) : ?>
									<li ><a data-color="social" href="<?php echo esc_url($tw);?>" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<?php endif; if($fb != NULL) : ?>
									<li ><a data-color="social" href="<?php echo esc_url($fb);?>" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<?php endif;?>
								</ul>
							<?php endif; ?>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 acd_teacher_content_box">
							<div class="acd_teacher_content">
								<h3 class="acd_teacher_name">
									<a data-color="sh_teacher" href="<?php echo get_permalink();?>" title="<?php echo get_the_title();?>" target="_blank"><?php echo get_the_title();?></a>
								</h3>
								<div data-color="sh_level_row" class="acd_teacher_class">
									<?php if($sh_level_row != NULL) :?>
									<span>Teach: </span>
									<?php
                                $teach ='';
                                foreach ($sh_level_row as $key => $value) :
                                    $teach[] = '<a  data-color="sh_level_row" href="'.get_permalink($value['post_id']).'">'.get_the_title($value['post_id']).'</a>';
                                endforeach;
                           	 	echo implode(' ,',$teach);
                        		endif;	?>
								</div>
								<div class="acd_teacher_desc">
									<?php print(danlet_text_strln(strip_tags($excerpt),100));?>
								</div>
								<div class="acd_teacher_table">
									<a data-color="sh_button" href="<?php echo get_permalink();?>#timetable" target="_blank" title="<?php esc_html_e('Timetable','danlet');?>"><i class="fa fa-th-large" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					</div>
				</li>
			<?php $i++;endwhile;?>
			</ul>
		</div>
	</div>
</div>
<!-- End section teacher -->
<?php
do_action('danlet_js_tabs_class_list_hook',$tabs,$content);