<?php
/**
 * Enqueue scripts and styles.
 *
 * @package    Beginner
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2016, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Loads the theme styles & scripts.
 *
 * @since 1.0.0
 * @link  http://codex.wordpress.org/Function_Reference/wp_enqueue_script
 * @link  http://codex.wordpress.org/Function_Reference/wp_enqueue_style
 */
function beginner_enqueue() {

	// Load plugins stylesheet
	wp_enqueue_style( 'beginner-plugins-style', trailingslashit( get_template_directory_uri() ) . 'assets/css/plugins.min.css' );

	// if WP_DEBUG and/or SCRIPT_DEBUG turned on, load the unminified styles & script.
	if ( ! is_child_theme() && WP_DEBUG || SCRIPT_DEBUG ) {

		// Load main stylesheet
		wp_enqueue_style( 'beginner-style', get_stylesheet_uri() );

		// Load custom js plugins.
		wp_enqueue_script( 'beginner-plugins', trailingslashit( get_template_directory_uri() ) . 'assets/js/plugins.min.js', array( 'jquery' ), null, true );

		// Load custom js methods.
		wp_enqueue_script( 'beginner-main', trailingslashit( get_template_directory_uri() ) . 'assets/js/main.js', array( 'jquery' ), null, true );

	} else {

		// Load main stylesheet
		wp_enqueue_style( 'beginner-style', trailingslashit( get_template_directory_uri() ) . 'style.min.css' );

		// Load custom js plugins.
		wp_enqueue_script( 'beginner-scripts', trailingslashit( get_template_directory_uri() ) . 'assets/js/beginner.min.js', array( 'jquery' ), null, true );

	}

	// If child theme is active, load the stylesheet.
	if ( is_child_theme() ) {
		wp_enqueue_style( 'beginner-child-style', get_stylesheet_uri() );
	}

	// Load comment-reply script.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Loads HTML5 Shiv
	wp_enqueue_script( 'beginner-html5', trailingslashit( get_template_directory_uri() ) . 'assets/js/html5shiv.min.js', array( 'jquery' ), null, false );
	wp_script_add_data( 'beginner-html5', 'conditional', 'lte IE 9' );

}
add_action( 'wp_enqueue_scripts', 'beginner_enqueue' );

/**
 * js / no-js script.
 *
 * @copyright http://www.paulirish.com/2009/avoiding-the-fouc-v3/
 * @since  1.0.0
 */
function beginner_no_js_script() {
?>
<script>document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/,'js');</script>
<?php
}
add_action( 'wp_head', 'beginner_no_js_script', 20 );
