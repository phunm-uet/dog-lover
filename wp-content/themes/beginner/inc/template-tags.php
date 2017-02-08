<?php
/**
 * Custom template tags for this theme.
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package    Beginner
 * @author     Theme Junkie
 * @copyright  Copyright (c) 2016, Theme Junkie
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'beginner_site_branding' ) ) :
/**
 * Site branding for the site.
 *
 * Display site title by default, but user can change it with their custom logo.
 * They can upload it on Customizer page.
 *
 * @since  1.0.0
 */
function beginner_site_branding() {

	// Get the customizer value.
	$logo_id  = beginner_mod( PREFIX . 'logo' );

	// Check if logo available, then display it.
	if ( $logo_id ) :
		echo '<div id="logo" itemscope itemtype="http://schema.org/Brand">' . "\n";
			echo '<a href="' . esc_url( get_home_url() ) . '" itemprop="url" rel="home">' . "\n";
				echo '<img itemprop="logo" src="' . esc_url( wp_get_attachment_url( $logo_id ) ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '" />' . "\n";
			echo '</a>' . "\n";
		echo '</div>' . "\n";

	// If not, then display the Site Title and Site Description.
	else :
		echo '<div id="logo">'. "\n";
			echo '<h1 class="site-title" ' . hybrid_get_attr( 'site-title' ) . '><a href="' . esc_url( get_home_url() ) . '" itemprop="url" rel="home"><span itemprop="headline">' . esc_attr( get_bloginfo( 'name' ) ) . '</span></a></h1>'. "\n";
			echo '<p class="site-description" ' . hybrid_get_attr( 'site-description' ) . '>' . esc_attr( get_bloginfo( 'description' ) ) . '</p>';
		echo '</div>'. "\n";
	endif;

}
endif;

if ( ! function_exists( 'beginner_social_icons' ) ) :
/**
 * Header social
 */
function beginner_social_icons( $position = 'header' ) {

	// Get the customizer data
	$tw        = beginner_mod( PREFIX . 'twitter' );
	$fb        = beginner_mod( PREFIX . 'facebook' );
	$gplus     = beginner_mod( PREFIX . 'gplus' );
	$instagram = beginner_mod( PREFIX . 'instagram' );
	$pinterest = beginner_mod( PREFIX . 'pinterest' );
	$linkedin  = beginner_mod( PREFIX . 'linkedin' );
	$tumblr    = beginner_mod( PREFIX . 'tumblr' );
	$rss       = beginner_mod( PREFIX . 'rss' );

	// Display the data
	if ( $tw || $fb || $gplus || $instagram || $pinterest || $tumblr || $rss ) {

		echo '<div class="' . $position . '-social">';
			if ( $tw ) {
				echo '<a href="' . esc_url( $tw ) . '"><i class="fa fa-twitter"></i></a> ';
			}
			if ( $fb ) {
				echo '<a href="' . esc_url( $fb ) . '"><i class="fa fa-facebook"></i></a> ';
			}
			if ( $gplus ) {
				echo '<a href="' . esc_url( $gplus ) . '"><i class="fa fa-google-plus"></i></a> ';
			}
			if ( $instagram ) {
				echo '<a href="' . esc_url( $instagram ) . '"><i class="fa fa-instagram"></i></a> ';
			}
			if ( $pinterest ) {
				echo '<a href="' . esc_url( $pinterest ) . '"><i class="fa fa-pinterest"></i></a> ';
			}
			if ( $linkedin ) {
				echo '<a href="' . esc_url( $linkedin ) . '"><i class="fa fa-linkedin"></i></a> ';
			}
			if ( $tumblr ) {
				echo '<a href="' . esc_url( $tumblr ) . '"><i class="fa fa-tumblr"></i></a> ';
			}
			if ( $rss ) {
				echo '<a href="' . esc_url( $rss ) . '"><i class="fa fa-rss"></i></a>';
			}
		echo '</div>';

	}

}
endif;

if ( ! function_exists( 'beginner_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since 1.0.0
 */
function beginner_posted_on() {

	// bail out if not 'Post'
	if ( 'post' != get_post_type() && 'deal' != get_post_type() )
		return;

	// Get the data set in customizer
	$author = beginner_mod( PREFIX . 'post-author' );
	$cat    = beginner_mod( PREFIX . 'post-cat' );
	$date   = beginner_mod( PREFIX . 'post-date' );

	$category = get_the_category( get_the_ID() );
	?>
	<div class="entry-meta">

		<meta itemscope itemprop="mainEntityOfPage" itemType="https://schema.org/WebPage" itemid="<?php the_permalink(); ?>" content="<?php echo esc_attr( get_the_title() ); ?>" />
		<meta <?php hybrid_attr( 'entry-published' ); ?>/>
		<meta itemprop="dateModified" content="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>" title="<?php echo esc_attr( get_the_modified_time( _x( 'l, F j, Y, g:i a', 'post time format', 'beginner' ) ) ); ?>" />

		<?php
		// post author
		if ( $author )
			printf( '<span class="post-author vcard" ' . hybrid_get_attr( 'entry-author' ) . '>%1$s %2$s <a class="url fn n" href="%3$s" itemprop="url"><span itemprop="name">%4$s</span></a></span>',
				'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_avatar( is_email( get_the_author_meta( 'user_email' ) ), 32, '', strip_tags( get_the_author() ) ) . '</a>',
				_x( 'By:', 'post meta', 'beginner' ),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author() )
			);

		// separator
		if ( $author && ( $cat || $date ) )
			echo '<span class="sep">|</span>';

		// category
		if ( $cat && $category )
			printf( _x( '%1$sIn: %2$s%3$s', 'post meta', 'beginner' ),
				'<span class="entry-category" ' . hybrid_get_attr( 'entry-terms', 'category' ) . '>',
					'<a href="' . esc_url( get_category_link( $category[0]->term_id ) ) . '">' . esc_attr( $category[0]->name ) . '</a>',
				'</span><!-- .entry-category -->'
			);

		// separator
		if ( ( $cat && $category )  && $date )
			echo '<span class="sep">|</span>';

		// post date
		if ( $date ) {

			// Get the date style
			$date_type  = beginner_mod( PREFIX . 'post-date-type' );
			$date_style = beginner_mod( PREFIX . 'post-date-style' );

			if ( 'published' == $date_type ) {
				$datestamp = get_the_date();
				$timestamp = get_the_time( 'U' );
				$datetime  = get_the_date( 'c' );
			} else {
				$datestamp = get_the_modified_date();
				$timestamp = get_the_modified_time( 'U' );
				$datetime  = get_the_modified_date( 'c' );
			}

			if ( 'absolute' == $date_style ) {
				$date_string = esc_html( $datestamp );
			} else {
				$date_string = sprintf( __( '%s ago', 'beginner' ), human_time_diff( $timestamp, current_time( 'timestamp' ) ) );
			}

			$time_string = sprintf( '<time datetime="%1$s">%2$s</time>',
				esc_attr( $datetime ),
				$date_string
			);

			printf( _x( '<span class="post-date">Last Updated: %1$s</span>', 'post meta', 'beginner' ), $time_string );

		}
		?>

	</div><!-- .entry-meta -->
	<?php
}
endif;

if ( ! function_exists( 'beginner_categorized_blog' ) ) :
/**
 * Returns true if a blog has more than 1 category.
 *
 * @since  1.0.0
 * @return bool
 */
function beginner_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'beginner_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'beginner_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so beginner_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so beginner_categorized_blog should return false.
		return false;
	}
}
endif;

