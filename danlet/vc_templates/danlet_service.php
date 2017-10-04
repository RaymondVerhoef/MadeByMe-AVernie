<?php
	$title =
	$text_color =
	$extra_class =
    $vertical =
	$_shortcode_id =
	$css = '';
	extract(shortcode_atts(array(
		'title' => '',
		'vertical' => '',
		'text_color' => '',
        'extra_class' => '',
		'_shortcode_id' => '',
 		'css'	=> '',
	),$atts));

	$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ' ), $this->settings['base'], $atts);
	$id_ran = rand(1, 99999);
	//Setup style for shortcode
	$setup      = array(
		'.sh_service_title_el' => array(
			'color'	=> $text_color,
		),
	);
	// Make css style for shortcode
    if (function_exists('danlet_css_shortcode')) {
	   echo danlet_css_shortcode($_shortcode_id, $setup);
    }

    echo danlet_get_field('acfgfs_api_key');
?>
<div class="sh_service_box service_icon_title <?php echo esc_attr($extra_class); ?>" id="<?php echo esc_attr($_shortcode_id); ?>">
	<?php if($vertical == 'yes'): ?>
	<h3 class="sh_service_title sh_service_title_el"><?php echo esc_attr(!empty($title) ? $title : ''); ?></h3>
<?php else : ?>
	<h3 class="sh_service_name sh_service_name_mob "><?php echo esc_attr(!empty($title) ? $title : ''); ?></h3>
<?php endif; ?>
</div>