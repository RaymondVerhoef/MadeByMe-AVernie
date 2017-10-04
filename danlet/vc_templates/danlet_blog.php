<?php
	//general
	$acd_title =
	$acd_style_blog =
	$sh_link =
	$acd_vm =
	//setting color
	$acd_color_title =
	$acd_color_set =
	$acd_color_name =
	$acd_color_date =
	$acd_color_link =
    $acd_color_viewmore =
    $acd_color_category =
	//option
	$option_data =
	$post_id =
	$id_category =
	$order_by =
	$order =
	$max_items =

	//set
	$color_title =
	$color_desc =
	$color_content =
	$color_link =
	$check_title =
	// css
    $extra_class =
	$_shortcode_id =
	$css = '';
	extract(shortcode_atts(array(
		'acd_title'				=> '',
		'acd_style_blog'		=> 'default',
		'sh_link'				=> '',
		'acd_vm'				=> '',
		// option
		'option_data'			=> '',
		'post_id'				=> '',
		'id_category'			=> '',
		'order_by'				=> '',
		'order'					=> '',
		'max_items'				=> '',
		//color
		'acd_color_title'		=> '',
		'acd_color_category'	=> '',
		'acd_color_date'		=> '',
		'acd_color_name'		=> '',
        'acd_color_viewmore'   =>  '',
		'acd_color_set'		     => '',
		'acd_color_link'		=> '',

		// css
        'extra_class'           => '',
		'_shortcode_id'			=> '',
		'css'					=> '',
	), $atts));
	/* shadow*/
	$list_category = '';
	$list_post = '';
	if($max_items == ''){
	    $max_items = 3;
	}
	if ($post_id != NULL) {
	  $list_post = explode(',', $post_id);
	}
	if($order == '') {
		$order = 'ASC';
	}
	if($order_by == '') {
		$order_by = 'ID';
	}
	if ($id_category != NULL) {
	    $list_category = explode(',', $id_category);
	}
	if ($id_category != NULL) {
	    $args = array(
	        'post_type' 		=> 'post',
	        'posts_per_page' 	=> $max_items,
	        'order'				=> $order,
	        'orderby'			=> $order_by,
	        'post__in'        	=> $list_post,
	        'tax_query'         => array(
	            array(
	                'taxonomy'  => 'category',
	                'field'     => 'id',
	                'terms'     => $list_category,
	            ),
	        ),
	    );
	}
	else{
	    $args = array(
	      'post_type' => 'post',
	      'posts_per_page' => $max_items,
	      'post__in'        => $post_id,
	    );
	}
	/*end*/
	$loop = new WP_Query($args);
    wp_reset_postdata();
 	$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ' ), $this->settings['base'], $atts);
	// Make a random ID for shortcode

	//Setup style for shortcode
	$setup      = array(
		'h3[data-color="sh_title"]' 	=> array(
			'color'			=> $acd_color_title,
		),
		'p[data-color="sh_date"]' 	=> array(
			'color'			=> $acd_color_date,
		),
		'h4[data-color="sh_name"] a ' => array(
            'color'         => $acd_color_name,
        ),
        'div[data-color="sh_viewmore"] a' => array(
			'color'			=> $acd_color_viewmore,
		),
        'ul[data-color="sh_category"] li a' => array(
            'color'         => $acd_color_category,
        ),


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
        $sh_link_title = esc_html__('All News', 'danlet');
    }
?>
<div class="sh_blog svg_relative <?php echo esc_attr($extra_class); ?>" id="<?php echo esc_attr($_shortcode_id); ?>">

	<div class="container">
		<?php if($acd_title !=''){
			echo '<h3 data-color="sh_title" class="sh_blog_title">'.$acd_title.'</h3>';
		} ?>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="sh_blog_box">
					<?php

						if($loop != NULL) {
	                       include( get_template_directory() .'/vc_templates/option_base/blog/'. $acd_style_blog.'.php');
						}
                    ?>

				</div>
			</div>
		</div>
	</div>
</div>




