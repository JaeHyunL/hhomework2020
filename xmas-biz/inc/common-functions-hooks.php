<?php
if ( ! function_exists( 'xmas_biz_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Xmas Biz 1.0.0
 */
function xmas_biz_the_custom_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}
endif;


if ( ! function_exists( 'xmas_biz_body_class' ) ) :

	/**
	 * body class.
	 *
	 * @since 1.0.0
	 */
	function xmas_biz_body_class($xmas_biz_body_class) {
		global $post;
		$global_layout = xmas_biz_get_option( 'global_layout' );
		$input = '';
		$home_content_status =	xmas_biz_get_option( 'home_page_content_status' );
		if( 1 != $home_content_status ){
			$input = 'home-content-not-enabled';
		}
		// Check if single.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'xmas-biz-meta-select-layout', true );
			if ( empty( $post_options ) ) {
				$global_layout = esc_attr( xmas_biz_get_option('global_layout') );
			} else{
				$global_layout = esc_attr($post_options);
			}
		}
		if ($global_layout == 'left-sidebar') {
			$xmas_biz_body_class[]= 'left-sidebar ' . esc_attr( $input );
		}
		elseif ($global_layout == 'no-sidebar') {
			$xmas_biz_body_class[]= 'no-sidebar ' . esc_attr( $input );
		}
		else{
			$xmas_biz_body_class[]= 'right-sidebar ' . esc_attr( $input );

		}
		return $xmas_biz_body_class;
	}
endif;

add_action( 'body_class', 'xmas_biz_body_class' );
/**
* Returns word count of the sentences.
*
* @since Xmas Biz 1.0.0
*/
if ( ! function_exists( 'xmas_biz_words_count' ) ) :
	function xmas_biz_words_count( $length = 25, $xmas_biz_content = null ) {
		$length = absint( $length );
		$source_content = preg_replace( '`\[[^\]]*\]`', '', $xmas_biz_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '' );
		return $trimmed_content;
	}
endif;


if ( ! function_exists( 'xmas_biz_simple_breadcrumb' ) ) :

	/**
	 * Simple breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function xmas_biz_simple_breadcrumb() {

		if ( ! function_exists( 'breadcrumb_trail' ) ) {

			require_once get_template_directory() . '/assets/libraries/breadcrumbs/breadcrumbs.php';
		}

		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
		);
		breadcrumb_trail( $breadcrumb_args );

	}

endif;


if ( ! function_exists( 'xmas_biz_custom_posts_navigation' ) ) :
	/**
	 * Posts navigation.
	 *
	 * @since 1.0.0
	 */
	function xmas_biz_custom_posts_navigation() {

		$pagination_type = xmas_biz_get_option( 'pagination_type' );

		switch ( $pagination_type ) {

			case 'default':
				the_posts_navigation();
			break;

			case 'numeric':
				the_posts_pagination();
			break;

			default:
			break;
		}

	}
endif;

add_action( 'xmas_biz_action_posts_navigation', 'xmas_biz_custom_posts_navigation' );


if( ! function_exists( 'xmas_biz_excerpt_length' ) && ! is_admin() ) :

    /**
     * Excerpt length
     *
     * @since  Xmas Biz 1.0.0
     *
     * @param null
     * @return int
     */
    function xmas_biz_excerpt_length( $length ){
        global $xmas_biz_customizer_all_values;
        $excerpt_length = $xmas_biz_customizer_all_values['excerpt_length_global'];
        if ( empty( $excerpt_length) ) {
            $excerpt_length = $length;
        }
        return absint( $excerpt_length );

    }

add_filter( 'excerpt_length', 'xmas_biz_excerpt_length', 999 );
endif;


if ( ! function_exists( 'xmas_biz_excerpt_more' ) && ! is_admin() )  :

	/**
	 * Implement read more in excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more The string shown within the more link.
	 * @return string The excerpt.
	 */
	function xmas_biz_excerpt_more( $more ) {

		$flag_apply_excerpt_read_more = apply_filters( 'xmas_biz_filter_excerpt_read_more', true );
		if ( true !== $flag_apply_excerpt_read_more ) {
			return $more;
		}

		$output = $more;
		$read_more_text = esc_html__('Read More','xmas-biz');
		if ( ! empty( $read_more_text ) ) {
			$output = ' <a href="'. esc_url( get_permalink() ) . '" class="read-more read-more-1 button-fancy -red"><span class="btn-arrow"></span><span class="twp-read-more text">' . esc_html( $read_more_text ) . '</span></a>';
			$output = apply_filters( 'xmas_biz_filter_read_more_link' , $output );
		}
		return $output;

	}

add_filter('excerpt_more', 'xmas_biz_excerpt_more');
endif;

if ( ! function_exists( 'xmas_biz_wishlist' )){
/**
 * Wishlist Header Count Ajax Function
**/
    if ( ! function_exists( 'xmas_biz_wishlist' ) ) {
        function xmas_biz_wishlist() {
            if ( function_exists( 'YITH_WCWL' ) ) { 
                $wishlist_url = YITH_WCWL()->get_wishlist_url(); ?>
                    <div class="top-wishlist">
                    <a href="<?php echo esc_url( $wishlist_url ); ?>" data-toggle="tooltip">
                        <div class="count">                            
                            <i class="fa fa-heart"></i>
                            <span class="hidden-xs"><?php esc_html_e('Wishlist', 'xmas-biz'); ?></span>
                            <span class="badge bigcounter"><?php echo yith_wcwl_count_products() ; ?></span>
                        </div>
                    </a>
                    </div>
            <?php
            }
        }
     }
    add_action( 'wp_ajax_yith_wcwl_update_single_product_list', 'xmas_biz_wishlist' );
    add_action( 'wp_ajax_nopriv_yith_wcwl_update_single_product_list', 'xmas_biz_wishlist' );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'xmas_biz_loop_columns');
if ( ! function_exists('xmas_biz_loop_columns')) {
	/**
	 * Shop Page no. of column
	 *
	 * @since Xmas Biz 0.1
	 *
	 */
	function xmas_biz_loop_columns() {
		return 3; // 3 products per row
	}
}

add_filter( 'woocommerce_output_related_products_args', 'xmas_biz_related_products_limit' );
if ( ! function_exists('xmas_biz_related_products_limit') ) {
	/**
	 * No. of related products
	 *
	 * @since xmas_biz 0.1
	 *
	 */
	function xmas_biz_related_products_limit( $args ) {
		global $product;
	
		$args['posts_per_page'] = 3;
		return $args;
	}
}


if( ! function_exists( 'xmas_biz_recommended_plugins' ) ) :

  /**
   * Recommended plugins
   *
   */
  function xmas_biz_recommended_plugins(){
      $xmas_biz_plugins = array(
        array(
            'name'     => __( 'Contact Form 7', 'xmas-biz' ),
            'slug'     => 'contact-form-7',
            'required' => false,
        ),
    	array(
		    'name'     => __( 'MailChimp for WordPress', 'xmas-biz' ),
		    'slug'     => 'mailchimp-for-wp',
		    'required' => false,
		),
      );
      $xmas_biz_plugins_config = array(
          'dismissable' => true,
      );
      
      tgmpa( $xmas_biz_plugins, $xmas_biz_plugins_config );
  }
endif;
add_action( 'tgmpa_register', 'xmas_biz_recommended_plugins' );