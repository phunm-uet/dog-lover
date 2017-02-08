<?php if ( has_post_thumbnail() ) : ?>
	<a class="thumbnail-link" href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full', array( 'class' => 'entry-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?></a>
<?php endif; ?>
<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
<div class="entry-summary">
	<?php the_excerpt(); ?>
</div>
