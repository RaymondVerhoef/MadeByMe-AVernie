<?php
define('DANLET_BASE_URL', get_template_directory_uri());
define('DANLET_BASE', get_template_directory());
define('DANLET_IMAGES', DANLET_BASE_URL . '/asset/images');
define('DANLET_JS', DANLET_BASE_URL . '/asset/js');
define('DANLET_CSS', DANLET_BASE_URL . '/asset/css');
define('DANLET_PLUGINS_PATH', 'http://plugins.beautheme.com');
define('DANLET_PLUGINS_PATH_REQUIRE', DANLET_BASE.'/includes/');
define('DANLET_PLUGINS_PATH_LIBS', DANLET_BASE.'/libs/');

//For multiple language
$language_folder = DANLET_BASE .'/languages';
load_theme_textdomain( 'danlet', $language_folder );

//Include core
require_once(get_template_directory().'/core/includes/functions.php');
require_once(get_template_directory().'/ajax-controller.php');

//BeauAdmin
require get_parent_theme_file_path( '/beauadmin/beauadmin.php' );




add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 16;' ), 20 );
if ( ! isset( $content_width ) ) $content_width = 900;
///Beautheme support

/*
 * Funcion danlet_check_option_theme item
 * $option - string
 */
function danlet_check_option_theme( $option = ''){
    global $danlet_option;
    if((is_page() == true ) && danlet_check_shop_page() != true) {
        $q = get_queried_object();
        $get_page_option_custom_field = danlet_get_field($option,$q->ID);
    } else {
        $get_page_option_custom_field = danlet_get_field($option);
    }
    $option_check = '';
    if (isset($danlet_option[$option])) {
        $option_check =  $danlet_option[$option];
    }
    $setting = '';
    if ($option_check != NULL) {
        $setting = $option_check;
    }
    if ($get_page_option_custom_field != NULL) {
        $setting = $get_page_option_custom_field;
    }
    return $setting;
}


/*
 * Funcion danlet_GetOption item
 * $option - string
 */


function danlet_GetOption($option){
    global $danlet_option;
    if (isset($danlet_option[$option])) {
        $option =  $danlet_option[$option];
    }else{
        $option = NULL;
    }
    return $option;
}

function danlet_runshortcode($url_run = '',$short_code=''){
    global $wp_embed;
    switch ($short_code) {
        case 'embed':
            return $wp_embed->run_shortcode('[embed]'.$url_run.'[/embed]');
            break;
         case 'audio':
            return $wp_embed->run_shortcode('[embed]'.$url_run.'[/embed]');
            break;

        case 'video':
            return $wp_embed->run_shortcode('[embed]'.$url_run.'[/embed]');
            break;

        default:
            return $wp_embed->run_shortcode('[embed]'.$url_run.'[/embed]');
            break;
    }
}

add_action( 'after_setup_theme', 'danlet_theme_support' );
function danlet_theme_support() {
    add_theme_support( "nav-menus" );
    add_theme_support( "automatic-feed-links" );
    add_theme_support( "post-thumbnails" );
    add_theme_support( "title-tag" );
    add_theme_support( "custom-header", array());
    add_theme_support( "custom-background", array()) ;
    add_theme_support( 'page-attributes', array());
    add_editor_style();
    add_theme_support( "nav-menus" );
    $nav_menus['main-menu'] = esc_html__( 'Main menu', 'danlet');
    register_nav_menus( $nav_menus );
}

if ( function_exists('register_nav_menus') )
{
    register_nav_menus(
        array(
            'main-menu'     => esc_html__('Main menu', 'danlet'),
            'mobile-menu'    => esc_html__('Mobile Menu', 'danlet'),
        )
    );
}

if ( ! function_exists( 'danlet_fonts_url' ) ) :
function danlet_fonts_url() {
    $font_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'danlet' ) ) {
        $fonts[] = 'Raleway:300,400,600,500,700|Caveat:300,400,600,500,700|Playfair Display:400,400italic,700,700italic|Lora:400,700,400italic,700italic|Crimson Text|Montserrat:100,300,400,500,700,900';
    }
     if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => urlencode( implode( '|', $fonts ) ),
            'subset' => urlencode( $subsets ),
        ), '//fonts.googleapis.com/css' );
    }
    return $fonts_url;
}
endif;


