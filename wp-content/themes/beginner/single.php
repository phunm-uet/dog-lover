<?php get_header(); ?>

	<div id="primary" class="content-area">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php if ( beginner_mod( PREFIX . 'post-breadcrumb' ) ) : ?>
				<h3 class="heading">
					<span>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'beginner' ); ?></a>
						<?php $cat = get_the_category( get_the_ID() ); ?>
						<?php if ( $cat ) : ?>
							&rarr; <a href="<?php echo esc_url( get_category_link( $cat[0]->term_id ) ); ?>"><?php echo esc_attr( $cat[0]->name ); ?></a>
						<?php endif; ?>
					</span>
				</h3>
			<?php endif; ?>

			<div id="content">
				<?php get_template_part( 'partials/content', 'single' ); ?>
			</div><!-- #content -->

			<?php get_template_part( 'pagination' ); // Loads the pagination.php template  ?>

			<div class="entry-footer clearfix">

				<?php beginner_post_author_box(); // Display the author box. ?>

				<?php beginner_related_posts(); // Display the related posts. ?>

			</div><!-- .entry-footer -->

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		<?php get_template_part( 'partials/content', 'featured' ); ?>

		<?php get_template_part( 'partials/content', 'featured-deals' ); ?>

	</div><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
