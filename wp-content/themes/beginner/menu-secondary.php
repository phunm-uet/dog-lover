<?php
// Check if there's a menu assigned to the 'primary' location.
if ( ! has_nav_menu( 'secondary' ) ) {
	return;
}
?>
<!-- Secondary Navigation / Start -->
<nav id="secondary-nav" class="main-navigation" <?php hybrid_attr( 'menu' ); ?>>

	<?php wp_nav_menu(
		array(
			'theme_location' => 'secondary',
			'container'      => false,
			'menu_id'        => 'secondary-menu',
			'menu_class'     => 'sf-menu',
			'walker'         => new Beginner_Custom_Nav_Walker
		)
	); ?>

</nav><!-- #secondary-nav -->
