<?php
/**
 * Comments Template
 * 
 * @package Alalama_Tech
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if (have_comments()) : ?>
        <h3 class="comments-title">
            <?php
            $comments_number = get_comments_number();
            if ($comments_number === 1) {
                _e('تعليق واحد', 'alalama');
            } else {
                printf(__('%s تعليقات', 'alalama'), number_format_i18n($comments_number));
            }
            ?>
        </h3>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 60,
            ));
            ?>
        </ol>

        <?php
        the_comments_navigation();
        ?>

    <?php endif; ?>

    <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments"><?php _e('التعليقات مغلقة.', 'alalama'); ?></p>
    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply'          => __('اترك تعليقاً', 'alalama'),
        'title_reply_to'       => __('الرد على %s', 'alalama'),
        'cancel_reply_link'    => __('إلغاء الرد', 'alalama'),
        'label_submit'         => __('نشر التعليق', 'alalama'),
        'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . __('تعليقك', 'alalama') . ' <span class="required">*</span></label><textarea id="comment" name="comment" rows="6" required></textarea></p>',
        'fields'               => array(
            'author' => '<p class="comment-form-author"><label for="author">' . __('الاسم', 'alalama') . ' <span class="required">*</span></label><input id="author" name="author" type="text" required></p>',
            'email'  => '<p class="comment-form-email"><label for="email">' . __('البريد الإلكتروني', 'alalama') . ' <span class="required">*</span></label><input id="email" name="email" type="email" required></p>',
            'url'    => '<p class="comment-form-url"><label for="url">' . __('الموقع', 'alalama') . '</label><input id="url" name="url" type="url"></p>',
        ),
    ));
    ?>

</div>