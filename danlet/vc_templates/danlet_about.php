<?php
	$acd_title =
	$acd_absolute =
	$acd_desc =
	$sh_link =
	$acd_vm =
	$big_image =
	$small_image =
	$acd_color_title =
	$acd_color_desc =
	$acd_color_content =
	$acd_color_link =
	//set
	$font_title =
	$font_desc =
	$font_content =
	$font_link =
	$color_title =
	$color_desc =
	$color_content =
	$color_link =
	$css =
    $extra_class =
	$_shortcode_id =
	$check_title = '';
	extract(shortcode_atts(array(
		'acd_title'		=> '',
		'acd_absolute'		=> '',
		'acd_desc'		=> '',
		'sh_link'		=> '',
		'acd_vm'				=> '',
		'big_image'				=> '',
		'small_image'			=> '',
		'acd_color_title'	=> '',
		'acd_color_desc'	=> '',
		'acd_color_content' => '',
		'acd_color_link'	=> '',
		'css'					=> '',
        'extra_class'           => '',
		'_shortcode_id'			=> '',
	), $atts));
	$img = wp_get_attachment_image_src($big_image, 'full');
	$img2 = wp_get_attachment_image_src($small_image, 'full');
    $sh_link    =  vc_build_link($sh_link);
    $sh_link_url = $sh_link['url'];
    $sh_link_title = $sh_link['title'];
    $sh_link_target = $sh_link['target'];
    // $sh_link_rel = $sh_link['rel'];
    if($sh_link['target'] == ' _blank'){
        $sh_link_target = ' target="_blank"';
    }
    if($sh_link['rel'] == 'nofollow'){
        $sh_link_rel = ' rel="nofollow"';
    }
    if($sh_link['title'] == ''){
        $sh_link_title = esc_html__('View more', 'danlet');
    }

 	$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ' ), $this->settings['base'], $atts);
	// Make a random ID for shortcode
	//Setup style for shortcode
	$setup      = array(
	    '.sh_about_title' => array(
	        'color'    => $acd_color_title,
	    ),
	    '.sh_desc' => array(
	        'color'    => $acd_color_desc,
	    ),
	    '.sh_about_content ' => array(
	        'color'    => $acd_color_content,
	    ),
	    '.links' => array(
	        'color'    => $acd_color_link,
	    ),
	);
	// Make css style for shortcode
    if (function_exists('danlet_css_shortcode')) {
	   echo danlet_css_shortcode($_shortcode_id, $setup);
    }
?>
<div class="sh_about svg_relative <?php echo esc_attr($extra_class);?>" id="<?php echo esc_attr($_shortcode_id);?>">

	<div class="container">
		<div class="row">
			<ul class="sh_about_inner">
				<li class="col-lg-5 col-md-5 col-xs-12 sh_about_right">
					<div class="sh_about_img">
						<div class="sh_about_img_big wow fadeInUp" data-wow-duration="1s" >
							<?php if($img != NULL){
								echo '<img src="'.esc_url($img[0]).'" alt="'.esc_attr($acd_title).'">';
							}else{
								echo '<img src="http://dummyimage.com/600x400/000/fff" alt="'.esc_html__('No images','danlet').'">';
							} ?>

						</div>
						<?php if($img2 != NULL){ ?>
							<div class="sh_about_img_small wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.25s">
								<img src="<?php echo esc_url($img2[0]); ?>" alt="<?php echo esc_attr($acd_title);?>">
							</div>
						<?php } ?>
					</div>
				</li>
				<li class="col-lg-7 col-md-7 col-xs-12 ">
					<div class="sh_about_box">
						<?php if($acd_title != ''){
							if($acd_absolute == 'yes') {
								echo '<h3 data-wow-delay="0.75s" class="wow fadeIn sh_about_title sh_about_title_rotate'.$check_title.'" style="'.$font_title.'">'.$acd_title.'</h3>';
							} else {
								echo '<h3 data-wow-delay="0.25s" class="wow fadeIn sh_about_title sh_about_title_b '.$check_title.'" style="'.$font_title.'">'.$acd_title.'</h3>';
							}
						} ?>
						<?php if($acd_desc != ''){
							echo '<p data-wow-delay="0.35s" class="wow fadeInUp sh_desc sh_desc_b" style="'.$font_desc.'">'.$acd_desc.'</p>';
						} ?>
						<?php if($content != ''){
							echo '<p data-wow-delay="0.5s" class="wow fadeInUp sh_about_content sh_about_content_r " style="'.$font_content.'">'.$content.'</p>';
						} ?>
						<?php if($acd_vm == 'yes'){ ?>
							<div data-wow-delay="1s" class="wow fadeInUp sh_about_viewmore sh_viewmore_clvm">
                            <?php if($sh_link_url != NULL): ?>
                            <a class="links" href="<?php echo esc_url($sh_link_url)?>" title="<?php echo esc_attr($sh_link_title)?>" <?php echo esc_attr($sh_link_target)?>><?php echo esc_attr($sh_link_title)?>
								 <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                <?php endif;?>
							</div>
						<?php } ?>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>
