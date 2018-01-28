<?php
/**
 * @author  VNMilky
 */

if(!function_exists('danlet_get_class_list')) {
    function danlet_get_class_list($filter_args = array() , $show_current_class = false, $return_json = true){
        $args = array('post_type' => 'class' , 'posts_per_page' => -1);
        $args = array_merge($filter_args , $args);

        $classes = get_posts($args);

        if(empty($classes)) return false;
        $daily_day = array();
        $result_classess = array();
        $daily_day = array();
        $custom_style = '';
        foreach($classes as $class) {
            $class_id = $class->ID;
            $class_sign = danlet_get_field('class_id' , $class_id);

            //if don't have color, then generate it
            $class_color = !is_null(danlet_get_field('class_color' , $class_id)) ?  danlet_get_field('class_color' , $class_id) : '#'.substr(md5(rand()), 0, 6); //random color
            $custom_style .= '.'. str_replace(' ', '-', strtolower($class_sign)).' .fc-title:before {
                background : '.$class_color.';
            }';
            danlet_get_edays($class_id , $class_color , $show_current_class , $daily_day);
        }
        return array(
            'style_event' => $custom_style,
            'data_event' => $return_json ? json_encode($daily_day) : $daily_day
        );
    }
}

if(!function_exists('danlet_get_edays')) {
    function danlet_get_edays($class_id , $class_color , $show_current_class , &$daily_day){
    $begin_date = new DateTime(danlet_get_field('class_date_begin' , $class_id));
    $end_date = new DateTime(danlet_get_field('class_date_end' , $class_id));
    $current_date = new DateTime();
    $class_sign = danlet_get_field('class_id' , $class_id);

    if(danlet_get_field('class_repeat', $class_id)) {
    // Process type weekly
        $week_days = danlet_get_wdays($class_id);
        // Get only current date
        if($show_current_class && ($begin_date->getTimestamp() > $current_date->getTimestamp()
                || $end_date->getTimestamp() < $current_date->getTimestamp()))  {
            return;
        }
        $interval = DateInterval::createFromDateString('1 day');
        $period = new DatePeriod($begin_date, $interval , $end_date);
        foreach($period as $day) {
            // Filter Working days in period
            if(in_array($day->format('N'), array_keys($week_days))) {
                // Filter course in a day
                foreach($week_days[$day->format('N')] as $course_in_day) {
                    $time_begin = new DateTime($course_in_day['class_schedule_time_begin']);
                    $time_end = new DateTime($course_in_day['class_schedule_time_end']);
                    $teacher_id = $course_in_day['class_schedule_teacher'];
                    $daily_day[] = array(
                        'id' => $class_id,
                        'title' => $class_sign,
                        'start' => $day->format('Y-m-d').'T'.$time_begin->format('H:i'),
                        'end' => $day->format('Y-m-d').'T'.$time_end->format('H:i'),
                        'teacher' => get_the_title($teacher_id),
                        'className' => 'beau-event '.  str_replace(' ', '-', strtolower($class_sign)),
                        'ecolor' => $class_color,
                        'allDay' =>  false
                    );
                }
            }
        }
    } else {
   // Process normal type (date repeat)
        if(have_rows('class_schedule_day' , $class_id)) {
            while(have_rows('class_schedule_day' , $class_id)) : the_row();
                $day = new DateTime(get_sub_field('class_schedule_day_date'));
                $time_begin = new DateTime(get_sub_field('class_schedule_day_time_begin'));
                $time_end =  new DateTime(get_sub_field('class_schedule_day_time_end'));
                $teacher_id = get_sub_field('class_schedule_day_teacher');
                $daily_day[] = array(
                    'id' => $class_id,
                    'title' => $class_sign,
                    'start' => $day->format('Y-m-d').'T'.$time_begin->format('H:i'),
                    'end' => $day->format('Y-m-d').'T'.$time_end->format('H:i'),
                    'teacher' => get_the_title($teacher_id),
                    'className' => 'beau-event '.  str_replace(' ', '-', strtolower($class_sign)),
                    'ecolor' => $class_color,
                    'allDay' =>  false
                );
            endwhile;
        }
    }

}
}
if(!function_exists('danlet_get_wdays')) {
    function danlet_get_wdays($class_id){
    $prefix = 'class_schedule_';
    $week_list = array(
        1 => 'monday' ,
        2 => 'tuesday' ,
        3 => 'wednesday',
        4 => 'thursday',
        5 => 'friday' ,
        6 => 'saturday' ,
        7 => 'sunday'
    );
    $data_wdays = array();
    if(have_rows('class_schedule_week' , $class_id)) {
        while(have_rows('class_schedule_week' , $class_id)) : the_row();
            foreach($week_list as $dkey => $dval) {
                $sf_name = $prefix . $dval;
                if(get_sub_field($sf_name)) {
                    $data_wdays[$dkey] = get_sub_field($sf_name);
                }
            }
        endwhile;
    }
    return $data_wdays;
}
}
if(!function_exists('danlet_get_filter_by_course')) {
    function danlet_get_filter_by_course($course_data){
        $course_ids = !empty($course_data['course_ids']) ? $course_data['course_ids'] : '';
        $data_type = !empty($course_data['data_type']) ? $course_data['data_type'] : 'level';
        $args = array(
            'post_type' => $data_type,
            'posts_per_page' => -1,
        );

        if(!empty($course_data['teacher_name']) && $course_data['data_type'] == 'teacher') $args['s'] = $course_data['teacher_name'];
        if(!empty($course_ids)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'course_level',
                    'terms' => $course_ids,
                    'operator' => 'IN'
                )
            );
        }

        $type_filtered = get_posts($args);

        return $type_filtered;
    }
}
if(!function_exists('danlet_get_teacher_params')) {
    function danlet_get_teacher_params($main_params) {
        $main_params['data_type'] = 'teacher';
        $teacher_filtered = danlet_get_filter_by_course($main_params);

        if(!$teacher_filtered) return false;
        $teacher_return = array();
        foreach($teacher_filtered as $teacher){
            $teacher_return[] = $teacher->ID;
        }
        return $teacher_return;
    }
}
if(!function_exists('danlet_get_level_params')){
    function danlet_get_level_params($main_params){
        if(!empty($main_params['level_ids'])) return $main_params['level_ids'];
        $levels_filtered = danlet_get_filter_by_course($main_params);
        if(!$levels_filtered) return false;
        $level_return = array();
        foreach($levels_filtered as $level){
            $level_return[] = $level->ID;
        }
        return $level_return;
    }
}
if(!function_exists('danlet_reload_level')){
        function danlet_reload_level(){
        if(empty($_POST['course_ids']))  die();
        $levels_filtered = danlet_get_filter_by_course($_POST);
        if(!$levels_filtered) return false;

        $levels_return = array();
        foreach($levels_filtered as $level) {
            $levels_return[] = array(
                'value' => $level->ID,
                'label' => $level->post_title
            );
        }
        echo json_encode($levels_return);
        die();
    }
}
if(!function_exists('danlet_filter_class')) {
        function danlet_filter_class(){
        if(empty($_POST['level_ids'])) return;
        $level_ids = $_POST['level_ids'];
        $show_current_class = empty($_POST['show_current_class']) ? false : true;
        $teacher_ids = danlet_get_teacher_params($_POST);
        $return_json = false;

        // if don't have teacher or level match, return false
        if(!$teacher_ids && !empty($_POST['teacher_name'])) return false;
        if($teacher_ids) {
            $teacher_filter = array(
                'relation' => 'OR'
            );
            foreach($teacher_ids as $teacher_id ) {
                $teacher_filter[] = array(
                    'key' => 'class_teacher',
                    'value' => $teacher_id ,
                    'compare'   => 'LIKE'
                );
            }
        }


        $args = array(
            'post_type' => 'class',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key'   => 'class_level',
                    'value' => $level_ids,
                    'compare' => 'IN'
                ) ,
                //filter teacher ( can be multiple )


            )
        );
        if(!empty($_POST['teacher_name'])) {
            $args['meta_query'][] = $teacher_filter;
        }
        if(!empty($_POST['class_name'])) {
            $args['meta_query'][] = array(
                'key' => 'class_id',
                'value' => $_POST['class_name'],
                'compare' => 'LIKE'
            );
        }

        $class_list = danlet_get_class_list($args, $show_current_class , $return_json);

        echo json_encode($class_list);
        die();
    }
}

