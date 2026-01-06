<?php
/**
 * AJAX Handlers
 * 
 * @package Alalama_Tech
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Load More Portfolio Items
 */
function alalama_load_more_portfolio() {
    check_ajax_referer('alalama_nonce', 'nonce');
    
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';
    
    $args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => 6,
        'paged' => $paged,
    );
    
    if (!empty($category) && $category !== 'all') {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'portfolio_category',
                'field' => 'slug',
                'terms' => $category,
            ),
        );
    }
    
    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        ob_start();
        
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <div class="portfolio-item">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="portfolio-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('portfolio-thumb'); ?>
                        </a>
                    </div>
                <?php endif; ?>
                
                <div class="portfolio-content">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php the_excerpt(); ?>
                </div>
            </div>
            <?php
        }
        
        $html = ob_get_clean();
        
        wp_send_json_success(array(
            'html' => $html,
            'max_pages' => $query->max_num_pages,
        ));
    } else {
        wp_send_json_error(array(
            'message' => __('لا توجد مزيد من الأعمال', 'alalama'),
        ));
    }
    
    wp_reset_postdata();
}
add_action('wp_ajax_load_more_portfolio', 'alalama_load_more_portfolio');
add_action('wp_ajax_nopriv_load_more_portfolio', 'alalama_load_more_portfolio');

/**
 * Contact Form Handler
 */
function alalama_contact_form_handler() {
    check_ajax_referer('alalama_nonce', 'nonce');
    
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);
    
    // Validation
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error(array(
            'message' => __('يرجى ملء جميع الحقول المطلوبة', 'alalama'),
        ));
    }
    
    if (!is_email($email)) {
        wp_send_json_error(array(
            'message' => __('البريد الإلكتروني غير صحيح', 'alalama'),
        ));
    }
    
    // Send Email
    $to = get_option('admin_email');
    $headers = array('Content-Type: text/html; charset=UTF-8');
    
    $email_body = '<h2>رسالة جديدة من نموذج الاتصال</h2>';
    $email_body .= '<p><strong>الاسم:</strong> ' . $name . '</p>';
    $email_body .= '<p><strong>البريد:</strong> ' . $email . '</p>';
    $email_body .= '<p><strong>الهاتف:</strong> ' . $phone . '</p>';
    $email_body .= '<p><strong>الموضوع:</strong> ' . $subject . '</p>';
    $email_body .= '<p><strong>الرسالة:</strong><br>' . nl2br($message) . '</p>';
    
    $sent = wp_mail($to, 'رسالة جديدة: ' . $subject, $email_body, $headers);
    
    if ($sent) {
        wp_send_json_success(array(
            'message' => __('تم إرسال رسالتك بنجاح. سنتواصل معك قريباً!', 'alalama'),
        ));
    } else {
        wp_send_json_error(array(
            'message' => __('حدث خطأ أثناء إرسال الرسالة. الرجاء المحاولة لاحقاً.', 'alalama'),
        ));
    }
}
add_action('wp_ajax_contact_form', 'alalama_contact_form_handler');
add_action('wp_ajax_nopriv_contact_form', 'alalama_contact_form_handler');