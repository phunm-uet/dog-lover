<?php
// check Visibility

// make sure Deals plugin is activated
if ( ! is_tjdeals_activated() )
	return;

if ( is_front_page() && ! beginner_mod( PREFIX . 'featured-deals-front' ) )
	return;

if ( is_home() && ! beginner_mod( PREFIX . 'featured-deals-home' ) )
	return;

if ( is_archive() && ! beginner_mod( PREFIX . 'featured-deals-archive' ) )
	return;

if ( is_author() && ! beginner_mod( PREFIX . 'featured-deals-author' ) )
	return;

if ( is_category() && ! beginner_mod( PREFIX . 'featured-deals-category' ) )
	return;

if ( is_tag() && ! beginner_mod( PREFIX . 'featured-deals-tag' ) )
	return;

if ( is_search() && ! beginner_mod( PREFIX . 'featured-deals-search' ) )
	return;

if ( is_404() && ! beginner_mod( PREFIX . 'featured-deals-404' ) )
	return;

if ( is_single() && ! beginner_mod( PREFIX . 'featured-deals-post' ) )
	return;

if ( is_page() && ! beginner_mod( PREFIX . 'featured-deals-page' ) )
	return;


// Get the data set in customizer
$cat     = beginner_mod( PREFIX . 'featured-deals-select' );
$num     = beginner_mod( PREFIX . 'featured-deals-num' );
$orderby = beginner_mod( PREFIX . 'featured-deals-orderby' );
$title   = beginner_mod( PREFIX . 'featured-deals-title' );
$more    = beginner_mod( PREFIX . 'featured-deals-more' );

// Polylang integration
if ( is_polylang_activated() ) {
	$title = pll__( beginner_mod( PREFIX . 'featured-deals-title' ) );
	$more  = pll__( beginner_mod( PREFIX . 'featured-deals-more' ) );
}

// Posts query arguments.
$args = array(
	'post_type'           => 'deal',
	'posts_per_page'      => absint( $num ),
	'orderby'             => $orderby
);

// Limit to term based on user selected term.
if ( ! empty( $cat ) ) {
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'deal_category',
			'field'    => 'slug',
			'terms'    => $cat,
		),
	);
}

// Allow dev to filter the post arguments.
$args = apply_filters( 'beginner_featured_deals_args', $args );

// The post query.
$featured = new WP_Query( $args );

if ( $featured->have_posts() ) : $i = 1;
?>
<!-- 3 Column Grid / Start -->
<div class="grid-posts grid-3-col deals-entries clearfix">

	<h3 class="heading"><?php echo wp_kses_post( $title ); ?></h3>

	<div class="grid-loop clearfix">

		<?php while ( $featured->have_posts() ) : $featured->the_post(); ?>

			<article class="hentry grid<?php echo esc_attr( ( 0 == $i % 3 ) ? ' last' : '' ); ?>">
				<?php
					beginner_featured_image( array( 'size' => 'full', 'default' => '326x206' ) );

					the_title( sprintf( '<h2 class="entry-title" ' . hybrid_get_attr( 'entry-title' ) . '><a href="%s" rel="bookmark" itemprop="url">', esc_url( get_permalink() ) ), '</a></h2>' );
				?>
			</article><!-- .hentry .grid -->

		<?php $i++; endwhile; ?>

		<div class="clearfix"></div>

		<div class="more-link">
			<a href="<?php echo esc_url( get_post_type_archive_link( 'deal' ) ); ?>"><?php echo wp_kses_post( $more ); ?></a>
		</div><!-- .more-link -->

	</div><!-- .grid-loop -->

</div>
<!-- 3 Column Grid / End -->
<?php endif; wp_reset_postdata(); ?>