if ( ! function_exists( 'beginner_category_transient_flusher' ) ) :
/**
 * Flush out the transients used in beginner_categorized_blog.
 *
 * @since 1.0.0
 */
function beginner_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'beginner_categories' );
}
endif;
add_action( 'edit_category', 'beginner_category_transient_flusher' );
add_action( 'save_post',     'beginner_category_transient_flusher' );

if ( ! function_exists( 'beginner_entry_share' ) ) :
/**
 * Social share.
 *
 * @since 1.0.0
 */
function beginner_entry_share() {

	// Get the data set in customizer
	$share  = beginner_mod( PREFIX . 'post-share' );

	if ( $share == 0 ) {
		return;
	}
	?>
		<div class="entry-share">
			<a class="icon-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>" target="_blank"><i class="fa fa-facebook"></i> <span><?php _ex( 'Like', 'entry share', 'beginner' ); ?></span></a>
			<a class="icon-twitter" href="https://twitter.com/intent/tweet?text=<?php echo esc_attr( urlencode( get_the_title( get_the_ID() ) ) ); ?>&amp;url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>" target="_blank"><i class="fa fa-twitter"></i> <span><?php _ex( 'Tweet', 'entry share', 'beginner' ); ?></span></a>
			<a class="icon-pinterest" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>&amp;media=<?php echo urlencode( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) ); ?>" target="_blank"><i class="fa fa-pinterest"></i> <span><?php _ex( 'Pin it', 'entry share', 'beginner' ); ?></span></a>
			<a class="icon-google-plus" href="https://plus.google.com/share?url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>" target="_blank"><i class="fa fa-google-plus"></i> <span><?php _ex( 'Share', 'entry share', 'beginner' ); ?></span></a>
			<a class="icon-linkedin" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode( get_permalink( get_the_ID() ) ); ?>&amp;title=<?php echo esc_attr( urlencode( get_the_title( get_the_ID() ) ) ); ?>" target="_blank"><i class="fa fa-linkedin"></i> <span><?php _ex( 'Share', 'entry share', 'beginner' ); ?></span></a>
			<a class="icon-envelope" href="mailto:?subject=<?php echo esc_url( urlencode( '[' . get_bloginfo( 'name' ) . '] ' . get_the_title( get_the_ID() ) ) ); ?>&amp;body=<?php echo esc_url( urlencode( get_permalink( get_the_ID() ) ) ); ?>"><i class="fa fa-envelope"></i> <span><?php _ex( 'Email', 'entry share', 'beginner' ); ?></span></a>
		</div>
	<?php
}
endif;

