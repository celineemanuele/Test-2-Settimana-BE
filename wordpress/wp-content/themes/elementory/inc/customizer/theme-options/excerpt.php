<?php
/**
 * Excerpt
 *
 * @package Elementory
 */

$wp_customize->add_section(
	'elementory_excerpt_options',
	array(
		'panel' => 'elementory_theme_options',
		'title' => esc_html__( 'Excerpt', 'elementory' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'elementory_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'elementory_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'elementory_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'elementory' ),
		'section'     => 'elementory_excerpt_options',
		'settings'    => 'elementory_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 5,
			'max'  => 200,
			'step' => 1,
		),
	)
);
