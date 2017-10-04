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
 * @since danlet 0.0.1
 */
get_header();

     /*
     * Hook before main container page
     * danlet_cover_page - 10
     * danlet_main_content_details - 20
     * danlet_breadcrumb - 30

     */


    /*
     *  Hook using variable for function do title page
     *  danlet_get_title ($string)
     */

    do_action( 'danlet_single_course');
    /*
     *  Get sidebar hook
     *  danlet_before_sidebar - 10
     *  danlet_after_sidebar - 90
     *
     */
    //do_action( 'danlet_sidebar' );

    /*
     *  Hook after main container page
     *  danlet_after_main_view - 20
     */
while ( have_posts() ) : the_post();
    the_content();
      wp_link_pages( array(
          'before'      => '<div class="page-links"><span class="page-links-title">' . get_post_type() . '</span>',
          'after'       => '</div>',
          'link_before' => '<span>',
          'link_after'  => '</span>',
      ) );

      edit_post_link( esc_html__( 'Edit ', 'danlet' ). get_post_type(), '<span class="edit-link">', '</span>' );
    endwhile;

get_footer();