if ( ! function_exists( 'beginner_entry_publisher' ) ) :
/**
 * Schema.org publisher
 */
function beginner_entry_publisher() {
	?>
	<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
		<div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
			<?php
			$logo_id = beginner_mod( PREFIX . 'logo' );
			if ( $logo_id ) {
				$logo_url = wp_get_attachment_url( $logo_id );
			} else {
				$logo_url = '//placehold.it/91x30';
			}
			?>
			<meta itemprop="url" content="<?php echo esc_url( $logo_url ); ?>">
			<meta itemprop="width" content="300">
			<meta itemprop="height" content="200">
		</div>
		<meta itemprop="name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
	</div>
	<?php
}
endif;

if ( ! function_exists( 'beginner_post_author_box' ) ) :
/**
 * Author post informations.
 *
 * @since  1.0.0
 */
function beginner_post_author_box() {

	// Get the data set in customizer
	$enable = beginner_mod( PREFIX . 'post-author-box' );

	// Disable if user choose it.
	if ( $enable == 0 ) {
		return;
	}

	// Bail if not on the single post.
	if ( ! is_single() ) {
		return;
	}

	// Bail if user hasn't fill the Biographical Info field.
	if ( ! get_the_author_meta( 'description' ) ) {
		return;
	}
?>

	<div class="entry-author clearfix" <?php hybrid_attr( 'entry-author' ) ?>>
		<article>
			<?php echo get_avatar( is_email( get_the_author_meta( 'user_email' ) ), apply_filters( 'beginner_author_bio_avatar_size', 96 ), '', strip_tags( get_the_author() ) ); ?>

			<div class="author-content">
				<h3 class="author-title name">
					<?php _e( 'Post by', 'beginner' ); ?>
					<a class="author-name url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author" itemprop="url"><span itemprop="name"><?php echo strip_tags( get_the_author() ); ?></span></a>
				</h3>
				<p class="bio" itemprop="description"><?php echo stripslashes( get_the_author_meta( 'description' ) ); ?></p>
			</div>
		</article>
	</div><!-- .entry-author -->

<?php
}
endif;

if ( ! function_exists( 'beginner_related_posts' ) ) :
/**
 * Related posts.
 *
 * @since  1.0.0
 */