function danlet_scripts(){
    // Lib jquery
    if (!is_admin()) {
        $api_key = danlet_GetOption('google_map_api');
        if(danlet_check_shop_page() != true){
        //Counter
        //Master Slide Important Do Not Remove
        wp_enqueue_script( 'counter', get_theme_file_uri( 'asset/js/jquery.countTo.js' ),array('jquery'),filemtime(get_theme_file_path('asset/js/jquery.countTo.js' )),false);

        wp_enqueue_script( 'masterslider', get_theme_file_uri( 'asset/js/masterslider/masterslider.min.js' ),array('jquery'),filemtime(get_theme_file_path('asset/js/masterslider/masterslider.min.js' )),false);
        wp_enqueue_script( 'jwplayer', get_theme_file_uri( 'asset/js/jwplayer/jwplayer.js' ),array(),filemtime(get_theme_file_path('asset/js/jwplayer/jwplayer.js' )),false);
        }

        wp_enqueue_script( 'mobile-menu', get_theme_file_uri( 'asset/js/mobile-menu.js' ),array(),filemtime(get_theme_file_path('asset/js/mobile-menu.js' )),true);
        wp_enqueue_script( 'wow-js', get_theme_file_uri( 'asset/js/wow.min.js' ),array('jquery'),filemtime(get_theme_file_path('asset/js/wow.min.js' )),false);
        wp_enqueue_script( 'idangerous', get_theme_file_uri( 'asset/js/swiper/swiper.jquery.min.js' ),array(),filemtime(get_theme_file_path('asset/js/swiper/swiper.jquery.min.js' )),false);


         //js istotop
        wp_enqueue_script('isotope-pkgd',  DANLET_JS .'/isotope.pkgd.min.js', array('jquery'), '13.0.3', FALSE);
        wp_enqueue_script('masonry');
        wp_enqueue_script( 'lazyload', get_theme_file_uri( 'asset/js/jquery.lazyload.min.js' ),array('jquery'),filemtime(get_theme_file_path('asset/js/jquery.lazyload.min.js' )),false);

        //js danlet
        wp_enqueue_script( 'danlet-js', get_theme_file_uri( 'asset/js/danlet.js' ),array('jquery'),'1.0.0',true);
        wp_localize_script( 'danlet-js', 'ajax_obj',
            array( 'url' => admin_url('admin-ajax.php'))
        );

        // js bootstrap
        wp_enqueue_script( 'boostrap', get_theme_file_uri( 'asset/js/bootstrap.min.js' ),array(),filemtime(get_theme_file_path('asset/js/bootstrap.min.js' )),true);

        if (isset($api_key)) {
            wp_enqueue_script('google-map-js', 'https://maps.googleapis.com/maps/api/js?libraries=places&key='.$api_key, array(), '3.0', false);
        }
        wp_enqueue_script( 'moment', get_theme_file_uri( 'asset/js/moment.js' ),array(),filemtime(get_theme_file_path('asset/js/moment.js' )),false);

        wp_enqueue_script( 'full-calendar', get_theme_file_uri( 'asset/js/fullcalendar.min.js' ),array(),filemtime(get_theme_file_path('asset/js/fullcalendar.min.js' )),false);

        wp_enqueue_script('underscore');


        //js scroll
        if (danlet_check_option_theme('enable-smooth-scroll') == '1') {
            wp_enqueue_script( 'TweenMax', get_theme_file_uri( 'asset/js/TweenMax.min.js' ),array(),filemtime(get_theme_file_path('asset/js/TweenMax.min.js' )),true);
            wp_enqueue_script( 'ScrollToPlugin', get_theme_file_uri( 'asset/js/TScrollToPlugin.min.js' ),array(),filemtime(get_theme_file_path('asset/js/TScrollToPlugin.min.js' )),true);
            wp_enqueue_script( 'smoth-scroll', get_theme_file_uri( 'asset/js/smoth-scroll.js' ),array(),filemtime(get_theme_file_path('asset/js/smoth-scroll.js' )),true);
        }

        //check menu fix
        if (danlet_check_option_theme('enable-fixed') == '1') {
            wp_enqueue_script( 'menufix', get_theme_file_uri( 'asset/js/sticker-menu.js' ),array(),filemtime(get_theme_file_path('asset/js/sticker-menu.js' )),true);

        }
        //Css
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/asset/css/font-awesome.min.css', array(), '4.5.0', 'all' );
        wp_enqueue_style('bootstrap', DANLET_CSS .'/bootstrap.min.css', array(), '3.3.5');
        wp_enqueue_style('swipper', DANLET_CSS .'/swiper.min.css', array(),'3.0.6');
        wp_enqueue_style('animate', DANLET_CSS .'/animate.css', array(),'3.0.6');
        wp_enqueue_style('danlet-fonts', danlet_fonts_url(), array(), null );
        wp_enqueue_style('masterslider', DANLET_CSS .'/masterslider.css', array(), '3.3.5');
        wp_enqueue_style('danlet-main',get_stylesheet_uri(), array(), '1.0.0');
        wp_enqueue_style('danlet-style', DANLET_CSS .'/danlet.css', array(),'1.0.0');
        if(danlet_check_option_theme('page_style') != NULL) {
             wp_enqueue_style(danlet_check_option_theme('page_style'), DANLET_CSS .'/'.danlet_check_option_theme('page_style').'.css', array(),'1.0.0');
        }
        wp_enqueue_style('fullcalendar-css', DANLET_CSS .'/fullcalendar.css', array(), '3.3.5');
    }
}
add_action( 'wp_enqueue_scripts', 'danlet_scripts' );


