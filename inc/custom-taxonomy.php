<?php 

//EMAILS
add_action( 'init', 'create_tag_taxonomies', 0 );
function create_tag_taxonomies()
{
  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name' => _x( 'emails', 'taxonomy general name' ),
    'singular_name' => _x( 'email', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search emails' ),
    'popular_items' => __( 'Popular emails' ),
    'all_items' => __( 'All emails' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit email' ),
    'update_item' => __( 'Update email' ),
    'add_new_item' => __( 'Add New email' ),
    'new_item_name' => __( 'New email Name' ),
    'separate_items_with_commas' => __( 'Separate emails with commas' ),
    'add_or_remove_items' => __( 'Add or remove emails' ),
    'choose_from_most_used' => __( 'Choose from the most used emails' ),
    'menu_name' => __( 'Emails' ),
  );

//registers taxonomy to both project, faculty, and workshop post types
  register_taxonomy('emails',array('project','faculty','workshop'), array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'email' ),
    'show_in_rest'          => true,
    'rest_base'             => 'emails',
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

