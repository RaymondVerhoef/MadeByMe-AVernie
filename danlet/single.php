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
    do_action( 'danlet_before_main_content_details' );


    /*
     *  Hook using variable for function do title page
     *  danlet_get_title ($string)
     */
    // apply_filters( 'danlet_title_page', 'Day la vi du ve fillter');

    if ( have_posts() ) {
        /*
         * Before loop
         *  danlet_before_content_single_div - 10
         */
        do_action( 'danlet_before_content_single' );

            while ( have_posts() ) : the_post();

                danlet_get_loop( 'items','details' );

            endwhile; // end of the loop.

        /*
         * After loop
         * danlet_after_content_single_div - 10
         */
        do_action( 'danlet_after_content_single' );
    }else{

        danlet_get_template( 'content','none' );

    }
    /*
     *  Get sidebar hook
     *  danlet_before_sidebar - 10
     *  danlet_after_sidebar - 90
     *
     */
    do_action( 'danlet_sidebar' );

    /*
     *  Hook after main container page
     *  danlet_after_main_view - 20
     */
    do_action( 'danlet_after_main_content_details' );


get_footer();
