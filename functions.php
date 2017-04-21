<?php
/**
 * pr_company functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pr_company
 */

if ( ! function_exists( 'pr_company_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pr_company_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on pr_company, use a find and replace
	 * to change 'pr_company' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'pr_company', get_template_directory() . '/languages' );

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

	add_image_size( 'pr-slider-image', 714, 570, true );

	add_image_size( 'pr-slider-thumb', 200, 160, true );


	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'pr_company' ),
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
	add_theme_support( 'custom-background', apply_filters( 'pr_company_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );


}
endif;
add_action( 'after_setup_theme', 'pr_company_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pr_company_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pr_company_content_width', 640 );
}
add_action( 'after_setup_theme', 'pr_company_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pr_company_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pr_company' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pr_company' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pr_company_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pr_company_scripts() {
	wp_enqueue_style( 'pr_company-style', get_stylesheet_uri() );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array() , false, true );
	wp_enqueue_script( 'pr_company-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'pr_company-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array() , false, true );
	wp_enqueue_script( 'flexsettings', get_template_directory_uri() . '/js/flex-settings.js', array() , false, true );
	

 

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pr_company_scripts' );

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



add_filter('dfi_post_types', 'filter_post_types');
function filter_post_types() {
	return array('post', 'artist'); //will display DFI in post and page
}



/* Defines a function to get the slug of the first tag.
  The functions  has 2 variables, representing the custom post type e.x. artist, and the custom taxonomy used to link that to the another bit of content e.x. (confusingly) artists*/
  
  
  function get_tag_thumbnail($the_term, $parent_term){
	  /*Gets an array of 'tags' associated with the_term */
	  $terms = get_the_terms( $post->ID, $the_term );
	  $the_parent_term = $parent_term;
	  //checks to see if there actually are any things tagged
	if ( !empty( $terms ) ){
		// get the first term
		$term = array_shift( $terms );
		//gets the slug from that term and calls it $termslug
		$termslug = $term->slug;
		/*echo $termslug;*/
	 //Gets the ID of the post and calls it $id
		if ( $post = get_page_by_path( $termslug, OBJECT, $the_parent_term ) )
    $id = $post->ID;
else
//if it can't do this, defines $id as null
    $id = 0;
	//creates an image tag for the associated post using the 'thumbnail' version
echo get_the_post_thumbnail( $id, 'thumbnail' );
		
	}	
}

 
   //  add_filter( 'the_content', 'my_artist_filter' );

   //  function my_artist_filter( $content ) {
   //      if ( isset($_REQUEST['the_artist']) && is_archive() ) {
   //      	$the_artist_id = wpcf_pr_post_get_belongs( get_the_ID(), 'artist' );
   //      	echo $the_artist_id;
			// $the_artist_post = get_post( $the_artist_id );
			// echo $the_artist_post;
			// $the_artist_name = $the_artist_post->post_title;
			// echo $the_artist_name;
			// 	if ($_REQUEST['artist'] = $the_artist_id){

   //          $content = "<h1>THIE SHIT WORKS</h1>" . $content;
   //          return $content;
   //      }
   //      } else {
   //          return;
   //      }
   //  }