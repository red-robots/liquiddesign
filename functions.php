<?php
// if on a certain taxonomy archive page, do not limit the posts
add_action('pre_get_posts', function($query){
    if (isset($query->query_vars['studio'])) {
        // add_filter('post_limits', function($limit){
            
        //     return '';
        // });
        $query->set( 'orderby', 'menu_order' );
        $query->set( 'order', 'ASC' );
        $query->set('posts_per_page',-1);
        return;
    }
});

function yoast_add_google_profile( $contactmethods ) {
	// Add Google Profiles
	$contactmethods['google_profile'] = 'Google Profile URL';
	return $contactmethods;
}
add_filter( 'user_contactmethods', 'yoast_add_google_profile', 10, 1);


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

// if( is_singular('post') ) {
	add_filter('show_admin_bar', '__return_false');
// }

/**
 * Theme Functions
 *
 * @package      Shaken Grid (Premium)
 * @since        1.0
 * @alter        2.1.3
 *
 */

add_action( 'after_setup_theme', 'shaken_setup' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override shaken_setup() in a child theme, add your own shaken_setup to your child theme's
 * functions.php file.
 *
 * @since 1.5.0
 */
if(!function_exists('shaken_setup')):
function shaken_setup() {
	// Theme support
		
		if ( ! isset( $content_width ) ){
			$content_width = 620;
		}
		
		// Enable support for default WordPress components 
		add_theme_support( 'post-formats', array( 'quote', 'gallery' ) );
		add_editor_style();
		add_theme_support('automatic-feed-links');
		add_custom_background('shaken_custom_background_cb');
		
		// Set featured image sizes
		add_theme_support( 'post-thumbnails');
		set_post_thumbnail_size( 280, 1800);
		// add_image_size( 'sidebar', 75, 75, true);
		// add_image_size( 'gallery', 210, 210, true);
		add_image_size( 'col1', 300, 1800);
		// add_image_size( 'col3', 495, 1800);
		// add_image_size( 'col25', 300, 1800);
		// add_image_size( 'col4', 670, 1800);
		add_image_size( 'loader', 1, 1, array('center', 'center'));
		
		
		
		


		/**
		 * Support added for theme specific components 
		 * To remove support, create a child theme and use remove_theme_support()
		 * in its functions.php file.
		 *
		 * We can remove the parent theme's hook only after it is attached, which means we need to
 		 * wait until setting up the child theme:
		 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
		 * function my_child_theme_setup() {
		 *     // We are removing support for the hover buttons
		 *     remove_theme_support('shaken_action_buttons');
 		 *     ...
		 * }
		 * @since 1.5.0
		*/
		
		// Buttons shown on image hover
		//add_theme_support('shaken_action_buttons');
		
		// Footer credit text
		//add_theme_support('shaken_footer_credit');
		
		/* Uncomment the line below to enable comments
		   on all page templates. */
		//add_theme_support('shaken_page_comments');
	
	// Actions
		
		/* Add your nav menus function to the 'init' action hook. */
		add_action( 'init', 'shaken_register_menus' );
		
		/* Add your sidebars function to the 'widgets_init' action hook. */
		//add_action( 'widgets_init', 'shaken_register_sidebars' );
		
		// Threaded comments
		//add_action('get_header', 'enable_threaded_comments');
		
		// Customize dashboard widgets
		//add_action('wp_dashboard_setup', 'shaken_dashboard_widgets');
		
	// Filters
		
		// No more jumping on Read More link
		add_filter('excerpt_more', 'no_more_jumping');
		
		// Show home link in wp_nav_menu() fallback
		add_filter( 'wp_page_menu_args', 'shaken_page_menu_args' );
		
		// Add featured images to RSS
		//add_filter('pre_get_posts','feedFilter');
		
		// Add wmode='transparent' to auto embedded Flash videos
		//add_filter('embed_oembed_html', 'add_video_wmode', 10, 3);
		
		// Allow shortcodes in text widgets
		//add_filter('widget_text', 'shortcode_unautop');
		//add_filter('widget_text', 'do_shortcode');
		
	/* Make theme available for translation
	 * Translations can be filed in the /languages/ directory */
	load_theme_textdomain( 'shaken', TEMPLATEPATH . '/languages' );
	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
}
endif;

/** 
 * shaken_custom_background_cb()
 * Create a callback for custom backgrounds
 * Removes the old background so the user defined background can display.
 *
 * @since 1.6.0
**/
if(!function_exists('shaken_custom_background_cb')){
function shaken_custom_background_cb() {
	$background = get_background_image();
	$color = get_background_color();
	if ( ! $background && ! $color )
		return;
 
	$style = $color ? "background-color: #$color;" : '';
 
	if ( $background ) {
		$image = " background-image: url('$background');";
 
		$repeat = get_theme_mod( 'background_repeat', 'repeat' );
		if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
			$repeat = 'repeat';
		$repeat = " background-repeat: $repeat;";
 
		$position = get_theme_mod( 'background_position_x', 'left' );
		if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
			$position = 'left';
		$position = " background-position: top $position;";
 
		$attachment = get_theme_mod( 'background_attachment', 'scroll' );
		if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
			$attachment = 'scroll';
		$attachment = " background-attachment: $attachment;";
 
		$style .= $image . $repeat . $position . $attachment;
	}
?>
<style type="text/css">
body {background:none; <?php echo trim( $style ); ?> }
</style>
<?php }
}

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 */
function shaken_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}

