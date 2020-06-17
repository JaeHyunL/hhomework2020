<?php
/**
 * Default theme options.
 *
 * @package Xmas Biz
 */

if ( ! function_exists( 'xmas_biz_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function xmas_biz_get_default_theme_options() {

		$defaults = array();

		//headeing section:
		$defaults['top_header_location']				= '';
		$defaults['top_header_telephone']				= '';
		$defaults['top_header_email']					= '';
		
		
		// Slider Section.
		$defaults['show_slider_section']				= 1;
		$defaults['number_of_home_slider']				= 3;
		$defaults['number_of_content_home_slider']		= 30;
		$defaults['select_slider_from']					= 'from-category';
		$defaults['select-page-for-slider']				= 0;
		$defaults['select_category_for_slider']			= 1;
		$defaults['button_text_on_slider']				= esc_html__( 'Browse More', 'xmas-biz' );
		
		/*mailchimp*/
		$defaults['enable_mailchimp']               = 0;
		$defaults['mailchimp_title']                = esc_html__( 'Subscribe Our Newsletter', 'xmas-biz' );
		$defaults['mailchimp_shortcode']            = '';

		/*layout*/
		$defaults['home_page_content_status']     	= 1;
		$defaults['footer_section_background_image'] = get_template_directory_uri() . '/images/footer-bg.jpg';
		$defaults['enable_overlay_option']			= 1;
		$defaults['homepage_layout_option']			= 'full-width';
		$defaults['global_layout']					= 'right-sidebar';
		$defaults['excerpt_length_global']			= 50;
		$defaults['archive_layout']					= 'excerpt-only';
		$defaults['archive_layout_image']			= 'full';
		$defaults['single_post_image_layout']		= 'full';
		$defaults['pagination_type']				= 'default';
		$defaults['copyright_text']					= esc_html__( 'Copyright All rights reserved', 'xmas-biz' );
		$defaults['social_icon_style']				= 'square';
		$defaults['number_of_footer_widget']		= 3;
		$defaults['breadcrumb_type']				= 'simple';

		// Pass through filter.
		$defaults = apply_filters( 'xmas_biz_filter_default_theme_options', $defaults );

		return $defaults;

	}

endif;
