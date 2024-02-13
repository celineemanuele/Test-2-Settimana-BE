<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elementory Agency
 */

?>
<?php if ( ! is_front_page() || is_home() ) { ?>
</div>
</div>
</div><!-- #content -->
	<?php
}

$footer_bg_image = get_theme_mod( 'elementory_agency_footer_bg_image', '' );
$bg_image        = '';
if ( ! empty( $footer_bg_image ) ) {
	$bg_image = 'background-image:url(' . $footer_bg_image . ');';
}

$bg_image_class = ! empty( $footer_bg_image ) ? 'has-background-image' : '';

?>

<footer id="colophon" class="site-footer <?php echo esc_attr( $bg_image_class ); ?>" style="<?php echo esc_attr( $bg_image ); ?>">
	<?php if ( is_active_sidebar( 'footer-widget' ) || is_active_sidebar( 'footer-widget-2' ) || is_active_sidebar( 'footer-widget-3' ) ) : ?>
	<div class="site-footer-top">
		<div class="ascendoor-wrapper">
			<?php
			$column_layout = get_theme_mod( 'elementory_agency_footer_widgets_column_layout', 'four-column' );
			if ( $column_layout === 'four-column' ) {
				$count = 4;
			} elseif ( $column_layout === 'three-column-1' || $column_layout === 'three-column-2' || $column_layout === 'three-column-3' ) {
				$count = 3;
			}
			?>
			<div class="footer-widgets-wrapper <?php echo esc_attr( $column_layout ); ?>"> 
				<?php for ( $i = 1; $i <= $count; $i++ ) { ?>
					<div class="footer-widget-single">
						<?php dynamic_sidebar( 'footer-widget-' . $i ); ?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div><!-- .footer-top -->
	<?php endif; ?>
	<div class="site-footer-bottom">
		<div class="ascendoor-wrapper">
			<div class="site-footer-bottom-wrapper style-2">
				<div class="site-info">
					<?php
						/**
						 * Hook: elementory_footer_copyright.
						 *
						 * @hooked - elementory_output_footer_copyright_content - 10
						 */
						do_action( 'elementory_footer_copyright' );
					?>
				</div><!-- .site-info -->
				<div class="social-icons">
					<?php
					if ( has_nav_menu( 'social' ) ) {
						wp_nav_menu(
							array(
								'menu_class'     => 'menu social-links',
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>',
								'theme_location' => 'social',
							)
						);
					}
					?>
				</div>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->

<?php
$is_scroll_top_active = get_theme_mod( 'elementory_scroll_top', true );
if ( $is_scroll_top_active ) :
	?>
	<a href="#" id="scroll-to-top" class="magazine-scroll-to-top"><i class="fas fa-chevron-up"></i></a>
	<?php
endif;
?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
