<?php
get_header('none');

?>
<section class="error_box">
    <div class="container error_content">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                <div class="acd_error_img">
                    <div class="acd_error_img_logo">
                        <a href="<?php echo esc_url(home_url( '/' ));?>" title="<?php esc_html_e('404 - Error','danlet'); ?>"><img src="<?php echo get_theme_file_uri( 'asset/images/logo_black.png');?>" alt="<?php esc_html_e('Home page','danlet'); ?>"></a>
                    </div>
                    <div class="acd_error_img_big acd_error_img_v">
                        <img src="<?php echo get_theme_file_uri( 'asset/images/home1_about_big.png');?>" alt="<?php esc_html_e('404 - Error','danlet'); ?>">
                    </div>
                    <div class="acd_error_img_small acd_error_img_v">
                        <img src="<?php echo get_theme_file_uri( 'asset/images/home1_about_small.png');?>" alt="<?php esc_html_e('404 - Error','danlet'); ?>">
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <div class="acd_error_info">
                    <h2 class="acd_error_title">
                        <?php esc_html_e('404 - Error','danlet'); ?> <br><?php esc_html_e('The resource requested could not be found on this server','danlet'); ?>
                    </h2>

                    </p>
                    <div class="acd_error_linkpage">
                        <a href="<?php echo esc_url(home_url( '/' ));?>" title="<?php esc_html_e('Home page','danlet'); ?>"> <?php esc_html_e('Home page','danlet'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <svg class="error_svg">
      <polygon points="0 375,1920 375,1920 100,0 0" style="fill:#d9a992;" />
    </svg>
</section>
<?php get_footer()?>
