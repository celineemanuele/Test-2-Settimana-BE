<?php
/**
 * Sidebar Position
 *
 * @package Elementory
 */

$wp_customize->add_section(
	'elementory_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'elementory' ),
		'panel' => 'elementory_theme_options',
	)
);

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'elementory_sidebar_position',
	array(
		'sanitize_callback' => 'elementory_sanitize_select',
		'default'           => 'no-sidebar',
	)
);

$wp_customize->add_control(
	'elementory_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'elementory' ),
		'section' => 'elementory_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'elementory' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'elementory' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'elementory' ),
		),
	)
);

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'elementory_post_sidebar_position',
	array(
		'sanitize_callback' => 'elementory_sanitize_select',
		'default'           => 'no-sidebar',
	)
);

$wp_customize->add_control(
	'elementory_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'elementory' ),
		'section' => 'elementory_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'elementory' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'elementory' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'elementory' ),
		),
	)
);

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'elementory_page_sidebar_position',
	array(
		'sanitize_callback' => 'elementory_sanitize_select',
		'default'           => 'no-sidebar',
	)
);

$wp_customize->add_control(
	'elementory_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'elementory' ),
		'section' => 'elementory_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'elementory' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'elementory' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'elementory' ),
		),
	)
);
