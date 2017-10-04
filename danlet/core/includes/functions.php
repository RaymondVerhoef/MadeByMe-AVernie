<?php
/*
 * Function danlet core
 * Don't change anything here
 * Contact - Beautheme
 * Email: support@beautheme.com
 */

/**
 * [core_get_post_id
 * @param  integer $post_id
 * @return   integer $post_id
 */
function danlet_get_post_id( $post_id = 0 ) {
    if( !$post_id ) {
        $post_id = (int) get_the_ID();
        if( !$post_id ) {
            $post_id = get_queried_object();
        }
    }
    if( is_object($post_id) ) {
        // post
        if( isset($post_id->post_type, $post_id->ID) ) {
            $post_id = $post_id->ID;
        // user
        } elseif( isset($post_id->roles, $post_id->ID) ) {
            $post_id = 'user_' . $post_id->ID;
        // term
        } elseif( isset($post_id->taxonomy, $post_id->term_id) ) {
            $post_id = $post_id->taxonomy . '_' . $post_id->term_id;
        // comment
        } elseif( isset($post_id->comment_ID) ) {
            $post_id = 'comment_' . $post_id->comment_ID;
        // default
        } else {
            $post_id = 0;
        }
    }
    // return
    return $post_id;
}
/**
 * danlet_get_field
 * @param string $selector
 * @param int $post_id
 * @param bolean $format_value
 * @return array
 */
if(!function_exists('danlet_get_field')) {
    function danlet_get_field($selector, $post_id = false, $format_value = true ) {
        $post_id = danlet_get_post_id( $post_id );
        if($selector != NULL) {
            if(function_exists('get_field')){
                return get_field($selector, $post_id, $format_value);
            }
            return false;
        }
        return false;
    }
}
if(!function_exists('danlet_get_sub_field')) {
    function danlet_get_sub_field($selector, $format_value = true, $load_value = true) {
        if($selector != NULL) {
            if(function_exists('get_sub_field_object')){
                return get_sub_field_object($selector, $format_value, $load_value);
            }
            return false;
        }
        return false;
    }
}
/*
 * Funcion danlet_get_template
 * $template - string
 * $part - string
 * $reQuireOne - boolean
 */
function danlet_get_template( $template, $part='', $requireOne = true ){
    if ($part != '') $template =  $template.'-'.$part;
    if (file_exists(get_theme_file_path().'/'.$template.'.php')) {
        include(get_theme_file_path().'/'.$template.'.php');
    }
    else {
        include(get_parent_theme_file_path().'/'.$template.'.php');
    }
    return false;
}

/*
 * Funcion danlet_get_loop item
 * $template - string
 * $part - string
 */

function danlet_get_loop( $danlet_item = '', $part = '' ){
    if ($danlet_item) {
        danlet_get_template( 'loop-items/'.$danlet_item, $part, false );
    }
}



/*
 * Funcion danlet_the_excerpt
 * $charlength - int
 */
function danlet_the_excerpt( $charlength ) {
    $excerpt = get_the_excerpt();
    $charlength++;

    if ( mb_strlen( $excerpt ) > $charlength ) {
        $subex = mb_substr( $excerpt, 0, $charlength - 5 );
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
            echo mb_substr( $subex, 0, $excut );
        }
        if ( !$excut < 0 ) {
            echo danlet_print_html($subex);
        }
        echo '[...]';
    }
    if ( !mb_strlen( $excerpt ) > $charlength ) {
        echo danlet_print_html($excerpt);
    }
}
/**
 * [danlet_text_strln description]
 * @param  string   $text       [description]
 * @param  int      $charlength
 * @return string   $text
 */
function danlet_text_strln($text='', $charlength ) {
  if (strlen($text) > $charlength)
    return substr($text, 0, strrpos(substr($text, 0, $charlength), " ")).'...';
  else return $text;

}

/**
 * Get list contact form 7
 *
 * @return array
 */
function danlet_get_contact_form(){
    $list_contact['None'] = 'None';
    $args = array(
      'post_type'     => 'wpcf7_contact_form',
    );
    $loop = new WP_Query( $args);
    wp_reset_postdata();
    if ( $loop->have_posts() ) {
        while ( $loop->have_posts() ) {
            $loop ->the_post();
            $list_contact[ get_the_title() ] = get_the_ID();
        }
    }
    return $list_contact;
}