/*
Register WIDGETS
*/

////Register widget for page
function danlet_register_sidebar() {
    $col            = 'default';
    $sidebarWidgets = "";
    $columns        = 0;
    //Register sidebar for sidebar widget
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar widget','danlet'),
            'id'            => 'sidebar-widget',
            'description'   => esc_html__('Sidebar widget position.','danlet'),
            'before_widget' => '<div id="%1$s" class="sidebar-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<div class="title-sidebar-widget"><span>',
            'after_title'   => '</span></div>'
        )
    );
        if(danlet_check_option_theme('footer_style') == 'default'){
            $col = 'default';
        }

    //Register to show sidebar on footer
    if (danlet_GetOption('footer-widget-number')!= NULL) {
        $col    = intval(danlet_GetOption('footer-widget-number'));
    }
    if($col == 0 ){
        $col  = 3;
    }
    if($col != 0) {
        $columns = intval(12/$col);
    }
    if($columns==1){
        register_sidebar(
            array(  // 1
                'name' => esc_html__( 'Footer Default', 'danlet' ),
                'description' => esc_html__( 'For Footer Default', 'danlet' ),
                'id' => 'sidebar-footer-1',
                'before_title' => '<div class="title-widget text-16x danlet-title  text-title danlet-title-20"><span>',
                'after_title' => '</span></div><div class="content-widget">',
                'before_widget' => '<div class="footer-column col-md-12 col-sm-12 col-xs-12"><div class="footer-widget">',
                'after_widget' => '</div></div></div>',
            )
        );
    }else{
        $class_column = $column = '';
        if($col == 'default') {
            $column = 'default-design';
            $class_column = 'col-default-design';
        }else {
            $column = 12/$col;
            $class_column = 'col-md-'.$column.' col-sm-'.($column*2);
        }
        register_sidebar(
            array(
                'name' => esc_html__('Footer Default','danlet'),
                'id' => 'sidebar-footer-default',
                'description' => esc_html__( 'For Footer Default', 'danlet' ),
                'before_widget' => '<div class="footer-column col-default-design col-xs-12"><div class="footer-widget">',
                'before_title' => '<div class="title-widget text-16x danlet-title text-title danlet-title-20"><span>',
                'after_title' => '</span></div>',
                'after_widget' => '</div></div>',
            )
        );
        register_sidebar(
            array(
                'name' => esc_html__('Footer Custom Columns','danlet'),
                'id' => 'sidebar-footer-custom',
                'description' => esc_html__( 'For Custom Columns', 'danlet' ),
                'before_widget' => '<div class="footer-column '.$class_column.' col-xs-12"><div class="footer-widget">',
                'before_title' => '<div class="title-widget text-16x danlet-title text-title danlet-title-20"><span>',
                'after_title' => '</span></div>',
                'after_widget' => '</div></div>',
            )
        );
    }
}
add_action( 'widgets_init', 'danlet_register_sidebar' );

