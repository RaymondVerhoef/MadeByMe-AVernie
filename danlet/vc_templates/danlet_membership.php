<?php
    $title_element =
    $desc_element =
    $name_submit =
    $page =
    $membership_id =
    $textcolor =
    $desccolor =
    $namecolor =
    $pricecolor =
    $bgcolor =
    $linkcolor =
    $linkhover =
    $bglink =
    $bglinkhover =
    $featurecolor =
    $_shortcode_id =
    $css = '';

extract(shortcode_atts(array(
    'title_element' => '',
    'desc_element' => '',
    'name_submit' => '',
    'page' => '',
    'membership_id' => '',
    'textcolor' => '',
    'desccolor' => '',
    'namecolor' => '',
    'pricecolor' => '',
    'linkcolor' => '',
    'bgcolor' => '',
    'linkhover' => '',
    'bglink' => '',
    'bglinkhover' => '',
    '_shortcode_id' => '',
    'featurecolor' => '',
    'css' => '',
),$atts));

$list_id = '';

if( !empty($membership_id) ) {
    $list_id = explode( ',', $membership_id);
}

if($page == '') {
    $page = 6;
}

if($list_id != '') {
    $args = array(
        'post_type' => 'membership',
        'post__in' => $list_id,
        'posts_per_page' => $page,
    );
} else{
        $args = array(
        'post_type' => 'membership',
        'posts_per_page' => $page,
    );
}

$loop = new WP_Query($args);
wp_reset_postdata();

$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ' ), $this->settings['base'], $atts);
$id_ran = rand(1, 99999);
// $randomID   =  'membership_'.$id_ran;
$setup      = array(
    array(
        'background' => $bgcolor,
    ),

    'h2[data-color="title_member"]' => array(
        'color' => $textcolor,
    ),
    'div[data-color="desc_member"]' => array(
        'color' => $desccolor,
    ),
    'h3[data-color="name"]' => array(
        'color' => $namecolor,
    ),
    'p[data-color="price"]' => array(
        'color' => $pricecolor,
    ),
    'li[data-color="feature"]' => array(
        'color' => $featurecolor,
    ),
    'a[data-color="link"]' => array(
        'color' => $linkcolor,
    ),
    'a[data-color="link"]:hover' => array(
        'color' => $linkhover,
    ),
    'a[data-color="link"]' => array(
        'background' => $bglink,
    ),
    'a[data-color="link"]' => array(
        'background' => $bglinkhover,
    ),
);
if (function_exists('danlet_css_shortcode')) {
    echo danlet_css_shortcode($_shortcode_id, $setup);
}
?>

<div class="acd_membership <?php echo esc_attr($css_class); ?>" id="<?php echo esc_attr($_shortcode_id); ?>">
        <div class="container">
        <?php if($title_element != '') : ?>
            <h2  data-color="title_member" class=" acd_blog_title_classes"><?php echo esc_attr($title_element); ?></h2>
            <?php
            endif;
            if($desc_element != '') :
             ?>
            <div data-color="desc_member" class="acd_classes_desc">
            <?php echo esc_attr($desc_element); ?>
            </div>
        <?php endif; ?>
            <div class="row">
                <ul class="acd_membership_box">
                <?php while($loop->have_posts()) : $loop->the_post(); ?>
                    <li class="col-lg-4 col-md-6 col-xs-12">
                        <div class="acd_membership_list">
                            <h3 data-color="name" class="acd_membership_month">
                                <?php the_title(); ?>
                            </h3>
                            <p data-color="price" class="acd_membership_price"><?php echo esc_attr('$ ', 'danlet'); ?>
                                <?php the_field('mbs_price'); ?>
                            </p>
                            <ul class="acd_membership_content">
                            <?php while(have_rows('mbs_features', get_the_ID())) : the_row(); ?>
                                <li data-color="feature"><?php the_sub_field('mbs_feature_row'); ?></li>
                            <?php endwhile; ?>
                            </ul>
                            <p class="acd_buy_membership">
                                <a data-color="link" href="<?php the_field('mbs_support_link'); ?>" title="<?php esc_html_e('buy it now','danlet');?>"><?php esc_html_e('Buy it now','danlet');?></a>
                            </p>
                        </div>
                    </li>
                <?php endwhile; ?>
                </ul>

            </div>
        </div>
    </div>
    <!-- End Section contact form -->