/**
 * Get post thumbnail url
 *
 * @param integer $post_id
 * @param type $size
 * @return string
 */
function danlet_get_post_thumbnail_url( $post_id, $size = 'full' ) {
    return wp_get_attachment_url( get_post_thumbnail_id($post_id, $size) );
}


/**
 * Remove default image thumbnail sizes in wordpress
 *
 * @param string $sizes
 * @return string
 */
function danlet_remove_default_image_sizes( $sizes ) {
    unset( $sizes['thumbnail'] );
    unset( $sizes['medium'] );
    unset( $sizes['large'] );
    return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'danlet_remove_default_image_sizes' );


/**
 * Get list category product
 *
 * @return array
 */


function danlet_get_list_category_product(){
    $category_product = '';
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
          $terms = get_terms('product_cat', array('hide_empty' => 0,'orderby' => 'date','order' => 'DESC'));

          foreach ($terms as $term) {
              $category_product[] = array(
                'value' => $term->term_id,
                'label' => $term->name,
              );
          }
      return $category_product;
    }
}

/**
 * Get list category by taxonomy
 *
 * @return array
 */

function danlet_get_category_by_taxonomy( $taxonomy ){
    $terms = get_terms($taxonomy);
    $category_blog['Select...'] = '';
    $category_blog['All'] = 'All';
    if (is_array($terms)) {
        foreach ($terms as $term) {
            $category_blog[$term->name] = $term->slug;
        }
    }
    return $category_blog;
}

/**
 * Get list sidebar
 *
 * @return array
 */

function danlet_get_sidebar(){
    $terms_list = wp_get_sidebars_widgets();
    $terms = $terms_list;
    $sidebar = array();
    foreach ($terms as $key => $value) {
        if ($key !='wp_inactive_widgets') {
            $sidebar[$key] = $key;
        }
    }
    return $sidebar;
}


/**
 * Numbered Pagination
 *
 * @param string $loop
 * @return string
 */
if ( !function_exists( 'danlet_pagination' ) ) {
    function danlet_pagination( $loop='' ) {
        global $wp_query;
        if ($loop=="") {
            $loop = $wp_query;
        }
        $big = 999999999; // need an unlikely integer
        $pages = paginate_links( array(
            'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'    => '?paged=%#%',
            'current'   => max( 1, get_query_var('paged') ),
            'total'     => $loop->max_num_pages,
            'prev_next' => false,
            'type'      => 'array',
            'prev_next' => TRUE,
            'prev_text' => esc_html__('PREV','danlet'),
            'next_text' => esc_html__('NEXT','danlet'),
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<div class="acd_pagination"><ul class="acd_pagination_list">';
            foreach ( $pages as $page ) {
                echo "<li class='pagination_active'>$page</li>";
            }
           echo '</ul></div>';
        }
    }
}

/**
 * Show id post in postype admin
 */
add_filter( 'manage_posts_columns', 'danlet_add_id_column', 5 );
add_action( 'manage_posts_custom_column', 'danlet_id_column_content', 5, 2 );


function danlet_add_id_column( $columns ) {
   $columns['danlet_id'] = 'ID';
   return $columns;
}

function danlet_id_column_content( $column, $id ) {
  if( 'danlet_id' == $column ) {
    echo esc_attr($id);
  }
}


/**
 * Get all category in post
 *
 * @param string $id
 * @param array $classExtra
 * @return array
 */


function danlet_getAllcategory_inPost( $id = '', $classExtra = ''){
    if ($id == '') { $id = get_the_ID();}
    $category = get_the_terms($id,'category_gallery');

    if (!is_wp_error($category)) {
        for($k=0; $k < count($category); $k++) {
            if ($category[$k] != NULL) {
                $classExtra .= ' '.$category[$k]->slug;
            }
        }
    }
    return $classExtra;
}

/**
 * Get excerpt by id
 *
 * @param int $post_id
 * @return array
 */


function danlet_get_excerpt_by_id ( $post_id ){
    $the_post = get_post($post_id); //Gets post ID
    $the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
    $excerpt_length = 30; //Sets excerpt length by word count
    $the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
    $words = explode(' ', $the_excerpt, $excerpt_length + 1);
    if(count($words) > $excerpt_length) :
        array_pop($words);
        array_push($words, '...');
        $the_excerpt = implode(' ', $words);
    endif;

    $the_excerpt = '<p>' . $the_excerpt . '</p>';

    return $the_excerpt;
}


/*
 * Funcion danlet_the_breadcrumb
 */
function danlet_the_breadcrumb() {

    echo '<ul id="crumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo esc_url(home_url('/'));
        echo '">';
        echo 'Home';
        echo "</a></li>";
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li> ');
            if (is_single()) {
                echo "</li><li>";
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            echo '<li>';
            echo the_title();
            echo '</li>';
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}

/**
 * Show column feature images on admin postype
 *
 * @param int $post_ID
 * @return array
 */

function danlet_get_featured_image( $post_ID ) {
    $post_thumbnail_id = get_post_thumbnail_id( $post_ID );
    if ( $post_thumbnail_id ) {
        $post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'featured_preview' );
        return $post_thumbnail_img[0];
    }
}


/**
 * Return Attactment ID
 *
 * @param String $attachment_url
 * @return array
 */
 function danlet_get_attachment_id_from_url( $attachment_url = '' ) {
    global $wpdb;
    $attachment_id = false;
    if ( '' == $attachment_url )
        return;
    $upload_dir_paths = wp_upload_dir();
    if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
        $attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
        $attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
        $attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
    }
    return $attachment_id;
}

