<?php
/**
 * TINT Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package TINT_Blog
 */

if ( ! function_exists( 'tint_blog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function tint_blog_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on TINT Blog, use a find and replace
	 * to change 'tint-blog' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'tint-blog', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'tint-blog' ),
		'menu-2' => esc_html__( 'Secondary', 'tint-blog' ),
		'menu-3' => esc_html__( 'Tertiary', 'tint-blog' ),
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
	add_theme_support( 'custom-background', apply_filters( 'tint_blog_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'tint_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tint_blog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'tint_blog_content_width', 640 );
}
add_action( 'after_setup_theme', 'tint_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
add_action( 'widgets_init', 'tint_blog_widgets_init' );
function tint_blog_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Home Page Sidebar', 'tint-blog' ),
        'id' => 'home-sidebar',
        'description' => __( 'Widgets in this area will be shown on home page.'),
    ) );
	register_sidebar( array(
        'name' => __( 'Single Post Sidebar', 'tint-blog' ),
        'id' => 'post-sidebar',
        'description' => __( 'Widgets in this area will be shown on blog post pages.'),
    ) );
}

/**
 * Enqueue scripts and styles.
 */
function tint_blog_scripts() {
	wp_enqueue_style( 'tint-blog-style', get_stylesheet_uri() );

	wp_enqueue_script( 'tint-blog-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '20151215', true );

	wp_enqueue_script( 'tint-blog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'tint-blog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tint_blog_scripts' );

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
 * Enqueue Bootstrap CDN.
 */

function tint_blog_bootstrap() {
    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css');
    wp_enqueue_style('style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'tint_blog_bootstrap');

function tint_blog_bootstrapjs(){
	wp_enqueue_script( 'jquerylatest', '//ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js');
    wp_enqueue_script( 'tether-js', '//cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js');
    wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js');
}
add_action('wp_enqueue_scripts','tint_blog_bootstrapjs');

//enqueues our external font awesome stylesheet
function tint_blog_fontawesome(){
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); 
}
add_action('wp_enqueue_scripts','tint_blog_fontawesome');

//enqueues our external lightbox js and stylesheet
function tint_blog_lightbox(){
	wp_enqueue_style('lightbox', '//cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.1.1/ekko-lightbox.min.css');
	wp_enqueue_script( 'lightbox-js', 'https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.1.1/ekko-lightbox.js');
}
add_action('wp_enqueue_scripts','tint_blog_lightbox');

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

// Add custom thumbnail sizes
add_image_size( 'most-recent', 420, 270, true );
add_image_size( 'recent-posts', 120, 100, true );
add_image_size( 'archive-results', 230, 140, true );
add_image_size( 'responsive-blog', 375, 245, true );

add_filter( 'image_size_names', 'custom_sizes' );
 
function custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'most-recent' => __( 'Most Recent' ),
        'recent-posts' => __( 'Recent Posts' ),
    ) );
}

// Remove admin bar
add_filter('show_admin_bar', '__return_false');

// Add Twitter to author's bio
function modify_contact_methods($profile_fields) {

// Add new fields
$profile_fields['twitter'] = 'Twitter Username';
return $profile_fields;
}
add_filter('user_contactmethods', 'modify_contact_methods');

// Add Disqus comments
function disqus_embed($disqus_shortname, $post_id, $dposttitle) {
    global $post;
    wp_enqueue_script('disqus_embed','http://'.$disqus_shortname.'.disqus.com/embed.js');
    echo '<div id="disqus_thread"></div>
    <script type="text/javascript">
        var disqus_shortname = "'.$disqus_shortname.'";
        var disqus_title = "'.$dposttitle.'";
        var disqus_url = "'.get_permalink($post_id).'";
        var disqus_identifier = "'.$disqus_shortname.'-'.$post_id.'";
    </script>';
}