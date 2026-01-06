<?php
/**
 * Admin Settings Page
 * 
 * @package Alalama_Tech
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add Admin Menu
 */
function alalama_add_admin_menu() {
    add_theme_page(
        __('إعدادات قالب العلامة', 'alalama'),
        __('إعدادات القالب', 'alalama'),
        'manage_options',
        'alalama-settings',
        'alalama_settings_page'
    );
}
add_action('admin_menu', 'alalama_add_admin_menu');

/**
 * Settings Page Content
 */
function alalama_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php _e('إعدادات قالب العلامة', 'alalama'); ?></h1>
        
        <div class="alalama-settings-wrapper">
            <div class="alalama-card">
                <h2>مرحباً بك في قالب العلامة</h2>
                <p>قالب WordPress احترافي مصمم خصيصاً لشركة العلامة للحاسبات والتقنية</p>
                
                <h3>الخطوات السريعة للبدء</h3>
                <ol>
                    <li>
                        <strong>إعداد معلومات الاتصال:</strong>
                        <a href="<?php echo admin_url('customize.php?autofocus[section]=alalama_contact_section'); ?>">
                            اذهب إلى Customizer
                        </a>
                    </li>
                    <li>
                        <strong>إنشاء القوائم:</strong>
                        <a href="<?php echo admin_url('nav-menus.php'); ?>">
                            إدارة القوائم
                        </a>
                    </li>
                    <li>
                        <strong>إضافة محتوى:</strong>
                        <a href="<?php echo admin_url('post-new.php'); ?>">
                            إضافة مقال جديد
                        </a>
                    </li>
                    <li>
                        <strong>إعداد الويدجت:</strong>
                        <a href="<?php echo admin_url('widgets.php'); ?>">
                            إدارة الويدجت
                        </a>
                    </li>
                </ol>
                
                <h3>المعلومات التقنية</h3>
                <ul>
                    <li><strong>الإصدار:</strong> <?php echo ALALAMA_VERSION; ?></li>
                    <li><strong>WordPress:</strong> <?php echo get_bloginfo('version'); ?></li>
                    <li><strong>PHP:</strong> <?php echo PHP_VERSION; ?></li>
                </ul>
                
                <h3>الدعم</h3>
                <p>
                    <strong>البريد:</strong> support@alalama.ly<br>
                    <strong>الهاتف:</strong> 091-1234567<br>
                    <strong>الموقع:</strong> <a href="https://alalama.ly" target="_blank">alalama.ly</a>
                </p>
            </div>
        </div>
    </div>
    <?php
}