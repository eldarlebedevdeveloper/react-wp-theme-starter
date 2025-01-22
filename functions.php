<?php
function my_react_theme_enqueue_scripts() {
    // Перевіряємо, чи існує файл build/index.js
    $script_path = get_template_directory() . '/build/index.js';
    if (file_exists($script_path)) {
        wp_enqueue_script(
            'my-react-theme-script',
            get_template_directory_uri() . '/build/index.js',
            array('wp-element'), // Залежності: підключення @wordpress/element
            filemtime($script_path), // Динамічна версія на основі часу зміни файлу
            true // Підключення перед </body>
        );
    } else {
        error_log('React build script not found: ' . $script_path);
    }
}
add_action('wp_enqueue_scripts', 'my_react_theme_enqueue_scripts');
