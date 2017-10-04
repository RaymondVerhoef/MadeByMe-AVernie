<?php
/**
 * @author VNMilky
 * @see Empty Space
 * @date 2017/03/15
 * @modify
 */
//Extract
extract(shortcode_atts(array(
	//Genaral
	'beau_xxl'			=>	'',
	'beau_xl'			=>	'',
	'beau_lg'			=>	'',
	'beau_md'			=>	'',
	'beau_sm'			=>	'',
	'beau_xs'			=>	'1rem',
	'css'				=>	''
),$atts));
$rand = rand(11, 99999);
$rowID = 'bnb_clearfix_'.$rand;
$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ' ), $this->settings['base'], $atts);
$setup = array(
    'xs'  =>  $beau_xs,
    'sm'  =>  $beau_sm,
    'md'  =>  $beau_md,
    'lg'  =>  $beau_lg,
    'xl'  =>  $beau_xl,
    'xxl'  =>  $beau_xxl,
);
?>
<div id="<?php echo esc_attr($rowID);?>" class="clearfix <?php echo esc_attr($css_class)?>" data-css="true" data-css-value="<?php echo danlet_media_breakpoint($rowID, $setup);?>"></div>
