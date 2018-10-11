<?php
/**
 * Fast Trac functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Fast_Trac
 */

if ( ! function_exists( 'fasttrac_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fasttrac_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Fast Trac, use a find and replace
		 * to change 'fasttrac' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fasttrac', get_template_directory() . '/languages' );



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

		// This theme uses wp_nav_menu() in one location and uses a secondary menu.
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary', 'fasttrac' ),
			'secondary-menu' => esc_html__('Secondary', 'fasttrac'),
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

		/**
			* Enable support for Post Thumbnails on posts and pages.
			*
			* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
			*/
			add_theme_support( 'post-thumbnails' );

			add_image_size( 'small', 320, 9999 );
			add_image_size( 'medium', 640, 9999 );
			add_image_size( 'large', 1024, 9999 );
			add_image_size( 'xlarge', 1200, 9999 );
			add_image_size( 'xxl', 1600, 9999 );
			add_image_size( 'huge', 2000, 9999 );


		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'fasttrac_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'fasttrac_setup' );

/**
	* Add image sizes to Media Dialog
	*
	*/
	add_filter( 'image_size_names_choose', 'fasttrac_custom_sizes' );

	function fasttrac_custom_sizes( $sizes ) {
		return array_merge( $sizes, array(
			'small' => __('Small'),
			'medium' => __('Medium'),
			'large' => __('Large'),
			'xlarge' => __('XLarge'),

		));
	}

/**
* Disable default error login message
*/
function no_wordpress_errors(){
	return 'Wrong username and/or password. Please try again.';
}
add_filter( 'login_errors', 'no_wordpress_errors' );

/**
 * Enqueue Custom Login
 */
 function fasttrac_custom_login() {
	 echo '<link rel="stylesheet" type="text/css" href="' . get_stylesheet_directory_uri() . '/css/wplogin.css" />';
 }
 add_action('login_head', 'fasttrac_custom_login');


/**
* Change URL for Logo on Login Screen
*/

function my_login_logo_url() {
return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
return 'Fast Trac';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

/**
 * Enable ACF Options Page
 *
 */
 if( function_exists('acf_add_options_page') ) {
 	acf_add_options_page();
 }

/**
* Enable custom templates for WP Store Locator
*
*/
add_filter( 'wpsl_templates', 'custom_templates' );

function custom_templates( $templates ) {

    /**
     * The 'id' is for internal use and must be unique ( since 2.0 ).
     * The 'name' is used in the template dropdown on the settings page.
     * The 'path' points to the location of the custom template,
     * in this case the folder of your active theme.
     */
    $templates[] = array (
        'id'   => 'custom',
        'name' => 'Custom template',
        'path' => get_stylesheet_directory() . '/' . 'wpsl-templates/wpsl-custom.php',
    );

    return $templates;
}


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fasttrac_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'fasttrac_content_width', 640 );
}
add_action( 'after_setup_theme', 'fasttrac_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fasttrac_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'fasttrac' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'fasttrac' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name' 							=> esc_html__( 'Fast Points Footer Widget Links', 'fasttrac' ),
		'description'			  => esc_html__( 'Appears in the main footer area.', 'fasttrac' ),
		'id'								=> 'fastpoints-footer-widget-links',
		'before_widget'			=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'			=> '</aside>',
		'before_title'			=> '<h5>',
		'after_title'				=> '</h5>',
	) );
	register_sidebar( array(
		'name' 							=> esc_html__( 'Locations Footer Widget Links', 'fasttrac' ),
		'description'			  => esc_html__( 'Appears in the main footer area.', 'fasttrac' ),
		'id'								=> 'locations-footer-widget-links',
		'before_widget'			=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'			=> '</aside>',
		'before_title'			=> '<h5>',
		'after_title'				=> '</h5>',
	) );
	register_sidebar( array(
		'name' 							=> esc_html__( 'About Footer Widget Links', 'fasttrac' ),
		'description'			  => esc_html__( 'Appears in the main footer area.', 'fasttrac' ),
		'id'								=> 'about-footer-widget-links',
		'before_widget'			=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'			=> '</aside>',
		'before_title'			=> '<h5>',
		'after_title'				=> '</h5>',
	) );
	register_sidebar( array(
		'name' 							=> esc_html__( 'Legal Footer Widget Links', 'fasttrac' ),
		'description'			  => esc_html__( 'Appears in the main footer area.', 'fasttrac' ),
		'id'								=> 'legal-footer-widget-links',
		'before_widget'			=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget'			=> '</aside>',
		'before_title'			=> '<h5>',
		'after_title'				=> '</h5>',
	) );
	register_sidebar( array(
		'name' 							=> esc_html__( 'Store Locator Homepage Widget', 'fasttrac' ),
		'description'			  => esc_html__( 'Appears in the main footer area.', 'fasttrac' ),
		'id'								=> 'store-locator-homepage-widget',
		'before_widget'			=> '<div="%1$s" class="widget %2$s wpsl-widget">',
		'after_widget'			=> '</div>',
		'before_title'			=> '<h5>',
		'after_title'				=> '</h5>',
	) );

}
add_action( 'widgets_init', 'fasttrac_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fasttrac_scripts() {
	// wp_enqueue_style( 'fasttrac-style', get_stylesheet_uri() );


  wp_dequeue_style( 'wpsl-styles' );

	wp_enqueue_style( 'fasttrac-style', get_template_directory_uri() . '/css/app.css' );

	wp_enqueue_script( 'fasttrac-what-input', get_template_directory_uri() . '/js/what-input.min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'fasttrac-foundation', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'fasttrac-wow', get_template_directory_uri() . '/js/wow.min.js', array(), '20151215', true );

	wp_enqueue_script( 'fasttrac-app-js', get_template_directory_uri() . '/js/app.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'fasttrac-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fasttrac_scripts' );


/**
 * Disable auto-formatting shortcodes
 */
remove_filter('the_content', 'wpautop');
add_filter('the_content', 'wpautop', 99);

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
