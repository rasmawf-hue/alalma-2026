<?php
/**
 * Alalama Tech Theme Functions
 * 
 * @package Alalama_Tech
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Theme Constants
define('ALALAMA_VERSION', '1.0.0');
define('ALALAMA_DIR', get_template_directory());
define('ALALAMA_URI', get_template_directory_uri());

// Include Required Files
require_once ALALAMA_DIR . '/inc/theme-setup.php';
require_once ALALAMA_DIR . '/inc/enqueue-scripts.php';
require_once ALALAMA_DIR . '/inc/custom-functions.php';
require_once ALALAMA_DIR . '/inc/ajax-handlers.php';
require_once ALALAMA_DIR . '/inc/widgets.php';
require_once ALALAMA_DIR . '/inc/customizer.php';

if (is_admin()) {
    require_once ALALAMA_DIR . '/inc/admin-settings.php';
}

/**
 * Theme Setup
 */
function alalama_theme_setup() {
    load_theme_textdomain('alalama', ALALAMA_DIR . '/languages');
    
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');
    
    register_nav_menus(array(
        'primary' => __('القائمة الرئيسية', 'alalama'),
        'footer' => __('قائمة التذييل', 'alalama'),
    ));
    
    add_image_size('alalama-hero', 1920, 800, true);
    add_image_size('alalama-portfolio', 600, 400, true);
    add_image_size('alalama-thumbnail', 400, 300, true);
}
add_action('after_setup_theme', 'alalama_theme_setup');

/**
 * Register Widget Areas
 */
function alalama_widgets_init() {
    register_sidebar(array(
        'name'          => __('الشريط الجانبي', 'alalama'),
        'id'            => 'sidebar-1',
        'description'   => __('منطقة الويدجت الجانبية', 'alalama'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => __('تذييل 1', 'alalama'),
        'id'            => 'footer-1',
        'description'   => __('عمود التذييل الأول', 'alalama'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'alalama_widgets_init');