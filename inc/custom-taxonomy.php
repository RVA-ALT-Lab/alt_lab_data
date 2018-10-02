<?php 

//faculty
add_action( 'init', 'create_tag_taxonomies', 0 );
function create_tag_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'faculty', 'taxonomy general name' ),
    'singular_name' => _x( 'faculty', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search faculty' ),
    'popular_items' => __( 'Popular faculty' ),
    'all_items' => __( 'All faculty' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit faculty' ),
    'update_item' => __( 'Update faculty' ),
    'add_new_item' => __( 'Add New faculty' ),
    'new_item_name' => __( 'New faculty Name' ),
    'separate_items_with_commas' => __( 'Separate faculty with commas' ),
    'add_or_remove_items' => __( 'Add or remove faculty' ),
    'choose_from_most_used' => __( 'Choose from the most used faculty' ),
    'menu_name' => __( 'faculty' ),
  );

//registers taxonomy to both project, faculty, and workshop post types
  register_taxonomy('faculty',array('project','faculty','workshop'), array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'faculty' ),
    'show_in_rest'          => true,
    'rest_base'             => 'faculty',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => false,
  ));
}


//DEPT TAX
add_action( 'init', 'create_dept_taxonomies', 0 );
function create_dept_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'departments', 'taxonomy general name' ),
    'singular_name' => _x( 'department', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search departments' ),
    'popular_items' => __( 'Popular departments' ),
    'all_items' => __( 'All departments' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit departments' ),
    'update_item' => __( 'Update department' ),
    'add_new_item' => __( 'Add New department' ),
    'new_item_name' => __( 'New department' ),
    'add_or_remove_items' => __( 'Add or remove departments' ),
    'choose_from_most_used' => __( 'Choose from the most used departments' ),
    'menu_name' => __( 'Department' ),
  );

//registers taxonomy to both project and faculty post types
  register_taxonomy('departments',array('project','faculty'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'department' ),
    'show_in_rest'          => true,
    'rest_base'             => 'department',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => false,    
  ));
}

