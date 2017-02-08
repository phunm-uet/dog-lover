<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package    Beginner
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2016, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Jetpack setup
 *
 * @since  1.0.0
 */
function beginner_jetpack_setup() {

	/**
	 * Add theme support for Infinite Scroll.
	 * See: http://jetpack.me/support/infinite-scroll/
	 */
	add_theme_support( 'infinite-scroll', array(
		'container'      => 'main',
		'footer_widgets' => array(
			'footer-one',
			'footer-two',
			'footer-three',
			'footer-four',
		),
		'footer'         => 'page',
	) );

	/**
	 * Add theme support for Responsive Videos.
	 */
	add_theme_support( 'jetpack-responsive-videos' );

}
add_action( 'after_setup_theme', 'beginner_jetpack_setup' );

/**
 * Remove sharedaddy from excerpt.
 *
 * @since  1.0.0
 */
function beginner_remove_sharedaddy() {
	remove_filter( 'the_content', 'sharing_display', 19 );
	remove_filter( 'the_excerpt', 'sharing_display', 19 );
	if ( class_exists( 'Jetpack_Likes' ) ) {
		remove_filter( 'the_content', array( Jetpack_Likes::init(), 'post_likes' ), 30, 1 );
	}
}
add_action( 'loop_start', 'beginner_remove_sharedaddy' );