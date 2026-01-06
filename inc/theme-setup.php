<?php
/**
 * Theme Setup Functions
 * 
 * @package Alalama_Tech
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Custom Post Types
 */
function alalama_register_post_types() {
    // Portfolio Post Type
    register_post_type('portfolio', array(
        'labels' => array(
            'name' => __('معرض الأعمال', 'alalama'),
            'singular_name' => __('عمل', 'alalama'),
            'add_new' => __('إضافة جديد', 'alalama'),
            'add_new_item' => __('إضافة عمل جديد', 'alalama'),
            'edit_item' => __('تعديل العمل', 'alalama'),
            'view_item' => __('عرض العمل', 'alalama'),
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest' => true,
    ));

    // Testimonials Post Type
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => __('الشهادات', 'alalama'),
            'singular_name' => __('شهادة', 'alalama'),
            'add_new' => __('إضافة شهادة', 'alalama'),
        ),
        'public' => true,
        'menu_icon' => 'dashicons-testimonial',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
    ));

    // Services Post Type
    register_post_type('service', array(
        'labels' => array(
            'name' => __('الخدمات', 'alalama'),
            'singular_name' => __('خدمة', 'alalama'),
        ),
        'public' => true,
        'menu_icon' => 'dashicons-admin-tools',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'alalama_register_post_types');

/**
 * Register Taxonomies
 */
function alalama_register_taxonomies() {
    register_taxonomy('portfolio_category', 'portfolio', array(
        'labels' => array(
            'name' => __('تصنيفات الأعمال', 'alalama'),
            'singular_name' => __('تصنيف', 'alalama'),
        ),
        'hierarchical' => true,
        'show_in_rest' => true,
    ));
}
add_action('init', 'alalama_register_taxonomies');

/**
 * Add Custom Image Sizes
 */
function alalama_custom_image_sizes() {
    add_image_size('hero-large', 1920, 800, true);
    add_image_size('portfolio-thumb', 600, 400, true);
    add_image_size('service-icon', 300, 300, true);
    add_image_size('blog-thumb', 800, 450, true);
}
add_action('after_setup_theme', 'alalama_custom_image_sizes');

/**
 * Content Width
 */
if (!isset($content_width)) {
    $content_width = 1200;
}

/**
 * Add Editor Styles
 */
function alalama_add_editor_styles() {
    add_editor_style('assets/css/editor-style.css');
}
add_action('admin_init', 'alalama_add_editor_styles');