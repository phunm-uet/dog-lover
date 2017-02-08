<?php
/**
 * Template Name: Archive template
 */
get_header(); ?>

	<div id="primary" class="content-area">

		<?php if ( have_posts() ) : ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<div id="content">

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?> <?php hybrid_attr( 'post' ); ?>>

						<?php
						// Get the customizer value.
						$title = beginner_mod( PREFIX . 'page-title' );
						?>

						<?php if ( $title ) : ?>
							<?php the_title( '<h1 class="page-title" ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>
						<?php endif; ?>

						<div class="entry-content" <?php hybrid_attr( 'entry-content' ); ?>>
							<?php the_content(); ?>
							<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'beginner' ),
									'after'  => '</div>',
								) );
							?>

							<?php the_widget( 'WP_Widget_Recent_Posts', 'number=10&show_date=1' ); ?>

							<?php if ( beginner_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
								<div class="widget widget_categories">
									<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'beginner' ); ?></h2>
									<ul>
										<?php
											wp_list_categories( array(
												'orderby'    => 'count',
												'order'      => 'DESC',
												'show_count' => 1,
												'title_li'   => '',
												'number'     => 10,
											) );
										?>
									</ul>
								</div><!-- .widget -->
							<?php endif; ?>

							<?php
								/* translators: %1$s: smiley */
								$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'beginner' ), convert_smilies( ':)' ) ) . '</p>';
								the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
							?>

							<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

						</div><!-- .entry-content -->

					</article>

				</div><!-- #content -->

			<?php endwhile; ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</div><!-- #primary -->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>
