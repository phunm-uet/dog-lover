<?php
// check Visibility

if ( is_front_page() && ! beginner_mod( PREFIX . 'newsletter-front' ) )
	return;

if ( is_home() && ! beginner_mod( PREFIX . 'newsletter-home' ) )
	return;

if ( is_archive() && ! beginner_mod( PREFIX . 'newsletter-archive' ) )
	return;

if ( is_author() && ! beginner_mod( PREFIX . 'newsletter-author' ) )
	return;

if ( is_category() && ! beginner_mod( PREFIX . 'newsletter-category' ) )
	return;

if ( is_tag() && ! beginner_mod( PREFIX . 'newsletter-tag' ) )
	return;

if ( is_search() && ! beginner_mod( PREFIX . 'newsletter-search' ) )
	return;

if ( is_404() && ! beginner_mod( PREFIX . 'newsletter-404' ) )
	return;

if ( is_single() && ! beginner_mod( PREFIX . 'newsletter-post' ) )
	return;

if ( is_page() && ! beginner_mod( PREFIX . 'newsletter-page' ) )
	return;

// Get data from Customizer
$enable  = beginner_mod( PREFIX . 'newsletter' );
$heading = beginner_mod( PREFIX . 'newsletter-heading' );
$title   = beginner_mod( PREFIX . 'newsletter-title' );
$desc    = beginner_mod( PREFIX . 'newsletter-desc' );
$type    = beginner_mod( PREFIX . 'newsletter-type' );
$feed_id = beginner_mod( PREFIX . 'newsletter-feedburner' );
$form    = beginner_mod( PREFIX . 'newsletter-form' );

// Polylang integration
if ( is_polylang_activated() ) {
	$heading = pll__( beginner_mod( PREFIX . 'newsletter-heading' ) );
	$title   = pll__( beginner_mod( PREFIX . 'newsletter-title' ) );
	$more    = pll__( beginner_mod( PREFIX . 'newsletter-more' ) );
}
?>
<div class="featured-newsletter">
	<h3 class="header"><?php echo wp_kses_post( $heading ); ?></h3>
	<div class="widget-content">
		<h4><?php echo wp_kses_post( $title ); ?></h4>
		<p><?php echo wp_kses_post( $desc ); ?></p>
		<?php
			if ( 'feedburner' == $type ) :
				if ( $feed_id ):
		?>
					<form class="form-subscribe" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo strip_tags( $feed_id ); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520'); return true">
						<input type="text" name="name" placeholder="<?php esc_attr_e( 'Your Name', 'beginner' ); ?>">
						<input type="email" name="email" placeholder="<?php esc_attr_e( 'Your Email', 'beginner' ); ?>">
						<input type="hidden" value="<?php echo strip_tags( $feed_id ); ?>" name="uri">
						<input type="hidden" value="<?php echo strip_tags( $feed_id ); ?>" name="title">
						<input type="hidden" name="loc" value="en_US">
						<button class="btn" type="submit" name="submit"><?php _e( 'Sign Up', 'beginner' ); ?></button>
					</form>
		<?php
				endif;
			else :
				echo stripslashes( $form );
			endif;
		?>
	</div>
</div><!-- .featured-newsletter -->
