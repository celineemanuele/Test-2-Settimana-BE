<?php

// Trending Posts Carousel Widgets.
require get_template_directory() . '/inc/widgets/trending-posts-carousel-widget.php';

// Author Info Widget.
require get_template_directory() . '/inc/widgets/info-author-widget.php';

// Social Icons Widget.
require get_template_directory() . '/inc/widgets/social-icons-widget.php';

/**
 * Register Widgets
 */
function elementory_register_widgets() {

	register_widget( 'Elementory_Trending_Posts_Carousel_Widget' );

	register_widget( 'Elementory_Author_Info_Widget' );

	register_widget( 'Elementory_Social_Icons_Widget' );

}
add_action( 'widgets_init', 'elementory_register_widgets' );