function shaken_register_menus(){
	register_nav_menus( array(
			'header' => __( 'Header Menu'),
			'culture' => __( 'Culture Menu'),
			'culturetitle' => __( 'Culture Title'),
			'services' => __( 'Services'),
			'servicestitle' => __( 'Services Title'),
			'servicesb' => __( 'Services planB'),
			'leadership' => __( 'Leadership Menu'),
			'leadershiptitle' => __( 'Leadership Title'),
			'sectors' => __( 'Sectors Menu'),
			'sectorstitle' => __( 'Sectors Title'),
	) );
}


/* Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
	// Register the Homepage Slides
  
     $labels = array(
	'name' => _x('Blog Posts', 'post type general name'),
    'singular_name' => _x('Blog Post', 'post type singular name'),
    'add_new' => _x('Add New', 'Blog Post'),
    'add_new_item' => __('Add New Blog Post'),
    'edit_item' => __('Edit Blog Posts'),
    'new_item' => __('New Blog Post'),
    'view_item' => __('View Blog Posts'),
    'search_items' => __('Search Blog Posts'),
    'not_found' =>  __('No Slides found'),
    'not_found_in_trash' => __('No Blog Posts found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Blog Posts'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 3,
    'supports' => array('title','editor','custom-fields'),
	
  ); 
  register_post_type('blog',$args); // name used in query


 //  $labels = array(
	// 'name' => _x('Slides', 'post type general name'),
 //    'singular_name' => _x('Slide', 'post type singular name'),
 //    'add_new' => _x('Add New', 'Slide'),
 //    'add_new_item' => __('Add New Slide'),
 //    'edit_item' => __('Edit Slide'),
 //    'new_item' => __('New Slide'),
 //    'view_item' => __('View Slide'),
 //    'search_items' => __('Search Slide'),
 //    'not_found' =>  __('No slides found'),
 //    'not_found_in_trash' => __('No slides found in Trash'), 
 //    'parent_item_colon' => '',
 //    'menu_name' => 'Slides'
 //  );
 //  $args = array(
	// 'labels' => $labels,
 //    'public' => true,
 //    'publicly_queryable' => true,
 //    'show_ui' => true, 
 //    'show_in_menu' => true, 
 //    'query_var' => true,
 //    'rewrite' => true,
 //    'capability_type' => 'post',
 //    'has_archive' => false, 
 //    'hierarchical' => false,
 //    'menu_position' => 20,
 //    'supports' => array('title','editor','custom-fields','thumbnail')
 //  ); 
 //  register_post_type('slide',$args); // term to be used in the query 

  
  // Add more between here
  
  // and here
  
  } // close custom post type
  
  
  /*
##############################################
	Custom Taxonomies
*/
add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() {
// cusotm tax
    register_taxonomy( 'categorized', 'blog',
	 array( 
	'hierarchical' => true, // true = acts like categories false = acts like tags
	'label' => 'Category', 
	'query_var' => true, 
	'rewrite' => true ,
	'show_admin_column' => true,
	'public' => true,
	'rewrite' => array( 'slug' => 'categorized' ),
	'_builtin' => true
	) );


	register_taxonomy( 'studio', 'post',
	 array( 
	'hierarchical' => true, // true = acts like categories false = acts like tags
	'label' => 'Studios', 
	'query_var' => true, 
	'rewrite' => true ,
	'show_admin_column' => true,
	'public' => true,
	'rewrite' => array( 'slug' => 'studio' ),
	'_builtin' => true
	) );
	
} // End build taxonomies