function beginner_related_posts() {

	// Get the data set in customizer
	$enable = beginner_mod( PREFIX . 'related-posts' );
	$title  = beginner_mod( PREFIX . 'related-posts-title' );
	$img    = beginner_mod( PREFIX . 'related-posts-img' );

	// Disable if user choose it.
	if ( $enable == 0 ) {
		return;
	}

	// Polylang integration
	if ( is_polylang_activated() ) {
		$title = pll__( beginner_mod( PREFIX . 'related-posts-title' ) );
	}

	// Get the taxonomy terms of the current page for the specified taxonomy.
	$terms = wp_get_post_terms( get_the_ID(), 'category', array( 'fields' => 'ids' ) );

	// Bail if the term empty.
	if ( empty( $terms ) ) {
		return;
	}

	// Posts query arguments.
	$query = array(
		'post__not_in' => array( get_the_ID() ),
		'tax_query'    => array(
			array(
				'taxonomy' => 'category',
				'field'    => 'id',
				'terms'    => $terms,
				'operator' => 'IN'
			)
		),
		'posts_per_page' => 3,
		'post_type'      => 'post',
	);

	// Allow dev to filter the query.
	$args = apply_filters( 'beginner_related_posts_args', $query );

	// The post query
	$related = new WP_Query( $args );

	if ( $related->have_posts() ) : $i = 1; ?>

		<div class="grid-posts grid-3-col entry-related">
			<h3 class="heading"><?php echo wp_kses_post( $title ); ?></h3>
			<div class="grid-loop clearfix">
				<?php while ( $related->have_posts() ) : $related->the_post(); ?>
					<?php
					$class = ( 0 == $i % 3 ) ? 'hentry grid last' : 'hentry grid';
					?>
					<article class="<?php echo esc_attr( $class ); ?>">
						<?php if ( $img ) : ?>
							<?php beginner_featured_image( array( 'size' => 'medium', 'default' => '326x206' ) ); ?>
						<?php endif; ?>
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</article><!-- .grid -->
				<?php $i++; endwhile; ?>
			</div><!-- .grid-loop -->
		</div><!-- .grid-posts -->

	<?php endif;

	// Restore original Post Data.
	wp_reset_postdata();

}
endif;

if ( ! function_exists( 'beginner_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since  1.0.0
 */
function beginner_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>" <?php hybrid_attr( 'comment' ); ?>>
		<div id="comment-<?php comment_ID(); ?>" class="comment-wrapper">
			<p <?php hybrid_attr( 'comment-content' ); ?>><?php _e( 'Pingback:', 'beginner' ); ?> <span <?php hybrid_attr( 'comment-author' ); ?>><span itemprop="name"><?php comment_author_link(); ?></span></span> <?php edit_comment_link( __( '(Edit)', 'beginner' ), '<span class="edit-link">', '</span>' ); ?></p>
		</div>
	<?php
			break;
		default :
		// Proceed with normal comments.
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>" <?php hybrid_attr( 'comment' ); ?>>
		<div id="comment-<?php comment_ID(); ?>" class="comment-wrapper">

			<div class="comment-avatar">
				<figure><?php echo get_avatar( $comment, apply_filters( 'beginner_comment_avatar_size', 64 ) ); ?></figure>
			</div>

			<div class="comment-detail">

				<div class="comment-name number">
					<span class="name" <?php hybrid_attr( 'comment-author' ); ?>><span itemprop="name"><?php echo get_comment_author_link(); ?></span></span>
					<?php echo beginner_comment_author_badge(); ?>
					<?php
						$edit_comment_link = '';
						if ( get_edit_comment_link() )
							$edit_comment_link = sprintf( __( '&middot; %1$sEdit%2$s', 'beginner' ), '<a href="' . get_edit_comment_link() . '" title="' . esc_attr__( 'Edit Comment', 'beginner' ) . '">', '</a>' );

						printf( '<span class="comment-date"><a href="%1$s" ' . hybrid_get_attr( 'comment-permalink' ) . '><time datetime="%2$s" ' . hybrid_get_attr( 'comment-published' ) . '>%3$s</time></a> %4$s</span>',
							esc_url( get_comment_link( $comment->comment_ID ) ),
							get_comment_time( 'c' ),
							/* translators: 1: date, 2: time */
							sprintf( __( '%1$s at %2$s', 'beginner' ), get_comment_date(), get_comment_time() ),
							$edit_comment_link
						);
					?>
				</div><!-- .comment-name -->

				<div class="comment-description" <?php hybrid_attr( 'comment-content' ); ?>>
					<?php if ( '0' == $comment->comment_approved ) : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'beginner' ); ?></p>
					<?php endif; ?>
					<?php comment_text(); ?>
				</div><!-- .comment-description -->

				<span class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'beginner' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</span><!-- .reply -->

			</div><!-- .comment-detail -->

		</div><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'beginner_comment_author_badge' ) ) :
/**
 * Custom badge for post author comment
 *
 * @since  1.0.0
 */