//Custom placeholder


// check for empty-cart get param to clear the cart
add_action( 'init', 'danlet_woocommerce_clear_cart_url' );
function danlet_woocommerce_clear_cart_url() {
  global $woocommerce;

    if ( isset( $_GET['empty-cart'] ) ) {
        $woocommerce->cart->empty_cart();
    }
}


add_filter( 'woocommerce_output_related_products_args', 'danlet_related_products_args' );
function danlet_related_products_args( $args ) {
    $args['posts_per_page'] = 8; // 4 related products
    $args['columns'] = 0; // arranged in 2 columns
    return $args;
}


add_action( 'after_setup_theme', 'danlet_woocommerce_support' );
function danlet_woocommerce_support() {
    add_theme_support( 'danlet' );
}
//del woocommerce_total_product_price
/**
 * Show menu by theme location
 *
 */
if ( ! function_exists( 'danlet_main_menu' ) ) {
  function danlet_main_menu( $slug ) {
    $menu = array(
      'theme_location' => $slug,
      'menu_class'    => 'acd-main-menu acd-menu-white main-menu',
      'menu_id'       => '',
      'container' => 'nav',
      'container_class' => $slug,
    );
    wp_nav_menu( $menu );
  }
}

/**
*  Rewrite of "get_the_post_thumbnail" for compatibility with jQuery LazyLoad plugin
*
* @param boolean $post_id
* @param string $size
* @return string
*/
function danlet_get_the_post_lazyload_thumbnail( $post_id = false, $size = 'full' ) {
    if ( $post_id ) {
        // Get the id of the attachment
        $attachment_id = get_post_thumbnail_id( $post_id );
        if ( $attachment_id ) {
            $src = wp_get_attachment_image_src( $attachment_id, $size );
            if ($src) {
                $img = get_the_post_thumbnail( $post_id, $size, array(
                    'class' => 'lazy',
                    'data-original' => $src[0],
                    'src' => get_stylesheet_directory_uri() . '/asset/images/loading_icon.gif'
                ) );
                return $img; // returns image tag string or '' (empty string)
            }
        }
    }
    return false; // missing either: post_id, attachment_id, or src
}

/**
*  Short logo
*
* @param string $logoTYpe
* @return string
*/
add_action('danlet_main_logo','danlet_main_logo');
function danlet_main_logo($logoTYpe='main_logo'){
    $store_logo = $themeOptionLogo = '';
    switch ($logoTYpe) {
        case 'main_logo':
            $themeOptionLogo = 'danlet-logo';
            break;
        case 'header_fixed_logo':
            $themeOptionLogo = 'danlet-logo-fixed';
            break;
            case 'main_logo':
            $themeOptionLogo = 'main_logo';
            break;
        case 'mobile_logo':
            $themeOptionLogo = 'danlet-logo-mobile';
            break;

        default:
            $themeOptionLogo = 'danlet-logo';
            break;
    }
    if (danlet_GetOption($themeOptionLogo)!= NULL) {
        $store_logo_img = danlet_GetOption($themeOptionLogo);
        $store_logo = $store_logo_img['url'];
    }
    if (function_exists('danlet_get_field')) {
        $enable_customLogo = danlet_get_field('main_logo', get_the_ID());
        if ($enable_customLogo) {
            $store_logo = danlet_get_field($logoTYpe, get_the_ID());
        }
    }
    if ($store_logo=='') {
        if(danlet_check_option_theme('enable-header-clarity') != 1 ){
           $store_logo = get_template_directory_uri().'/asset/images/logo_black.png';
        } elseif (is_search() != false) {
            $store_logo = get_template_directory_uri().'/asset/images/logo_black.png';
        }
        else {
            $store_logo = get_template_directory_uri().'/asset/images/logo_white.png';
        }
    }
?>
    <a class="<?php echo esc_attr($logoTYpe) ?>" href="<?php echo esc_url(home_url( '/' ));?>"><img class="lazy" src="<?php echo esc_url($store_logo);?>" data-original="<?php echo esc_url($store_logo);?>" alt="<?php echo esc_attr(get_bloginfo('name'));?>"></a>
<?php
}
/**
 * Make class saleable
 */