/**
 *
 * @see Login Action
 */
function danlet_register_form() {
    $first_name     = ( ! empty( $_POST['user_f_name'] ) ) ? trim( $_POST['user_f_name'] ) : '';
    $last_name      = ( ! empty( $_POST['user_l_name'] ) ) ? trim( $_POST['user_l_name'] ) : '';
    $password       = ( ! empty( $_POST['user_password'] ) ) ? trim( $_POST['user_password'] ) : '';
        ?><p>
            <label for="user_f_name"><?php esc_html_e('First Name','danlet');?><br />
            <input type="text" name="user_f_name" id="user_f_name" class="input" value="" size="20" /></label>
            </p>
        <p>
            <label for="user_l_name"><?php esc_html_e('Last Name','danlet');?><br />
            <input type="text" name="user_l_name" id="user_l_name" class="input" value="" size="25" /></label>
        </p>
         <p>
            <label for="user_password"><?php esc_html_e('Password','danlet');?><br />
            <input type="password" name="user_password" id="user_password" class="input" value="" size="25" /></label>
        </p>
        <?php
    }
    function danlet_registration_errors( $errors, $sanitized_user_login, $user_email ) {

        if ( empty( $_POST['user_f_name'] ) || ! empty( $_POST['user_f_name'] ) && trim( $_POST['user_f_name'] ) == '' ) {
            $errors->add( 'user_f_name_error', __( '<strong>ERROR</strong>: You must include a first name.', 'danlet' ) );
        }
        if ( empty( $_POST['user_l_name'] ) || ! empty( $_POST['user_l_name'] ) && trim( $_POST['user_l_name'] ) == '' ) {
            $errors->add( 'user_l_name_error', __( '<strong>ERROR</strong>: You must include a last name.', 'danlet' ) );
        }
         if ( empty( $_POST['user_password'] ) || ! empty( $_POST['user_password'] ) && trim( $_POST['user_password'] ) == '' ) {
            $errors->add( 'user_password_error', __( '<strong>ERROR</strong>: You must include a password.', 'danlet' ) );
        }

        return $errors;
    }
    function danlet_user_register( $user_id ) {
        if ( ! empty( $_POST['user_f_name'] ) ) {
            update_user_meta( $user_id, 'user_f_name', trim( $_POST['user_f_name'] ) );
        }
        if ( ! empty( $_POST['user_l_name'] ) ) {
            update_user_meta( $user_id, 'user_l_name', trim( $_POST['user_l_name'] ) );
        }
        if ( ! empty( $_POST['user_password']) ) {
            wp_set_password(trim( $_POST['user_password'] ) , $user_id);
        }

    }
