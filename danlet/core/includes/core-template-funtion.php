<?php
/**
 * Core danlet template function
 *
 * List function for hook
 * @author    Jinsimple
 * @category  Core
 * @package   Includes/Function
 * @version   0.0.1
 */

/*
 * Function danlet_detail_artist_view Example action hook
 */
function danlet_detail_artist_view() {
  ?>
<section class="detail-artist">
    <div class="container">
 <?php
}
/*
 * Function danlet_detail_artist_view Example action hook
 */
function danlet_after_detail_artist_view() {
  ?>
    </div>
</section><!--detail-artist-->
 <?php
}
/*
 * Funcion danlet_main_view Example action hook
 */
function danlet_main_view(){

?>
<section class="danlet_main <?php if(is_home() != false) : echo " rm-cont"; endif;?> col-xs-12">
    <div class="container">
<?php
}


/*
 * Funcion danlet_after_main_view Example action hook
 */
function danlet_after_main_view(){
?>
    </div>
</section>
<?php
}


/*
 * Funcion danlet_loop_before Example action hook
 */
function danlet_loop_before(){
?>
  <ul class="acd_blog_list">
<?php
}


/*
 * Funcion danlet_loop_after Example action hook
 */
function danlet_loop_after(){
?>
  </ul>
<?php
}

/*
 * Funcion danlet_before_sidebar Example action hook
 */
function danlet_before_sidebar(){
?>
  <aside class="col-xs-12 col-lg-4 acd_blog_border acd_blog_pad_siderbar <?php echo danlet_single_check_no_thumb('no_pad')?>">
<?php
    get_sidebar();
}


/*
 * Funcion danlet_after_sidebar Example fillter hook
 * $text - string
 */
function danlet_after_sidebar(){
?>
  </aside>
<?php
}


/*
 * Funcion danlet_get_thumbnail_sticker Example fillter hook
 * $text - string
 */
function danlet_get_sticker(){
?>
  <?php if (is_sticky()): ?>
    <span class="sticky-post text-more"><?php esc_html_e('Sticky','danlet')?></span>
  <?php endif ?>

<?php
}


function danlet_get_thumbnail(){
  if (danlet_check_option_theme('enable-cover-image-single-blog') != '0'){
  ?>

    <div class="feature-single-image acd_blog_detail_img">
      <a href="<?php echo esc_url(the_permalink());?>" class="img-post-item">
          <?php echo get_the_post_thumbnail(get_the_ID(),'full'); ?>
      </a>
    </div>
  <?php
  }
}

if ( ! function_exists( 'danlet_get_thumbnail_archive' ) ) {
  function danlet_get_thumbnail_archive(){
    if (danlet_check_option_theme('enable-thumbnail-archive-blog') != '0'){
      if (has_post_thumbnail()) {
      ?>
        <div class="feature-archive-image acd_blog_detail_img">
          <a href="<?php echo esc_url(the_permalink());?>" class="img-post-item">
              <?php echo get_the_post_thumbnail(get_the_ID(),'full'); ?>
          </a>
        </div>
      <?php
      }
    }
  }
}

if ( ! function_exists( 'danlet_before_content' ) ) {

  /**
   * Output the end of content page index.
   *
   */
  function danlet_before_content(){
  ?>
    <div class="acd_blog_content">
  <?php
  }
}


if ( ! function_exists( 'danlet_date_time_content' ) ) {

  /**
   * Output the date time of content page index.
   *
   */
  function danlet_date_time_content(){
  if (danlet_check_option_theme('enable-date-archive-blog') != '0'): ?>
    <div class="acd_blog_date">
      <em class="text-more"><?php echo date_i18n( 'l', strtotime(get_the_date('l')) ); ?> /</em>
      <strong class="text-title"><?php echo date_i18n( 'd.m', strtotime(get_the_date('Y-m-d')) ); ?></strong>
    </div>
  <?php endif;
  }
}

if ( ! function_exists( 'danlet_title_content' ) ) {

  /**
   * Output the title of content page index.
   *
   */
  function danlet_title_content(){
    if (danlet_check_option_theme('enable-title-archive-blog') != '0'): ?>
      <h3 class="acd_blog_name">
        <a href="<?php echo get_the_permalink() ?>"> <?php the_title();?></a>
      </h3>
    <?php endif;
  }
}

