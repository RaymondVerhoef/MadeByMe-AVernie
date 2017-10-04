<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <?php if (danlet_check_option_theme('enable-responsive') != '0') {?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php } ?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>
<?php
//Search form popup
danlet_get_template('searchform-popup');

//Login and register form popup
danlet_get_template('templates/header/header-popup');

if (!is_404()) {

    danlet_get_template('templates/header/header-content');
    danlet_get_template('templates/header/header-slide');

} ?>
<div id="danlet-mobile-menu" class="container">
    <button id="trigger-overlay">
        <i></i>
    </button>
        <!-- open/close -->
    <div class="overlay overlay-scale">
        <?php wp_nav_menu( array( // show menu mobile
            'theme_location' => 'mobile-menu',
            'container' => 'nav',
            'container_class' => 'mobile-menu'
         ) ); ?>
    </div>
</div>