if(!function_exists('danlet_login_popup_header')){
    function danlet_login_popup_header(){
        ?>
            <form action="<?php echo  wp_registration_url() ?>" method="post">
                <label >
                    <input name="user_f_name" id="user_f_name" type="text" placeholder="<?php esc_html_e('First Name','danlet');?>">
                </label>
                 <label >
                    <input name="user_l_name" id="user_l_name" type="text" placeholder="<?php esc_html_e('Last Name','danlet');?>">
                </label>
                 <label >
                    <input type="text" name="user_login" id="user_name_login" placeholder="<?php esc_html_e('User Name','danlet');?>">
                </label>
                <label >
                    <input type="email" name="user_email" id="user_email" placeholder="<?php esc_html_e('Email','danlet');?>">
                </label>
                <label >
                    <input name="user_password" id="user_password" type="password" placeholder="<?php esc_html_e('Password','danlet');?>">
                </label>
                <label class="radio_selector">
                    <input type="radio" id="f-option" name="selector" value="">
                    <span><?php esc_html_e('Sign Up for Newletter','danlet');?></span>
                </label>
                <br>
                <label>
                    <input type="submit"  name="wp-submit" id="wp-submit-reg" value="<?php esc_html_e('Register','danlet');?>" />
                    <input type="hidden" name="redirect_to" value="<?php echo esc_url(get_permalink());?>" />
                </label>
            </form>
        <?php
    }
}
/**
 * @see Teacher Detail
 * @author VNMilky
 */
