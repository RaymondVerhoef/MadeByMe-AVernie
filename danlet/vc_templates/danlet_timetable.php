<?php
    extract(shortcode_atts(array(
        'enable_filter' => '',
        'enable_day_control' => '',
        'color_table' => '',
        'color_table_header' => '',
        'show_current_class'    => '',
        'display_end_time' => false,
        'color_table' => '',
        '_shortcode_id' => '',
        'color_table_header' => ''
    ),$atts));
?>
<?php
    $filter_condition = array();
    $show_current_class = (boolean) $show_current_class;
    $class_list = danlet_get_class_list($filter_condition , $show_current_class);
    $class_categories = get_terms(array('taxonomy' => 'course_level'));
    $class_levels = get_posts(array('post_type' => 'level' , 'posts_per_page' => -1));

?>
<div class="custom-style">
    <style><?php echo  $class_list['style_event'] ?></style>
</div>
<!-- Custom style changed when make filter -->
<?php if(function_exists('danlet_get_style_calendar')){
    echo danlet_get_style_calendar($atts);
} ?>
<!-- Removed for w3c Validate -->
<div class="container">
    <?php if(!empty($enable_filter) && $enable_filter) : ?>
    <div class="acd_page_timetable_filter">
                            <p id="acd_filter_search"><?php esc_html_e('Filter Classes' , 'danlet') ?> <span class="acd_page_timetable_icon"><i class="fa fa-plus" aria-hidden="true"></i></span></p>

                            <div class="acd_page_timetable_box_filter">
                                    <div class="row">
                                            <ul class="acd_page_timetable_filter_list ">
                                                    <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <div class="acd_page_timetable_filter_cat">
                                                                    <h3 class="acd_page_timetable_filter_title">
                                                                            <?php esc_html_e('BY CATEGORY' , 'danlet'); ?>
                                                                    </h3>
                                                                    <div class="acd_page_timetable_filter_content">
                                                                            <ul class="acd_page_timetable_filter_radio acd_cat_filter">
                                                                              <?php if(sizeof($class_categories) > 1) : ?>
                                                                                    <?php foreach($class_categories as $class_cat ) : ?>
                                                                                        <li>
                                                                                            <input value="<?php echo esc_attr($class_cat->term_id) ?>" type="checkbox" name="filter_class[]" checked="checked">
                                                                                          <label><?php echo esc_attr($class_cat->name) ?></label>
                                                                                        </li>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                            </ul>
                                                                    </div>
                                                            </div>
                                                    </li>
                                                    <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <div class="acd_page_timetable_filter_cat">
                                                                    <h3 class="acd_page_timetable_filter_title">
                                                                            <?php esc_html_e('BY LEVEL' , 'danlet'); ?>
                                                                    </h3>
                                                                    <div class="acd_page_timetable_filter_content">
                                                                            <ul class="acd_page_timetable_filter_radio acd_lv_filter">
                                                                                <?php if(sizeof($class_levels) > 1) :  ?>
                                                                                    <?php foreach($class_levels as $class_level) : ?>
                                                                                        <li>
                                                                                            <input value="<?php echo esc_attr($class_level->ID) ?>" type="checkbox" name="filter_lever[]" checked="checked">
                                                                                          <label><?php echo esc_attr($class_level->post_title) ?></label>
                                                                                        </li>
                                                                                    <?php endforeach; ?>
                                                                                <?php endif; ?>
                                                                            </ul>
                                                                    </div>
                                                            </div>
                                                    </li>
                                                    <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <div class="acd_page_timetable_filter_cat">
                                                                    <h3 class="acd_page_timetable_filter_title">
                                                                            <?php esc_html_e('BY CLASSES' , 'danlet'); ?>
                                                                    </h3>
                                                                    <div class="acd_page_timetable_filter_content">
                                                                            <ul class="acd_page_timetable_filter_radio acd_class_filter">
                                                                                <li>
                                                                                    <input type="text" class="search_by_class" placeholder="<?php esc_html_e('Enter class name', 'danlet') ?>">
                                                                                </li>

                                                                            </ul>
                                                                    </div>
                                                            </div>
                                                    </li>
                                                    <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <div class="acd_page_timetable_filter_cat">
                                                                    <h3 class="acd_page_timetable_filter_title">
                                                                            <?php esc_html_e('BY TEACHER' , 'danlet'); ?>
                                                                    </h3>
                                                                    <div class="acd_page_timetable_filter_content">
                                                                            <ul class="acd_page_timetable_filter_radio acd_teacher_filter">
                                                                                <li>
                                                                                    <input type="text" class="search_by_teacher" placeholder="<?php esc_html_e('Enter teacher name', 'danlet') ?>">
                                                                                </li>

                                                                            </ul>
                                                                    </div>
                                                            </div>
                                                    </li>
                                            </ul>
                                    </div>
                                    <div class="acd_page_timetable_search">
                                        <input type="submit" value="Search" class="timetable-filter">
                                    </div>
                            </div>
                    </div>
    <?php endif; ?>
    <div id="calendar" style="position : relative;"></div>
</div>
<?php
$class_list = $class_list['data_event'];
do_action('danlet_js_timetable_hook',$enable_day_control,$class_list,$display_end_time,$show_current_class);?>
