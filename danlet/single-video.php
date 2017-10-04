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
?>

<section class="acd_blog">
    <div class="container">

<?php

/**
 * danlet_single_video_play  hook,
 * @hooked danlet_single_video_details - 10
 * @hooked danlet_before_desc_video - 15
 * @hooked danlet_description_single_video - 20
 * @hooked danlet_author_box_detail - 30
 * @hooked danlet_tag_share_content_single_tagxonomy -40
 * @hooked danlet_comment_form - 50
 * @hooked danlet_load_more_video - 60
 * @hooked danlet_after_desc_video - 80
 */

do_action('danlet_single_video_play');


?>
    </div>
</section>
<?php

get_footer();
?>
