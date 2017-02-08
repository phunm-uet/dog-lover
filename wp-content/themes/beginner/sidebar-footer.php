<?php
// Return early if no widget found.
if ( ! is_active_sidebar( 'footer-1' ) && ! is_active_sidebar( 'footer-2' ) && ! is_active_sidebar( 'footer-3' ) && ! is_active_sidebar( 'footer-4' ) ) {
	return;
}
?>
<div class="footer-columns clearfix">

	<div class="container clearfix">

		<div class="footer-column footer-column-1" aria-label="<?php echo esc_attr_x( 'Footer Column 1', 'Sidebar aria label', 'beginner' ); ?>" <?php hybrid_attr( 'sidebar' ); ?>>
			<?php dynamic_sidebar( 'footer-1' ); ?>
		</div><!-- .footer-column .footer-column-1 -->

		<div class="footer-column footer-column-2" aria-label="<?php echo esc_attr_x( 'Footer Column 2', 'Sidebar aria label', 'beginner' ); ?>" <?php hybrid_attr( 'sidebar' ); ?>>
			<?php dynamic_sidebar( 'footer-2' ); ?>
		</div><!-- .footer-column .footer-column-2 -->

		<div class="footer-column footer-column-3" aria-label="<?php echo esc_attr_x( 'Footer Column 3', 'Sidebar aria label', 'beginner' ); ?>" <?php hybrid_attr( 'sidebar' ); ?>>
			<?php dynamic_sidebar( 'footer-3' ); ?>
		</div><!-- .footer-column .footer-column-3 -->

		<div class="footer-column footer-column-4" aria-label="<?php echo esc_attr_x( 'Footer Column 4', 'Sidebar aria label', 'beginner' ); ?>" <?php hybrid_attr( 'sidebar' ); ?>>
			<?php dynamic_sidebar( 'footer-4' ); ?>
		</div><!-- .footer-column .footer-column-4 -->

	</div><!-- .container -->

</div><!-- .footer-columns -->
