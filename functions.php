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
		 * to change 'fast-trac' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fast-trac', get_template_directory() . '/languages' );



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
			'primary-menu'      => esc_html__( 'Primary', 'fast-trac' ),
			'secondary-menu'    => esc_html__('Secondary', 'fast-trac'),
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
		add_image_size('small-square', 320, 320, true);
		add_image_size( 'medium-square', 640, 640, true );
		add_image_size( 'xlarge', 1200, 9999 );
		add_image_size( 'xxl', 1600, 9999 );
		add_image_size( 'huge', 2000, 9999 );


		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'fasttrac_custom_background_args', array(
			'default-color'     => 'ffffff',
			'default-image'     => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'        => 250,
			'width'         => 250,
			'flex-width'    => true,
			'flex-height'   => true,
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
		'small'     => __('Small', 'fast-trac'),
		'medium'    => __('Medium', 'fast-trac'),
		'large'     => __('Large', 'fast-trac'),
		'xlarge'    => __('XLarge', 'fast-trac'),

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
 * Redirect Private Pages to Login
 */
add_action('template_redirect', 'private_content_redirect_to_login', 9);

function private_content_redirect_to_login() {
global $wp_query,$wpdb;

    if (is_404()) {
        $private = $wpdb->get_row($wp_query->request);
        $location = wp_login_url($_SERVER["REQUEST_URI"]);

        if( 'private' == $private->post_status  ) {
            wp_safe_redirect($location);

    exit;

        }
    }
}

/**
* Change URL for Logo on Login Screen
*/
function my_login_logo_url() {
    return get_home_url();
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
	
	acf_add_options_page(array(
		'page_title'    => 'Fast Trac Theme Settings',
		'menu_title'	=> 'Fast Trac Theme Settings',
		'menu_slug' 	=> 'fasttrac-theme-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));
	
}

function acf_table_styles() {
  echo '<style>
    .acf-table-header-cont,
    .acf-table-body-cont {
        white-space: pre-line;
    }
  </style>';
}

/**
 * Add theme support for WP Job Manager
 *
 */
add_theme_support( 'job-manager-templates' );



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
 * Custom Paginate Links
 *
 * @link https://codex.wordpress.org/Function_Reference/paginate_links
 */
 function pagination($pages = '', $range = 4) {
  $showitems = ($range * 2)+1;

  global $paged;
  if(empty($paged)) $paged = 1;

  if($pages == '') {
      global $wp_query;
      $pages = $wp_query->max_num_pages;
      if(!$pages) {
          $pages = 1;
      }
  }

  if(1 != $pages) {
      echo "<nav aria-label=\"Pagination\"><h5>Page ".$paged." of ".$pages."</h5>\n";
			echo "<ul class=\"pagination text-center\">\n";
      if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo; First</a></li>";
      if($paged > 1 && $showitems < $pages) echo "<li class=\"pagination-prevous\"><a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a></li>";

      for ($i=1; $i <= $pages; $i++) {
          if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
              echo ($paged == $i)? "<li class=\"current\">".$i."</li>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
          }
      }

      if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a></li>";
      if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>Last &raquo;</a></li>";
      echo "</ul>\n";
			echo "</nav>\n";
  }
 }

/**
 * Wrap YouTube Embeds in responsive divs.
 *
 */
function dcwd_youtube_wrapper( $html, $url, $attr, $post_ID ) {
	$classes[] = 'responsive-embed widescreen';
    if (stripos($url, "youtube.com/") !== FALSE || stripos($url, "youtu.be/") !== FALSE) {
		$classes[] = 'video-container';
    }
    return '<div class="' . implode( ' ', $classes ) . '">' . $html . '</div>';
}
add_filter( 'embed_oembed_html', 'dcwd_youtube_wrapper', 10, 4 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fasttrac_widgets_init() {
	register_sidebar( array(
		'name'                      => esc_html__( 'Sidebar', 'fast-trac' ),
		'id'                        => 'sidebar-1',
		'description'               => esc_html__( 'Add widgets here.', 'fast-trac' ),
		'before_widget'             => '<section id="%1$s" class="widget %2$s">',
		'after_widget'              => '</section>',
		'before_title'              => '<h2 class="widget-title">',
		'after_title'               => '</h2>',
	) );

	register_sidebar( array(
		'name' 					    => esc_html__( 'Fast Points Footer Widget Links', 'fast-trac' ),
		'description'			    => esc_html__( 'Appears in the main footer area.', 'fast-trac' ),
		'id'					    => 'fastpoints-footer-widget-links',
		'before_widget'			    => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'              => '</aside>',
		'before_title'			    => '<h5>',
		'after_title'				=> '</h5>',
	) );

	register_sidebar( array(
		'name' 						=> esc_html__( 'Locations Footer Widget Links', 'fast-trac' ),
		'description'			    => esc_html__( 'Appears in the main footer area.', 'fast-trac' ),
		'id'					    => 'locations-footer-widget-links',
		'before_widget'			    => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'			    => '</aside>',
		'before_title'			    => '<h5>',
		'after_title'				=> '</h5>',
	) );

	register_sidebar( array(
		'name' 						=> esc_html__( 'About Footer Widget Links', 'fast-trac' ),
		'description'			    => esc_html__( 'Appears in the main footer area.', 'fast-trac' ),
		'id'						=> 'about-footer-widget-links',
		'before_widget'			    => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'			    => '</aside>',
		'before_title'			    => '<h5>',
		'after_title'				=> '</h5>',
	) );

	register_sidebar( array(
		'name' 						=> esc_html__( 'Legal Footer Widget Links', 'fast-trac' ),
		'description'			    => esc_html__( 'Appears in the main footer area.', 'fast-trac' ),
		'id'						=> 'legal-footer-widget-links',
		'before_widget'			    => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'			    => '</aside>',
		'before_title'			    => '<h5>',
		'after_title'				=> '</h5>',
	) );

	register_sidebar( array(
		'name' 						=> esc_html__( 'Store Locator Homepage Widget', 'fast-trac' ),
		'description'			    => esc_html__( 'Appears in the main footer area.', 'fast-trac' ),
		'id'						=> 'store-locator-homepage-widget',
		'before_widget'			    => '<div="%1$s" class="widget %2$s wpsl-widget">',
		'after_widget'			    => '</div>',
		'before_title'			    => '<h5>',
		'after_title'				=> '</h5>',
	) );

}
add_action( 'widgets_init', 'fasttrac_widgets_init' );

/**
 * Register New Formats for TinyMCE
 *
 *
 */
add_filter( 'tiny_mce_before_init', function ( array $settings = [] ) {

    $formats = [];
    if ( ! empty( $settings['style_formats'] ) && is_string( $settings['style_formats'] ) ) {
        $formats = json_decode( $settings['style_formats'] );
        if ( ! is_array( $formats ) ) {
            $formats = [];
        }
    }
    
    $formats[] = [
        'title'         => __( 'Underlined Heading', 'fast-trac' ),
        'selector'      => 'h1,h2,h3,h4,h5,h6',
        'classes'       => 'heading-underlined',
        'wrapper'       => false,
    ];

    $settings['style_formats'] = json_encode( $formats );

    return $settings;
} );

/**
 * Enqueue scripts and styles.
 */
function fasttrac_scripts() {
  wp_dequeue_style( 'wpsl-styles' );

	wp_enqueue_style( 'fasttrac-style', get_template_directory_uri() . '/css/app.css', array(), '2.0'  );

	wp_enqueue_script( 'fasttrac-wow', get_template_directory_uri() . '/js/wow.min.js', array(), '20151215', true );

	wp_enqueue_script( 'js-cookie', 'https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js', array('jquery'), '20151215', false );

	wp_enqueue_script( 'fasttrac-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'fasttrac-what-input', get_template_directory_uri() . '/js/what-input.min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'fasttrac-foundation', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'fasttrac-app-js', get_template_directory_uri() . '/js/app.js', array('jquery'), '20151215', true );

	if( is_front_page() ){
		wp_enqueue_script( 'fasttrac-functions-js', get_template_directory_uri() . '/js/homescripts.js', array(), '2.0', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fasttrac_scripts' );

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