<?php
#####---=== Slider section ===--- #####
#####---------------------------- #####
$wp_customize->add_section('new_estate_slider', array(
    'title' => __('Slider Setting','new-estate'),
    'description' => '',
    'panel'  => 'new_estate_home',
    'priority' => 1
));
#####---=== Enable banner ===--- #####
$wp_customize->add_setting('new_estate_slider_enable', array(
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'new_estate_sanitize_checkbox',
));

$wp_customize->add_control('new_estate_slider_enable', array(
    'label'   => __('Enable banner','new-estate'),
    'section' => 'new_estate_slider',
    'type' => 'checkbox',
    'priority'   => 1
));

#####---=== Select page for banner ===--- #####
$wp_customize->add_setting( 'new_estate_slider_page', array(
    'capability'    => 'edit_theme_options',
    'default'       => 0,
    'sanitize_callback' => 'absint'
));

$wp_customize->add_control( 'home_slider_page_page', array(
    'label'     =>  __( 'Choose a Page For Banner ', 'new-estate' ),
    'section'   => 'new_estate_slider',
    'type'      => 'dropdown-pages',
    'priority'  => 2,
    'settings'  => 'new_estate_slider_page',
));

#####---=== Read more ===--- #####
$wp_customize->add_setting('new_estate_slider_text', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => __('Read More','new-estate')
));

$wp_customize->add_control('new_estate_slider_text', array(
    'label'   => __('Text for link button','new-estate'),
    'section' => 'new_estate_slider',
    'type' => 'text',
    'priority'   => 3
));