if ( ! function_exists( 'danlet_description_content' ) ) {

  /**
   * Output the description of content page index.
   *
   */
  function danlet_description_content(){
    global $post;
  ?>
      <div class="desc-post">
        <?php if (danlet_check_option_theme('enable-excerpt-archive-blog') != '0'): ?>
          <div class="text-desc">
            <?php echo danlet_get_excerpt_by_id($post->ID); ?>
          </div>
        <?php endif; ?>
      </div>
    <?php
  }
}

if ( ! function_exists( 'danlet_get_author_archive' ) ) {
  function danlet_get_author_archive(){
    $number_comment = get_comments_number();
    if (danlet_check_option_theme('enable-thumbnail-archive-blog') != '0'){
    ?>
      <div class="acd_blog_class">
          <?php echo danlet_time_link(); ?>
          <?php esc_html_e('by','danlet'); ?>:
          <?php the_author(); ?>/
        <span>
          <span><?php echo esc_attr($number_comment) ?></span>
          <i class="fa fa-comment-o" aria-hidden="true"></i>
        </span>
      </div>
    <?php
    }
  }
}

if ( ! function_exists( 'danlet_tag_content' ) ) {

  /**
   * Output the description of content page index.
   *
   */
  function danlet_tag_content(){
    $tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'danlet' ) );
    if (danlet_check_option_theme('enable-tags-archive-blog') != '0'){
      if ( $tags_list ) {
        printf( '<span class="tags-links"><span class="screen-reader-text-block">%1$s </span>%2$s</span>',
          _x( 'Tags :', 'Used before tag names.', 'danlet' ),
          $tags_list
        );
      }
    }
  }
}


if ( ! function_exists( 'danlet_category_content' ) ) {

  /**
   * Output the description of content page index.
   *
   */
  function danlet_category_content(){
    $categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'danlet' ) );
    if (danlet_check_option_theme('enable-category-archive-blog') != '0'){
      if ( $categories_list) {
        printf( '<span class="cat-links"><span class="screen-reader-text-block">%1$s </span>%2$s</span>',
          _x( 'Categories :', 'Used before category names.', 'danlet' ),
          $categories_list
        );
      }
    }
  }
}


if ( ! function_exists( 'danlet_category_readmore' ) ) {

  /**
   * Output the description of content page index.
   *
   */
  function danlet_category_readmore(){
  if (danlet_check_option_theme('enable-readmore-archive-blog') != '0'): ?>
    <div class="readmore text-active">
      <a href="<?php echo get_the_permalink() ?>"><?php esc_html_e('Read more...', 'danlet') ?></a>
    </div>
  <?php endif;
  }
}


if ( ! function_exists( 'danlet_after_content' ) ) {

  /**
   * Output the end of content page index.
   *
   */
  function danlet_after_content(){
  ?>
    </div>
  <?php
  }
}

if ( ! function_exists( 'danlet_before_main_content_details' ) ) {

  /**
   * Output the end of content page index.
   *
   */
  function danlet_before_main_content_details(){
  ?>
    <div class="danlet-cover-page">
      <div class="danlet-banner-page single-page">
      </div><!--End .banner-page-->
    </div>
    <div class="danlet-blog-page">
      <div class="container">
          <div class="danlet-blog">
  <?php
  }
}

if ( ! function_exists( 'danlet_before_content_single_div' ) ) {

  /**
   * Output the start of content single.
   *
   */
  function danlet_before_content_single_div(){
  ?>
    <div class="content-blog left-content col-lg-8 col-xs-12 acd_blog_border_detail <?php echo danlet_single_check_no_thumb('no_margin')?>">
      <div class="acd_blog_detail">
  <?php
  }
}

if ( ! function_exists( 'danlet_after_content_single_div' ) ) {

  /**
   * Output the start of content single.
   *
   */
  function danlet_after_content_single_div(){
  ?>
    </div>
    </div>
  <?php
  }
}

if ( ! function_exists( 'danlet_after_main_content_details' ) ) {

  /**
   * Output the end of content single.
   *
   */
  function danlet_after_main_content_details(){
  ?>
        </div>
      </div>
    </div>
  <?php
  }
}

if ( ! function_exists( 'danlet_next_prev_post' ) ) {

  /**
   * Output next prev post of content single.
   *
   */
  function danlet_next_prev_post(){
    if (danlet_check_option_theme('enable-next-single-blog') != '0'){
      danlet_get_template('core/layout/next-prev-post');
    }
  }
}

