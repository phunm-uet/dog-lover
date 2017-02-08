<?php get_header(); ?>

	<div id="primary" class="content-area single-deals">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php if ( beginner_mod( PREFIX . 'post-breadcrumb' ) ) : ?>
				<h3 class="heading">
					<span>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'beginner' ); ?></a>
						&rarr; <a href="<?php echo esc_url( get_post_type_archive_link( 'deal' ) ); ?>"><?php _e( 'Deals', 'beginner' ); ?></a>
						<?php $cat = get_the_terms( get_the_ID(), 'deal_category' ); ?>
						<?php if ( $cat ) : ?>
							&rarr; <a href="<?php echo esc_url( get_term_link( $cat[0]->term_id ) ); ?>"><?php echo esc_attr( $cat[0]->name ); ?></a>
						<?php endif; ?>
					</span>
				</h3>
			<?php endif; ?>

			<div id="content">
				<?php get_template_part( 'partials/content', 'single-deal' ); ?>
			</div><!-- #content -->

			<?php beginner_related_deals(); // Display the related posts. ?>

		<?php endwhile; // end of the loop. ?>

	</div><!-- #primary -->

	<?php get_sidebar( 'deal' ); ?>

<?php get_footer(); ?>
