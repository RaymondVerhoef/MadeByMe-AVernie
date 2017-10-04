<div id="<?php echo esc_attr($_shortcode_id)?>" class="acd_classes_detail_video acd_video_bg <?php echo esc_attr($css_class);?>">
<?php if($title_element != NULL) :?>
	<h3 class="acd_classes_detail_video_title" data-color="name-title"><?php echo esc_attr($title_element);?></h3>
	<?php endif;?>
	<div class="ms-caro3d-template ms-caro3d-wave acd_classes_detail_video_box">
    <!-- masterslider -->
        <div class="sh_ms_slider master-slider ms-skin-default  gallery " id="master-gallery-<?php echo esc_attr($id_rand)?>">
        	<?php

	        	if($images):
	        		foreach($images as $image) :
	        ?>
	        <div class="acd_video_box ms-slide">
				<div class="acd_video_img no_video">
                    <?php echo danlet_thumbnail_image($image['id'],true);?>
				</div>
				<div class="acd_glr_caption">
					<p><?php echo esc_attr($image['caption'])?></p>
				</div>
			</div>
				<?php endforeach;
						endif;
				 ?>
        </div>
	</div>
</div>
<?php
$danlet_master_prefix = 'gallery';
do_action('danlet_js_master_slider_hook',$id_rand,$danlet_master_prefix);