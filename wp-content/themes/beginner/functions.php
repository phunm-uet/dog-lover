<?php
/**
 * Theme functions file
 *
 * Contains all of the Theme's setup functions, custom functions,
 * custom hooks and Theme settings.
 *
 * @package    Beginner
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2016, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Define Theme Prefix
 */
define( 'PREFIX', 'beginner-' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 700; /* pixels */
}

/**
 * Set new content width if user uses 1 column layout.
 */
function beginner_content_width() {
	global $content_width;

	if ( in_array( get_theme_mod( 'theme_layout' ), array( '1c' ) ) ) {
		$content_width = 1060;
	}
}
add_action( 'template_redirect', 'beginner_content_width' );

if ( ! function_exists( 'beginner_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since  1.0.0
 */
function beginner_theme_setup() {

	// Make the theme available for translation.
	load_theme_textdomain( 'beginner', trailingslashit( get_template_directory() ) . 'languages' );

	// Add custom stylesheet file to the TinyMCE visual editor.
	add_editor_style( array( 'assets/css/editor-style.css', beginner_fonts_url() ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails.
	add_theme_support( 'post-thumbnails' );

	// used for Featured
	set_post_thumbnail_size( 500, 285, true );

	// Declare image sizes.
	add_image_size( 'beginner-megamenu-posts', 245, 150, true );

	// Register custom navigation menu.
	register_nav_menus(
		array(
			'primary'   => __( 'Primary Location', 'beginner' ),
			'secondary' => __( 'Secondary Location' , 'beginner' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-list', 'search-form', 'comment-form', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See: http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'image', 'gallery', 'link', 'quote', 'video'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'beginner_custom_background_args', array(
		'default-color' => 'ffffff'
	) ) );

	// Enable theme-layouts extensions.
	add_theme_support( 'theme-layouts',
		array(
			'1c'   => __( '1 Column Wide (Full Width)', 'beginner' ),
			'2c-l' => __( '2 Columns: Content / Sidebar', 'beginner' ),
			'2c-r' => __( '2 Columns: Sidebar / Content', 'beginner' )
		),
		array( 'customize' => true, 'default' => '2c-l' )
	);

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );

}
endif; // beginner_theme_setup
add_action( 'after_setup_theme', 'beginner_theme_setup' );

if ( ! function_exists( 'beginner_reset_default_image_sizes' ) ) :
/**
 * Re-set default image sizes
 *
 * @since  1.0.0
 */
function beginner_reset_default_image_sizes() {
	// 'large' size: full width
	update_option( 'large_size_w', 1020 );
	update_option( 'large_size_h', 570 );
	update_option( 'large_crop', 1 );

	// 'medium_large' size: blog archive/single
	update_option( 'medium_large_size_w', 680 );
	update_option( 'medium_large_size_h', 380 );
	update_option( 'medium_large_crop', 1 );

	// 'medium' size: related | featured deals | archive deals
	update_option( 'medium_size_w', 326 );
	update_option( 'medium_size_h', 206 );
	update_option( 'medium_crop', 1 );

	// 'thumbnail' size: widgets | author box
	update_option( 'thumbnail_size_w', 96 );
	update_option( 'thumbnail_size_h', 96 );
	update_option( 'thumbnail_crop', 1 );
}
endif;
add_action( 'after_switch_theme', 'beginner_reset_default_image_sizes' );

/**
 * Registers custom widgets.
 *
 * @since 1.0.0
 * @link  http://codex.wordpress.org/Function_Reference/register_widget
 */
function beginner_widgets_init() {

	// Register ad widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-ads.php';
	register_widget( 'Beginner_Ads_Widget' );

	// Register ads 125 widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-ads125.php';
	register_widget( 'Beginner_Ads125_Widget' );

	// Register Facebook widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-facebook.php';
	register_widget( 'Beginner_Facebook_Widget' );

	// Register feedburner widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-feedburner.php';
	register_widget( 'Beginner_Feedburner_Widget' );

	// Register recent posts thumbnail widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-recent.php';
	register_widget( 'Beginner_Recent_Widget' );

	// Register popular posts thumbnail widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-popular.php';
	register_widget( 'Beginner_Popular_Widget' );

	// Register random posts thumbnail widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-random.php';
	register_widget( 'Beginner_Random_Widget' );

	// Register most views posts thumbnail widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-views.php';
	register_widget( 'Beginner_Views_Widget' );

	// Register tabs widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-tabs.php';
	register_widget( 'Beginner_Tabs_Widget' );

	// Register twitter widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-twitter.php';
	register_widget( 'Beginner_Twitter_Widget' );

	// Register video widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-video.php';
	register_widget( 'Beginner_Video_Widget' );

	// Register social widget.
	require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-social.php';
	register_widget( 'Beginner_Social_Widget' );

}
add_action( 'widgets_init', 'beginner_widgets_init' );

/**
 * Registers widget areas and custom widgets.
 *
 * @since 1.0.0
 * @link  http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function beginner_sidebars_init() {

	register_sidebar(
		array(
			'name'          => __( 'Primary Sidebar', 'beginner' ),
			'id'            => 'primary',
			'description'   => __( 'Main sidebar that appears on the right/left of content.', 'beginner' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Column 1', 'beginner' ),
			'id'            => 'footer-1',
			'description'   => __( 'The footer widget area 1st column.', 'beginner' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Column 2', 'beginner' ),
			'id'            => 'footer-2',
			'description'   => __( 'The footer widget area 2nd column.', 'beginner' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Column 3', 'beginner' ),
			'id'            => 'footer-3',
			'description'   => __( 'The footer widget area 3rd column.', 'beginner' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer Column 4', 'beginner' ),
			'id'            => 'footer-4',
			'description'   => __( 'The footer widget area 4th column.', 'beginner' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	if ( is_tjdeals_activated() ) {
		register_sidebar(
			array(
				'name'          => __( 'Deal Sidebar', 'beginner' ),
				'id'            => 'deal',
				'description'   => __( 'Main sidebar that appears on the right/left of Deals pages.', 'beginner' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			)
		);
	}


}
add_action( 'widgets_init', 'beginner_sidebars_init' );

/**
 * Register Google fonts.
 *
 * @since  1.0.0
 * @return string
 */
function beginner_fonts_url() {

	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Merriweather, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'beginner' ) ) {
		$fonts[] = 'Merriweather:400,400italic,300italic,300,700,700italic';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Droid Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Droid Sans font: on or off', 'beginner' ) ) {
		$fonts[] = 'Droid Sans:400,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'beginner' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}

if ( ! function_exists( 'is_polylang_activated' ) ) :
/**
 * Query Polylang activation
 *
 * @since  1.0.0
 */
function is_polylang_activated() {
	return function_exists( 'pll_the_languages' ) ? true : false;
}
endif;

if ( ! function_exists( 'is_tjdeals_activated' ) ) :
/**
 * Query WooCommerce activation
 *
 * @since  1.0.0
 */
function is_tjdeals_activated() {
	return class_exists( 'Tj_Deals' ) ? true : false;
}
endif;

/**
 * Custom template tags for this theme.
 */
require trailingslashit( get_template_directory() ) . 'inc/template-tags.php';

/**
 * Enqueue scripts and styles.
 */
require trailingslashit( get_template_directory() ) . 'inc/scripts.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require trailingslashit( get_template_directory() ) . 'inc/extras.php';

/**
 * Require and recommended plugins list.
 */
require trailingslashit( get_template_directory() ) . 'inc/plugins.php';

/**
 * Customizer.
 */
require trailingslashit( get_template_directory() ) . 'admin/customizer-library.php';
require trailingslashit( get_template_directory() ) . 'admin/functions.php';

/**
 * Customizer functions.
 */
require trailingslashit( get_template_directory() ) . 'inc/customizer.php';
require trailingslashit( get_template_directory() ) . 'inc/mods.php';

/**
 * Mega menus walker.
 */
require trailingslashit( get_template_directory() ) . 'inc/megamenus/init.php';
require trailingslashit( get_template_directory() ) . 'inc/megamenus/class-primary-nav-walker.php';

/**
 * We use some part of Hybrid Core to extends our themes.
 *
 * @link  http://themehybrid.com/hybrid-core Hybrid Core site.
 */
require trailingslashit( get_template_directory() ) . 'inc/hybrid/attr.php';
require trailingslashit( get_template_directory() ) . 'inc/hybrid/breadcrumb-trail.php';
require trailingslashit( get_template_directory() ) . 'inc/hybrid/theme-layouts.php';
require trailingslashit( get_template_directory() ) . 'inc/hybrid/entry-views.php';
require trailingslashit( get_template_directory() ) . 'inc/hybrid/hybrid-media-grabber.php';
require trailingslashit( get_template_directory() ) . 'inc/hybrid/context.php';

/**
 * Load Jetpack compatibility file.
 */
require trailingslashit( get_template_directory() ) . 'inc/jetpack.php';

/**
 * Load Polylang compatibility file.
 */
if ( ( function_exists( 'is_polylang_activated' ) && ( is_polylang_activated() ) ) ) {
	require trailingslashit( get_template_directory() ) . 'inc/polylang.php';
}
