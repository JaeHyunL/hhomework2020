<?php 

if ( ! function_exists( 'xmas_biz_add_breadcrumb' ) ) :

	/**
	 * Add breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function xmas_biz_add_breadcrumb() {

		// Bail if Breadcrumb disabled.
		$breadcrumb_type = xmas_biz_get_option( 'breadcrumb_type' );
		if ( 'disabled' === $breadcrumb_type ) {
			return;
		}
		// Bail if Home Page.
		if ( is_front_page() || is_home() ) {
			return;
		}
		// Render breadcrumb.
		echo '<div class="twp-bredcrumb mt-20">';
		switch ( $breadcrumb_type ) {
			case 'simple':
				xmas_biz_simple_breadcrumb();
			break;

			case 'advanced':
				if ( function_exists( 'bcn_display' ) ) {
					bcn_display();
				}
			break;

			default:
			break;
		}
		echo '</div><!-- .container -->';
		return;

	}

endif;

add_action( 'xmas_biz_action_breadcrumb', 'xmas_biz_add_breadcrumb' , 10 );
