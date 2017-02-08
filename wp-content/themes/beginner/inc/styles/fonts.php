<?php
/**
 * Fonts
 *
 * @package    Beginner
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2016, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'beginner_customizer_fonts' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0
 */
function beginner_customizer_fonts() {

	// Primary font
	$text  = beginner_mod( PREFIX . 'primary-font' );
	$stack = customizer_library_get_font_stack( $text );

	if ( $text !== customizer_library_get_default( PREFIX . 'primary-font' ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'body',
				'.entry-summary',
				'.entry-content'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );
	}

	// Secondary font
	$heading = beginner_mod( PREFIX . 'secondary-font' );
	$stack   = customizer_library_get_font_stack( $heading );

	if ( $heading !== customizer_library_get_default( PREFIX . 'secondary-font' ) ) {

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'h1',
				'h2',
				'h3',
				'h4',
				'h5',
				'h6',
				'#primary-nav ul li a',
				'#secondary-nav ul li a',
				'.widget_posts_thumbnail a',
				'.more-link a',
				'#site-bottom',
				'.single .entry-tags a',
				'.page .entry-tags a',
				'button',
				'#respond #commentform .btn',
				'input[type="submit"]'
			),
			'declarations' => array(
				'font-family' => $stack
			)
		) );
	}

}
endif;
add_action( 'beginner_customizer_library_styles', 'beginner_customizer_fonts' );

if ( ! function_exists( 'beginner_enqueue_fonts' ) ) :
/**
 * Enqueue Google Fonts
 *
 * @since  1.0.0
 */
function beginner_enqueue_fonts() {

	// Font options
	$fonts = array(
		beginner_mod( PREFIX . 'primary-font' ),
		beginner_mod( PREFIX . 'secondary-font' )
	);

	$font_uri = customizer_library_get_google_font_uri( $fonts );

	// Load Google Fonts
	wp_enqueue_style( 'beginner-custom-fonts', $font_uri, array(), null );

}
endif;
add_action( 'wp_enqueue_scripts', 'beginner_enqueue_fonts' );
