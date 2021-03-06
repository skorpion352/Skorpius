<?php
/**
 * skorpius functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package skorpius
 */

if ( ! function_exists( 'skorpius_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function skorpius_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on skorpius, use a find and replace
	 * to change 'skorpius' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'skorpius', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'skorpius' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'skorpius_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'skorpius_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function skorpius_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'skorpius_content_width', 640 );
}
add_action( 'after_setup_theme', 'skorpius_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function skorpius_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'skorpius' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'skorpius' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'skorpius_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function skorpius_scripts() {
    // Deregister the jquery version bundled with WordPress.
    wp_deregister_script( 'jquery' );

    // JavaScript Files
    wp_enqueue_script( 'skorpius-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
    wp_enqueue_script( 'skorpius-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
    wp_enqueue_script( 'skorpius-jquery', get_template_directory_uri() . '/js/vendor/jquery.js', array(), '', false );
    wp_enqueue_script( 'skorpius-input', get_template_directory_uri() . '/js/vendor/what-input.js', array(), '', true );
    wp_enqueue_script( 'skorpius-foundation', get_template_directory_uri() . '/js/vendor/foundation.js', array(), '', true );
    wp_enqueue_script( 'skorpius-app', get_template_directory_uri() . '/js/app.js', array(), '', true );

    // CSS
    wp_enqueue_style( 'skorpius-normalize', get_template_directory_uri() . '/css/normalize.css' );                   // Normalize
    wp_enqueue_style( 'skorpius-foundation', get_template_directory_uri() . '/css/foundation.css' );             // Foundation
    wp_enqueue_style( 'skorpius-font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.css' );         // Font Awesome
    wp_enqueue_style( 'skorpius-style', get_stylesheet_uri() );                                                         // Main CSS Stylesheet

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skorpius_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Change the class for sticky posts to .wp-sticky to avoid conflicts with Foundation's Sticky plugin
 *
 * @package Skorpius
 * @since Skorpius 0.1
 */

if ( ! function_exists( 'skorpius' ) ) :
    function skorpius_sticky_posts( $classes ) {
        if ( in_array( 'sticky', $classes, true ) ) {
            $classes = array_diff($classes, array('sticky'));
            $classes[] = 'wp-sticky';
        }
        return $classes;
    }
    add_filter('post_class','skorpius_sticky_posts');

endif;