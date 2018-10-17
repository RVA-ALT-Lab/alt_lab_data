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

	//wp_enqueue_script( 'vcu_brand_bar', 'https:///branding.vcu.edu/bar/academic/latest.js', array(), '1.1.1', true );

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
        echo '<a href="?faculty=' . $term->slug . '">' . $term->name . '</a>'; //build this out for archive sorting
    }
  }
}

function project_department(){
  global $post;
  $post_id = $post->ID;
  $terms = wp_get_post_terms( $post_id, 'departments');
  if ($terms){
    foreach ( $terms as $term ) {
        echo '<a href="?departments=' . $term->slug . '">' . $term->name . '</a><br>'; //build this out for archive sorting
        ///?departments=foo
    }
  }
}

function alt_lab_lead(){
   if (have_rows('alt_lab_specific_information')):
      while( have_rows('alt_lab_specific_information') ): the_row() ;
         $leads = get_sub_field('alt_lab_lead');
          if ($leads){
            echo $leads->display_name;   //$leads['display_name'] ************ caution will robinson         
       }
      endwhile;
    endif;
}


//change author to whoever is the lead for the project
function alt_author_project ( $post_id ) {
     $post_type = get_post_type($post_id);
    if ( 'project' != $post_type || get_post_status( $post_id ) != 'publish' ) return;

    if (have_rows('alt_lab_specific_information', $post_id)):
          while( have_rows('alt_lab_specific_information', $post_id) ): the_row() ;
             $leads = get_sub_field('alt_lab_lead', $post_id);
              if ($leads){
               $author = $leads->ID;     //$leads['ID'] ************ caution will robinson   
           }
          endwhile;
    endif;

    remove_action( 'save_post', 'alt_author_project' );
    
    $arg = array(
        'ID' => $post_id,
        'post_author' => $author,
    );
    
    wp_update_post( $arg );
    
    add_action( 'save_post', 'alt_author_project');
    
}
add_action( 'save_post', 'alt_author_project');




function alt_lab_design_pattern(){
   if (have_rows('course_specific')):
      while( have_rows('course_specific') ): the_row() ;
         $pattern = get_sub_field('design_pattern');
           if ($pattern){
            echo $pattern;            
          }
      endwhile;
    endif;
}



function acf_fetch_work_start_date(){
  global $post;
  $html = '';
  $work_start_date = get_field('work_start_date');

    if( $work_start_date) {      
      $html = $work_start_date;  
      return $html;    
    }

}


function acf_fetch_launch_date(){
  global $post;
  $html = '';
  $launch_date = get_field('launch_date');

    if( $launch_date) {      
      $html = $launch_date;  
     return $html;    
    }

}


function acf_fetch_due_date(){
  global $post;
  $html = '';
  $due_date = get_field('due_date');

    if( $due_date) {      
      $html = $due_date;  
     return $html;    
    }

}


function acf_fetch_updates(){
  $values = get_field('updates');
  if($values)
  {
    echo '<ul class="updates-list">';
    foreach($values as $value)
    {
      echo '<li>' . $value['update_date'] . ' ' . $value['update_details'] . '</li>';
    }
    echo '</ul>';
  }
}


function acf_count_updates(){
  $values = get_field('updates');
  $count = 0;
  if($values)
  {
    foreach($values as $value)
    {
     $count++;
    }
   echo ' (' . $count . ')';
  }
}



//add project to author page
function wpbrigade_author_custom_post_types( $query ) {
  if( is_author() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'project'
    ));
    return $query;
  }
}
add_filter( 'pre_get_posts', 'wpbrigade_author_custom_post_types' );