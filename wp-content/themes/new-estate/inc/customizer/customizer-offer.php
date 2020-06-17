<?php
#####--------------------------- #####
#####---=== Offer section ===--- #####
#####--------------------------- #####
$wp_customize->add_section('new_estate_offer', array(
    'title' => __('Offer','new-estate'),
    'description' => '',
    'panel'  => 'new_estate_home',
    'priority' => 2
));

#####---=== Enable banner ===--- #####
$wp_customize->add_setting('new_estate_offer_enable', array(
    'capability'     => 'edit_theme_options',
    'sanitize_callback' => 'new_estate_sanitize_checkbox',
));

$wp_customize->add_control('new_estate_offer_enable', array(
    'label'   => __('Enable offer section','new-estate'),
    'section' => 'new_estate_offer',
    'type' => 'checkbox',
    'priority'   => 1
));

#####---=== Title for offer section ===--- #####
$wp_customize->add_setting('new_estate_offer_title', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => __('What we offer','new-estate')
));

$wp_customize->add_control('new_estate_offer_title', array(
    'label'   => __('Title of offer section','new-estate'),
    'section' => 'new_estate_offer',
    'type' => 'text',
    'priority'   => 2
));

#####---=== font one ===--- #####
$wp_customize->add_setting('new_estate_offer_fontone', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => __('fa fa-bed','new-estate')
));

$wp_customize->add_control('new_estate_offer_fontone', array(
    'label'   => __('Icon for column - One','new-estate'),
    'section' => 'new_estate_offer',
    'type' => 'text',
    'priority'   => 3
));

#####---=== font two ===--- #####
$wp_customize->add_setting('new_estate_offer_fonttwo', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => __('fa fa-car','new-estate')
));

$wp_customize->add_control('new_estate_offer_fonttwo', array(
    'label'   => __('Icon for column - Two','new-estate'),
    'section' => 'new_estate_offer',
    'type' => 'text',
    'priority'   => 4
));
#####---=== font three ===--- #####
$wp_customize->add_setting('new_estate_offer_fontthree', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => __('fa fa-map-marker','new-estate')
));

$wp_customize->add_control('new_estate_offer_fontthree', array(
    'label'   => __('Icon for column - three','new-estate'),
    'section' => 'new_estate_offer',
    'type' => 'text',
    'priority'   => 5
));

#####---=== Select page for column one ===--- #####
$wp_customize->add_setting( 'new_estate_offer_one', array(
    'capability'    => 'edit_theme_options',
    'default'       => 0,
    'sanitize_callback' => 'absint'
));

$wp_customize->add_control( 'new_estate_offer_one', array(
    'label'     =>  __( 'Choose a Page for column - One ', 'new-estate' ),
    'section'   => 'new_estate_offer',
    'type'      => 'dropdown-pages',
    'priority'  => 7,
    'settings'  => 'new_estate_offer_one',
));

#####---=== Select page for column two ===--- #####
$wp_customize->add_setting( 'new_estate_offer_two', array(
    'capability'    => 'edit_theme_options',
    'default'       => 0,
    'sanitize_callback' => 'absint'
));

$wp_customize->add_control( 'new_estate_offer_two', array(
    'label'     =>  __( 'Choose a Page for column - Two ', 'new-estate' ),
    'section'   => 'new_estate_offer',
    'type'      => 'dropdown-pages',
    'priority'  => 8,
    'settings'  => 'new_estate_offer_two',
));

#####---=== Select page for column Three ===--- #####
$wp_customize->add_setting( 'new_estate_offer_three', array(
    'capability'    => 'edit_theme_options',
    'default'       => 0,
    'sanitize_callback' => 'absint'
));

$wp_customize->add_control( 'new_estate_offer_three', array(
    'label'     =>  __( 'Choose a Page for column - Three ', 'new-estate' ),
    'section'   => 'new_estate_offer',
    'type'      => 'dropdown-pages',
    'priority'  => 9,
    'settings'  => 'new_estate_offer_three',
));


#####---=== Read more one ===--- #####
$wp_customize->add_setting('new_estate_offer_one_text', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => __('Read More','new-estate')
));

$wp_customize->add_control('new_estate_offer_one_text', array(
    'label'   => __('Text for link - One','new-estate'),
    'section' => 'new_estate_offer',
    'type' => 'text',
    'priority'   => 11
));

#####---=== Read more two ===--- #####
$wp_customize->add_setting('new_estate_offer_two_text', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => __('Read More','new-estate')
));

$wp_customize->add_control('new_estate_offer_two_text', array(
    'label'   => __('Text for link - Two','new-estate'),
    'section' => 'new_estate_offer',
    'type' => 'text',
    'priority'   => 12
));

#####---=== Read more Three ===--- #####
$wp_customize->add_setting('new_estate_offer_three_text', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default' => __('Read More','new-estate')
));

$wp_customize->add_control('new_estate_offer_three_text', array(
    'label'   => __('Text for link - Three','new-estate'),
    'section' => 'new_estate_offer',
    'type' => 'text',
    'priority'   => 13
));