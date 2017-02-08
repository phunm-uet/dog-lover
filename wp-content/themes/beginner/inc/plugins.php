<?php
/**
 * TGM Plugin Lists
 *
 * @package    Beginner
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2016, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

// Include the TGM_Plugin_Activation class.
require trailingslashit( get_template_directory() ) . 'inc/classes/class-tgm-plugin-activation.php';

/**
 * Register required and recommended plugins.
 *
 * @since  1.0.0
 */
function beginner_register_plugins() {

	$plugins = array(

		array(
			'name' => 'TJ Deals',
			'slug' => 'theme-junkie-deals',
			'source' => trailingslashit( get_template_directory() ) . 'inc/plugins/theme-junkie-deals.zip',
			'required' => false
		),

		array(
			'name'     => 'TJ Shortcodes',
			'slug'     => 'theme-junkie-shortcodes',
			'required' => false,
		),

		array(
			'name'     => 'TJ Custom CSS',
			'slug'     => 'theme-junkie-custom-css',
			'required' => false,
		),

		array(
			'name'     => 'TJ Team Content',
			'slug'     => 'theme-junkie-team-content',
			'required' => false,
		),

		array(
			'name'     => 'Simple Page Sidebars',
			'slug'     => 'simple-page-sidebars',
			'required' => false,
		),

		array(
			'name'     => 'Ninja Forms',
			'slug'     => 'ninja-forms',
			'required' => false,
		),

		array(
			'name'     => 'Jetpack by WordPress.com',
			'slug'     => 'jetpack',
			'required' => false,
		),

		array(
			'name'     => 'WordPress SEO by Yoast',
			'slug'     => 'wordpress-seo',
			'required' => false,
		),

		array(
			'name'     => 'Polylang',
			'slug'     => 'polylang',
			'required' => false,
		)

	);

	$config = array(
		'id'           => 'tgmpa',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );

}
add_action( 'tgmpa_register', 'beginner_register_plugins' );
