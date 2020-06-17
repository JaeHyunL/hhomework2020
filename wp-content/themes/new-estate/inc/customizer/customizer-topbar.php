<?php
#####--------------------------- #####
#####---=== Offer section ===--- #####
#####--------------------------- #####
$wp_customize->add_section('new_estate_topbar', array(
    'title' => __('Top bar','new-estate'),
    'description' => '',
    'panel'  => 'new_estate_customize',
    'priority' => 1
));

#####---=== Enable banner ===--- #####
$wp_customize->add_setting('new_estate_topbar_enable', array(
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'new_estate_sanitize_checkbox',
));

$wp_customize->add_control('new_estate_topbar_enable', array(
    'label'   => __('Enable Topbar section','new-estate'),
    'section' => 'new_estate_topbar',
    'type' => 'checkbox',
    'priority'   => 1
));

#####---=== Email id ===--- #####
$wp_customize->add_setting('new_estate_topbar_email', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => __('Your mail id','new-estate')
));

$wp_customize->add_control('new_estate_topbar_email', array(
    'label'   => __('Email id','new-estate'),
    'section' => 'new_estate_topbar',
    'type' => 'text',
    'priority'   => 2
));

#####---=== Mobile Number ===--- #####
$wp_customize->add_setting('new_estate_topbar_phone', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => __('Your phone #','new-estate')
));

$wp_customize->add_control('new_estate_topbar_phone', array(
    'label'   => __('Contact Number','new-estate'),
    'section' => 'new_estate_topbar',
    'type' => 'text',
    'priority'   => 3
));

#####---=== Social links ===--- #####
$wp_customize->add_setting('new_estate_topbarsocial_enable', array(
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'new_estate_sanitize_checkbox',
));

$wp_customize->add_control('new_estate_topbarsocial_enable', array(
    'label'   => __('Enable Social section','new-estate'),
    'section' => 'new_estate_topbar',
    'type' => 'checkbox',
    'priority'   => 4
));

#####---=== Facebook ===--- #####
$wp_customize->add_setting('new_estate_topbar_facebook', array(
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control('new_estate_topbar_facebook', array(
    'label'   => __('Facebook url','new-estate'),
    'section' => 'new_estate_topbar',
    'type' => 'text',
    'priority'   => 5
));

#####---=== Facebook ===--- #####
$wp_customize->add_setting('new_estate_topbar_twitter', array(
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control('new_estate_topbar_twitter', array(
    'label'   => __('Twitter url','new-estate'),
    'section' => 'new_estate_topbar',
    'type' => 'text',
    'priority'   => 6
));

#####---=== Facebook ===--- #####
$wp_customize->add_setting('new_estate_topbar_google', array(
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control('new_estate_topbar_google', array(
    'label'   => __('Google+ url','new-estate'),
    'section' => 'new_estate_topbar',
    'type' => 'text',
    'priority'   => 7
));

#####---=== Facebook ===--- #####
$wp_customize->add_setting('new_estate_topbar_linkedin', array(
    'sanitize_callback' => 'esc_url_raw'
));

$wp_customize->add_control('new_estate_topbar_linkedin', array(
    'label'   => __('Linkedid url','new-estate'),
    'section' => 'new_estate_topbar',
    'type' => 'text',
    'priority'   => 8
));
