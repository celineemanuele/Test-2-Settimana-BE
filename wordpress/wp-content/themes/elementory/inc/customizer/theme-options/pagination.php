<?php
/**
 * Pagination
 *
 * @package Elementory
 */

$wp_customize->add_section(
	'elementory_pagination',
	array(
		'panel' => 'elementory_theme_options',
		'title' => esc_html__( 'Pagination', 'elementory' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'elementory_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'elementory_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Elementory_Toggle_Switch_Custom_Control(
		$wp_customize,
		'elementory_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'elementory' ),
			'section'  => 'elementory_pagination',
			'settings' => 'elementory_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'elementory_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'elementory_sanitize_select',
	)
);

$wp_customize->add_control(
	'elementory_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'elementory' ),
		'section'         => 'elementory_pagination',
		'settings'        => 'elementory_pagination_type',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'elementory' ),
			'numeric' => __( 'Numeric', 'elementory' ),
		),
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'elementory_enable_pagination' )->value() === true );
		},
	)
);
