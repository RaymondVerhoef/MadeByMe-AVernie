<?php
// General
$option =
$title_element =
$desc_element =
$view =
$pages =
// data
$post_id =
//color
$titlecolor =
$desccolor =
$linkcolor =
$bgcolor =
$bglinkcolor =
$_shortcode_id =
$option_nav =
$css = '';
extract(shortcode_atts(array(
	'option' => '',
	'title_element' => '',
	'desc_element' => '',
	'view' 		=> '',
	'pages'		=> '',
	'post_id' => '',
	'titlecolor' => '',
	'desccolor' => '',
	'linkcolor' => '',
	'bgcolor' => '',
    'bglinkcolor' => '',
	'_shortcode_id' => '',
	'option_nav' => 'enable',
	'css' => ''
),$atts));

if($option == '') {
	$option ='full';
}
if($view == '') {
	$view =9;
}
if($pages == '') {
	$pages = 5;
}

if($post_id == '') {
	$args = array(
		'post_type' => 'gallery',
		'posts_per_page' => 1,
	);
	$loop = new WP_Query($args);
	wp_reset_postdata();
	$post_id = $loop->posts[0]->ID;
}

$images = danlet_get_field('gallery_images',$post_id);
$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ' ), $this->settings['base'], $atts);


	$id_rand = rand(1, 99999);

	$setup      = array(
		array(
			'background-color' => $bgcolor,
		),
		'h2[data-color="name-title"]' => array(
			'color' => $titlecolor,
		),
		'h3[data-color="name-title"]' => array(
			'color' => $titlecolor,
		),
		'div[data-color="name-desc"]' => array(
			'color' => $desccolor,
		),
		'div[data-color="bg_link"]' => array(
			'background-color' => $bglinkcolor,
		),
		'a[data-color="text_link"]' => array(
			'color' => $linkcolor,
		),

	);
	// Make css style for shortcode
if (function_exists('danlet_css_shortcode')) {
   echo danlet_css_shortcode($_shortcode_id, $setup);
}
include( get_template_directory().'/vc_templates/option_base/gallery/'.$option.'.php');
