<?php
/**
 * Template Name: Deals template
 */
get_header(); ?>

	<div id="primary" class="content-area page-deals">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h3 class="heading"><?php the_title(); ?></h3>
			</header><!-- .page-header -->

			<div id="content">

				<div class="entry-summary"><?php the_content(); ?></div><!-- .entry-summary -->

				<?php
					// Check if the required plugin is active.
					if ( is_tjdeals_activated() ) :
				?>

					<?php beginner_deals_nav(); ?>

					<?php
						$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
						$args = apply_filters( 'beginner_deals_query', array(
							'post_type' => 'deal',
							'paged' => $paged
						) );
						$deals = new WP_Query( $args );

						// Pagination fix
						// https://codeplanet.io/wordpress-paginate-wp_query/
						$temp_query = $wp_query;
						$wp_query   = NULL;
						$wp_query   = $deals;
					?>

					<?php if ( $deals->have_posts() ) : ?>

						<div class="deals-loop">

							<?php /* Start the Loop */ ?>
							<?php while ( $deals->have_posts() ) : $deals->the_post(); ?>

								<?php $class = ( $deals->current_post + 1 === $deals->post_count ) ? 'clearfix last' : 'clearfix'; ?>

								<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

									<?php get_template_part( 'partials/content', 'deal' ); ?>

								</article><!-- .hentry -->

							<?php endwhile; ?>

						</div><!-- .deals-loop -->

					<?php endif; wp_reset_postdata(); ?>

				<?php else : ?>

					<div class="entry-content">
						<p><?php _e( 'Please install <strong>Theme Junkie Deals</strong> plugin to use this page template.', 'beginner' ); ?></p>
					</div><!-- .entry-content -->

				<?php endif; ?>

			</div><!-- #content -->

			<?php get_template_part( 'pagination' ); // Loads the pagination.php template  ?>

		<?php else : ?>

			<?php get_template_part( 'partials/content', 'none' ); ?>

		<?php endif; ?>

	</div><!-- #primary -->

	<?php get_sidebar( 'deal' ); ?>

<?php get_footer(); ?>