if(!function_exists('danlet_teacher_detail')) {
    function danlet_teacher_detail(){
        $description = danlet_get_field('detail_description')?danlet_get_field('detail_description'):$excerpt;
        $about = danlet_get_field('detail_about')?:danlet_get_field('detail_about');
        $excerpt = get_the_excerpt()?:get_the_excerpt();
        $image_bot_big = danlet_get_field('image_bottom_big')['id']?:danlet_get_field('image_bottom_big')['id'];
        $image_bot_small = danlet_get_field('image_bottom_small')['id']?:danlet_get_field('image_bottom_small')['id'];
        $sh_level_row = danlet_postid_by_metavalue(get_the_ID(),'level_teacher')?:danlet_postid_by_metavalue(get_the_ID(),'level_teacher');
    ?>
<!-- section Teacher Info -->
<section class="acd_teacher_detail_info">
    <div class="container">
        <div class="row">
            <ul class="acd_teacher_detail_box_info">
                <li>
                    <div class="col-lg-6 col-md-6 col-xs-12 acd_teacher_detail_img_box">
                        <div class="acd_teacher_detail_img">
                            <div class="acd_teacher_detail_img_big">
                                <?php echo danlet_thumbnail_image(get_the_ID())?>
                            </div>
                            <ul class="acd_teacher_detail_social">
                                <?php
                                    $yt = danlet_get_field('social_youtube')?:danlet_get_field('social_youtube');
                                    $gl = danlet_get_field('social_google')?:danlet_get_field('social_google');
                                    $tw = danlet_get_field('social_twitter')?:danlet_get_field('social_twitter');
                                    $fb = danlet_get_field('social_facebook')?:danlet_get_field('social_facebook');
                                    if($yt != NULL) : ?>
                                    <li ><a href="<?php echo esc_url($yt);?>" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                    <?php endif; if($gl != NULL) : ?>
                                    <li ><a href="<?php echo esc_url($gl);?>" title="Google +"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <?php endif; if($tw != NULL) : ?>
                                    <li ><a href="<?php echo esc_url($tw);?>" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <?php endif; if($fb != NULL) : ?>
                                    <li ><a href="<?php echo esc_url($fb);?>" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <?php endif;?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12 acd_teacher_detail_text_box">
                        <div class="acd_teacher_detail_text_info">
                            <h2 class="acd_teacher_detail_text_name">
                                <?php echo get_the_title();?>
                            </h2>
                            <div class="acd_teacher_detail_cat">
                                <?php if($sh_level_row != NULL) :?>
                                <span class="acd_teacher_detail_cat_name" >
                                    <?php esc_html_e('Teach : ', 'danlet'); ?>
                                </span>
                                <?php
                                    $teach ='';
                                        foreach ($sh_level_row as $key => $value) :
                                            $teach[] = '<a href="'.get_permalink($value['post_id']).'">'.get_the_title($value['post_id']).'</a>';
                                        endforeach;
                                    echo implode(' ,',$teach);
                                    endif; ?>
                            </div>
                            <div class="acd_teacher_detail_text_view">
                                <?php echo danlet_html_wpkses($description);?>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="col-lg-6 col-md-6 col-xs-12 acd_teacher_detail_img_box">
                        <div class="acd_teacher_detail_img bot">
                            <?php if($image_bot_big != NULL) : ?>
                            <div class="acd_teacher_detail_img_big">
                                <?php echo danlet_thumbnail_image($image_bot_big,true)?>
                            </div>
                            <?php endif; if($image_bot_small != NULL) :?>
                            <div class="acd_teacher_detail_img_small">
                                <?php echo danlet_thumbnail_image($image_bot_small,true)?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-12 acd_teacher_detail_text_box">
                        <div class="acd_teacher_detail_text_info">
                            <div class="acd_teacher_detail_text_view">
                                <?php echo danlet_html_wpkses($about);?>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>
<!-- End section Teacher Info -->
<!-- section classes in month -->
<?php
$tea_id = get_the_ID();
$loop = danlet_postid_by_metavalue($tea_id, 'class_teacher');
if(sizeof($loop) > 0) :
?>
<section id="timetable" class="acd_classes_in_month">
    <div class="container">
        <div class="acd_classes_in_month_box">
            <h3 class="acd_classes_in_month_title">
                <?php esc_html_e('All Classes This Month', 'danlet'); ?>
            </h3>
            <p class="acd_classes_in_month_subtitle"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipisicing elit. ', 'danlet'); ?></p>
        </div>
        <div class="acd_classes_in_month_table">
            <table class="acd_classes_list_in_month">

                <tr >
                    <th><?php esc_html_e('Date', 'danlet'); ?></th>
                    <th><?php esc_html_e('Time', 'danlet'); ?></th>
                    <th><?php esc_html_e('Duration', 'danlet'); ?></th>
                    <th><?php esc_html_e('Classes', 'danlet'); ?></th>
                    <th><?php esc_html_e('Teacher', 'danlet'); ?></th>
                    <th><?php esc_html_e('Price', 'danlet'); ?></th>
                    <th><?php esc_html_e('Booking', 'danlet'); ?></th>
                </tr>
                <?php

                foreach($loop as $val) :
                    $date_begin = strtotime(danlet_get_field('class_date_begin', $val['post_id']));
                    $date_end = strtotime(danlet_get_field('class_date_end', $val['post_id']));
                    $duration = $date_end - $date_begin;

                    $check = danlet_get_field('class_repeat',$val['post_id']);
                    $class_time = '';

                    $timetable = array();
                    if(!empty($check)) {
                        $class_time = danlet_get_field('class_schedule_week',$val['post_id']);
                        foreach($class_time as $vals) {
                            if(!empty($vals)) {
                                foreach($vals as $time) {
                                    if(!empty($time)) {
                                        $arr_time = '';
                                        foreach($time as $view) {
                                            $arr_time = $view['class_schedule_time_begin'].' - '.$view['class_schedule_time_end'];
                                            $timetable[$arr_time] = $arr_time;
                                        }
                                    }
                                }

                            }
                        }

                    } else{
                        $class_time = danlet_get_field('class_schedule_day',$val['post_id']);
                        $class_time = array();
                        foreach($class_time as $vals) {
                            $arr_time = '';
                            if(!empty($vals)) {
                                $arr_time = $vals['class_schedule_day_time_begin'].' - '.$vals['class_schedule_day_time_end'];
                                $timetable[$arr_time] = $arr_time;
                            }
                        }
                    }

                 ?>

                <tr>
                    <td><?php echo esc_attr(date('d M', $date_begin).' - '.date('d M', $date_end)); ?></td>
                    <td>
                        <ul class="timetable">
                            <?php foreach($timetable as $key): ?>
                                <li><?php echo esc_attr($key); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                    <td><?php echo esc_attr(date('W', $duration)); ?> <?php esc_html_e(' week', 'danlet'); ?></td>
                    <td><?php echo danlet_get_field('class_id', $val['post_id']); ?></td>
                    <td class="acd_classes_list_in_month_bold"><?php the_title(); ?></td>
                    <td>$ <?php echo danlet_get_field('_price', $val['post_id']); ?></td>
                    <td><a href="<?php echo get_site_url().'/?add-to-cart='.$val['post_id']; ?>" title=""><?php esc_html_e('Book now', 'danlet'); ?></a></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <div class="acd_classes_list_in_month_vm">
                <a href="#" title=""><?php esc_html_e('View Timetable', 'danlet'); ?> <i class="fa fa-th-large" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>
    <!-- end section classes in month -->
    <?php
    endif;
    }
}
/**
 * @see Single Video Detail
 */
    if(!function_exists('danlet_single_video_details')) {
        function danlet_single_video_details() {
            beau_setpost_view(get_the_ID());
            $youtu = danlet_get_field('video_url');
            $media = danlet_get_field('video_media');
            $element = 'danlet_player'.get_the_ID();
            $danlet_player_id =  get_the_ID();
            $video = '';
            if($youtu == '') {
                $video = $media;
            } else{
                $video = $youtu;
            }
?>
<div class="video-detail">
    <div class="acd_video_detail_content">
        <div class="acd_video_detail_link_view" id="afk">
        <div id="<?php echo esc_attr($element);?>"></div>
        </div>
            <?php do_action('danlet_js_single_video_player_hook',$element,$video,$danlet_player_id) ?>
        <ul class="acd_video_detail_social">
            <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url(get_the_permalink());?>" title="<?php esc_html_e('Linkedin','danlet') ?>">
                    <i class="fa fa-linkedin" aria-hidden="true"></i>
            </a></li>
            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_url(get_the_permalink());?>" title="<?php esc_html_e('Facebook','danlet') ?>">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
            </a></li>
            <li><a href="https://twitter.com/home?status=<?php echo esc_url(get_the_permalink());?>" title="<?php esc_html_e('Twitter','danlet') ?>">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </a></li>
            <li><a href="https://plus.google.com/share?url=<?php echo esc_url(get_the_permalink());?>" title="<?php esc_html_e('Google','danlet') ?>">
                <i class="fa fa-google-plus" aria-hidden="true"></i>
            </a></li>
        </ul>
        <div class="acd_video_detail_content_view">
            <h2 class="acd_video_detail_name">
                <?php the_title(); ?>
            </h2>
            <ul class="acd_video_detail_total_view">
                <li>
                    <span>
                        <?php echo beau_getpost_view(get_the_ID()); ?>
                    </span>
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </li>
                /
                <li>
                    <span><?php
                            if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
                            echo get_comments_number();
                            endif;?></span>
                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php
        }
    }

