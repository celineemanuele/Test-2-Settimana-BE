<?php
/**
 * Elementory Theme Customizer
 *
 * @package Elementory
 */

// Sanitize callback.
require get_template_directory() . '/inc/customizer/sanitize-callback.php';

// Custom Controls.
require get_template_directory() . '/inc/customizer/custom-controls/custom-controls.php';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function elementory_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'elementory_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'elementory_customize_partial_blogdescription',
			)
		);
	}

	// Upsell Section.
	$wp_customize->add_section(
		new Elementory_Upsell_Section(
			$wp_customize,
			'upsell_section',
			array(
				'title'            => __( 'Elementory Pro', 'elementory' ),
				'button_text'      => __( 'Buy Pro', 'elementory' ),
				'url'              => 'https://ascendoor.com/themes/elementory-pro/',
				'background_color' => '#d1143e',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

	// Theme Options.
	require get_template_directory() . '/inc/customizer/theme-options.php';

}
add_action( 'customize_register', 'elementory_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function elementory_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function elementory_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function elementory_customize_preview_js() {
	wp_enqueue_script( 'elementory-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), ELEMENTORY_VERSION, true );
}
add_action( 'customize_preview_init', 'elementory_customize_preview_js' );

/**
 * Enqueue script for custom customize control.
 */
function elementory_custom_control_scripts() {
	wp_enqueue_style( 'elementory-custom-controls-css', get_template_directory_uri() . '/assets/css/custom-controls.css', array(), '1.0', 'all' );
	wp_enqueue_script( 'elementory-custom-controls-js', get_template_directory_uri() . '/assets/js/custom-controls.js', array( 'jquery' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'elementory_custom_control_scripts' );
