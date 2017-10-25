<?php
/*
* Template Name: Template blank
*/
get_header();

/*
 * Hook before main container page
 * danlet_cover_page - 10
 * danlet_breadcrumb - 20
 */

do_action( 'danlet_cover_info' );
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