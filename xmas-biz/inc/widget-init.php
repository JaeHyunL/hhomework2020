<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function xmas_biz_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'xmas-biz' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'xmas-biz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home Page Main Widget', 'xmas-biz' ),
		'id'            => 'home-page-mian',
		'description'   => esc_html__( 'Add widgets here.', 'xmas-biz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	$xmas_biz_footer_widgets_number = xmas_biz_get_option('number_of_footer_widget');

	if( $xmas_biz_footer_widgets_number > 0 ){
	    register_sidebar(array(
	        'name' => __('Footer Column One', 'xmas-biz'),
	        'id' => 'footer-col-one',
	        'description' => __('Displays items on footer section.','xmas-biz'),
	        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	        'after_widget' => '</aside>',
	        'before_title'  => '<h1 class="widget-title white-textcolor">',
	        'after_title'   => '</h1>',
	    ));
	    if( $xmas_biz_footer_widgets_number > 1 ){
	        register_sidebar(array(
	            'name' => __('Footer Column Two', 'xmas-biz'),
	            'id' => 'footer-col-two',
	            'description' => __('Displays items on footer section.','xmas-biz'),
	            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	            'after_widget' => '</aside>',
	            'before_title'  => '<h1 class="widget-title white-textcolor">',
	            'after_title'   => '</h1>',
	        ));
	    }
	    if( $xmas_biz_footer_widgets_number > 2 ){
	        register_sidebar(array(
	            'name' => __('Footer Column Three', 'xmas-biz'),
	            'id' => 'footer-col-three',
	            'description' => __('Displays items on footer section.','xmas-biz'),
	            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	            'after_widget' => '</aside>',
	            'before_title'  => '<h1 class="widget-title white-textcolor">',
	            'after_title'   => '</h1>',
	        ));
	    }
	}
}
add_action( 'widgets_init', 'xmas_biz_widgets_init' );
