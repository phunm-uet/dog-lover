<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<?php
		if ( has_post_format( 'image' ) )
			beginner_get_first_image( 'large' );
	?>

	<?php
		if ( has_post_format( 'link' ) ) {
			beginner_get_post_format_link_url();
		} else {
			the_title( sprintf( '<h2 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' );
		}
	?>

	<?php beginner_posted_on(); ?>

	<?php if ( has_post_format( 'video' ) ) : ?>
		<div class="entry-image video">
			<?php echo hybrid_media_grabber( array( 'type' => 'video', 'split_media' => true ) ); ?>
		</div>
	<?php elseif ( has_post_format( 'audio' ) ) : ?>
		<div class="entry-image audio">
			<?php echo hybrid_media_grabber( array( 'type' => 'audio', 'split_media' => true ) ); ?>
		</div>
	<?php elseif ( has_post_format( 'image' ) )	: ?>
		<?php // do nothing ?>
	<?php elseif ( has_post_format( 'gallery' ) ) : ?>
		<?php echo beginner_get_format_gallery(); // Get the gallery ?>
	<?php else : ?>
		<?php beginner_featured_image( array() ); ?>
	<?php endif; ?>

	<div class="entry-summary" <?php hybrid_attr( 'entry-summary' ); ?>>
		<?php
			if ( has_post_format( 'image' ) ) {
				// do nothing
			} elseif ( has_post_format( 'aside' ) || has_post_format( 'quote' ) ) {
				the_content( "" );
			} else {
				the_excerpt();
			}
		?>
	</div>

	<div class="more-link">
		<a href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'beginner' ); ?></a>
	</div>

	<?php beginner_entry_publisher(); ?>

</article><!-- #post-## -->
