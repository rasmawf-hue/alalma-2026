<?php
/**
 * Enqueue Scripts and Styles
 * 
 * @package Alalama_Tech
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue Styles
 */
function alalama_enqueue_styles() {
    // Google Fonts
    wp_enqueue_style('alalama-google-fonts', 'https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&display=swap', array(), null);
    
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // Main Stylesheet
    wp_enqueue_style('alalama-style', get_stylesheet_uri(), array(), ALALAMA_VERSION);
    
    // Additional Stylesheets
    wp_enqueue_style('alalama-main', ALALAMA_URI . '/assets/css/main.css', array(), ALALAMA_VERSION);
    wp_enqueue_style('alalama-rtl', ALALAMA_URI . '/assets/css/rtl.css', array(), ALALAMA_VERSION);
    wp_enqueue_style('alalama-responsive', ALALAMA_URI . '/assets/css/responsive.css', array(), ALALAMA_VERSION);
    wp_enqueue_style('alalama-animations', ALALAMA_URI . '/assets/css/animations.css', array(), ALALAMA_VERSION);
}
add_action('wp_enqueue_scripts', 'alalama_enqueue_styles');

/**
 * Enqueue Scripts
 */
function alalama_enqueue_scripts() {
    // jQuery (already included in WordPress)
    
    // Main JavaScript
    wp_enqueue_script('alalama-main', ALALAMA_URI . '/assets/js/main.js', array('jquery'), ALALAMA_VERSION, true);
    
    // AJAX Handler
    wp_enqueue_script('alalama-ajax', ALALAMA_URI . '/assets/js/ajax.js', array('jquery'), ALALAMA_VERSION, true);
    
    // Animations
    wp_enqueue_script('alalama-animations', ALALAMA_URI . '/assets/js/animations.js', array('jquery'), ALALAMA_VERSION, true);
    
    // Localize Script for AJAX
    wp_localize_script('alalama-ajax', 'alalama_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('alalama_nonce'),
    ));
    
    // Comment Reply
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'alalama_enqueue_scripts');

/**
 * Admin Styles
 */
function alalama_admin_styles() {
    wp_enqueue_style('alalama-admin', ALALAMA_URI . '/assets/css/admin.css', array(), ALALAMA_VERSION);
}
add_action('admin_enqueue_scripts', 'alalama_admin_styles');