// desc video
if(!function_exists('danlet_before_desc_video')) {
    function danlet_before_desc_video() { ?>
    <div class="video-detail row">

    <?php

    }
}

if(!function_exists('danlet_description_single_video')) {
    function danlet_description_single_video() { ?>
    <div class="col-lg-8 col-md-8">
        <div class="acd_video_detail_desc">
            <div class="acd_video_detail_desc_title">
                <?php esc_html_e('DESCRIPTION', 'danlet'); ?>
            </div>
            <div class="acd_video_detail_desc_content">
                <?php echo danlet_get_field('detail_description'); ?>
            </div>
        </div>
<?php
    }
}
// More video
if(!function_exists('danlet_load_more_video')) {
    function danlet_load_more_video() {
?>
</div>
<div class="col-lg-4 col-md-4 acd_blog_border ">
    <div class="acd_sidebar_widget">
        <h3 class="acd_sidbar_title"><?php esc_html_e('MORE VIDEO', 'danlet'); ?></h3>
        <div class="row">
            <ul class="sidebar_recent_post">
            <?php
            $view = 4;
            $pages = 2;
            $args = array(
                'post_type' => 'video',
                'posts_per_page' =>$view,
            );

            $loop = new WP_Query($args);
            wp_reset_postdata();
            while($loop->have_posts()) : $loop->the_post();
             ?>
                <li>
                    <div class="sidebar_recent_post_box">
                        <div class="sidebar_recent_post_img video">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                    <?php echo danlet_thumbnail_image(get_the_ID());?>
                            </a>
                        </div>
                        <div class="sidebar_recent_post_date">
                            <?php echo danlet_time_link(); ?>
                        </div>
                        <div class="sidebar_recent_post_name">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                        </div>
                        <ul class="sidebar_recent_post_view">
                            <li>
                                <span><?php echo beau_getpost_view(get_the_ID()); ?></span>
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </li> /
                            <li>
                                <span><?php
                                if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
                                echo get_comments_number();
                                endif;?></span>
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                            </li>
                        </ul>
                    </div>
                </li>
            <?php endwhile; ?>
            </ul>
            <div class="acd_detail_video_more">
                <div class="acd_video_more_link">
                    <a href="#" class="more-video" data-value="<?php echo esc_attr($view); ?>" title="<?php esc_html_e('View more','danlet');?>"><?php esc_html_e('View more','danlet');?></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
        do_action('danlet_js_single_video_loadmore_hook',$pages);
    }
}



