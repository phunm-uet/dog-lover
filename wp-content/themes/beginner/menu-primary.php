<?php
// Check if there's a menu assigned to the 'primary' location.
if ( ! has_nav_menu( 'primary' ) ) {
	return;
}
?>

<nav id="primary-nav" class="main-navigation" <?php hybrid_attr( 'menu' ); ?>>

	<?php wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'container'      => false,
			'menu_id'        => 'primary-menu',
			'menu_class'     => 'sf-menu',
			'walker'         => new Beginner_Custom_Nav_Walker
		)
	); ?>

</nav><!-- #primary-nav -->
