<?php
/**
 * Royale News functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package news_make
 */

if ( ! function_exists( 'news_make_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function news_make_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Royale News, use a find and replace
		 * to change 'news-make' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'news-make');

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

		// Theme Thumbnail image Sizes
		add_image_size( 'news-make-thumbnail-1', 200, 150, true );
		add_image_size( 'news-make-thumbnail-2', 370, 241, true );
		add_image_size( 'news-make-thumbnail-3', 761, 492, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'news-make' ),
			'social' => esc_html__( 'Social', 'news-make' ),
			'footer' => esc_html__( 'Footer', 'news-make' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'news_make_custom_background_args', array(
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
			'height'      => 90,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'news_make_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function news_make_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'news_make_content_width', 640 );
}
add_action( 'after_setup_theme', 'news_make_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function news_make_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Header Advertisement', 'news-make' ),
		'id'            => 'sidebar-5',
		'description'   => esc_html__( 'Add advertisement here.', 'news-make' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'news-make' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'news-make' ),
		'before_widget' => '<div id="%1$s" class="col-md-12 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-info clearfix"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Block1:Featured slider Area', 'news-make' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add Slider Featured Posts widgets here.', 'news-make' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'HomePage Widget Area', 'news-make' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add Main Highlight or Slider Highlight widgets here.', 'news-make' ),
		'before_widget' => '<div class="row clearfix news-section %2$s"><div class="col-md-12">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="section-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'HomePage Bottom Widget Area', 'news-make' ),
		'id'            => 'sidebar-6',
		'description'   => esc_html__( 'Add Widgets Here.', 'news-make' ),
		'before_widget' => '<div class="row clearfix news-section %2$s"><div class="col-md-12">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="section-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'news-make' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add only four widgets here.', 'news-make' ),
		'before_widget' => '<div id="%1$s" class="col-md-3 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-info"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );


	
}
add_action( 'widgets_init', 'news_make_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function news_make_scripts() {
	wp_enqueue_style( 'news-make-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/themes-make/assets/css/bootstrap.css' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/themes-make/assets/css/font-awesome.css' );

	wp_enqueue_style( 'animate', get_template_directory_uri() . '/themes-make/assets/css/animate.css' );

	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/themes-make/assets/css/owl.carousel.css' );

	wp_enqueue_style( 'meanmenu', get_template_directory_uri() . '/themes-make/assets/css/meanmenu.css' );

	wp_enqueue_style( 'news-make-font', news_make_fonts_url(), array(), null );

	wp_enqueue_style( 'news-make-main', get_template_directory_uri() . '/themes-make/assets/css/color-styling.css' );

	wp_enqueue_script( 'news-make-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/themes-make/assets/js/bootstrap.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/themes-make/assets/js/owl.carousel.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'jquery-menumenu', get_template_directory_uri() . '/themes-make/assets/js/jquery.meanmenu.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/themes-make/assets/js/theia-sticky-sidebar.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'news-make-main', get_template_directory_uri() . '/themes-make/assets/js/main.js', array('jquery'), '20151215', true );



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'news_make_scripts' );

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
 * Customizer additions.
 */
require get_template_directory() . '/themes-make/customizer/dynamic.php';

/**
 * Load Breadcrumbs.
 */
require get_template_directory() . '/themes-make/library/breadcrumbs.php';

/**
 * Load theme hooks.
 */
require get_template_directory() . '/themes-make/themes-make-hooks.php';

/**
 * Load Default Options.
 */
require get_template_directory() . '/themes-make/defaults.php';

/**
 * Load Helper Functions.
 */
require get_template_directory() . '/themes-make/themes-make-helpers.php';

/**
 * Load theme filters.
 */
require get_template_directory() . '/themes-make/themes-make-filters.php';

/**
 * Load theme tags.
 */
require get_template_directory() . '/themes-make/theme-tags.php';

/**
 * Load Widgets.
 */
require get_template_directory() . '/themes-make/widgets/main-featured.php';
require get_template_directory() . '/themes-make/widgets/slider-feature.php';
require get_template_directory() . '/themes-make/widgets/widget-init.php';