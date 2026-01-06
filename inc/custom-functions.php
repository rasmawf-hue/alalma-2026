<?php
/**
 * Custom Helper Functions
 * 
 * @package Alalama_Tech
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Get Phone Numbers from Customizer
 */
function alalama_get_phones() {
    $phones = array();
    for ($i = 1; $i <= 5; $i++) {
        $phone = get_theme_mod('alalama_phone_' . $i);
        if (!empty($phone)) {
            $phones[] = $phone;
        }
    }
    return $phones;
}

/**
 * Get Social Media Links
 */
function alalama_get_social_links() {
    return array(
        'facebook' => get_theme_mod('alalama_facebook'),
        'twitter' => get_theme_mod('alalama_twitter'),
        'instagram' => get_theme_mod('alalama_instagram'),
        'linkedin' => get_theme_mod('alalama_linkedin'),
        'youtube' => get_theme_mod('alalama_youtube'),
    );
}

/**
 * Display Social Links
 */
function alalama_social_links() {
    $socials = alalama_get_social_links();
    $icons = array(
        'facebook' => 'fab fa-facebook-f',
        'twitter' => 'fab fa-twitter',
        'instagram' => 'fab fa-instagram',
        'linkedin' => 'fab fa-linkedin-in',
        'youtube' => 'fab fa-youtube',
    );
    
    foreach ($socials as $key => $url) {
        if (!empty($url)) {
            echo '<a href="' . esc_url($url) . '" target="_blank" aria-label="' . ucfirst($key) . '">';
            echo '<i class="' . $icons[$key] . '"></i>';
            echo '</a>';
        }
    }
}

/**
 * Breadcrumbs
 */
function alalama_breadcrumbs() {
    if (is_front_page()) {
        return;
    }
    
    echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
    echo '<a href="' . esc_url(home_url('/')) . '">الرئيسية</a>';
    
    if (is_category() || is_single()) {
        echo ' / ';
        the_category(' / ');
        if (is_single()) {
            echo ' / ';
            the_title();
        }
    } elseif (is_page()) {
        echo ' / ';
        the_title();
    } elseif (is_search()) {
        echo ' / نتائج البحث عن: ' . get_search_query();
    } elseif (is_404()) {
        echo ' / خطأ 404';
    }
    
    echo '</nav>';
}

/**
 * Excerpt Length
 */
function alalama_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'alalama_excerpt_length');

/**
 * Excerpt More
 */
function alalama_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'alalama_excerpt_more');

/**
 * Reading Time
 */
function alalama_reading_time() {
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    
    return $reading_time . ' دقائق للقراءة';
}

/**
 * Get Related Posts
 */
function alalama_get_related_posts($post_id, $limit = 3) {
    $categories = wp_get_post_categories($post_id);
    
    $args = array(
        'category__in' => $categories,
        'post__not_in' => array($post_id),
        'posts_per_page' => $limit,
        'orderby' => 'rand',
    );
    
    return new WP_Query($args);
}

/**
 * Custom Logo
 */
function alalama_custom_logo() {
    if (has_custom_logo()) {
        the_custom_logo();
    } else {
        echo '<a href="' . esc_url(home_url('/')) . '" class="site-title">';
        echo get_bloginfo('name');
        echo '</a>';
    }
}