/**
 * [danlet_postid_by_metavalue]
 * @param  string $id
 * @param  string $meta_key
 * @return array
 */
function danlet_postid_by_metavalue($id,$meta_key) {
    global $wpdb;
    if($id != NULL || $meta_key != NULL) {
        $results = '';
        $sql = "SELECT post_id FROM $wpdb->postmeta  as m
        LEFT JOIN $wpdb->posts as p ON m.post_id = p.id
        WHERE p.post_status = 'publish' AND meta_key = '".$meta_key."' AND meta_value LIKE '%{$id}%'";
        $results = $wpdb->get_results($sql , ARRAY_A);
        return $results;
    }
    else return false;
}

/**
 * [danlet_get_related_teacher]
 * @param  string $teacher_id
 * @param  string $max_teacher
 * @return array
 */
function danlet_get_related_teacher($teacher_id = NULL, $max_teacher = 0){
    if(!$teacher_id || !$max_teacher) return array();

    $teacher_classes = danlet_postid_by_metavalue($teacher_id , 'level_teacher');

    if(!$teacher_classes) return array();

    $rev_arr = array();
    foreach($teacher_classes as $teacher_class) {
        $rev_arr[] = $teacher_class['post_id'];
    }
    $rev_arr = implode($rev_arr , ',');

    global $wpdb;
    $query = "SELECT postmeta.meta_value FROM $wpdb->postmeta as `postmeta` "
        . " WHERE postmeta.post_id IN ({$rev_arr}) "
        . " AND postmeta.meta_key = 'level_teacher'"
    ;
    $results = $wpdb->get_results($query , ARRAY_A);
    if(!$results) return array();
    $teacher_arr = array();
    foreach($results as $result) {
        $teacher_arr = array_merge($teacher_arr , unserialize($result['meta_value']));
    }
    $teacher_arr = array_unique($teacher_arr);
    //remove the current teacher

    if(($key = array_search($teacher_id , $teacher_arr)) != false) {
        unset($teacher_arr[$key]);
    }

    $teachers = new WP_Query(array(
        'post_type' => 'teacher',
        'posts_per_page'    => $max_teacher,
        'post__in'  => $teacher_arr,
    ));

    return $teachers;
}
/**
 * Get Single Post by Post Type
 * @param  string $post_type
 * @return  array
 */
