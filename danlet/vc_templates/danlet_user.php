<?php

$info_user =
$desc_user =
$titlecolor =
$desccolor =
$_shortcode_id =
$css = '';

extract(shortcode_atts(array(
	'info_user' => '',
	'desc_user' => '',
	'titlecolor' => '',
    'desccolor' => '',
	'_shortcode_id' => '',
	'css' => ''
),$atts));


$rand = rand(11, 99999);

$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ' ), $this->settings['base'], $atts);
$id_ran = rand(1, 99999);

$setup = array();

if (function_exists('danlet_css_shortcode')) {
   echo danlet_css_shortcode($_shortcode_id, $setup);
}

global $current_user;

$args = array(
	'post_type' => 'class',
	'posts_per_page' => -1,
);
$class_id = '';
$class = array();
$loop = new WP_Query($args);
wp_reset_postdata();
if(is_user_logged_in()) :
	if($loop->have_posts()) {
		while($loop->have_posts()) : $loop->the_post();

		if(wc_customer_bought_product( $current_user->user_email, $current_user->ID, get_the_ID() )) {
			if($class_id == '') {
				$class_id = get_the_ID();
			} else {
				$class_id .= ','.get_the_ID();
			}
		}
		endwhile;
	}
?>

<div class="acd_user <?php echo esc_attr($css_class); ?>" id="<?php echo esc_attr($_shortcode_id); ?>">
		<svg class="acd_left_top_svg" viewBox="0 0 1920 175" preserveAspectRatio="none" width="100%" height="175">
		  <polygon points="1920 0,0 175,1920 175" class="acd_white fill"  />
		</svg>
		<div class="container">
			<h2 class="acd_blog_title_classes"><?php echo esc_attr(!empty($info_user) ? $info_user : ''); ?>, <?php echo esc_attr($current_user->display_name); ?>!</h2>
			<?php if($desc_user): ?>
			<div class="acd_classes_desc">
				<?php echo esc_attr($desc_user) ;?>
			</div>
		<?php endif; ?>
			<div class="acd_classes_cat">
				<ul class="acd_classes_cat_list">
                    <?php if($class_id != NULL): ?>
					<li><a href="<?php echo get_page_link()?>#" data-filter="timetable"><?php esc_html_e('Timetable','danlet') ?></a></li>
					<li class="active"><a href="<?php echo get_page_link()?>#" data-filter="subcribed-class"><?php  esc_html_e('Subcribed Classes','danlet') ?></a></li>
                    <?php endif;?>
                    <?php if($class_id == NULL) :?>
                    <li><a href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ) ?>" data-filter="shop"> <?php esc_html_e('Go to shop','danlet') ?></a></li>
                    <?php endif;?>
					<li><a href="<?php echo wp_logout_url(); ?>" data-filter="logout"><?php esc_html_e('Logout','danlet') ?></a></li>
				</ul>
			</div>
			<div class="row">

			</div>
		</div>

<?php do_action('danlet_js_sh_user_hook',$class_id);?>
	</div>

<?php endif;