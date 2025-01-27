<?php 

/**
 * Theme Options Panel.
 *
 * @package Xmas Biz
 */

$default = xmas_biz_get_default_theme_options();

// Add Theme Options Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
		'title'      => esc_html__( 'Theme Options', 'xmas-biz' ),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
	)
);

/*layout management section start */
$wp_customize->add_section( 'theme_option_section_settings',
	array(
		'title'      => esc_html__( 'Layout Management', 'xmas-biz' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_option_panel',
	)
);

// Setting social_icon_style.
$wp_customize->add_setting( 'social_icon_style',
	array(
	'default'           => $default['social_icon_style'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'xmas_biz_sanitize_select',
	)
);
$wp_customize->add_control( 'social_icon_style',
	array(
	'label'       => __( 'Social Icon Style', 'xmas-biz' ),
	'section'     => 'theme_option_section_settings',
	'type'        => 'select',
	'choices'               => array(
		'square' => __( 'Square', 'xmas-biz' ),
		'circle' => __( 'Circle', 'xmas-biz' ),
	    ),
	'priority'    => 110,
	)
);

/*Home Page Layout*/
$wp_customize->add_setting( 'home_page_content_status',
	array(
		'default'           => $default['home_page_content_status'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'xmas_biz_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'home_page_content_status',
	array(
		'label'    => esc_html__( 'Enable Static Page Content', 'xmas-biz' ),
		'section'  => 'theme_option_section_settings',
		'type'     => 'checkbox',
		'priority' => 150,
	)
);

/*Home Page Layout*/
$wp_customize->add_setting( 'enable_overlay_option',
	array(
		'default'           => $default['enable_overlay_option'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'xmas_biz_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'enable_overlay_option',
	array(
		'label'    => esc_html__( 'Enable Banner Overlay', 'xmas-biz' ),
		'section'  => 'theme_option_section_settings',
		'type'     => 'checkbox',
		'priority' => 150,
	)
);

/*Home Page Layout*/
$wp_customize->add_setting( 'homepage_layout_option',
	array(
		'default'           => $default['homepage_layout_option'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'xmas_biz_sanitize_select',
	)
);
$wp_customize->add_control( 'homepage_layout_option',
	array(
		'label'    => esc_html__( 'Home Page Layout', 'xmas-biz' ),
		'section'  => 'theme_option_section_settings',
		'choices'  => array(
                'full-width' => __( 'Full Width', 'xmas-biz' ),
                'boxed' => __( 'Boxed', 'xmas-biz' ),
		    ),
		'type'     => 'select',
		'priority' => 160,
	)
);

/*Global Layout*/
$wp_customize->add_setting( 'global_layout',
	array(
		'default'           => $default['global_layout'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'xmas_biz_sanitize_select',
	)
);
$wp_customize->add_control( 'global_layout',
	array(
		'label'    => esc_html__( 'Global Layout', 'xmas-biz' ),
		'section'  => 'theme_option_section_settings',
		'choices'   => array(
			'left-sidebar'  => esc_html__( 'Primary Sidebar - Content', 'xmas-biz' ),
			'right-sidebar' => esc_html__( 'Content - Primary Sidebar', 'xmas-biz' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'xmas-biz' ),
			),
		'type'     => 'select',
		'priority' => 170,
	)
);


/*content excerpt in global*/
$wp_customize->add_setting( 'excerpt_length_global',
	array(
		'default'           => $default['excerpt_length_global'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'xmas_biz_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'excerpt_length_global',
	array(
		'label'    => esc_html__( 'Set Global Archive Length', 'xmas-biz' ),
		'section'  => 'theme_option_section_settings',
		'type'     => 'number',
		'priority' => 175,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);

/*Archive Layout text*/
$wp_customize->add_setting( 'archive_layout',
	array(
		'default'           => $default['archive_layout'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'xmas_biz_sanitize_select',
	)
);
$wp_customize->add_control( 'archive_layout',
	array(
		'label'    => esc_html__( 'Archive Layout', 'xmas-biz' ),
		'section'  => 'theme_option_section_settings',
		'choices'               => array(
			'excerpt-only' => __( 'Excerpt Only', 'xmas-biz' ),
			'full-post' => __( 'Full Post', 'xmas-biz' ),
		    ),
		'type'     => 'select',
		'priority' => 180,
	)
);

/*Archive Layout image*/
$wp_customize->add_setting( 'archive_layout_image',
	array(
		'default'           => $default['archive_layout_image'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'xmas_biz_sanitize_select',
	)
);
$wp_customize->add_control( 'archive_layout_image',
	array(
		'label'    => esc_html__( 'Archive Image Alocation', 'xmas-biz' ),
		'section'  => 'theme_option_section_settings',
		'choices'               => array(
			'full' => __( 'Full', 'xmas-biz' ),
			'right' => __( 'Right', 'xmas-biz' ),
			'left' => __( 'Left', 'xmas-biz' ),
			'no-image' => __( 'No image', 'xmas-biz' )
		    ),
		'type'     => 'select',
		'priority' => 185,
	)
);

/*single post Layout image*/
$wp_customize->add_setting( 'single_post_image_layout',
	array(
		'default'           => $default['single_post_image_layout'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'xmas_biz_sanitize_select',
	)
);
$wp_customize->add_control( 'single_post_image_layout',
	array(
		'label'    => esc_html__( 'Single Post/Page Image Alocation', 'xmas-biz' ),
		'section'  => 'theme_option_section_settings',
		'choices'               => array(
			'full' => __( 'Full', 'xmas-biz' ),
			'right' => __( 'Right', 'xmas-biz' ),
			'left' => __( 'Left', 'xmas-biz' ),
			'no-image' => __( 'No image', 'xmas-biz' )
		    ),
		'type'     => 'select',
		'priority' => 190,
	)
);


// Pagination Section.
$wp_customize->add_section( 'pagination_section',
	array(
	'title'      => __( 'Pagination Options', 'xmas-biz' ),
	'priority'   => 110,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting pagination_type.
$wp_customize->add_setting( 'pagination_type',
	array(
	'default'           => $default['pagination_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'xmas_biz_sanitize_select',
	)
);
$wp_customize->add_control( 'pagination_type',
	array(
	'label'       => __( 'Pagination Type', 'xmas-biz' ),
	'section'     => 'pagination_section',
	'type'        => 'select',
	'choices'               => array(
		'default' => __( 'Default (Older / Newer Post)', 'xmas-biz' ),
		'numeric' => __( 'Numeric', 'xmas-biz' ),
	    ),
	'priority'    => 100,
	)
);



// mailchimp Section.
$wp_customize->add_section( 'mailchimp_section',
    array(
    'title'      => __( 'Mailchimp Options', 'xmas-biz' ),
    'priority'   => 125,
    'capability' => 'edit_theme_options',
    'panel'      => 'theme_option_panel',
    )
);

$wp_customize->add_setting( 'enable_mailchimp',
    array(
        'default'           => $default['enable_mailchimp'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'xmas_biz_sanitize_checkbox',
    )
);
$wp_customize->add_control( 'enable_mailchimp',
    array(
        'label'    => esc_html__( 'Enable Mailchimp Subscription', 'xmas-biz' ),
        'section'  => 'mailchimp_section',
        'type'     => 'checkbox',
        'priority' => 110,
    )
);

// Setting - mailchimp_shortcode.
$wp_customize->add_setting( 'mailchimp_shortcode',
    array(
        'default'           => $default['mailchimp_shortcode'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'mailchimp_shortcode',
    array(
        'label'    => esc_html__( 'Mailchimp Subscription Form Shortcode', 'xmas-biz' ),
        'section'  => 'mailchimp_section',
        'type'     => 'textarea',
        'priority' => 160,
    )
);

// Setting - mailchimp_title.
$wp_customize->add_setting( 'mailchimp_title',
    array(
        'default'           => $default['mailchimp_title'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'mailchimp_title',
    array(
        'label'    => esc_html__( 'Mailchimp Title', 'xmas-biz' ),
        'section'  => 'mailchimp_section',
        'type'     => 'text',
        'priority' => 120,
    )
);

// Footer Section.
$wp_customize->add_section( 'footer_section',
	array(
	'title'      => __( 'Footer Options', 'xmas-biz' ),
	'priority'   => 130,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);


// Setting footer_section_background_image.
$wp_customize->add_setting( 'footer_section_background_image',
	array(
	'default'           => $default['footer_section_background_image'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'xmas_biz_sanitize_image',
	)
);
$wp_customize->add_control(
	new WP_Customize_Image_Control( $wp_customize, 'footer_section_background_image',
		array(
		'label'           => __( 'Footer Section Background Image.', 'xmas-biz' ),
		'description'	  => sprintf( __( 'Recommended Size %1$d X %2$d', 'xmas-biz' ), 1920, 600 ),
		'section'         => 'footer_section_settings',
		'priority'        => 100,

		)
	)
);


// Setting social_content_heading.
$wp_customize->add_setting( 'number_of_footer_widget',
	array(
	'default'           => $default['number_of_footer_widget'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'xmas_biz_sanitize_select',
	)
);
$wp_customize->add_control( 'number_of_footer_widget',
	array(
	'label'    => __( 'Number Of Footer Widget', 'xmas-biz' ),
	'section'  => 'footer_section',
	'type'     => 'select',
	'priority' => 100,
	'choices'               => array(
		0 => __( 'Disable footer sidebar area', 'xmas-biz' ),
		1 => __( '1', 'xmas-biz' ),
		2 => __( '2', 'xmas-biz' ),
		3 => __( '3', 'xmas-biz' ),
	    ),
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'copyright_text',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'copyright_text',
	array(
	'label'    => __( 'Footer Copyright Text', 'xmas-biz' ),
	'section'  => 'footer_section',
	'type'     => 'text',
	'priority' => 120,
	)
);

// Breadcrumb Section.
$wp_customize->add_section( 'breadcrumb_section',
	array(
	'title'      => __( 'Breadcrumb Options', 'xmas-biz' ),
	'priority'   => 120,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting breadcrumb_type.
$wp_customize->add_setting( 'breadcrumb_type',
	array(
	'default'           => $default['breadcrumb_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'xmas_biz_sanitize_select',
	)
);
$wp_customize->add_control( 'breadcrumb_type',
	array(
	'label'       => __( 'Breadcrumb Type', 'xmas-biz' ),
	'description' => sprintf( __( 'Advanced: Requires %1$sBreadcrumb NavXT%2$s plugin', 'xmas-biz' ), '<a href="https://wordpress.org/plugins/breadcrumb-navxt/" target="_blank">','</a>' ),
	'section'     => 'breadcrumb_section',
	'type'        => 'select',
	'choices'               => array(
		'disabled' => __( 'Disabled', 'xmas-biz' ),
		'simple' => __( 'Simple', 'xmas-biz' ),
		'advanced' => __( 'Advanced', 'xmas-biz' ),
	    ),
	'priority'    => 100,
	)
);
