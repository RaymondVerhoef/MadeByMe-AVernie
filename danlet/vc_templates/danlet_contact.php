<?php
	$acd_title =
	$acd_desc =
	$acd_form =
	$acd_contact_type =
	$acd_address =
	$acd_img =
	$acd_color_title =
	$acd_color_add =
	$acd_color_input =
	$acd_color_submit =
	$acd_bg_submit =
	$extra_class =
    $css =
	$_shortcode_id =
	$img_display = '';
	extract(shortcode_atts(array(
		'acd_title'				=> '',
		'acd_desc'				=> '',
		'acd_form'				=> '',
		'acd_contact_type'		=> '',
		'acd_address'			=> '',
		'acd_img'				=> '',
		'acd_color_title'		=> '',
		'acd_color_add'			=> '',
		'acd_color_input' 		=> '',
		'acd_color_submit'		=> '',
		'acd_bg_submit'			=> '',
        'extra_class'           => '',
		'_shortcode_id'			=> '',
		'css'					=> '',
	), $atts));
	$img = wp_get_attachment_image_src($acd_img, 'full');
	if($acd_img !=''){
		$img_display = esc_url($img[0]);
	}else{
		$img_display = 'http://placehold.it/470x470';
	}

	$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ' ), $this->settings['base'], $atts);
	// Make a random ID for shortcode
	$id_ran = rand(1, 99999);
	//Setup style for shortcode
	$setup      = array(
		'.acd_blog_title_classes, .acd_page_contact_form_name'	=> array(
			'color'					=> $acd_color_title,
		),
		'.acd_classes_desc, .txt-form'							=> array(
			'color'					=> $acd_color_add,
		),
		'#comment-submit'			=> array(
			'color'					=> $acd_color_submit,
			'background-color'		=> $acd_bg_submit,
		),
		'.acd_page_contact_info'	=> array(
			'color'					=> $acd_bg_submit,
		),

	);
	// Make css style for shortcode
if (function_exists('danlet_css_shortcode')) {
   echo danlet_css_shortcode($_shortcode_id, $setup);
}
?>
<div class="acd_page_contact <?php echo esc_attr($extra_class); ?>" id="<?php echo esc_attr($_shortcode_id); ?>">
	<div class="container">
		<h2 class=" acd_blog_title_classes"><?php  echo esc_attr(!empty($acd_title) ? $acd_title: '');?></h2>
		<div class="acd_classes_desc">
			<?php  echo esc_attr(!empty($acd_desc) ? $acd_desc: '');  ?>
		</div>
		<div class="row with_map">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="acd_page_contact_left">
					<div class="acd_page_contact_img">
						<img src="<?php echo esc_attr($img_display); ?>" alt="<?php esc_attr_e('contact image','danlet')?>">
					</div>
					<?php if($acd_address !=''){
						echo '<p class="acd_page_contact_info">';
					  	echo esc_attr($acd_address);
						echo '</p>';
					} ?>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="acd_page_contact_form">
					<h3 class="acd_page_contact_form_name">
						<?php if($acd_form != ''){
							echo esc_attr($acd_form);
						}else{
							esc_html_e('Write to us','danlet');
						} ?>
					</h3>
					<?php  echo do_shortcode('[contact-form-7 id=" '.$acd_contact_type.'"]'); ?>
                </div>
			</div>
		</div>
	</div>
</div>
<!-- End Section contact form -->