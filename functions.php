<?php
/**
 * Theme functions for Ingenuity (HTML5 Boilerplate-based WordPress theme)
 */

// Enqueue styles and scripts
function ingenuity_enqueue_assets() {
    $template_url = get_template_directory_uri();

    // Styles
    wp_enqueue_style('normalize', $template_url . '/css/normalize.css', [], '8.0.1'); // optionally use a known version
    wp_enqueue_style('main', $template_url . '/css/main.css', ['normalize'], filemtime(get_template_directory() . '/css/main.css'));
    wp_enqueue_style('theme-style', get_stylesheet_uri(), ['main'], filemtime(get_stylesheet_directory() . '/style.css'));

    // Scripts
    wp_enqueue_script('modernizr', $template_url . '/js/vendor/modernizr-2.6.1.min.js', [], '2.6.1', false);

    // Load jQuery from CDN with local fallback handled in footer
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js', [], '1.8.0', true);
    wp_enqueue_script('jquery');

    wp_enqueue_script('plugins', $template_url . '/js/plugins.js', ['jquery'], filemtime(get_template_directory() . '/js/plugins.js'), true);
    wp_enqueue_script('main', $template_url . '/js/main.js', ['jquery'], filemtime(get_template_directory() . '/js/main.js'), true);
}
add_action('wp_enqueue_scripts', 'ingenuity_enqueue_assets');

// Theme setup
function ingenuity_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption']);

    register_nav_menus([
        'primary' => __('Primary Menu', 'ingenuity'),
    ]);
}
add_action('after_setup_theme', 'ingenuity_theme_setup');

// Register widgetized sidebar
function ingenuity_widgets_init() {
    register_sidebar([
        'name'          => __('Sidebar', 'ingenuity'),
        'id'            => 'sidebar-1',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ]);
}
add_action('widgets_init', 'ingenuity_widgets_init');

// Optional: Add jQuery fallback if CDN fails
function ingenuity_jquery_fallback() {
    ?>
    <script>
    window.jQuery || document.write('<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/vendor/jquery-1.8.0.min.js"><\/script>');
    </script>
    <?php
}
add_action('wp_footer', 'ingenuity_jquery_fallback', 20);