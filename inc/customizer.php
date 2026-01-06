<?php
/**
 * Theme Customizer
 * 
 * @package Alalama_Tech
 */

if (!defined('ABSPATH')) {
    exit;
}

function alalama_customize_register($wp_customize) {
    
    // Contact Information Section
    $wp_customize->add_section('alalama_contact_section', array(
        'title' => __('معلومات الاتصال', 'alalama'),
        'priority' => 30,
    ));
    
    // Phone Numbers
    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting('alalama_phone_' . $i, array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control('alalama_phone_' . $i, array(
            'label' => sprintf(__('رقم الهاتف %d', 'alalama'), $i),
            'section' => 'alalama_contact_section',
            'type' => 'text',
        ));
    }
    
    // Email
    $wp_customize->add_setting('alalama_email', array(
        'default' => 'info@alalama.ly',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('alalama_email', array(
        'label' => __('البريد الإلكتروني', 'alalama'),
        'section' => 'alalama_contact_section',
        'type' => 'email',
    ));
    
    // Address
    $wp_customize->add_setting('alalama_address', array(
        'default' => 'طرابلس، ليبيا',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('alalama_address', array(
        'label' => __('العنوان', 'alalama'),
        'section' => 'alalama_contact_section',
        'type' => 'text',
    ));
    
    // Social Media Section
    $wp_customize->add_section('alalama_social_section', array(
        'title' => __('روابط التواصل الاجتماعي', 'alalama'),
        'priority' => 31,
    ));
    
    $social_networks = array(
        'facebook' => 'Facebook',
        'twitter' => 'Twitter',
        'instagram' => 'Instagram',
        'linkedin' => 'LinkedIn',
        'youtube' => 'YouTube',
    );
    
    foreach ($social_networks as $key => $label) {
        $wp_customize->add_setting('alalama_' . $key, array(
            'default' => '',
            'sanitize_callback' => 'esc_url_raw',
        ));
        
        $wp_customize->add_control('alalama_' . $key, array(
            'label' => $label,
            'section' => 'alalama_social_section',
            'type' => 'url',
        ));
    }
    
    // Home Page Settings
    $wp_customize->add_section('alalama_homepage_section', array(
        'title' => __('إعدادات الصفحة الرئيسية', 'alalama'),
        'priority' => 32,
    ));
    
    // Hero Title
    $wp_customize->add_setting('alalama_hero_title', array(
        'default' => 'نحقق رؤيتك التقنية',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('alalama_hero_title', array(
        'label' => __('عنوان Hero', 'alalama'),
        'section' => 'alalama_homepage_section',
        'type' => 'text',
    ));
    
    // Hero Description
    $wp_customize->add_setting('alalama_hero_description', array(
        'default' => 'حلول تقنية متكاملة لعملك',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('alalama_hero_description', array(
        'label' => __('وصف Hero', 'alalama'),
        'section' => 'alalama_homepage_section',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'alalama_customize_register');