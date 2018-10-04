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
    'show_ui' => false,
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
    'show_ui' => false,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'department' ),
    'show_in_rest'          => true,
    'rest_base'             => 'department',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => false,    
  ));
}

add_action( 'init', 'create_state_taxonomies', 0 );
function create_state_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'state', 'taxonomy general name' ),
    'singular_name' => _x( 'state', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search state' ),
    'popular_items' => __( 'Popular state' ),
    'all_items' => __( 'All state' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit state' ),
    'update_item' => __( 'Update state' ),
    'add_new_item' => __( 'Add New state' ),
    'new_item_name' => __( 'New state' ),
    'add_or_remove_items' => __( 'Add or remove state' ),
    'choose_from_most_used' => __( 'Choose from the most used state' ),
    'menu_name' => __( 'state' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('state',array('project'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'state' ),
    'show_in_rest'          => true,
    'rest_base'             => 'state',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => false,    
  ));
}

add_action( 'init', 'create_lead_taxonomies', 0 );
function create_lead_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'Leads', 'taxonomy general name' ),
    'singular_name' => _x( 'lead', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Leads' ),
    'popular_items' => __( 'Popular Leads' ),
    'all_items' => __( 'All Leads' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Leads' ),
    'update_item' => __( 'Update lead' ),
    'add_new_item' => __( 'Add New lead' ),
    'new_item_name' => __( 'New lead' ),
    'add_or_remove_items' => __( 'Add or remove Leads' ),
    'choose_from_most_used' => __( 'Choose from the most used Leads' ),
    'menu_name' => __( 'lead' ),
  );

//registers taxonomy specific post types - default is just post
  register_taxonomy('Leads',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => false,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'lead' ),
    'show_in_rest'          => true,
    'rest_base'             => 'lead',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_nav_menus' => false,    
  ));
}





