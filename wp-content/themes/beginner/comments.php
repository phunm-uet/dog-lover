<?php
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<h3 class="heading">
	<span><?php _e( 'Comments', 'beginner' ); ?></span>
	<?php printf( '(%s)', number_format_i18n( get_comments_number() ) ); ?>
</h3>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

		<!--Post Comment Start-->
		<div class="post-comment wrap">

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav id="comment-nav-above" class="comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'beginner' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'beginner' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'beginner' ) ); ?></div>
			</nav><!-- #comment-nav-above -->
			<?php endif; // check for comment navigation ?>

			<ul class="comment-list">
				<?php wp_list_comments( array( 'callback' => 'beginner_comment', 'style' => 'ul' ) ); ?>
			</ul><!-- .comment-list -->

			<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav id="comment-nav-below" class="comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'beginner' ); ?></h1>
				<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'beginner' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'beginner' ) ); ?></div>
			</nav><!-- #comment-nav-below -->
			<?php endif; // check for comment navigation ?>

		</div><!-- .post-comment -->
		<!--Post Comment End-->

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'beginner' ); ?></p>
	<?php endif; ?>

	<?php
		$req      = get_option( 'require_name_email' );
		$required_text = sprintf( ' ' . __( 'Required fields are marked %s', 'beginner' ), '<span class="required">*</span>' );

		comment_form(
			array(
				'class_submit'         => 'submit btn',
				'comment_field'        => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="7" aria-required="true">' . '</textarea></p>',
				'comment_notes_before' => false,
				'comment_notes_after'  => ( ! is_user_logged_in() ) ? '<p class="comment-form-desc">' . __( 'Your email address will not be published.', 'beginner' ) . ( $req ? $required_text : '' ) . '</p>' : false
			)
		);
	?>

</div><!-- #comments -->
