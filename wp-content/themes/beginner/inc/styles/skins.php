<?php
/**
 * Predefined skins
 *
 * @package    Beginner
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2016, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'beginner_customizer_skins' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0
 */
function beginner_customizer_skins() {

	// Predefined skins
	$skins = beginner_mod( PREFIX . 'skins' );

	// Load skin stylesheet
	wp_enqueue_style( 'beginner-skin', trailingslashit( get_template_directory_uri() ) . 'assets/css/skins/' . $skins . '.css', array(), null );

}
endif;
add_action( 'wp_enqueue_scripts', 'beginner_customizer_skins' );
