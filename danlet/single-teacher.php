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
     *  Teacher
     *  danlet_teacher_detail - 10
     *
     *
     */
    do_action( 'danlet_teacher_detail' );
    $teacher_id = get_the_ID();
    $max_teacher = danlet_get_field('number_related_teacher' , $teacher_id);
    $max_teacher = $max_teacher == NULL ? 2 : $max_teacher;
    $enable_subscribe = danlet_get_field('enable_subscriber_field' , $teacher_id);
    $related_teachers = danlet_get_related_teacher($teacher_id , $max_teacher);
    
    //The Content
    while ( have_posts() ) : the_post();
    the_content();
      wp_link_pages( array(
          'before'      => '<div class="page-links"><span class="page-links-title">' . get_post_type() . '</span>',
          'after'       => '</div>',
          'link_before' => '<span>',
          'link_after'  => '</span>',
      ) );
    endwhile;
?>
<!--  RELATED TEACHER -->
<?php if(!empty($related_teachers)) :  ?>
    <div class="acd_blog">
        <div class="container" >
            <?php if($related_teachers->have_posts()): ?>
                <h4 class="acd_teacher_title_classes_detail"><?php esc_html_e('Other Teacher' , 'danlet') ?></h3>
            <?php endif;?>
            <div class="row">
                <ul data-tabs-content="<?php echo esc_attr($content)?>" class="acd_teacher_list">
                <?php $i=1; while($related_teachers->have_posts()): $related_teachers->the_post();
                    $description = danlet_get_field('detail_description')?:danlet_get_field('detail_description');
                    $excerpt = get_the_excerpt()?get_the_excerpt():$description;
                    $sh_level_row = danlet_postid_by_metavalue(get_the_ID(),'level_teacher');
                    $term_list = wp_get_post_terms(get_the_ID(), 'course_teacher', array("fields" => "ids"));
                    $term_list_tabs = '';
                        foreach ($term_list as $key => $value) {
                            $term_list_tabs[] = 'classes_'.$value;
                        }
                        if($term_list_tabs != NULL ) {
                            $term_list_tabs =  implode(' ',$term_list_tabs);
                        }
                    ?>
                    <li class="col-lg-6 col-md-6 col-sm-6 col-xs-12 <?php echo ((($i+4)%4==3) || (($i+4)%4==0))?'acd_teacher_right':''; ?> <?php echo esc_attr($term_list_tabs)?>">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 acd_teacher_img_box">
                                <div class="acd_teacher_img">
                                    <a href="<?php echo get_permalink();?>" target="_blank" title="<?php echo get_the_title();?>"><?php echo danlet_thumbnail_image(get_the_ID())?></a>
                                    <ul class="acd_teacher_social">
                                    <?php
                                        $yt = danlet_get_field('social_youtube')?:danlet_get_field('social_youtube');
                                        $gl = danlet_get_field('social_google')?:danlet_get_field('social_google');
                                        $tw = danlet_get_field('social_twitter')?:danlet_get_field('social_twitter');
                                        $fb = danlet_get_field('social_facebook')?:danlet_get_field('social_facebook');
                                        if($yt != NULL) : ?>
                                        <li ><a data-color="social" href="<?php echo esc_url($yt);?>" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                        <?php endif; if($gl != NULL) : ?>
                                        <li ><a data-color="social" href="<?php echo esc_url($gl);?>" title="Google +"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                        <?php endif; if($tw != NULL) : ?>
                                        <li ><a data-color="social" href="<?php echo esc_url($tw);?>" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <?php endif; if($fb != NULL) : ?>
                                        <li ><a data-color="social" href="<?php echo esc_url($fb);?>" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <?php endif;?>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 acd_teacher_content_box">
                                <div class="acd_teacher_content">
                                    <h3 class="acd_teacher_name">
                                        <a data-color="sh_teacher" href="<?php echo get_permalink();?>" title="<?php echo get_the_title();?>" target="_blank"><?php echo get_the_title();?></a>
                                    </h3>
                                    <div data-color="sh_level_row" class="acd_teacher_class">
                                        <?php if($sh_level_row != NULL) :?>
                                        <span>Teach: </span>
                                        <?php
                                    $teach ='';
                                    foreach ($sh_level_row as $key => $value) :
                                        $teach[] = '<a  data-color="sh_level_row" href="'.get_permalink($value['post_id']).'">'.get_the_title($value['post_id']).'</a>';
                                    endforeach;
                                    echo implode(' ,',$teach);
                                    endif;	?>
                                    </div>
                                    <div class="acd_teacher_desc">
                                        <?php print(danlet_text_strln(strip_tags($excerpt),100));?>
                                    </div>
                                    <div class="acd_teacher_table">
                                        <a data-color="sh_button" href="<?php echo get_permalink();?>#timetable" target="_blank" title="<?php esc_html_e('Timetable','danlet');?>"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php $i++;endwhile;?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
if($enable_subscribe) : ?>
<!-- Section Search -->
   <div class="sh_search svg_relative">


       <div class="container">
           <div class="row">
               <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                   <h3 class="sh_search_title sh_search_title_el">
                      <?php esc_html_e('Join the Vip list' , 'danlet') ?>
                   </h3>
                   <div class="sh_search_box sh_search_box_bg_bl">
                       <form method="get" id="beau-subcribe">
                           <input type="text" name="email" class="bt-text" id="email"
                           placeholder="<?php esc_html_e('Enter your email...', 'danlet') ?>">
                           <button type="submit" name="book-btn-subcribe" class="bt-submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                       </form>
                   </div>
                   <div class="subcribe-message-title">
                       <span class="subcribe-title"></span>
                       <span class="subcribe-message"></span>
                   </div><!--Subcribe message-->
               </div>
           </div>
       </div>
   </div>
   <!-- End section Search -->
<?php endif;
get_footer();
