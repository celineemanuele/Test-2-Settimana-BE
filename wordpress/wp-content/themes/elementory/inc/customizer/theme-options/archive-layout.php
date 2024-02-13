<?php
/**
 * Archive Layout
 *
 * @package Elementory
 */

$wp_customize->add_section(
	'elementory_archive_layout',
	array(
		'title' => esc_html__( 'Archive Layout', 'elementory' ),
		'panel' => 'elementory_theme_options',
	)
);

// Archive Layout - Column Layout.
$wp_customize->add_setting(
	'elementory_archive_column_layout',
	array(
		'default'           => 'column-3',
		'sanitize_callback' => 'elementory_sanitize_select',
	)
);

$wp_customize->add_control(
	'elementory_archive_column_layout',
	array(
		'label'   => esc_html__( 'Column Layout', 'elementory' ),
		'section' => 'elementory_archive_layout',
		'type'    => 'select',
		'choices' => array(
			'column-2' => __( 'Column 2', 'elementory' ),
			'column-3' => __( 'Column 3', 'elementory' ),
		),
	)
);

