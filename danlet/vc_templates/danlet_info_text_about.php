<?php
	$sh_link =
	$acd_vm =
	//set
	$color_link =
	$color_bg =
    $extra_class =
	$_shortcode_id =
	$css= '';
	extract(shortcode_atts(array(
		'sh_link'		=> '',
		'acd_vm'		=> '',
		'color_link' 	=> '',
		'color_bg'		=> '',
        'extra_class'   => '',
		'_shortcode_id' => '',
		'css'			=> '',
	), $atts));

	$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ' ), $this->settings['base'], $atts);
	// Make a random ID for shortcode
	$id_ran = rand(1, 99999);
	//Setup style for shortcode
	$color_link_op = array();
	if($color_link != NULL) {
		$color_link_op = array(
				'opacity' => '0.7'
			);
	}
	$setup      = array(
		array(
			'background-color'  => $color_bg,
		),
		'.color'		=> array(
			'color'		=> $color_link,
		),
		'.color:hover' => $color_link_op,
	);
	// Make css style for shortcode
    if (function_exists('danlet_css_shortcode')) {
       echo danlet_css_shortcode($_shortcode_id, $setup);
    }
    $sh_link    =  vc_build_link($sh_link);
    $sh_link_url = $sh_link['url'];
    $sh_link_title = $sh_link['title'];
    $sh_link_target = $sh_link['target'];
    $sh_link_rel = $sh_link['rel'];
    if($sh_link['target'] == ' _blank'){
        $sh_link_target = ' target="_blank"';
    }
    if($sh_link['rel'] == 'nofollow'){
        $sh_link_rel = ' rel="nofollow"';
    }
    if($sh_link['title'] == ''){
        $sh_link_title = esc_html__('View more', 'danlet');
    }
 ?>
<div class="acd_text_about bg <?php echo esc_attr($extra_class); ?>" id="<?php echo esc_attr($_shortcode_id); ?>">
	<div class="container">
		<div class="acd_text_about_box">
			<div class="acd_text_about_content">
				<?php echo danlet_html_wpkses($content); ?>
				<?php if($acd_vm == 'yes'){ ?>
					<p class="text_about_link " >
                    <?php if($sh_link_url != NULL) :?>
                    <a class="color acd_btn_awe" href="<?php echo esc_url($sh_link_url)?>" title="<?php echo esc_attr($sh_link_title)?>" <?php echo esc_attr($sh_link_target)?>><?php echo esc_attr($sh_link_title)?>
						 <i class="fa fa-long-arrow-right color" aria-hidden="true"></i></a>
                        <?php endif;?>
					</p>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
