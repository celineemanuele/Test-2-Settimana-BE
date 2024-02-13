<?php
/**
 * Footer Options
 *
 * @package Elementory
 */

$wp_customize->add_section(
	'elementory_footer_options',
	array(
		'panel' => 'elementory_theme_options',
		'title' => esc_html__( 'Footer Options', 'elementory' ),
	)
);

// Footer Options - Copyright Text.
/* translators: 1: Year, 2: Site Title with home URL. */
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'elementory' ), '[the-year]', '[site-link]' );
$wp_customize->add_setting(
	'elementory_footer_copyright_text',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'elementory_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'elementory' ),
		'section'  => 'elementory_footer_options',
		'settings' => 'elementory_footer_copyright_text',
		'type'     => 'textarea',
	)
);

// Footer Options - Scroll Top.
$wp_customize->add_setting(
	'elementory_scroll_top',
	array(
		'sanitize_callback' => 'elementory_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Elementory_Toggle_Switch_Custom_Control(
		$wp_customize,
		'elementory_scroll_top',
		array(
			'label'   => esc_html__( 'Enable Scroll Top Button', 'elementory' ),
			'section' => 'elementory_footer_options',
		)
	)
);