function danlet_redirect_sell($classname , $product_type, $post_type, $product_id){
   $enable_sale = true ;
   if($post_type == 'class' && $enable_sale) return true;
   return $classname;
}
add_filter('woocommerce_product_class' , 'danlet_redirect_sell' ,10,4);

/**
 * Change thumbnail class in cart
 */
function danlet_change_class_thumbnail($_product_img, $cart_item, $cart_item_key){
    global $post;
    $data_post = get_post($cart_item['product_id']);
    $enable_sale = true;
    // Check if it's class
    if($data_post->post_type == "class" && $enable_sale) {
        if (has_post_thumbnail( $data_post->ID ) ) {
            $id_level = danlet_get_field('class_level',$data_post->ID);
            $feat_image = wp_get_attachment_url( get_post_thumbnail_id($data_post->ID) );

            return '<img src="'.$feat_image. '" > </img>';
        }
    }
    return $_product_img;
}
add_filter('woocommerce_cart_item_thumbnail' , 'danlet_change_class_thumbnail',10,3);

if(!function_exists('danlet_thumbnail_image')) {
    function danlet_thumbnail_image($post_id=true,$attachment=false){
        $post_id = danlet_get_post_id($post_id);
        if($attachment == true ){
            $image = wp_get_attachment_url($post_id);

        }
        else {
            $image = get_the_post_thumbnail_url($post_id);

        }
        $title = get_the_title($post_id);

        $html = sprintf('<img src="%s" alt="%s">',$image,$title);
        return $html;
    }
}


function danlet_get_mastersliders() {
    $list_slide = array();
    $count = '';
    if(function_exists('set_revslider_as_theme')){
        // get a list of all available sliders
        $my_sliders = new RevSlider();

        // grab the "alias" names of the sliders
        $my_slider_array = $my_sliders->getAllSliderAliases();
        $count = count($my_slider_array);
        $list_slide[''] = 'Select...';
        for ($i=0; $i < $count; $i++) {
            $list_slide[($my_slider_array[$i])] = $my_slider_array[$i];
        }
        if (count($my_slider_array) == 0) {
            $list_slide = array(0=>esc_html__('No slider found','danlet'));
        }
    }else{
        $list_slide = array(esc_html__('No slider found','danlet'));
    }
    return $list_slide;
}
if(!function_exists('danlet_set_zindex_svg')){
    function danlet_set_zindex_svg($x){
        $html =  '';
        if($x != NULL){
            $html  = sprintf('style="z-index:%d"',$x);
        }
        return $html;
    }
}
if(!function_exists('danlet_searchfilter')) {
    function danlet_searchfilter($query) {
        if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('post',));
        }
    return $query;
    }
}
/**
 * check shop
 */
if(!function_exists('danlet_check_shop_page')){
    if(class_exists('woocommerce')){
        function danlet_check_shop_page(){
            if((is_shop() != true) && (is_singular('product') != true) && (is_tax('product_cat') != true)){
                return false;
            }
            else {
                return true;
            }
        }
    } else {
       function danlet_check_shop_page() {
        return false;
       }
    }

}
if(!function_exists('danlet_single_check_no_thumb')){
    function danlet_single_check_no_thumb($class=''){
        $reset_no_img  = '';
        if($class != NULL) {
            if(is_singular('post')){
                if(get_the_post_thumbnail() == NULL) {
                    $reset_no_img = ' '.$class;
                }
            }
        }
        return $reset_no_img;
    }
}
if(!function_exists('danlet_get_youtubeID')) {
    /**
     * [danlet_get_youtubeID description]
     * @author VNMilky
     * @param  [type] $url [description]
     * @return [type]      [description]
     */
    function danlet_get_youtubeID($url){
        $res = explode("v",$url);
        if(isset($res[1])) {
            $res1 = explode('&',$res[1]);
            if(isset($res1[1])){
                $res[1] = $res1[0];
            }
            $res1 = explode('#',$res[1]);
            if(isset($res1[1])){
                $res[1] = $res1[0];
            }
        }
        return substr($res[1],1,12);
        return false;
    }
}
if(!function_exists('recording_html_wpkses')) {
    function danlet_html_wpkses($content=''){
        $kses = array(
            //formatting
            'strong' => array(),
            'em'     => array(),
            'b'      => array(),
            'br'      => array(),
            'i'      => array(),
            'ul'     => array(),
            'li'     => array(),
            'p'     => array(),
            //links
            'a'     => array(
                'href' => array()
            ),
            //Img
            'img'   =>  array(
                'src'   =>  array(),
                'class' =>  array(),
                'alt'   =>  array(),
                'width' =>  array(),
                'height'=>  array(),
                ),
            'video' => array(
                'class' =>  array(),
                'id' =>  array(),
                'width' =>  array(),
                'height' =>  array(),
                'preload' =>  array(),
                'controls' =>  array(),
                ),
            'source'    =>  array(
                'type'  =>  array(),
                'src'  =>  array(),
                ),
        );
        if($content != NULL) {
            return wp_kses($content,$kses);
        }
    }
}
if(!function_exists('danlet_print_html')){
    function danlet_print_html($content) {
        if($content != NULL) {
            return $content;
        }
        return false;
    }
}
//Support Woocommerce
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

