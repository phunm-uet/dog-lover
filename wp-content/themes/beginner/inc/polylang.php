<?php
/**
 * Polylang Compatibility File
 *
 * @package    Beginner
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2016, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

/**
 * Register footer text strings
 */
$footer_text = beginner_mod( PREFIX . 'footer-text' ); // Get the data set in customizer
pll_register_string( PREFIX . 'footer-text', $footer_text, 'Beginner' ); // Register string

/**
 * Register related posts title strings
 */
$related_posts_title = beginner_mod( PREFIX . 'related-posts-title' );
pll_register_string( PREFIX . 'related-posts-title', $related_posts_title, 'Beginner' );

/**
 * Register featured strings
 */
$featured_title = beginner_mod( PREFIX . 'featured-title' );
pll_register_string( PREFIX . 'featured-title', $featured_title, 'Beginner' );
$featured_more = beginner_mod( PREFIX . 'featured-more' );
pll_register_string( PREFIX . 'featured-more', $featured_more, 'Beginner' );

/**
 * Register newsletter strings
 */
$newsletter_heading = beginner_mod( PREFIX . 'newsletter-heading' );
pll_register_string( PREFIX . 'newsletter-heading', $newsletter_heading, 'Beginner' );
$newsletter_title = beginner_mod( PREFIX . 'newsletter-title' );
pll_register_string( PREFIX . 'newsletter-title', $newsletter_title, 'Beginner' );
$newsletter_desc = beginner_mod( PREFIX . 'newsletter-desc' );
pll_register_string( PREFIX . 'newsletter-desc', $newsletter_desc, 'Beginner' );

/**
 * Register featured deals strings
 */
$featured_deals_title = beginner_mod( PREFIX . 'featured-deals-title' );
pll_register_string( PREFIX . 'featured-deals-title', $featured_deals_title, 'Beginner' );
$featured__deals_more = beginner_mod( PREFIX . 'featured-deals-more' );
pll_register_string( PREFIX . 'featured-deals-more', $featured__deals_more, 'Beginner' );
/**
 * Register archive deals strings
 */
$deals_archive_title = beginner_mod( PREFIX . 'deals-archive-title' );
pll_register_string( PREFIX . 'deals-archive-title', $deals_archive_title, 'Beginner' );
$deals_archive_desc = beginner_mod( PREFIX . 'deals-archive-desc' );
pll_register_string( PREFIX . 'deals-archive-desc', $deals_archive_desc, 'Beginner' );
/**
 * Register related deals title strings
 */
$related_deals_title = beginner_mod( PREFIX . 'related-deals-title' );
pll_register_string( PREFIX . 'related-deals-title', $related_deals_title, 'Beginner' );