if(!function_exists('danlet_after_desc_video')) {
    function danlet_after_desc_video() { ?>
    </div>
<?php
    }
}
/**
 * @see Single Course Detail
 */
if(!function_exists('danlet_single_course_detail')) {
    function danlet_single_course_detail() {

?>
<!-- section detail content -->
<section class="acd_detail_classes_content">
        <svg class="svg_danlet set_svg_bottom" viewBox="0 0 1920 175" preserveAspectRatio="none" width="100%">
        <polygon points="1920 175,1920 0,0 175" class="acd_white fill2"></polygon>
    </svg>
    <div class="container">
        <h2 class="acd_detail_classes_title">
            <?php the_title(); ?>
        </h2>
        <ul class="acd_detail_classes_social">
        <?php $fb = danlet_get_field('social_facebook') ? danlet_get_field('social_facebook') : '';
            if($fb != '') : ?>
            <li><a href="<?php echo esc_url($fb); ?>" title="<?php esc_html_e('Facebook','danlet') ?>">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a></li>
        <?php endif; ?>

        <?php $tw = danlet_get_field('social_twitter') ? danlet_get_field('social_twitter') : '';
            if($tw != '') : ?>
            <li><a href="<?php echo esc_url($tw); ?>" title="<?php esc_html_e('Twitter','danlet') ?>">
                <i class="fa fa-twitter" aria-hidden="true"></i>
            </a></li>
        <?php endif; ?>

        <?php $gg = danlet_get_field('social_google') ? danlet_get_field('social_google') : '';
            if($gg != '') : ?>
            <li><a href="<?php echo esc_url($gg); ?>" title="<?php esc_html_e('Google','danlet') ?>">
                <i class="fa fa-google" aria-hidden="true"></i>
            </a></li>
        <?php endif; ?>

        <?php $yt = danlet_get_field('social_youtube') ? danlet_get_field('social_youtube') : '';
            if($yt != '') : ?>
            <li><a href="<?php echo esc_url($yt); ?>" title="<?php esc_html_e('Youtube','danlet') ?>">
                <i class="fa fa-youtube" aria-hidden="true"></i>
            </a></li>
        <?php endif; ?>

        </ul>
        <ul class="row acd_detail_classes_box">
            <li >
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 acd_detail_classes_img_box">
                    <div class="acd_detail_classes_img">
                    <?php
                    $img_top_big = danlet_get_field('image_top_big');
                    if($img_top_big != '') :
                    ?>
                        <img src="<?php echo esc_url($img_top_big['url']); ?>" alt="<?php echo esc_attr($img_top_big['name']); ?>">
                    <?php endif; ?>
                        <div class="acd_detail_classes_img_small">
                        <?php
                        $image_top_small = danlet_get_field('image_top_small');
                        if($image_top_small != '') :
                        ?>
                            <img src="<?php echo esc_url($image_top_small['url']); ?>" alt="<?php echo esc_attr($image_top_small['name']); ?>">
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 acd_detail_classes_text_box">
                    <div class="acd_detail_classes_text">
                    <?php
                    $desc = danlet_get_field('detail_description');
                    if($desc != '') :
                        echo danlet_html_wpkses($desc);
                    endif;
                    ?>

                    </div>
                </div>
            </li>
            <li >
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 acd_detail_classes_img_box">
                    <div class="acd_detail_classes_img">
                    <?php
                    $image_bottom_big = danlet_get_field('image_bottom_big');
                    if($image_bottom_big != ''):
                    ?>
                        <img src="<?php echo esc_url($image_bottom_big['url']); ?>" alt="<?php echo esc_attr($image_bottom_big['name']); ?>">
                    <?php endif; ?>
                        <div class="acd_detail_classes_img_small">
                        <?php $image_bottom_small = danlet_get_field('image_bottom_small');
                        if($image_bottom_small != '') :
                         ?>
                            <img src="<?php echo esc_url($image_bottom_small['url']); ?>" alt="<?php echo esc_attr($image_bottom_small['name']); ?>">
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 acd_detail_classes_text_box">
                    <div class="acd_detail_classes_text">
                    <?php
                    $about = danlet_get_field('detail_about');
                    if($about != '') :
                        echo danlet_html_wpkses($about);
                    endif;
                    ?>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</section>
<!-- end section detail content -->

<!-- section classes in month
<section id="timetable" class="acd_classes_in_month">
    <div class="container">
        <div class="acd_classes_in_month_box">
            <h3 class="acd_classes_in_month_title">
                <?php esc_html_e('All Classes This Month', 'danlet'); ?>
            </h3>
            <p class="acd_classes_in_month_subtitle"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'danlet'); ?></p>
        </div>
        <div class="acd_classes_in_month_table">
            <table class="acd_classes_list_in_month">
                <tr >
                    <th><?php esc_html_e('Date','danlet'); ?></th>
                    <th><?php esc_html_e('Time', 'danlet'); ?></th>
                    <th><?php esc_html_e('Duration', 'danlet'); ?></th>
                    <th><?php esc_html_e('Classes', 'danlet'); ?></th>
                    <th><?php esc_html_e('Teacher', 'danlet'); ?></th>
                    <th><?php esc_html_e('Price', 'danlet'); ?></th>
                    <th><?php esc_html_e('Booking', 'danlet'); ?></th>
                </tr>
                <?php
                $level_id = get_the_ID();
                $loop = danlet_postid_by_metavalue($level_id,'class_level');
                foreach($loop as $value) :
                    $teach_id = danlet_get_field('class_teacher', $value['post_id']);
                    $list = '';
                    if(count ($teach_id) > 1) {

                        foreach($teach_id as $tea) {
                            if($list == '') {
                                $list = $tea->post_title;
                            } else {
                                $list .= ','.$tea->post_title;
                            }
                        }
                    } else {
                        $list = $teach_id[0]->post_title;
                    }
                    $date_begin = strtotime(danlet_get_field('class_date_begin', $value['post_id']));
                    $date_end = strtotime(danlet_get_field('class_date_end', $value['post_id']));
                    $duration = $date_end - $date_begin;

                    $check = danlet_get_field('class_repeat',$value['post_id']);
                    $class_time = '';

                    $timetable = array();
                    if(!empty($check)) {
                        $class_time = danlet_get_field('class_schedule_week',$value['post_id']);
                        foreach($class_time as $val) {
                            if(!empty($val)) {
                                foreach($val as $time) {
                                    if(!empty($time)) {
                                        $arr_time = '';
                                        foreach($time as $view) {
                                            $arr_time = $view['class_schedule_time_begin'].' - '.$view['class_schedule_time_end'];
                                            $timetable[$arr_time] = $arr_time;
                                        }
                                    }
                                }

                            }
                        }

                    } else{
                        $class_time = danlet_get_field('class_schedule_day',$value['post_id']);
                        foreach($class_time as $val) {
                            $arr_time = '';
                            if(!empty($val)) {
                                $arr_time = $val['class_schedule_day_time_begin'].' - '.$val['class_schedule_day_time_end'];
                                $timetable[$arr_time] = $arr_time;
                            }
                        }
                    }
                ?>
                <tr>
                    <td><?php echo esc_attr(date('d M', $date_begin).' - '.date('d M', $date_end)); ?></td>
                    <td>
                        <ul class="timetable">
                            <?php foreach($timetable as $key): ?>
                                <li><?php echo danlet_print_html($key); ?></li>
                            <?php endforeach; ?>
                        </ul>


                    </td>
                    <td><?php echo esc_attr(date('W', $duration)); ?> <?php esc_html_e(' week', 'danlet'); ?></td>
                    <td><?php echo danlet_get_field('class_id', $value['post_id']); ?></td>
                    <td class="acd_classes_list_in_month_bold"><?php echo esc_attr($list); ?></td>
                    <td>$ <?php echo danlet_get_field('_price', $value['post_id']); ?></td>
                    <td><a href="<?php echo get_site_url().'/?add-to-cart='.$value['post_id']; ?>" title="<?php esc_html_e('Book now','danlet') ?>"><?php esc_html_e('Book now','danlet') ?></a></td>
                </tr>
            <?php endforeach; ?>

            </table>
            <div class="acd_classes_list_in_month_vm">
                <a href="#" title="<?php esc_html_e('View Timetable','danlet') ?>"><?php esc_html_e('View Timetable','danlet') ?><i class="fa fa-th-large" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- end section classes in month
<?php
    }
}