function danlet_removeDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );
    }
}
add_action('init', 'danlet_removeDemoModeLink');

/**
 * Gets a nicely formatted string for the published date.
 */
function danlet_time_link() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    }

    $time_string = sprintf( $time_string,
        get_the_date( DATE_W3C ),
        get_the_date(),
        get_the_modified_date( DATE_W3C ),
        get_the_modified_date()
    );

    // Wrap the time string in a link, and preface it with 'Posted on'.
    return sprintf(
        /* translators: %s: post date */
        '<span class="date-init text-more">' . $time_string . '</span>'
    );
}
if(function_exists('danlet_check_shop_page')) {
    if(danlet_check_shop_page() != true){
        if (!function_exists('beau_theme_plugin_init')) {
            add_filter( 'body_class', function($danlet_post_unit) { return array_merge($danlet_post_unit,array('post_unit_body'));});
        }
    } else {
        add_filter( 'body_class', function($danlet_post_unit) { return array_merge($danlet_post_unit,array('danlet-shop'));});
        if (!function_exists('beau_theme_plugin_init')) {
            add_filter( 'body_class', function($danlet_post_unit) { return array_merge($danlet_post_unit,array('post_unit_body','danlet-shop'));});
        }
    }
}

if(!function_exists('danlet_shop_displ')) {
    function danlet_shop_displ() {
        if(danlet_check_shop_page() == true){
            add_filter( 'body_class', function($danlet_post_unit) { return array_merge($danlet_post_unit,array('shop-displ'));});
        }
    }
}
add_action('wp_head', 'danlet_shop_displ');

if(!function_exists('danlet_media_breakpoint')) {
    function danlet_media_breakpoint($rowID,$setup){
		$css = $tmp_css = '';
		 foreach ((array)$setup as $key => $value) {
			/* Dean hot fix */
			if(empty($value)) continue;
			/* End */
		 	switch ($key) {
		 		case 'xs':
		 			$tmp_css .=  '#'.$rowID.'.clearfix { height:'.$value.';}';
		 			break;
		 		case 'sm':
			 		$tmp_css .=  '@media (min-width: 576px){#'.$rowID.'.clearfix { height:'.$value.';}}';
		 			break;
		 		case 'md':
			 		$tmp_css .=  '@media (min-width: 768px){#'.$rowID.'.clearfix { height:'.$value.';}}';
		 			break;
		 		case 'lg':
			 		$tmp_css .=  '@media (min-width: 992px){#'.$rowID.'.clearfix { height:'.$value.';}}';
		 			break;
		 		case 'xl':
			 		$tmp_css .=  '@media (min-width: 1200px){#'.$rowID.'.clearfix { height:'.$value.';}}';
		 			break;
		 		case 'xxl':
		 			$tmp_css .=  '@media (min-width: 1640px){#'.$rowID.'.clearfix { height:'.$value.';}}';
		 			break;
		 	}
        }
	 	if ($tmp_css =='') { return false;}
	 	return $tmp_css;
	}
}


/* Enable SVG upload */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
