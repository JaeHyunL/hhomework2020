<?php

/**
* Personal customizer setup
* @package New-Estate
*/


#####---==========================--- #####
#####---=== Customizer setting ===--- #####
#####---==========================--- #####
function new_estate_customize_register( $wp_customize ) {

	#####---=== create homepage setting panel ===--- #####
	$wp_customize->add_panel('new_estate_customize', array(
		'title' => __('General settings', 'new-estate'), 
		'description' => '', 
		'capability' => 'edit_theme_options', 
		'theme_supports' => '', 
		'priority' => 2
	));

	#####---=== create homepage setting panel ===--- #####
	$wp_customize->add_panel('new_estate_home', array(
		'title' => __('Homepage settings', 'new-estate'), 
		'description' => '', 
		'capability' => 'edit_theme_options', 
		'priority' => 3
	));


	#####---=== Realia settings ===--- #####
	$wp_customize->add_panel('new_estate_realia', array(
		'title' => __('Realia settings', 'new-estate'), 
		'description' => '', 
		'capability' => 'edit_theme_options', 
		'priority' => 4
	));

	$wp_customize->add_section('realia_general', array(
	    'title' => __('Realia General Settings','new-estate'),
	    'description' => '',
	    'panel'  => 'new_estate_realia',
	    'priority' => 1
	));

	$wp_customize->add_section('realia_currencies[0]', array(
	    'title' => __('Realia Currency','new-estate'),
	    'description' => '',
	    'panel'  => 'new_estate_realia',
	    'priority' => 2
	));

	$wp_customize->add_section('realia_measurement', array(
	    'title' => __('Realia Measurement','new-estate'),
	    'description' => '',
	    'panel'  => 'new_estate_realia',
	    'priority' => 3
	));

	$wp_customize->add_section('realia_recaptcha', array(
	    'title' => __('Realia Recaptcha','new-estate'),
	    'description' => '',
	    'panel'  => 'new_estate_realia',
	    'priority' => 4
	));

	$wp_customize->add_section('realia_submission', array(
	    'title' => __('Realia Submission','new-estate'),
	    'description' => '',
	    'panel'  => 'new_estate_realia',
	    'priority' => 4
	));

	$wp_customize->add_section('realia_recaptcha', array(
	    'title' => __('Realia Recaptcha','new-estate'),
	    'description' => '',
	    'panel'  => 'new_estate_realia',
	    'priority' => 4
	));

	$wp_customize->add_section('realia_wire_transfer', array(
	    'title' => __('Realia Wire Transfer','new-estate'),
	    'description' => '',
	    'panel'  => 'new_estate_realia',
	    'priority' => 4
	));

	#####---=== Add customizer settings for general & homepage templates ===--- #####
	require get_template_directory() . '/inc/customizer/customizer-topbar.php';
	require get_template_directory() . '/inc/customizer/customizer-slider.php';
	require get_template_directory() . '/inc/customizer/customizer-offer.php';
	require get_template_directory() . '/inc/customizer/customizer-call2action.php';
	require get_template_directory() . '/inc/customizer/customizer-content.php';
	require get_template_directory() . '/inc/customizer/customizer-latestpost.php';

	
	
	function new_estate_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
	}
	
}
add_action( 'customize_register', 'new_estate_customize_register' );

?>