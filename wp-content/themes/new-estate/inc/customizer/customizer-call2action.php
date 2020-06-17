<?php
#####---=== Call2action section ===--- #####
#####--------------------------------- #####
$wp_customize->add_section('new_estate_call2action', array(
    'title' => __('Call to action','new-estate'),
    'description' => '',
    'panel'  => 'new_estate_home',
    'priority' => 3
));
#####---=== Enable banner ===--- #####
$wp_customize->add_setting('new_estate_call2action_enable', array(
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'new_estate_sanitize_checkbox',
));

$wp_customize->add_control('new_estate_call2action_enable', array(
    'label'   => __('Enable call to action','new-estate'),
    'section' => 'new_estate_call2action',
    'type' => 'checkbox',
    'priority'   => 1
));

#####---=== Select page for banner ===--- #####
$wp_customize->add_setting( 'new_estate_call2action_page', array(
    'capability'    => 'edit_theme_options',
    'default'       => 0,
    'sanitize_callback' => 'absint'
));

$wp_customize->add_control( 'home_call2action_page_page', array(
    'label'     =>  __( 'Choose a Page For call to action ', 'new-estate' ),
    'section'   => 'new_estate_call2action',
    'type'      => 'dropdown-pages',
    'priority'  => 2,
    'settings'  => 'new_estate_call2action_page',
));

#####---=== Read more ===--- #####
$wp_customize->add_setting('new_estate_call2action_text', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => __('Read More','new-estate')
));

$wp_customize->add_control('new_estate_call2action_text', array(
    'label'   => __('Text for link button','new-estate'),
    'section' => 'new_estate_call2action',
    'type' => 'text',
    'priority'   => 3
));