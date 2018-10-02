<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Initialize theme default settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom pagination for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';

/**
 * Load custom post types
 */
require get_template_directory() . '/inc/custom-post.php';

/**
 * Load custom taxonomies
 */
require get_template_directory() . '/inc/custom-taxonomy.php';

/**
 * Load ACF Stuff
 */
require get_template_directory() . '/inc/acf.php';



//ADD FONTS and VCU Brand Bar
add_action('wp_enqueue_scripts', 'alt_lab_scripts');
function alt_lab_scripts() {
	$query_args = array(
		'family' => 'Roboto:300,400,700|Old+Standard+TT:400,700|Oswald:400,500,700',
		'subset' => 'latin,latin-ext',
	);
	wp_enqueue_style ( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );

	wp_enqueue_script( 'vcu_brand_bar', 'https:///branding.vcu.edu/bar/academic/latest.js', array(), '1.1.1', true );

	wp_enqueue_script( 'alt_lab_js', get_template_directory_uri() . '/js/alt-lab.js', array(), '1.1.1', true );
    }

//add footer widget areas
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - far left',
    'id' => 'footer-far-left',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - medium left',
    'id' => 'footer-med-left',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);


if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - medium right',
    'id' => 'footer-med-right',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - far right',
    'id' => 'footer-far-right',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

//set a path for IMGS

  if( !defined('THEME_IMG_PATH')){
   define( 'THEME_IMG_PATH', get_stylesheet_directory_uri() . '/imgs/' );
  }


function bannerMaker(){
	global $post;
	 if ( get_the_post_thumbnail_url( $post->ID ) ) {
      //$thumbnail_id = get_post_thumbnail_id( $post->ID );
      $thumb_url = get_the_post_thumbnail_url($post->ID);
      //$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

        return '<div class="jumbotron custom-header-img" style="background-image:url('. $thumb_url .')"></div>';

    } 
}


//custom admin css
function data_acf_admin_theme_style() {
    wp_enqueue_style('data-acf-admin-theme',  get_template_directory_uri() . '/css/data-acf-admin-theme.css', array(), '1.1.1', false );
}


add_action('admin_enqueue_scripts', 'data_acf_admin_theme_style');
add_action('login_enqueue_scripts', 'data_acf_admin_theme_style');


//ACF FUNCTIONS


function project_description(){
  if (have_rows('basic_project_information')):
      while( have_rows('basic_project_information') ): the_row() ;
        $description = get_sub_field('project_description');
        return $description;
      endwhile;
    endif;
       
}



function project_faculty(){
  global $post;
  $post_id = $post->ID;
  $terms = wp_get_post_terms( $post_id, 'faculty');
  if ($terms){
    foreach ( $terms as $term ) {
        echo $term->slug; //build this out for archive sorting
        ///?departments=foo
    }
  }
}

function project_department(){
  global $post;
  $post_id = $post->ID;
  $terms = wp_get_post_terms( $post_id, 'departments');
  if ($terms){
    foreach ( $terms as $term ) {
        echo $term->slug; //build this out for archive sorting
        ///?departments=foo
    }
  }
}

function alt_lab_lead(){
   if (have_rows('alt_lab_specific_information')):
      while( have_rows('alt_lab_specific_information') ): the_row() ;
         $leads = get_sub_field('alt_lab_lead');
          if ($leads){
            echo $leads->display_name;            
       }
      endwhile;
    endif;
}
