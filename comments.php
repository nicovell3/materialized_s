<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package materialized_s
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area container">

	<?php
	if ( have_comments() ) :
		?>
		<h4 class="comments-title">
			<?php
			$materialized_s_comment_count = get_comments_number();
			if ( '1' === $materialized_s_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'materialized_s' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $materialized_s_comment_count, 'comments title', '_s' ) ),
					number_format_i18n( $materialized_s_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h4><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		/*
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'materialized_s' ); ?></p>
			<?php
		endif;
		*/

	endif; // Check for have_comments().

	//Declare Vars for translation
	$comment_send = 'Send';
	$comment_reply = 'Post a comment';
	$comment_reply_to = 'Reply';
	$comment_author = 'Name';
	$comment_email = 'E-Mail';
	$comment_label = 'Comment';
	$comment_cookies_1 = ' By commenting you accept the';
	$comment_cookies_2 = ' Privacy Policy';
	$comment_before = '';
	$comment_cancel = 'Cancel Reply';
	
	//Array
	$comments_args = array(
		'class_container' => 'comment-form row',
		'title_reply_before' => __( '<h5 id="reply-title" class="comment-reply-title">' ),
		'title_reply' => __( $comment_reply ),
		'title_reply_after' => __( '</h5>' ),
		'fields' => array(
			'author' => '<div class="input-field col s12 m6">
				<i class="material-icons prefix">account_box</i>
				<input id="author" name="author" aria-required="true" placeholder="' . $comment_author .'">
				</input>
				</div>',
			'email' => '<div class="input-field col s12 m6">
				<i class="material-icons prefix">mail</i>
				<input id="email" name="email" aria-required="true" placeholder="' . $comment_email .'">
				</input>
				</div>',
			'cookies' => '<label>' . $comment_cookies_1 . '<a href="' . get_privacy_policy_url() . '">' . $comment_cookies_2 . '</a>.</label>',
		),
		'comment_notes_before' => __( $comment_before),
		'comment_field' => '<div class="input-field col s12">
		<textarea id="comment" class="materialize-textarea" name="comment" aria-required="true"></textarea>
		<label for="comment">' . $comment_label .'</label></div>',
		'comment_notes_after' => '',
		'id_submit' => __( 'comment-submit' ),
		'label_submit' => __( $comment_send ),
		'class_submit' => __( 'waves-effect waves-light btn' ),
		'submit_button' => __( '<button name="%1$s" id="%2$s" class="%3$s">%4$s<i class="material-icons right">send</i></button>' ),
		'submit_fied' => __( '<div class="form-submit input-field col s12">%1$s %2$s</div>' ),
		'title_reply_to' => __( $comment_reply_to ),
		'cancel_reply_link' => __( $comment_cancel ),
	);
	comment_form( $comments_args );
	?>

</div><!-- #comments -->
