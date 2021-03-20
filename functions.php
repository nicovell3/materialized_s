<?php
/**
 * materialized_s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package materialized_s
 */

if ( ! defined( 'MATERIALIZED_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'MATERIALIZED_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'materialized_s_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function materialized_s_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'materialized_s' ),
				'footer' => esc_html__( 'Secondary', 'materialized_s' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'materialized_s_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'materialized_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function materialized_s_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'materialized_s_content_width', 640 );
}
add_action( 'after_setup_theme', 'materialized_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function materialized_s_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'materialized_s' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'materialized_s' ),
			'before_widget' => '<section id="%1$s" class="col s12 m6 widget %2$s"><div class="card"><div class="card-content">',
			'after_widget'  => '</div></div></section>',
			'before_title'  => '<h2 class="card-title widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'materialized_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function materialized_s_scripts() {
	wp_enqueue_style( 'materialized_s-icons', 'https://fonts.googleapis.com/icon?family=Material+Icons', array(), null, false);
	wp_enqueue_style( 'materialized_s-cdn', 'https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/css/materialize.min.css', array(), null, false );
	wp_enqueue_style( 'materialized_s-style', get_template_directory_uri().'/style.css', array(), MATERIALIZED_S_VERSION );
	if ( strcmp(get_stylesheet_directory_uri(), get_template_directory_uri()) != 0 ) :
		// This will point to style.css in child theme
		wp_enqueue_style( 'materialized_custom-style', get_stylesheet_directory_uri().'/style.css', array(), MATERIALIZED_S_VERSION );
	endif;

	wp_enqueue_script( 'materialized_s-cdn', 'https://cdn.jsdelivr.net/npm/@materializecss/materialize@1.0.0/dist/js/materialize.min.js', array(), null, false );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'materialized_s_scripts' );

/**
 * Remove url field from comments
 */
add_filter('comment_form_field_url', '__return_false');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
