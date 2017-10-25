<?php
/*
* Template Name: Template Blog
*/

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
     * danlet_main_view - 20
     */
    do_action( 'danlet_before_main_content' );


    /*
     *  Hook using variable for function do title page
     *  danlet_get_title ($string)
     */
    ?>
    <section class="acd_blog">
        <div class="container">
            <h2 class="acd_blog_title wow fadeIn" data-wow-duration="2s"><?php the_title(); ?></h2>
            <div class="row">
                <?php
                if ( have_posts() ) {
                    /*
                     * Before loop
                     *  danlet_loop_before - 20
                     */
                    do_action( 'danlet_before_content' );
                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                        $per_page = get_option( 'posts_per_page' );
                        $args = array(
                          'post_type'     => 'post',
                          'paged' => $paged,
                          'posts_per_page'  => $per_page,
                        );
                        $loop = new WP_Query( $args );
                        wp_reset_postdata();
                        while ($loop->have_posts()) {
                            $loop ->the_post();
                            danlet_get_loop( 'items','post' );

                        } // end of the loop.

                    /*
                     * After loop
                     * danlet_loop_after - 20
                     */
                    do_action( 'danlet_after_content' );
                    ?>
                    <div class="clearfix"></div>
                    <div class="loadmore-button text-center">
                    <?php
                        if(function_exists('danlet_pagination')) {
                            echo danlet_pagination($loop);
                        }
                    ?>
                    </div>
                    <?php
                }else{
                    danlet_get_template( 'content','none' );
                }
                ?>
            </div>
        </div>
    </section>
    <?php
    /*
     *  Hook after main container page
     *  danlet_after_main_view - 20
     */
    do_action( 'danlet_after_main_content' );


get_footer();
