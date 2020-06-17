<?php
/**
 * Xmas Biz functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Xmas Biz
 */

if ( ! function_exists( 'xmas_biz_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function xmas_biz_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Xmas Biz, use a find and replace
	 * to change 'xmas-biz' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'xmas-biz' );
	

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 */
	add_theme_support( 'custom-logo', array(
	   'header-text' => array( 'site-title', 'site-description' ),
	) );
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'xmas-biz-main-banner', 1370, 550, true );
	add_image_size( 'xmas-biz-700-465', 700, 465, true );
	add_image_size( 'xmas-biz-400-460', 400, 460, true );


	// Set up the WordPress core custom header feature.
	add_theme_support( 'custom-header', apply_filters( 'xmas_biz_custom_header_args', array(
			'width'         => 1400,
			'height'        => 380,
			'flex-height'   => true,
			'header-text'   => false,
			'default-image' => get_template_directory_uri() . '/images/cta-bg.jpg',
	) ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'xmas-biz' ),
		'social'   => esc_html__( 'Social Menu', 'xmas-biz' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'xmas_biz_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add WooCommerce support
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
  	
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Load Init for Hook files.
	 */
	require get_template_directory() . '/inc/hooks/hooks-init.php';

}
endif;
add_action( 'after_setup_theme', 'xmas_biz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function xmas_biz_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'xmas_biz_content_width', 640 );
}
add_action( 'after_setup_theme', 'xmas_biz_content_width', 0 );

/**
* function for google fonts
*/
if ( ! function_exists( 'xmas_biz_fonts_url' ) ) :

	/**
	 * Return fonts URL.
	 *
	 * @since 1.0.0
	 * @return string Fonts URL.
	 */
	function xmas_biz_fonts_url() {

		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Open Sans, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Opensans font: on or off', 'xmas-biz' ) ) {
			$fonts[] = 'Open+Sans:300,400,400i,600,700';
		}

		/* translators: If there are characters in your language that are not supported by Oswald, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'xmas-biz' ) ) {
			$fonts[] = 'Poppins:300,400,500,600,700';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urldecode( implode( '|', $fonts ) ),
				'subset' => urldecode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}
		return $fonts_url;
	}
endif;
/**
 * Enqueue scripts and styles.
 */
function xmas_biz_scripts() {
	wp_enqueue_style('jquery-owlcarousel', get_template_directory_uri() . '/assets/libraries/owlcarousel/css/owl.carousel.css');
	wp_enqueue_style('ionicons', get_template_directory_uri() . '/assets/libraries/ionicons/css/ionicons.min.css');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/libraries/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('vertical', get_template_directory_uri() . '/assets/libraries/vertical/vertical.css');
	wp_enqueue_style('animate', get_template_directory_uri() . '/assets/libraries/animate/animate.css');
	wp_enqueue_style( 'xmas-biz-style', get_stylesheet_uri() );
	/*inline style*/
	wp_add_inline_style( 'xmas-biz-style', xmas_biz_trigger_custom_css_action() );

	$fonts_url = xmas_biz_fonts_url();
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'xmas-biz-google-fonts', $fonts_url, array(), null );
	}
	wp_enqueue_script( 'xmas-biz-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'xmas-biz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script('jquery-owlcarousel', get_template_directory_uri() . '/assets/libraries/owlcarousel/js/owl.carousel.min.js', array('jquery'), '', true);
	wp_enqueue_script('jquery-bootstrap', get_template_directory_uri() . '/assets/libraries/bootstrap/js/bootstrap.min.js', array('jquery'), '', true);
	wp_enqueue_script('jquery-match-height', get_template_directory_uri() . '/assets/libraries/jquery-match-height/js/jquery.matchHeight.min.js', array('jquery'), '', true);
	wp_enqueue_script('jquery-wow', get_template_directory_uri() . '/assets/libraries/wow/js/wow.min.js', array('jquery'), '', true);
	wp_enqueue_script('xmas-biz-script', get_template_directory_uri() . '/assets/twp/js/custom-script.js', array('jquery'), '', 1);
    
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'xmas_biz_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function xmas_biz_admin_scripts( $hook ) {
	if ( 'widgets.php' === $hook ) {
	    wp_enqueue_media();
		wp_enqueue_style( 'xmas-biz-custom-widgets-style', get_template_directory_uri() . '/assets/twp/css/widgets.css', array(), '1.0.0' );
		wp_enqueue_script( 'xmas-biz-custom-widgets', get_template_directory_uri() . '/assets/twp/js/widgets.js', array( 'jquery' ), '1.0.0', true );
	}
	wp_enqueue_style('xmas-biz-admin-css', get_template_directory_uri() . '/assets/twp/css/ta-admin.css');
}
add_action( 'admin_enqueue_scripts', 'xmas_biz_admin_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';