if ( ! function_exists( 'danlet_author_box_detail' ) ) {

  /**
   * Output the author box of content single.
   *
   */
  function danlet_author_box_detail(){
    if (danlet_check_option_theme('enable-profile-author-single-blog') != '0'){
      danlet_get_template('core/layout/author-box-detail-post');
    }
  }
}

if ( ! function_exists( 'danlet_comment_form' ) ) {

  /**
   * Output the comment of content single.
   *
   */
  function danlet_comment_form(){
    if (danlet_check_option_theme('enable-comment-single-blog') != '0'){
      danlet_get_template('core/layout/comment-form');
    }
  }
}

if ( ! function_exists( 'danlet_title_single_content' ) ) {

  /**
   * Output the title content single.
   *
   */
  function danlet_title_single_content(){
    ?>
      <div class="clearfix"></div>
      <?php if (danlet_check_option_theme('enable-title-single-blog') != '0'): ?>
        <h1 class="text-title text-3x title-post text-white">
            <?php the_title();?>
        </h1>
      <?php endif ?>
    <?php
  }
}

if ( ! function_exists( 'danlet_info_single_content' ) ) {

  /**
   * Output the info of content single.
   *
   */
  function danlet_info_single_content(){
    $number_comment = get_comments_number();
    ?>
      <div class="clearfix"></div>
      <div class="info-single-post">
        <div class="by-auth danlet-date text-active">
            <?php if (danlet_check_option_theme('enable-date-archive-blog') != '0'):
              echo danlet_time_link();
             endif; ?>
          <?php if (danlet_check_option_theme('enable-author-single-blog') != '0'): ?>
            <em class="text-more"><?php esc_html_e('By','danlet')?> /</em>
            <span class="text-title"><?php the_author(); ?></span>
          <?php endif ?>/
          <?php if (danlet_check_option_theme('enable-number-comment-single-blog') != '0'): ?>
            <span>
              <span><?php echo esc_attr($number_comment) ?></span>
              <i class="fa fa-comment-o" aria-hidden="true"></i>
            </span>
          <?php endif ?>
        </div>
      </div><!--End .info-single-post-->
    <?php
  }
}

if ( ! function_exists( 'danlet_before_content_single' ) ) {

  /**
   * Output the start of content single.
   *
   */
  function danlet_before_content_single(){
    ?>
      <div class="content-post danlet-content-single">
    <?php
  }
}

if ( ! function_exists( 'danlet_content_single' ) ) {

  /**
   * Output the content single.
   *
   */
  function danlet_content_single(){
    the_content( esc_html__( 'Continue reading ', 'danlet' ).the_title( '<span class="screen-reader-text">', '</span>', false ));
    wp_link_pages( array(
      'before'      => '<div class="page-links"><span class="page-links-title">' . get_post_type() . '</span>',
      'after'       => '</div>',
      'link_before' => '<span>',
      'link_after'  => '</span>',
      'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'danlet' ) . ' </span>%',
      'separator'   => '<span class="screen-reader-text">, </span>',
    ) );

    edit_post_link( esc_html__( 'Edit ', 'danlet' ). get_post_type(), '<span class="edit-link">', '</span>' );
  }
}

if ( ! function_exists( 'danlet_tag_share_content_single' ) ) {

  /**
   * Output tag and share of content single.
   *
   */
  function danlet_tag_share_content_single(){
    ?>
    <div class="tags-share  acd_blog_detail_tags_social">
        <div class="col-sm-8 col-xs-12 tags-list-detail tags-list">

          <?php if (danlet_check_option_theme('enable-tags-single-blog') != '0'):
          ?>
          <i class="fa fa-tags" aria-hidden="true"></i>
          <?php
            esc_html_e('Categories : ','danlet');
            echo get_the_category_list(', ');
            ?><br>
            <?php if(get_the_tags() != NULL) :?>
            <i class="fa fa-tag" aria-hidden="true"></i>
            <?php
            the_tags();
          endif; endif;?>
        </div>
        <div class="col-sm-4 col-xs-12 share-social">
          <?php if (danlet_check_option_theme('enable-social-single-blog') != '0'): ?>
            <ul class="danlet-social social-round pull-right">
            <?php
                danlet_get_template('core/layout/social-share');
            ?>
            </ul>
          <?php endif ?>
        </div>
    </div>
    <?php
  }
}

if ( ! function_exists( 'danlet_after_content_single' ) ) {

  /**
   * Output the end of content single.
   *
   */
  function danlet_after_content_single(){
    ?>
      </div>
    <?php
  }
}

