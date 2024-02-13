<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elementory
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site ascendoor-site-wrapper">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'elementory' ); ?></a>
		<div id="loader">
			<div class="loader-container">
				<div id="preloader"  class="loader-1"><div class="dot"></div></div>
			</div>
		</div><!-- #loader -->
		
		<?php
		$contact_number = get_theme_mod( 'elementory_contact_number', '' );
		$email_address  = get_theme_mod( 'elementory_email_address', '' );
		$button_label   = get_theme_mod( 'elementory_header_button_label', '' );
		$button_url     = get_theme_mod( 'elementory_header_button_link', '' );
		?>
		<header id="masthead" class="site-header header-style-2">
			<div class="top-header-part">
				<div class="ascendoor-wrapper">
					<div class="top-header-wrapper">
						<div class="top-header-left">
							<div class="top-header-contact">
								<?php if ( ! empty( $contact_number ) ) : ?>
									<span class="contact-details">
										<i class="fas fa-phone-alt"></i>
										<span class="contact-no">
											<a href="tel:<?php echo esc_attr( $contact_number ); ?>"><?php echo esc_html( $contact_number ); ?></a>
										</span>
									</span>
								<?php endif; ?>
								<?php if ( ! empty( $email_address ) ) : ?>
									<span class="contact-details">
										<i class="fas fa-envelope"></i>
										<span class="email">
											<a href="mailto:<?php echo esc_attr( $email_address ); ?>"><?php echo esc_html( $email_address ); ?></a>
										</span>
									</span>
								<?php endif; ?>
							</div>
						</div>
						<div class="top-header-right">
							<div class="social-icons">
								<?php
								if ( has_nav_menu( 'social' ) ) {
									wp_nav_menu(
										array(
											'menu_class'  => 'menu social-links',
											'link_before' => '<span class="screen-reader-text">',
											'link_after'  => '</span>',
											'theme_location' => 'social',
										)
									);
								}
								?>
							</div>
							<div class="header-search">
								<div class="header-search-wrap">
									<a href="#" title="Search" class="header-search-icon">
										<i class="fa fa-search"></i>
									</a>
									<div class="header-search-form">
										<?php get_search_form(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="bottom-header-part">
				<div class="ascendoor-wrapper">
					<div class="bottom-header-wrapper">
						<div class="site-branding">
							<?php if ( has_custom_logo() ) { ?>
								<div class="site-logo">
									<?php the_custom_logo(); ?>
								</div>
							<?php } ?>
							<div class="site-identity">
								<?php
								if ( is_front_page() && is_home() ) :
									?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php
								else :
									?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
									<?php
								endif;
								$elementory_description = get_bloginfo( 'description', 'display' );
								if ( $elementory_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo esc_html( $elementory_description ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
									<?php
								endif;
								?>
							</div>
						</div><!-- .site-branding -->
						<div class="navigation-part">
							<nav id="site-navigation" class="main-navigation">
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
									<span></span>
									<span></span>
									<span></span>
								</button>
								<div class="main-navigation-links">
									<?php
									if ( has_nav_menu( 'primary' ) ) {
										wp_nav_menu(
											array(
												'theme_location' => 'primary',
											)
										);
									}
									?>
								</div>
							</nav><!-- #site-navigation -->
							<?php if ( ! empty( $button_label ) ) : ?>
								<div class="header-custom-button">
									<a class="ascendoor-button" href="<?php echo esc_url( $button_url ); ?>"><?php echo esc_html( $button_label ); ?></a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</header><!-- #masthead -->

	<?php

	if ( ! is_front_page() || is_home() ) {

		?>
		<div id="content" class="site-content">
			<div class="ascendoor-wrapper">
				<div class="ascendoor-page">
				<?php } ?>