function danlet_get_single_post( $post_type = '' ) {
      $posts = get_posts( array(
        'posts_per_page'  => -1,
        'post_type'     => $post_type,
      ));
      $result = array();
      foreach ( $posts as $post ) {
        $result[] = array(
          'value' => $post->ID,
          'label' => $post->post_title,
        );
    }

    return $result;
}
/**
 * get list taxonomy in post type
 * @return array()
 */
function danlet_get_list_taxonomy_by_name($taxonomy){
    if($taxonomy != NULL ) {
        $terms = get_terms($taxonomy, array('hide_empty' => 0,'orderby' => 'date','order' => 'DESC'));
        $taxonomy_list = array();
        if(empty($terms)) {
            return false;
        } else {
            foreach ($terms as $term) {
                if(is_object($term)) {
                    $taxonomy_list[] = array(
                        'value' => $term->term_id,
                        'label' => $term->name,
                    );
                }
            }
        }

    return $taxonomy_list;
    }
    else return false;

}
/**
 *  Get list Taxonomy by postid
 * @param  [string] $taxonomy
 * @param  [int] $id
 * @return [string]
 */
function danlet_get_taxonomy_list_by_post_id($taxonomy,$id) {
    $out = "";
        $terms = get_the_terms( $id, $taxonomy );
        if ( !empty( $terms ) ) {
            foreach ( $terms as $term )
                $out .= '<a href="' .get_term_link($term->slug, $taxonomy) .'">'.$term->name.'</a> , ';
        }
    return substr($out,0,-2);
}
function danlet_get_timetable($post_id='',$type='all',$option=''){
    global $wpdb;
    $return = array();
    if($post_id != NULL) {
        if($type == 'teacher') {
            $sql = "SELECT ID FROM $wpdb->postmeta as m
        LEFT JOIN $wpdb->posts as p ON m.post_id = p.id
        WHERE p.post_status = 'publish' AND meta_key = 'class_teacher' AND meta_value = %d ";
            $query = $wpdb->prepare($sql,$post_id);
            $results = $wpdb->get_results($query,ARRAY_A);
            foreach ($results as $key => $value) {
                $post = $value['ID'];
                $meta_sql = "SELECT * FROM $wpdb->postmeta WHERE post_id = '".$post."' AND meta_key LIKE 'class_schedule_week_0_%_0_class_schedule_time_%'";
                $meta_results = $wpdb->get_results($meta_sql,ARRAY_A);
                if($option == 'id') {
                    $return[] = $post;
                }
                else {
                    $return[] = $meta_results;
                }
            }
        }
        return $results;
    }
    return false;
}
/**
 * [danlet_post_by_posttype_taxonomy description]
 * @param  string $posttype
 * @param  string $taxonomy_id
 * @param  string $options
 * @return int
 * @return array
 */
function danlet_post_by_posttype_taxonomy($posttype='posts',$taxonomy_id,$options=''){
    global $wpdb;
    $taxonomy_id = intval($taxonomy_id);
    if($taxonomy_id != NULL) {
        $sql = "SELECT * FROM $wpdb->term_relationships INNER JOIN $wpdb->posts ON $wpdb->posts.ID = $wpdb->term_relationships.object_id WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type =%s AND $wpdb->term_relationships.term_taxonomy_id =%d ";
        $results = $wpdb->get_results($wpdb->prepare($sql,$posttype,$taxonomy_id), ARRAY_A);
        if($options == 'count'){
            $results = count($results);
        }
        else {
            return $results;
        }
        return $results;
    }
    else {
        return false;
    }

}

//Include theme options
danlet_get_template('inc/theme-option');

//Get template function
danlet_get_template('core/includes/core-template-funtion');

//Get template hook
danlet_get_template('core/includes/core-template-hook');

// //Create dashbroard
danlet_get_template('inc/custom-function/danlet_custom_function');
danlet_get_template('inc/custom-function/danlet_custom_hook');
if(class_exists('woocommerce')) {
    danlet_get_template('inc/custom-function/danlet_wc_function');
    danlet_get_template('inc/custom-function/danlet_wc_hook');
}
if(class_exists('WPBakeryShortCode')) {
    if(file_exists(get_template_directory().'/inc/vc_custom/vc_danlet.php')){
        danlet_get_template('inc/vc_custom/vc_danlet');
    }
}
