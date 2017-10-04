<!-- Section Map -->
<?php
    $acd_coordinate =
    $acd_svg_location_top =
    $acd_svg_location_bottom =
    $acd_svg_height_number =
    $acd_svg_bg_top =
    $acd_svg_bg_bottom =
    $acd_svg_prio_top =
    $acd_svg_prio_bottom =
    $_shortcode_id =
    $acd_coor = 
    $acd_style ='';
    extract(shortcode_atts(array(
        'acd_coordinate'     => '',
        'acd_svg_location_top'  => '',
        'acd_svg_location_bottom'   =>'',
        'acd_svg_height_number' => '',
        'acd_svg_bg_top'        => '',
        'acd_svg_bg_bottom'     => '',
        'acd_svg_prio_top'      => '',
        'acd_svg_prio_bottom'   => '',
        'acd_style'             => '',
        '_shortcode_id'   => '',
    ), $atts));
    if($acd_svg_height_number == ''){
        $acd_svg_view = '175';
    }else{
        $acd_svg_view = $acd_svg_height_number;
    }
    if ($acd_coordinate == '') {
        $acd_coor = '40.653555, -73.859024';
    }else{
        $acd_coor =$acd_coordinate;
    }
    if($acd_svg_location_top == '') {
        $acd_svg_location_top = 'svgtopright';
    }
    if($acd_svg_location_bottom == '') {
        $acd_svg_location_bottom = 'svgbottomleft';
    }
    if($acd_svg_prio_top < 1 ) {
        $acd_svg_prio_top =  1;
    }
    if($acd_svg_prio_bottom < 1 ) {
        $acd_svg_prio_bottom =  1;
    }
    if(!function_exists('danlet_svg_with_map_fill_footer')) {
        function danlet_svg_with_map_fill_footer($svg_with_map){
            $svg_with_map = 'with_map';
            return $svg_with_map;

        }
    }
    if(!function_exists('danlet_svg_clearfix_fix_footer')){
        function danlet_svg_clearfix_fix_footer($fix){
            $fix = '';
            return $fix;
        }
    }
    if(!function_exists('danlet_svg_with_map_svg_fix')){
        function danlet_svg_with_map_svg_fix($v){
          $v = 'style="display: none"';
          return $v;
        }

    }
    add_filter('danlet_svg_with_map_svg','danlet_svg_with_map_svg_fix');
    add_filter('danlet_svg_clearfix','danlet_svg_clearfix_fix_footer');
    add_filter('danlet_svg_with_map','danlet_svg_with_map_fill_footer');
?>
<div class="acd_page_contact_map svg_relative">
	<?php if($acd_svg_location_top != ''){ ?>
        <?php if($acd_svg_location_top == 'svgtopleft'){ ?>
            <svg class="svg_danlet set_svg_top" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" style="z-index:<?php echo esc_attr($acd_svg_prio_top); ?>">
                <polygon points="0 <?php echo esc_attr($acd_svg_view); ?>,1920 0,0 0" class="acd_white fill" fill="<?php echo esc_attr($acd_svg_bg_top); ?>"></polygon>
            </svg>
        <?php }elseif($acd_svg_location_top == 'svgtopright'){ ?>
            <svg class="svg_danlet set_svg_top" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" style="z-index:<?php echo esc_attr($acd_svg_prio_top); ?>" >
                <polygon points="1920 <?php echo esc_attr($acd_svg_view); ?>,1920 0,0  0" class="acd_white fill" fill="<?php echo esc_attr($acd_svg_bg_top); ?>"></polygon>
            </svg>
        <?php } } ?>
        <?php if($acd_svg_location_bottom != ''){ ?>
            <?php if($acd_svg_location_bottom == 'svgbottomleft'){ ?>
                <svg class="svg_danlet set_svg_bottom" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" style="z-index:<?php echo esc_attr($acd_svg_prio_bottom); ?>" >
                    <polygon points="0 <?php echo esc_attr($acd_svg_view); ?>,1920 <?php echo esc_attr($acd_svg_view); ?>,0 0" class="acd_gray fill" fill="<?php echo esc_attr($acd_svg_bg_bottom); ?>"></polygon>
                </svg>
            <?php }elseif($acd_svg_location_bottom == 'svgbottomright'){ ?>
                <svg class="svg_danlet set_svg_bottom" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" style="z-index:<?php echo esc_attr($acd_svg_prio_bottom); ?>" >
                    <polygon points="1920 <?php echo esc_attr($acd_svg_view); ?>,1920 0,0 <?php echo esc_attr($acd_svg_view); ?>" class="acd_gray fill" fill="<?php echo esc_attr($acd_svg_bg_bottom); ?>"></polygon>
                </svg>

        <?php } } ?>
	<div id="acd_map" class="acd_map">
    <?php do_action('danlet_js_google_map_hook',$acd_coor,$acd_style);?>
	</div>
</div>
<!-- End section Map -->
