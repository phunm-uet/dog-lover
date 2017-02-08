<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package    Beginner
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2016, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @since  1.0.0
 * @param  array $classes Classes for the body element.
 * @return array
 */
function beginner_body_classes( $classes ) {

	// Adds a class of multi-author to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'multi-author';
	}

	// use 'single' class on single Post and Page
	if ( is_singular() ) {
		$classes[] = 'single';
	}

	return $classes;
}
add_filter( 'body_class', 'beginner_body_classes' );

/**
 * Adds custom classes to the array of post classes.
 *
 * @since  1.0.0
 * @param  array $classes Classes for the post element.
 * @return array
 */
function beginner_post_classes( $classes ) {

	// Adds a class if a post hasn't a thumbnail.
	if ( ! has_post_thumbnail() ) {
		$classes[] = 'no-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'beginner_post_classes' );

/**
 * Change the excerpt more string.
 * Return nothing, since we'll force it on the_excerpt filter instead.
 * See next function.
 *
 * @since  1.0.0
 * @param  string  $more
 * @return string
 */
function beginner_excerpt_more( $more ) {

	return '';
}
add_filter( 'excerpt_more', 'beginner_excerpt_more' );

/**
 * Force more string on the excerpt.
 *
 * @since  1.0.0
 * @param  string  $output
 * @return string
 */
function beginner_the_excerpt( $output ) {

	$more = '&hellip;';

	if ( 'post' == get_post_type() ) {

		$comments = '';

		if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) :
			$comments .= ' <span class="entry-comments">';
				$comments .= '<a href="' . esc_url( get_comments_link() ) . '">';
					$comments .= get_comments_number_text( __( '(0 comment)', 'beginner' ), __( '(1 comment)', 'beginner' ), __( '(% comments)', 'beginner' ) );
				$comments .= '</a>';
			$comments .= '</span>';
		endif;

		// use get_the_excerpt() instead $output to avoid <p>
		return get_the_excerpt() . $more . $comments;

	} elseif ( 'deal' == get_post_type() ) {

		return get_the_excerpt() . $more . ' <a href="' . get_permalink() . '">' . __( 'View this Deal', 'beginner' ) . ' <i class="fa fa-angle-right"></i></a>';

	}
}
add_filter( 'the_excerpt', 'beginner_the_excerpt' );

/**
 * Change the excerpt length
 *
 * @since  1.0.0
 * @param  string  $length
 * @return string
 */
function beginner_excerpt_length( $length ) {

	if ( 'deal' == get_post_type() )
		$length = 15;

	return $length;
}
add_filter( 'excerpt_length', 'beginner_excerpt_length' );

/**
 * Remove theme-layouts meta box on attachment and bbPress post type.
 *
 * @since 1.0.0
 */
function beginner_remove_theme_layout_metabox() {
	remove_post_type_support( 'attachment', 'theme-layouts' );

	// bbPress
	remove_post_type_support( 'forum', 'theme-layouts' );
	remove_post_type_support( 'topic', 'theme-layouts' );
	remove_post_type_support( 'reply', 'theme-layouts' );
}
add_action( 'init', 'beginner_remove_theme_layout_metabox', 11 );

/**
 * Add post type 'post' support for the Simple Page Sidebars plugin.
 *
 * @since  1.0.0
 */
function beginner_page_sidebar_plugin() {
	if ( class_exists( 'Simple_Page_Sidebars' ) ) {
		add_post_type_support( 'post', 'simple-page-sidebars' );

		if ( is_tjdeals_activated() )
			add_post_type_support( 'deal', 'simple-page-sidebars' );
	}
}
add_action( 'init', 'beginner_page_sidebar_plugin' );

/**
 * Register custom contact info fields.
 *
 * @since  1.0.0
 * @param  array $contactmethods
 * @return array
 */
function beginner_contact_info_fields( $contactmethods ) {
	// $contactmethods['twitter']     = __( 'Twitter URL', 'beginner' );
	// $contactmethods['facebook']    = __( 'Facebook URL', 'beginner' );
	// $contactmethods['gplus']       = __( 'Google Plus URL', 'beginner' );
	// $contactmethods['instagram']   = __( 'Instagram URL', 'beginner' );
	// $contactmethods['pinterest']   = __( 'Pinterest URL', 'beginner' );

	// Remove default contacts
	unset( $contactmethods['aim'] );
	unset( $contactmethods['jabber'] );
	unset( $contactmethods['yim'] );

	return $contactmethods;
}
add_filter( 'user_contactmethods', 'beginner_contact_info_fields' );

/**
 * Extend archive title
 *
 * @since  1.0.0
 */
function beginner_extend_archive_title( $title ) {
	if ( is_category() ) {
		$title = sprintf( __( '<span>All Posts in</span> %s', 'beginner' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( __( '<span>All Posts in</span> %s', 'beginner' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( __( '<span>All Posts by</span> %s', 'beginner' ), get_the_author() );
	} elseif ( is_year() ) {
		$title = sprintf( __( '<span>Year:</span> %s', 'beginner' ), get_the_date( _x( 'Y', 'yearly archives date format', 'beginner' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( __( '<span>Month:</span> %s', 'beginner' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'beginner' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( __( '<span>Day:</span> %s', 'beginner' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'beginner' ) ) );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'beginner_extend_archive_title' );

/**
 * Customize tag cloud widget
 *
 * @since  1.0.0
 */
function beginner_customize_tag_cloud( $args ) {
	$args['largest']  = 12;
	$args['smallest'] = 12;
	$args['unit']     = 'px';
	$args['number']   = 20;
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'beginner_customize_tag_cloud' );
// Uncomment this if support WooCommerce
// add_filter( 'woocommerce_product_tag_cloud_widget_args', 'beginner_customize_tag_cloud' );

/**
 * Modifies the theme layout on attachment pages.
 *
 * @since  1.0.0
 */
function beginner_mod_theme_layout( $layout ) {

	// Change the layout to Full Width on Attachment page.
	if ( is_attachment() && wp_attachment_is_image() ) {
		$post_layout = get_post_layout( get_queried_object_id() );
		if ( 'default' === $post_layout ) {
			$layout = '1c';
		}
	}

	return $layout;
}
add_filter( 'theme_mod_theme_layout', 'beginner_mod_theme_layout', 15 );

/**
 * Custom comment form fields.
 *
 * @since  1.0.0
 * @param  array $fields
 * @return array
 */
function beginner_comment_form_fields( $fields, $args = array() ) {

	$args = wp_parse_args( $args );
	if ( ! isset( $args['format'] ) )
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? " aria-required='true'" : '' );
	$html5     = 'html5' === $args['format'];

	$fields['author'] = '<p class="comment-form-author"><input class="txt" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="' . __( 'Name', 'beginner' ) . ( $req ? ' *' : '' ) . '"' . $aria_req . ' /></p>';

	$fields['email'] = '<p class="comment-form-email"><input class="txt" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" placeholder="' . esc_attr__( 'Email', 'beginner' ) . ( $req ? ' *' : '' ) . '"' . $aria_req . ' /></p>';

	$fields['url'] = '<p class="comment-form-url"><input class="txt" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="' . esc_attr__( 'Website', 'beginner' ) . '" /></p>';

	return $fields;

}
add_filter( 'comment_form_default_fields', 'beginner_comment_form_fields' );

if ( ! function_exists( 'beginner_strip_shortcode_gallery' ) ) :
/**
 * Remove [gallery] from Single Post the_content
 * http://wordpress.stackexchange.com/questions/121489/split-content-and-gallery/121508#121508
 */
function beginner_strip_shortcode_gallery( $content ) {
	if ( has_post_format( 'gallery' ) ) {
		preg_match_all( '/'. get_shortcode_regex() .'/s', $content, $matches, PREG_SET_ORDER );
		if ( ! empty( $matches ) ) {
			foreach ( $matches as $shortcode ) {
				if ( 'gallery' === $shortcode[2] ) {
					$pos = strpos( $content, $shortcode[0] );
					if ($pos !== false)
						return substr_replace( $content, '', $pos, strlen($shortcode[0]) );
				}
			}
		}
	}
	return $content;
}
add_filter( 'the_content', 'beginner_strip_shortcode_gallery' );
endif;

/**
 * Custom <header> attributes
 */
function beginner_attr_header( $attr ) {
	unset( $attr['id'] );
	unset( $attr['class'] );
	unset( $attr['role'] );

	return $attr;
}
add_filter( 'hybrid_attr_header',  'beginner_attr_header' );

/**
 * Custom <footer> attributes
 */
function beginner_attr_footer( $attr ) {
	unset( $attr['id'] );
	unset( $attr['class'] );
	unset( $attr['role'] );

	return $attr;
}
add_filter( 'hybrid_attr_footer', 'beginner_attr_footer' );

/**
 * Custom <main> attributes
 */
function beginner_attr_main( $attr ) {
	$attr['class'] = 'site-main container clearfix';
	unset( $attr['id'] );
	unset( $attr['role'] );

	if ( isset( $attr['itemprop'] ) ) {
		$attr['itemtype']  = 'http://schema.org/WebPageElement';
		$attr['itemscope'] = 'itemscope';
	}

	return $attr;
}
add_filter( 'hybrid_attr_content', 'beginner_attr_main' );

/**
 * Custom sidebar attributes
 */
function beginner_attr_sidebar( $attr ) {
	unset( $attr['class'] );

	return $attr;
}
add_filter( 'hybrid_attr_sidebar', 'beginner_attr_sidebar' );

/**
 * Custom <nav> attributes
 */
function beginner_attr_menu( $attr ) {
	unset( $attr['class'] );
	unset( $attr['role'] );

	return $attr;
}
add_filter( 'hybrid_attr_menu', 'beginner_attr_menu' );

/**
 * Custom site-title
 */
function beginner_attr_site_title( $attr ) {
	unset( $attr['class'] );

	return $attr;
}
add_filter( 'hybrid_attr_site-title', 'beginner_attr_site_title' );

/**
 * Custom site-description
 */
function beginner_attr_site_description( $attr ) {
	unset( $attr['class'] );

	return $attr;
}
add_filter( 'hybrid_attr_site-description', 'beginner_attr_site_description' );

/**
 * Custom post <article> attributes
 */
function beginner_attr_post( $attr ) {
	unset( $attr['id'] );
	unset( $attr['class'] );

	return $attr;
}
add_filter( 'hybrid_attr_post', 'beginner_attr_post' );

/**
 * Custom entry-title
 */
function beginner_attr_entry_title( $attr ) {
	unset( $attr['id'] );
	unset( $attr['class'] );
	unset( $attr['role'] );

	return $attr;
}
add_filter( 'hybrid_attr_entry-title', 'beginner_attr_entry_title' );

/**
 * Custom entry-author
 */
function beginner_attr_entry_author( $attr ) {
	unset( $attr['class'] );

	return $attr;
}
add_filter( 'hybrid_attr_entry-author', 'beginner_attr_entry_author' );

/**
 * Custom entry-published
 */
function beginner_attr_entry_published( $attr ) {
	unset( $attr['class'] );

	return $attr;
}
add_filter( 'hybrid_attr_entry-published', 'beginner_attr_entry_published' );

/**
 * Custom entry-content
 */
function beginner_attr_entry_content( $attr ) {
	unset( $attr['class'] );

	return $attr;
}
add_filter( 'hybrid_attr_entry-content', 'beginner_attr_entry_content' );

/**
 * Custom entry-summary
 */
function beginner_attr_entry_summary( $attr ) {
	unset( $attr['class'] );

	return $attr;
}
add_filter( 'hybrid_attr_entry-summary', 'beginner_attr_entry_summary' );

/**
 * Custom entry-terms
 */
function beginner_attr_entry_terms( $attr ) {
	unset( $attr['class'] );

	return $attr;
}
add_filter( 'hybrid_attr_entry-terms', 'beginner_attr_entry_terms' );

/**
 * Comments
 */
function beginner_attr_comment( $attr ) {
	unset( $attr['id'] );
	unset( $attr['class'] );

	return $attr;
}
add_filter( 'hybrid_attr_comment', 'beginner_attr_comment' );

/**
 * Custom comment-author
 */
function beginner_attr_comment_author( $attr ) {
	unset( $attr['class'] );

	return $attr;
}
add_filter( 'hybrid_attr_comment-author', 'beginner_attr_comment_author' );

/**
 * Custom comment-published
 */
function beginner_attr_comment_published( $attr ) {
	unset( $attr['datetime'] );

	return $attr;
}
add_filter( 'hybrid_attr_comment-published', 'beginner_attr_comment_published' );

/**
 * Custom comment-permalink
 */
function beginner_attr_comment_permalink( $attr ) {
	unset( $attr['href'] );

	return $attr;
}
add_filter( 'hybrid_attr_comment-permalink', 'beginner_attr_comment_permalink' );

/**
 * Custom comment-content
 */
function beginner_attr_comment_content( $attr ) {
	unset( $attr['class'] );

	return $attr;
}
add_filter( 'hybrid_attr_comment-content', 'beginner_attr_comment_content' );

/**
 * Remove role="navigation" from the_posts_pagination()
 */
function beginner_navigation_markup_template( $template ) {
	return str_replace( ' role="navigation"', '', $template );
}
add_filter( 'navigation_markup_template', 'beginner_navigation_markup_template' );
