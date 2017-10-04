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
     * danlet_main_view - 20
     */
    do_action( 'danlet_before_main_content' );


    /*
     *  Hook using variable for function do title page
     *  danlet_get_title ($string)
     */
    ?>

    <div class="acd_blog rm-cont col-md-8 col-xs-12">
        <h2 class="acd_blog_title"><?php echo get_the_archive_title(); ?></h2>
        <div class="row">
            <?php
            if ( have_posts() ) {
                /*
                 * Before loop
                 *  danlet_loop_before - 20
                 */
                do_action( 'danlet_before_content' );
                    while (have_posts()) {
                        the_post();
                        danlet_get_loop( 'items','index' );

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
                        echo danlet_pagination();
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
    <?php
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
    do_action( 'danlet_after_main_content' );


get_footer();
