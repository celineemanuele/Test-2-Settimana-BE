<?php
/**
 * Typography
 *
 * @package Elementory
 */

$wp_customize->add_section(
	'elementory_typography',
	array(
		'panel' => 'elementory_theme_options',
		'title' => esc_html__( 'Typography', 'elementory' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'elementory_site_title_font',
	array(
		'default'           => 'Yeseva One',
		'sanitize_callback' => 'elementory_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'elementory_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'elementory' ),
		'section'  => 'elementory_typography',
		'settings' => 'elementory_site_title_font',
		'type'     => 'select',
		'choices'  => elementory_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'elementory_site_description_font',
	array(
		'default'           => 'Open Sans',
		'sanitize_callback' => 'elementory_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'elementory_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'elementory' ),
		'section'  => 'elementory_typography',
		'settings' => 'elementory_site_description_font',
		'type'     => 'select',
		'choices'  => elementory_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'elementory_header_font',
	array(
		'default'           => 'Lustria',
		'sanitize_callback' => 'elementory_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'elementory_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'elementory' ),
		'section'  => 'elementory_typography',
		'settings' => 'elementory_header_font',
		'type'     => 'select',
		'choices'  => elementory_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'elementory_body_font',
	array(
		'default'           => 'Open Sans',
		'sanitize_callback' => 'elementory_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'elementory_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'elementory' ),
		'section'  => 'elementory_typography',
		'settings' => 'elementory_body_font',
		'type'     => 'select',
		'choices'  => elementory_get_all_google_font_families(),
	)
);
