<?php

// Initializatiojn custom post type temlapes from folders
add_filter( 'template_include', function ( $template ) {
    // Define the directory where custom templates are stored
    $templatesCPT_dir = get_template_directory() . '/templatesCPT/'; 
    
    // Map conditions to templates
    $template_map = array(
        // Templates for custom post types
        'is_singular:book'          => $templatesCPT_dir . 'single/single-book.php',
        'is_singular:food'          => $templatesCPT_dir . 'single/single-food.php',
        'is_post_type_archive:book' => $templatesCPT_dir . 'archive/archive-book.php',
        'is_tax:genre'              => $templatesCPT_dir . 'taxonomy/taxonomy-genre.php',
    );

    // Loop through the template map
    foreach ( $template_map as $condition => $custom_template ) {
        // Split the condition to extract function and parameter
        [$function, $parameter] = explode(':', $condition . ':');
        $parameter = trim($parameter); // Ensure the parameter is trimmed
        
        // Check if the function and condition are valid
        if ( function_exists( $function ) && $function( $parameter ) && file_exists( $custom_template ) ) {
            return $custom_template;
        }
    }

    // Return default template if no match
    return $template;
} );
