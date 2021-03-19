<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package materialized_s
 */

/**
 * The idea for this page is to let the designer to format with HTML any desired content 
 */ 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="parallax-container page-header">
		<?php the_title( '<h1>', '</h1>' ); ?>
		<div class="parallax"><img class="page-header-img" src="<?php echo get_template_directory_uri(); ?>/header.png"></div>
	</div>

	<!-- post_thumbnail
	<?php materialized_s_post_thumbnail(); ?> -->

	<?php the_content(); ?>

	<!-- wp_link_pages
	<?php wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'materialized_s' ),
			'after'  => '</div>',
		)
	);
	?> -->

	<?php if ( get_edit_post_link() ) : ?>
		<div id="edit-page-btn" class="fixed-action-btn">
			<?php edit_post_link( '<i class="large material-icons">mode_edit</i>', '', '', $post, 'btn-floating btn-large red' ); ?>
		</div> <!-- #edit-page-btn -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
