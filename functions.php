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

//[content-sections]
function contentsections_func( $atts ){

	$lastposts = get_posts( array(
		'numberposts' => 3,
		'orderby'          => 'date',
		'order'            => 'DESC',
		'tax_query'      => array(
			array(
				'taxonomy'  => 'post_tag',
				'field'     => 'slug',
				'terms'     => array($atts['filter'])
			)
		)
	) );
 
	if ( $lastposts ) {

		// $sectionHeader = get_cfc_field( 'homepage-content-sections','content-section-header');
		?>
		<div class='content-section-wrapper content-section'>
			<div class='content-section-header-container'>
				<h2><?= $atts['title'] ?></h2>
			</div>
			<div class='content-section-columns-container custom-wrapper'>
		<?php

		foreach ( $lastposts as $post ) :
			setup_postdata( $post ); ?>
			<div class='content-section-column'>
				<div class='content-section-image' style='background-image: url("<?= get_the_post_thumbnail_url($post); ?>")'></div>
				<div class='content-section-content'>
					<h3><?= $post->post_title; ?></h3>
					<p><?= $post->post_excerpt; ?></p>
					<a class='eco-button' href="<?= get_permalink($post); ?>">Read More</a>
					<div class="categories-container">
						<?php
							$categories = get_the_category($post->ID);
							$separator = ' ';
							$output = '<span>&nbsp;';
							if ( ! empty( $categories ) ) {
									foreach( $categories as $category ) {
											$output .=  esc_html( $category->name ) . $separator;
									}
									$output .= '</span>';
									echo trim( $output, $separator );
							}
						?>
					</div>
				</div>
			</div>
		<?php
		endforeach; 
		wp_reset_postdata();
		?>
	</div>
	</div>
	<?php
	}
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
	$html .= 			do_shortcode('[su_youtube_advanced url="https://youtu.be/br4-C4ptNt4" playlist="" width="600" height="400" responsive="yes" controls="yes" autohide="alt" autoplay="no" mute="no" loop="no" rel="yes" fs="yes" modestbranding="no" theme="dark" wmode="" playsinline="no" title="" class=""]');
	$html .= 		"</div>";
	$html .= 	"</div>";
	$html .= "</div>";
	return $html;
}
add_shortcode( 'after-hero', 'afterhero_func' );

//[secondary-content]
function secondarycontent_func( $atts ){

	$header = get_cfc_field('secondary-content-section', 'secondary-content-header');
	$content = get_cfc_field('secondary-content-section', 'secondary-content-text');
	$linkText = get_cfc_field('secondary-content-section', 'secondary-content-button-text');
	$linkURL = get_cfc_field('secondary-content-section', 'secondary-content-button-url');
	
	$html = "<div class='secondary-content-section after-hero-wrapper after-main-hero'>";
	$html .= 	"<div class='after-hero-container custom-wrapper'>";
	$html .= 		"<div class='after-hero-content'>";
	$html .= 			"<h2>". $header ."</h2>";
	$html .= 			"<p>". $content ."</p>";
	$html .= 			"<a class='custom-button' href='". $linkURL ."'>". $linkText ."</a>";
	$html .= 		"</div>";
	$html .= 		"<div class='after-hero-slideshow'>";
	$html .= 			do_shortcode('[metaslider id="75"]');
	$html .= 		"</div>";
	$html .= 	"</div>";
	$html .= "</div>";
	return $html;
}
add_shortcode( 'secondary-content', 'secondarycontent_func' );

//[fullwidth-section]
function fullwidth_func( $atts ){
	$bgImage = get_cfc_field('homepage-fullwidth-section', 'fullwidth-bg-image');
	$header = get_cfc_field('homepage-fullwidth-section', 'fullwidth-header');
	$content = get_cfc_field('homepage-fullwidth-section', 'fullwidth-content-text');
	$buttonText = get_cfc_field('homepage-fullwidth-section', 'fullwidth-button-text');
	$buttonURL = get_cfc_field('homepage-fullwidth-section', 'fullwidth-button-url');

	$html  =	"<div class='fullwidth-section' style='background-image: url(". ( $bgImage ? $bgImage['url'] : ' ' ) .")'>";
	$html .=	"<div class='overlay'>";
	$html .=		"<div class='fullwidth-container custom-wrapper'>";
	$html .=			"<h2><span>Every second</span> counts.</h2>";
	$html .= 			"<p>". $content ."</p>";
	$html .= 			"<a class='custom-button' href='". $buttonURL ."'>" . $buttonText . "</a>";
	$html .=		"</div>";
	$html .=	"</div>";
	$html .=	"</div>";
	return $html;
}
add_shortcode( 'fullwidth-section', 'fullwidth_func' );

//[experiences-section]
function experiences_func( $atts ){
	$header = get_cfc_field('experiences-section', 'experiences-header');
	$content = get_cfc_field('experiences-section', 'experiences-content');
	$linkURL = get_cfc_field('experiences-section', 'experiences-link-url');
	
	$html = "<div class='experiences-section secondary-content-section after-hero-wrapper after-main-hero'>";
	$html .= 	"<div class='after-hero-container custom-wrapper'>";
	$html .= 		"<div class='after-hero-content'>";
	$html .= 			"<h2>". $header ."</h2>";
	$html .= 			"<p>". $content ."</p>";
	$html .= 		"</div>";
	$html .= 		"<div class='after-hero-slideshow'>";
	$html .= 			"<a href='". $linkURL ."'><img src='https://orpical.com/test/savemothers/wp-content/uploads/2019/10/LP_nnl_2_0_39.png' alt='Click here to learn more!' /></a>";
	$html .= 		"</div>";
	$html .= 	"</div>";
	$html .= 		"<div class='experiences-map-container custom-wrapper'>";
	$html .= 			"<img src='https://orpical.com/test/savemothers/wp-content/uploads/2019/10/experiences-map.png' alt='Experiences World Map' />";
	$html .= 			'<div class="tooltip cambodia"><span class="tooltiptext">Cambodia</span></div>';
	$html .= 			'<div class="tooltip colombia"><span class="tooltiptext">Colombia</span></div>';
	$html .= 			'<div class="tooltip india"><span class="tooltiptext">India</span></div>';
	$html .= 			'<div class="tooltip niger"><span class="tooltiptext">Niger</span></div>';
	$html .= 			'<div class="tooltip nigeria"><span class="tooltiptext">Nigeria</span></div>';
	$html .= 		"</div>";
	$html .= "</div>";
	return $html;
}
add_shortcode( 'experiences-section', 'experiences_func' );