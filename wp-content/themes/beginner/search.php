<?php get_header(); ?>

	<div id="primary" class="content-area">

		<?php if ( have_posts() ) : ?>

			<div class="content-loop">

				<header class="page-header">
					<h3 class="heading"><?php printf( __( '<span>Search Results for:</span> %s', 'beginner' ), get_search_query() ); ?></h3>
				</header><!-- .page-header -->

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'partials/content' ); ?>

				<?php endwhile; ?>

			</div><!-- .content-loop -->

			<?php get_template_part( 'pagination' ); // Loads the pagination.php template  ?>

		<?php else : ?>

			<?php get_template_part( 'partials/content', 'none' ); ?>

		<?php endif; ?>

		<?php get_template_part( 'partials/content', 'featured' ); ?>

		<?php get_template_part( 'partials/content', 'featured-deals' ); ?>

	</div><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
