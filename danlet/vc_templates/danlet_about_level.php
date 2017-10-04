<?php
/**
 * @author shadow
 * 8/12/16
 */

$option =
$desc_level =
$content_level =
$big_image =
$social =
$small_image =
$link_face =
$link_google =
$link_twitter =
$link_youtube =
// color
$desccolor =
$contcolor =
$bgcolor =
$social_color =
$_shortcode_id =
//css
$css = '';

extract(shortcode_atts(array(
    'option' => '',
    'desc_level' => '',
    'content_level' => '',
    'big_image' => '',
    'small_image' => '',
    'social'        =>  'disable',
    'link_face' => '',
    'link_youtube' => '',
    'social_color'  =>  '',
    'link_twitter' => '',
    'link_google' => '',
    'desccolor' => '',
    'contcolor' => '',
    'bgcolor' => '',
    '_shortcode_id' => '',
    'css'   => '',
),$atts));

if($option == '') {
    $option = 'left';
}
$img_big = wp_get_attachment_image_src($big_image, 'full');
$img_small = wp_get_attachment_image_src($small_image, 'full');

$rand = rand(11, 99999);

$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ' ), $this->settings['base'], $atts);
$setup = array(

    );

// Make css style for shortcode
    if (function_exists('danlet_css_shortcode')) {
       echo danlet_css_shortcode($_shortcode_id, $setup);
    }

?>

<!-- section about image left -->
    <div class="sh_about_img_page">
        <div class="container">
            <?php if($option == 'left'):?>
            <div class="row">
                <div class="sh_about_img_page_box sh_about_img_page_left">
                    <div class="col-lg-6 col-md-6">
                        <div class="sh_about_img_page_show">
                        <?php if($img_big != ''):?>
                            <img class="wow fadeInUp" src="<?php echo esc_url($img_big[0]); ?>" alt="<?php echo isset($acd_title)?$acd_title:'';?>">
                        <?php endif; ?>
                        <div data-wow-delay="0.5s" class="wow fadeInUp sh_about_img_page_small">
                            <?php if($img_small != '') : ?>
                                <img src="<?php echo esc_url($img_small[0]); ?>" alt="<?php echo isset($acd_title)?$acd_title:'';?>">
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 ">
                        <div class="sh_about_img_page_content ">
                            <h4 class="sh_about_img_page_desc wow fadeInUp" data-wow-delay="0.25s">
                                <?php echo danlet_html_wpkses($desc_level); ?>
                            </h4>
                            <div class="sh_about_img_page_text wow fadeInUp" data-wow-delay="0.5s">
                                <?php  echo danlet_html_wpkses($content_level); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; if($option == 'right') :?>
            <div class="row">
                <div class="sh_about_img_page_box sh_about_img_page_right">
                    <div class="col-lg-6 col-md-6">
                        <div class="sh_about_img_page_content">
                            <h4 class="sh_about_img_page_desc wow fadeInUp" data-wow-delay="0.25s">
                                <?php echo danlet_html_wpkses($desc_level); ?>
                            </h4>
                            <div class="sh_about_img_page_text wow fadeInUp" data-wow-delay="0.5s">
                                <?php  echo danlet_html_wpkses($content_level); ?>
                            </div>
                            <?php if($social == 'enable') :?>
                            <ul class="sh_about_img_page_social wow fadeIn" data-wow-delay="1s">
                            <?php if($link_face != ''): ?>
                                <li><a href="<?php echo esc_attr($link_face); ?>" title="facebook">
                                    <i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                            <?php if($link_twitter != ''): ?>
                                <li><a href="<?php echo esc_attr($link_twitter); ?>" title="twitter">
                                    <i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                            <?php if($link_google != ''): ?>
                                <li><a href="<?php echo esc_attr($link_google); ?>" title="google">
                                    <i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                            <?php if($link_youtube != ''): ?>
                                <li><a href="<?php echo esc_attr($link_youtube); ?>" title="google">
                                    <i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            <?php endif; ?>
                            </ul>
                        <?php endif;?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="sh_about_img_page_show">
                            <?php
                            if($img_big != ''):
                            ?>
                                <img class="wow fadeInUp" src="<?php echo esc_url($img_big[0]); ?>" alt="big_img">
                            <?php endif; ?>
                            <div data-wow-delay="0.5s" class="wow fadeInUp sh_about_img_page_small">
                                <?php   if($img_small != '') :
                                     ?>
                                        <img src="<?php echo esc_url($img_small[0]); ?>" alt="img_small">
                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
        </div>
    </div>
<!-- End section about Image right -->
