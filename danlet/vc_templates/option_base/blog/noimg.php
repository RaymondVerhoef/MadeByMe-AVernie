<ul class="sh_blog_list sh_blog_list_not_img">
	<?php  while ($loop->have_posts())  : $loop->the_post() ;?>
			<li class="sh_blog_normal sh_blog_normal_scale col-sm-4 col-xs-12">
				<div class="sh_blog_content">
					<p data-color="sh_date" class="sh_blog_date sh_blog_date_el">
						<?php echo date_i18n( 'M', strtotime(get_the_date('Y-m-d')) ); ?> /
                        <?php echo date_i18n( 'd', strtotime(get_the_date('Y-m-d')) ); ?>
					</p>
					<h4 data-color="sh_name" class="sh_blog_name sh_blog_name_mor" >
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
							<?php the_title(); ?>
						</a>
					</h4>
				</div>
			</li>
	<?php endwhile;?>
</ul>
<div data-color="sh_viewmore" class="sh_blog_view_more sh_blog_view_more_center">
	<?php if($sh_link_url != NULL) :?>
        <a class="sh_blog_view_more_cvm acd_btn_awe" href="<?php echo esc_url($sh_link_url)?>" title="<?php echo esc_attr($sh_link_title)?>" <?php echo esc_attr($sh_link_target)?>><?php echo esc_attr($sh_link_title)?>
        <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        <?php endif;?>
</div>
