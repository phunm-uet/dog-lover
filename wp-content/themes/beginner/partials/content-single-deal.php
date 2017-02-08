<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_permalink(); ?>" content="<?php echo esc_attr( get_the_title() ); ?>" />

	<?php the_title( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>

	<?php beginner_posted_on(); ?>

	<?php if ( beginner_mod( PREFIX . 'post-thumbnail' ) ) : ?>
		<?php beginner_featured_image( array( 'size' => 'full', 'link' => false ) ); ?>
	<?php endif; ?>

	<?php
	$code = get_post_meta( get_the_ID(), 'tjd_coupon_code', true );
	$link = get_post_meta( get_the_ID(), 'tjd_custom_url', true );
	if ( $code ) :
	?>
		<div class="coupon-area clearfix">
			<strong><?php _e( 'Coupon Code', 'beginner' ); ?></strong>
			<form action="<?php echo esc_url( $link ); ?>" method="post" target="_blank">
				<button data-clipboard-text="<?php echo esc_attr( $code ); ?>" class="coupon-code" type="submit"><?php echo esc_attr( $code ); ?></button>
			</form>
			<span><?php _e( '(Click to Copy & Open Site)', 'beginner' ); ?></span>
			<div class="clearfix"></div>
		</div><!-- .coupon-area -->
	<?php endif; ?>

	<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'beginner' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->

	<?php
	$text = get_post_meta( get_the_ID(), 'tjd_button_text', true );
	if ( $link && $text ) :
	?>
		<div class="more-link">
			<a href="<?php echo esc_url( $link ); ?>" target="_blank"><?php echo wp_kses_post( $text ); ?></a>
		</div><!-- .more-link -->
	<?php endif; ?>

</article><!-- #post-## -->
