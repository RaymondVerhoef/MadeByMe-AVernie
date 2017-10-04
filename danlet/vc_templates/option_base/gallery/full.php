<div class="acd_blog <?php echo esc_attr($css_class); ?>" id="<?php echo esc_attr($_shortcode_id); ?>">
	<div class="container">
	<?php if($title_element) : ?>
		<h2 class="acd_blog_title_classes" data-color="name-title"><?php echo esc_attr($title_element); ?></h2>
	<?php endif;
	if($desc_element):
	?>

	<div class="acd_classes_desc" data-color="name-desc"><?php echo esc_attr($desc_element); ?></div>
	<?php endif; ?>
		<div class="row">
			<ul class="acd_gallery_box">
			<?php
			$id = 1;
			$view_img = array_slice($images,0, $view);
			$count = count($view_img);
			foreach ($view_img as $image): ?>
				<li class="col-lg-3 col-md-4 col-sm-6 col-sm-6 acd_gallery_list">
					<div class="acd_gallery_img">
					 	<a href="<?php echo get_page_link()?>#" data-toggle="modal" data-target="#gallery-modal_<?php echo esc_attr($id);?>">
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['title']); ?>">
						</a>
						 <div id="gallery-modal_<?php echo esc_attr($id);?>" class="modal fade" role="dialog" >
			              <div class="modal-dialog">
			                <!-- Modal content-->
			                <div class="modal-content">
			                  <div class="modal-body">
			                    	<div class="close close-modal" data-dismiss="modal"></div>
									<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['title']); ?>">
									<!-- social -->
				                    <ul class="acd_gallery_social">
										<li ><a href="<?php echo esc_url('https://plus.google.com/share?url=');?><?php echo esc_url($image['url']); ?>" title="google +"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
										<li ><a href="<?php echo esc_url('https://twitter.com/home?status=');?><?php echo esc_url($image['url']); ?>" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										<li ><a href="<?php echo esc_url('https://www.facebook.com/sharer/sharer.php?u=');?><?php echo esc_url($image['url']); ?>" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									</ul>
								<!-- end social -->
			                  </div>
			                   <div class="acd_btn_prev btn-next-back" data-current="gallery-modal_<?php echo intval($id)?>" data-next="gallery-modal_<?php echo intval($id - 1)?>"></div>
			                    <div class="acd_btn_next btn-next-back" data-current="gallery-modal_<?php echo intval($id)?>" data-next="gallery-modal_<?php echo intval($id + 1)?>"></div>
			                </div>

			              </div>
			            </div>
					</div>
				</li>
			<?php
			$id++;
			endforeach; ?>
			</ul>
			<div class="acd_loadmore" data-color="bg_link">
				<button class="loding btn-loadmore" data-color="text_link" data-value="<?php echo esc_attr($view); ?>" title="<?php esc_html_e('load more','danlet');?>"><?php esc_html_e('load more','danlet');?> <i class="fa fa-spinner fa-pulse"></i></button>
			</div>
		</div>
	</div>
</div>
<?php
do_action('danlet_js_gallery_full_hook',$post_id,$pages);