if ( ! function_exists( 'danlet_social_link' ) ) {

  /**
   * Output the end of content single.
   *
   */
  function danlet_social_link(){
    if (danlet_check_option_theme('show-social-link')) {
      foreach(danlet_check_option_theme('show-social-link') as $key=> $social){
          if(danlet_check_option_theme('beau-'.$social)){
              if (danlet_check_option_theme('beau-'.$social) != '') {
                 echo '<li><a href="'.esc_url(danlet_check_option_theme('beau-'.$social)).'" target="_blank"><i class="fa fa-'.esc_attr($social).'"></i></a></li>';
              }
          }
      }
    }
  }
}

if ( ! function_exists( 'danlet_cover_page' ) ) {

  /**
   * Output the comment of content single.
   *
   */
  function danlet_cover_page(){
    $description_header = danlet_get_field('description_header');
    $title_header = danlet_get_field('title_header');
    $show_cover_title_description = danlet_get_field('show_cover_title_description');
    $cover_image    = '';
    $cover_shop     = danlet_check_option_theme('danlet-cover-shop');
    if(is_singular('teacher') || is_singular('post')){
      $cover_image = danlet_get_field('cover_image')['url'];
      if($cover_image == NULL){
            $cover_image =  get_the_post_thumbnail_url();
        }
    }
    else {
      $cover_image =  get_the_post_thumbnail_url();
    }
    if(is_woocommerce()){
        $cover_image =   $cover_shop['url'];
    }
    ?>
    <div class="danlet-cover-page">
      <?php
      // var_dump(is_archive());
      if ( $show_cover_title_description != false || has_post_thumbnail() || !is_page()): ?>
        <div class="danlet-banner-page">

          <?php if($cover_image != NULL) { ?>
            <div class="danlet-banner-image">
              <img src="<?php echo esc_url($cover_image)?>" alt="<?php echo get_the_title()?>">
            </div>
          <?php } ?>

        <?php

        if (is_page()) {
          if ($show_cover_title_description != false) { ?>
                <div class="title-page-text text-center">
                  <?php if (get_the_title() != ''): ?>
                    <span class="text-title danlet-title text-white text-5x"><?php echo esc_attr($title_header)?></span>
                  <?php endif ?>
                  <div class="clearfix"></div>
                  <?php if ($description_header!= ''): ?>
                    <span class="text-title text-active text-1x">
                      <?php echo esc_attr($description_header)?>
                    </span>
                  <?php endif ?>
                </div><!--End .title-page-->
          <?php }
        }
        ?>
        </div><!--End .banner-page-->
      <?php endif ?>
    </div>
    <?php
  }
}

if ( ! function_exists( 'danlet_cover_page_shop' ) ) {

  /**
   * Output the comment of content single.
   *
   */
  function danlet_cover_page_shop(){
    $page_id = get_option( 'woocommerce_shop_page_id' );
    $description_page = get_post_meta( $page_id, '_beautheme_description', TRUE );
    $show_cover_title_description = get_post_meta( $page_id, '_beautheme_show_cover_title_description', TRUE );

    if ($show_cover_title_description != 0 || $show_cover_title_description == '') { ?>
    <div class="danlet-cover-page">
      <div class="danlet-banner-page">
          <?php
            if( is_shop() ) {

              if( has_post_thumbnail( $page_id ) ) {
              ?>
                <div class="danlet-banner-image">
                  <?php echo get_the_post_thumbnail( $page_id ); ?>
                </div>
              <?php
              }
            }
          ?>
          <div class="title-page-text text-center">
            <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
              <span class="text-title danlet-title text-white text-5x">
                <?php woocommerce_page_title(); ?>
              </span>
            <?php endif; ?>
            <div class="clearfix"></div>
            <?php if ($description_page!= ''): ?>
              <span class="text-title text-active text-1x">
               <?php echo esc_attr($description_page)?>
              </span>
            <?php endif ?>
          </div><!--End .title-page-->
      </div><!--End .banner-page-->
    </div>
    <?php }
  }
}

if ( ! function_exists( 'danlet_breadcrumb' ) ) {

  /**
   * Output the end of content single.
   *
   */
  function danlet_breadcrumb(){
    $show_breadcrumb = danlet_get_field('show_breadcrumb');
    $show_breadcrumb_single = danlet_check_option_theme('enable-breadcrumb-single-blog');
    if (is_single()) {
      if ($show_breadcrumb_single != 0) {
        ?>
        <div class="breadcrumb">
          <div class="container">
              <?php if (function_exists('beau_the_breadcrumb')) beau_the_breadcrumb(); ?>
           </div>
        </div>
        <?php
      }
    }
    if (!is_single()) {
      if ($show_breadcrumb != 0){
      ?>
        <div class="breadcrumb">
          <div class="container">
              <?php if (function_exists('beau_the_breadcrumb')) beau_the_breadcrumb(); ?>
           </div>
        </div>
      <?php
      }
    }
  }
}