//200 pixels wide (and unlimited height)
add_image_size( 'blogposts', 400, 9999 );


// Limit the excerpt without truncating the last word.
// Excerpt Function
function get_excerpt($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = $excerpt.'...';
  return $excerpt;
}
// smart jquery inclusion
function shaken_jquery(){
    if (!is_admin()) {
    	
		
		
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', false, '1.8.3', true);
		wp_enqueue_script('jquery');
		
		
	/*	wp_register_script(
			'hoppy',
			get_bloginfo('template_directory') . '/js/jquery-1.3.2.min.js',
			array('jquery') );
		wp_enqueue_script('hoppy');*/
		
		
		
		wp_register_script(
			'flexslider',
			get_bloginfo('template_directory') . '/js/jquery.flexslider.js',
			array('jquery') );
		wp_enqueue_script('flexslider');

		wp_register_script(
			'blocks',
			get_bloginfo('template_directory') . '/assets/js/vendors/blocks.js',
			array('jquery') );
		wp_enqueue_script('blocks');

		


		wp_register_script(
			'colorbox',
			get_bloginfo('template_directory') . '/js/colorbox.js',
			array('jquery') );
		wp_enqueue_script('colorbox');
		
		
		wp_register_script(
			'lazyload',
			get_bloginfo('template_directory') . '/js/jquery.lazyload.js',
			array('jquery') );
		wp_enqueue_script('lazyload');		
		
		
		wp_register_script(
			'custom',
			get_bloginfo('template_directory') . '/assets/js/custom/custom.js',
			array('jquery') );
		wp_enqueue_script('custom');
		
		
		
		
		
		
    }
}


		
		
add_action( 'wp_enqueue_scripts', 'shaken_jquery' );

// enable threaded comments
/*function enable_threaded_comments(){
	if (!is_admin()) {
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
			wp_enqueue_script('comment-reply');
		}
}*/

// no more jumping for read more link
if(!function_exists('no_more_jumping')){
function no_more_jumping($post) {
	return ' ...<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
}}

// -------------- Add featured images to RSS feed --------------
/*if(!function_exists('feedContentFilter')){
function feedContentFilter($content) {
	$thumbId = get_post_thumbnail_id();
	
	$embed_code = get_post_meta(get_the_id(), 'soy_vid', true);
    $vid_url = get_post_meta(get_the_id(), 'soy_vid_url', true);
 	
	if($thumbId) {
		$img = wp_get_attachment_image_src($thumbId, 'col3');
		$image = '<img src="'. $img[0] .'" alt="" width="'. $img[1] .'" height="'. $img[2] .'" />';
		echo $image;
	}
 	
 	if($embed_code){
 		echo $embed_code;
 	} else if($vid_url){
 		echo '<p><strong><a href="'.$vid_url.'">View Video</a></strong></p>';
 	}
 	
	return $content;
}}

if(!function_exists('feedFilter')){
function feedFilter($query) {
	if ($query->is_feed) {
		add_filter('the_content', 'feedContentFilter');
		}
	return $query;
}}*/

