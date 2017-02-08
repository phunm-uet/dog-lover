<?php
/**
 * Register custom customizer panels, sections and settings.
 *
 * @package    Beginner
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2016, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * We register our custom customizer by using the hook.
 *
 * @since  1.0.0
 */
function beginner_customizer_register() {

	// Stores all the controls that will be added
	$options = array();

	// Stores all the sections to be added
	$sections = array();

	// Stores all the panels to be added
	$panels = array();

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// ======= Start Customizer Panels/Sections/Settings ======= //

	// General Panels and Sections
	$general_panel = 'general';

	$panels[] = array(
		'id'          => $general_panel,
		'title'       => __( 'General', 'beginner' ),
		'description' => __( 'This panel is used for managing general section of your site.', 'beginner' ),
		'priority'    => 10
	);

		// RSS
		$section = PREFIX . 'rss-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'RSS', 'beginner' ),
			'priority'    => 100,
			'panel'       => $general_panel,
			'description' => __( 'If you fill the custom rss url below, it will replace the default.', 'beginner' ),
		);
		$options[PREFIX . 'custom-rss'] = array(
			'id'           => PREFIX . 'custom-rss',
			'label'        => __( 'Custom RSS URL (eg. Feedburner)', 'beginner' ),
			'section'      => $section,
			'type'         => 'url',
			'default'      => ''
		);

		// Comment
		$section = PREFIX . 'comment-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Comments', 'beginner' ),
			'priority'    => 110,
			'panel'       => $general_panel,
		);
		$options[PREFIX . 'page-comment'] = array(
			'id'           => PREFIX . 'page-comment',
			'label'        => __( 'Page Comment', 'beginner' ),
			'section'      => $section,
			'type'         => 'switch',
			'default'      => 1
		);

		// Post Date Style
		$section = PREFIX . 'date-style-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Post Date', 'beginner' ),
			'priority'    => 115,
			'panel'       => $general_panel
		);
		$options[PREFIX . 'post-date-style'] = array(
			'id'          => PREFIX . 'post-date-style',
			'label'       => __( 'Style', 'beginner' ),
			'section'     => $section,
			'type'        => 'select',
			'default'     => 'absolute',
			'choices'     => array(
				'absolute' => __( 'Absolute (June 20, 2015 10:19 am)', 'beginner' ),
				'relative' => __( 'Relative (1 week ago)', 'beginner' )
			)
		);
		$options[PREFIX . 'post-date-type'] = array(
			'id'          => PREFIX . 'post-date-type',
			'label'       => __( 'Type', 'beginner' ),
			'section'     => $section,
			'type'        => 'select',
			'default'     => 'published',
			'choices'     => array(
				'published' => __( 'Published Date', 'beginner' ),
				'modified'  => __( 'Modified Date', 'beginner' )
			)
		);

		// Social header
		$section = PREFIX . 'social-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Social', 'beginner' ),
			'priority'    => 130,
			'panel'       => $general_panel
		);
		$options[PREFIX . 'twitter'] = array(
			'id'      => PREFIX . 'twitter',
			'label'   => __( 'Twitter URL', 'beginner' ),
			'section' => $section,
			'type'    => 'url',
			'default' => ''
		);
		$options[PREFIX . 'facebook'] = array(
			'id'      => PREFIX . 'facebook',
			'label'   => __( 'Facebook URL', 'beginner' ),
			'section' => $section,
			'type'    => 'url',
			'default' => ''
		);
		$options[PREFIX . 'gplus'] = array(
			'id'      => PREFIX . 'gplus',
			'label'   => __( 'Google Plus URL', 'beginner' ),
			'section' => $section,
			'type'    => 'url',
			'default' => ''
		);
		$options[PREFIX . 'instagram'] = array(
			'id'      => PREFIX . 'instagram',
			'label'   => __( 'Instagram URL', 'beginner' ),
			'section' => $section,
			'type'    => 'url',
			'default' => ''
		);
		$options[PREFIX . 'pinterest'] = array(
			'id'      => PREFIX . 'pinterest',
			'label'   => __( 'Pinterest URL', 'beginner' ),
			'section' => $section,
			'type'    => 'url',
			'default' => ''
		);
		$options[PREFIX . 'linkedin'] = array(
			'id'      => PREFIX . 'linkedin',
			'label'   => __( 'LinkedIn URL', 'beginner' ),
			'section' => $section,
			'type'    => 'url',
			'default' => ''
		);
		$options[PREFIX . 'tumblr'] = array(
			'id'      => PREFIX . 'tumblr',
			'label'   => __( 'Tumblr URL', 'beginner' ),
			'section' => $section,
			'type'    => 'url',
			'default' => ''
		);
		$options[PREFIX . 'rss'] = array(
			'id'      => PREFIX . 'rss',
			'label'   => __( 'RSS URL', 'beginner' ),
			'section' => $section,
			'type'    => 'url',
			'default' => ''
		);

		// Newsletter scriont
		$section = PREFIX . 'newsletter-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Newsletter', 'beginner' ),
			'priority'    => 135,
			'panel'       => $general_panel,
		);
		$options[PREFIX . 'newsletter-heading'] = array(
			'id'      => PREFIX . 'newsletter-heading',
			'label'   => __( 'Heading', 'beginner' ),
			'section' => $section,
			'type'    => 'text',
			'default' => __( 'Download your Free E-Book', 'beginner' )
		);
		$options[PREFIX . 'newsletter-title'] = array(
			'id'      => PREFIX . 'newsletter-title',
			'label'   => __( 'Title', 'beginner' ),
			'section' => $section,
			'type'    => 'text',
			'default' => __( 'Sign Up Today for Free!', 'beginner' )
		);
		$options[PREFIX . 'newsletter-desc'] = array(
			'id'      => PREFIX . 'newsletter-desc',
			'label'   => __( 'Description', 'beginner' ),
			'section' => $section,
			'type'    => 'text',
			'default' => __( 'Subscribe to our mailing list and get useful stuff and updates to your email inbox', 'beginner' )
		);
		$options[PREFIX . 'newsletter-type'] = array(
			'id'      => PREFIX . 'newsletter-type',
			'label'   => __( 'Newsletter Type', 'beginner' ),
			'section' => $section,
			'type'    => 'radio',
			'choices' => array(
				'feedburner' => __( 'FeedBurner', 'beginner' ),
				'custom'     => __( 'Custom Code', 'beginner' )
			),
			'default' => 'feedburner'
		);
		$options[PREFIX . 'newsletter-feedburner'] = array(
			'id'              => PREFIX . 'newsletter-feedburner',
			'label'           => __( 'FeedBurner ID', 'beginner' ),
			'section'         => $section,
			'type'            => 'text',
			'default'         => __( 'ThemeJunkie', 'beginner' ),
			'active_callback' => 'beginner_newsletter_feedburner_callback'
		);
		$options[PREFIX . 'newsletter-form'] = array(
			'id'                => PREFIX . 'newsletter-form',
			'label'             => __( 'Newsletter Form', 'beginner' ),
			'section'           => $section,
			'type'              => 'textarea',
			'sanitize_callback' => 'beginner_textarea_stripslashes',
			'default'           => '',
			'active_callback'   => 'beginner_newsletter_custom_callback'
		);
		$options[PREFIX . 'newsletter-visibility'] = array(
			'id'          => PREFIX . 'newsletter-visibility',
			'label'       => __( 'Visibility', 'beginner' ),
			'section'     => $section,
			'type'        => 'group-title'
		);
			$options[PREFIX . 'newsletter-front'] = array(
				'id'          => PREFIX . 'newsletter-front',
				'label'       => __( 'Show on Front page', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);
			$options[PREFIX . 'newsletter-home'] = array(
				'id'          => PREFIX . 'newsletter-home',
				'label'       => __( 'Show on Home page', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);
			$options[PREFIX . 'newsletter-archive'] = array(
				'id'          => PREFIX . 'newsletter-archive',
				'label'       => __( 'Show on Archive page', 'beginner' ),
				'description' => __( 'Blog, date, month and year page.', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 0
			);
			$options[PREFIX . 'newsletter-author'] = array(
				'id'          => PREFIX . 'newsletter-author',
				'label'       => __( 'Show on Author page', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 0
			);
			$options[PREFIX . 'newsletter-category'] = array(
				'id'          => PREFIX . 'newsletter-category',
				'label'       => __( 'Show on Category page', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 0
			);
			$options[PREFIX . 'newsletter-tag'] = array(
				'id'          => PREFIX . 'newsletter-tag',
				'label'       => __( 'Show on Tag page', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 0
			);
			$options[PREFIX . 'newsletter-search'] = array(
				'id'          => PREFIX . 'newsletter-search',
				'label'       => __( 'Show on Search page', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 0
			);
			$options[PREFIX . 'newsletter-404'] = array(
				'id'          => PREFIX . 'newsletter-404',
				'label'       => __( 'Show on 404 page', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 0
			);
			$options[PREFIX . 'newsletter-post'] = array(
				'id'          => PREFIX . 'newsletter-post',
				'label'       => __( 'Show on Single Post', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 0
			);
			$options[PREFIX . 'newsletter-page'] = array(
				'id'          => PREFIX . 'newsletter-page',
				'label'       => __( 'Show on Single Page', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 0
			);

		// Footer Text
		$section = PREFIX . 'footer-text-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Footer Text', 'beginner' ),
			'priority'    => 140,
			'panel'       => $general_panel,
		);
		$theme = wp_get_theme();
		$options[PREFIX . 'footer-text'] = array(
			'id'           => PREFIX . 'footer-text',
			'label'        => '',
			'description'  => __( 'Customize the footer text.', 'beginner' ),
			'section'      => $section,
			'type'         => 'textarea',
			'default'      => sprintf( __( '&copy; %1$s %2$s &middot; %3$s %4$s by %5$s', 'beginner' ),
				date( 'Y' ),
				'<a href="' . esc_url( home_url() ) . '">' . esc_attr( get_bloginfo( 'name' ) ) . '</a>',
				'<span class="themejunkie">',
				'<a href="' . esc_url( $theme->get( 'ThemeURI' ) ) . '">' . esc_attr( $theme->get( 'Name' ) ) . '</a>',
				'<a href="' . esc_url( $theme->get( 'AuthorURI' ) ) . '">' . esc_attr( $theme->get( 'Author' ) ) . '</a></span>' )
		);

	// Header Panels and Sections
	$header_panel = 'header';

	$panels[] = array(
		'id'          => $header_panel,
		'title'       => __( 'Header', 'beginner' ),
		'description' => __( 'This panel is used for managing header section of your site.', 'beginner' ),
		'priority'    => 15
	);

		// Logo
		$section = PREFIX . 'logo-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Logo', 'beginner' ),
			'priority'    => 30,
			'panel'       => $header_panel
		);
		$options[PREFIX . 'logo'] = array(
			'id'      => PREFIX . 'logo',
			'label'   => __( 'Regular Logo', 'beginner' ),
			'section' => $section,
			'type'    => 'media',
			'default' => ''
		);

		// Search icon and form
		$section = PREFIX . 'search-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Search', 'beginner' ),
			'description' => __( 'Show search icon and form', 'beginner' ),
			'priority'    => 40,
			'panel'       => $header_panel
		);
		$options[PREFIX . 'search-header'] = array(
			'id'      => PREFIX . 'search-header',
			'label'   => '',
			'section' => $section,
			'type'    => 'switch',
			'default' => 1
		);

	// Colors Panel and Sections
	$color_panel = 'color';

	$panels[] = array(
		'id'          => $color_panel,
		'title'       => __( 'Color', 'beginner' ),
		'description' => __( 'This panel is used for managing colors of your site.', 'beginner' ),
		'priority'    => 20
	);

		// Predefined color
		$section = PREFIX . 'predefined-color-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Predefined Skins', 'beginner' ),
			'priority'    => 5,
			'panel'       => $color_panel
		);
		$options[PREFIX . 'skins'] = array(
			'id'          => PREFIX . 'skins',
			'label'       => __( 'Skins', 'beginner' ),
			'section'     => $section,
			'type'        => 'radio',
			'default'     => 'default',
			'choices'     => array(
				'default' => __( 'Default', 'beginner' ),
				'green'   => __( 'Green', 'beginner' ),
				'cyan'    => __( 'Cyan', 'beginner' ),
				'magenta' => __( 'Magenta', 'beginner' ),
				'blue'    => __( 'Blue', 'beginner' ),
			)
		);

	// Typography Panel and Sections
	$typo_panel = 'typography';

	$panels[] = array(
		'id'          => $typo_panel,
		'title'       => __( 'Typography', 'beginner' ),
		'description' => __( 'This panel is used for managing typography of your site.', 'beginner' ),
		'priority'    => 30
	);

		// Global typography
		$section = PREFIX . 'global-typography';
		$font_choices = customizer_library_get_font_choices();

		$sections[] = array(
			'id'       => $section,
			'title'    => __( 'Global', 'beginner' ),
			'priority' => 5,
			'panel'    => $typo_panel
		);
		$options[PREFIX . 'primary-font'] = array(
			'id'          => PREFIX . 'primary-font',
			'label'       => __( 'Primary font', 'beginner' ),
			'section'     => $section,
			'type'        => 'select2',
			'choices'     => $font_choices,
			'default'     => 'Merriweather',
		);
		$options[PREFIX . 'secondary-font'] = array(
			'id'          => PREFIX . 'secondary-font',
			'label'       => __( 'Secondary font', 'beginner' ),
			'section'     => $section,
			'type'        => 'select2',
			'choices'     => $font_choices,
			'default'     => 'Droid Sans',
		);

	// Content Panel and Sections
	$content_panel = 'layouts';

	$panels[] = array(
		'id'          => $content_panel,
		'title'       => __( 'Layouts', 'beginner' ),
		'description' => __( 'This panel is used for managing several custom features/layouts of your site.', 'beginner' ),
		'priority'    => 35
	);

		// Featured posts
		$section = PREFIX . 'featured-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Featured Posts', 'beginner' ),
			'priority'    => 5,
			'panel'       => $content_panel
		);
		$options[PREFIX . 'featured-select'] = array(
			'id'          => PREFIX . 'featured-select',
			'label'       => __( 'Select a tag', 'beginner' ),
			'section'     => $section,
			'type'        => 'select2',
			'choices'     => beginner_tags_list()
		);
		$options[PREFIX . 'featured-num'] = array(
			'id'          => PREFIX . 'featured-num',
			'label'       => __( 'Number of posts', 'beginner' ),
			'section'     => $section,
			'type'        => 'text',
			'default'     => 4
		);
		$options[PREFIX . 'featured-orderby'] = array(
			'id'          => PREFIX . 'featured-orderby',
			'label'       => __( 'Order by', 'beginner' ),
			'section'     => $section,
			'type'        => 'select',
			'default'     => 'date',
			'choices'     => array(
				'date'  => __( 'Date', 'beginner' ),
				'rand'  => __( 'Random', 'beginner' )
			)
		);
		$options[PREFIX . 'featured-title'] = array(
			'id'          => PREFIX . 'featured-title',
			'label'       => __( 'Featured Title', 'beginner' ),
			'section'     => $section,
			'type'        => 'text',
			'default'     => __( 'Hot <span>News</span>', 'beginner' )
		);
		$options[PREFIX . 'featured-more'] = array(
			'id'          => PREFIX . 'featured-more',
			'label'       => __( 'More Text', 'beginner' ),
			'section'     => $section,
			'type'        => 'text',
			'default'     => __( 'More News', 'beginner' )
		);
		$options[PREFIX . 'featured-visibility'] = array(
			'id'          => PREFIX . 'featured-visibility',
			'label'       => __( 'Visibility', 'beginner' ),
			'section'     => $section,
			'type'        => 'group-title'
		);
			$options[PREFIX . 'featured-front'] = array(
				'id'          => PREFIX . 'featured-front',
				'label'       => __( 'Show on Front page', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);
			$options[PREFIX . 'featured-home'] = array(
				'id'          => PREFIX . 'featured-home',
				'label'       => __( 'Show on Home page', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);
			$options[PREFIX . 'featured-archive'] = array(
				'id'          => PREFIX . 'featured-archive',
				'label'       => __( 'Show on Archive page', 'beginner' ),
				'description' => __( 'Blog, date, month and year page.', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 0
			);
			$options[PREFIX . 'featured-author'] = array(
				'id'          => PREFIX . 'featured-author',
				'label'       => __( 'Show on Author page', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 0
			);
			$options[PREFIX . 'featured-category'] = array(
				'id'          => PREFIX . 'featured-category',
				'label'       => __( 'Show on Category page', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 0
			);
			$options[PREFIX . 'featured-tag'] = array(
				'id'          => PREFIX . 'featured-tag',
				'label'       => __( 'Show on Tag page', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 0
			);
			$options[PREFIX . 'featured-search'] = array(
				'id'          => PREFIX . 'featured-search',
				'label'       => __( 'Show on Search page', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 0
			);
			$options[PREFIX . 'featured-404'] = array(
				'id'          => PREFIX . 'featured-404',
				'label'       => __( 'Show on 404 page', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 0
			);
			$options[PREFIX . 'featured-post'] = array(
				'id'          => PREFIX . 'featured-post',
				'label'       => __( 'Show on Single Post', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 0
			);
			$options[PREFIX . 'featured-page'] = array(
				'id'          => PREFIX . 'featured-page',
				'label'       => __( 'Show on Single Page', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 0
			);

		// Posts
		$section = PREFIX . 'posts-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Posts', 'beginner' ),
			'description' => __( 'Posts is a single post page.', 'beginner' ),
			'priority'    => 10,
			'panel'       => $content_panel
		);
		$options[PREFIX . 'post-header-group'] = array(
			'id'          => PREFIX . 'post-header-group',
			'label'       => __( 'Post Header', 'beginner' ),
			'section'     => $section,
			'type'        => 'group-title'
		);
			$options[PREFIX . 'post-breadcrumb'] = array(
				'id'          => PREFIX . 'post-breadcrumb',
				'label'       => __( 'Show post breadcrumb', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);
			$options[PREFIX . 'post-author'] = array(
				'id'          => PREFIX . 'post-author',
				'label'       => __( 'Show post author name', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);
			$options[PREFIX . 'post-cat'] = array(
				'id'          => PREFIX . 'post-cat',
				'label'       => __( 'Show post categories', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);
			$options[PREFIX . 'post-date'] = array(
				'id'          => PREFIX . 'post-date',
				'label'       => __( 'Show post date', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);
			$options[PREFIX . 'post-thumbnail'] = array(
				'id'          => PREFIX . 'post-thumbnail',
				'label'       => __( 'Show post featured image', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);
			$options[PREFIX . 'post-share'] = array(
				'id'          => PREFIX . 'post-share',
				'label'       => __( 'Show post share', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);

		$options[PREFIX . 'post-footer-group'] = array(
			'id'          => PREFIX . 'post-footer-group',
			'label'       => __( 'Post Footer', 'beginner' ),
			'section'     => $section,
			'type'        => 'group-title'
		);
			$options[PREFIX . 'post-tag'] = array(
				'id'          => PREFIX . 'post-tag',
				'label'       => __( 'Show post tags', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);
			$options[PREFIX . 'post-nav'] = array(
				'id'          => PREFIX . 'post-nav',
				'label'       => __( 'Show post navigation', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);
			$options[PREFIX . 'post-author-box'] = array(
				'id'          => PREFIX . 'post-author-box',
				'label'       => __( 'Show post author box', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);

		$options[PREFIX . 'related-posts-group'] = array(
			'id'          => PREFIX . 'related-posts-group',
			'label'       => __( 'Related Posts', 'beginner' ),
			'section'     => $section,
			'type'        => 'group-title'
		);
			$options[PREFIX . 'related-posts'] = array(
				'id'          => PREFIX . 'related-posts',
				'label'       => __( 'Show related posts', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);
			$options[PREFIX . 'related-posts-title'] = array(
				'id'          => PREFIX . 'related-posts-title',
				'label'       => __( 'Related Posts Title', 'beginner' ),
				'section'     => $section,
				'type'        => 'text',
				'default'     => __( '<span>Recommended Posts</span> for You', 'beginner' )
			);
			$options[PREFIX . 'related-posts-img'] = array(
				'id'          => PREFIX . 'related-posts-img',
				'label'       => __( 'Show related posts thumbnail', 'beginner' ),
				'section'     => $section,
				'type'        => 'switch',
				'default'     => 1
			);

		// Page
		$section = PREFIX . 'page-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Page', 'beginner' ),
			'priority'    => 15,
			'panel'       => $content_panel
		);
		$options[PREFIX . 'page-title'] = array(
			'id'          => PREFIX . 'page-title',
			'label'       => __( 'Show page title', 'beginner' ),
			'section'     => $section,
			'type'        => 'switch',
			'default'     => 1
		);

	// Advertisement Panel and Sections
	$ads_panel = 'advertisement';

	$panels[] = array(
		'id'       => $ads_panel,
		'title'    => __( 'Advertisement', 'beginner' ),
		'priority' => 80
	);

		// Header ads
		$section = PREFIX . 'header-ads-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Header', 'beginner' ),
			'priority'    => 5,
			'panel'       => $ads_panel,
		);
		$options[PREFIX . 'header-ads-image'] = array(
			'id'           => PREFIX . 'header-ads-image',
			'label'        => __( 'Ads Image', 'beginner' ),
			'description'  => __( 'Upload your ads image then put the url in the setting below.', 'beginner' ),
			'section'      => $section,
			'type'         => 'media',
			'default'      => '',
		);
		$options[PREFIX . 'header-ads-url'] = array(
			'id'           => PREFIX . 'header-ads-url',
			'label'        => __( 'Ads URL', 'beginner' ),
			'description'  => __( 'Put the ads url in the box below.', 'beginner' ),
			'section'      => $section,
			'type'         => 'url',
			'default'      => ''
		);
		$options[PREFIX . 'header-ads-custom'] = array(
			'id'                => PREFIX . 'header-ads-custom',
			'label'             => __( 'Or', 'beginner' ),
			'description'       => __( 'Pur you custom ads code (eg. adsense) in the box below.', 'beginner' ),
			'section'           => $section,
			'type'              => 'textarea',
			'sanitize_callback' => 'beginner_textarea_stripslashes',
			'default'           => ''
		);

		// Posts ads
		$section = PREFIX . 'posts-ads-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Posts', 'beginner' ),
			'description' => __( 'Single post advertisement', 'beginner' ),
			'priority'    => 10,
			'panel'       => $ads_panel,
		);
		$options[PREFIX . 'post-ads-before'] = array(
			'id'          => PREFIX . 'post-ads-before',
			'label'       => __( 'Ads Before Content', 'beginner' ),
			'section'     => $section,
			'type'        => 'group-title'
		);
			$options[PREFIX . 'post-ads-image-before'] = array(
				'id'           => PREFIX . 'post-ads-image-before',
				'label'        => __( 'Ads Image', 'beginner' ),
				'description'  => __( 'Upload your ads image then put the url in the setting below.', 'beginner' ),
				'section'      => $section,
				'type'         => 'media',
				'default'      => '',
			);
			$options[PREFIX . 'post-ads-url-before'] = array(
				'id'           => PREFIX . 'post-ads-url-before',
				'label'        => __( 'Ads URL', 'beginner' ),
				'description'  => __( 'Put the ads url in the box below.', 'beginner' ),
				'section'      => $section,
				'type'         => 'url',
				'default'      => ''
			);
			$options[PREFIX . 'post-ads-custom-before'] = array(
				'id'                => PREFIX . 'post-ads-custom-before',
				'label'             => __( 'Or', 'beginner' ),
				'description'       => __( 'Pur you custom ads code (eg. adsense) in the box below.', 'beginner' ),
				'section'           => $section,
				'type'              => 'textarea',
				'sanitize_callback' => 'beginner_textarea_stripslashes',
				'default'           => ''
			);
		$options[PREFIX . 'post-ads-after'] = array(
			'id'          => PREFIX . 'post-ads-after',
			'label'       => __( 'Ads After Content', 'beginner' ),
			'section'     => $section,
			'type'        => 'group-title'
		);
			$options[PREFIX . 'post-ads-image-after'] = array(
				'id'           => PREFIX . 'post-ads-image-after',
				'label'        => __( 'Ads Image', 'beginner' ),
				'description'  => __( 'Upload your ads image then put the url in the setting below.', 'beginner' ),
				'section'      => $section,
				'type'         => 'media',
				'default'      => '',
			);
			$options[PREFIX . 'post-ads-url-after'] = array(
				'id'           => PREFIX . 'post-ads-url-after',
				'label'        => __( 'Ads URL', 'beginner' ),
				'description'  => __( 'Put the ads url in the box below.', 'beginner' ),
				'section'      => $section,
				'type'         => 'url',
				'default'      => ''
			);
			$options[PREFIX . 'post-ads-custom-after'] = array(
				'id'                => PREFIX . 'post-ads-custom-after',
				'label'             => __( 'Or', 'beginner' ),
				'description'       => __( 'Pur you custom ads code (eg. adsense) in the box below.', 'beginner' ),
				'section'           => $section,
				'type'              => 'textarea',
				'sanitize_callback' => 'beginner_textarea_stripslashes',
				'default'           => ''
			);

	// only show if Deals plugin activated
	if ( is_tjdeals_activated() ) :

	// Deal Panel and Sections
	$deal_panel = 'deals';

	$panels[] = array(
		'id'          => $deal_panel,
		'title'       => __( 'Deals', 'beginner' ),
		'description' => __( 'This panel is used for managing several custom features/layouts of Deals in your site.', 'beginner' ),
		'priority'    => 90
	);

		// Featured deals
		$section = PREFIX . 'deals-featured-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Featured Deals', 'beginner' ),
			'priority'    => 10,
			'panel'       => $deal_panel
		);
			$options[PREFIX . 'featured-deals-select'] = array(
				'id'          => PREFIX . 'featured-deals-select',
				'label'       => __( 'Select a Deal Category', 'beginner' ),
				'section'     => $section,
				'type'        => 'select2',
				'choices'     => beginner_deals_cats_list()
			);
			$options[PREFIX . 'featured-deals-num'] = array(
				'id'          => PREFIX . 'featured-deals-num',
				'label'       => __( 'Number of deals', 'beginner' ),
				'section'     => $section,
				'type'        => 'text',
				'default'     => 3
			);
			$options[PREFIX . 'featured-deals-orderby'] = array(
				'id'          => PREFIX . 'featured-deals-orderby',
				'label'       => __( 'Order by', 'beginner' ),
				'section'     => $section,
				'type'        => 'select',
				'default'     => 'date',
				'choices'     => array(
					'date'       => __( 'Date', 'beginner' ),
					'rand'       => __( 'Random', 'beginner' ),
					'menu_order' => __( 'Custom', 'beginner' )
				)
			);
			$options[PREFIX . 'featured-deals-title'] = array(
				'id'          => PREFIX . 'featured-deals-title',
				'label'       => __( 'Featured Title', 'beginner' ),
				'section'     => $section,
				'type'        => 'text',
				'default'     => __( '<span>Featured</span> Deals & Discounts', 'beginner' )
			);
			$options[PREFIX . 'featured-deals-more'] = array(
				'id'          => PREFIX . 'featured-deals-more',
				'label'       => __( 'More Text', 'beginner' ),
				'section'     => $section,
				'type'        => 'text',
				'default'     => __( 'More Deals', 'beginner' )
			);
			$options[PREFIX . 'featured-deals-visibility'] = array(
				'id'          => PREFIX . 'featured-deals-visibility',
				'label'       => __( 'Visibility', 'beginner' ),
				'section'     => $section,
				'type'        => 'group-title'
			);
				$options[PREFIX . 'featured-deals-front'] = array(
					'id'          => PREFIX . 'featured-deals-front',
					'label'       => __( 'Show on Front page', 'beginner' ),
					'section'     => $section,
					'type'        => 'switch',
					'default'     => 1
				);
				$options[PREFIX . 'featured-deals-home'] = array(
					'id'          => PREFIX . 'featured-deals-home',
					'label'       => __( 'Show on Home page', 'beginner' ),
					'section'     => $section,
					'type'        => 'switch',
					'default'     => 1
				);
				$options[PREFIX . 'featured-deals-archive'] = array(
					'id'          => PREFIX . 'featured-deals-archive',
					'label'       => __( 'Show on Archive page', 'beginner' ),
					'description' => __( 'Blog, date, month and year page.', 'beginner' ),
					'section'     => $section,
					'type'        => 'switch',
					'default'     => 0
				);
				$options[PREFIX . 'featured-deals-author'] = array(
					'id'          => PREFIX . 'featured-deals-author',
					'label'       => __( 'Show on Author page', 'beginner' ),
					'section'     => $section,
					'type'        => 'switch',
					'default'     => 0
				);
				$options[PREFIX . 'featured-deals-category'] = array(
					'id'          => PREFIX . 'featured-deals-category',
					'label'       => __( 'Show on Category page', 'beginner' ),
					'section'     => $section,
					'type'        => 'switch',
					'default'     => 0
				);
				$options[PREFIX . 'featured-deals-tag'] = array(
					'id'          => PREFIX . 'featured-deals-tag',
					'label'       => __( 'Show on Tag page', 'beginner' ),
					'section'     => $section,
					'type'        => 'switch',
					'default'     => 0
				);
				$options[PREFIX . 'featured-deals-search'] = array(
					'id'          => PREFIX . 'featured-deals-search',
					'label'       => __( 'Show on Search page', 'beginner' ),
					'section'     => $section,
					'type'        => 'switch',
					'default'     => 0
				);
				$options[PREFIX . 'featured-deals-404'] = array(
					'id'          => PREFIX . 'featured-deals-404',
					'label'       => __( 'Show on 404 page', 'beginner' ),
					'section'     => $section,
					'type'        => 'switch',
					'default'     => 0
				);
				$options[PREFIX . 'featured-deals-post'] = array(
					'id'          => PREFIX . 'featured-deals-post',
					'label'       => __( 'Show on Single Post', 'beginner' ),
					'section'     => $section,
					'type'        => 'switch',
					'default'     => 0
				);
				$options[PREFIX . 'featured-deals-page'] = array(
					'id'          => PREFIX . 'featured-deals-page',
					'label'       => __( 'Show on Single Page', 'beginner' ),
					'section'     => $section,
					'type'        => 'switch',
					'default'     => 0
				);

		// Archive deals
		$section = PREFIX . 'deals-archive-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Archive Deals', 'beginner' ),
			'priority'    => 20,
			'panel'       => $deal_panel
		);
			$options[PREFIX . 'deals-archive-title'] = array(
				'id'          => PREFIX . 'deals-archive-title',
				'label'       => __( 'Archive Deals Title', 'beginner' ),
				'section'     => $section,
				'type'        => 'text',
				'default'     => __( '<span>Deals & Discounts for</span> Bloggers', 'beginner' )
			);
			$options[PREFIX . 'deals-archive-desc'] = array(
				'id'      => PREFIX . 'deals-archive-desc',
				'label'   => __( 'Description', 'beginner' ),
				'section' => $section,
				'type'    => 'textarea',
				'default' => __( 'Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.', 'beginner' )
			);

		// Single deals
		$section = PREFIX . 'deals-single-section';

		$sections[] = array(
			'id'          => $section,
			'title'       => __( 'Single Deals', 'beginner' ),
			'priority'    => 30,
			'panel'       => $deal_panel
		);
			$options[PREFIX . 'related-deals-group'] = array(
				'id'          => PREFIX . 'related-deals-group',
				'label'       => __( 'Related Deals', 'beginner' ),
				'section'     => $section,
				'type'        => 'group-title'
			);
				$options[PREFIX . 'related-deals'] = array(
					'id'          => PREFIX . 'related-deals',
					'label'       => __( 'Show related deals', 'beginner' ),
					'section'     => $section,
					'type'        => 'switch',
					'default'     => 1
				);
				$options[PREFIX . 'related-deals-title'] = array(
					'id'          => PREFIX . 'related-deals-title',
					'label'       => __( 'Related Deals Title', 'beginner' ),
					'section'     => $section,
					'type'        => 'text',
					'default'     => __( '<span>More Amazing</span> Deals', 'beginner' )
				);
				$options[PREFIX . 'related-deals-img'] = array(
					'id'          => PREFIX . 'related-deals-img',
					'label'       => __( 'Show related deals thumbnail', 'beginner' ),
					'section'     => $section,
					'type'        => 'switch',
					'default'     => 1
				);

	endif; // end Deals section

	// Adds the sections to the $options array
	$options['sections'] = $sections;

	// Adds the panels to the $options array
	$options['panels'] = $panels;

	$customizer_library = Customizer_Library::Instance();
	$customizer_library->add_options( $options );

}
add_action( 'init', 'beginner_customizer_register' );

/**
 * Callback for Feedburner ID
 */
function beginner_newsletter_feedburner_callback( $control ) {
    if ( $control->manager->get_setting( PREFIX . 'newsletter-type' )->value() == 'feedburner' ) {
        return true;
    } else {
        return false;
    }
}

/**
 * Callback for Custom Code
 */
function beginner_newsletter_custom_callback( $control ) {
	if ( $control->manager->get_setting( PREFIX . 'newsletter-type' )->value() == 'custom' ) {
		return true;
	} else {
		return false;
	}
}
