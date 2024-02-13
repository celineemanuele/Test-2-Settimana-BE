<?php
/**
 * Header Options
 *
 * @package Elementory
 */

$wp_customize->add_section(
	'elementory_header_options',
	array(
		'panel' => 'elementory_theme_options',
		'title' => esc_html__( 'Header Options', 'elementory' ),
	)
);

// Header Options - Contact Number.
$wp_customize->add_setting(
	'elementory_contact_number',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'elementory_contact_number',
	array(
		'label'   => esc_html__( 'Contact Number', 'elementory' ),
		'section' => 'elementory_header_options',
		'type'    => 'text',

	)
);

// Header Options - Email Address.
$wp_customize->add_setting(
	'elementory_email_address',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'elementory_email_address',
	array(
		'label'   => esc_html__( 'Email Address', 'elementory' ),
		'section' => 'elementory_header_options',
		'type'    => 'text',

	)
);

// Header Options - Button Label.
$wp_customize->add_setting(
	'elementory_header_button_label',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'elementory_header_button_label',
	array(
		'label'    => esc_html__( 'Button Label', 'elementory' ),
		'section'  => 'elementory_header_options',
		'settings' => 'elementory_header_button_label',
		'type'     => 'text',

	)
);

// Header Options - Button Link.
$wp_customize->add_setting(
	'elementory_header_button_link',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'elementory_header_button_link',
	array(
		'label'    => esc_html__( 'Button Link', 'elementory' ),
		'section'  => 'elementory_header_options',
		'settings' => 'elementory_header_button_link',
		'type'     => 'url',

	)
);
