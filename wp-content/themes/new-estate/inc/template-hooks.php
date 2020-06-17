<?php
/**
* Template hooks
* @package New-Estate
*/

//Top Bar
if ( ! function_exists( 'new_estate_topbar_settings' ) ) {
	function new_estate_topbar_settings() {
		$new_estate_topbar_enable = get_theme_mod('new_estate_topbar_enable');
		if( $new_estate_topbar_enable ){
		?>
		<div class="top-bar">
			<div class="container">
				<div class="row">
				<div class="top-left">
					
				</div>
				<div class="top-right">
					<?php if(get_theme_mod('new_estate_topbar_email')) : ?>
					<div class="top-right-mail">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<p><?php echo esc_html(get_theme_mod('new_estate_topbar_email', __('Your mail id','new-estate'))); ?></p>
					</div>
					<?php endif; ?>
					<?php if(get_theme_mod('new_estate_topbar_phone')) : ?>
					<div class="top-right-phone">
						<i class="fa fa-phone-square"></i>
						<p><?php echo esc_html(get_theme_mod('new_estate_topbar_phone', __('Your phone #','new-estate'))); ?></p>
					</div>
					<?php endif; ?>
					<?php if(get_theme_mod('new_estate_topbarsocial_enable')) : ?>
					<div class="top-right-share">
						<?php if(get_theme_mod('new_estate_topbar_facebook')) : ?>
							<a href="<?php echo esc_url(get_theme_mod('new_estate_topbar_facebook')); ?>" target="_blank"><i class="fa fa-facebook-official"></i></a>
						<?php endif; ?>
						<?php if(get_theme_mod('new_estate_topbar_twitter')) : ?>
							<a href="<?php echo esc_url(get_theme_mod('new_estate_topbar_twitter')); ?>" target="_blank"><i class="fa fa-twitter-square"></i></a>
						<?php endif; ?>
						<?php if(get_theme_mod('new_estate_topbar_google')) : ?>
							<a href="<?php echo esc_url(get_theme_mod('new_estate_topbar_google')); ?>" target="_blank"><i class="fa fa-google-plus-square"></i></a>
						<?php endif; ?>
						<?php if(get_theme_mod('new_estate_topbar_linkedin')) : ?>
							<a href="<?php echo esc_url(get_theme_mod('new_estate_topbar_linkedin')); ?>" target="_blank"><i class="fa fa-linkedin-square"></i></a>
						<?php endif; ?>
					</div>
					<?php endif; ?>
				</div>
				</div>
			</div>
		</div>
		<?php
	}}
}


if ( ! function_exists( 'new_estate_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 * Does nothing if the custom logo is not available.
 */
function new_estate_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/* -- Logo */
if ( ! function_exists( 'new_estate_logo_settings' ) ) {
	function new_estate_logo_settings() {
		?>
		<div class="logo-area container-fluid">
			<div class="cat-bar container">
				<div class="site-header row">
					<div class="site-logo col-md-3 col-sm-12">
					<?php new_estate_custom_logo(); 
					if ( is_front_page() && is_home() ) : ?>		
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; ?></p>
					<?php endif; ?>
					</div>			
		<?php
	}
}

/* -- Navigation menu */
if ( ! function_exists( 'new_estate_menu_settings' ) ) {
	function new_estate_menu_settings() {
		?>
		<div class="logo-nav col-md-9 col-sm-9">
			<?php wp_nav_menu( array('theme_location' => 'pagenav','menu_id' => 'menu','menu_class' => 'navi','items_wrap' => '<ul id="menu" class="%2$s">%3$s</ul>') ); ?>
		</div>
		</div>
		</div>
		</div>
		<?php
	}
}


/* -- post meta for single post and single page */
if ( ! function_exists( 'new_estate_post_meta' ) ) {
	function new_estate_post_meta() {
		?>
	<div class="single-post-content clearfix">
	<div class="index-meta">
		<div class="index-date-meta clearfix">
			<div class="index-month"><?php the_time( get_option( 'date_format' ) ); ?></div>
		</div>
		<div class="index-date-comment clearfix"><?php comments_popup_link( __( 'post a comment', 'new-estate' ), __( '1 Comment', 'new-estate' ), __( '% Comments', 'new-estate' ),'', __( 'Comments Off', 'new-estate' ));?></div>
	</div>
	<div class="index-title-content">
		<h1><?php the_title(); ?></h1>
		<p><?php esc_html_e('Post by', 'new-estate') ;?> : <?php the_author_posts_link(); ?></p>
		<p><?php esc_html_e('Category', 'new-estate') ;?>: <?php the_category( ', ' ); ?></p>					
	</div>
	</div>
	<hr/>
	<?php 
	}
}

/* -- previous / next post navigation for single post and single page */
if ( ! function_exists( 'new_estate_post_navigation' ) ) {
	function new_estate_post_navigation() {
		?>
	<div class="single-postnav clearfix">
		<hr>
			<div class="row clearfix">	
				<div class="next-post col-md-6 col-sm-6 col-xs-6"><?php next_post_link( '<i class="fa fa-chevron-circle-left"></i> %link'); ?></div>
				<div class="previous-post col-md-6 col-sm-6 col-xs-6"><?php previous_post_link( '%link <i class="fa fa-chevron-circle-right"></i>'); ?></div>
			</div>
		<hr>
	</div>
	<?php 
	}
}

/* -- post meta for index and archive lists */
if ( ! function_exists( 'new_estate_index_post_meta' ) ) {
	function new_estate_index_post_meta() {
		?>
	<div class="index-single-post-content clearfix">
		<div class="index-meta">
			<div class="index-date-meta clearfix">
				<div class="index-month"><?php the_time( get_option( 'date_format' ) ); ?></div>
			</div>
			<div class="index-date-comment clearfix"><?php comments_popup_link( __( 'post a comment', 'new-estate' ), __( '1 Comment', 'new-estate' ), __( '% Comments', 'new-estate' ),'', __( 'Comments Off', 'new-estate' ));?></div>
		</div>
		<div class="index-title-content">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_excerpt(); ?>
		</div>
	</div>
	<hr>
	<?php 
	}
}

/* -- pagination for index & archives */
if ( ! function_exists( 'new_estate_index_pagination' ) ) {
	function new_estate_index_pagination() {
		?>
		<div class="index-pagination">
			<?php echo paginate_links( array('prev_next'=> false,) ); ?>
		</div>
		<?php 
	}
}

add_action( 'new_estate_topbar', 'new_estate_topbar_settings', 0 ); // top *bar L6 to L53*
add_action( 'new_estate_header', 'new_estate_logo_settings', 10 ); // Logo *L66 to L104*
add_action( 'new_estate_header', 'new_estate_menu_settings', 20 ); // Navigational menu *L66 to L104*
add_action( 'new_estate_postmeta', 'new_estate_post_meta', 0 ); // Post meta *L107 to L128*
add_action( 'new_estate_postnavigation', 'new_estate_post_navigation', 0 ); // Post navigation *L130 to L142*
add_action( 'new_estate_index_postmeta', 'new_estate_index_post_meta', 0 ); // Post meta *L146 to L166*
add_action( 'new_estate_index_pagination', 'new_estate_index_pagination', 0 ); // Post meta *L168 to L177*


?>