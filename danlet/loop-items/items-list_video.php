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
$term_list = wp_get_post_terms(get_the_ID(), 'genre', array("fields" => "ids"));
$term_list_tabs = '';
foreach ($term_list as $key => $value) {
    $term_list_tabs[] = 'classes_'.$value;
}
if($term_list_tabs != NULL ) {
    $term_list_tabs =  implode(' ',$term_list_tabs);
}
if (function_exists('get_field'))
{
    $heart = get_field( "video_heart", get_the_ID()) ? get_field( "video_heart", get_the_ID()) : 0 ;
}
else
{
    $heart = 0;
}
?>
<li class="col-lg-3 col-md-3 col-sm-6 col-xs-12 <?php echo esc_attr($term_list_tabs)?>">
    <div class="acd_video_box">
        <div class="acd_video_img">
             <a href="<?php the_permalink();?>" title="<?php echo get_the_title();?>"><?php echo get_the_post_thumbnail();?></a>
        </div>
        <div class="acd_video_content">
            <h4 class="acd_video_name">
                <a href="<?php the_permalink();?>" title="<?php echo get_the_title();?>"><?php echo get_the_title();?></a>
            </h4>
            <ul class="acd_video_view">
                <li>
                    <span><?php echo beau_getpost_view(get_the_ID()); ?></span>
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    <span class="space-bar">/</span>
                </li>
                <li>
                    <span><?php echo esc_html($heart);?></span>
                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                </li>
            </ul>
        </div>
    </div>
</li>
