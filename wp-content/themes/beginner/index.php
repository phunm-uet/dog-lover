<?php get_header(); ?>

	<div id="primary" class="content-area">

		<?php if ( have_posts() ) : ?>

			<div class="content-loop">

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'partials/content' );break; ?>

				<?php endwhile; ?>

			</div><!-- .content-loop -->

			<?php //get_template_part( 'pagination' ); // Loads the pagination.php template  ?>

		<?php else : ?>

			<?php get_template_part( 'partials/content', 'none' ); ?>

		<?php endif; ?>

		

		<?php get_template_part( 'partials/content', 'featured-deals' ); ?>

	</div><!-- #primary -->

	<?php get_sidebar(); ?>
<?php get_template_part( 'partials/content', 'featured' ); ?>

<?php
echo "<hr>";
echo '<div class="tee">';
echo "<h1 style='padding-bottom:20px'>Top T-shirt</h1>";
$links =['https://www.sunfrog.com/Pets/Lifes-just-better-with-a-Lab.html',
				'https://www.sunfrog.com/Pets/Sip-Coffee-Pet-My-Dog.html',
				 'https://www.sunfrog.com/Pets/Lifes-just-better-with-a-Lab.html',
				'https://www.sunfrog.com/Pets/Sip-Coffee-Pet-My-Dog.html'
				];
$images = ['https://images.sunfrogshirts.com/2015/05/13/Lifes-just-better-with-a-Lab.jpg',
				 'https://images.sunfrogshirts.com/2014/12/24/Sip-Coffee-Pet-My-Dog.jpg',
					'https://images.sunfrogshirts.com/2015/05/13/Lifes-just-better-with-a-Lab.jpg',
				 'https://images.sunfrogshirts.com/2014/12/24/Sip-Coffee-Pet-My-Dog.jpg'
					];
echo '<div class="grid-posts grid-3-col">';
for($i = 0; $i < count($links) ; $i++){
	echo '<article class="hentry grid trend-tee">';
	echo "<a href='".$links[$i]."'><img src='".$images[$i]."'></a>";
	echo '</article>';
}
echo '</div>';
echo '</div>';
?>
<?php get_footer(); ?>
