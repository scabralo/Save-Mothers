<?php
/**
 * Save Mothers functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Save_Mothers
 */

if ( ! function_exists( 'save_mothers_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function save_mothers_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Save Mothers, use a find and replace
		 * to change 'save-mothers' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'save-mothers', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'save-mothers' ),
			'menu-2' => esc_html__( 'Secondary', 'save-mothers' ),
			'menu-3' => esc_html__( 'Footer Nav', 'save-mothers' ),
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
		add_theme_support( 'custom-background', apply_filters( 'save_mothers_custom_background_args', array(
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
add_action( 'after_setup_theme', 'save_mothers_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function save_mothers_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'save_mothers_content_width', 640 );
}
add_action( 'after_setup_theme', 'save_mothers_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function save_mothers_widgets_init() {
	// register_sidebar( array(
	// 	'name'          => esc_html__( 'Sidebar', 'save-mothers' ),
	// 	'id'            => 'sidebar-1',
	// 	'description'   => esc_html__( 'Add widgets here.', 'save-mothers' ),
	// 	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	// 	'after_widget'  => '</section>',
	// 	'before_title'  => '<h2 class="widget-title">',
	// 	'after_title'   => '</h2>',
	// ) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'save-mothers' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'save-mothers' ),
		'before_widget' => '<div id="%1$s" class="widget widget-1 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'save-mothers' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'save-mothers' ),
		'before_widget' => '<div id="%1$s" class="widget widget-2 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'save-mothers' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'save-mothers' ),
		'before_widget' => '<div id="%1$s" class="widget widget-3 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'save_mothers_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function save_mothers_scripts() {
	wp_enqueue_style( 'save-mothers-style', get_stylesheet_uri() );

	wp_enqueue_script( 'save-mothers-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'save-mothers-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'save_mothers_scripts' );

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

//[main-hero]
function mainhero_func( $atts ){
	$bgImage = get_cfc_field('homepage-main-hero', 'hero-background');
	$heroHeader = get_cfc_field('homepage-main-hero', 'hero-header');
	$heroContent = get_cfc_field('homepage-main-hero', 'hero-content');
	$primaryLinkText = get_cfc_field('homepage-main-hero', 'hero-primary-link-text');
	$primaryLinkURL = get_cfc_field('homepage-main-hero', 'hero-primary-link-url');
	$secondaryLinkText = get_cfc_field('homepage-main-hero', 'hero-secondary-link-text');
	$secondaryLinkURL = get_cfc_field('homepage-main-hero', 'hero-secondary-link-url');
	$html = '';
	
	$html .= "<div class='main-hero-wrapper main-hero' style='background-image: url(". ( $bgImage ? $bgImage['url'] : ' ' ) .")'>";
	$html .= 	"<div class='main-hero-container'>";
	$html .= 		"<div class='main-hero-content'>";
	$html .= 			"<h2>" . ( $heroHeader ? $heroHeader : ' ' ) . "</h2>";
	$html .= 			"<p>" . ( $heroContent ? $heroContent : ' ') . "</p>";
	$html .= 			"<p><a class='custom-button' href='". ( $primaryLinkURL ? $primaryLinkURL : ' ' ) ."'>" . ( $primaryLinkText ? $primaryLinkText : ' ' ) . "</a></p>";
	$html .= 		"</div>";
	$html .= 		"<a class='custom-link' href='". ( $secondaryLinkURL ? $secondaryLinkURL : ' ' ) ."'>" . ( $secondaryLinkText ? $secondaryLinkText : ' ' ) . "</a>";
	$html .= 	"</div>";
	$html .= "</div>";
	
	return $html;
}
add_shortcode( 'main-hero', 'mainhero_func' );

//[after-content-section]
function aftercontentsection_func( $atts ){
	$html = "<div class='after-content-section bottom-section-wrapper content-section'>";
	$html .= 	"<div class='bottom-section-container'>";
	foreach( get_cfc_meta( 'homepage-after-content-section' ) as $key => $value ){
		$imageId = get_cfc_field( 'homepage-after-content-section','after-content-image', false, $key );
		$image = wp_get_attachment_image_src( $imageId, $size = 'full' );
		$header = get_cfc_field( 'homepage-after-content-section','after-content-header', false, $key );
		$content = get_cfc_field( 'homepage-after-content-section','after-content-text', false, $key );
		$buttonText = get_cfc_field( 'homepage-after-content-section','after-content-button-text', false, $key );
		$buttonLink = get_cfc_field( 'homepage-after-content-section','after-content-button-link', false, $key );
		
		$html .=		"<div class='bottom-section-content'>";
		$html .= 			"<div class='bottom-section-content-wrapper'>";
		$html .=				"<img src='". $imageId['url'] ."'/>";
		$html .=				"<div>";
		$html .=	 				"<div class='bottom-section-header-wrapper'><h2>" . $header . "</h2></div>";
		$html .=					"<p>". $content ."</p>";
		$html .= 					"<a class='button' href='". $buttonLink ."'>" . $buttonText . "</a>";
		$html .=				"</div>";
		$html .=			"</div>";
		$html .=		"</div>";
	}
	$html .=	"</div>";
	$html .= "</div>";
	return $html;
}
add_shortcode( 'after-content-section', 'aftercontentsection_func' );

//[field-content-section]
function fieldcontentsection_func( $atts ){
	$html = "<div class='bottom-section-wrapper content-section'>";
	$html .= "<div class='content-section-header-container'><h2>Field Experiences</h2></div>";
	$html .= 	"<div class='bottom-section-container'>";
	foreach( get_cfc_meta( 'homepage-field-content-section' ) as $key => $value ){
		$header = get_cfc_field( 'homepage-field-content-section','field-section-header', false, $key );
		$content = get_cfc_field( 'homepage-field-content-section','field-section-content', false, $key );
		$buttonText = get_cfc_field( 'homepage-field-content-section','field-section-button-text', false, $key );
		$buttonLink = get_cfc_field( 'homepage-field-content-section','field-section-button-link', false, $key );
		
		$html .=		"<div class='bottom-section-content'>";
		$html .= 			"<div class='bottom-section-header-wrapper'><h2>" . $header . "</h2></div>";
		$html .= 			"<div class='bottom-section-content-wrapper'>";
		$html .=				"<p>". $content ."</p>";
		$html .= 				"<a class='button' href='". $buttonLink ."'>" . $buttonText . "</a>";
		$html .=			"</div>";
		$html .=		"</div>";
	}
	$html .=	"</div>";
	$html .= "</div>";
	return $html;
}
add_shortcode( 'field-content-section', 'fieldcontentsection_func' );

//[content-sections]
function contentsections_func( $atts ){
	$html = '';

	foreach( get_cfc_meta( 'homepage-content-sections' ) as $key => $value ){
		$sectionHeader = get_cfc_field( 'homepage-content-sections','content-section-header', false, $key );

		$leftBgImageId = get_cfc_field( 'homepage-content-sections','content-section-left-image', false, $key );
		$leftBgImage = wp_get_attachment_image_src( $leftBgImageId, $size = 'full' );
		$leftHeader = get_cfc_field( 'homepage-content-sections','content-section-left-header', false, $key );
		$leftContent = get_cfc_field( 'homepage-content-sections','content-section-left-content', false, $key );
		$leftButtonText = get_cfc_field( 'homepage-content-sections','content-section-left-button-text', false, $key );
		$leftButtonLink = get_cfc_field( 'homepage-content-sections','content-section-left-button-link', false, $key );

		$rightBgImageId = get_cfc_field( 'homepage-content-sections','content-section-right-image', false, $key );
		$rightBgImage = wp_get_attachment_image_src( $rightBgImageId, $size = 'full' );
		$rightHeader = get_cfc_field( 'homepage-content-sections','content-section-right-header', false, $key );
		$rightContent = get_cfc_field( 'homepage-content-sections','content-section-right-content', false, $key );
		$rightButtonText = get_cfc_field( 'homepage-content-sections','content-section-right-button-text', false, $key );
		$rightButtonLink = get_cfc_field( 'homepage-content-sections','content-section-right-button-link', false, $key );

		$html .= "<div class='content-section-wrapper content-section'>";

		$html .= 	"<div class='content-section-header-container'>";
		$html .= 		"<h2>". $sectionHeader ."</h2>";
		$html .=	"</div>";

		$html .= 	"<div class='content-section-columns-container custom-wrapper'>";

		$html .=		"<div class='content-section-column'>";
		$html .=			"<div class='content-section-image' style='background-image: url(". $leftBgImage[0] .")'></div>";
		$html .=			"<div class='content-section-content'>";
		$html .= 				"<h3>". $leftHeader ."</h3>";
		$html .= 				"<p>". $leftContent ."</p>";
		$html .= 				"<a class='eco-button' href='". $leftButtonLink ."'>" . $leftButtonText . "</a>";
		$html .=			"</div>";
		$html .=		"</div>";

		$html .=		"<div class='content-section-column'>";
		$html .=			"<div class='content-section-image' style='background-image: url(". $rightBgImage[0] .")'></div>";
		$html .=			"<div class='content-section-content'>";
		$html .= 				"<h3>". $rightHeader ."</h3>";
		$html .= 				"<p>". $rightContent ."</p>";
		$html .= 				"<a class='eco-button' href='". $rightButtonLink ."'>" . $rightButtonText . "</a>";
		$html .=			"</div>";
		$html .=		"</div>";

		$html .=	"</div>";

		$html .= "</div>";
	}
	return $html;
}
add_shortcode( 'content-sections', 'contentsections_func' );

//[after-hero]
function afterhero_func( $atts ){

	$header = get_cfc_field('after-hero-section', 'after-hero-heading');
	$content = get_cfc_field('after-hero-section', 'after-hero-content');
	$linkText = get_cfc_field('after-hero-section', 'after-hero-link-text');
	$linkURL = get_cfc_field('after-hero-section', 'after-hero-link-url');
	
	$html = "<div class='after-hero-wrapper after-main-hero'>";
	$html .= 	"<div class='after-hero-container custom-wrapper'>";
	$html .= 		"<div class='after-hero-content'>";
	$html .= 			"<h2>". $header ."</h2>";
	$html .= 			"<p>". $content ."</p>";
	$html .= 		"</div>";
	$html .= 		"<div class='after-hero-slideshow'>";
	$html .= 			do_shortcode('[metaslider id="75"]');
	$html .= 		"</div>";
	$html .= 	"</div>";
	$html .= "</div>";
	return $html;
}
add_shortcode( 'after-hero', 'afterhero_func' );

//[news-events]
function newsevents_func( $atts ){

	$imageId = get_cfc_field( 'news-events','news-events-image');
	$header = get_cfc_field('news-events', 'news-events-title');
	$subHeader = get_cfc_field('news-events', 'news-events-sub-title');
	$content = get_cfc_field('news-events', 'news-events-content');
	$buttonText = get_cfc_field('news-events', 'news-events-button-text');
	$buttonLink = get_cfc_field('news-events', 'news-events-button-url');
	
	$html = "<div class='news-events-section after-hero-wrapper after-main-hero'>";
	$html .= 	"<div class='after-hero-container custom-wrapper'>";
	$html .= 		"<div class='after-hero-content'>";
	$html .= 			"<h2>". $header ."</h2>";
	$html .= 			"<h3>". $subHeader ."</h3>";
	$html .= 			"<p>". $content ."</p>";
	$html .= 			"<a class='button' href='". $buttonLink ."'>" . $buttonText . "</a>";
	$html .= 		"</div>";
	$html .= 		"<div class='after-hero-slideshow'>";
	$html .=			"<img src='". $imageId['url'] ."'/>";
	$html .= 		"</div>";
	$html .= 	"</div>";
	$html .= "</div>";
	return $html;
}
add_shortcode( 'news-events', 'newsevents_func' );