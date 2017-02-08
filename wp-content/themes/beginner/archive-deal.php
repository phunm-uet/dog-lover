<?php get_header(); ?>

	<div id="primary" class="content-area page-deals">

		<?php if ( have_posts() ) : ?>

			<?php
			$title   = beginner_mod( PREFIX . 'deals-archive-title' );
			$desc    = beginner_mod( PREFIX . 'deals-archive-desc' );

			// Polylang integration
			if ( is_polylang_activated() ) {
				$title = pll__( beginner_mod( PREFIX . 'deals-archive-title' ) );
				$desc  = pll__( beginner_mod( PREFIX . 'deals-archive-desc' ) );
			}
			?>

			<header class="page-header">
				<h3 class="heading"><?php echo wp_kses_post( $title ); ?></h3>
			</header><!-- .page-header -->

			<div id="content">

				<div class="entry-summary"><?php echo wp_kses_post( $desc ); ?></div><!-- .entry-summary -->

				<?php
				$cats = get_terms( 'deal_category' );
				if ( $cats ) :

					// for taxonomy page
					$current = get_queried_object();
					$current_term = '';
					if ( isset( $current->term_id ) )
						$current_term = $current->term_id;
				?>
					<nav class="deals-nav clearfix">
						<ul class="clearfix">
							<li class="section-text"><?php _e( 'Browse:', 'beginner' ); ?></li>
							<li <?php if ( ! $current_term ) echo ' class="' . esc_attr( 'current' ) . '"'; ?>><a href="<?php echo esc_url( get_post_type_archive_link( 'deal' ) ); ?>"><?php _e( 'All', 'beginner' ); ?></a></li>

							<?php foreach ( $cats as $cat ) : ?>
								<li<?php if ( $current_term == $cat->term_id ) echo ' class="' . esc_attr( 'current' ) . '"'; ?>><a href="<?php echo esc_url( get_term_link( $cat->term_id ) ); ?>"><?php echo wp_kses_post( $cat->name ); ?></a></li>
							<?php endforeach; ?>
						</ul>
					</nav><!-- .deals-nav -->
				<?php endif; ?>

				<div class="deals-loop">

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php $class = ( $wp_query->current_post + 1 === $wp_query->post_count ) ? 'clearfix last' : 'clearfix'; ?>

						<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

							<?php get_template_part( 'partials/content', 'deal' ); ?>

						</article><!-- .hentry -->

					<?php endwhile; ?>

				</div><!-- .deals-loop -->

			</div><!-- #content -->

			<?php get_template_part( 'pagination' ); // Loads the pagination.php template  ?>

		<?php else : ?>

			<?php get_template_part( 'partials/content', 'none' ); ?>

		<?php endif; ?>

	</div><!-- #primary -->

	<?php get_sidebar( 'deal' ); ?>

<?php get_footer(); ?>
