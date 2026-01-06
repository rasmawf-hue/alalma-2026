<?php
/**
 * Template part for displaying a message when no content is found
 * 
 * @package Alalama_Tech
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php _e('لم يتم العثور على محتوى', 'alalama'); ?></h1>
    </header>

    <div class="page-content">
        <?php if (is_home() && current_user_can('publish_posts')) : ?>
            <p><?php printf(wp_kses(__('هل أنت مستعد لنشر أول مقالة؟ <a href="%1$s">ابدأ هنا</a>.', 'alalama'), array('a' => array('href' => array()))), esc_url(admin_url('post-new.php'))); ?></p>
        <?php elseif (is_search()) : ?>
            <p><?php _e('عذراً، لم يتم العثور على نتائج مطابقة لبحثك. الرجاء المحاولة مرة أخرى بكلمات مختلفة.', 'alalama'); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php _e('يبدو أننا لا نستطيع العثور على ما تبحث عنه. جرّب البحث؟', 'alalama'); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</section>