<?php
/**
 * slider section
 *
 * @package Xmas Biz
 */

$default = xmas_biz_get_default_theme_options();

// Slider Main Section.
$wp_customize->add_section( 'slider_section_settings',
	array(
		'title'      => __( 'Slider Section', 'xmas-biz' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_front_page_section',
	)
);


// Setting - show_slider_section.
$wp_customize->add_setting( 'show_slider_section',
	array(
		'default'           => $default['show_slider_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'xmas_biz_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_slider_section',
	array(
		'label'    => __( 'Enable Slider', 'xmas-biz' ),
		'section'  => 'slider_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

/*No of Slider*/
$wp_customize->add_setting( 'number_of_home_slider',
	array(
		'default'           => $default['number_of_home_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'xmas_biz_sanitize_select',
	)
);
$wp_customize->add_control( 'number_of_home_slider',
	array(
		'label'    => __( 'Select no of slider', 'xmas-biz' ),
        'description'     => __( 'If you are using selection "from page" option please refresh to get actual no of page', 'xmas-biz' ),
		'section'  => 'slider_section_settings',
		'choices'               => array(
		    '1' => __( '1', 'xmas-biz' ),
		    '2' => __( '2', 'xmas-biz' ),
		    '3' => __( '3', 'xmas-biz' )
		    ),
		'type'     => 'select',
		'priority' => 105,
	)
);

/*content excerpt in Slider*/
$wp_customize->add_setting( 'number_of_content_home_slider',
	array(
		'default'           => $default['number_of_content_home_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'xmas_biz_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'number_of_content_home_slider',
	array(
		'label'    => __( 'Select no words of slider', 'xmas-biz' ),
		'section'  => 'slider_section_settings',
		'type'     => 'number',
		'priority' => 110,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);


// Setting - select_slider_from.
$wp_customize->add_setting( 'select_slider_from',
	array(
		'default'           => $default['select_slider_from'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'xmas_biz_sanitize_select',
	)
);
$wp_customize->add_control( 'select_slider_from',
	array(
		'label'       => __( 'Select Slider From', 'xmas-biz' ),
		'section'     => 'slider_section_settings',
		'type'        => 'select',
		'choices'               => array(
		    'from-page' => __( 'Page', 'xmas-biz' ),
		    'from-category' => __( 'Category', 'xmas-biz' )
		    ),
		'priority'    => 110,
	)
);

for ( $i=1; $i <=  xmas_biz_get_option( 'number_of_home_slider' ) ; $i++ ) {
        $wp_customize->add_setting( 'select_page_for_slider_'. $i, array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'xmas_biz_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'select_page_for_slider_'. $i, array(
            'input_attrs'       => array(
                'style'           => 'width: 50px;'
                ),
            'label'             => __( 'Slider From Page', 'xmas-biz' ) . ' - ' . $i ,
            'priority'          =>  '120' . $i,
            'section'           => 'slider_section_settings',
            'type'        		=> 'dropdown-pages',
            'priority'    		=> 120,
            'active_callback' 	=> 'xmas_biz_is_select_page_slider',
            )
        );
    }

// Setting - drop down category for slider.
$wp_customize->add_setting( 'select_category_for_slider',
	array(
		'default'           => $default['select_category_for_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control( new Xmas_Biz_Dropdown_Taxonomies_Control( $wp_customize, 'select_category_for_slider',
	array(
        'label'           => __( 'Category for slider', 'xmas-biz' ),
        'description'     => __( 'Select category to be shown on tab ', 'xmas-biz' ),
        'section'         => 'slider_section_settings',
        'type'            => 'dropdown-taxonomies',
        'taxonomy'        => 'category',
		'priority'    	  => 130,
		'active_callback' => 'xmas_biz_is_select_cat_slider',

    ) ) );

/*settings for Section property*/
/*Button Text*/
$wp_customize->add_setting( 'button_text_on_slider',
	array(
		'default'           => $default['button_text_on_slider'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'button_text_on_slider',
	array(
		'label'    => __( 'Button Text', 'xmas-biz' ),
		'description'     => __( 'Removing text will disable button on the slider', 'xmas-biz' ),
		'section'  => 'slider_section_settings',
		'type'     => 'text',
		'priority' => 170,
	)
);

