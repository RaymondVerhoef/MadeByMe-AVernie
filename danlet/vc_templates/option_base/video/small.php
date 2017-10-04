<?php
$setup      = array(
	array(
		'background'	=> $background_color,
	),
    'h3[data-color="sh_video_title"]'      => array(
        'color'         	=> $color_title_element,
    ),
     'h3[data-color="sh_video_title"]:hover'      => array(
        'color'         	=> $color_title_element_hover,
    ),
    'a[data-color="sh_textmore"]'      => array(
        'color'         	=> $color_text_more,
    ),
    'a[data-color="sh_textmore"]:hover'      => array(
        'color'         	=> $color_text_more_hover,
    ),
    'a[data-color="sh_video"]' => array(
        'color'             =>  $color_title_video,
    ),
    'a[data-color="sh_video"]:hover' => array(
        'color'             =>  $color_title_video_hover,
    ),
    'li[data-color="acd_view"]'    => array(
        'color'             =>  $color_view_video,
    ),
    'i.fa-eye'    => array(
        'color'             =>  $color_view_video,
    ),

    'li[data-color="acd_like"]'    => array(
        'color'             =>  $color_like_video,
    ),
    'fa-heart-o'    => array(
        'color'             =>  $color_like_video,
    ),
);
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
    $sh_link_title = esc_html__('All video', 'danlet');
}
// Make css style for shortcode
if (function_exists('danlet_css_shortcode')) {
    echo danlet_css_shortcode($_shortcode_id, $setup);
}
?><!-- Section video -->
<div id="<?php echo esc_attr($_shortcode_id)?>" class="sh_video bg_sh_video_bl <?php echo esc_attr($css_class);?>">
	<?php if($acd_svg_location_top != ''): ?>
		<?php if($acd_svg_location_top == 'svgtopleft'){ ?>
			<svg class="svg_danlet set_svg_top" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" style="z-index:<?php echo esc_attr($acd_svg_prio_top); ?>">
			  	<polygon points="0 <?php echo esc_attr($acd_svg_view); ?>,1920 0,0 0" class="acd_white fill" fill="<?php echo esc_attr($acd_svg_bg_top); ?>"></polygon>
			</svg>
		<?php } elseif($acd_svg_location_top == 'svgtopright'){ ?>
			<svg class="svg_danlet set_svg_top" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" style="z-index:<?php echo esc_attr($acd_svg_prio_top); ?>" >
			  	<polygon points="1920 <?php echo esc_attr($acd_svg_view); ?>,1920 0,0  0" class="acd_white fill" fill="<?php echo esc_attr($acd_svg_bg_top); ?>"></polygon>
			</svg>
		<?php } endif; ?>

		<?php if($acd_svg_location_bottom != '') : ?>
			<?php if($acd_svg_location_bottom == 'svgbottomleft'){ ?>
				<svg class="svg_danlet set_svg_bottom" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" style="z-index:<?php echo esc_attr($acd_svg_prio_bottom); ?>" >
				  	<polygon points="0 <?php echo esc_attr($acd_svg_view); ?>,1920 <?php echo esc_attr($acd_svg_view); ?>,0 0" class="acd_white fill" fill="<?php echo esc_attr($acd_svg_bg_bottom); ?>"></polygon>
				</svg>
			<?php }elseif($acd_svg_location_bottom == 'svgbottomright'){ ?>
				<svg class="svg_danlet set_svg_bottom" viewBox="0 0 1920 <?php echo esc_attr($acd_svg_view); ?>" preserveAspectRatio="none" width="100%" style="z-index:<?php echo esc_attr($acd_svg_prio_bottom); ?>" >
				  	<polygon points="1920 <?php echo esc_attr($acd_svg_view); ?>,1920 0,0 <?php echo esc_attr($acd_svg_view); ?>" class="acd_white fill" fill="<?php echo esc_attr($acd_svg_bg_bottom); ?>"></polygon>
				</svg>

		<?php } endif; ?>
	<div class="sh_video_box">
		<?php if($video_title_element != NULL) :?>
		<h3 data-color="sh_video_title" data-wow-duration="1s" class="wow fadeInUp sh_video_title sh_video_title_mb"><?php echo esc_attr($video_title_element);?></h3>
		<?php endif;?>
		<div class="sh_video_content">
			<div data-acd="swiper-video-<?php echo esc_attr($rand)?>" class="swiper-video">
		        <div class="swiper-wrapper">
		        <?php
					$i = 0;
		        	while($loop-> have_posts()) : $loop->the_post();
						$i += 0.2;
                        if(function_exists('beau_getpost_view')){
                            $view = beau_getpost_view(get_the_ID());
                        }
                        if(function_exists('beau_getpost_like')) {
                            $like = beau_getpost_like(get_the_ID());
                        }
		        	?>
		            <div class="swiper-slide wow fadeInUp" data-wow-delay="<?php echo esc_attr($i) . 's' ?>">
		            	<div class="sh_video_img">
		            		<a href="<?php echo get_permalink();?>" target="_blank" title="<?php echo get_the_title();?>">
                             <?php echo danlet_thumbnail_image(get_the_ID());?>
                             </a>
		            	</div>
		            	<div class="sh_video_content">
		            		<h4 class="sh_video_name sh_video_name_clw">
		            			<a data-color="sh_video" href="<?php echo get_permalink();?>" title="<?php echo get_the_title();?>"><?php echo get_the_title();?></a>
		            		</h4>
		            		<ul class="sh_video_view sh_video_view_cw">
		            			<li data-color="acd_view"><?php echo esc_attr($view);?> <i class="fa fa-eye" aria-hidden="true"></i></li>
		            			<li data-color="acd_like"><?php
                                if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
                                echo get_comments_number();
                                endif;?> <i class="fa fa-comment-o" aria-hidden="true"></i></li>
		            		</ul>
		            	</div>
		            </div>
				<?php
					endwhile;
				?>
		        </div>
		    </div>
		    <?php if($option_nav == 'enable') :?>
		    <!-- Next & Prev-->
		        <div data-acd="btn-next-<?php echo esc_attr($rand)?>" class="acd_btn_white_next">
		        </div>
		        <div data-acd="btn-prev-<?php echo esc_attr($rand)?>" class="acd_btn_white_prev">
		        </div>
	    	<?php endif; ?>
	    </div>
	    <?php if($sh_link_url != NULL) :?>
	    <div class="sh_video_vm sh_video_vm_clw"><a data-color="sh_textmore"  href="<?php echo esc_url($sh_link_url)?>" title="<?php echo esc_attr($sh_link_title)?>" <?php echo esc_attr($sh_link_target)?>><?php echo esc_attr($sh_link_title)?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
	    </div>
		<?php endif;?>
	</div>
</div>
<!-- end section video -->
<?php
$danlet_video_prefix =  'video';
do_action('danlet_js_swiper_hook',$rand,$danlet_video_prefix,$option_nav);
