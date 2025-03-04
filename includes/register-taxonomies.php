<?php
// Custom post type Books   
function register_custom_taxonomies() {
    register_taxonomy(
        'tech',
        'post',
        array(
            'label' => __('Tech'),
            'rewrite' => array('slug' => 'tech'),
            'hierarchical' => true,
        )
    );

    register_taxonomy(
        'genre',
        'book',
        array(
            'label' => __('Genre'),
            'rewrite' => array('slug' => 'genre'),
            'hierarchical' => true,
        )
    );

    // Register Custom Taxonomy
    // $taxonomy_labels = array(
    //     'name'              => __( 'Topics', 'textdomain' ),
    //     'singular_name'     => __( 'Topic', 'textdomain' ),
    //     'search_items'      => __( 'Search Topics', 'textdomain' ),
    //     'all_items'         => __( 'All Topics', 'textdomain' ),
    //     'parent_item'       => __( 'Parent Topic', 'textdomain' ),
    //     'parent_item_colon' => __( 'Parent Topic:', 'textdomain' ),
    //     'edit_item'         => __( 'Edit Topic', 'textdomain' ),
    //     'update_item'       => __( 'Update Topic', 'textdomain' ),
    //     'add_new_item'      => __( 'Add New Topic', 'textdomain' ),
    //     'new_item_name'     => __( 'New Topic Name', 'textdomain' ),
    //     'menu_name'         => __( 'Topics', 'textdomain' ),
    // );

    // $taxonomy_args = array(
    //     'hierarchical'      => true, // Set to true for categories-like behavior or false for tags-like behavior
    //     'labels'            => $taxonomy_labels,
    //     'show_ui'           => true,
    //     'show_admin_column' => true,
    //     'query_var'         => true,
    //     'rewrite'           => array( 'slug' => 'topic' ),
    // );

    // register_taxonomy( 'topic', array( 'book' ), $taxonomy_args );
}
add_action( 'init', 'register_custom_taxonomies' );