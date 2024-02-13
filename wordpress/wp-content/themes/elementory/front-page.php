<?php

get_header();

if ( is_front_page() && is_home() ) {

	require get_template_directory() . '/home.php';

}

get_footer();
