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
        <?php
        while (have_posts()) :
            the_post();
        ?>
            <header class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </header>

            <div class="row">
                <!-- Contact Form -->
                <div class="col-8">
                    <div class="contact-form">
                        <h2>أرسل رسالة</h2>
                        <form id="contact-form" method="post">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">الاسم *</label>
                                        <input type="text" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email">البريد الإلكتروني *</label>
                                        <input type="email" id="email" name="email" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="phone">رقم الهاتف</label>
                                        <input type="tel" id="phone" name="phone">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="subject">الموضوع *</label>
                                        <input type="text" id="subject" name="subject" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="message">الرسالة *</label>
                                <textarea id="message" name="message" rows="6" required></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">إرسال الرسالة</button>
                        </form>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="col-4">
                    <div class="contact-info">
                        <h3>معلومات الاتصال</h3>
                        
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <h4>العنوان</h4>
                                <p><?php echo get_theme_mod('alalama_address', 'طرابلس، ليبيا'); ?></p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <div>
                                <h4>الهاتف</h4>
                                <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    $phone = get_theme_mod('alalama_phone_' . $i);
                                    if ($phone) {
                                        echo '<p><a href="tel:' . esc_attr($phone) . '">' . esc_html($phone) . '</a></p>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <h4>البريد الإلكتروني</h4>
                                <p><a href="mailto:<?php echo get_theme_mod('alalama_email', 'info@alalama.ly'); ?>">
                                    <?php echo get_theme_mod('alalama_email', 'info@alalama.ly'); ?>
                                </a></p>
                            </div>
                        </div>

                        <div class="contact-social">
                            <h4>تابعنا</h4>
                            <?php get_template_part('template-parts/social-links'); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();