<ul class="sh_blog_list">

	<?php
		$i=0;
		if($loop->have_posts()) {
		while($loop-> have_posts()) : $loop->the_post();
	?>
		<?php if($i==0){ ?>
			<li class="sh_blog_big sh_blog_bottom">
				<div class="sh_blog_big_pro sh_blog_img">
					<a class="wow fadeIn" data-wow-duration="1s" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php if(has_post_thumbnail()){ ?>
							 <?php echo get_the_post_thumbnail(get_the_ID());?>
						<?php }else{
							echo '<img src="http://placehold.it/370x370" alt="'.esc_html__('No Image','danlet').'">';
						} ?>
					</a>
					<p data-color="sh_date" data-wow-delay="0.2s" data-wow-duration="0.5s" class="wow fadeIn sh_blog_date sh_blog_date_abs sh_blog_date_el">
						<?php echo date_i18n( 'M', strtotime(get_the_date('Y-m-d')) ); ?> /
                        <?php echo date_i18n( 'd', strtotime(get_the_date('Y-m-d')) ); ?>
					</p>
				</div>
				<div class="sh_blog_big_pro sh_blog_content wow fadeIn" data-wow-delay="0.5s" data-wow-duration="1s">
					<h4 data-color="sh_name" class="sh_blog_name">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php echo wp_trim_words(get_the_title(), '8', '...' ); ?>
						</a>
					</h4>
					<ul data-color="sh_category" class="sh_blog_info">
						<li >
							<?php esc_html_e('by : ','danlet'); ?>
							<?php the_category( ', ' ); ?>
						</li>
						<li><?php
                                if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
                                        echo ' /  '.get_comments_number();
                                endif;
							?>
							<i class="fa fa-comment-o" aria-hidden="true"></i>
						</li>
					</ul>
				</div>
			</li>
		<?php }else{ ?>
			<li class="sh_blog_normal sh_blog_small sh_blog_bottom">
				<div class="sh_blog_content">
					<?php
						$delay_date = 0.2 * $i;
						$delay_title = $delay_date + 0.5;
					?>
					<p data-color="sh_date" data-wow-delay="<?php echo esc_attr($delay_date) . 's' ?>" class="wow fadeInUp sh_blog_date sh_blog_date_el">
						<?php echo date_i18n( 'M', strtotime(get_the_date('Y-m-d'))).' / '; ?>
                        <?php echo date_i18n( 'd', strtotime(get_the_date('Y-m-d')) ); ?>
					</p>
					<h4 data-color="sh_name" data-wow-delay="<?php echo esc_attr($delay_title) . 's' ?>" class="wow fadeInUp sh_blog_name sh_blog_name_mor">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
							<?php the_title(); ?>
						</a>
					</h4>
				</div>
			</li>
		<?php } ?>
	<?php $i++; endwhile;  } ?>
</ul>
<?php if($acd_vm == 'yes'){ ?>
    <div data-color="sh_viewmore" class="sh_blog_view_more sh_blog_view_more_vm" >
        <?php if($sh_link_url != NULL) :?>
        <a class="sh_blog_view_more_cvm acd_btn_awe" href="<?php echo esc_url($sh_link_url)?>" title="<?php echo esc_attr($sh_link_title)?>" <?php echo esc_attr($sh_link_target)?>><?php echo esc_attr($sh_link_title)?>
		<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
        <?php endif;?>
	</div>
<?php } ?>
