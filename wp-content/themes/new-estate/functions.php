<?php
/**
 * Functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package New-Estate
 */




/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 * Priority 0 to make it available to lower priority callbacks.
 *
 */
function new_estate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'new_estate_content_width', 850 );
}
add_action( 'after_setup_theme', 'new_estate_content_width', 0 );


if ( ! function_exists( 'new_estate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function new_estate_setup() {
	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	*/
	add_theme_support( 'title-tag' );

	/**
	* Add default support for add feed on head
	*/
	add_theme_support( 'automatic-feed-links' );

	/**
	* Add default support for thumbnails 
	*/
	add_theme_support('post-thumbnails');

	/**
	* Add image size
	*/
	add_image_size('new-estate-index', 848, 450, true);
	add_image_size('new-estate-grid', 350, 300, true);

	/**
	* Enable navigational menu 
	* new_estate theme use one navigation menu
	* @link https://codex.wordpress.org/Function_Reference/register_nav_menus
	*/
	register_nav_menus(array('pagenav' => __('Top Menu', 'new-estate')));

	/*
	 * Enable support for custom logo.
	 */
	add_theme_support( 'custom-logo', array('height'=> 70,'width'=> 250,'flex-height' => true,'header-text' => array( 'site-title', 'site-description' ),
));

	
	/*
	 * Enable support for custom background.
	 */
	add_theme_support( 'custom-background', array('default-color' => '#f4f4f4','default-repeat' => 'no-repeat','default-attachment' => 'fixed',) );

	add_post_type_support( 'page', 'excerpt' );

}
endif;
add_action( 'after_setup_theme', 'new_estate_setup' );



/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists ( 'new_estate_enqueues' ) ) {
	function new_estate_enqueues() {			
		// styles
		wp_enqueue_style( 'bootstrap', get_template_directory_uri(). '/css/bootstrap.min.css', array());				
		wp_enqueue_style( 'font-awesome', get_template_directory_uri(). '/css/font-awesome.min.css', array());
		wp_enqueue_style( 'slicknav', get_template_directory_uri(). '/css/slicknav.css', array());
		wp_enqueue_style( 'new-estate-lato', '//fonts.googleapis.com/css?family=Lato', array());
		wp_enqueue_style( 'new-estate-style', get_stylesheet_uri());

		wp_enqueue_script( 'jquery-slicknav', get_template_directory_uri(). '/js/jquery.slicknav.min.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.5', true );
		wp_enqueue_script( 'new-estate-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	}
}
add_action( 'wp_enqueue_scripts', 'new_estate_enqueues' );


/**
* Adjust excerpt length
* Default WordPress excerpt length doesn't look good with theme
* Hense adjusting upon our need
*/
function new_estate_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return 40;
}
add_filter( 'excerpt_length', 'new_estate_excerpt_length', 999 );



/**
* Adjust excerpt 
* Remove read more link
*/
function new_estate_excerpt_more( $more ) {
	if ( is_admin() ) {
		return $more;
	}
	return '';														
}
add_filter('excerpt_more', 'new_estate_excerpt_more');

/**
 * Register sidebar
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function new_estate_sidebar() {
register_sidebar (array (
	'name' => __( 'Homepage widgets', 'new-estate' ),
	'id' => 'home-sidebar',
	'description' => __( 'This widgets will display on static front page. Map is preferred.', 'new-estate' ),
	'before_widget' => '<div id="%1$s" class="home-widget clearfix %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="wi-title clearfix"><h3 class="w-title">',
	'after_title' => '</h3></div>',
));
register_sidebar (array (
	'name' => __( 'Sidebar widgets', 'new-estate' ),
	'id' => 'general-sidebar',
	'description' => __( 'Place your sidebar widgets here.', 'new-estate' ),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="wi-title clearfix"><h3 class="w-title">',
	'after_title' => '</h3></div>',
));
register_sidebar (array (
	'name' => __( 'Footer Widget One', 'new-estate' ),
	'id' => 'footone-sidebar',
	'description' => __( 'Place your first footer widgets here.', 'new-estate' ),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="wi-title clearfix"><h3 class="w-title">',
	'after_title' => '</h3></div>',
));
register_sidebar (array (
	'name' => __( 'Footer Widget two', 'new-estate' ),
	'id' => 'foottwo-sidebar',
	'description' => __( 'Place your second footer widgets here.', 'new-estate' ),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="wi-title clearfix"><h3 class="w-title">',
	'after_title' => '</h3></div>',
));
register_sidebar (array (
	'name' => __( 'Footer Widget three', 'new-estate' ),
	'id' => 'footthree-sidebar',
	'description' => __( 'Place your third footer widgets here.', 'new-estate' ),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<div class="wi-title clearfix"><h3 class="w-title">',
	'after_title' => '</h3></div>',
));
}
add_action( 'widgets_init', 'new_estate_sidebar' );


/**
 * Comment settings
 */
function new_estate_comment($comment, $args, $depth) {	
	
	if (get_comment_type() == 'pingback' || get_comment_type() == 'trackback') : ?>
	
	<?php elseif (get_comment_type() == 'comment') :?>
		<li id="comment-<?php comment_ID();?>">
			<div <?php comment_class('comment-post'); ?>>
				<div class="comment-author">
					<?php echo get_avatar($comment, 70);?>
				</div>
				<div class="comment-content">
					<div class="comment-meta">
						<?php echo get_comment_author_link();?>						
						<p><?php comment_date();?></p>
					</div>
					<div class="comment-text">
						<?php comment_text(); ?>
					</div>
					<span class="bg-color" >
					<?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
					</span>
					<hr/>
				</div>				
			</div>				
		</li>
	<?php endif;
}


function new_estate_upgrade_notice(){
    echo '<div class="notice notice-success is-dismissible">
       <p style="line-height: 40px;"><b>Add Properties, logo, Property slider, custom Widgets, and get 24/7 dedicated support, for just $35 (code: 10PERCENTOFF for 10% Off Today) <a target="_blank" style="background: rgb(255, 0, 0);color: white;padding: 6px;border-radius: 3px;text-decoration: none;font-weight: bold;" href="http://www.ammuthemes.com/downloads/new-estate-pro/">Upgrade to PRO today</a>.</b></p>
    </div>';
}
add_action('admin_notices', 'new_estate_upgrade_notice');

/**
* Customizer additions.
*/

require_once( get_template_directory() . '/inc/customizer/customizer.php' );
require_once( get_template_directory() . '/inc/template-hooks.php' );
require_once( get_template_directory() . '/inc/tgmpa-function.php' );
require_once( trailingslashit( get_template_directory() ) . '/inc/upgrade/class-customize.php' );
require_once( trailingslashit( get_template_directory() ) . '/inc/upgrade-page.php' );

?>