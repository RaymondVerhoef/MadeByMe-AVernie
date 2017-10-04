<?php
// General
$title_element =
$link_button =
$url_video =
$icon_openiconic =
// color
$textcolor =
// SVG
$enable_svg_3th =
$color_enable_svg_3th =
$acd_svg_location_top =
$acd_svg_location_bottom =
$acd_svg_height_number =
$acd_svg_bg_top =
$acd_svg_bg_bottom =
$acd_svg_prio_top =
$acd_svg_prio_bottom =
$img_video =
$_shortcode_id =
$css = '';

extract(shortcode_atts(array(
    'title_element'         => '',
    'link_button'           => '',
    'url_video'             => '',
    'icon_openiconic'       => '',
    // color
    'textcolor'             => '',
    // SVG
    'enable_svg_3th'        =>  '',
    'color_enable_svg_3th'  =>  '',
    'acd_svg_location_top'       => '',
    'acd_svg_location_bottom'    => '',
    'acd_svg_height_number'      => '',
    'acd_svg_bg_top'             => '',
    'acd_svg_bg_bottom'          => '',
    'acd_svg_prio_top'           => '',
    'acd_svg_prio_bottom'        => '',
    'img_video'                 => '',
    '_shortcode_id'                 => '',
    'css'                        => '',
), $atts));

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

// Make a random ID for shortcode
$id_ran = rand(1, 99999);
$randomID   =  'single_video_'.$id_ran;

//SVG
if($acd_svg_height_number == '')    {
    $acd_svg_view = '175';
}
else    {
    $acd_svg_view = $acd_svg_height_number;
}
if($acd_svg_location_top == '') {
    $acd_svg_location_top = 'svgtopleft';
}
if($acd_svg_location_bottom == '') {
    $acd_svg_location_bottom = 'svgbottomright';
}
if($acd_svg_prio_top =='' || $acd_svg_prio_top <= '3') {
    $acd_svg_prio_top = '3';
}
if($acd_svg_prio_bottom =='' || $acd_svg_prio_bottom <= '3') {
    $acd_svg_prio_bottom = '3';
}
if($link_button != '') {
    $href = $link_button;
}

$href = vc_build_link( $link_button );
if ($href['title'] == '') {
    $href['title'] = $href['url'];
}
if ($href['url'] == '') {
    $href['url'] = '#';
}
//Setup style for shortcode
$setup      = array(
    'div[data-color="title_element"]' => array(
        'color' => $textcolor,
    ),
    'polygon[data-color="svg_fill_top"]'    => array(
        'fill'             =>  $acd_svg_bg_top,
    ),
    'polygon[data-color="svg_fill_bot"]'    => array(
        'fill'             =>  $acd_svg_bg_bottom,
    ),
    'polygon[data-color="svg_fill_bot3th"]'    => array(
        'fill'             =>  $color_enable_svg_3th,
    ),

);
$url_video = 'http://youtube.com/embed/'.danlet_get_youtubeID($url_video);
// Make css style for shortcode
if (function_exists('danlet_css_shortcode')) {
   echo danlet_css_shortcode($randomID, $setup);
}
do_action('danlet_js_single_video_hook',$id_ran);
?>


<div class="sh_bg_image_home3 play-video sh_single_video <?php echo esc_attr( $css_class ); ?>" id="<?php echo esc_attr($randomID); ?>">

   <?php if($acd_svg_location_top != ''): ?>
        <?php if($acd_svg_location_top == 'svgtopleft'){ ?>
            <svg class="svg_danlet set_svg_top" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" <?php echo danlet_set_zindex_svg($acd_svg_prio_top); ?>>
                <polygon data-color="svg_fill_top" points="0 <?php echo esc_attr($acd_svg_view); ?>,1920 0,0 0" class="acd_white fill" ></polygon>
            </svg>
        <?php } elseif($acd_svg_location_top == 'svgtopright'){ ?>
            <svg class="svg_danlet set_svg_top" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" <?php echo danlet_set_zindex_svg($acd_svg_prio_top); ?> >
                <polygon data-color="svg_fill_top" points="1920 <?php echo esc_attr($acd_svg_view); ?>,1920 0,0  0" class="acd_white fill" ></polygon>
            </svg>
        <?php } endif; ?>

        <?php if($acd_svg_location_bottom != '') : ?>
            <?php if($acd_svg_location_bottom == 'svgbottomleft'){ ?>
                <svg class="svg_danlet set_svg_bottom" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" <?php echo danlet_set_zindex_svg($acd_svg_prio_bottom); ?>>
                    <polygon data-color="svg_fill_bot" points="0 <?php echo esc_attr($acd_svg_view); ?>,1920 <?php echo esc_attr($acd_svg_view); ?>,0 0" class="acd_white fill" ></polygon>
                </svg>
            <?php }elseif($acd_svg_location_bottom == 'svgbottomright'){ ?>
                <svg class="svg_danlet set_svg_bottom" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" <?php echo danlet_set_zindex_svg($acd_svg_prio_bottom); ?>>
                    <polygon data-color="svg_fill_bot" points="1920 <?php echo esc_attr($acd_svg_view); ?>,1920 0,0 <?php echo esc_attr($acd_svg_view); ?>" class="acd_white fill"></polygon>
                </svg>

    <?php } endif; ?>
    <?php if($enable_svg_3th == 'yes') : ?>
    <svg class="svg_danlet set_svg_bottom" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" <?php echo danlet_set_zindex_svg($acd_svg_prio_bottom); ?>>
            <polygon data-color="svg_fill_bot3th" points="1920 <?php echo esc_attr($acd_svg_view); ?>,1920 0,960 <?php echo esc_attr($acd_svg_view/2); ?>" class="acd_white fill"></polygon>
        </svg>
    <?php endif;?>
    <div class="danlet-playvideo danlet-playvideo-<?php echo esc_attr($id_ran)?>">
        <div class="video-play">
        <iframe id="youtube-video-<?php echo esc_attr($id_ran)?>" height="800" src="<?php echo esc_url($url_video) ?>" allowfullscreen></iframe>
        </div>
        <?php if ($img_video != ''): ?>
            <div class="img-video player-preview"><img src="<?php printf($img_video) ?>" alt="<?php esc_attr_e('video image','danlet')?>"></div>
        <?php endif; ?>
            <div class="container ">
                <div class="sh_image_box">
                <div class="sh_image_box_content sh_image_content_center">
                <?php if ($title_element != ''): ?>
                    <div data-color="title_element" class="danlet-title sh_img_box_text sh_img_box_text_sel">
                        <?php echo esc_attr($title_element) ?>
                    </div>
                <?php endif ?>

                </div>
            </div>

        </div>
    </div><!--End .danlet-playvideo-->
</div>
