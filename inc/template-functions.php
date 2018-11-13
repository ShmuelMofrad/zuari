<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package zuari
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function zuari_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'zuari_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function zuari_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'zuari_pingback_header' );

/**
 * Detect what type of blog post this is, options could be:
 *  1. Essay
 *  2. Note
 *  3. Status
 *  4. Photo
 */
function zuari_post_type_discovery() {
	if (
			has_post_thumbnail() &&
			get_the_content() === ""
	) {
		return 'photo';
	}

	if (
		get_the_content() === '' &&
		get_the_title() !== ''
	) {
		return 'status';
	}

	if (
		get_the_content() !== '' &&
		get_the_title() === ''
	) {
		return 'note';
	}

	return get_post_type();
}
