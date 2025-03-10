<?php
// Перенесення стандартних шаблонів з кореню теми у папку templates
// Щоб WordPress використовував шаблони з папки templates, додайте наступний код у файл functions.php вашої теми:
add_filter( 'template_include', function ( $template ) {
    $templates_dir = get_template_directory() . '/templates/';

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
