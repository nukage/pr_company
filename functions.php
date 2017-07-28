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
	wp_register_script( 'imagesloaded', get_theme_file_uri( '/js/libs/imagesloaded.pkgd.min.js' ), array( 'jquery' ), '4.1.1', true );
	wp_register_script( 'isotope', get_theme_file_uri( '/js/libs/isotope.pkgd.min.js' ), array( 'imagesloaded' ), '3.0.1', true );
	wp_enqueue_script( 'main', get_theme_file_uri( '/js/main2.js' ), array( 'isotope' ), '1.0', true );
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.min.js', array() , false, true );
	wp_enqueue_script( 'wow-settings', get_template_directory_uri() . '/js/wow-settings.js', array() , false, true );
	

 

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



function metakey_no_featured( $where )
{
    global $wp_query;
    global $wpdb;
    $where .= $wpdb->prepare(" AND $wpdb->posts.ID NOT IN ( SELECT post_id FROM $wpdb->postmeta WHERE ($wpdb->postmeta.post_id = $wpdb->posts.ID) AND meta_key = %s AND meta_value = 1) ",'tour_widget');

    return $where;
}



 

//Custom Theme Settings
add_action('admin_menu', 'add_gcf_interface');

function add_gcf_interface() {
	add_options_page('Global Custom Fields', 'Global Custom Fields', '8', 'functions', 'editglobalcustomfields');
}

function editglobalcustomfields() {
	?>
	<div class='wrap'>
	<h2>Global Custom Fields</h2>
	<form method="post" action="options.php">
	<?php wp_nonce_field('update-options') ?>

	<p><strong>Past Clients Category Name:</strong><br />
	<input type="text" name="pastclients" size="45" value="<?php echo get_option('pastclients'); ?>" /></p>
	
 
 	<p><strong>Arists / Clients Text:</strong><br />
	<input type="text" name="clientstxt" size="45" value="<?php echo get_option('clientstxt'); ?>" /> <br>
	
</p>

<p><strong>Older Clients Section Title:</strong><br />
	<input type="text" name="oldclientstitle" size="45" value="<?php echo get_option('oldclientstitle'); ?>" /> <br>
	
</p>

 	<p><strong>Older Clients List:</strong><br />
	<textarea name="oldclients" cols="50" rows="5" >
<?php echo get_option('oldclients'); ?>
</textarea>


 <br>
	
</p>
	 

	<p><input type="submit" name="Submit" value="Update Options" /></p>

	<input type="hidden" name="action" value="update" />
	<input type="hidden" name="page_options" value="pastclients,clientstxt,oldclients,oldclientstitle" />

	</form>
	</div>
	<?php
}

 //CUSTOM POSTS 'LATEST PRESS RELEASES' FOR HOMEPAGE


 function press_release_recent_posts( $atts = null, $content = null, $tag = null ) {

     

    $args = array( 
        'numberposts' => '6', 
        'post_status' => 'publish', 
        'post_type' => 'press-release' ,
        'paged' => $paged,
    );

    $recent = wp_get_recent_posts( $args );

  if ( $recent ) { ?>

   <section class="overview">

       

      <div class="overview">
<?php
        foreach ( $recent as $item ) {
 $artist_id = wpcf_pr_post_get_belongs( $item['ID'], 'artist' );
                          // Get all the parent (writer) post data
                          $artist_post = get_post( $artist_id );
                           
                          // Get the title of the parent (writer) post
                          $artist_name = $artist_post->post_title;
                          // Get the contents of the parent (writer) post
                          $artist_content = $artist_post->post_content;
  if (has_post_thumbnail($item)): ?>

          <a href="<?php echo get_permalink($item['ID']);?>"><?php echo get_the_post_thumbnail($item , 'pr-slider-thumb' , array( 'class' => 'img-responsive' ) );?></a>

          


          <?php else : ?>

          <a href="<?php echo get_permalink($item['ID']);?>"><?php echo get_the_post_thumbnail($artist_id , 'pr-slider-thumb' , array( 'class' => 'img-responsive' ) );?></a>
        <?php endif;

            echo '<a href="' . get_permalink( $item['ID'] ) . '">';
            echo get_the_post_thumbnail( $item['ID'] , 'pr-slider-thumb' , array( 'class' => 'img-responsive' ));  
            echo '</a>';





          echo get_permalink( $item['ID'] );
        }

        ?></div></section>
        <?php
    }

    

}

add_shortcode( 'recentposts', 'press_release_recent_posts' );