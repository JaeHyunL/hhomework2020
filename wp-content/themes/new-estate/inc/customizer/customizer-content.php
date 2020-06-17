<?php
#####---=== Single content section ===--- #####
#####------------------------------------ #####
$wp_customize->add_section('new_estate_content', array(
    'title' => __('Content area','new-estate'),
    'description' => '',
    'panel'  => 'new_estate_home',
    'priority' => 4
));
#####---=== Enable content ===--- #####
$wp_customize->add_setting('new_estate_content_enable', array(
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'new_estate_sanitize_checkbox',
));

$wp_customize->add_control('new_estate_content_enable', array(
    'label'   => __('Enable Content area','new-estate'),
    'section' => 'new_estate_content',
    'type' => 'checkbox',
    'priority'   => 1
));

#####---=== Select page for content ===--- #####
$wp_customize->add_setting( 'new_estate_content_page', array(
    'capability'    => 'edit_theme_options',
    'default'       => 0,
    'sanitize_callback' => 'absint'
));

$wp_customize->add_control( 'new_estate_content_page', array(
    'label'     =>  __( 'Choose a page for Content area ', 'new-estate' ),
    'section'   => 'new_estate_content',
    'type'      => 'dropdown-pages',
    'priority'  => 2,
    'settings'  => 'new_estate_content_page',
));
