<?php get_header(); ?>

	<div id="primary" class="content-area">

		<section class="error-404 not-found content-loop">

			<header class="page-header">
				<h3 class="heading"><?php _e( 'Oops! That page can&rsquo;t be found', 'beginner' ); ?></h3>
			</header><!-- .page-header -->

			<div class="hentry">
				<div class="entry-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search or browse one of our posts below.', 'beginner' ); ?></p>

					<?php get_search_form(); ?>
				</div>
			</div>

			<?php
			// Posts arguments
			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => 3,
				'orderby'        => 'rand'
			);

			// Allow dev to filter the arguments
			$posts = apply_filters( 'beginner_posts_query_404_args', $args );

			// Our hero!
			$posts = new WP_Query( $args );

			// Display the posts
			if ( $posts->have_posts() ) :
				while ( $posts->have_posts() ) : $posts->the_post();
					get_template_part( 'partials/content' );
				endwhile;
			endif;

			// Reset the query.
			wp_reset_postdata();
			?>

		</section><!-- .error-404 -->

		<?php get_template_part( 'partials/content', 'featured' ); ?>

	</div><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
