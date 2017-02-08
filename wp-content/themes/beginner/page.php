<?php get_header(); ?>

	<div id="primary" class="content-area">

		<?php while ( have_posts() ) : the_post(); ?>

			<div id="content">
				<?php get_template_part( 'partials/content', 'page' ); ?>
			</div><!-- #content -->

			<?php
				// Get data set in customizer
				$comment = beginner_mod( PREFIX . 'page-comment' );

				// Check if comment enable on customizer
				if ( $comment ) :
					// If enable and comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		<?php get_template_part( 'partials/content', 'featured' ); ?>

		<?php get_template_part( 'partials/content', 'featured-deals' ); ?>

	</div><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
