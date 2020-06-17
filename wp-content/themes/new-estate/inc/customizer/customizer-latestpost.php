<?php
#####---------------------------------- #####
#####---=== Latest posts section ===--- #####
#####---------------------------------- #####
$wp_customize->add_section('new_estate_latestposts', array(
    'title' => __('Latest posts','new-estate'),
    'description' => '',
    'panel'  => 'new_estate_home',
    'priority' => 5
));

#####---=== Enable banner ===--- #####
$wp_customize->add_setting('new_estate_latestposts_enable', array(
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'new_estate_sanitize_checkbox',
));

$wp_customize->add_control('new_estate_latestposts_enable', array(
    'label'   => __('Enable Latest posts section','new-estate'),
    'section' => 'new_estate_latestposts',
    'type' => 'checkbox',
    'priority'   => 1
));

#####---=== Title for latest post section ===--- #####
$wp_customize->add_setting('new_estate_latestposts_title', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => __('Latest posts','new-estate')
));

$wp_customize->add_control('new_estate_latestposts_title', array(
    'label'   => __('Title of offer section','new-estate'),
    'section' => 'new_estate_latestposts',
    'type' => 'text',
    'priority'   => 2
));
#####---=== Title for latest post section ===--- #####
$wp_customize->add_setting('new_estate_latestposts_more', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => __('Read more','new-estate')
));

$wp_customize->add_control('new_estate_latestposts_more', array(
    'label'   => __('Read more text','new-estate'),
    'section' => 'new_estate_latestposts',
    'type' => 'text',
    'priority'   => 3
));