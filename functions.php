<?php
/**
 * Pro-Truth Pledge Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Pro-Truth_Pledge_Theme
 */

if ( ! function_exists( 'protruthpledge_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function protruthpledge_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Pro-Truth Pledge Theme, use a find and replace
	 * to change 'protruthpledge' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'protruthpledge', get_template_directory() . '/languages' );

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
		'menu-1' => esc_html__( 'Primary', 'protruthpledge' ),
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
	add_theme_support( 'custom-background', apply_filters( 'protruthpledge_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'protruthpledge_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function protruthpledge_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'protruthpledge_content_width', 640 );
}
add_action( 'after_setup_theme', 'protruthpledge_content_width', 0 );

function category_pages( $query ) {
	if ( $query->is_home() && $query->is_main_query() ) {
		$query->set( 'cat', '8');
	}
}
add_action( 'pre_get_posts', 'category_pages' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function protruthpledge_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'protruthpledge' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'protruthpledge' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'protruthpledge_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function protruthpledge_scripts() {
	wp_enqueue_style( 'protruthpledge-style', get_stylesheet_uri() );

	wp_enqueue_script( 'protruthpledge-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'protruthpledge-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'protruthpledge_scripts' );

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

// ENQUEUE CSSMAP SCRIPTS;
function cssmap_fn(){
  wp_enqueue_script(
    'cssmap-script', 
    '//cssmapsplugin.com/5/jquery.cssmap.min.js', 
    array('jquery'),
    '5.5.2',
    true
   );
  wp_enqueue_style(
    'cssmap-usa', 
    get_template_directory_uri().'/cssmap-usa/cssmap-usa.css',
    array(),
    '5.5',
    'screen'
   );
}
add_action('wp_enqueue_scripts', 'cssmap_fn');

// INVOKE CSSMAP FUNCTION IN THE FOOTER;
function cssmap_js(){
?>
<script type="text/javascript">
(function($){

  function populateSummaryStats(pledgeDataSummary, regionTextClicked) {
    var foundData = false;

    pledgeDataSummary.forEach(function(obj) { 
      if(obj.name.toUpperCase()  == regionTextClicked.toUpperCase() ) {
        $("#stateNameSelected").text(obj.name);
        $("#pledgeCountSelected").text(obj.pledgersCount);

        foundData = true;
      }
    });

    if(!foundData) {
      $("#stateNameSelected").text(regionTextClicked);
      $("#pledgeCountSelected").text("Data unavailable at this time.");
    }
  }

  var dataElement = document.getElementById('pledgeDataSummary');
  if (dataElement){
    var pledgeDataSummary = JSON.parse(dataElement.innerHTML);
  }
  

  if(window.location.hash.substr(1) != undefined && dataElement) {
    populateSummaryStats(pledgeDataSummary, window.location.hash.substr(1));
  }

// CSSMap;
$("#map-usa").CSSMap({
  "size": 1450,

  onClick(listItem, otherItem) {
    var regionTextClicked = listItem.children("a").eq(0).text();
  
    populateSummaryStats(pledgeDataSummary, regionTextClicked);

  }
});
// END OF THE CSSMap;

})(jQuery);
</script>
<?php
}
add_action('wp_footer','cssmap_js', 100);
