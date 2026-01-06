<?php
/**
 * Template Name: Contact Page
 * 
 * @package Alalama_Tech
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">
        <section class="page-header">
            <h1><?php the_title(); ?></h1>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </section>

        <section class="contact-content">
            <div class="row">
                <div class="col-6">
                    <div class="contact-info-box">
                        <h3>معلومات الاتصال</h3>
                        <div class="info-item">
                            <i class="fas fa-phone"></i>
                            <div>
                                <h4>الهاتف</h4>
                                <p><?php echo get_theme_mod('alalama_phone_1', '091-1234567'); ?></p>
                                <p><?php echo get_theme_mod('alalama_phone_2', '092-7654321'); ?></p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <h4>البريد الإلكتروني</h4>
                                <p><?php echo get_theme_mod('alalama_email', 'info@alalama.ly'); ?></p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <h4>العنوان</h4>
                                <p><?php echo get_theme_mod('alalama_address', 'طرابلس، ليبيا'); ?></p>
                            </div>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-clock"></i>
                            <div>
                                <h4>ساعات العمل</h4>
                                <p><?php echo get_theme_mod('alalama_working_hours', 'الأحد - الخميس: 9 صباحاً - 5 مساءً'); ?></p>
                            </div>
                        </div>
                        <div class="social-links">
                            <a href="<?php echo get_theme_mod('alalama_facebook'); ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                            <a href="<?php echo get_theme_mod('alalama_twitter'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="<?php echo get_theme_mod('alalama_linkedin'); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                            <a href="<?php echo get_theme_mod('alalama_instagram'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="contact-form-box">
                        <h3>أرسل رسالة</h3>
                        <?php echo do_shortcode('[contact-form-7 id="1" title="نموذج الاتصال"]'); ?>
                    </div>
                </div>
            </div>
        </section>

        <?php if (get_theme_mod('alalama_map_embed')) : ?>
        <section class="map-section">
            <h3>موقعنا</h3>
            <div class="map-container">
                <?php echo get_theme_mod('alalama_map_embed'); ?>
            </div>
        </section>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();