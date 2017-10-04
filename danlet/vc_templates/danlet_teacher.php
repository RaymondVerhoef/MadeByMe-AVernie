<?php
/**
 * @see Shortcode Teacher
 * @author VNMilky
 * VC_Template
 */
//Genaral
$option =
$option_viewall =
$teacher_title_element =
$sh_link =
//Social
$social =
//Style
$color_title_element =
$color_title_teacher =
$color_title_teacher_hover =
$color_label_course =
$color_course =
$color_course_hover =
$color_description =
$color_social_hover =
$acd_op_button =
$color_social_op =
$color_link_detail =
$color_link_detail_hover =
$color_teacher_textmore =
$color_teacher_textmore_hover =
$background_color =
//Avad
$advanded_name =
$advanded_desc =
$advanded_image =
//Option Data
$option_data =
$single_id =
$post_id =
$id_category =
$order_by =
$order =
$max_items =
//SVG
$acd_svg_location_top =
$acd_svg_location_bottom =
$acd_svg_height_number =
$acd_svg_bg_top =
$acd_svg_bg_bottom =
$acd_svg_prio_top =
$acd_svg_prio_bottom =
$_shortcode_id =

$css = '';
extract(shortcode_atts(array(
	//Genarel
	'teacher_title_element'					=>	'',
	'sh_link'						=>	'',
	//Social
	'social'								=>	'',
	//Option
	'option'								=>	'',
    'option_tabs'                           =>  '',
    'option_viewall'                           =>  '',
    //advanded
    'advanded_name'                         =>  '',
    'advanded_desc'                         =>  '',
    'advanded_image'                        =>  '',
	//Option Data
	'option_data'							=>	'',
	'single_id'								=>	'',
	'post_id'								=>	'',
	'id_category'							=>	'',
	'order_by'								=>	'',
	'order'									=>	'',
	'max_items'								=>	'',
	//Color
	'color_title_element'					=>	'',
	'color_title_element_hover'				=>	'',
	'color_title_teacher'					=>	'',
	'color_title_teacher_hover'				=>	'',
	'color_label_course'					=>	'',
	'color_course'							=>	'',
	'color_course_hover'					=>	'',
	'color_description'						=>	'',
	'color_social_hover'					=>	'',
	'color_link_detail'						=>	'',
	'color_link_detail_hover'				=>	'',
	'color_teacher_textmore'				=>	'',
	'color_teacher_textmore_hover'			=>	'',
	'background_color'						=>	'',
    'acd_op_button'                         =>  '',
    'color_social_op'                       =>  '',
	//SVG
	'acd_svg_location_top'					=>	'',
	'acd_svg_location_bottom'				=>	'',
	'acd_svg_height_number'					=>	'',
	'acd_svg_bg_top'						=>	'',
	'acd_svg_bg_bottom'						=>	'',
	'acd_svg_prio_top'						=>	'',
    'acd_svg_prio_bottom'                   =>  '',
	'_shortcode_id'					=>	'',
	//Design Option
	'css'									=>	''
	),$atts));
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$rand = rand(1, 99999);
if($option == ''){
	$option = 'single';
}
//SVG
if($acd_svg_height_number == '')	{
	$acd_svg_view = '175';
}
else 	{
	$acd_svg_view = $acd_svg_height_number;
}
//Data
if($single_id == '') {
	 $arg_single_id = array(
        'post_type' =>  'teacher',
        'posts_per_page'    =>  1,
        );
    $wp_single_id = new WP_Query($arg_single_id);
    wp_reset_postdata();
    $single_id = $wp_single_id->posts[0]->ID;
}
if($social == ''){
    $social = 'enable';
}
if($option_tabs == ''){
    $option_tabs = 'enable';
}
if($option_viewall == ''){
    $option_viewall = 'enable';
}
//Include Option
 include( get_template_directory().'/vc_templates/option_base/teacher/'.$option.'.php');