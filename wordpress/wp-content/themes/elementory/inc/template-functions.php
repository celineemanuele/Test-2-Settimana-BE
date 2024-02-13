<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Elementory
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function elementory_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	$classes[] = elementory_sidebar_layout();

	return $classes;
}
add_filter( 'body_class', 'elementory_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function elementory_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'elementory_pingback_header' );

/**
 * Get all categories for customizer Category content type.
 */
function elementory_get_post_cat_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'elementory' ) );
	$cats    = get_categories();

	foreach ( $cats as $cat ) {
		$choices[ $cat->term_id ] = $cat->name;
	}

	return $choices;
}

if ( ! function_exists( 'elementory_excerpt_length' ) ) :
	/**
	 * Excerpt length.
	 */
	function elementory_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		return get_theme_mod( 'elementory_excerpt_length', 20 );
	}
endif;
add_filter( 'excerpt_length', 'elementory_excerpt_length', 999 );

if ( ! function_exists( 'elementory_excerpt_more' ) ) :
	/**
	 * Excerpt more.
	 */
	function elementory_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}

		return '&hellip;';
	}
endif;
add_filter( 'excerpt_more', 'elementory_excerpt_more' );

if ( ! function_exists( 'elementory_sidebar_layout' ) ) {
	/**
	 * Get sidebar layout.
	 */
	function elementory_sidebar_layout() {
		$sidebar_position      = get_theme_mod( 'elementory_sidebar_position', 'no-sidebar' );
		$sidebar_position_post = get_theme_mod( 'elementory_post_sidebar_position', 'no-sidebar' );
		$sidebar_position_page = get_theme_mod( 'elementory_page_sidebar_position', 'no-sidebar' );

		if ( is_single() ) {
			$sidebar_position = $sidebar_position_post;
		} elseif ( is_page() ) {
			$sidebar_position = $sidebar_position_page;
		}

		return $sidebar_position;
	}
}

if ( ! function_exists( 'elementory_is_sidebar_enabled' ) ) {
	/**
	 * Check if sidebar is enabled.
	 */
	function elementory_is_sidebar_enabled() {
		$sidebar_position      = get_theme_mod( 'elementory_sidebar_position', 'no-sidebar' );
		$sidebar_position_post = get_theme_mod( 'elementory_post_sidebar_position', 'no-sidebar' );
		$sidebar_position_page = get_theme_mod( 'elementory_page_sidebar_position', 'no-sidebar' );

		$sidebar_enabled = true;
		if ( is_home() || is_archive() || is_search() ) {
			if ( 'no-sidebar' === $sidebar_position ) {
				$sidebar_enabled = false;
			}
		} elseif ( is_single() ) {
			if ( 'no-sidebar' === $sidebar_position || 'no-sidebar' === $sidebar_position_post ) {
				$sidebar_enabled = false;
			}
		} elseif ( is_page() ) {
			if ( 'no-sidebar' === $sidebar_position || 'no-sidebar' === $sidebar_position_page ) {
				$sidebar_enabled = false;
			}
		}
		return $sidebar_enabled;
	}
}

/**
 * Breadcrumb.
 */
function elementory_breadcrumb( $args = array() ) {
	if ( ! get_theme_mod( 'elementory_enable_breadcrumb', true ) ) {
		return;
	}

	$args = array(
		'show_on_front' => false,
		'show_title'    => true,
		'show_browse'   => false,
	);
	breadcrumb_trail( $args );
}
add_action( 'elementory_breadcrumb', 'elementory_breadcrumb', 10 );

/**
 * Add separator for breadcrumb trail.
 */
function elementory_breadcrumb_trail_print_styles() {
	$breadcrumb_separator = get_theme_mod( 'elementory_breadcrumb_separator', '/' );

	$style = '
		.trail-items li::after {
			content: "' . $breadcrumb_separator . '";
		}'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	$style = apply_filters( 'elementory_breadcrumb_trail_inline_style', trim( str_replace( array( "\r", "\n", "\t", '  ' ), '', $style ) ) );

	if ( $style ) {
		echo "\n" . '<style type="text/css" id="breadcrumb-trail-css">' . $style . '</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'wp_head', 'elementory_breadcrumb_trail_print_styles' );

/**
 * Pagination for archive.
 */
function elementory_render_posts_pagination() {
	$is_pagination_enabled = get_theme_mod( 'elementory_enable_pagination', true );
	if ( $is_pagination_enabled ) {
		$pagination_type = get_theme_mod( 'elementory_pagination_type', 'default' );
		if ( 'default' === $pagination_type ) :
			the_posts_navigation();
		else :
			the_posts_pagination();
		endif;
	}
}
add_action( 'elementory_posts_pagination', 'elementory_render_posts_pagination', 10 );

/**
 * Pagination for single post.
 */
function elementory_render_post_navigation() {
	the_post_navigation(
		array(
			'prev_text' => '<span>&#10229;</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-title">%title</span> <span>&#10230;</span>',
		)
	);
}
add_action( 'elementory_post_navigation', 'elementory_render_post_navigation' );

/**
 * Adds footer copyright text.
 */
function elementory_output_footer_copyright_content() {
	$theme_data = wp_get_theme();
	$search     = array( '[the-year]', '[site-link]' );
	$replace    = array( date( 'Y' ), '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );
	/* translators: 1: Year, 2: Site Title with home URL. */
	$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'elementory' ), '[the-year]', '[site-link]' );
	$copyright_text    = get_theme_mod( 'elementory_footer_copyright_text', $copyright_default );
	$copyright_text    = str_replace( $search, $replace, $copyright_text );
	$copyright_text   .= esc_html( ' | ' . $theme_data->get( 'Name' ) ) . '&nbsp;' . esc_html__( 'by', 'elementory' ) . '&nbsp;<a target="_blank" href="' . esc_url( $theme_data->get( 'AuthorURI' ) ) . '">' . esc_html( ucwords( $theme_data->get( 'Author' ) ) ) . '</a>';
	/* translators: %s: WordPress.org URL */
	$copyright_text .= sprintf( esc_html__( ' | Powered by %s', 'elementory' ), '<a href="' . esc_url( __( 'https://wordpress.org/', 'elementory' ) ) . '" target="_blank">WordPress</a>. ' );
	?>
		<span><?php echo wp_kses_post( $copyright_text ); ?></span>					
	<?php
}
add_action( 'elementory_footer_copyright', 'elementory_output_footer_copyright_content' );
