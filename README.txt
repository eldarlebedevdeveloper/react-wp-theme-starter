------------ Мінімальні налаштування для запуску - ПОЧАТОК --------------

1. Потрібно встановити @wordpress/scripts та @wordpress/element для того щоб почати створення wp теми з react 
npm install -save-dev @wordpress/scripts @wordpress/element

2. Потрібно використати @wordpress/babel-preset-default для того щоб працював JSX
npm install @wordpress/babel-preset-default --save-dev

3. У файлі package.json мають бути наступні налаштування 
"scripts": {
    "start": "wp-scripts start",
    "build": "wp-scripts build",
    "lint:css": "wp-scripts lint-style",
    "lint:js": "wp-scripts lint-js",
    "format:js": "wp-scripts format-js"
  },
"devDependencies": {
    "@wordpress/babel-preset-default": "^8.16.0",
    "@wordpress/element": "^6.16.0",
    "@wordpress/scripts": "^30.9.0",
    "@babel/core": "^7.26.0",
    "@babel/preset-react": "^7.26.3",
    "babel-loader": "^9.2.1"
  }

4. У файлі babel.config.js мають бути наступні налаштування 
module.exports = {
  presets: ['@wordpress/babel-preset-default', '@babel/preset-react'],
}

5. У index.php має бути <div id="app"></div>

6. У functions.php має бути підключення 
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

7. Файл index.js має розміщуватися за наступним маршрутом src/index.js це необхідно для того щоб package.json його бачив(спрощенно кажучи)

------------ Мінімальні налаштування для запуску - КІНЕЦЬ --------------