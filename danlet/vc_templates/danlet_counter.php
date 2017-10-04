<?php
	$counter_title =
	$counter_number =
	$counter_title_color =
	$counter_slash_color =
	$counter_number_color =
    $counter_speed =
	$_shortcode_id =
	$css = '';
	extract(shortcode_atts(array(
		'counter_title'			=> '',
		'counter_number'		=> '',
		'counter_speed'			=>	'1000',
		'counter_title_color'	=> '',
		'counter_slash_color'	=> '',
        'counter_number_color'  => '',
		'_shortcode_id'	=> '',
		'css'					=>	'',
	), $atts));
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );
$rand = rand(1, 99999);
$setup      = array(
    '.sh_count_number'      => array(
        'color'         	=> $counter_title_color,
    ),
    '.sh_count_slash' 		=> array(
        'color'             =>  $counter_slash_color,
    ),
    '.sh_count_text'              => array(
        'color'             =>  $counter_number_color,
        ),
);
// Make css style for shortcode
if (function_exists('danlet_css_shortcode')) {
    echo danlet_css_shortcode($_shortcode_id, $setup);
}
if($counter_number != '') :
 ?>
 <div id="<?php echo esc_attr($_shortcode_id);?>" class="sh_counter_box <?php echo esc_attr($css_class);?>">
	<span class="sh_count_number" data-to="<?php echo esc_attr($counter_number);?>" data-speed="<?php echo esc_attr($counter_speed)?>"></span>
	<?php if($counter_title != NULL) : ?>
	<span class="sh_count_slash">/</span>
	<span class="sh_count_text"><?php echo esc_attr($counter_title);?></span>
	<?php endif; ?>
</div>
<?php
do_action('danlet_js_counto_hook',$rand);
endif;
