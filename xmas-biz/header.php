<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Xmas Biz
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} ?>

<div class="preloader">
    <div class="preloader-wrapper">
        <div class="loader">
            <?php esc_html_e('Loading', 'xmas-biz'); ?>
        </div>
    </div>
</div>
<!-- full-screen-layout/boxed-layout -->
<?php if (xmas_biz_get_option('homepage_layout_option') == 'full-width') {
    $xmas_biz_homepage_layout = 'full-screen-layout';
} elseif (xmas_biz_get_option('homepage_layout_option') == 'boxed') {
    $xmas_biz_homepage_layout = 'boxed-layout';
} ?>
<div id="page" class="site holiday-site site-bg <?php echo esc_attr($xmas_biz_homepage_layout); ?>">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'xmas-biz'); ?></a>
    <?php 
        $xmas_biz_top_header_location = esc_html(xmas_biz_get_option('top_header_location'));
        $xmas_biz_top_header_telephone = esc_attr(xmas_biz_get_option('top_header_telephone'));
        $xmas_biz_top_header_email = xmas_biz_get_option('top_header_email');
    ?>
    <?php if (!empty($xmas_biz_top_header_location) || !empty($xmas_biz_top_header_telephone) || !empty($xmas_biz_top_header_email)) { ?>
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="top-bar-info">
                            <ul class="top-bar-list">
                                <?php
                                if (!empty($xmas_biz_top_header_location)) { ?>
                                    <li>
                                        <div class="grid-box icon-box">
                                            <i class="icon twp-icon ion-ios-location-outline"></i>
                                        </div>
                                        <div class="grid-box icon-box-content">
                                            <span
                                                class="icon-box-subtitle"><?php echo esc_html(xmas_biz_get_option('top_header_location')); ?></span>
                                        </div>
                                    </li>
                                <?php } ?>
                                <?php
                                if (!empty($xmas_biz_top_header_telephone)) { ?>
                                    <li>
                                        <div class="grid-box icon-box">
                                            <i class="icon twp-icon ion-ios-telephone-outline"></i>
                                        </div>
                                        <div class="grid-box icon-box-content">
                                            <a href="<?php echo esc_url( 'tel:' . preg_replace('/\D+/', '', esc_attr(xmas_biz_get_option('top_header_telephone')))); ?>">
                                                 <span class="icon-box-subtitle">
                                                    <?php echo esc_attr(xmas_biz_get_option('top_header_telephone')); ?>
                                                 </span>
                                            </a>
                                        </div>
                                    </li>
                                <?php } ?>
                                <?php
                                if (!empty($xmas_biz_top_header_email)) { ?>
                                    <li>
                                        <div class="grid-box icon-box">
                                            <i class="icon twp-icon ion-ios-email-outline"></i>
                                        </div>
                                        <div class="grid-box icon-box-content">
                                            <a href="<?php echo esc_url( 'mailto:' .xmas_biz_get_option('top_header_email')); ?>">
                                                <span class="icon-box-subtitle">
                                                    <?php echo esc_attr(antispambot(xmas_biz_get_option('top_header_email'))); ?>
                                                </span>
                                            </a>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!--    Topbar Ends-->
    <?php } ?>
    
    <header id="masthead" class="site-header" role="banner">
            <div class="auxiliary-bar secondary-bgcolor">
                <div class="container">
                    <div class="row">
                        <div id="top-nav" class="col-sm-12 col-xs-12 auxiliary-nav">
                            <ul class="pull-right">
                                <?php if (xmas_biz_get_option('social_icon_style') == 'circle') {
                                    $xmas_biz_social_icon = 'bordered-radius';
                                } else {
                                    $xmas_biz_social_icon = '';
                                } ?>
                                <li class="social-icons <?php echo esc_attr($xmas_biz_social_icon); ?>">
                                    <?php
                                    wp_nav_menu(
                                        array('theme_location' => 'social',
                                            'link_before' => '<span>',
                                            'link_after' => '</span>',
                                            'menu_id' => 'social-menu',
                                            'container_class' => '',
                                            'container' => '',
                                            'fallback_cb' => false,
                                            'depth'        => 1,
                                            'menu_class'=> false
                                        )); ?>
                                </li>

                                <?php if (class_exists('woocommerce')) { ?>
                                    <li class="top-cart-contain hidden-xs hidden-sm visible">
                                        <div class="mini-cart">
                                            <a href="<?php echo esc_url(WC()->cart->get_cart_url()); ?>">
                                                <i class="meta-icon ion-ios-cart"></i>
                                                <span class="cart-title">
                                                    <?php esc_html_e('Shopping Cart', 'xmas-biz'); ?>
                                                    ( <?php echo WC()->cart->get_cart_contents_count(); ?> )
                                                </span>
                                            </a>
                                            <div class="top-cart-content">
                                                <div class="block-subtitle">
                                                    <?php esc_html_e('Recently added item(s)', 'xmas-biz'); ?>
                                                </div>
                                                <?php the_widget('WC_Widget_Cart', 'title='); ?>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>

                                <li class="links">
                                    <?php if (function_exists('xmas_biz_wishlist')) { ?>
                                        <span class="wishlist">
                                            <?php xmas_biz_wishlist(); ?>
                                        </span>
                                    <?php } ?>
                                </li>


                                <?php if (class_exists('woocommerce')) { ?>

                                    <?php if (is_user_logged_in()) { ?>
                                        <li class="myaccount">
                                            <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                                                <i class="meta-icon ion-person-stalker"></i>
                                                <span><?php esc_html_e('My Account', 'xmas-biz'); ?></span>
                                            </a>
                                        </li>

                                        <li class="login">
                                            <a href="<?php echo esc_url(wp_logout_url(home_url())); ?>">
                                                <i class="meta-icon ion-ios-unlocked"></i>
                                                <span><?php esc_html_e('Log Out', 'xmas-biz'); ?></span>
                                            </a>
                                        </li>

                                         <?php } else { ?>

                                        <li class="login">
                                            <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                                                <i class="meta-icon ion-ios-locked"></i>
                                                <span><?php esc_html_e('Log In', 'xmas-biz'); ?></span>
                                            </a>
                                        </li>

                                        <li class="login">
                                            <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>">
                                                <i class="meta-icon ion-person-stalker"></i>
                                                <span><?php esc_html_e('Register', 'xmas-biz'); ?></span>
                                            </a>
                                        </li>

                                    <?php } ?>
                                    
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <div class="top-header">
            <div class="container">
                <div class="site-branding">
                    <div class="branding-center">
                        <?php
                        if (is_front_page() && is_home()) : ?>
                            <span class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                        rel="home"><?php bloginfo('name'); ?></a></span>
                        <?php else : ?>
                            <span class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                        rel="home"><?php bloginfo('name'); ?></a></span>
                            <?php
                        endif;
                        xmas_biz_the_custom_logo();
                        $description = get_bloginfo('description', 'display');
                        if ($description || is_customize_preview()) : ?>
                            <p class="site-description hidden-xs"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
                            <?php
                        endif; ?>
                    </div>
                </div><!-- .site-branding -->
                <div class="twp-nav ">
                    <ul class="navbar-extras">
                        <li class="alt-bgcolor">
                             <span class="icon-search">
                                <i class="twp-icon twp-icon-2x ion-ios-search"></i>
                            </span>
                        </li>
                    </ul>
                </div>

                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <span class="toggle-menu" aria-controls="primary-menu" aria-expanded="false">
                         <span class="screen-reader-text">
                            <?php esc_html_e('Primary Menu', 'xmas-biz'); ?>
                        </span>
                        <i class="ham"></i>
                    </span>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'container' => 'div',
                        'container_class' => 'menu'
                    )); ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
    </header>
    <!-- #masthead -->
    <div class="popup-search">
        <div class="table-align">
            <div class="table-align-cell">
                <?php get_search_form(); ?>
            </div>
        </div>
        <div class="close-popup"></div>
    </div>
    <!-- Innerpage Header Begins Here -->
    <?php
    if (is_front_page()) {
        /**
         * xmas_biz_action_front_page hook
         * @since Xmas Biz 0.0.2
         *
         * @hooked xmas_biz_action_front_page -  10
         * @sub_hooked xmas_biz_action_front_page -  10
         */
        do_action( 'xmas_biz_action_front_page' );
    } else {
        do_action('xmas-biz-page-inner-title');
    }
    ?>
    <!-- Innerpage Header Ends Here -->
    <div id="content" class="site-content">