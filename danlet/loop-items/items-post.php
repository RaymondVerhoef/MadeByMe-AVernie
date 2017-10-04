<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage danlet
 * @since danlet 1.0.0
 */


if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

$style_post = 'danlet-post-item ';
if (! class_exists('beau_ThemePlugin')) {
	$style_post = $style_post.'post-uni';
}
$home_css = '';
if(is_home() == true ){
	$home_css = ' full-w';
}
?>
<li class="<?php echo esc_attr($style_post.$home_css) ?> acd_blog_box acd_blog_box_layout1">
	<div class="col-lg-6 col-md-6 acd_blog_list_img ">
		<?php
			/**
			 * danlet_before_index_loop_item_title hook.
			 *
			 * @hooked danlet_get_sticker - 10
			 * @hooked danlet_get_thumbnail - 20
			 */
			do_action( 'danlet_before_index_loop_item_title' );
		?>
	</div>
	<div class="col-lg-6 col-md-6 acd_blog_list_content " >
		<?php
			/**
			 * danlet_before_index_loop_item_title hook.
			 *
			 * @hooked danlet_before_content - 10
			 */
			do_action( 'danlet_before_index_content' );

			/**
			 * danlet_index_content hook.
			 *
			 * @hooked danlet_date_time_content - 10
			 * @hooked danlet_title_content - 20
			 * @hooked danlet_description_content - 30

			 */
			do_action( 'danlet_index_content' );

			/**
			 * danlet_after_index_loop_item_title hook.
			 *
			 * @hooked danlet_after_content - 5
			 */
			do_action( 'danlet_after_index_content' );
		?>
	</div>
</li>
