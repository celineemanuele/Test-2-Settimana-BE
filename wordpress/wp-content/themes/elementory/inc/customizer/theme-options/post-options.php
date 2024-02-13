<?php
/**
 * Post Options
 *
 * @package Elementory
 */

$wp_customize->add_section(
	'elementory_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'elementory' ),
		'panel' => 'elementory_theme_options',
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'elementory_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'elementory_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Elementory_Toggle_Switch_Custom_Control(
		$wp_customize,
		'elementory_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'elementory' ),
			'section' => 'elementory_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'elementory_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'elementory_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Elementory_Toggle_Switch_Custom_Control(
		$wp_customize,
		'elementory_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'elementory' ),
			'section' => 'elementory_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'elementory_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'elementory_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Elementory_Toggle_Switch_Custom_Control(
		$wp_customize,
		'elementory_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'elementory' ),
			'section' => 'elementory_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'elementory_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'elementory_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Elementory_Toggle_Switch_Custom_Control(
		$wp_customize,
		'elementory_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'elementory' ),
			'section' => 'elementory_post_options',
		)
	)
);

// Post Options - Hide Related Posts.
$wp_customize->add_setting(
	'elementory_post_hide_related_posts',
	array(
		'default'           => false,
		'sanitize_callback' => 'elementory_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Elementory_Toggle_Switch_Custom_Control(
		$wp_customize,
		'elementory_post_hide_related_posts',
		array(
			'label'   => esc_html__( 'Hide Related Posts', 'elementory' ),
			'section' => 'elementory_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'elementory_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'elementory' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'elementory_post_related_post_label',
	array(
		'label'           => esc_html__( 'Related Posts Label', 'elementory' ),
		'section'         => 'elementory_post_options',
		'settings'        => 'elementory_post_related_post_label',
		'type'            => 'text',
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'elementory_post_hide_related_posts' )->value() === false );
		},
	)
);
