<?php
/**
 * @see Shortcode Classes
 * @author VNMilky
 * VC_Template
 */
//Option
$option =
$title_element =
//Single
$option_single =
$single_category =
$single_id =
//Full
$option_data =
$post_id =
$id_category =
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
    'option'                    =>  'full',
    'title_element'             =>  '',
    //Single
    'option_single'             =>  '',
    'single_id'                 =>  '',
    'single_category'           =>  '',
    'option_position'           =>  '',
    //Full
    'option_data'               =>  '',
    'post_id'                   =>  '',
    'id_category'               =>  '',
    'order_by'                  =>  '',
    'order'                     =>  '',
    'max_items'                 =>  '',
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
    'color_tabs'                =>  '',
    'color_tabs_hover'          =>  '',
    'color_number'              =>  '',
    'color_line'                =>  '',
    'color_slash'               =>  '',
    'background_color'          =>  '',
    '_shortcode_id'          =>  '',
    //Extra
    'option_tabs'               =>  '',
    'css'                       =>  ''
    ),$atts));
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$rand = rand(1, 99999);
//Include Option
include( get_template_directory() .'/vc_templates/option_base/list/classes.php');
