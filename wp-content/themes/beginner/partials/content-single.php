<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php hybrid_attr( 'post' ); ?>>

	<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_permalink(); ?>" content="<?php echo esc_attr( get_the_title() ); ?>" />

	<?php the_title( '<h1 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>

	<?php beginner_posted_on(); ?>

	<?php if ( has_post_format( 'video' ) ) : ?>
		<div class="entry-image video">
			<?php echo hybrid_media_grabber( array( 'type' => 'video', 'split_media' => true ) ); ?>
		</div>
	<?php elseif ( has_post_format( 'audio' ) ) : ?>
		<div class="entry-image audio">
			<?php echo hybrid_media_grabber( array( 'type' => 'audio', 'split_media' => true ) ); ?>
		</div>
	<?php elseif ( has_post_format( 'image' ) )	: // do nothing ?>
	<?php elseif ( has_post_format( 'gallery' ) ) : ?>
		<?php echo beginner_get_format_gallery(); // Get the gallery ?>
	<?php else : ?>
		<?php if ( beginner_mod( PREFIX . 'post-thumbnail' ) ) : ?>
			<?php beginner_featured_image( array( 'link' => false ) ); ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php beginner_entry_share(); ?>

	<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'beginner' ),
				'after'  => '</div>',
			) );
		?>

	</div>

	<?php beginner_entry_publisher(); ?>

	<?php
		$tag = beginner_mod( PREFIX . 'post-tag' );
		$tags = get_the_tags();
		if ( $tags && $tag ) :
	?>
		<div class="entry-tags" <?php hybrid_attr( 'entry-terms', 'post_tag' ); ?>>
			<?php foreach( $tags as $tag ) : ?>
				<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><?php echo esc_attr( $tag->name ); ?></a>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>

	<?php if ( function_exists( 'sharing_display' ) ) : ?>
		<div class="jetpack-share-like">
			<?php sharing_display( '', true ); ?>
			<?php if ( class_exists( 'Jetpack_Likes' ) ) { $custom_likes = new Jetpack_Likes; echo $custom_likes->post_likes( '' ); } ?>
		</div>
	<?php endif; ?>

</article><!-- #post-## -->
