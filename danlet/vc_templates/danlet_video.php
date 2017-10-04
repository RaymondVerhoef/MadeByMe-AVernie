<?php
/**
 * @see Shortcode Video
 * @author VNMilky
 * VC_Template
 */

//Genarel
$video_title_element =
$sh_link =
///Option
$option =
//Option Data
$option_data =
$post_id =
$id_category =
$id_tag =
$order_by =
$order =
$max_items =
//Color
$color_title_element =
$color_title_element_hover =
$color_title_video =
$color_title_video_hover =
$color_view_video =
$color_like_video =
$color_text_more =
$color_text_more_hover =
$background_color =
//SVG
$acd_svg_location_top =
$acd_svg_location_bottom =
$acd_svg_height_number =
$acd_svg_bg_top =
$acd_svg_bg_bottom =
$acd_svg_prio_top =
$acd_svg_prio_bottom =
$_shortcode_id =
//Design Option
$option_nav =
$css = '';
//Extract
extract(shortcode_atts(array(
	//Genarel
	'video_title_element'					=>	'',
	'sh_link'						=>	'',
	//Option
	'option'								=>	'',
	//Option Data
	'option_data'							=>	'inid',
	'post_id'								=>	'',
	'id_category'							=>	'',
	'tag_choose'								=> '',
	'order_by'								=>	'',
	'order'									=>	'',
	'max_items'								=>	'',
	//Color
	'color_title_element'					=>	'',
	'color_title_element_hover'				=>	'',
	'color_title_video'						=>	'',
	'color_title_video_hover'				=>	'',
	'color_view_video'						=>	'',
	'color_like_video'						=>	'',
	'color_text_more'						=>	'',
	'color_text_more_hover'					=>	'',
	'background_color'						=>	'',
	//SVG
	'acd_svg_location_top'					=>	'',
	'acd_svg_location_bottom'				=>	'',
	'acd_svg_height_number'					=>	'',
	'acd_svg_bg_top'						=>	'',
	'acd_svg_bg_bottom'						=>	'',
	'acd_svg_prio_top'						=>	'',
	'acd_svg_prio_bottom'					=>	'',
	//Design Option
    'option_nav'                            =>  '',
	'_shortcode_id'							=>	'',
	'css'									=>	''
	),$atts));
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$rand = rand(1, 99999);
if($option == ''){
	$option = 'small';
}
//SVG
if($acd_svg_height_number == '')	{
	$acd_svg_view = '175';
}
else 	{
	$acd_svg_view = $acd_svg_height_number;
}
if($acd_svg_location_top == '') {
	$acd_svg_location_top = 'svgtopright';
}
if($acd_svg_location_bottom == '') {
	$acd_svg_location_bottom = 'svgbottomleft';
}

if($option_nav == ''){
    $option_nav == 'enable';
}
//Data
$list_category = '';
$list_post = '';
$list_tag = '';
if($max_items == ''){
    $max_items = '3';
    if($option == 'small') {
    	$max_items = '4';
    }
}
if($order   =='') {
    $order   = 'ASC';
}
if($order_by == '') {
    $order_by = 'ID';
}
if (!empty($post_id) && $option_data == 'inid') {
  $list_post = explode(',', $post_id);
}
if($option_data == 'incategory') {
	if ($id_category != NULL ) {
	    $list_category = explode(',', $id_category);
	}
	if($tag_choose != NULL ) {
		$list_tag = explode(',' , $tag_choose);
	}
}

$args = array(
  'post_type' => 'video',
  'posts_per_page' => $max_items,
);
if($list_post != NULL) {
	$args['post__in'] = $list_post;
}
if ($list_category != NULL || $list_tag != NULL) {
    $args['order'] = $order;
	$args['order_by'] = $order_by;
	if($id_category != NULL) {
		$args['tax_query'][] = array(
			'taxonomy'  => 'genre',
			'field'     => 'term_id',
			'terms'     => $list_category,
		);
	}
	if($list_tag != NULL) {
		$args['tax_query'][] = array(
			'taxonomy'  => 'tagvideo',
			'field'     => 'term_id',
			'terms'     => $list_tag,
		);
	}
	$args['tax_query']['relation'] = 'AND';
}
$loop = new WP_Query( $args );
wp_reset_postdata();
//Include Option
	include(get_template_directory().'/vc_templates/option_base/video/'.$option.'.php');