if ( ! function_exists( 'danlet_get_product_title_product' ) ) {

  /**
   * Output the end of content single.
   *
   */
  function danlet_get_product_title_product(){
    ?>
      <div class="product-title text-title">
        <a href="<?php echo get_the_permalink() ?>">
          <?php echo get_the_title() ?>
        </a>
      </div>
    <?php
  }
}

if ( ! function_exists( 'danlet_get_tag_woocommerce' ) ) {

  /**
   * Output the end of content single.
   *
   */
      function danlet_get_tag_woocommerce(){
        global $post, $product;
        $tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );
        echo danlet_print_html($product->get_tags( ', ', '<div class="acd_shop_detail_tags">'.$span.' ', '</div>' ));
      }

}

if ( ! function_exists( 'danlet_get_categories_woocommerce' ) ) {

  /**
   * Output the end of content single.
   *
   */

      function danlet_get_categories_woocommerce(){
        global $post, $product;
        $cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
        $span = '<span><i class="fa fa-tags" aria-hidden="true"></i></span>';

        echo danlet_print_html(wc_get_product_category_list( get_the_ID(), ', ', '<div class="acd_shop_detail_tags">'.$span.' ', '</div>' ));
      }

}

if ( ! function_exists( 'danlet_get_description_single_woocommerce' ) ) {

  /**
   * Output the end of content single.
   *
   */
  if (class_exists('danlet')) {
      function danlet_get_description_single_woocommerce(){
        ?>
        <div class="danlet-product-description">
          <div class="title-box text-title text-active text-2x"><?php esc_html_e('Product description', 'danlet') ?></div>
          <div class="product-description-text text-desc">
            <?php woocommerce_template_single_excerpt(); ?>
          </div>
        </div>
        <?php
      }
  }
}

if ( ! function_exists( 'danlet_get_review_single_woocommerce' ) ) {

  /**
   * Output the end of content single.
   *
   */
  if (class_exists('danlet')) {
      function danlet_get_review_single_woocommerce(){
        echo comments_template( 'woocommerce/single-product-reviews' );
      }
  }
}

if ( ! function_exists( 'danlet_get_link_view_product' ) ) {

  /**
   * Output the end of content single.
   *
   */
  if (class_exists('danlet')) {
      function danlet_get_link_view_product(){
        ?>
          <span class="view-product">
            <a href="<?php echo get_the_permalink() ?>">
              <?php esc_html_e('View detail', 'danlet') ?>
            </a>
          </span>
        <?php
      }
  }
}

/**
 *
 */

if ( ! function_exists( 'danlet_get_date_post' ) ) {
  function danlet_get_date_post(){
    if (danlet_check_option_theme('enable-date-single-blog') != '0'): ?>
          <p class="acd_blog_detail_date">
            <?php echo date_i18n( 'M / d', strtotime(get_the_date('Y-m-d')) ); ?>
          </p>
    <?php endif ?>
  <?php
  }
}

if ( ! function_exists( 'danlet_tag_share_content_single_tagxonomy' ) ) {

  /**
   * Output tag and share of content single.
   *
   */
    function danlet_tag_share_content_single_tagxonomy(){
    ?>
     <div class="tags-share  acd_blog_detail_tags_social">
        <div class="col-sm-8 col-xs-12 tags-list-detail tags-list">

          <?php if (danlet_check_option_theme('enable-tags-single-blog') != '0'):
          $tag = get_the_term_list( get_the_ID(), 'tagvideo', 'Tag: ', ' , ' );
          ?>
            <?php if($tag != '') :?>
            <i class="fa fa-tag" aria-hidden="true"></i>
             <?php

            echo danlet_html_wpkses($tag);
          endif; endif;?>
        </div>
        <div class="col-sm-4 col-xs-12 share-social">
          <?php if (danlet_check_option_theme('enable-social-single-blog') != '0'): ?>
            <ul class="danlet-social social-round pull-right">
            <?php
                danlet_get_template('core/layout/social-share');
            ?>
            </ul>
          <?php endif ?>
        </div>
    </div>


    <?php
  }
}
