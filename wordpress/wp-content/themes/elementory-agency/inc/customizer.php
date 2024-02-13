<?php
/**
 * Theme Customizer
 *
 * @package Elementory Agency
 */

function elementory_agency_customize_register( $wp_customize ) {

	// Upsell Section.
	$wp_customize->add_section(
		new Elementory_Agency_Upsell_Section(
			$wp_customize,
			'upsell_sections',
			array(
				'title'            => __( 'Elementory Agency Pro', 'elementory-agency' ),
				'button_text'      => __( 'Buy Pro', 'elementory-agency' ),
				'url'              => 'https://ascendoor.com/themes/elementory-agency-pro/',
				'background_color' => '#ff4f4f',
				'text_color'       => '#fff',
				'priority'         => 0,
			)
		)
	);

	// Footer Options - Background Image.
	$wp_customize->add_setting(
		'elementory_agency_footer_bg_image',
		array(
			'default'           => '',
			'sanitize_callback' => 'elementory_sanitize_image',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'elementory_agency_footer_bg_image',
			array(
				'label'    => esc_html__( 'Footer Background Image', 'elementory-agency' ),
				'section'  => 'elementory_footer_options',
				'settings' => 'elementory_agency_footer_bg_image',
			)
		)
	);

	// Footer Options - Footer Widgets Column Layout.
	$wp_customize->add_setting(
		'elementory_agency_footer_widgets_column_layout',
		array(
			'sanitize_callback' => 'elementory_sanitize_select',
			'default'           => 'three-column-1',
		)
	);

	$wp_customize->add_control(
		new Elementory_Agency_Custom_Radio_Image_Control(
			$wp_customize,
			'elementory_agency_footer_widgets_column_layout',
			array(
				'label'   => esc_html__( 'Footer Widgets Column Layout', 'elementory-agency' ),
				'section' => 'elementory_footer_options',
				'choices' => array(
					'four-column'    => esc_url( get_stylesheet_directory_uri() . '/assets/image/four-column-widget.png' ),
					'three-column-1' => esc_url( get_stylesheet_directory_uri() . '/assets/image/three-column-1.png' ),
					'three-column-2' => esc_url( get_stylesheet_directory_uri() . '/assets/image/three-column-2.png' ),
					'three-column-3' => esc_url( get_stylesheet_directory_uri() . '/assets/image/three-column-3.png' ),
				),
			)
		)
	);

}
add_action( 'customize_register', 'elementory_agency_customize_register' );

function elementory_agency_custom_control_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_style( 'elementory-agency-custom-controls-css', get_stylesheet_directory_uri() . '/assets/css/custom-controls' . $min . '.css', array( 'elementory-custom-controls-css' ), '1.0', 'all' );
	wp_enqueue_script( 'elementory-agency-custom-controls-js', get_stylesheet_directory_uri() . '/assets/js/custom-controls' . $min . '.js', array( 'elementory-custom-controls-js', 'jquery', 'jquery-ui-core' ), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'elementory_agency_custom_control_scripts' );
