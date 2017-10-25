<?php
    $show_full_height_top_header = danlet_get_field('show_full_height_top_header');
    $class_full_height_top_header = "";
    if($show_full_height_top_header == true) {
        $class_full_height_top_header = " full-top";
    }
    $slide_id = danlet_get_field('select_slide');

    if (($slide_id != NULL || get_the_post_thumbnail_url() != false) && !is_woocommerce()) {

    ?>
     <div class="slider-image<?php echo esc_attr($class_full_height_top_header);?><?php echo danlet_single_check_no_thumb('fix-height')?>">
        <?php
            if ($slide_id != '0' && $slide_id != NULL && $slide_id != '' && $slide_id != 'Select') {
                ?>
                <div class="main-slider">
                    <?php
                    if (function_exists('putRevSlider')) {
                        putRevSlider($slide_id);
                    }
                    ?>
                </div>
                <?php
            }
            do_action( 'danlet_cover_image' );
            $diagonal_svg_header = danlet_check_option_theme('diagonal_svg_header');

            $height_svg_header = danlet_check_option_theme('height_svg_header');
            if ($diagonal_svg_header == '') {
                $diagonal_svg_header = 175;
            }
            if ($height_svg_header == '') {
                $height_svg_header = 175;
            }
         ?>
        <svg class="acd_left_top_svg" viewBox="0 0 1920 <?php echo esc_attr($diagonal_svg_header) ?>" preserveAspectRatio="none" width="100%" height="<?php echo esc_attr($height_svg_header) ?>">
          <polygon points="0 <?php echo esc_attr($height_svg_header) ?>,1920 <?php echo esc_attr($diagonal_svg_header) ?>,0 0" class="acd_white fill"></polygon>
        </svg>
        <?php $danlet_art_header = danlet_get_field('enable_svg_left_right_header');
            if($danlet_art_header != false) :
        ?>
        <svg class="acd_left_top_svg" viewBox="0 0 1920 <?php echo esc_attr($diagonal_svg_header) ?>" preserveAspectRatio="none" width="100%" height="<?php echo esc_attr($diagonal_svg_header) ?>">
            <polygon points="0 <?php echo esc_attr($height_svg_header) ?>,0 0,960 <?php echo esc_attr($height_svg_header/2) ?>" class="fill_rosec7"/>
        </svg>
        <?php endif;?>
    </div>
    <?php
    }
    elseif(function_exists('is_woocommerce') && is_woocommerce()){
        $cover_shop     = danlet_check_option_theme('danlet-cover-shop');
        if (isset($cover_shop['url']) && strlen($cover_shop['url']) > 0) {
    ?>
        <div class="slider-image<?php echo esc_attr($class_full_height_top_header);?><?php echo danlet_single_check_no_thumb('fix-height')?>">
        <?php

            do_action( 'danlet_cover_image' );
            $diagonal_svg_header = danlet_check_option_theme('diagonal_svg_header');

            $height_svg_header = danlet_check_option_theme('height_svg_header');
            if ($diagonal_svg_header == '') {
                $diagonal_svg_header = 175;
            }
            if ($height_svg_header == '') {
                $height_svg_header = 175;
            }
         ?>
        <svg class="acd_left_top_svg" viewBox="0 0 1920 <?php echo esc_attr($diagonal_svg_header) ?>" preserveAspectRatio="none" width="100%" height="<?php echo esc_attr($height_svg_header) ?>">
          <polygon points="0 <?php echo esc_attr($height_svg_header) ?>,1920 <?php echo esc_attr($diagonal_svg_header) ?>,0 0" class="acd_white fill"></polygon>
        </svg>
    </div>
    <?php
        }
    }else{
        if (!function_exists('is_woocommerce') || (function_exists('is_woocommerce') && !is_woocommerce())) {
    ?>
        <div class="slider-image-none"></div>
    <?php
    }
}
