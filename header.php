<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package materialized_s
 */

require_once 'inc/nav-menu-walker.php';

$blog_info    = get_bloginfo( 'name' );
$description  = get_bloginfo( 'description', 'display' );
$show_title   = ( true == display_header_text() );
$header_class = $show_title && ! has_custom_logo() ? 'brand-logo' : 'screen-reader-text';

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'materialized_s' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="navbar-fixed">
			<nav>
				<div class="nav-wrapper">
				    <?php if ( has_custom_logo() ) : 
						the_custom_logo();
						elseif ( $show_title ) : ?>
					<a class="<?php echo esc_attr( $header_class ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<?php echo esc_html( $blog_info ); ?>
					</a>
					<?php endif; ?>

					<?php if (has_nav_menu( 'primary' )) : ?>
						<a href="#!" data-target="primary-menu" class="sidenav-trigger">
							<i class="material-icons">menu</i>
						</a>
						<?php
							wp_nav_menu(
								array(
									'theme_location'  => 'primary',
									'menu_class'      => 'right hide-on-med-and-down',
									'container'       => false,
									'items_wrap'      => '<ul id="primary-nav" class="%2$s">%3$s</ul>',
									'fallback_cb'     => false,
									'walker'          => new Simple_Walker_Nav_Menu,
								)
							);
							?>
					<?php endif; ?>
				</div>
			</nav>
		</div>
		<?php if (has_nav_menu( 'primary' )) : 
			wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'menu_class'      => 'sidenav',
					'container'       => false,
					'items_wrap'      => '<ul id="primary-menu" class="%2$s">
					<li><div class="user-view">
					<div class="background">
						<img id="sidebar-header-background" src="' . get_template_directory_uri() . '/header.png">
					</div>
					<h3>' . esc_html( $blog_info ) . '</h3>
					</div></li>
					%3$s</ul>',
					'fallback_cb'     => false,
					'walker'          => new Simple_Walker_Nav_Menu,
				)
			); ?>
		<?php endif; ?>
	</header><!-- #masthead -->