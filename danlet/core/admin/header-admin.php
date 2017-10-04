<?php
$pages = array(
	'theme-name' => esc_html__('Register Product', 'danlet'),
	'theme-support' => esc_html__('Support', 'danlet'),
	'theme-templates' => esc_html__('Templates', 'danlet'),
	'theme-image-size' => esc_html__('Image Sizes', 'danlet'),
	'theme-status' => esc_html__('System Status', 'danlet'),
);

$danlet_theme = wp_get_theme(get_template());
?>
<div class="wrap">
	<h2><?php esc_html_e('Beautheme Control Panel', 'danlet'); ?></h2>
</div>
<div class="container-admin">
	<div class="admin-danlet-header clearfix">
		<span class="logo-admin-danlet">
			<img src="<?php echo danlet_ADMIN_CORE; ?>/images/logo.png">
			<span><?php echo esc_attr($danlet_theme->get( 'Name' )); ?> <?php esc_html_e('Control Panel', 'danlet'); ?></span>
		</span>
		<span class="version-holder">
			<?php esc_html_e('Version:', 'danlet'); ?> <?php echo esc_attr($danlet_theme->get( 'Version' )); ?>
		</span>
	</div>
</div>