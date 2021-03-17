<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package materialized_s
 */

?>
	<footer id="colophon" class="page-footer blue">
		<?php if ( has_nav_menu( 'footer' ) ) : ?>
		<div class="container">
			<div class="row">
				<div class="col s12 center">
					<ul>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
								'items_wrap'     => '%3$s',
								'container'      => false,
								'depth'          => 1,
								'link_before'    => '<span>',
								'link_after'     => '</span>',
								'fallback_cb'    => false,
							)
						);
						?>
					</ul>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="footer-copyright">
			<div class="container center">
				© <?php echo date("Y"); ?> Copyright <?php bloginfo( 'name' ); ?>
			</div>
		</div>
    </footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
