<?php
/**
 * Genesis Sample.
 *
 * This file adds functions to the Genesis Sample Theme.
 *
 * @package Genesis Sample
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://www.studiopress.com/
 */

add_action( 'genesis_meta', 'cgwp_home_genesis_meta' );
/**
 * Add widget support for the front page. If no widgets active, display the default loop.
 *
 * @since 2.3.1
 */

function cgwp_home_genesis_meta() {

	if ( is_active_sidebar( 'home-slider' ) || is_active_sidebar( 'home-top' ) || is_active_sidebar( 'home-cta' ) || is_active_sidebar( 'home-middle' ) ) {

		remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_action( 'genesis_loop', 'cgwp_home_sections' );
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
		add_filter( 'body_class', 'cgwp_add_home_body_class' );

	}

}

// Widget areas to output on the front page.
function cgwp_home_sections() {

	echo '<h2 class="screen-reader-text">' . __( 'Main Content', 'genesis-sample' ) . '</h2>';

	genesis_widget_area( 'home-slider', array(
		'before' => '<div class="home-slider widget-area">',
		'after'  => '</div>',
	) );

	genesis_widget_area( 'home-top', array(
		'before' => '<div class="home-top widget-area">',
		'after'  => '</div>',
	) );

	genesis_widget_area( 'home-cta', array(
		'before' => '<div class="home-cta widget-area">',
		'after'  => '</div>',
	) );

	genesis_widget_area( 'home-middle', array(
		'before' => '<div class="home-middle widget-area">',
		'after'  => '</div>',
	) );

}

// Add body class to home page.
function cgwp_add_home_body_class( $classes ) {

	$classes[] = 'genesis-sample-home';

	return $classes;

}

// Run the Genesis loop.
genesis();
