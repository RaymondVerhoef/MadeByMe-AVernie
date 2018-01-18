<?php
/*
Plugin Name: Beau Recent Posts
Plugin URI: http://beautheme.com
Description: Recent Posts widget
Author: VNMilky
Version: 1.0
Author URI: http://google.com

*/
class danlet_recent_posts_widget extends WP_Widget {

	/**
	 * Sets up a new Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_recent_entries',
			'description' => esc_html__( 'Your site&#8217;s most recent Posts.' ,'danlet'),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'danlet_recent_posts_widget', esc_html__( 'Beau Recent Posts' ,'danlet'), $widget_ops );
		$this->alt_option_name = 'widget_recent_entries';
	}

	/**
	 * Outputs the content for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $args, $instance ) {
        extract( $args );
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'Recent Posts' ,'danlet');

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		/**
		 * Filters the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );
		if ($r->have_posts()) :
			beau_setpost_view(get_the_ID());
			echo $before_widget;
		?>
			<div class="widget-sidebar acd_sidebar_widget">
				<h3 class="acd_sidebar_title">
					<?php echo $title; ?>
				</h3>
				<div class="row">
					<ul class="sidebar_recent_post">
						<?php while ( $r->have_posts() ) : $r->the_post(); ?>
							<li>
								<div class="sidebar_recent_post_box">
									<div class="sidebar_recent_post_img">
										<a href="<?php the_permalink(); ?>">
											<?php echo get_the_post_thumbnail(); ?>
										</a>
									</div>
									<div class="sidebar_recent_post_date">
										<?php echo date_i18n(' M / d',strtotime(get_the_date('Y-m-d')) );?>
									</div>
									<div class="sidebar_recent_post_name">
										<a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a>
									</div>
									<ul class="sidebar_recent_post_view">
										<li>
											<span><?php echo beau_getpost_view(get_the_ID()); ?></span>
											<i class="fa fa-eye" aria-hidden="true"></i>
										</li> /
										<li>
											<span>23</span>
											<i class="fa fa-comment-o" aria-hidden="true"></i>
										</li>
									</ul>
								</div>
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			</div>
		<?php
		echo $after_widget;
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;
	}

	/**
	 * Handles updating the settings for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		return $instance;
	}

	/**
	 * Outputs the settings form for the Recent Posts widget.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html__( 'Title:' ,'danlet'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html__( 'Number of posts to show:','danlet' ); ?></label>
		<input class="tiny-text" id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php esc_html__( 'Display post date?' ,'danlet'); ?></label></p>
<?php
	}
}
/*
 * Create widget item
 */
add_action( 'widgets_init', 'danlet_reg_recent_posts_widget' );
function danlet_reg_recent_posts_widget() {
    register_widget('danlet_recent_posts_widget');
}