function beginner_comment_author_badge() {

	// Set up empty variable
	$output = '';

	// Get comment classes
	$classes = get_comment_class();

	if ( in_array( 'bypostauthor', $classes ) ) {
		$output = '<span class="author-badge">' . __( 'Author', 'beginner' ) . '</span>';
	}

	// Display the badge
	return apply_filters( 'beginner_comment_author_badge', $output );
}
endif;

if ( ! function_exists( 'beginner_get_first_image' ) ) :
/**
 * Return an HTML img tag for the first image in a post content. Used to draw
 * the content for posts of the “image” format.
 * http://css-tricks.com/snippets/wordpress/get-the-first-image-from-a-post/#comment-1582091 --> not working
 * http://www.wprecipes.com/how-to-get-the-first-image-from-the-post-and-display-it
 *
 * @return string An HTML img tag for the first image in a post content.
 */
function beginner_get_first_image( $size = 'full', $echo = true ) {

	// TO-DO: handle when $echo is false
	if ( has_post_thumbnail() && $echo ) {
		return beginner_featured_image( array( 'size' => $size ) );
	}

	// Expose information about the current post.
	global $post;

	// We'll trap to see if this stays empty later in the function.
	$src = '';

	// Grab all img src's in the post content
	// $output = preg_match_all( '//i', $post->post_content, $matches ); // not working
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

	// Grab the first img src returned by our regex.
	// if ( ! isset ( $matches[1][0] ) ) { return false; }
	// $src = $matches[1][0];

	// Grab the first <img> complete markup returned by our regex.
	if ( ! isset ( $matches[0][0] ) ) { return false; }
	$src = $matches[0][0];

	// Make sure there's still something worth outputting after sanitization.
	if ( empty( $src ) ) { return false; }

	// add wrapper
	$content = '<div class="entry-image clearfix">';
		$content .= '<a class="img-link" href="' . get_the_permalink() . '">';
			$content .= $src;
		$content .= '</a>';
	$content .= '</div>';

	// choose whether to echo the result or return it as variable
	if ( true == $echo )
		echo $content;
	else
		return $src;

}
endif;

if ( ! function_exists( 'beginner_get_format_gallery' ) ) :
/**
 * Get the [gallery] shortcode from the post content and display it on index page. It require
 * gallery ids [gallery ids=1,2,3,4] to display it as thumbnail slideshow. If no ids exist it
 * just display it as beginner [gallery] markup.
 *
 * If no [gallery] shortcode found in the post content, get the attached images to the post and
 * display it as slideshow.
 *
 * @since  1.0.0
 * @uses   get_post_gallery() to get the gallery in the post content.
 * @uses   wp_get_attachment_image() to get the HTML image.
 * @uses   get_children() to get the attached images if no [gallery] found in the post content.
 * @return string
 */
function beginner_get_format_gallery() {

	// Set up a default, empty $html variable.
	$html = '';

	// for has_sidebar
	$size = 'medium_large';

	// for no sidebar
	if ( current_theme_supports( 'theme-layouts' ) && ! is_admin() ) {
		if ( 'layout-1c' == theme_layouts_get_layout() ) {
			$size = 'large';
		}
	}

	// Check the [gallery] shortcode in post content.
	$gallery = get_post_gallery( get_the_ID(), false );

	// opening wrapper
	$html = '<div class="owl-carousel owl-theme entry-image gallery-format">';

	// Check if the [gallery] exist.
	if ( $gallery ) {

		// Check if the gallery ids exist.
		if ( isset( $gallery['ids'] ) ) {

			// Get the gallery ids and convert it into array.
			$ids = explode( ',', $gallery['ids'] );

			// Display the gallery in a cool slideshow on index page.
			foreach( $ids as $id ) {
				$html .= '<div class="item">';
				$html .= wp_get_attachment_image( $id, $size, false, array( 'class' => 'entry-thumbnail' ) );
				$html .= '</div>';
			}

		} else {

			// If gallery ids not exist, display the beginner gallery markup.
			// avoid this, since it'll look bad
			// $html = get_post_gallery( get_the_ID() );

			// if gallery based on images attached to post (only [gallery] in post content)
			// note: in the post content, better to use: [gallery size="large"] or [gallery size="full"]
			$srcs = $gallery['src'];

			// Display the gallery in a cool slideshow on index page.
			foreach( $srcs as $src ) {
				$html .= '<div class="item">';
				$html .= '<img src="' . esc_url( $src ) . '" />';
				$html .= '</div>';
			}

		}

	// If no [gallery] in post content, get attached images to the post.
	} else {

		// Set up default arguments.
		$defaults = array(
			'order'          => 'ASC',
			'post_type'      => 'attachment',
			'post_parent'    => get_the_ID(),
			'post_mime_type' => 'image',
			'numberposts'    => -1
		);

		// Retrieves attachments from the post.
		$attachments = get_children( apply_filters( 'beginner_gallery_format_args', $defaults ) );

		// Check if attachments exist.
		if ( $attachments ) {

			// Display the attachment images in a cool slideshow on index page.
			foreach ( $attachments as $attachment ) {
				$html .= '<div class="item">';
					$html .= wp_get_attachment_image( $attachment->ID, $size, false, array( 'class' => 'entry-thumbnail' ) );
					$html .= '</div>';
			}

		} else {

			// if no [gallery] shortcode and has no attachments, bail them out
			return;

		}

	}

	// closing wrapper
	$html .= '</div>';

	// Return the gallery images.
	return $html;

}
endif;

