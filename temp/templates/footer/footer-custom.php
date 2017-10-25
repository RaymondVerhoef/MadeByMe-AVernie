<?php
    $diagonal_svg_footer = danlet_check_option_theme('diagonal_svg_footer');
    $height_svg_footer = danlet_check_option_theme('height_svg_footer');
     $color_svg = danlet_check_option_theme('footer_svg_color');
    if ($diagonal_svg_footer == '') {
        $diagonal_svg_footer = 175;
    }
    if ($height_svg_footer == '') {
        $height_svg_footer = 175;
    }
    $enable_svg_footer = danlet_check_option_theme('enable_svg_footer');
?>
<footer class="acd_footer acd_footer_home1 custom">
    <?php if($enable_svg_footer != '0') :?>
    <svg class="acd_left_bot_svg" <?php $danlet_svg_with_map_svg = ''; echo apply_filters('danlet_svg_with_map_svg',$danlet_svg_with_map_svg)?> viewBox="0 0 1920 <?php echo esc_attr($diagonal_svg_footer) ?>" preserveAspectRatio="none" width="100%" height="<?php echo esc_attr($height_svg_footer) ?>">
      <polygon points="1920 <?php echo esc_attr($diagonal_svg_footer) ?>,1920 0,0 0" class="acd_white fill" fill="<?php  if($color_svg['color']) {  echo esc_attr($color_svg['color']); } ?>"></polygon>
    </svg>
    <?php endif;?>
    <div class="acd_footer_top ">
        <div class="container">
            <div class="row acd_footer_flex  <?php  $svg_with_map =  ''; echo apply_filters('danlet_svg_with_map',$svg_with_map) ?>">
                <?php  dynamic_sidebar( 'sidebar-footer-custom' ); ?>
            </div>
        </div>
    </div>
    <?php if (danlet_check_option_theme('text-copyright') != NULL){  ?>
        <div class="acd_footer_bottom">
            <div class="container">
                <div class="acd_footer_bottom_content">
                    <?php echo wp_kses_post(danlet_check_option_theme('text-copyright')); ?>
                </div>
            </div>
        </div>
    <?php } else { ?>
    <div class="acd_footer_bottom">
            <div class="container">
                <div class="acd_footer_bottom_content">
                <?php esc_html_e('Copyright &copy; ','danlet')?><?php print(date('Y'));?> <a href="<?php echo esc_url( __( 'http://beautheme.com/', 'danlet' ) ); ?>" title="<?php esc_html_e('BeauTheme','danlet'); ?>" target="_blank"><?php esc_html_e('BeauTheme','danlet'); ?></a><?php esc_html_e('.All Rights Reserved. ','danlet')?>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php
    if (danlet_check_option_theme('enable-go-top') == '1'): ?>
        <a href="#" class="back-to-top"></a>
    <?php endif ?>
</footer>
