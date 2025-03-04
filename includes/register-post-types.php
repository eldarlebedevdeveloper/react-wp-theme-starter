<?php
function register_custom_post_types() {
    // Register Custom Post Type
    $post_type_labels = array(
        'name'               => __( 'Books', 'textdomain' ),
        'singular_name'      => __( 'Book', 'textdomain' ),
        'menu_name'          => __( 'Books', 'textdomain' ),
        'name_admin_bar'     => __( 'Book', 'textdomain' ),
        'add_new'            => __( 'Add New', 'textdomain' ),
        'add_new_item'       => __( 'Add New Book', 'textdomain' ),
        'new_item'           => __( 'New Book', 'textdomain' ),
        'edit_item'          => __( 'Edit Book', 'textdomain' ),
        'view_item'          => __( 'View Book', 'textdomain' ),
        'all_items'          => __( 'All Books', 'textdomain' ),
        'search_items'       => __( 'Search Books', 'textdomain' ),
        'not_found'          => __( 'No books found.', 'textdomain' ),
        'not_found_in_trash' => __( 'No books found in Trash.', 'textdomain' ),
    );

    $post_type_args = array(
        'labels'             => $post_type_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'books' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
    );

    register_post_type( 'book', $post_type_args );

}
add_action( 'init', 'register_custom_post_types' );