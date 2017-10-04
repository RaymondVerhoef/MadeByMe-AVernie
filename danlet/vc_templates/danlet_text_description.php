<?php
$text_title =
$text_description =
$color_text_title =
$color_text_description =
$_shortcode_id =
$css = '';
extract(shortcode_atts(array(
    'text_title'                    => '',
    'text_description'              => '',
    'color_text_title'              => '',
    'color_text_description'        => '',
    '_shortcode_id'        => '',
    'css'                   => '',
), $atts));
$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ' ), $this->settings['base'], $atts);
    // Make a random ID for shortcode
$id_ran = rand(1, 99999);
$randomID = 'sh_text_description'.$id_ran;
$setup      = array(
    'h2[data-color="sh_title"] ' => array(
        'color'                 => $color_text_title,
    ),
    'div[data-color="sh_description"]' => array(
        'color'                 => $color_text_description,
    ),
);
// Make css style for shortcode
if (function_exists('danlet_css_shortcode')) {
   echo danlet_css_shortcode($_shortcode_id, $setup);
}
?>
<div class="acd_blog <?php echo esc_attr($css_class);?>" id="<?php echo esc_attr($_shortcode_id);?>">
    <div class="container">
        <?php if($text_title != NULL) :?>
        <h2 data-color="sh_title" class=" acd_blog_title_classes"><?php echo esc_attr($text_title)?></h2>
        <?php endif; if($text_description != NULL) :?>
        <div data-color="sh_description" class="acd_classes_desc">
        <?php echo wp_kses($text_description,array())?>
        </div>
        <?php endif; ?>
    </div>
</div>