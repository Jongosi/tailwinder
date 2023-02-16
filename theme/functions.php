<?php
/**
 * TailWinder functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TailWinder
 */

if ( ! defined( 'TAILWINDER_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'TAILWINDER_VERSION', '0.1.0' );
}

if ( ! function_exists( 'tailwinder_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tailwinder_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on TailWinder, use a find and replace
		 * to change 'tailwinder' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tailwinder', get_template_directory() . '/languages' );

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
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'menu-1' => __( 'Primary', 'tailwinder' ),
				'menu-2' => __( 'Footer Menu', 'tailwinder' ),
				'menu-3' => __( 'Tertiary', 'tailwinder' ),
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

		// Add support for custom logo
		add_theme_support(
			'custom-logo',
			array(
				'height' => 40,
				'width' => 200,
				'flex-width' => true,
				'flex-height' => true,
				'header-text' => array( 'site-title', 'site-description' ),
				'unlink-homepage-logo' => true, 
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );
	}
endif;
add_action( 'after_setup_theme', 'tailwinder_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tailwinder_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'tailwinder' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your footer column 1.', 'tailwinder' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'tailwinder' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer column 2.', 'tailwinder' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 3', 'tailwinder' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer column 3.', 'tailwinder' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 4', 'tailwinder' ),
			'id'            => 'sidebar-4',
			'description'   => __( 'Add widgets here to appear in your footer column 4.', 'tailwinder' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'tailwinder_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function tailwinder_scripts() {
	wp_enqueue_style( 'tailwinder-style', get_stylesheet_uri(), array(), TAILWINDER_VERSION );
	wp_enqueue_script( 'tailwinder-script', get_template_directory_uri() . '/js/script.min.js', array(), TAILWINDER_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tailwinder_scripts' );

/**
 * Add the block editor class to TinyMCE.
 *
 * This allows TinyMCE to use Tailwind Typography styles.
 *
 * @param array $settings TinyMCE settings.
 * @return array
 */
function tailwinder_tinymce_add_class( $settings ) {
	$settings['body_class'] = 'block-editor-block-list__layout';
	return $settings;
}
add_filter( 'tiny_mce_before_init', 'tailwinder_tinymce_add_class' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
