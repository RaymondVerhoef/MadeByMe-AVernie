<?php
	$acd_subcribe_title =
	$acd_font_dropdown =
	$acd_subcribe_placedolder =
	$acd_font_placeholder =
	$acd_subcribe_color_title =
	$acd_subcribe_color_placeholder =
	$acd_subcribe_color_icon_button =
	$acd_subcribe_bg_input =
	$acd_svg_location_top =
	$acd_svg_location_bottom =
	$acd_svg_height_number =
	$acd_svg_bg_top =
	$acd_svg_bg_bottom =
	$acd_svg_prio_top =
	$acd_svg_prio_bottom =
	$icon_fontawesome =
	$extra_class =
    $css =
	$_shortcode_id =
	$acd_background_search = '';
	extract(shortcode_atts(array(
		'acd_subcribe_title'			 => '',
		'acd_font_dropdown'				 => '',
		'acd_subcribe_placedolder'		 => '',
		'acd_font_placeholder'			 => '',
		'acd_subcribe_color_title'		 => '',
		'acd_subcribe_color_placeholder' => '',
		'acd_subcribe_color_icon_button' => '',
		'acd_subcribe_bg_input'			 => '',
		'acd_svg_location_top'			 => '',
		'acd_svg_location_bottom'		 => '',
		'acd_svg_height_number'			 => '',
		'acd_svg_bg_top'				 => '',
		'acd_svg_bg_bottom'				 => '',
		'acd_svg_prio_top'				 => '',
		'acd_svg_prio_bottom'			 => '',
		'icon_fontawesome'				 => '',
		'extra_class'					 => '',
        'css'                            => '',
		'_shortcode_id'                   => '',
		'acd_background_search'			 => ''
	), $atts ));

	if($acd_svg_height_number == ''){
		$acd_svg_view = '175';
	}else{
		$acd_svg_view = $acd_svg_height_number;
	}
	if($acd_font_dropdown == 'EmilyLimePro'){
		$setup = array(
			'.sh_search_title' => array(
				'font-size' => '70px',
			),
		);
	}

	$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ' ), $this->settings['base'], $atts);
	// Make a random ID for shortcode
	$id_ran = rand(1, 99999);

	//Setup style for shortcode
	$setup      = array(
	    '.sh_search_box' 		=> array(
	        'background-color' 		=> $acd_subcribe_bg_input,
	    ),
	    '.sh-search_title' 		=> array(
	    	'font-family' 			=> $acd_font_dropdown,
	    ),
	    '.sh_search_title'		=> array(
	    	'color'					=> $acd_subcribe_color_title,
	    ),
	    '.sh_search_box .bt-submit i' => array(
	    	'color'					=> $acd_subcribe_color_icon_button,
	    ),
	    '.sh_search_box input[type="text"], .sh_search_box input[type="text"]' => array(
	    	'font-family'			=> $acd_font_placeholder,
	    ),
	     '.sh_search_box input[type="text"], .sh_search_box input[type="text"]' => array(
	    	'color'			=> $acd_subcribe_color_placeholder,
	    ),
	    '#beau-subcribe'		=> array(
	    	'background'			=> $acd_background_search,
	    ),

	);
	// Make css style for shortcode
	if (function_exists('danlet_css_shortcode')) {
       echo danlet_css_shortcode($_shortcode_id, $setup);
    }
	if($icon_fontawesome == '' ) {
		$icon_fontawesome = 'fa fa-paper-plane';
	}
 ?>

 <!-- Section Search -->
	<div class="sh_search svg_relative <?php echo esc_attr($extra_class);?>" id="<?php echo esc_attr($_shortcode_id);?>">
		<?php if($acd_svg_location_top != ''){ ?>
			<?php if($acd_svg_location_top == 'svgtopleft'){ ?>
				<svg class="svg_danlet set_svg_top" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" style="z-index:<?php echo esc_attr($acd_svg_prio_top); ?>">
			  	<polygon points="0 <?php echo esc_attr($acd_svg_view); ?>,1920 0,0 0" class="filter_svg_bg" fill="<?php echo esc_attr($acd_svg_bg_top); ?>"></polygon>
			</svg>
			<?php }elseif($acd_svg_location_top == 'svgtopright'){ ?>
				<svg class="svg_danlet set_svg_top" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" style="z-index:<?php echo esc_attr($acd_svg_prio_top); ?>" >
				  	<polygon points="1920 <?php echo esc_attr($acd_svg_view); ?>,1920 0,0  0" class="filter_svg_bg" fill="<?php echo esc_attr($acd_svg_bg_top); ?>"></polygon>
				</svg>

		<?php } } ?>
		<?php if($acd_svg_location_bottom != ''){ ?>
			<?php if($acd_svg_location_bottom == 'svgbottomleft'){ ?>
				<svg class="svg_danlet set_svg_bottom" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" style="z-index:<?php echo esc_attr($acd_svg_prio_bottom); ?>" >
				  	<polygon points="0 <?php echo esc_attr($acd_svg_view); ?>,1920 <?php echo esc_attr($acd_svg_view); ?>,0 0" class="filter_svg_bg" fill="<?php echo esc_attr($acd_svg_bg_bottom); ?>"></polygon>
				</svg>
			<?php }elseif($acd_svg_location_bottom == 'svgbottomright'){ ?>
				<svg class="svg_danlet set_svg_bottom" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" style="z-index:<?php echo esc_attr($acd_svg_prio_bottom); ?>" >
				  	<polygon points="1920 <?php echo esc_attr($acd_svg_view); ?>,1920 0,0 <?php echo esc_attr($acd_svg_view); ?>" class="filter_svg_bg" fill="<?php echo esc_attr($acd_svg_bg_bottom); ?>"></polygon>
				</svg>

		<?php } } ?>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
					<h3 class="sh_search_title sh_search_title_el">
						<?php
							if($acd_subcribe_title !=''){
								echo esc_attr($acd_subcribe_title);
							}
						?>
					</h3>
					<div class="sh_search_box sh_search_box_bg_bl">
						<form method="get" id="beau-subcribe">
	                        <input type="text" name="email" class="bt-text" id="email"
	                        placeholder="<?php if($acd_subcribe_placedolder != ''){
	                        	echo esc_attr($acd_subcribe_placedolder);
	                        }else{
	                        	esc_html_e('Enter your email..','danlet');
	                        	} ?>">
	                        <button type="submit" name="book-btn-subcribe" class="bt-submit"><i class="<?php echo esc_attr($icon_fontawesome);?>" aria-hidden="true"></i></button>
	                    </form>
					</div>
					<div class="subcribe-message-title">
                        <span class="subcribe-title"></span>
                        <span class="subcribe-message"></span>
                    </div><!--Subcribe message-->
				</div>
			</div>
		</div>
	</div>
	<!-- End section Search -->
