<?php if ( is_singular( 'post' ) ) : // If viewing a single post page. ?>

	<?php if ( beginner_mod( PREFIX . 'post-nav' ) ) : ?>

	<div class="post-nav">
		<?php if ( get_previous_post_link() ) : ?>
			<div class="nav-prev">
				<?php previous_post_link(
					'%link',
					'<div class="arrow"><i class="fa fa-angle-left"></i></div>'.
					'<div class="nav-text"><span>' . __( 'Previous Post', 'beginner' ) . '</span><h5>%title</h5></div>'
				); ?>
			</div>
		<?php endif; ?>

		<?php if ( get_next_post_link() ) : ?>
			<div class="nav-next">
				<?php next_post_link(
					'%link',
					'<div class="arrow"><i class="fa fa-angle-right"></i></div>' .
					'<div class="nav-text"><span>' . __( 'Next Post', 'beginner' ) . '</span><h5>%title</h5></div>'
					);
				?>
			</div>
		<?php endif; ?>
	</div><!-- .post-nav -->

	<?php endif; ?>

<?php elseif ( is_home() || is_archive() || is_search() ) : // If viewing the blog, an archive, or search results. ?>

	<?php the_posts_pagination( array( 'prev_text' => _x( 'Prev', 'previous post', 'beginner' ) ) ); ?>

<?php endif; ?>
