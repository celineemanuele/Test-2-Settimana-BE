<?php
/**
 * Elementory Agency functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Elementory Agency
 */

if ( ! function_exists( 'elementory_agency_setup' ) ) :
	function elementory_agency_setup() {
		/*
		* Make child theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_child_theme_textdomain( 'elementory-agency', get_stylesheet_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		add_theme_support( 'title-tag' );

		add_theme_support( 'register_block_pattern' );

		add_theme_support( 'register_block_style' );

		add_theme_support( 'wp-block-styles' );

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'elementory_agency_setup' );

if ( ! function_exists( 'elementory_agency_enqueue_styles' ) ) :
	/**
	 * Enqueue scripts and styles.
	 */
	function elementory_agency_enqueue_styles() {
		$parenthandle = 'elementory-style';
		$theme        = wp_get_theme();

		wp_enqueue_style(
			$parenthandle,
			get_template_directory_uri() . '/style.css',
			array(
				'elementory-slick-style',
				'elementory-fontawesome-style',
				'elementory-google-fonts',
			),
			$theme->parent()->get( 'Version' )
		);

		wp_enqueue_style(
			'elementory-agency-style',
			get_stylesheet_uri(),
			array( $parenthandle ),
			$theme->get( 'Version' )
		);

	}

endif;

add_action( 'wp_enqueue_scripts', 'elementory_agency_enqueue_styles' );

// Custom Controls
require get_theme_file_path() . '/inc/custom-controls.php';

// Customizer Section
require get_theme_file_path() . '/inc/customizer.php';

// Tgmpa plugin
require get_theme_file_path() . '/inc/tgmpa/recommended-plugins.php';

/**
 * One Click Demo Import after import setup.
 */
if ( class_exists( 'OCDI_Plugin' ) ) {
	require get_theme_file_path() . '/inc/ocdi.php';
}

function admin_style() {
	?>
	<style type="text/css">
		.notice.notice-info.elementory-demo-data {
			display: none !important;
		}
	</style>
	<?php
}
add_action( 'admin_enqueue_scripts', 'admin_style' );

function elementory_agency_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'elementory_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => 'ff4f4f',
				'width'              => 1000,
				'height'             => 250,
				'flex-height'        => true,
				'wp-head-callback'   => 'elementory_header_style',
			)
		)
	);
}
add_action( 'after_setup_theme', 'elementory_agency_custom_header_setup' );