if ( ! function_exists( 'beginner_get_post_format_link_url' ) ) :
/**
 * Forked from hybrid_get_the_post_format_url.
 * Filters 'get_the_post_format_url' to make for a more robust and back-compatible function.  If WP did
 * not find a URL, check the post content for one.  If nothing is found, return the post permalink.
 * Used in Post Format Link
 *
 * @since 1.0.0
 */
function beginner_get_post_format_link_url( $url = '', $post = null ) {

	if ( empty( $url ) ) {

		$post = is_null( $post ) ? get_post() : $post;

		/* Catch links that are not wrapped in an '<a>' tag. */
		$content_url = preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/is', make_clickable( $post->post_content ), $matches );

		$content_url = ! empty( $matches[1] ) ? esc_url_raw( $matches[1] ) : '';

		$url = ! empty( $content_url ) ? $content_url : get_permalink( get_the_ID() );
	}

	if ( $url ) {
	?>
		<h2 class="entry-title">
			<a href="<?php echo esc_url( $url ); ?>" itemprop="url">
				<?php if ( get_the_title() && ( __( '(Untitled)', 'beginner' ) != get_the_title() ) ) { ?>
					<?php the_title(); ?>
				<?php } else { ?>
					<?php echo esc_attr( $url ); ?>
				<?php }	?>
			</a>
		</h2>
	<?php
	}

}
endif;

if ( ! function_exists( 'beginner_footer_text' ) ) :
/**
 * Footer Text
 *
 * @since  1.0.0
 */
function beginner_footer_text() {

	// Get the customizer data
	$footer_text = beginner_mod( PREFIX . 'footer-text' );

	// Polylang integration
	if ( is_polylang_activated() ) {
		$footer_text = pll__( beginner_mod( PREFIX . 'footer-text' ) );
	}

	// Display the data
	echo '<div class="copyright">' . stripslashes( $footer_text ) . '</div>';

}
endif;

if ( ! function_exists( 'beginner_featured_image' ) ) :
/**
 * Featured Image
 * $args = array( $size, $default, $link, $share )
 *
 * @since  1.0.0
 */
function beginner_featured_image( $args ) {

	$size = 'medium_large';
	// for no sidebar
	if ( current_theme_supports( 'theme-layouts' ) && ! is_admin() ) {
		if ( 'layout-1c' == theme_layouts_get_layout() ) {
			$size = 'large';
		}
	}

	$defaults = array(
		'size' => $size,
		'default' => false,
		'link' => true
	);

	$args = wp_parse_args( $args, $defaults );
	extract( $args );

	if ( $default || has_post_thumbnail() ) :
	?>
		<div class="entry-image" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
			<?php if ( $link ) : ?><a class="post-link" href="<?php the_permalink(); ?>"><?php endif; ?>
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( $size, array( 'class' => 'entry-thumbnail', 'alt' => esc_attr( get_the_title() ) ) ); ?>
					<meta itemprop="url" content="<?php echo esc_url( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) ); ?>">
				<?php else: ?>
					<img class="entry-thumbnail" src="<?php echo esc_url( 'http://placehold.it/' . $default . '&amp;text=' . urlencode( get_the_title() ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
					<meta itemprop="url" content="<?php echo esc_url( 'http://placehold.it/' . $default ); ?>">
				<?php endif; ?>
				<?php if ( has_post_format( 'video' ) ) : ?>
					<span class="post-icon">
						<i class="fa fa-play"></i>
					</span>
				<?php endif; ?>
			<?php if ( $link ) : ?></a><?php endif; ?>
			<meta itemprop="width" content="319">
			<meta itemprop="height" content="180">
		</div><!-- .entry-image -->
	<?php
	endif;
}
endif;

