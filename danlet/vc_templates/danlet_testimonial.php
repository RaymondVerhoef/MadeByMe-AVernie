<?php
	$acd_title =
	$acd_font_content =
	$acd_color_content =
	$background_color =
	$acd_svg_location_top =
	$acd_svg_location_bottom =
	$acd_svg_height_number =
	$acd_svg_bg_top =
	$acd_svg_bg_bottom =
	$acd_svg_prio_top =
	$acd_svg_prio_bottom =
	$post_id =
    $quote_image =
	//set
	$font_content =
	$font_link =
	$bg_color =
	$extra_class =
    $css =
	$_shortcode_id =
	$max_items =
	$bg_img = '';
	extract(shortcode_atts(array(
		'acd_title'				=> '',
		'acd_font_content'		=> '',
		'acd_color_content' 	=> '',
		'background_color'		=> '',
		'acd_svg_location_top'	=> '',
		'acd_svg_location_bottom'	=>'',
        'quote_image'           =>  '',
		'acd_svg_height_number'	=> '',
		'acd_svg_bg_top'		=> '',
		'acd_svg_bg_bottom'		=> '',
		'acd_svg_prio_top'		=> '',
		'acd_svg_prio_bottom'	=> '',
		'post_id'	=> '',
		'extra_class'			=> '',
        'max_items'             => '',
		'_shortcode_id'				=> '',
		'css'					=> ''
	), $atts));
	$rand = rand(11,99999);

	if($max_items == '') {
		$max_items = '3';
	}
	$list = '';
	if(!empty($post_id)) {
    $list = explode(',', $post_id);
	}

	if($acd_svg_height_number == ''){
		$acd_svg_view = '175';
	}else{
		$acd_svg_view = $acd_svg_height_number;
 	}

 	$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ' ), $this->settings['base'], $atts);
	// Make a random ID for shortcode
	$id_ran = rand(1, 99999);
	$randomID   =  'sw_r'.$id_ran;
	//Setup style for shortcode
	$setup      = array(
		'.sh_testimonial_info_cbl' => array(
			'font-family' => $acd_font_content,
		),
		'.sh_testimonial_info_cbl' => array(
            'color' => $acd_color_content,
        ),
        '.testimonial-pagination.bg_testimonial_op1 .swiper-pagination-bullet' => array(
			'background' => $acd_color_content,
		),
		'.sh_testimonial' 			=> array(
			'background'	=> $background_color,
		),
		'.set_svg_top' => array(
			'z-index' => $acd_svg_prio_top,
		),
        'polygon[data-color="svg_fill_top"]'    => array(
            'fill'             =>  $acd_svg_bg_top,
        ),
        'polygon[data-color="svg_fill_bot"]'    => array(
            'fill'             =>  $acd_svg_bg_bottom,
        ),
	);

	// Make css style for shortcode
    if (function_exists('danlet_css_shortcode')) {
       echo danlet_css_shortcode($_shortcode_id, $setup);
    }
 	// @ WP_query

    $args = array(
      'post_type'           => 'testimonial',
      'posts_per_page'      => $max_items,
      'post__in'            => $list,
    );
    $kses = array(
        //formatting
        'strong' => array(),
        'em'     => array(),
        'b'      => array(),
        'i'      => array(),

        //links
        'a'     => array(
            'href' => array()
        ),
    );
    $loop = new WP_Query( $args);
    wp_reset_postdata();
 ?>
<section class="sh_testimonial sh_bg_testimonial_op1 svg_relative <?php echo esc_attr($css_class);?>" id="<?php echo esc_attr($_shortcode_id);?>">
    <?php if($acd_svg_location_top != ''): ?>
        <?php if($acd_svg_location_top == 'svgtopleft'){ ?>
            <svg class="svg_danlet set_svg_top" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" <?php echo danlet_set_zindex_svg($acd_svg_prio_top); ?>>
                <polygon data-color="svg_fill_top" points="0 <?php echo esc_attr($acd_svg_view); ?>,1920 0,0 0" class="acd_white fill" ></polygon>
            </svg>
        <?php } elseif($acd_svg_location_top == 'svgtopright'){ ?>
            <svg class="svg_danlet set_svg_top" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" <?php echo danlet_set_zindex_svg($acd_svg_prio_top); ?> >
                <polygon data-color="svg_fill_top" points="1920 <?php echo esc_attr($acd_svg_view); ?>,1920 0,0  0" class="acd_white fill" ></polygon>
            </svg>
        <?php } endif; ?>

        <?php if($acd_svg_location_bottom != '') : ?>
            <?php if($acd_svg_location_bottom == 'svgbottomleft'){ ?>
                <svg class="svg_danlet set_svg_bottom" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" <?php echo danlet_set_zindex_svg($acd_svg_prio_bottom); ?>>
                    <polygon data-color="svg_fill_bot" points="0 <?php echo esc_attr($acd_svg_view); ?>,1920 <?php echo esc_attr($acd_svg_view); ?>,0 0" class="acd_white fill" ></polygon>
                </svg>
            <?php }elseif($acd_svg_location_bottom == 'svgbottomright'){ ?>
                <svg class="svg_danlet set_svg_bottom" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" <?php echo danlet_set_zindex_svg($acd_svg_prio_bottom); ?>>
                    <polygon data-color="svg_fill_bot" points="1920 <?php echo esc_attr($acd_svg_view); ?>,1920 0,0 <?php echo esc_attr($acd_svg_view); ?>" class="acd_white fill"></polygon>
                </svg>

    <?php } endif; ?>
	<div class="container">
		<div class="sh_testimonial_box">
			<div class="swiper-testimonials swiper-container-horizontal sw_r<?php echo esc_attr($id_ran); ?>">
		        <div class="swiper-wrapper">
		        	<?php if($loop->have_posts()) { ?>
                        <?php while($loop->have_posts()) : $loop->the_post(); ?>
				            <div class="swiper-slide " >
				            	<div class="sh_testimonial_content">
				            		<?php if(wp_get_attachment_url($quote_image)){
                                        echo '<img alt="'.esc_attr(get_the_title()).'" src="'.esc_url(wp_get_attachment_url($quote_image)).'">';
				            		}else{
				            			echo '<img alt="'.esc_attr(get_the_title()).'" src="'.esc_url(get_template_directory_uri()).'/asset/images/icon_testimonial_home1.png">';
				            		} ?>
									<div class="sh_testimonial_info sh_testimonial_info_cbl" >
										<?php if(get_the_content() != NULL) {
                                                echo wp_kses(get_the_content(),$kses);
                                            }?>
									</div>
				            	</div>
				            </div>
				        <?php endwhile; ?>
                    <?php } ?>

		        </div>
		        <!-- Add Pagination -->
		        <div class="testimonial-pagination bg_testimonial_op1 ">
		        </div>
		    </div>
		</div>
	</div>
</section>
<?php
do_action('danlet_js_testimonial_hook',$id_ran);
