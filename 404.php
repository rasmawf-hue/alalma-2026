<?php
/**
 * 404 Error Page Template
 * 
 * @package Alalama_Tech
 */

get_header();
?>

<section class="section error-404-section">
    <div class="container text-center">
        <div class="error-404-content">
            <div class="error-code">404</div>
            
            <h1 class="error-title">
                <?php _e('عذراً! الصفحة غير موجودة', 'alalama'); ?>
            </h1>
            
            <p class="error-description">
                <?php _e('الصفحة التي تبحث عنها قد تم نقلها أو حذفها أو غير موجودة أصلاً', 'alalama'); ?>
            </p>

            <div class="error-search">
                <?php get_search_form(); ?>
            </div>

            <div class="error-links">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">
                    <i class="fas fa-home"></i>
                    <?php _e('العودة للرئيسية', 'alalama'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();