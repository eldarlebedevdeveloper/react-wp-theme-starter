<?php
include_once 'includes/register-post-types.php';
include_once 'includes/register-taxonomies.php';

function my_react_theme_enqueue_scripts() {
    // Перевіряємо, чи існує файл build/index.js
    $script_path = get_template_directory() . '/build/index.js';
    wp_enqueue_script(
        'my-react-theme-script',
        get_template_directory_uri() . '/build/index.js',
        array('wp-element'), // Залежності: підключення @wordpress/element
        filemtime($script_path), // Динамічна версія на основі часу зміни файлу
        true // Підключення перед </body>
    );
    wp_enqueue_style('my-react-theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_react_theme_enqueue_scripts');


// Sow attachment page for postability to use template templates/attachment.php
function enable_attachment_pages() {
    // Check if the option exists and is set to 0 (disabled)
    if ( get_option( 'wp_attachment_pages_enabled' ) === '0' ) {
        // Update the option to enable attachment pages
        update_option( 'wp_attachment_pages_enabled', '1' );
    }
}
add_action( 'init', 'enable_attachment_pages' );


// Перенесення стандартних шаблонів з кореню теми у папку templates
// Щоб WordPress використовував шаблони з папки templates, додайте наступний код у файл functions.php вашої теми:
add_filter( 'template_include', function ( $template ) {
    $templates_dir = get_template_directory() . '/templates/';
    $templatesCPT_dir = get_template_directory() . '/templatesCPT/';

    // Мапування шаблонів на їх нові шляхи
    $template_map = array(
        'author'  => $templates_dir . 'author.php',
        'category'  => $templates_dir . 'category.php',
        'tax'  => $templates_dir . 'taxonomy.php', 
        'date'  => $templates_dir . 'date.php', 
        'tag'  => $templates_dir . 'tag.php',
        'archive' => $templates_dir . 'archive.php',
        'attachment'  => $templates_dir . 'attachment.php',
        'single'  => $templates_dir . 'single.php',
        'page'    => $templates_dir . 'page.php',
        'singular'    => $templates_dir . 'singular.php',
        'front_page'    => $templates_dir . 'front-page.php',
        'home'    => $templates_dir . 'home.php',
        '404'    => $templates_dir . '404.php',
        'search'    => $templates_dir . 'search.php',
    );

    foreach ( $template_map as $type => $path ) {
        if ( call_user_func( "is_{$type}" ) &&  file_exists( $template_map[$type] ) ) {
            return $path;
        }
    }

    return $template;
} );


// Initializatiojn custom post type temlapes from folders
add_filter( 'template_include', function ( $template ) {
    // Define the directory where custom templates are stored
    $templatesCPT_dir = get_template_directory() . '/templatesCPT/';
    
    // Map conditions to templates
    $template_map = array(
        // Templates for custom post types
        'is_singular:book'          => $templatesCPT_dir . 'single/single-book.php',
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



// ----------DEBUG CODE----------------

// Код який показує який шаблон використовує сторінка
add_action( 'wp_footer', function() {
    if ( current_user_can( 'manage_options' ) ) { // Показувати тільки адміністраторам
        global $template;
        echo '<div style="position: fixed; bottom: 0; left: 0; background: #222; color: #fff; padding: 5px 10px; z-index: 9999; font-size: 12px;">';
        echo 'Template: ' . basename( $template );
        echo '</div>';
    }
} );


