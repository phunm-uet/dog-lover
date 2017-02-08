<?php
// check Visibility

if ( is_front_page() && ! beginner_mod( PREFIX . 'featured-front' ) )
	return;

if ( is_home() && ! beginner_mod( PREFIX . 'featured-home' ) )
	return;

if ( is_archive() && ! beginner_mod( PREFIX . 'featured-archive' ) )
	return;

if ( is_author() && ! beginner_mod( PREFIX . 'featured-author' ) )
	return;

if ( is_category() && ! beginner_mod( PREFIX . 'featured-category' ) )
	return;

if ( is_tag() && ! beginner_mod( PREFIX . 'featured-tag' ) )
	return;

if ( is_search() && ! beginner_mod( PREFIX . 'featured-search' ) )
	return;

if ( is_404() && ! beginner_mod( PREFIX . 'featured-404' ) )
	return;

if ( is_single() && ! beginner_mod( PREFIX . 'featured-post' ) )
	return;

if ( is_page() && ! beginner_mod( PREFIX . 'featured-page' ) )
	return;


// Get the data set in customizer
$tag     = beginner_mod( PREFIX . 'featured-select' );
$num     = beginner_mod( PREFIX . 'featured-num' );
$orderby = beginner_mod( PREFIX . 'featured-orderby' );
$title   = beginner_mod( PREFIX . 'featured-title' );
$more    = beginner_mod( PREFIX . 'featured-more' );

// Polylang integration
if ( is_polylang_activated() ) {
	$title = pll__( beginner_mod( PREFIX . 'featured-title' ) );
	$more  = pll__( beginner_mod( PREFIX . 'featured-more' ) );
}

// Posts query arguments.
$args = array(
	'post_type'           => 'post',
	'posts_per_page'      => absint( $num ),
	'orderby'             => $orderby,
	'ignore_sticky_posts' => 1
);

// Limit to tag based on user selected tag.
if ( ! empty( $tag ) ) {
	$args['tag_id'] = $tag;
}

// Allow dev to filter the post arguments.
$args = apply_filters( 'beginner_featured_args', $args );

// The post query.
$featured = new WP_Query( $args );

if ( $featured->have_posts() ) : $i = 0;
?>
	<!-- 2 Column Grid / Start -->
	<div class="grid-posts grid-3-col">

		<h3 class="heading"><?php echo wp_kses_post( $title ); ?></h3>

		<div class="grid-loop clearfix">

			<?php while ( $featured->have_posts() ) : $featured->the_post(); ?>
			<?php if($i >=9) break; ?>
				<article class="hentry grid<?php echo esc_attr( ( 2 == $i % 3 ) ? ' last' : '' ); ?>">
					<?php
						beginner_featured_image( array( 'size' => 'post-thumbnail', 'default' => '500x285' ) );

						the_title( sprintf( '<h2 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' );

						echo '<div class="entry-meta"><time class="entry-date" datetime="' . esc_html( get_the_date( 'c' ) ) . '">' . esc_html( get_the_date() ) . '</time></div>';
					?>
				</article><!-- .hentry .grid -->
			<?php if($i %3 ==2) echo "<div class='clearfix'></div>"?>
			
			
			<?php $i++; endwhile; ?>

			<div class="clearfix"></div>

<!-- 			<div class="more-link"> -->
<!-- 				<a href="<?php //echo esc_url( get_tag_link( $tag ) ); ?>"><?php //echo wp_kses_post( $more ); ?></a> -->
<!-- 			</div><!-- .more-link --> 

		</div><!-- .grid-loop -->

	</div>
	<!-- 2 Column Grid / End -->
<?php endif; wp_reset_postdata(); ?>