// Add S&S RSS feed to dashboard
/*function shaken_rss_output(){
    echo '<div class="rss-widget">';
     
       wp_widget_rss_output(array(
            'url' => 'http://feeds.feedburner.com/shakenandstirredweb/MLnE',  //put your feed URL here
            'title' => 'Latest News from Shaken &amp; Stirred', // Your feed title
            'items' => 5, //how many posts to show
            'show_summary' => 1, // 0 = false and 1 = true 
            'show_author' => 0,
            'show_date' => 0
       ));
       
       echo "</div>";
}*/

// Add text dashboard widget
/*function shaken_twitter_dash_output(){
    echo '<div class="text-widget">';
     
	echo '<p>Follow Shaken and Stirred on <strong><a href="http://twitter.com/shakenweb" target="_blank">Twitter (@shakenweb)</a></strong> to stay up to date with the latest theme updates and new releases. You can also <strong><a href="http://shakenandstirredweb.com" target="_blank">visit our website</a></strong> to read our Tips &amp; Tricks to get the most out of your theme. We hope you enjoy our theme!</p>';
       
    echo "</div>";
}*/

// Add and remove dashboard widgets
/*function shaken_dashboard_widgets(){
	// Add custom widgets
	wp_add_dashboard_widget( 'shaken-twitter', 'Stay Updated!', 'shaken_twitter_dash_output');
  	wp_add_dashboard_widget( 'shaken-rss', 'Latest News from Shaken &amp; Stirred', 'shaken_rss_output');
}*/

// --------------  Theme Options Panel --------------
require_once(TEMPLATEPATH . '/functions/framework-init.php');

?>
<?php
/*
Plugin Name: Page Excerpt

Description: Adds support for page excerpts - uses WordPress code

*/

add_action( 'edit_page_form', 'pe_add_box');
add_action('init', 'pe_init');

function pe_init() {
	if(function_exists("add_post_type_support")) //support 3.1 and greater
	{
		add_post_type_support( 'page', 'excerpt' );
	}
}

function pe_page_excerpt_meta_box($post) {
?>
<label class="hidden" for="excerpt"><?php _e('Excerpt') ?></label><textarea rows="1" cols="40" name="excerpt" tabindex="6" id="excerpt"><?php echo $post->post_excerpt ?></textarea>
<p><?php _e('Excerpts are optional hand-crafted summaries of your content. You can <a href="http://codex.wordpress.org/Template_Tags/the_excerpt" target="_blank">use them in your template</a>'); ?></p>
<?php
}


function pe_add_box()
{
	if(!function_exists("add_post_type_support")) //legacy
	{		add_meta_box('postexcerpt', __('Page Excerpt'), 'pe_page_excerpt_meta_box', 'page', 'advanced', 'core');
	}
}

//		Change menu labels
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Projects';
    $submenu['edit.php'][5][0] = 'Projects';
    $submenu['edit.php'][10][0] = 'Add Projects';
    echo '';
}
 
function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'Projects';
        $labels->singular_name = 'Projects';
        $labels->add_new = 'Add Projects';
        $labels->add_new_item = 'Add Projects';
        $labels->edit_item = 'Edit Projects';
        $labels->new_item = 'Projects';
        $labels->view_item = 'View Projects';
        $labels->search_items = 'Search Projects';
        $labels->not_found = 'No Projects found';
        $labels->not_found_in_trash = 'No Projects found in Trash';
    }
    add_action( 'init', 'change_post_object_label' );
    add_action( 'admin_menu', 'change_post_menu_label' );

/*-------------------------------------
  Move Yoast to the Bottom
---------------------------------------*/
function yoasttobottom() {
  return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');


?>