<?php
/**
 * Breadcrumb
 *
 * @package Elementory
 */

$wp_customize->add_section(
	'elementory_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'elementory' ),
		'panel' => 'elementory_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'elementory_enable_breadcrumb',
	array(
		'sanitize_callback' => 'elementory_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Elementory_Toggle_Switch_Custom_Control(
		$wp_customize,
		'elementory_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'elementory' ),
			'section' => 'elementory_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'elementory_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'elementory_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'elementory' ),
		'section'         => 'elementory_breadcrumb',
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'elementory_enable_breadcrumb' )->value() === true );
		},
	)
);
