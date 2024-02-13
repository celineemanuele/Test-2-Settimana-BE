<?php

function elementory_agency_intro_text( $default_text ) {
	$default_text .= sprintf(
		'<div class="notice  notice-info elementory-agency-demo-data"><p class="demo-file-content">%1$s <a href="%2$s" target="_blank">%3$s</a></p></div>',
		esc_html__( 'Demo content files for Elementory Agency Theme.', 'elementory-agency' ),
		esc_url( 'https://docs.ascendoor.com/docs/elementory-agency/getting-started/import-demo-content/' ),
		esc_html__( 'Click here to download demo files.', 'elementory-agency' )
	);
	return $default_text;
}
add_filter( 'pt-ocdi/plugin_intro_text', 'elementory_agency_intro_text' );

/**
 * OCDI after import.
 */
function elementory_agency_after_import_setup() {
	// Assign menus to their locations.
	$primary_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
	$social_menu  = get_term_by( 'name', 'Social Menu', 'nav_menu' );

	set_theme_mod(
		'nav_menu_locations',
		array(
			'primary' => $primary_menu->term_id,
			'social'  => $social_menu->term_id,
		)
	);

}
add_action( 'ocdi/after_import', 'elementory_agency_after_import_setup' );