if ( ! function_exists( 'beginner_related_deals' ) ) :
/**
 * Related deals.
 *
 * @since  1.0.0
 */
function beginner_related_deals() {

	// Get the data set in customizer
	$enable = beginner_mod( PREFIX . 'related-deals' );
	$title  = beginner_mod( PREFIX . 'related-deals-title' );
	$img    = beginner_mod( PREFIX . 'related-deals-img' );

	// Disable if user choose it.
	if ( $enable == 0 ) {
		return;
	}

	// Polylang integration
	if ( is_polylang_activated() ) {
		$title = pll__( beginner_mod( PREFIX . 'related-deals-title' ) );
	}

	// Get the taxonomy terms of the current page for the specified taxonomy.
	$terms = wp_get_post_terms( get_the_ID(), 'deal_category', array( 'fields' => 'ids' ) );

	// Bail if the term empty.
	if ( empty( $terms ) ) {
		return;
	}

	// Posts query arguments.
	$query = array(
		'post__not_in' => array( get_the_ID() ),
		'tax_query'    => array(
			array(
				'taxonomy' => 'deal_category',
				'field'    => 'id',
				'terms'    => $terms,
				'operator' => 'IN'
			)
		),
		'posts_per_page' => 3,
		'post_type'      => 'deal',
	);

	// Allow dev to filter the query.
	$args = apply_filters( 'beginner_related_deals_args', $query );

	// The post query
	$related = new WP_Query( $args );

	if ( $related->have_posts() ) : ?>

		<div class="grid-posts grid-3-col deals-entries entry-related clearfix">
			<h3 class="heading"><?php echo wp_kses_post( $title ); ?></h3>
			<div class="grid-loop clearfix">
				<?php while ( $related->have_posts() ) : $related->the_post(); ?>
					<?php
					$class = ( 0 == ( $related->current_post + 1 ) % 3 ) ? 'hentry grid last' : 'hentry grid';
					?>
					<article class="<?php echo esc_attr( $class ); ?>">
						<?php if ( $img ) : ?>
							<?php beginner_featured_image( array( 'size' => 'full', 'default' => '326x206' ) ); ?>
						<?php endif; ?>
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</article><!-- .grid -->
				<?php endwhile; ?>
			</div><!-- .grid-loop -->
		</div><!-- .entry-realted -->

	<?php endif;
	// Restore original Post Data.
	wp_reset_postdata();
}
endif;

if ( ! function_exists( 'beginner_deals_nav' ) ) :
/**
 * Related deals.
 *
 * @since  1.0.0
 */
function beginner_deals_nav() {

	$cats = get_terms( 'deal_category' );
	if ( $cats ) :

		// 'All' link
		// for Page Template
		if ( is_page_template( 'page-templates/deals.php' ) ) {
			$all = get_permalink();
		} else {
			// for Archive Deals and else
			$all = get_post_type_archive_link( 'deal' );
		}

		// for taxonomy page
		$current = get_queried_object();
		$current_term = '';
		if ( isset( $current->term_id ) )
			$current_term = $current->term_id;
	?>
		<nav class="deals-nav clearfix">
			<ul class="clearfix">
				<li class="section-text"><?php _e( 'Browse:', 'beginner' ); ?></li>
				<li <?php if ( ! $current_term ) echo ' class="' . esc_attr( 'current' ) . '"'; ?>><a href="<?php echo esc_url( $all ); ?>"><?php _e( 'All', 'beginner' ); ?></a></li>

				<?php foreach ( $cats as $cat ) : ?>
					<li<?php if ( $current_term == $cat->term_id ) echo ' class="' . esc_attr( 'current' ) . '"'; ?>><a href="<?php echo esc_url( get_term_link( $cat->term_id ) ); ?>"><?php echo wp_kses_post( $cat->name ); ?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav><!-- .deals-nav -->
	<?php endif;
}
endif;
