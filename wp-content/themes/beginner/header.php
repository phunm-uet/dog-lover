<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php hybrid_attr( 'body' ); ?>>

<div id="page" class="hfeed site clearfix">

	<!-- Primary Bar / Start -->
	<div id="primary-bar" class="clearfix">

		<div class="container">

			<?php get_template_part( 'menu', 'primary' ); ?>

			<?php beginner_social_icons(); ?>

		</div><!-- .container -->

	</div>
	<!-- Primary Bar / End -->

	<header id="masthead" class="site-header container clearfix" <?php hybrid_attr( 'header' ); ?>>

		<div class="site-branding">
			<?php beginner_site_branding(); ?>
		</div>

		<?php beginner_header_ads(); ?>

	</header><!-- #masthead -->

	<div id="secondary-bar" class="container clearfix">

		<?php get_template_part( 'menu', 'secondary' ); ?>

		<?php if ( has_nav_menu( 'secondary' ) && beginner_mod( PREFIX . 'search-header' ) ) : ?>
			<div class="header-search">
				<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<button type="submit" id="search-submit" class="fa fa-search"></button>
					<input type="search" name="s" id="s" placeholder="<?php echo esc_attr_x( 'Search for...', 'placeholder', 'beginner' ) ?>" autocomplete="off" value="<?php echo esc_attr( get_search_query() ); ?>">
				</form>
			</div><!-- .header-search -->
		<?php endif; ?>

	</div><!-- #secondary-bar -->

	<main id="main" <?php hybrid_attr( 'content' ); ?>>

		<?php get_template_part( 'partials/content', 'newsletter' ); ?>
