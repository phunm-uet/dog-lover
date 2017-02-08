<?php
/**
 * Custom function to display data set in customizer.
 *
 * @package    Beginner
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2016, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Loads custom style set in customizer
 */
require trailingslashit( get_template_directory() ) . 'inc/styles/header.php';
require trailingslashit( get_template_directory() ) . 'inc/styles/fonts.php';
require trailingslashit( get_template_directory() ) . 'inc/styles/skins.php';

if ( ! function_exists( 'beginner_customizer_styles' ) ) :
/**
 * Generates the style tag and CSS needed for the theme options.
 *
 * By using the "Customizer_Library_Styles" filter, different components can print CSS in the header.
 * It is organized this way to ensure there is only one "style" tag.
 *
 * @since  1.0.0
 */
function beginner_customizer_styles() {

	// Action to add the custom styles.
	do_action( 'beginner_customizer_library_styles' );

	// Echo the rules
	$css = Customizer_Library_Styles()->build();

	if ( ! empty( $css ) ) {
		echo "\n<!-- Begin Custom CSS -->\n<style type=\"text/css\" id=\"custom-css\">\n";
		echo $css;
		echo "\n</style>\n<!-- End Custom CSS -->\n";
	}

}
endif;
add_action( 'wp_head', 'beginner_customizer_styles', 11 );

if ( ! function_exists( 'beginner_custom_feed_url' ) ) :
/**
 * Custom RSS feed url.
 *
 * @since  1.0.0
 */
function beginner_custom_feed_url( $output, $feed ) {

	// Get the custom rss feed url
	$url = beginner_mod( PREFIX . 'custom-rss' );

	// Do not redirect comments feed
	if ( strpos( $output, 'comments' ) ) {
		return $output;
	}

	// Check the settings.
	if ( ! empty( $url ) ) {
		$output = esc_url( $url );
	}

	return $output;
}
endif;
add_filter( 'feed_link', 'beginner_custom_feed_url', 10, 2 );

/**
 * Display the custom header.
 *
 * @since  1.0.0
 */
function beginner_custom_header() {

	// Get the custom header.
	$header = get_header_image();

	// Display the custom header via inline CSS.
	if ( $header ) :
		$header_css = '
			.site-branding {
				background-image: url("' . esc_url( $header ) . '");
				background-repeat: no-repeat;
				background-position: center;
				background-size: cover;
			}';
	endif;

	if ( ! empty( $header_css ) ) :
		wp_add_inline_style( 'beginner-style', $header_css );
	endif;

}
add_action( 'wp_enqueue_scripts', 'beginner_custom_header' );


if ( ! function_exists( 'beginner_post_ads_before' ) ) :
/**
 * Single post advertisement.
 * Before content.
 *
 * @since  1.0.0
 */
function beginner_post_ads_before( $content ) {

	// Set up empty variable
	$ads = '';

	// Get the ads data set in customizer
	$img    = beginner_mod( PREFIX . 'post-ads-image-before' );
	$url    = beginner_mod( PREFIX . 'post-ads-url-before' );
	$custom = beginner_mod( PREFIX . 'post-ads-custom-before' );

	// Set up our ads.
	if ( $img || $url || $custom ) {
		$ads = '<div class="post-ads-before post-ads" style="margin-bottom: 20px;">';
			if ( $custom ) {
				$ads .= stripslashes( $custom );
			} else {
				$ads .= '<a href="' . esc_url( $url ) . '"><img src="' . esc_url( wp_get_attachment_url( $img ) ) . '" /></a>';
			}
		$ads .= '</div>';
	}

	// Display the ads before content
	if ( ! empty( $ads ) && is_single() ) {
		$content = $ads . $content;
	} else {
		$content;
	}

	return $content;

}
endif;
add_filter( 'the_content', 'beginner_post_ads_before', 20 );

if ( ! function_exists( 'beginner_post_ads_after' ) ) :
/**
 * Single post advertisement.
 * After content.
 *
 * @since  1.0.0
 */
function beginner_post_ads_after( $content ) {

	// Set up empty variable
	$ads = '';

	// Get the ads data set in customizer
	$img    = beginner_mod( PREFIX . 'post-ads-image-after' );
	$url    = beginner_mod( PREFIX . 'post-ads-url-after' );
	$custom = beginner_mod( PREFIX . 'post-ads-custom-after' );

	// Set up our ads.
	if ( $img || $url || $custom ) {
		$ads = '<div class="post-ads-after post-ads" style="margin-top: 20px;">';
			if ( $custom ) {
				$ads .= stripslashes( $custom );
			} else {
				$ads .= '<a href="' . esc_url( $url ) . '"><img src="' . esc_url( wp_get_attachment_url( $img ) ) . '" /></a>';
			}
		$ads .= '</div>';
	}

	// Display the ads before content
	if ( ! empty( $ads ) && is_single() ) {
		$content = $content . $ads;
	} else {
		$content;
	}

	return $content;

}
endif;
add_filter( 'the_content', 'beginner_post_ads_after', 20 );

if ( ! function_exists( 'beginner_header_ads' ) ) :
/**
 * Prints the advertisement data set in customizer.
 *
 * @since  1.0.0
 */
function beginner_header_ads() {

	// Get the ads data set in customizer
	$img    = beginner_mod( PREFIX . 'header-ads-image' );
	$url    = beginner_mod( PREFIX . 'header-ads-url' );
	$custom = beginner_mod( PREFIX . 'header-ads-custom' );

	// Display the data
	if ( $img || $url || $custom ) {
		echo '<div class="header-ad">';
			if ( $custom ) {
				echo stripslashes( $custom );
			} else {
				echo '<a href="' . esc_url( $url ) . '"><img src="' . esc_url( wp_get_attachment_url( $img ) ) . '" /></a>';
			}
		echo '</div>';
	}

}
endif;
