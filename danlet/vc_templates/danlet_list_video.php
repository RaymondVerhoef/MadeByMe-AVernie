<?php
$option_tabs =
$title_video =
$post_id =
$max_items =
$titlecolor =
$title_video =
$bgcolor =
$likecolor =
$_shortcode_id =
$css = '';


extract(shortcode_atts(array(
    'option_tabs'   =>  '',
	'title_video' => '',
	'post_id' => '',
	'max_items' => '',
	'titlecolor' => '',
	'title_video' => '',
	'bgcolor' => '',
    'likecolor' => '',
	'_shortcode_id' => '',
	'css' => '',
),$atts));
if($option_tabs == ''){
    $option_tabs = 'enable';
}
if($max_items == '') {
	$max_items = 6;
}
$list = '';
if(!empty($post_id)) {
	$list = explode(',',$post_id);
}

$rand = rand(11,99999);

$css_class = apply_filters(
    VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' ' ), $this->settings['base'], $atts);
	// Make a random ID for shortcode
	$id_ran = rand(1, 99999);
	//Setup style for shortcode
	$setup      = array(
	);

	// Make css style for shortcode
    if (function_exists('danlet_css_shortcode')) {
        echo danlet_css_shortcode($_shortcode_id, $setup);
    }
 	// @ WP_query
 	if($list != '') {
 		$args = array(
 			'post_type' => 'video',
 			'post__in' => $list,
 		);
 	} else {
 		$args = array(
 			'post_type' => 'video',
 			'posts_per_page' => $max_items,
 		);
 	}
    $loop = new WP_Query( $args);
    wp_reset_postdata();
$tabs = 'list_video_'.$rand;
$content =  'content_video_'.$rand;
 ?>
<div class="acd_blog">
    <svg class="acd_left_top_svg" viewBox="0 0 1920 175" preserveAspectRatio="none" width="100%" height="175">
          <polygon points="1920 0,0 175,1920 175" class="acd_white fill"></polygon>
        </svg>
        <div class="container">
        <?php if($title_video != NULL) :?>
            <h2 class=" acd_blog_title_classes"><?php echo esc_attr($title_video);?></h2>
        <?php endif;?>
         <?php if($option_tabs == 'enable') :?>
            <div class="acd_classes_cat">
                <ul data-tabs="<?php echo esc_attr($tabs);?>" class="acd_classes_cat_list">
                    <li class="active"><a href="#all" class="acd_black text" data-filter="all"><?php echo esc_html__('All','danlet') ?><span>[<?php echo wp_count_posts('video')->publish; ?>]</span></a></li>
                        <?php $terms = get_terms( array(
                                    'taxonomy' => 'genre',
                                    'hide_empty' => true,
                                ));
                        foreach ($terms as $x => $s):

                            $count_post = danlet_post_by_posttype_taxonomy('video',$s->term_id,'count');
                    ?>
                   <li><a href="#<?php echo esc_attr($s->slug) ?>" class="acd_black text" data-filter="classes_<?php echo esc_attr($s->term_id) ?>"><?php echo esc_attr($s->name) ?><span>[<?php echo esc_attr($count_post) ?>]</span></a></li>
                <?php endforeach; ?>
                </ul>
            </div>
         <?php endif;?>
         <div class="row">
        	<ul data-tabs-content="<?php echo esc_attr($content)?>" class="acd_video_list">
        	<?php if($loop->have_posts()):
        		while($loop->have_posts()) : $loop->the_post();
        	   danlet_get_loop( 'items','list_video' );
        		endwhile;
        		endif;
        		 ?>
        	</ul>
        	<div class="acd_pagination">
        		<?php
        		if(function_exists('danlet_pagination')) {
                    echo danlet_pagination($loop);
                }
        		?>
        	</div>
        </div>
    </div>
</div>
<?php if($option_tabs == 'enable'):
do_action('danlet_js_tabs_class_list_hook',$tabs,$content);
 endif;?>