<?php
/**
 * Header color
 *
 * @package    Beginner
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2016, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'beginner_customizer_header_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0
 */
function beginner_customizer_header_styles() {


	// Header Background Color
	$header = beginner_mod( PREFIX . 'header-color' );

	if ( $header !== customizer_library_get_default( PREFIX . 'header-color' ) ) {

		$color = sanitize_hex_color( $header );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#masthead'
			),
			'declarations' => array(
				'background-color' => $color
			)
		) );
	}

	// Site title color
	$title = beginner_mod( PREFIX . 'site-title-color' );

	if ( $title !== customizer_library_get_default( PREFIX . 'site-title-color' ) ) {

		$color = sanitize_hex_color( $title );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#masthead .site-title a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

}
endif;
add_action( 'beginner_customizer_library_styles', 'beginner_customizer_header_styles' );